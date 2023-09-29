@extends('layouts.admin')
@section('cssExtras')
	<link rel="stylesheet" href="{{asset('css/dropify.css')}}">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
	
<!-- One of the following themes -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@simonwep/pickr/dist/themes/classic.min.css"/> <!-- 'classic' theme -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@simonwep/pickr/dist/themes/monolith.min.css"/> <!-- 'monolith' theme -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@simonwep/pickr/dist/themes/nano.min.css"/> <!-- 'nano' theme -->


@endsection
@section('jsLibExtras')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@endsection
@section('styleExtras')
<style>
		/* mas estilisado */	
			body{
				background-color: #e5e8eb  !important;
			}
			.card-header {
				background-color: #b0c1d1  !important;
			}
			.black-skin .btn-primary {
				background-color: #b0c1d1  !important;
			}
			.btn {
				box-shadow: none;
				border-radius: 15px;
			}
		/* mas estilisado */
		.card-slick{
			background: white;
			color: black;
			transform: scaleY(1);
			height: 307px;
			transition: all 0.5s;
		}
		.card-slick:hover{
			
			background: #9bb938;
			color: white;
			margin-top: -60px;
			height: 367px;
			position: relative;
			z-index: 1000;
			transition: all 0.5s;
		}

		.camp_img{
			opacity: 0%;
			transition: all 0.5s;
		}

		.camp_img_cont:hover{
			
		}
		.camp_img_cont:hover .camp_img{
			opacity: 100%;
			background: #3a3a3a;
			transition: all 0.5s;
		}
		.edit-cuadro{
			background: rgba(72, 72, 72, 0.547);
			transition: all 0.2s;
		}
		.edit-cuadro:hover{
			background: rgba(72, 72, 72, 0.9);
			transition: all 0.2s;
		}
		.edit-n{
			opacity: 0%;
			transition: all 0.5s;
		}

		.edit-cuadro:hover .edit-n{
			opacity: 100%;
			transition: all 0.5s;
		}

	/* Formateamos el label que servirá de contenedor */
		.switch {
		position: relative;
		display: inline-block;
		width: 60px;
		height: 34px;
		}
		
		/* Ocultamos el checkbox html */
		.switch input {
		display:none;
		}
		
		/* Formateamos la caja del interruptor sobre la cual se deslizará la perilla de control o slider */
		.slider {
		position: absolute;
		cursor: pointer;
		top: 0;
		left: 0;
		right: 0;
		bottom: 0;
		background-color: #ccc;
		-webkit-transition: .4s;
		transition: .4s;
		}
		
		/* Pintamos la perilla de control o slider usando el selector before */
		.slider:before {
		position: absolute;
		content: "";
		height: 26px;
		width: 26px;
		left: 4px;
		bottom: 4px;
		background-color: white;
		-webkit-transition: .4s;
		transition: .4s;
		}
		
		/* Cambiamos el color de fondo cuando el checkbox esta activado */
		input:checked + .slider {
		background-color: #7aa2e2;
		}
		
		/* Deslizamos el slider a la derecha cuando el checkbox esta activado */ 
		input:checked + .slider:before {
		-webkit-transform: translateX(26px);
		-ms-transform: translateX(26px);
		transform: translateX(26px);
		}
		
		/* Aplicamos efecto de bordes redondeados en slider y en el fondo del slider */
		.slider.round {
		border-radius: 34px;
		}
		
		.slider.round:before {
		border-radius: 50%;
		}
	/* Formateamos el label que servirá de contenedor end */

	.containersc::-webkit-scrollbar {
		width: 8px;     /* Tamaño del scroll en vertical */
		height: 8px;    /* Tamaño del scroll en horizontal */
		display: none;  /* Ocultar scroll */
	}
	/* Ponemos un color de fondo y redondeamos las esquinas del thumb */
	.containersc::-webkit-scrollbar-thumb {
		background: #ccc;
		border-radius: 4px;
	}

	/* Cambiamos el fondo y agregamos una sombra cuando esté en hover */
	.containersc::-webkit-scrollbar-thumb:hover {
		background: #b3b3b3;
		box-shadow: 0 0 2px 1px rgba(0, 0, 0, 0.2);
	}

	/* Cambiamos el fondo cuando esté en active */
	.containersc::-webkit-scrollbar-thumb:active {
		background-color: #999999;
	}
	/* Ponemos un color de fondo y redondeamos las esquinas del track */
	.containersc::-webkit-scrollbar-track {
		background: #e1e1e1;
		border-radius: 4px;
	}

	/* Cambiamos el fondo cuando esté en active o hover */
	.containersc::-webkit-scrollbar-track:hover,
	.containersc::-webkit-scrollbar-track:active {
	background: #d4d4d4;
	}



		/* input con opacidad y sin boton de selecciond e archivo */
			.file-upload input[type="file"] {
			position: absolute;
			left: -9999px;
			}

			.file-upload label {
			display: inline-block;
			background-color: #00000031;
			color: #fff;
			padding: 6px 12px;
			cursor: pointer;
			border-radius: 4px;
			font-weight: normal;
			opacity: 0%;
			}

			.file-upload input[type="file"] + label:before {
			content: "\f07b";
			font-family: "Font Awesome 5 Free";
			font-size: 16px;
			margin-right: 5px;
			transition: all 0.5s;
			}

			.file-upload input[type="file"] + label {
				transition: all 0.5s;
			}

						

			.file-upload input[type="file"]:focus + label,
			.file-upload input[type="file"] + label:hover {
			backdrop-filter: blur(5px);
			background-color: #41464a37;
			opacity: 100%;
			transition: all 0.5s;
			}

		/* input con opacidad y sin boton de selecciond e archivo */

		.cargado{
			background: rgba(0, 128, 0, 0.715) !important;
		}
