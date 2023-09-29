<?php

namespace App\Http\Controllers;

use Conekta\Conekta;
use Conekta\Order;
use Auth;
use App\User;
use App\Domicilio;
use App\Pedido;
use App\Producto;
use Illuminate\Http\Request;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;

class ConektaController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function procesarPago(Request $request){
        
        $userId = Auth::id();
        $usuario = User::find($userId);
        $domicilio = Domicilio::where('user',$userId )->get()->first();

        $totalPrice = $request->total_price;

        

        // Formatear el número a formato de moneda con separadores de miles y decimales
        $formattedTotalPrice = number_format($totalPrice, 2, '', '');

        $client = new Client();
        $response = $client->post('https://api.conekta.io/orders', [
            'headers' => [
                'Accept' => 'application/vnd.conekta-v2.1.0+json',
                'Content-type' => 'application/json',
                'Authorization' => 'Bearer ' . config('services.conekta.secret_key'),
            ],
            'json' => [
                "line_items" => [
                    [
                        "name" => "Pago Plataforma",
                        "unit_price" => $formattedTotalPrice,
                        "quantity" => 1
                    ]
                ],
                "currency" => "MXN",
                "customer_info" => [
                    "name" => $usuario->name . ' ' . $usuario->lastname,
                    "email" => $usuario->email,
                    "phone" => $usuario->telefono
                ],
                // "metadata" => [
                //     "datos_extra" => "1234"
                // ],
                "charges" => [
                    [
                        "payment_method" => [
                            "type" => "card",
                            "token_id" => $request->token_card // Utiliza el token seguro aquí
                        ]
                    ]
                ]
            ]
        ]);

        $responseData = json_decode($response->getBody(), true);
        $Carrito = session('carrito');
        $envio = session('envio');
        $Pedido = new Pedido;
        $Pedido->uid= $responseData['id'];
        $Pedido->estatus= 1;
        $Pedido->domicilio= $domicilio->id;
        $Pedido->cantidad= $request->cant_prods;
        $Pedido->importe= $request->total_price;
        $Pedido->iva= 0;
        $Pedido->total= $request->total_price;
        $Pedido->envio= $envio;
        $Pedido->usuario= $userId;
        $Pedido->data= json_encode($Carrito);
        foreach($Carrito  as $c){
            $producto =  Producto::find($c['id']);
            $producto->cantidad = $producto->cantidad - $c['cantidad'];
            $producto->save();
        }
        $Pedido->save();
        session()->forget('carrito');
        session()->forget('envio');
        return response()->json(['success' => true, 'mensaje' => $responseData]);
        
        dd($responseData);

    // Procesar la respuesta de Conekta y redirigir o mostrar resultados

    }  
}
