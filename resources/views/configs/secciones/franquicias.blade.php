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

	.seccionnoed{
		opacity: 30%;
		transition: all 0.5s;
	}
	.seccionnoed:hover{
		opacity: 100%;
		transition: all 0.5s;
	}

	.seccionnoed0{
		opacity: 0%;
		transition: all 0.5s;
	}
	.seccionnoed0:hover{
		opacity: 100%;
		transition: all 0.5s;
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
</style>
@endsection
@section('content')
	<div class="row mb-4 px-2">
		<a href="{{ route('config.seccion.index') }}" class="col col-md-2 btn btn-sm grey darken-2 text-white mr-auto"><i class="fa fa-reply"></i> Regresar</a>
	</div>

	<div class="col-12 px-0" style="background: white;">
		<div class=" col-12 pt-5 d-flex justify-content-center" style="height: ; background: #c30034; position: relative;">
			<div class="col-12 pt-5" style="height: 100% ; background-size: 100%; z-index: 0; bottom: 0; background-repeat: no-repeat; background-image: url({{asset('img/assets/fondo.png')}}); position: absolute; top:0; ">
	
			</div>
	
			<div class="col-11 mt-4 d-flex justify-content-center" style="z-index: 2;">
				<div style="position: relative;">
					<img src="{{empty($elements[0]->imagen) ? '/img/assets/franquicias_fondo.png' : '/img/photos/seccions/'.$elements[0]->imagen}}" style=" width: 95%;" alt="">
					{{-- html del input file estilizado --}}
					<form id="form_fondo_principal" action="imgPortadaGlobal" method="POST" class="file-upload px-auto" style="width: 95%; position: absolute; left: 0; right: 0; top: 0; bottom: 0; font-size: 10px; " enctype="multipart/form-data">
						@csrf
						<input type="text" name="id_element" value="{{$elements[0]->id}}" hidden>
						<input id="Input_fondo_principal" class="m-0 p-0" type="file" name="archivo">
						<label class="col-12 m-0 px-2  d-flex justify-content-center align-items-center" for="Input_fondo_principal" style=" height: 100%; ">Seleccionar archivo</label>
					</form >
				{{-- html del input file estilizado --}}
				</div>
				
			</div>
	
	
			<div class="cont_circle col-11 d-flex justify-content-center" style="position: absolute; bottom: -250px; z-index: 3;">
				<div class="circle_slider d-flex justify-content-center align-items-center" style="background: #c30034; width: 500px; height: 500px; border-radius: 100%;">
					<img class="img_circle" src="{{asset('img/assets/titulo_franquicias.png')}}" style="width: 60%; margin-top: -200px;" alt="">
				</div>
			</div>
	
		</div>
	<div class="col-12" style="background: #c30034;">
		{{-- seccion de productos del inicio --}}
			<div class="container pt-5 " style=" z-index: 4; position: relative; ">
	
	
	
			</div>
		{{-- seccion de productos del inicio --}}
	
	
	
		{{-- Seccion nosotros --}}
	
	
			<div class="col-12 p-0 d-flex justify-content-center flex-column " style="height: ; z-index: 50; position: relative; ">
	
				<div class="col-12 d-flex justify-content-center align-items-center">
					<div class="col-12 col-md-12 col-lg-7 p-3 p-md-5 d-flex justify-content-center align-items-center text-center flex-column " style="z-index: 2;">
						<div class="col-12 d-flex justify-content-between align-items-center">
							<div class="col-12" style="background: #ffc558; height: 2px;"></div>
						</div>
						<form class="col-12 col-md-12 mt-3" action="textglobalseccion"  method="POST" >
                            @csrf
							<input type="text" name="id" value="{{$elements[1]->id}}" hidden>
                            <input type="text" name="tabla" value="Elemento" hidden>
                            <input type="text" name="campo" value="texto" hidden>
                            <input type="text" name="form" value="1" hidden>
                            <textarea name="valor"id="" rows="10" class="texteditor  col-12 form-control" style="resize:none;" >{{$elements[1]->texto}}</textarea>
                            <button type="submit" class="col-4 my-3 btn btn-primary" style="background: #ff5c5a !important; border-radius: 26px; border-color: #ff5c5a;">Guardar</button>
                        </form>
						<div class="col-12 mt-0 d-flex justify-content-center align-items-center">
							<div class="col-12 d-flex justify-content-between align-items-center">
								<div class="col-5" style="background: #ffc558; height: 2px;"></div>
								<div class="col-auto">
									<img src="{{asset('img/assets/icono_menú.png')}}" alt="">
								</div>
								<div class="col-5" style="background: #ffc558; height: 2px;"></div>
							</div>
						</div>
					</div>
				</div>
	
				<div class="col-12 col-md-12 col-lg-12 py-0 my-0 d-flex justify-content-center align-items-end" style="position: relative; background: ; z-index: 2;">
					<img class="col-6 col-md-12" src="{{asset('img/assets/pan_franquicia.png')}}" style="position: relative; top:0; width: 60%;" alt="">
				</div>
	
				<div class="col-12" style="position: absolute; bottom: 0; background: #c30034; height: 300px; ">
	
				</div>
	
			</div>
	
		{{-- Seccion nosotros --}}
	
		{{-- seccion franquisias --}}
	
			<div class="col-12 pt-5 d-flex justify-content-center align-items-center" style=" position: relative; background-size: cover; background-repeat: no-repeat; background-image: url({{asset('img/assets/imagen_01.png')}}); ">
				
				<div class="col-md-8 col-lg-11 p-4 my-5 mx-3 d-flex justify-content-center flex-column" style="background: #c30034e1;  z-index: 2; border-radius: 26px;">
					<div class="col-12 d-flex justify-content-center">
						<h1 class="col-12 col-lg-6 text-center my-3" style="font-weight: bold; color: white;">¿LISTO PARA RODAR CON NOSOTROS?</h1>
					</div>
	
					<div class="col-12 d-flex justify-content-center">
						<form class="col-12 col-lg-8 text-center" action="textglobalseccion"  method="POST" >
                            @csrf
							<input type="text" name="id" value="{{$elements[2]->id}}" hidden>
                            <input type="text" name="tabla" value="Elemento" hidden>
                            <input type="text" name="campo" value="texto" hidden>
                            <input type="text" name="form" value="1" hidden>
                            <textarea name="valor"id="" rows="10" class="texteditor  col-12 form-control" style="resize:none;" >{{$elements[2]->texto}}</textarea>
                            <button type="submit" class="col-4 my-3 btn btn-primary" style="background: #ff5c5a !important; border-radius: 26px; border-color: #ff5c5a;">Guardar</button>
                        </form>
					</div>
					<div class="col-12 d-flex justify-content-center">
						<h4 class="col-12 col-lg-4 my-auto text-center p-2 mx-suto" style="font-weight: bold; color: white; border: 3px solid white; border-radius: 10px;">BRECOME A PARTNER</h4>
					</div>
	
				</div>
	
			</div>
	
		{{-- seccion franquisias --}}
	
	
	</div>
	
	</div>


@endsection
@section('jsLibExtras2')
<script src="{{asset('js/dropify.js')}}" charset="utf-8"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
@endsection
@section('jqueryExtra')
<script type="text/javascript">
	$(document).ready(function() {
		$('.dropify').dropify();

		$('.fa-trash-alt').parent().click(function(e) {
				var id = $(this).attr('data-id');
				$("#ipdel").val(id);
				console.log(id);
			});

///////////////////// Editar campos ////////////////////
		$('.input-txt').change(function(e) {

            var id = $(this).attr("data-id");
            var campo = $(this).attr("data-campo");
            var valor = ($(this).val());

             console.log(id,valor,campo);


            $.ajax({
                url: '',
                type: 'post',
                data: {
                    "id": id,
                    "campo": campo,
                    "valor": valor,
                }
            })
            .done(function(msg) {
                console.log(msg);

                if (msg == "success") {
                    toastr["success"]("Guardado Exitosamente");
                }else {
                    toastr["error"]("Error al actualizar");
                    setTimeout(function () { location.reload(); }, 1000);
                }
            })

            });
///////////////////// Editar campos ////////////////////

			

	});
</script>
@endsection