</style>
<style>

	.card{
		
	}

	@media only screen and (max-width: 768px){  
		.cont_circle{
			bottom: -150px !important;
		}
		.circle_slider{
			width: 300px !important; 
			height: 300px !important;
		}
		.img_circle{
			margin-top: -120px !important;
		}
	}  
	@media only screen and (max-width: 390px){  
		.cont_circle{
			bottom: -100px !important;
		}
		.circle_slider{
			width: 200px !important; 
			height: 200px !important;
		}
		.img_circle{
			margin-top: -80px !important;
		}
		.img_product{
			margin-left: 0px !important;
		}
	}

</style>
<style>
	/* The switch - the box around the slider */
	.switch {
	position: relative;
	display: inline-block;
	width: 60px;
	height: 34px;
	}

	/* Hide default HTML checkbox */
	.switch input {
	opacity: 0;
	width: 0;
	height: 0;
	}

	/* The slider */
	.slider {
	position: absolute;
	cursor: pointer;
	top: 0;
	left: 0;
	right: 0;
	bottom: 0;
	background-color: #ccc;
	-webkit-transition: .4s;
	transition: .4s;
	}

	.slider:before {
	position: absolute;
	content: "";
	height: 26px;
	width: 26px;
	left: 4px;
	bottom: 4px;
	background-color: white;
	-webkit-transition: .4s;
	transition: .4s;
	}

	input:checked + .slider {
	background-color: #2196F3;
	}

	input:focus + .slider {
	box-shadow: 0 0 1px #2196F3;
	}

	input:checked + .slider:before {
	-webkit-transform: translateX(26px);
	-ms-transform: translateX(26px);
	transform: translateX(26px);
	}

	/* Rounded sliders */
	.slider.round {
	border-radius: 34px;
	}

	.slider.round:before {
	border-radius: 50%;
	}
</style>
@endsection
@section('content')
	<div class="row mb-0 px-2">
		<a href="{{ route('config.seccion.index') }}" class="col col-md-2 btn btn-sm grey darken-2 text-white mr-auto"><i class="fa fa-reply"></i> Regresar</a>
	</div>
	
	<div action="" method="POST" class="col-12 text-center d-flex justify-content-center flex-column">
		@csrf
		<input type="text" name="ver_si_llego" id="" value="1" hidden>
		<h4>Agregar categoria</h4>
		<div >
			<button type="submit" style="background: none !important; border:none;" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa-solid fa-circle-plus" style="font-size: 2rem;"></i></button>
		</div>
	</div>

