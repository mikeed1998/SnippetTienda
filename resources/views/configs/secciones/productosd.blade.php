@extends('layouts.admin')

@section('cssExtras')
	<link rel="stylesheet" href="{{asset('css/dropify.css')}}">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
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
@endsection

{{-- contenido de la pagina --}}
@section('content')

<div class="col-12 text-center mb-3 py-2" style="background: black; border-radius: 46px;">
	<h3 style="color: white;">Editar producto</h3>
</div>


<div class="col-12 d-flex flex-column flex-md-row flex-lg-row p-5" style="position: relative; background: #f2f2f2;">

		<style>
			.trash{
				opacity: 100%;
				transition: 0.5s all;
			}
			.trash:hover{
				opacity: 90%;
				color: red;
			}
		</style>

		<form action="{{route('config.seccion.elimp')}}" method="POST">
			@csrf
			<input type="text" name="id_p" value="{{$producto->id}}" hidden>
			<button type="submit" style="background: none; border:none;" ><i class="fa-solid fa-trash trash" style="position: absolute; top: 30px; right: 30px; font-size:30px;"></i></button>
		</form>
		

	
    <div class="col-12 col-md-6 col-lg-6 d-flex justify-content-center align-items-center flex-column">
        <div class="card p-4 galImg" style="position: ; border-radius: 10px; width: 500px; height: 600px;">
			<img src="{{asset('img/photos/productos/'.$producto->portada)}}" style="width: 100%; height: 100%; border-radius: 5px;"  alt="">
			@foreach($prodGaleria as $imgp)

			<img src="{{asset('img/photos/productos/'.$imgp->image)}}" style=" width: 100%; height: 100%; border-radius: 5px;"  alt="">

			@endforeach
        </div>
		<div class="col-12 d-flex justify-content-center align-items-center">
			<div class="col-12">
				<div  class="col-12 d-flex justify-content-center align-items-center flex-column" style="position: relative; background: ;">
                    <div class="col-12 text-center d-flex justify-content-center flex-column"  style=""><h5 class="pt-3" style="">Añadir Imagenes al slider</h5>
                    <div><button style="background: none !important; border:none;" data-bs-toggle="modal" data-bs-target="#AddImage" onclick="addidprod('{{$producto->id}}')"><i class="fa-solid fa-circle-plus botonopacity" onclick="modalAgregarHorario('${id}')" style="font-size: 2rem;"></i></button></div></div></div>
			</div>
		</div>
    </div>
    <div class="col-12 col-md-6 col-lg-6 pb-4 pt-0 px-0 px-md-5 px-lg-5 d-flex justify-content-start">
		
        <div class="col-12" style="border-radius: 5px; ">
			<form id="Form_portada" action="{{route('config.seccion.adPortada')}}" method="POST" class="col-12 mb-3 d-flex justify-content-center flex-column" style="height: 120px;" enctype="multipart/form-data">
				@csrf
				<input type="text" name="id_prod" value="{{$producto->id}}" hidden>
				<div class="col-12 text-center">
					<h5>Portada producto</h5>
				</div>
				<input type="file" name="uploadedfile" id="up_file_portada" class="dropify" style="border-radius:10px !important;" data-allowed-file-extensions="jpg png jpeg">
			</form>
            <div class="col-12 text-start" style="background: ;">
				
                <h4 class="" style="background: ;"><textarea class="card col-12 editar_text_seccion_global" style="box-shadow:none; outline: none; border-radius: 13px;" data-id="{{$producto->id}}" data-url="{{route('config.seccion.textglobalseccion')}}" data-table="Producto" data-campo="nombre" name="" id="" cols="" rows="1">{{$producto->nombre}}</textarea></h4>
                <hr>
                <p class="col-12 px-0" style="font-size: 12px; height: 150px;"><textarea class="card col-12 editar_text_seccion_global" style="outline: none; box-shadow:none; border-radius: 13px;" data-id="{{$producto->id}}" data-url="{{route('config.seccion.textglobalseccion')}}" data-table="Producto" data-campo="descripcion" name="" id="" cols="" rows="8">{{$producto->descripcion}}</textarea></p>
                <div class="col-12 d-flex px-0">
                    <div class="col-6">
                        <h4>Color</h4>
                        <div class="col-12 mx-0 py-1 px-2 d-flex justify-content-between" style="background: #d0d0d0; border-radius: 26px;">
                            <div id="color-circle" class="my-auto me-2" style=" border: 2px solid white; background: {{$color->color}}; width:25px; height:25px; border-radius: 50%; "></div>
							<div class="col-10 px-0 mx-0">
								<select id="select-color" class="form-select my-auto editar_text_seccion_global" name="" data-id="{{$producto->id}}" data-url="{{route('config.seccion.textglobalseccion')}}" data-table="Producto" data-campo="color" aria-label="Default select example" style="border-radius: 16px;">
									<option selected>Color</option>
									@foreach($colores as $c)
									<option data-color="{{$c->color}}" value="{{$c->id}}">{{$c->nombre}}</option>
									@endforeach
								  </select>
							</div>
                        </div>
                    </div>
                    <div class="col-6">
                        <h4>Cantidad</h4>
                        <div class="col-auto px-1 mx-0 py-1 d-flex align-items-center" style="background: #d0d0d0; border-radius: 26px;">
                            <textarea class="form-control col-12 my-auto editar_text_seccion_global" data-id="{{$producto->id}}" data-url="{{route('config.seccion.textglobalseccion')}}" data-table="Producto" data-campo="cantidad" name="" id=""  rows="1" style="border-radius: 16px;">{{$producto->cantidad}}</textarea>
                        </div>
                    </div>
                </div>
                <div class="col-12 mt-3" >
					<div class="col-6 d-flex py-1 px-1" style="background: #d0d0d0; border-radius: 26px;">
						<h4 class="my-auto mx-2">$</h4>
						<textarea class="form-control editar_text_seccion_global" data-id="{{$producto->id}}" data-url="{{route('config.seccion.textglobalseccion')}}" data-table="Producto" data-campo="precio" style="border-radius: 16px;" name="" id=""  rows="1">{{$producto->precio}}</textarea>
					</div>

                </div>
                {{-- <div class="col-12 mt-5 d-flex">
                    <button class="px-5 py-3 btn btn-primary me-3 col-12" style="background: #868f99 !important; border:none;"><h4 class="my-auto">Cambiar	portada</h4></button> 
                </div> --}}

				<div class="col-12 my-4 d-flex justify-content-center align-items-center text-center flex-column">
					<input id="input-disable-cate" type="text" class="form-control text-center mb-3" value="Categoria : @if(!empty($categoria)) {{$categoria->nombre}} @else No hay categoria agregada @endif " disabled>
					<div class="col-12">
						<select id="select-cate" class="form-select mb-2 editar_text_seccion_global" data-id="{{$producto->id}}" data-url="{{route('config.seccion.textglobalseccion')}}" data-table="Producto" data-campo="categoria" name="" aria-label="Default select example">
							<option selected>Categoria</option>
							@foreach($categorias as $c)
							<option data-cate="{{$c->nombre}}" value="{{$c->id}}">{{$c->nombre}}</option>
							@endforeach
						  </select>
					</div>
				</div>


            </div>
        </div>
    </div>
