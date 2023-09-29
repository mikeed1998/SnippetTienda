<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Configuracion;
use App\Pedido;
use App\Producto;
use App\ProductoVariante;
use App\Domicilio;
use App\Factura;
use App\PedidoDetalle;
use Carbon\Carbon;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $pedidos = Pedido::orderBy('id','desc')->get();

        foreach ($pedidos as $pedido){
            switch ($pedido->estatus) {
                case 0:
										$pedido->status = array(
											'txt' => 'Registrado',
											'class' => 'dark'
										);
                    break;

                 case 1:
										$pedido->status = array(
											'txt' => 'Pagado',
											'class' => 'info'
										);
                    break;

                case 2:
										$pedido->status = array(
											'txt' => 'Enviado',
											'class' => 'warning'
										);
                    break;

										case 3:
										$pedido->status = array(
											'txt' => 'Entregado',
											'class' => 'success'
										);
                    break;
            }

         $pedido->user = $pedido->usuario()->get();
				 // $pedido->date = $date->format('d-m-y');
				 $pedido->date = Carbon::parse($pedido->created_at)->format('d/m/y');
        }
        return view('admin.pedidos.index',compact('pedidos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
			$cartId = session('cart_id');
			$carrito = \Cart::session($cartId)->getContent();
 			$cant = \Cart::session($cartId)->getTotalQuantity();
			$config = Configuracion::first();
			$subtotal = $config->envioglobal;
			$domicilio = Domicilio::find($request->domicilio);

			$user = Auth::user();

			$pedido = new Pedido;

			$pedido->uid = Str::uuid();
			$pedido->domicilio = $domicilio;
			$pedido->cantidad = $cant;
			// $pedido->envio = ($config->envio * $cant) + $config->envioglobal;
			$pedido->envio = $request->envio_price;
			$pedido->importe = $request->subtotal;
			$iva = 0;
			// $pedido->iva = ($request->subtotal*$config->iva)/100;
			$pedido->usuario = $user->id;
			$pedido->data = $carrito;
			$pedido->save();

 			foreach ($carrito as $item) {
				$pedDet = new PedidoDetalle;
 				$finalPrice = $item->price - ($item->price*$item->associatedModel->descuento)/100;
 				$importe = $finalPrice*$item->quantity;
 				$subtotal = $subtotal + $importe + ($config->envio * $item->quantity);
				$iva = $iva + ($config->iva * $importe)/100;

				$producto = ProductoVariante::find($item->id);

				$pedDet->cantidad = $item->quantity;
				$pedDet->precio = $finalPrice;
				$pedDet->importe = $importe;
				$pedDet->total = $importe + $iva;
				$pedDet->pedido = $pedido->id;
				$pedDet->producto = $producto->id;
				$pedDet->log = $item;
				$pedDet->save();
 			}

			$pedido->iva = $iva;
			$pedido->total = $request->subtotal + $iva + $pedido->envio;

			$dom = session('shipAdd');
			$dom = Domicilio::find($dom);
			$package = session('shipItems');
			$carrier = session('shipCarrier');

			$origin = array(
				"name" => "Rodarte Mexico",
				"company" => "Rodarte Mexico",
				"email" => $config->envio_email,
				"phone" => $config->envio_telefono,
				"street" => $config->envio_calle,
				"number" => $config->envio_numero,
				"district" => $config->envio_colonia,
				"city" => $config->envio_ciudad,
				"state" => $config->envio_estado_code,
				"country" => "MX",
				"postalCode" => $config->envio_cp,
				"reference" => ""
			);

			$destination = array(
				"name" => "$user->name $user->lastname",
				"company" => "",
				"email" => $user->email,
				"phone" => $user->telefono,
				"street" => $dom->calle,
				"number" => $dom->numext,
				"district" => $dom->colonia,
				"city" => $dom->municipio,
				"state" => $dom->estado_code,
				"country" => 'MX',
				"postalCode" => $dom->cp,
				"reference" => ''
			);

			$shipment = array(
				'carrier' => $carrier,
				'service' => $request->envio_service,
				'type' => 1
			);

			$settings = array(
				'printFormat' => "PDF",
				'printSize' => "STOCK_4X6"
			);

			$datacode = json_encode(array(
				'origin' => $origin,
				'destination' => $destination,
				'packages' => $package,
				'shipment' => $shipment,
				'settings' => $settings
			));

			$env = config('envia.env');
			$urlBase= "https://".$env.".envia.com";

			$curl = curl_init();
			curl_setopt_array($curl, array(
				CURLOPT_URL => $urlBase.'/ship/generate/',
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => '',
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 0,
				CURLOPT_FOLLOWLOCATION => true,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => 'POST',
				CURLOPT_POSTFIELDS => $datacode,
				CURLOPT_HTTPHEADER => array(
					"Content-Type: application/json",
					// "Authorization: Bearer " . $config->envia_key
					"Authorization: Bearer 070e3c998ef2c703b8cef55c77f63e9ff004e62ac69d7ca60140ce0cd7332bf0"
				),
			));

			$response = curl_exec($curl);

			curl_close($curl);
			$rateResponse = json_decode($response,true);


			$pedido->envia_resp = $rateResponse;
			// $pedido->envia_data = ($rateResponse['meta'] == 'generate') ? $pedido->envia_data = $rateResponse['data'] : $rateResponse ;
			$pedido->save();


			switch ($request->route) {
				case 'deposito':
					return redirect()->route('dash.compras.detalle',$pedido->uid);
				break;
				case 'paypal':
				return redirect()->route('paypal.paypalpay',$pedido->uid);
				break;
				case 'stripe':
				return redirect()->route('stripe.pay',$pedido->uid);
				break;
			}

			// return $rateResponse;
		}

    /**
     * Display the specified resource.
     *
     * @param  \App\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request){

        $pedido = Pedido::paginate(25);
		foreach($pedido as $p){
			$user_name = User::find($p->usuario);
			$p->nom_user = $user_name->name.' '.$user_name->lastname ;
		}
        return view('admin.pedidos.show',compact('pedido'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function edit(Pedido $pedido)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pedido $pedido)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if (empty($request->ped)) {
            \Toastr::error('Error, intentalo mas tarde');
            return redirect()->back();
        }
        $pedido = Pedido::find($request->ped);

        if (!empty($pedido)) {

            if (!empty($pedido->comprobante)) {
                \Storage::disk('local')->delete("/img/photos/pedidos/".$slider->comprobante);
            }
            $detalles = PedidoDetalle::where('pedido',$pedido->id)->delete();

            $pedido->delete();
            \Toastr::success('Eliminado Exitosamente');
            return redirect()->back();
            // return $color;
        }
    }

    public function changeStatus(Request $request){

        if (Pedido::find($request->id)->update(["estatus" => "$request->estatus"])) {
            return response()->json(['success'=>true, 'mensaje'=>'Cambio Exitoso']);
        }else {
            return response()->json(['success'=>false, 'mensaje'=>'Error al actualizar']);
        }
    }

	public function detallesPU(Request $request){
		$pedido = Pedido::find($request->id);
		$datos = json_decode($pedido->data);
		
		$html = '<div class="col-12 px-2 d-flex flex-row">
				<div class="col-8 card py-2 px-2 mx-2" style="main-height: 400px; max-height: 500px; overflow: auto; border-radius: 26px;">';

					foreach($datos as $d){
						// return response()->json(['success'=>true, 'mensaje'=>$d->cantidad ]);
					$producto = Producto::find($d->id);

					$html .= '<div id="card_" class="col-12 py-2 px-2 mb-2 card d-flex flex-row" style="height: 50px; border-radius: 26px;">
					<div class="card d-flex justify-content-center align-items-center" style="width: 50px; height: 100%; border-radius: 16px;">
						<img src="' . asset('img/photos/productos/' . $producto->portada) . '" style="width: 10px;" alt="">
					</div>
					<div class="col-9 px-3 py-2 d-flex justify-content-between align-items-center">
						<li class="" style="list-style: none;"><h6 class="my-auto"></h6></li>
						<li class="d-flex flex-row" style="list-style: none;"><h6 class="my-auto">Cantidad : </h6><input id="input_cat_prod" data-id-prod=""  type="number" min="1" max="" class="form-control input_cat_prod" style="width: 60px; height: 30px;;" value="' . $d->cantidad . '" disabled></li>
						<li class="" style="list-style: none;"><h6 class="my-auto">Precio Unidad: ' . $d->precio . '</h6></li>
					</div>
					<div class="col-2 d-flex justify-content-end align-items-center flex-row" style="background: ;">
						<a href="'. route('config.seccion.viewProduct',$producto->id) .'" class="mx-1" style="list-style: none;"><h6 class="my-auto"></h6><i class="fa-solid fa-eye"></i></a> 
					</div>
				</div>';
					}
				$html .= '</div>
				<div class="col-4 card p-3 d-flex justify-content-between" style=" height: 450px; border-radius: 26px;">
					<div class="col-12 " style="height: 50px;">
						<h5>Resumen de compra</h5>
					</div>
					<div class="col-12 table p-3" style="height: 200px; background: rgb(233, 233, 233); overflow: auto; border-radius: 16px;">
						';
							$total_prod = 0;
							$cantidad_prods = 0;
						
						foreach($datos as $d){
							$producto = Producto::find($d->id);
							$cantidad_pre_prods = $producto->precio * $d->cantidad;
						$html .= '<div id="list_prod_"  class="col-12 my-0 px-0 d-flex align-items-center justify-content-between">
							<div class="col-5 my-0"><h6 class="my-0">'.$producto->nombre.'</h6></div>
							<div class="col-2 my-0 text-end"><h6 id="txt_cant_" class="my-0">'.$d->cantidad.'</h6></div>
							<div class="col-5 my-0 text-end" style="" class="text-end"><h6 id="cat_total_" class="my-0" data-precio-u="" data-precio-cant="" data-cant_prds_u="" >$'.$cantidad_pre_prods.'</h6></div>
						</div>
							'; 
						}

					$html .= '</div>
					<div class="col-12 d-flex justify-content-between">
						<h6 style="font-weight: ;">Envio</h6>
						<h6 id="cost-env" style="font-weight: ;">$'.$pedido->envio.'</h6>
					</div>
					<div class="col-12 d-flex justify-content-between">
						<h5 style="font-weight: bold;">Total</h5>
						<h5 id="total_compra" data-total-c="" style="font-weight: bold;">$'.$pedido->total.'</h5>
					</div>
				</div>
		</div>';
		return response()->json(['success'=>true, 'mensaje'=>$html ]);
	}

	public function detallesPUu(Request $request){
		$pedido = Pedido::find($request->id);
		$datos = json_decode($pedido->data);
		
		$html = '<div class="col-12 px-2 d-flex flex-row">
				<div class="col-8 card py-2 px-2 mx-2" style="main-height: 400px; max-height: 500px; overflow: auto; border-radius: 26px;">';

					foreach($datos as $d){
						// return response()->json(['success'=>true, 'mensaje'=>$d->cantidad ]);
					$producto = Producto::find($d->id);

					$html .= '<div id="card_" class="col-12 py-2 px-2 mb-2 card d-flex flex-row" style="height: 50px; border-radius: 26px;">
					<div class="card d-flex justify-content-center align-items-center" style="width: 50px; height: 100%; border-radius: 16px;">
						<img src="' . asset('img/photos/productos/' . $producto->portada) . '" style="width: 10px;" alt="">
					</div>
					<div class="col-9 px-3 py-2 d-flex justify-content-between align-items-center">
						<li class="" style="list-style: none;"><h6 class="my-auto"></h6></li>
						<li class="d-flex flex-row" style="list-style: none;"><h6 class="my-auto">Cantidad : </h6><input id="input_cat_prod" data-id-prod=""  type="number" min="1" max="" class="form-control input_cat_prod" style="width: 60px; height: 30px;;" value="' . $d->cantidad . '" disabled></li>
						<li class="" style="list-style: none;"><h6 class="my-auto">Precio Unidad: ' . $d->precio . '</h6></li>
					</div>
					<div class="col-2 d-flex justify-content-end align-items-center flex-row" style="background: ;">
						<a href="'.url('detprod/'.$producto->id) .'" class="mx-1" style="list-style: none;"><h6 class="my-auto"></h6><i class="fa-solid fa-eye"></i></a> 
					</div>
				</div>';
					}
				$html .= '</div>
				<div class="col-4 card p-3 d-flex justify-content-between" style=" height: 450px; border-radius: 26px;">
					<div class="col-12 " style="height: 50px;">
						<h5>Resumen de compra</h5>
					</div>
					<div class="col-12 table p-3" style="height: 200px; background: rgb(233, 233, 233); overflow: auto; border-radius: 16px;">
						';
							$total_prod = 0;
							$cantidad_prods = 0;
						
						foreach($datos as $d){
							$producto = Producto::find($d->id);
							$cantidad_pre_prods = $producto->precio * $d->cantidad;
						$html .= '<div id="list_prod_"  class="col-12 my-0 px-0 d-flex align-items-center justify-content-between">
							<div class="col-5 my-0"><h6 class="my-0">'.$producto->nombre.'</h6></div>
							<div class="col-2 my-0 text-end"><h6 id="txt_cant_" class="my-0">'.$d->cantidad.'</h6></div>
							<div class="col-5 my-0 text-end" style="" class="text-end"><h6 id="cat_total_" class="my-0" data-precio-u="" data-precio-cant="" data-cant_prds_u="" >$'.$cantidad_pre_prods.'</h6></div>
						</div>
							'; 
						}

					$html .= '</div>
					<div class="col-12 d-flex justify-content-between">
						<h6 style="font-weight: ;">Envio</h6>
						<h6 id="cost-env" style="font-weight: ;">$'.$pedido->envio.'</h6>
					</div>
					<div class="col-12 d-flex justify-content-between">
						<h5 style="font-weight: bold;">Total</h5>
						<h5 id="total_compra" data-total-c="" style="font-weight: bold;">$'.$pedido->total.'</h5>
					</div>
				</div>
		</div>';
		return response()->json(['success'=>true, 'mensaje'=>$html ]);
	}

}