{{-- store categorias --}}
<div class="col-12 mb-0 pt-5">
    <div class="col-12  mb-2 d-flex justify-content-center align-items-center flex-wrap">
        @foreach($categorias as $c)
        <div class="col-3 mb-3" style="background: ;">
            <div class="card" style=" height: 230px; position: relative;">
                <img src="{{asset('img/photos/categorias/'.$c->image)}}" style=" height: 100%;" alt="">
					{{-- html del input file estilizado --}}
		{{-- <form id="form_image_element{{$c->id}}" action="" method="POST" class="file-upload col-12 p-0 m-0" style="position: absolute; top: 0; bottom: 0; background: ; height: 100%;" enctype="multipart/form-data">
			@csrf
			<input type="text" name="id_categoria" value="{{$c->id}}" hidden>
			<input id="input_img_element{{$c->id}}" class="m-0 p-0" type="file" name="archivo">
			<label class="col-12 m-0 p-0 d-flex justify-content-center align-items-center" for="input_img_element{{$c->id}}" style="opacity: 100%; height: 100%;  ">Seleccionar archivo</label>
		</form> --}}
		<style>
			.fa-trash:hover{
				opacity: 50%;
			}
		</style>
		<form class="col-12 d-flex justify-content-end" action="{{route('config.seccion.elimCat')}}" method="POST" style="position: absolute; top: 10px;">
			@csrf
			<input type="text" name="id_cat" value="{{$c->id}}" hidden>
			<button type="submit" style="background: none; border:none;">
				<i class="fa-solid fa-trash" style="font-size: 20px;"></i>
			</button>
			
		</form>
	{{-- html del input file estilizado --}}
	<script>
		///////////////////// Editar campos imegn categoria ////////////////////
		$('#input_img_element'+{{$c->id}}).change(function(e) {
			$('#form_image_element'+{{$c->id}}).trigger('submit');
		});
		///////////////////// Editar campos imegn categoria ////////////////////
	</script>
            </div>
			<div class="card my-2 p-1" style="background: ; border-radius: 10px;">
				<textarea class="p-2 col-12 editar_text_seccion_global" data-url="{{route('config.seccion.textglobalseccion')}}" style="border:none !important; outline: none;" data-id="{{$c->id}}" data-table="Categoria" data-campo="nombre" name="" id=""  rows="1">{{$c->nombre}}</textarea>
			</div>
			{{--  --}}

        </div>
        @endforeach
    </div>
	<div class="col-12 mt-5 d-flex justify-content-center align-items-center">
		{{$categorias->links()}}
	</div>
</div>
{{-- store categorias --}}

{{-- store titulo productos --}}

<div class="col-12">
    <div class="col-12 my-0 mx-5 text-center">
        <p class="mt-5" style="font-size: 3.5rem; font-family: 'Courier New', Courier, monospace; color: #909986;">CATEGORIA / SUBCATEGORIA</p>
    </div>
</div>

{{-- store titulo productos --}}

{{-- store colores --}}

<div class="col-12 text-center d-flex justify-content-center flex-column">
	<h4>Agregar Colores para productos</h4>
		<button style="background: none !important; border:none;"  data-bs-toggle="modal" data-bs-target="#modalColores"><i class="fa-solid fa-circle-plus" style="font-size: 2rem;"></i></button>
</div>

<div class="col-12 my-3 d-flex justify-content-center align-items-center">

			<div class="col-auto d-flex py-2 px-4" style="background: #d8d8d8; border-radius: 26px;">
				@foreach($colores as $c)
				<div class="mx-1" style="background: {{$c->color}}; width:25px; height:25px; border-radius: 50%;"></div>
				@endforeach
			</div>

</div>

<hr>
{{-- store colores --}}

<div class="col-12 text-center d-flex justify-content-center flex-column">
	<h4>Agregar producto</h4>
		<button style="background: none !important; border:none;"  data-bs-toggle="modal" data-bs-target="#modalproductos"><i class="fa-solid fa-circle-plus" style="font-size: 2rem;"></i></button>
