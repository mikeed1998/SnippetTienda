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

	
    <div class="col-12 my-5 d-flex justify-content-center align-items-center flex-column" style="">
        <div class="col-12 my-5 text-center d-flex justify-content-center align-items-center flex-column">
            <p class="mt-5" style="font-size: 4.5rem; font-family: 'Courier New', Courier, monospace; color: #909986;">CONTACTO</p>
			<div class="col-6">
				<div class="col-12 mb-2 text-center"><i class="fa-solid fa-pencil" style="font-size: 1.5rem;"></i></div>
				<textarea class="col-12 text-center editar_text_seccion_global" data-url="{{route('config.seccion.textglobalseccion')}}" data-id="{{$elements[0]->id}}" data-table="elemento" data-campo="texto" name="" id="" cols="30" rows="3" style="border-radius: 10px; border:none; background: #ededed">{{$elements[0]->texto}}</textarea>
			</div>
        </div>
        <form action="" method="POST" class="container d-flex flex-column align-items-center">
            @csrf
            <div class="col-12 d-flex mb-3 justify-content-center flex-wrap">

                <div class="col-4 pe-2">
                    <div class="input-group">
                        <input type="text" class="form-control" name="nombre" placeholder="Nombre" aria-label="" aria-describedby="" style="height: 80px;">
                      </div>
                </div>
                <div class="col-4 ps-2">
                    <div class="input-group">
                        <input type="text" class="form-control" name="empresa" placeholder="Empresa" aria-label="" aria-describedby="" style="height: 80px;">
                      </div>
                </div>

            </div>

            <div class="col-12 d-flex justify-content-center flex-wrap">

                <div class="col-4 pe-2">
                    <div class="input-group">
                        <input type="text" class="form-control" name="telefono" placeholder="Telefono" aria-label="" aria-describedby="" style="height: 80px;">
                      </div>
                </div>
                <div class="col-4 ps-2">
                    <div class="input-group">
                        <input type="email" class="form-control" placeholder="Email" aria-label="" aria-describedby="" style="height: 80px;">
                      </div>
                </div>

            </div>

            
            <div class="col-8 my-3">
                <div class="input-group" style="position: relative;">
                    <textarea class="form-control" placeholder="Mensaje" name="" id="" cols="30" rows="6"></textarea>
                  </div>
            </div>

            <div class="col-12">
                <div class="col-12 p-2 d-flex justify-content-center align-items-center" style="">
                    <button class="btn btn-primary px-5 py-3" style="background: #909986 !important; border:none; height: 100%; width: 250px;">ENVIAR</button>
                </div>
            </div>
        </form>

    </div>

	<style>
		.cont_map iframe{
            width: 100% !important;
        }
	</style>

<div class="col-12 my-5 text-center d-flex justify-content-center align-items-center flex-column">
	<p class="mt-5" style="font-size: 2.5rem; font-family: 'Courier New', Courier, monospace; color: #909986;">Pega aqui tu iframe del mapa</p>
	<div class="col-10">
		<div class="col-12 mb-2 text-center"><i class="fa-solid fa-pencil" style="font-size: 1.5rem;"></i></div>
		<textarea class="col-12 text-center editar_text_seccion_global" data-url="{{route('config.seccion.textglobalseccion')}}" data-id="{{$elements[1]->id}}" data-table="elemento" data-campo="texto" name="" id="" cols="30" rows="3" style="border-radius: 10px; border:none; background: #ededed">{{$elements[1]->texto}}</textarea>
	</div>
</div>

    <div class="col-12 cont_map">
        {!!$elements[1]->texto!!}
    </div>



@endsection
@section('jsLibExtras2')
<script src="{{asset('js/dropify.js')}}" charset="utf-8"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
@endsection
@section('jqueryExtra')
<script type="text/javascript">

///////////////////// Editar campos ////////////////////
$('#id_iframe_change').change(function(e) {

var valor = ($(this).val());

console.log(valor);

$("#cont_iframe_map").html(valor);

});

$('#text-iframe').change(function(e) {

var valor = ($(this).val());

console.log(valor);

$("#cont_iframe_map_div").html(valor);

});
///////////////////// Editar campos ////////////////////


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
