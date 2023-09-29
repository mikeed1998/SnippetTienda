<?php

namespace App\Http\Controllers;

use App\Seccion;
use App\ProductosPhoto;
use App\Elemento;
use App\Carrusel;
use App\Politica;
use App\Vacante;
use App\Faq;
use App\Categoria;
use App\Configuracion;
use App\Producto;
use App\colores;
use App\services;
use App\herramientas;
use App\equipo;
use App\logoequipos;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\DB;

class FrontController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
		public function index(){

			$elements = Elemento::where('seccion',1)->get();

			$servicios = services::all();

			$categoria = Categoria::all();

			$productos = Producto::where('inicio',1)->get();

			foreach($productos as $p){
				$prod_photos = ProductosPhoto::where('producto',$p->id)->get()->first();
				if(!empty($prod_photos)){
					$p->photo = $prod_photos->image;
				}
				
			}

			
			$user=null;
			if(auth()->check()){
				$user = auth()->user();
			}

			return view('front.index',compact('elements','servicios','categoria','productos','user'));
	}


	public function projects(){
		$user=null;
		if(auth()->check()){
			$user = auth()->user();
		}
		$proyectos = services::all();
		$elements = Elemento::where('seccion',3)->get();
		return view('front.projects',compact('user','proyectos','elements'));
	}

	public function contact(){
		$user=null;
		if(auth()->check()){
			$user = auth()->user();
		}
		$elements = Elemento::where('seccion',4)->get();
		return view('front.contacto',compact('user','elements'));
	}

	public function products(Request $request){
		$user=null;
		if(auth()->check()){
			$user = auth()->user();
		}
		$categorias =  Categoria::all();
		$nom_cat = null;
		if(empty($request->all())){
			$productos = Producto::all();
		}else{
			$productos = Producto::where('categoria',$request->Categoria)->get();
			$nom_cat =  Categoria::find($request->Categoria);
		}
		
		return view('front.productos',compact('user','productos','categorias','nom_cat'));
	}

	public function detprod($id){
		$user=null;
		if(auth()->check()){
			$user = auth()->user();
		}
		$producto = Producto::find($id);
		$color = colores::find($producto->color);
		$categorias =  Categoria::find($producto->categoria);
		$productosPhoto = ProductosPhoto::where('producto',$producto->id)->get();
		$relacionado = Producto::where('categoria',$producto->categoria)->get();
		return view('front.detprod',compact('user','producto','color','categorias','productosPhoto','relacionado'));
	}


	public function tienda(Request $request){
		$elements = Elemento::where('seccion',2)->get();
		// $categoria = $request->get('categoria');
		
		// if(!empty($categoria)){
		// 	$categoria_b = Categoria::find($categoria);
		// 	$busqueda = $request->get('busqueda');
		// 	$productos = DB::table('productos')
		// 	->select('id','portada','nombre','descripcion','precio')
		// 	->where('categoria','LIKE','%'.$categoria.'%')
		// 	->paginate(12);
		// 	$categoria = Categoria::all();

		// }else{

		// $busqueda = $request->get('busqueda');

		// $productos = DB::table('productos')
		// ->select('id','portada','nombre','descripcion','precio')
		// ->where('nombre','LIKE','%'.$busqueda.'%')
		// ->orwhere('descripcion','LIKE','%'.$busqueda.'%')
		// ->orwhere('precio','LIKE','%'.$busqueda.'%')
		// ->paginate(12);
		// $categoria = Categoria::all();
		// }

		$productos = Producto::all();
		foreach($productos as $p){
			$prod_photos = ProductosPhoto::where('producto',$p->id)->get()->first();
			if(!empty($prod_photos)){
				$p->photo = $prod_photos->image;
			}

		}


		return view('front.tienda',compact('productos','elements'));
	}

	public function details($id){
		
		$producto = Producto::find($id);


		$productosr = Producto::where('categoria',$producto->categoria)->get();

		

		$producto->categoria = Categoria::find($producto->categoria);

		$productos_photos =  ProductosPhoto::where('producto',$producto->id)->get();

		

		// $variantes = ProductoVariante::where('producto', $product->id)->get();
		// $medidas = ProductoMedida::where('producto',$product->id)->orderBy('orden', 'asc')->get();
		// return view('front.detalles', compact('product','variantes','productos_rel','elements'));
		// $data = array(
		// 	'product' => $product,
		// 	'medidas' => $medidas,
		// );
		// return response()->json($data);
		// return $product;

		return view('front.detalles',compact('producto','productos_photos','productosr'));
	}

	// correo de contacto normal
	public function mailcontact(Request $request){
	
		
		$validate = Validator::make($request->all(),[
			'nombre' => 'required',
			'correo' => 'required',
			'mensaje' => 'nullable',
		],[],[]);

		if ($validate->fails()) {
			\Toastr::error('Error, se requieren todos los datos');
			return redirect()->back();
		}

		$data = array(
			'nombre' => $request->nombre,
			'correo' => $request->correo,
			'mensaje' => $request->mensaje,
			'asunto' => 'Formulario de contacto',
			'hoy' => Carbon::now()->format('d-m-Y')
		);

		$html = view('front.mailcontact',compact('data'));

		$config = Configuracion::first();

		$mail = new PHPMailer;
		
		try {
			$mail->isSMTP();
			// $mail->SMTPDebug = SMTP::DEBUG_SERVER;
			// $mail->SMTPDebug = 2;
			$mail->Host = $config->remitentehost;
			$mail->SMTPAuth = true;
			$mail->Username = $config->remitente;
			$mail->Password = $config->remitentepass;
			$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
			$mail->Port = $config->remitenteport;

			
			
			$mail->SetFrom($config->remitente, 'Formulario Contacto');
			$mail->isHTML(true);

			
			
			$mail->addAddress($config->destinatario,'Dinero organico Contacto');
			if (!empty($config->destinatario2)) {
				$mail->AddBCC($config->destinatario2,'Dinero organico Contacto');
			}
			
			$mail->Subject = $data['asunto'];
			$mail->msgHTML($html);
			$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

			if($mail->send()){
				dd('paso culo');
			//Contacto@dineroorganico.com
			\Toastr::success('Correo enviado Exitosamente!');
				return redirect()->back();
			}else{
				dd('no paso culo');
				\Toastr::error('Error al enviar el correo');
				return redirect()->back();
			}


		} catch (phpmailerException $e) {
			\Toastr::error($e->errorMessage());//Pretty error messages from PHPMailer
			return redirect()->back();
		} catch (Exception $e) {
			\Toastr::error($e->getMessage());//Boring error messages from anything else!
			return redirect()->back();
		}
		

	}

	

}