</div>

{{-- store productos --}}

<div class="col-12 mb-5">

    <div class="container mb-5 d-flex flex-wrap">

        @foreach($productos as $p)
        <div class="col-3 p-4">
            <a href="{{route('config.seccion.viewProduct',$p->id)}}" class="col-12" style="text-decoration: none; color: black;">
            <div class="card p-3 d-flex justify-content-center align-items-center" style="height: 300px; position: relative;">
                <img src="{{asset('img/photos/productos/'.$p->portada)}}" style="max-width: 217px; max-height: 241px;"alt="">

					<label class="switch" style="position: absolute; top:10px; right: 10px;">
						<input id="checkIni_{{$p->id}}" data-id="{{$p->id}}" data-campo="inicio" type="checkbox" @if($p->inicio == 1) checked @endif >
						<span class="slider round"></span>
					</label>

            </div>
            <hr>
            <div class="col-12 d-flex flex-column" style="text-align: justify;">
                <h5 style="">{{$p->nombre}}</h5>
                <p>${{ number_format($p->precio, 2, '.', ',') }}</p>
            </div>
        </a>
        </div>
		<script>
			$('#checkIni_'+{{$p->id}}).change(function (e){
				var checkbox = $(this); // Almacenar una referencia al elemento
				console.log('checkIni_'+{{$p->id}});
				var check = 0;
				if (checkbox.prop('checked')) {
					check = 1;
				} else {
					check = 2;
				}
				console.log(check);
				var id = checkbox.attr("data-id");
				var tcsrf = $('meta[name="csrf-token"]').attr('content');
				var valor = check;
				var URL = "{{route('config.seccion.updateIni')}}";
				 
				$.ajax({
					url: URL,
					type: 'post',
					dataType: 'json',
					data: {
						"_method": 'post',
						"_token": tcsrf,
						"id": id,
						"valor": valor
					}
				})
				.done(function(msg) {
					console.log(msg);
					if (msg.success) {
						toastr["success"](msg.mensaje);
						// Cambiar el estado de la casilla de verificación
						if (msg.mensaje.valor == 1) {
							checkbox.prop('checked', true);
						} else if (msg.mensaje.valor == 2) {
							checkbox.prop('checked', false);
						}
					} else {
						toastr["error"](msg.mensaje);
					}
				})
				.fail(function(msg) {
					toastr["error"]('Error al agregar el producto al inicio');
				});
			});
		</script>
        @endforeach

    </div>
	<div class="col-12 mt-5 d-flex justify-content-center align-items-center">
		{{$productos->links()}}
	</div>
</div>


{{-- store productos --}}





{{-- modal agregar categoria --}}
	<form action="{{route('config.seccion.agcategoria')}}" method="POST" class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" enctype="multipart/form-data">
		<div class="modal-dialog modal-dialog-centered">
		<div  class="modal-content" style="border-radius: 16px;" >
			@csrf
			<div class="modal-header">
			<h1 class="modal-title fs-5" id="exampleModalLabel">Agregar categoria</h1>
			<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<style>
					.backr{
						background: #1555bc !important;
					}
				</style>
				<div class="col-12 mb-2" style="height: 100px; position: relative;">
						<div  class="file-upload col-12 p-0 m-0" style=" top: 0; bottom: 0; background: ; height: 100%;" >
							@csrf
							<input id="input_img_element" class="m-0 p-0" type="file" name="archivo">
							<label id="label_form" class="col-12 m-0 p-0 d-flex justify-content-center align-items-center" for="input_img_element" style="opacity: 100%; height: 100%;  border-radius: 16px;">Seleccionar archivo</label>
						</div>
						<script>
							///////////////////// Editar campos imegn categoria ////////////////////
							$('#input_img_element').change(function(e) {
								$('#label_form').addClass('backr');
								$('#label_form').html('Imagen añadida');
							});
							///////////////////// Editar campos imegn categoria ////////////////////
						</script>
				</div>
				<div class="col-12">
					<input class="form-control" type="text" name="nom_cat" placeholder="Nombre categoria">
				</div>
			</div>
			<div class="modal-footer">
			<div class="btn btn-secondary" data-bs-dismiss="modal" style="background: red !important; border:none;">Cerrar</div>
			<button type="submit" class="btn btn-primary" style="background: #1555bc !important; border:none;">Agregar</button>
			</div>
		</div>
		</div>
	</form>
{{-- modal agregar categoria --}}

