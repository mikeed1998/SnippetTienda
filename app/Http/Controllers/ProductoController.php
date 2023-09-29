<?php

namespace App\Http\Controllers;

use App\Producto;
use App\colores;
use App\ProductosPhoto;
use App\ProductoMedida;
use App\Categoria;
use App\Marca;
use App\ProductoRelacion;
use App\CategoriaDetalle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ProductoController extends Controller
{

    public function index() {
		$products = Producto::orderBy('orden', 'asc')->get();

		foreach ($products as $prod) {
			$prod->categoria = Categoria::find($prod->categoria);
		}

		return view('admin.productos.index', compact('products'));
    }

    public function create() {
			$categParent = Categoria::where('parent',0)->get();
			return view('admin.productos.create',compact(['categParent']));
    }


    public function store(Request $request) {


		// $validate = Validator::make($request->all(), [
		// 	'nombre' => 'required',
		// 	'descripcion' => 'required',
		// ], [], []);


		// if ($validate->fails()) {
		// 	\Toastr::error('Error, se requieren mas datos');
		// 	return redirect()->back()->withErrors($validate);
		// }

		$product = new Producto;

		$product->nombre = $request->titulo;
		$product->descripcion = $request->descripcion;

		if($product->save()){

			if(!empty($request->file('archivo'))){

				$producto_photo = new ProductosPhoto;
				$producto_photo->producto = $product->id;
	
				$file = $request->file('archivo');
				$extension = $file->getClientOriginalExtension();
				$namefile = Str::random(30) . '.' . $extension;
	
				\Storage::disk('local')->put("/img/photos/productos/" . $namefile, \File::get($file));
	
				$producto_photo->image =  $namefile;
	
				if($producto_photo->save()){
					\Toastr::success('Guardado');
					return redirect()->back();
				}else{
					\Toastr::error('Error al subir imagen');
					return redirect()->back();
				}
	
			}else{
				\Toastr::success('Guardado');
				return redirect()->back();
			}
		}else{
			\Toastr::error('Error al agregar producto');
			return redirect()->back();
		}

		// \Toastr::success('Guardado');
		// return redirect()->route('productos.show', $product->id);
    }

    public function show(Request $request) {

		$productos = Producto::paginate(25);

  		return view('admin.productos.show', compact('productos'));
    }

    public function edit($producto) {
			$product = Producto::find($producto);

			return view('admin.productos.edit', compact('product'));
	}


    public function update(Request $request, $producto) {
  		$product = Producto::find($producto);

  		if (empty($product)) {
  			\Toastr::error('Error, no se encontro el producto a modificar');
  			return redirect()->back();
  		}

  		$validate = Validator::make($request->all(), [
  			'nombre' => 'required',
  			'descripcion' => 'required',
  		], [], []);

  		if ($validate->fails()) {
  			\Toastr::error('Error, se requieren mas datos');
  			return redirect()->back()->withErrors($validate);
  		}


  		$product->nombre = $request->nombre;
  		$product->descripcion = $request->descripcion;
  		// $product->descuento = $request->descuento;
  		// $product->slug = Str::slug($request->nombre, '-');

  		$product->save();

  		\Toastr::success('Guardado');
  		return redirect()->route('productos.show', $product->id);
    }


    public function updateimg(Request $request, $producto) {
  		$product = Producto::find($producto);

      if ($request->hasFile('portada') || $request->hasFile('medidas')) {
        $field = $request->type;
  			$file = $request->file($field);
  			$extension = $file->getClientOriginalExtension();
  			$namefile = Str::random(30) . '.' . $extension;

  			\Storage::disk('local')->put("/img/photos/productos/" . $namefile, \File::get($file));

  			if (!empty($product->$field)) {
  				\Storage::disk('local')->delete("/img/photos/productos/" . $product->$field);
  			}

  			$product->$field = $namefile;
  		}

  		$product->save();

  		\Toastr::success('Guardado');
  		return redirect()->route('productos.show', $product->id);
    }


	public function cambImgProd(Request $request){

		

		$producto_photo = ProductosPhoto::where('producto',$request->id_p)->get()->first();

				
		if(!empty($producto_photo) && $producto_photo->image != 'producto_01.png'){
			\Storage::disk('local')->delete("/img/photos/productos/" .$producto_photo->image);
		}


        if(!empty($request->file('archivo'))){

			if(empty($producto_photo)){
				$producto_photo =new ProductosPhoto;
				$producto_photo->producto = $request->id_p;
			}

            $file = $request->file('archivo');
            $extension = $file->getClientOriginalExtension();
            $namefile = Str::random(30) . '.' . $extension;

            \Storage::disk('local')->put("/img/photos/productos/" . $namefile, \File::get($file));

            $producto_photo->image =  $namefile;
            
			if($producto_photo->save()){
				\Toastr::success('Guardado');
				return redirect()->back();
			}else{
				\Toastr::error('Error al guardar');
				return redirect()->back();
			}


        }
	}

    public function destroy(Request $request) {

			if (empty($request->producto)) {
				\Toastr::error('Error, intentalo mas tarde');
				return redirect()->back();
			}

			$producto = Producto::find($request->producto);

			if (!empty($producto)) {

				if (!empty($producto->portada)) {
					\Storage::disk('local')->delete("/img/photos/productos/" . $producto->portada);
				}
				$producto->delete();
				\Toastr::success('Eliminado Exitosamente');
				return redirect()->back();

			}
    }

	public function nuevoprod(Request $request){

		$producto =new Producto;

		if($producto->save()){
			\Toastr::success('Agregado correctamente');
			return redirect()->back();
		}else{
			\Toastr::error('Error al agregar');
			return redirect()->back();
		}

		

	}

	public function del_prod(Request $request){
		
		 $producto = Producto::find($request->id_prod);
		
		 $photos_p = ProductosPhoto::where('producto',$producto)->get();

		 foreach($photos_p as $photo_p){
			\Storage::disk('local')->delete("/img/photos/productos/" .$photo_p->image);
			$photo_p->delete();
		 }

		 if($producto->delete()){
			\Toastr::success('Eliminado Exitosamente');
			return redirect()->back();
		 }else{
			\Toastr::error('Error al eliminar');
			return redirect()->back();
		 }

	}

	public function portada_prod(Request $request, $id){

		$producto = Producto::find($id);

		
		if($producto->portada != 'producto_01.png'){
			\Storage::disk('local')->delete("/img/photos/productos/" .$producto->portada);
		}


        if(!empty($request->file('archivo'))){

            $file = $request->file('archivo');
            $extension = $file->getClientOriginalExtension();
            $namefile = Str::random(30) . '.' . $extension;

            \Storage::disk('local')->put("/img/photos/productos/" . $namefile, \File::get($file));

            $producto->portada =  $namefile;
            
			if($producto->save()){
				\Toastr::success('Guardado');
				return redirect()->back();
			}else{
				\Toastr::error('Error al guardar');
				return redirect()->back();
			}


        }

	}

    public function prodtext(Request $request){

        $producto = Producto::find($request->id);

        $campo = $request->campo;

        $producto->$campo = $request->valor;

        if($producto->save()){
            
            return response()->json(['success'=>true, 'mensaje'=>'Cambio Exitoso']);

        }else{
            
            return response()->json(['success'=>false, 'mensaje'=>'Error al actualizar']);
        }

    }

	public function selectcat(Request $request){
		$producto = Producto::find($request->id);

		$categoria = Categoria::find($request->valor);

		$producto->categoria = $categoria->nombre;

        if($producto->save()){
            
            return response()->json(['success'=>true, 'mensaje'=>'Cambio Exitoso']);

        }else{
            
            return response()->json(['success'=>false, 'mensaje'=>'Error al actualizar']);
        }
	}

	public function prodDetalle($id){

		$producto = Producto::find($id);
		
		$productos_photos =  ProductosPhoto::where('producto',$producto->id)->get();

		return view('configs.secciones.productod',compact('producto','productos_photos'));

	}

	public function productogaleria(Request $request, $id){

		$productof =new ProductosPhoto;

        if(!empty($request->file('archivo'))){

            $file = $request->file('archivo');
            $extension = $file->getClientOriginalExtension();
            $namefile = Str::random(30) . '.' . $extension;

            \Storage::disk('local')->put("/img/photos/productos/" . $namefile, \File::get($file));

			$productof->producto = $id;

            $productof->image =  $namefile;
            
			if($productof->save()){
				\Toastr::success('Guardado');
				return redirect()->back();
			}else{
				\Toastr::error('Error al guardar');
				return redirect()->back();
			}


        }

	}

	public function createprod(Request $request){
		//creamos un nuevo producto que se almacenara en la variable $producto_nuevo
		$producto_nuevo = new Producto;

		//en $producto_nuevo en el campo nombre sera igual a $request->dembrep que es el nombre del producto
		$producto_nuevo->nombre = $request->dembrep;
		//en $producto_nuevo en el campo descripcion sera igual a $request->descripcionp que es la descripcion del producto
		$producto_nuevo->descripcion = $request->descripcionp;
		$producto_nuevo->categoria = $request->categoria;
		//en $producto_nuevo en el campo precio sera igual a $request->precio el precio que me taigo del formulario
		$producto_nuevo->precio = $request->precio;
		$producto_nuevo->color = $request->color;

		//si $request->file('archivo') que es  (el archivo de la imagen) es diferente de vacio
		if(!empty($request->file('archivo'))){

			//guardamos el archivo en una variable llamada $file
			$file = $request->file('archivo');
			//creamos una variable llamada $extencion que sera igual a la extencian sacada del $file
            $extension = $file->getClientOriginalExtension();
			//creamos una variable llamada $namefile que almacenara un 
            $namefile = Str::random(30) . '.' . $extension;
			
			\Storage::disk('local')->put("/img/photos/productos/" . $namefile, \File::get($file));

			$producto_nuevo->portada = $namefile;

			if($producto_nuevo->save()){
				\Toastr::success('Guardado');
				return redirect()->back();
			}else{
				\Toastr::error('Error al guardar');
				return redirect()->back();
			}
			
		}else{
			if($producto_nuevo->save()){
				\Toastr::success('Guardado');
				return redirect()->back();
			}else{
				\Toastr::error('Error al guardar');
				return redirect()->back();
			}
		}

	}

	public function viewProduct($id){
		$producto = Producto::find($id);
		$prodGaleria = ProductosPhoto::where('producto',$producto->id)->get();
		$categoria = Categoria::find($producto->categoria);
		$categorias = Categoria::all();
		$color = colores::find($producto->color);
		$colores = colores::all();
		return view('configs.secciones.productosd',compact('producto','prodGaleria','categoria','color','categorias','colores'));
	}

	public function addmultiimage(Request $request){
		$id_prod = $request->id_prod;
		if ($request->hasFile('uploadedfile')) {
			$images = $request->file('uploadedfile');
			foreach ($images as $image) {
				$newprodphoto = new ProductosPhoto;
				$extension = $image->getClientOriginalExtension();
				$namefile = Str::random(30) . '.' . $extension;
				\Storage::disk('local')->put("/img/photos/productos/" . $namefile, \File::get($image));
				
				$newprodphoto->producto = $id_prod;
				$newprodphoto->image = $namefile;

				$newprodphoto->save();
			}
			\Toastr::success('Guardado');
			return redirect()->back();
		} else {
			\Toastr::error('Ningún archivo seleccionado.');
			return redirect()->back();
		}
	}

	public function createColor(Request $request){
		$color = new colores;
		$color->nombre = $request->nombre_color;
		$color->color = $request->color_select;
		if($color->save()){
			\Toastr::success('Color Guardado');
			return redirect()->back();
		} else {
			\Toastr::error('Error al guardar el color');
			return redirect()->back();
		}
	}

	public function adPortada(Request $request){				
				$producto = Producto::find($request->id_prod);
		
				//si $request->file('archivo') que es  (el archivo de la imagen) es diferente de vacio
				if(!empty($request->file('uploadedfile'))){

					if(!empty($producto->portada)){
						\Storage::disk('local')->delete("/img/photos/productos/" .$producto->portada);
					}
		
					//guardamos el archivo en una variable llamada $file
					$file = $request->file('uploadedfile');
					//creamos una variable llamada $extencion que sera igual a la extencian sacada del $file
					$extension = $file->getClientOriginalExtension();
					//creamos una variable llamada $namefile que almacenara un 
					$namefile = Str::random(30) . '.' . $extension;
					
					\Storage::disk('local')->put("/img/photos/productos/" . $namefile, \File::get($file));
		
					$producto->portada = $namefile;
		
					if($producto->save()){
						\Toastr::success('Guardado');
						return redirect()->back();
					}else{
						\Toastr::error('Error al guardar');
						return redirect()->back();
					}
					
				}else{
					if($producto->save()){
						\Toastr::success('Guardado');
						return redirect()->back();
					}else{
						\Toastr::error('Error al guardar');
						return redirect()->back();
					}
				}
	}

	public function updateIni(Request $request){
		$producto = Producto::find($request->id);
		$productos_count = count(Producto::where('inicio',1)->get());
		switch($request->valor){
			case 1:
				if($productos_count < 6){
					$producto->inicio = 1;
					$producto->save();
					return response()->json(['success'=>true, 'mensaje'=>'Producto anclado al inicio', 'valor'=>1]);
				}else{
					return response()->json(['success'=>false, 'mensaje'=>'No se pueden agregar mas de 5 productos en el inicio']);
				}
				
			
			break;

			case 2:
				$producto->inicio = 0;
				$producto->save();
				return response()->json(['success'=>true, 'mensaje'=>'Producto desanclado al inicio','valor'=>2]);
			break;
		}

		

	}

	public function elimp(Request $request){


		$producto = Producto::find($request->id_p);

		$producto->delete();

		\Toastr::success('Producto eliminado');
		return redirect()->to(url('admin/config/secciones/products'));
	}
}
