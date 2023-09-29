<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('layouts.front');
// });

use Carbon\Carbon;

Route::name('front.')->group(function(){

	Route::get('/', 'FrontController@index')->name('index');
	Route::get('projects', 'FrontController@projects')->name('projects');
	Route::get('contact', 'FrontController@contact')->name('contact');
	Route::get('products', 'FrontController@products')->name('products');
	Route::get('detprod/{id}', 'FrontController@detprod')->name('detprod');

	// Route::get('productos/{product?}', 'FrontController@details')->name('details');

});

// rutas al admin
Route::namespace("Admin")->prefix('admin')->group(function(){
	
	Route::name('admin.')->group(function(){
		Route::get('/', 'HomeController@index')->name('home');
		Route::get('/nuevo', 'HomeController@create')->name('create');
		Route::get('/users', 'HomeController@show')->name('show');
		Route::post('/guardar', 'HomeController@store')->name('store');
		Route::delete('/delete', 'HomeController@destroy')->name('delete');

		Route::namespace('Auth')->group(function(){
			Route::get('/login', 'LoginController@showLoginForm')->name('login');
			Route::post('/login', 'LoginController@login');
			Route::post('logout', 'LoginController@logout')->name('logout');
		});
		
	});




	// rutas al admin configuraciones
	// controllers dentro de Controllers/Admin/
		Route::prefix('config')->name('config.')->group(function(){
			Route::get('index','ConfiguracionController@index')->name('index');
			Route::get('general','ConfiguracionController@general')->name('general');
			Route::get('contacto','ConfiguracionController@contact')->name('contact');
			Route::get('newpanel','ConfiguracionController@newpanel')->name('newpanel');
		});
		// Route::prefix('config')->name('config.')->group(function(){
		// 	Route::get('index','ConfiguracionController@index')->name('index');
		// });
});