{{-- modal agregar producto --}}
	<div  class="modal fade" id="modalproductos" data-bs-backdrop="static"  data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
		<div  class="modal-dialog modal-dialog-centered">
			<form action="{{route('config.seccion.createproductoprefijo')}}" method="POST" class="modal-content" style="border-radius: 16px;" enctype="multipart/form-data">
				@csrf
				<div class="modal-header">
				<h1 class="modal-title fs-5" id="staticBackdropLabel">Agregar productos</h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<style>
						.backg_producto{
							background: #1555bc !important;
						}
					</style>
					<div class="col-12 mb-2" style="height: 100px; position: relative;">
						<div  class="file-upload col-12 p-0 m-0" style=" top: 0; bottom: 0; background: ; height: 100%;" >
							<input id="input_img_producto" class="m-0 p-0" type="file" name="archivo">
							<label id="label_form_producto" class="col-12 m-0 p-0 d-flex justify-content-center align-items-center" for="input_img_producto" style="opacity: 100%; height: 100%;  border-radius: 16px;">Seleccionar archivo</label>
						</div>
					</div>
					<div class="col-12 d-flex flex-column">
						<input class="form-control mb-2" type="text" name="dembrep" id="" placeholder="Nombre producto">
						<textarea class="form-control mb-2" name="descripcionp" id="" cols="30" rows="5" placeholder="Descripcion producto"></textarea>
						<select class="form-select mb-2" name="categoria" aria-label="Default select example">
							<option selected>Categoria</option>
							@foreach($categorias as $c)
							<option value="{{$c->id}}">{{$c->nombre}}</option>
							@endforeach
						  </select>
						  <select class="form-select mb-2" name="color" aria-label="Default select example">
							<option selected>Color</option>
							@foreach($colores as $c)
							<option value="{{$c->id}}">{{$c->nombre}}</option>
							@endforeach
						  </select>
						<input class="form-control mb-2" type="number" name="cantidad" id="" placeholder="Cantidad disponible">
						<input class="form-control mb-2" type="text" name="precio" id="" placeholder="Precio">
					</div>
				<script>
					///////////////////// Editar campos imegn categoria ////////////////////

					///////////////////// Editar campos imegn categoria ////////////////////
				</script>
				</div>
				<div class="modal-footer">
				<div class="btn btn-secondary" data-bs-dismiss="modal" style="background: red !important; border:none;">Cerrar</div>
				<button type="submit" class="btn btn-primary" style="background: #1555bc !important; border:none;">Agregar</button>
				</div>
			</form>
		</div>
	</div>
{{-- modal agregar producto --}}

{{-- modal agregar color --}}
	<div  class="modal fade" id="modalColores" data-bs-backdrop="static"  data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
		<div  class="modal-dialog modal-dialog-centered">
			<form action="{{route('config.seccion.createColor')}}" method="POST" class="modal-content" style="border-radius: 16px;" enctype="multipart/form-data">
				@csrf
				<div class="modal-header">
				<h1 class="modal-title fs-5" id="staticBackdropLabel">Agregar Color</h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body ">
					<div class="col-12 mb-3 px-3 text-center d-flex flex-column">
						<h5 class="col-12 mb-2">Nombre del color</h5>
						<input type="text" class="form-control" name="nombre_color" id="">
					</div>
					<div class="col-12 d-flex justify-content-between">
						<div class="color-picker"></div>
						<div class="co-auto text-center d-flex align-items-center">
							<h5 class="my-auto col-auto" style="">Color seleccionado : </h5>
						</div>
						<div class="col-4">
							<input id="inputColoren" type="text" class="form-control" name="color_select"  hidden>
							<input id="inputColor" type="text" class="form-control" name="color_select"  disabled>
						</div>
					</div>

				</div>
				<div class="modal-footer">
				<div class="btn btn-secondary" data-bs-dismiss="modal" style="background: red !important; border:none;">Cerrar</div>
				<button type="submit" class="btn btn-primary" style="background: #1555bc !important; border:none;">Agregar</button>
				</div>
			</form>
		</div>
	</div>
{{-- modal agregar color --}}
@endsection
@section('jsLibExtras2')
<script src="https://cdn.jsdelivr.net/npm/@simonwep/pickr/dist/pickr.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@simonwep/pickr/dist/pickr.es5.min.js"></script>
<script src="{{asset('js/dropify.js')}}" charset="utf-8"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js" ></script>
@endsection
@section('jqueryExtra')
<script type="text/javascript">