</div>

{{-- detalle producto --}}

{{-- store titulo productos --}}

{{-- <div class="col-12">
    <div class="col-12 mt-5 mx-5 text-center">
        <p class="mt-5" style="font-size: 3.5rem; font-family: 'Courier New', Courier, monospace; color: #909986;">RELACIONADOS</p>
    </div>
</div> --}}

{{-- store titulo productos --}}


{{-- store productos --}}

{{-- <div class="col-12 my-0">

    <div class="container mb-5 d-flex flex-wrap">

        @for($i = 1 ; $i <= 4 ; $i++)
        <div class="col-3 p-4">
            <a href="{{url('detprod')}}" class="col-12" style="text-decoration: none; color: black;">
            <div class="card p-3 d-flex justify-content-center align-items-center" style="height: 300px;">
                <img src="{{asset('img/design/producto02.png')}}" style="width: 90%;" alt="">
            </div>
            <hr>
            <div class="col-12 d-flex flex-column" style="text-align: justify;">
                <h5 style="">Nuevo producto</h5>
                <p>$4,000</p>
            </div>
        </a>
        </div>
        @endfor

    </div>

</div> --}}

<!-- Modal Agregar imagenes -->
<form action="{{route('config.seccion.addmultiimage')}}" method="POST" class="modal fade" id="AddImage" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" enctype="multipart/form-data">
	@csrf
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content" style="border-radius: 16px;">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar imagen al carrucel</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
			<input id="id_prod_input" type="text" name="id_prod" value="" hidden>
			<input type="file" name="uploadedfile[]" id="uploadedfile" class="dropify" style="border-radius:10px !important;" data-allowed-file-extensions="jpg png jpeg" multiple>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" style="background: red !important; border:none;" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary" style="border:none; background: #3a3a3a !important;">Guardar</button>
      </div>
    </div>
  </div>
</form>
<!-- Modal Agregar imagenes -->
@endsection
{{-- contenido de la pagina --}}

@section('jsLibExtras2')
	<script src="{{asset('js/dropify.js')}}" charset="utf-8"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js" ></script>
@endsection

@section('jqueryExtra')
<script type="text/javascript">



	function addidprod(id){
		$('#id_prod_input').val(id);
	}
	

	$('#select-color').change(function(e) {
		var color = $(this).find(":selected").data("color");
		$('#color-circle').css('background', color);
	});

	$('#select-cate').change(function(e) {
		var categoria = $(this).find(":selected").data("cate");
		$('#input-disable-cate').val('Categoria : '+categoria);
	});


	$('#up_file_portada').change(function(e) {
		$('#Form_portada').submit();
	});

	$('.dropify').dropify();

	$('.galImg').slick({
            dots:true,
            infinite: false,
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: false,
            autoplaySpeed: 2000,
            });
	
</script>
@endsection