// rutas al admin configuraciones
// controllers dentro de Controllers/
Route::prefix('admin')->group(function(){
	
	Route::prefix('config')->name('config.')->group(function(){
		
		Route::prefix('colores')->name('color.')->group(function(){
			Route::get('/','ColorController@index')->name('index');
			Route::post('/','ColorController@store')->name('store');
			Route::get('editar/{id}','ColorController@edit')->name('edit');
			Route::put('{id}','ColorController@update')->name('update');
			Route::delete('/','ColorController@destroy')->name('delete');
		});

		Route::prefix('sliders')->name('slider.')->group(function(){
			Route::get('/{seccion?}','CarruselController@index')->name('index');
			Route::post('/','CarruselController@store')->name('store');
			Route::delete('/','CarruselController@destroy')->name('delete');
		});
		Route::prefix('usuarios')->name('usuarios.')->group(function(){
			Route::get('/','HomeController@index')->name('index');
			//Route::post('/','CarruselController@store')->name('store');
			//Route::delete('/','CarruselController@destroy')->name('delete');
		});

		Route::prefix('politicas')->name('politica.')->group(function(){
			Route::get('/','PoliticaController@index')->name('index');
			Route::put('/{id}','PoliticaController@update')->name('update');
		});

		Route::prefix('secciones')->name('seccion.')->group(function(){
			Route::get('/','SeccionController@index')->name('index');
			Route::get('/{slug}','SeccionController@show')->name('show');
			Route::put('/{id}','ElementoController@update')->name('update');
			Route::put('/portada/{id}', 'SeccionController@update')->name('updatePortada');
			Route::post('/portadaseccion','SeccionController@portadaseccion')->name('portadaseccion');
			Route::post('/upelementimg/{id}','SeccionController@upelementimg')->name('upelementimg');
			Route::post('/portadaservicio/{id}','SeccionController@portadaservicio')->name('portadaservicio');
			Route::post('/imagenequipo/{id}','EquipoController@imagenequipo')->name('imagenequipo');
			Route::post('/imagenalianza','EquipoController@imagenalianza')->name('imagenalianza');
			Route::post('/textareaup/{id}','SeccionController@textareaup')->name('textareaup');

			

			///////////////////////////////////////////////// categoria /////////////////////////////////////////////////
			Route::post('agcategoria','SeccionController@agcategoria')->name('agcategoria');
			Route::post('elimCat','SeccionController@elimCat')->name('elimCat');
			///////////////////////////////////////////////// categoria /////////////////////////////////////////////////

			
			///////////////////////////////////////////////// proyectos /////////////////////////////////////////////////
			Route::post('agproyect','SeccionController@agproyect')->name('agproyect');
			Route::post('elimProy','SeccionController@elimProy')->name('elimProy');
			///////////////////////////////////////////////// proyectos /////////////////////////////////////////////////

			///////////////////////////////////////////////// global /////////////////////////////////////////////////
			Route::post('image_input_ejemplo', 'SeccionController@image_input_ejemplo')->name('image_input_ejemplo');
			Route::post('/imgPortadaGlobal','SeccionController@imgPortadaGlobal')->name('imgPortadaGlobal');
			Route::post('/textglobalseccion','SeccionController@textglobalseccion')->name('textglobalseccion');
			///////////////////////////////////////////////// global /////////////////////////////////////////////////

			///////////////////////////////////////////////// Producto /////////////////////////////////////////////////
					///es el nombre de la ruta, controlador y funcion
			Route::post('createProdnormal','ProductoController@createprod')->name('createproductoprefijo');
			Route::post('createColor','ProductoController@createColor')->name('createColor');
			Route::get('Producto/{id}','ProductoController@viewProduct')->name('viewProduct');
			Route::post('addmultiimage','ProductoController@addmultiimage')->name('addmultiimage');
			Route::post('adPortada','ProductoController@adPortada')->name('adPortada');
			Route::post('updateIni','ProductoController@updateIni')->name('updateIni');
			Route::post('elimp','ProductoController@elimp')->name('elimp');
			///////////////////////////////////////////////// Producto /////////////////////////////////////////////////

			///////////////////////////////////////////////// Sucursal /////////////////////////////////////////////////
			Route::post('/sucursalCreate','SeccionController@sucursalCreate')->name('sucursalCreate');
			Route::post('/sucursalDelete','SeccionController@sucursalDelete')->name('sucursalDelete');
			///////////////////////////////////////////////// Sucursal /////////////////////////////////////////////////

			///////////////////////////////////////////////// inicio /////////////////////////////////////////////////
			Route::post('/newcat','SeccionController@newcat')->name('newcat');
			Route::post('cattext','SeccionController@cattext')->name('cattext');
			Route::post('catimg/{id}','SeccionController@catimg')->name('catimg');
			Route::post('del_cat','SeccionController@del_cat')->name('del_cat');
			///////////////////////////////////////////////// inicio /////////////////////////////////////////////////

			///////////////////////////////////////////////// rutas de productos /////////////////////////////////////////////////
			// Route::post('/nuevoprod','ProductoController@nuevoprod')->name('nuevoprod');
			
			// Route::post('portada_prod/{id}','ProductoController@portada_prod')->name('portada_prod');
			// Route::post('prodtext','ProductoController@prodtext')->name('prodtext');
			// Route::post('selectcat','ProductoController@selectcat')->name('selectcat');
			// Route::post('toggleajax','FuncGenController@toggleajax')->name('toggleajax');
			// Route::get('productodetalle/{id}','ProductoController@prodDetalle')->name('productodetalle');
			// Route::post('productodetalle/productogaleria/{id}','ProductoController@productogaleria')->name('productogaleria');
			///////////////////////////////////////////////// rutas de productos /////////////////////////////////////////////////


			Route::post('secciontexts','SeccionController@secciontexts')->name('secciontexts');
			Route::post('secciontexth','SeccionController@secciontexth')->name('secciontexth');
			Route::post('textnosotrosup','EquipoController@textnosotrosup')->name('textnosotrosup');
			Route::post('/agrserv','SeccionController@agrserv')->name('agrserv');
			Route::post('/agrher','SeccionController@agrher')->name('agrher');
			Route::post('/checkb','SeccionController@checkb')->name('checkb');
			Route::post('/selecticon','SeccionController@selecticon')->name('selecticon');
			Route::post('/pdf/{id}','SeccionController@pdf')->name('pdf');
			Route::post('/deletesslider','SeccionController@deletesslider')->name('deletesslider');
			Route::post('/delher','SeccionController@delher')->name('delher');
			Route::post('/elimlianza/{id}','EquipoController@elimlianza')->name('elimlianza');
		});

		Route::prefix('faq')->name('faq.')->group(function(){
			Route::get('/','FaqController@index')->name('index');
			Route::get('nueva','FaqController@create')->name('create');
			Route::post('/','FaqController@store')->name('store');
			Route::get('{id}','FaqController@edit')->name('edit');
			Route::put('{id}','FaqController@update')->name('update');
			Route::delete('/','FaqController@destroy')->name('delete');
		});

		Route::prefix('dimension')->name('size.')->group(function(){
			// NOTE:  falta method edit
			Route::get('/','CategTamanoController@index')->name('index');
			Route::post('/','CategTamanoController@store')->name('store');
			Route::delete('/','CategTamanoController@destroy')->name('delete');

			Route::name('dimension.')->group(function(){
				// NOTE:  falta method edit
				Route::get('/{slug?}','SizeController@index')->name('index');
				Route::post('t','SizeController@store')->name('store');
				Route::delete('t','SizeController@destroy')->name('delete');
			});
		});

		Route::prefix('cupones')->name('cupons.')->group(function(){
			// NOTE:  falta method edit
			Route::get('/','CuponController@index')->name('index');
			Route::post('/','CuponController@store')->name('store');
			Route::delete('d','CuponController@destroy')->name('delete');
		});
	});

	Route::prefix('clientes')->name('clientes.')->group(function () {
		Route::get('show','UserController@show')->name('show');
	});

	Route::prefix('productos')->name('productos.')->group(function () {
		Route::get('show','ProductoController@show')->name('show');
	});

	Route::prefix('pedidios')->name('pedidios.')->group(function () {
		Route::get('show','PedidoController@show')->name('show');
	});
	
	// Route::prefix('servicios')->name('productos.')->group(function () {
		
	// 	Route::get('/', 'ProductoController@index')->name('index');
	// 	Route::get('nuevo', 'ProductoController@create')->name('create');
	// 	Route::post('nuevo', 'ProductoController@store')->name('store');
	// 	Route::get('detalle/{id}', 'ProductoController@show')->name('show');
	// 	Route::get('{id}', 'ProductoController@edit')->name('edit');
	// 	Route::put('{id}', 'ProductoController@update')->name('update');
	// 	Route::put('upimg/{id}', 'ProductoController@updateimg')->name('updateimg');
	// 	Route::post('delete', 'ProductoController@destroy')->name('delete');

	// 	Route::name('pic.')->group(function () {
	// 		Route::post('newpic/{id}', 'ProductosPhotoController@store')->name('store');
	// 		Route::delete('/', 'ProductosPhotoController@destroy')->name('delete');
	// 	});

	// 	Route::name('version.')->group(function () {
			
	// 		Route::post('newvar/', 'ProductoVarianteController@store')->name('store');
	// 		Route::get('variante/{id_var}', 'ProductoVarianteController@show')->name('show');
	// 		Route::get('variante/edit/{id_var}', 'ProductoVarianteController@edit')->name('edit');
	// 		Route::put('variante/{id_var}', 'ProductoVarianteController@update')->name('update');
	// 	// 	Route::delete('pv/', 'ProductoVersionPhotoController@destroy')->name('delete');
	// 	});

		
	// 	Route::name('rel.')->group(function(){
			
	// 		Route::put('rel/{id}','ProductoRelacionController@update')->name('update');
	// 		// Route::delete('rel/','ProductoRelacionController@destroy')->name('delete');
	// 	});

	// 	Route::name('categoria' )->group(function () {
			
	// 		Route::get('categoria/{id}', 'ProductosPhotoController@store')->name('store');
	// 	});

	// });

	Route::prefix('vacantes')->name('vacante.')->group(function () {
		Route::get('/', 'VacanteController@index')->name('index');
		Route::get('nuevo', 'VacanteController@create')->name('create');
		Route::post('nuevo', 'VacanteController@store')->name('store');
		Route::get('detalle/{id}', 'VacanteController@show')->name('show');
		Route::get('{id}', 'VacanteController@edit')->name('edit');
		Route::put('{id}', 'VacanteController@update')->name('update');
		Route::put('upimg/{id}', 'VacanteController@updateimg')->name('updateimg');
		Route::post('delete', 'VacanteController@destroy')->name('delete');

	});

	Route::prefix('categorias')->name('categ.')->group(function(){
		Route::get('/','CategoriaController@index')->name('index');
		Route::post('/','CategoriaController@store')->name('store');
		Route::get('/{id}','CategoriaController@show')->name('show');
		Route::get('subcategoria/{id}','CategoriaController@sub')->name('sub');
		Route::post('/delete','CategoriaController@destroy')->name('delete');
	});

});