// Simple example, see optional options for more configuration.
const pickr = Pickr.create({
    el: '.color-picker',
    theme: 'classic', // or 'monolith', or 'nano'

    swatches: [
        'rgba(244, 67, 54, 1)',
        'rgba(233, 30, 99, 0.95)',
        'rgba(156, 39, 176, 0.9)',
        'rgba(103, 58, 183, 0.85)',
        'rgba(63, 81, 181, 0.8)',
        'rgba(33, 150, 243, 0.75)',
        'rgba(3, 169, 244, 0.7)',
        'rgba(0, 188, 212, 0.7)',
        'rgba(0, 150, 136, 0.75)',
        'rgba(76, 175, 80, 0.8)',
        'rgba(139, 195, 74, 0.85)',
        'rgba(205, 220, 57, 0.9)',
        'rgba(255, 235, 59, 0.95)',
        'rgba(255, 193, 7, 1)'
    ],

    components: {

        // Main components
        preview: true,
        opacity: true,
        hue: true,

        // Input / output Options
        interaction: {
            hex: false,
            rgba: false,
            hsla: false,
            hsva: false,
            cmyk: false,
            input: false,
            clear: false,
            save: false
        }
    }
});

pickr.on('change', (...args) => {
	var color = args[0].toHEXA();
    console.log('Event: "change"', color);
	
	$('#inputColor').val('#'+color[0]+color[1]+color[2]);
	$('#inputColoren').val('#'+color[0]+color[1]+color[2]);
});


///////////////////// quitar file ////////////////////
	$('.modal').on('hidden.bs.modal', function () {
		location.reload();
	});
///////////////////// quitar file ////////////////////
	$(document).on('change', '#input_img_producto', function(e) {
		$('#label_form_producto').addClass('backg_producto');
		$('#label_form_producto').text('Imagen añadida');
	});
///////////////////// Eliminar producto ////////////////////
	$('.del-prod').parent().click(function(e) {
				var id = $(this).attr('data-id');
				$("#id_prod_del").val(id);
				console.log(id);
			});

		$('.btn_prod_del').click(function(e) {
			$('#form_prod_del').submit();
		});
