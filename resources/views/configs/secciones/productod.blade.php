@extends('layouts.admin')
@section('cssExtras')
	<link rel="stylesheet" href="{{asset('css/dropify.css')}}">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
@endsection
@section('jsLibExtras')

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
</style>
@endsection
@section('content')
	<div class="row mb-4 px-2">
		<a href="{{ route('config.seccion.index') }}" class="col col-md-2 btn btn-sm grey darken-2 text-white mr-auto"><i class="fa fa-reply"></i> Regresar</a>
	</div>
	
	<div class="col-12 p-2" style="background: white; border-radius: 26px;">

		<div class="col-12 mt-0 mb-5 d-flex justify-content-center align-items-center" style="background: rgba(0, 0, 0, 0.75); border-top-left-radius: 16px; border-top-right-radius: 16px;">
            <p class="my-auto" style=" font-size: 30px; color: white;">
                Productos
            </p>
        </div>

		
		
	<div class="col-12 my-5 p-0 p-md-5 d-flex justify-content-center align-items-center" style="position: ; z-index: 1000; ">
		<div class="cont_c col-12 mx-5 px-1 px-md-4 py-3 d-flex align-items-center row flex-column flex-sm-row" style="background: ; border-radius: 26px; position: ; height: 100%; background: rgb(255, 255, 255);  box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.19) ;">
			{{-- <div class="col-4" style="height: 55%; position: absolute; background: #d89d8f;">

			</div> --}}
			<div class="cont-img col-12 col-md-12 col-lg-5 p-0 p-md-3 d-flex justify-content-center align-items-center flex-column" style="min-height: 100%; background-repeat: no-repeat; background-size: 100%; background-image: url({{asset('img/photos/seccions/fondo_detalle.png')}});">
				<div class="multiple-itemss col-12 col-md-10 p-2 p-md-5 d-flex justify-content-center align-items-center" style="background: white; height: 100%;  box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.112) ; border-radius: 26px; min-height: ;">
					@foreach($productos_photos as $prodf)
                        <div class="d-flex justify-content-center align-items-center" style="">
                            <img src="{{asset('img/photos/productos/'.$prodf->image)}}" width="100%;" alt="">
                            {{-- <div class="justify-content-center align-items-center flex-column" style="position: absolute; width: 100%; background: #3a3a3a3e; color: white; backdrop-filter: blur(5px);">
                                <h5>Eliminar imagen</h5><i class="fas fa-trash"></i>
                            </div> --}}
                        </div>
                    @endforeach
				</div>
                <div class="col-12 mt-3 p-3 d-flex justify-content-center align-items-center flex-column" >
                    <h5 class="col-10 text-center mb-3" style="color: white;">Agregar fotos al producto</h5>
                    {{-- html del input file estilizado --}}
                        <form id="form_portada_prod" action="productogaleria/{{$producto->id}}" method="POST" class="file-upload px-auto col-7" style="position: ; left: 5px; right: 5px; top: 5px; bottom: 5px; font-size: 10px; " enctype="multipart/form-data">
                        @csrf
                            <input id="input_portada_prod" class="m-0 p-0" type="file" name="archivo">
                            <label class="col-12 m-0 px-2  d-flex justify-content-center align-items-center" for="input_portada_prod" style=" height: 100%; opacity: 100%;   border-radius: 20px;">Seleccionar archivo</label>
                        </form >
                    {{-- html del input file estilizado --}}
                    <script>
                        ///////////////////// Editar campos imegn categoria ////////////////////
                        $('#input_portada_prod').change(function(e) {
                        $('#form_portada_prod').trigger('submit');
                        });
                        ///////////////////// Editar campos imegn categoria ////////////////////
                    </script>
                </div>
			</div>
			<div class="col-12 col-md-12 col-lg-7 d-flex justify-content-center align-items-center" style="height: 100%; background: ;">
				<div class="cont_text_c col-12 d-flex justify-content-center row flex" style="background: rgb(255, 255, 255); height: 80%;  border-radius: 26px;">
					<div class="col-12 mt-5 my-md-4 text-center text-md-start"><textarea class="titulo_p text-input-prod col-12 mx-1 mx-md-2" data-id="{{$producto->id}}" data-campo="nombre" rows="1" style="font-size: 35px; color: #d89d8f; font-weight: bold; border:none; outline: none !important; border-radius: 13px; background: #3a3a3a0e;">{{$producto->nombre}}</textarea></div>
					<div class="col-12 my-4"><textarea class="text-input-prod col-12 mx-1 mx-md-2" data-id="{{$producto->id}}" data-campo="descripcion"  rows="8" style="font-size: 15px;  font-weight: bold; text-align: justify; border:none !important; outline: none !important; border-radius: 13px; background: #3a3a3a0e;">{{$producto->descripcion}}</textarea></div>
					<div class="col-12 my-2 text-center text-md-start"><textarea class="text-input-prod col-3 mx-1 mx-md-2" data-id="{{$producto->id}}" data-campo="precio"  rows="1" style="font-size: 20px; color: #d89d8f; font-weight: bold; border:none !important; outline: none !important; border-radius: 13px; background: #3a3a3a0e;">{{$producto->precio}}</textarea></div>
					{{-- <div class="col-12 ms-0 ms-md-4 ms-lg-0 my-2 d-flex row align-items-center justify-content-center justify-content-md-start"><p class="mx-3 my-auto col-1 d-flex align-items-center justify-content-center" style="font-size: 15px; color: ; font-weight: bold;">Cantidad</p> <textarea name="" id="" class="col-2 text-center" data-id="" data-campo="cantidad" rows="1" style="border:none !important; outline: none !important; border-radius: 13px; background: #3a3a3a0e;">1</textarea></div> --}}
					<div class="col-12 my-4 d-flex justify-content-center justify-content-md-start">
						{{-- <button class="regresar btn btn-primary mx-4" style="border-radius: 20px; border:3px solid #d89d8f; background: white; color: #d89d8f;">Regresar</button><button class="comprar btn btn-primary" style="border-radius:20px; border:3px solid #d89d8f; background: #d89d8f; color: white;">Comprar</button> --}}
					</div>
				</div>
			</div>

		</div>
    </div>

	</div>


	<div class="modal fade bottom" id="frameModalDelcat" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-frame modal-top" role="document">
			<div class="modal-content">
				<div class="modal-body bg-danger" style="background: #3a3a3a !important;">
					<div class="row d-flex justify-content-center align-items-center">
						<p class="pt-3 pr-2 text-white text-center text-lg-left">
							Eliminar Categoria
							<br>
						{{-- </p>
						<p class="pt-3 pr-2 text-white text-uppercase"> --}}
							<span class=" text-white text-uppercase font-weight-bolder">
								Seguro que quieres eliminar esta Categoria?
							</span>
						</p>
						<button type="button" class="col-2 btn btn-secondary" data-dismiss="modal">Cerrar</button>
						<button type="button" class="col-2 btn red darken-3 text-white btn_cat_del">Eliminar</button>
						<form id="form_cat_del" action="del_cat" method="POST" style="display: none;">
								@csrf
								<input type="hidden" id="id_cat_del" name="id_cat" value="">
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade bottom" id="frameModalDelProd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-frame modal-top" role="document">
			<div class="modal-content">
				<div class="modal-body bg-danger" style="background: #3a3a3a !important;">
					<div class="row d-flex justify-content-center align-items-center">
						<p class="pt-3 pr-2 text-white text-center text-lg-left">
							Eliminar producto
							<br>
						{{-- </p>
						<p class="pt-3 pr-2 text-white text-uppercase"> --}}
							<span class=" text-white text-uppercase font-weight-bolder">
								Seguro que quieres eliminar este producto?
							</span>
						</p>
						<button type="button" class="col-2 btn btn-secondary" data-dismiss="modal">Cerrar</button>
						<button type="button" class="col-2 btn red darken-3 text-white btn_prod_del">Eliminar</button>
						<form id="form_prod_del" action="del_prod" method="POST" style="display: none;">
								@csrf
								<input type="hidden" id="id_prod_del" name="id_prod" value="">
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>


	
@endsection
@section('jsLibExtras2')
<script src="{{asset('js/dropify.js')}}" charset="utf-8"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js" ></script>
@endsection
@section('jqueryExtra')
<script type="text/javascript">
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

    $('.multiple-itemss').slick({
            dots:true,
            infinite: false,
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
		url: '../prodtext',
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