// rutas funciones generales
Route::prefix('varios')->name('func.')->group(function(){
	Route::post('editarajax','FuncGenController@editajax')->name('editajax');
	Route::post('orderajax','FuncGenController@orderajax')->name('orderajax');
	// Route::post('toggleajax','FuncGenController@toggleajax')->name('toggleajax');

	Route::post('addcart','CartController@addcart')->name('addcart');
	Route::get('emptycart','CartController@emptycart')->name('emptycart');
	Route::post('getcart','CartController@getcart')->name('getcart');
	Route::get('updatecart','CartController@updatecart')->name('updatecart');
});

Route::post('pruebaajax','FuncGenController@pruebaajax')->name('pruebaajax');

// rutas test
Route::prefix('test')->group(function(){
	Route::get('strand',function(){
		return Str::random(15);
	});
	Route::get('uuid',function(){
		return Str::uuid();
	});
	Route::get('correo',function(){

		$data = array(
			'nombre' => 'Alexis Israel',
			'empresa' => 'Wozial',
			'correo' => 'alexis.israel.rg@gmail.com',
			'whatsapp' => '3325141438',
			'mensaje' => 'A free, fast, and reliable CDN for toastr. ToastrJS is a JavaScript library for Gnome / Growl type non-blocking notifications. jQuery is required.
			',
			'asunto' => 'Formulario de contacto',
			'hoy' => Carbon::now()->format('d-m-Y')
		);

		return view('front.mailcontact',compact('data'));
	});

	Route::get('slug/{key}', function ($llave) {
		return Str::slug($llave,'-');
	});
});