///////////////////// Eliminar producto ////////////////////

	$(document).ready(function() {
		$('#div_grid').slideDown();
		$('#myTable').DataTable();

		// Al hacer click en el botón de grid
		$('#btn_grid').click(function() {
			var boton = document.getElementById('btn_grid');
			boton.style.background ="#62d250 !important";
			boton.style.border ="#62d250 !important";

			var boton2 = document.getElementById('btn_list');
			boton2.style.background ="#3a3a3a !important";
			boton2.style.border ="#3a3a3a !important";
        // Ocultar el div de lista
        $('#div_list').slideUp();
        // Mostrar el div de grid con animación
		var grid = document.getElementById('div_grid');
		grid.style.display = "block !important";
        $('#div_grid').slideDown();
    });

	$('#img_product_input').change(function(e) {
		console.log('aqui');
		$('#icon_carga').addClass('cargado');
	});

	$('.multiple-items2').slick({
            dots:true,
            infinite: false,
            slidesToShow: 8,
            slidesToScroll: 1,
            autoplay: false,
            autoplaySpeed: 2000,
            responsive: [
            {
            breakpoint: 1024,
            settings: {
                slidesToShow: 6,
                slidesToScroll: 3,
                infinite: true,
                dots: false
            }
            },
            {
            breakpoint: 600,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2
            }
            },
            {
            breakpoint: 480,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1
            }
            }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ]
            });

	
	$('.multiple-itemss').slick({
            dots:false,
            infinite: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: false,
            autoplaySpeed: 2000,
            responsive: [
            {
            breakpoint: 1024,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                infinite: true,
                dots: false
            }
            },
            {
            breakpoint: 600,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
            },
            {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
            }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ]
            });

    // Al hacer click en el botón de lista
    $('#btn_list').click(function() {
		var boton = document.getElementById('btn_list');
			boton.style.background ="#62d250 !important";
			boton.style.border ="#62d250 !important";

			var boton2 = document.getElementById('btn_grid');
			boton2.style.background ="#3a3a3a !important";
			boton2.style.border ="#3a3a3a !important";
        // Ocultar el div de grid
		var grid = document.getElementById('div_grid');
		grid.style.display = "none !important";
        $('#div_grid').slideUp();
        // Mostrar el div de lista con animación
        $('#div_list').slideDown();

    });


		$(document).ready(function() {

			$('.multiple-items2').slick({
				dots:false,
				arrows:true,
				infinite: false,
				slidesToShow: 8,
				slidesToScroll: 1,
				autoplay: false,
				autoplaySpeed: 2000,
				responsive: [
				{
				breakpoint: 1024,
				settings: {
					slidesToShow: 6,
					slidesToScroll: 3,
					infinite: true,
					dots: false
				}
				},
				{
				breakpoint: 600,
				settings: {
					slidesToShow: 2,
					slidesToScroll: 2
				}
				},
				{
				breakpoint: 480,
				settings: {
					slidesToShow: 2,
					slidesToScroll: 1
				}
				}
				// You can unslick at a given breakpoint now by adding:
				// settings: "unslick"
				// instead of a settings object
				]
				});
			});



		$('.dropify').dropify();

///////////////////// Editar campos ////////////////////
	$('.text-input-cat').change(function(e) {

		var id = $(this).attr("data-id");
		var campo = $(this).attr("data-campo");
		var valor = ($(this).val());
		var tcsrf = $('meta[name="csrf-token"]').attr('content');
		console.log(valor,id,campo);

		$.ajax({
			// url: '/advanced/varios/editarajax',
			url: 'cattext',
			type: 'post',
			dataType: 'json',
			data: {
				"id": id,
				"_method": 'post',
				"_token": tcsrf,
				"campo": campo,
				"valor": valor
			}
		})
		.done(function(msg) {
			console.log(msg);
			if (msg.success) {
				toastr["success"]("Guardado Exitosamente");
			}else {
				toastr["error"]("Error al actualizar");
			}
		})
		.fail(function(msg) {
			console.log("error:");
			console.log(msg);
			toastr["error"]("Error al actualizar");
		});


	});
///////////////////// Editar campos ////////////////////

///////////////////// Eliminar categoria ////////////////////
	$('.del-cat').parent().click(function(e) {
			var id = $(this).attr('data-id');
			$("#id_cat_del").val(id);
			console.log(id);
		});

	$('.btn_cat_del').click(function(e) {
		$('#form_cat_del').submit();
	});
///////////////////// Eliminar categoria ////////////////////



});

///////////////////// Editar campos categoria ////////////////////
	$('.select-cat').change(function(e) {

	var id = $(this).attr("data-id");
	var valor = $(this).val();
	var tcsrf = $('meta[name="csrf-token"]').attr('content');
	console.log(id,valor);

	$.ajax({
			// url: '/advanced/varios/editarajax',
			url: 'selectcat',
			type: 'post',
			dataType: 'json',
			data: {
				"id": id,
				"_method": 'post',
				"_token": tcsrf,
				"valor": valor
			}
		})
		.done(function(msg) {
			console.log(msg);
			if (msg.success) {
				toastr["success"]("Guardado Exitosamente");
			}else {
				toastr["error"]("Error al actualizar");
			}
		})
		.fail(function(msg) {
			console.log("error:");
			console.log(msg);
			toastr["error"]("Error al actualizar");
		});


	});
///////////////////// Editar campos categoria ////////////////////

///////////////////// Editar campos imegn categoria ////////////////////
	$('.input_img_cat').change(function(e) {

		var id = $(this).attr("data-id");
		console.log(id);
		$('#form_image_cat'+id).trigger('submit');

	});
///////////////////// Editar campos imegn categoria ////////////////////

///////////////////// Editar campos de texto ////////////////////
	$('.text-input-prod').change(function(e) {

	var id = $(this).attr("data-id");
	var campo = $(this).attr("data-campo");
	var valor = ($(this).val());
	var tcsrf = $('meta[name="csrf-token"]').attr('content');
	console.log(valor,id,campo);

	$.ajax({
		// url: '/advanced/varios/editarajax',
		url: 'prodtext',
		type: 'post',
		dataType: 'json',
		data: {
			"id": id,
			"_method": 'post',
			"_token": tcsrf,
			"campo": campo,
			"valor": valor
		}
	})
	.done(function(msg) {
		console.log(msg);
		if (msg.success) {
			toastr["success"]("Guardado Exitosamente");
		}else {
			toastr["error"]("Error al actualizar");
		}
	})
	.fail(function(msg) {
		console.log("error:");
		console.log(msg);
		toastr["error"]("Error al actualizar");
	});


	});
///////////////////// Editar campos de texto ////////////////////

$('.select_icon').change(function(e) {

	var id = $(this).attr("data-id");
	var tcsrf = $('meta[name="csrf-token"]').attr('content');
	var valor = ($(this).val());

	$.ajax({
			// url: '/advanced/varios/editarajax',
			url: 'selecticon',
			type: 'post',
			dataType: 'json',
			data: {
				"id": id,
				"_method": 'post',
				"_token": tcsrf,
				"valor": valor
			}
		})
		.done(function(msg) {
			console.log(msg);

			if (msg.success) {
				toastr["success"](msg.mensaje);
				setTimeout(function () { location.reload(); }, 1000);
			}else {
				Swal.fire({
				icon: 'error',
				title: 'Oops...',
				text: msg.mensaje,
				})
			}
		})
		.fail(function(msg) {
			console.log("error:");
			console.log(msg);
			Swal.fire({
				icon: 'error',
				title: 'Oops...',
				text: 'Error inesperado',
				})
		});

});
	
function agrserv(){

		var tcsrf = $('meta[name="csrf-token"]').attr('content');

		$.ajax({
				url: 'agrserv',
				type: 'post',
				dataType: 'json',
					data: {
						"id": '1',
						"_method": 'post',
						"_token": tcsrf,
					}
			})
			.done(function(msg) {

				if (msg.success) {
					toastr["success"]("Agregado Exitosamente");
					setTimeout(function () { location.reload(); }, 1000);
				}else {
					toastr["error"]("Error al agregar");
					
				}
			})

}

$('.checkB').change(function(e) {

	var id = $(this).attr("data-id");
	var valor = ($(this).prop('checked'));
	var tcsrf = $('meta[name="csrf-token"]').attr('content');
	console.log(valor);

	$.ajax({
		// url: '/advanced/varios/editarajax',
		url: 'checkb',
		type: 'post',
		dataType: 'json',
		data: {
			"id": id,
			"_method": 'post',
			"_token": tcsrf,
			"valor": valor
		}
	})
	.done(function(msg) {
		console.log(msg);

		if (msg.success) {
			toastr["success"](msg.mensaje);
			setTimeout(function () { location.reload(); }, 1000);
		}else {
			Swal.fire({
			icon: 'error',
			title: 'Oops...',
			text: msg.mensaje,
			})
		}
	})
	.fail(function(msg) {
		console.log("error:");
		console.log(msg);
		Swal.fire({
			icon: 'error',
			title: 'Oops...',
			text: 'Error inesperado',
			})
	});




});

$('.fa-trash-alt').parent().click(function(e) {
				var id = $(this).attr('data-id');
				$("#idser").val(id);
				
			});
			$('.dels').click(function(e) {
				$('#deletserv').submit();
			});
</script>
@endsection