/** rutas de los formularios de contacto */
Route::post('/formularioContac', 'FrontController@mailcontact')->name('formularioContac');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/denvios', 'HomeController@dEnvios')->name('denvios');
Route::get('/pedidos', 'HomeController@pedidos')->name('pedidos');
Route::post('/addCard', 'HomeController@addCard')->name('addCard');
Route::get('/miCarrito', 'HomeController@miCarrito')->name('miCarrito');
Route::post('/elim_prod_car', 'HomeController@elim_prod_car')->name('elim_prod_car');
Route::post('/cant_change', 'HomeController@cant_change')->name('cant_change');
Route::post('/proceso_datos', 'HomeController@proceso_datos')->name('proceso_datos');
Route::post('/update_d_envio', 'HomeController@update_d_envio')->name('update_d_envio');
Route::post('/update_perfil', 'HomeController@update_perfil')->name('update_perfil');
Route::post('/Proceso_pago', 'HomeController@pasarelaPago')->name('pasarelaPago');
Route::post('/procesarPago', 'ConektaController@procesarPago')->name('procesarPago');
Route::post('/detallesU', 'UserController@detallesU')->name('detallesU');
Route::post('/detallesPU', 'PedidoController@detallesPU')->name('detallesPU');
Route::post('/detallesPUu', 'PedidoController@detallesPUu')->name('detallesPUu');




Route::prefix('clear')->group(function(){
	//Clear Cache facade value:
	Route::get('/clear-cache', function() {
		$exitCode = Artisan::call('cache:clear');
		return '<h1>Cache facade value cleared</h1>';
	});

	//Reoptimized class loader:
	Route::get('/optimize', function() {
		$exitCode = Artisan::call('optimize');
		return '<h1>Reoptimized class loader</h1>';
	});

	//Route cache:
	Route::get('/route-cache', function() {
		$exitCode = Artisan::call('route:cache');
		return '<h1>Routes cached</h1>';
	});

	//Clear Route cache:
	Route::get('/route-clear', function() {
		$exitCode = Artisan::call('route:clear');
		return '<h1>Route cache cleared</h1>';
	});

	//Clear View cache:
	Route::get('/view-clear', function() {
		$exitCode = Artisan::call('view:clear');
		return '<h1>View cache cleared</h1>';
	});

	//Clear Config cache:
	Route::get('/config-cache', function() {
		$exitCode = Artisan::call('config:cache');
		return '<h1>Clear Config cleared</h1>';
	});
});
