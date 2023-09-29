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


    .seccionnoed0{
		opacity: 0%;
		transition: all 0.5s;
	}

	.seccionnoed0:hover{
		opacity: 100%;
		transition: all 0.5s;
	}

    .seccionnoed0:hover .letra{
		opacity: 100%;
		transition: all 0.5s;
	}



    textarea:focus-visible{
        border-radius: 16px;
        border: 1px solid rgba(0, 0, 0, 0.167) !important;
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

<style>
    .container::-webkit-scrollbar {
        width: 8px;     /* Tamaño del scroll en vertical */
        height: 8px;    /* Tamaño del scroll en horizontal */
        display: none;  /* Ocultar scroll */
    }

    .container::-webkit-scrollbar-thumb {
        background: #ccc;
        border-radius: 4px;
    }

    /* Cambiamos el fondo y agregamos una sombra cuando esté en hover */
    .container::-webkit-scrollbar-thumb:hover {
        background: #b3b3b3;
        box-shadow: 0 0 2px 1px rgba(0, 0, 0, 0.2);
    }

    /* Cambiamos el fondo cuando esté en active */
    .container::-webkit-scrollbar-thumb:active {
        background-color: #999999;
    }

    .container::-webkit-scrollbar-track {
        background: #e1e1e1;
        border-radius: 4px;
    }

    /* Cambiamos el fondo cuando esté en active o hover */
    .container::-webkit-scrollbar-track:hover,
    .container::-webkit-scrollbar-track:active {
    background: #d4d4d4;
    }
</style>
@endsection
@section('content')
        <div class="row mb-4 px-2">
            <a href="{{ route('config.seccion.index') }}" class="col col-md-2 btn btn-sm grey darken-2 text-white mr-auto"><i class="fa fa-reply"></i> Regresar</a>
        </div>

    <div class="col-12 p-1" style="background: white; border-radius: 16px;">

        <div class="col-12 mt-0 mb-5 d-flex justify-content-center align-items-center" style="background: rgba(0, 0, 0, 0.75); border-top-left-radius: 16px; border-top-right-radius: 16px;">
            <p class="my-auto" style=" font-size: 30px; color: white;">
                NOSOTROS
            </p>
        </div>

        <div class="col-12 my-5 d-flex justify-content-center align-items-center row">
            <div class="col-12 col-md-12 col-lg-6 ">
                <div class="col-12 px-3 px-md-5 px-lg-5"><p style="font-size: 30px; font-weight: lighter;">SOBRE <br> NOSOTROS</p></div>
                <div class="col-12 px-3 px-md-0 px-lg-0">

                        <form class="col-12" action="textareaup/{{$elements[0]->id}}"  method="POST" >
                            @csrf
                            <textarea name="textareaup"id="" rows="10" class="texteditor  col-12 form-control" style="resize:none;" >{{$elements[0]->texto}}</textarea>
                            <button type="submit" class="col-4 my-3 btn btn-primary" style="background: #d89d8f !important; border-radius: 26px; border-color: #d89d8f;">Guardar</button>
                        </form>
                </div>
            </div>
            <div class="col-12 col-md-6">
                    <div class="col-12 col-lg-12 d-flex justify-content-center align-items-center">
                        <img class="img_nos" src="{{asset('img/photos/seccions/'.$elements[1]->imagen)}}" width="500px;" height="500px;" style="border-radius: 100%;" alt="">
                    {{-- html del input file estilizado --}}
                        <form id="form_image_element" action="upelementimg/{{$elements[1]->id}}" method="POST" class="file-upload" style="position: absolute; " enctype="multipart/form-data">
                            @csrf
                            <input id="input_img_element" class="m-0 p-0" type="file" name="archivo">
                            <label class="col-12 m-0 p-0 d-flex justify-content-center align-items-center" for="input_img_element" style="opacity: 100%; width: 500px; height: 500px; border-radius: 100%;">Seleccionar archivo</label>
                        </form >
                    {{-- html del input file estilizado --}}
                    </div>
            </div>
        </div>

  
    
    <div class="col-12 my-5 d-flex justify-content-center align-items-center flex-column" style="background: #d89d8f; min-height: 728px;">
        {{-- <div class="col-12 col-md-12 col-lg-8 d-flex justify-content-center align-items-center" style=" position: absolute;">
            <img src="{{ asset('img/photos/seccions/fondo02.png') }}" width="100%" style="height: 80vh;" alt="">
        </div> --}}
    
        <div class="container my-5 d-flex justify-content-center align-items-center row" style="background: ; z-index: 1000;">
            <div class="col-12 col-md-8 col-lg-5 p-2" style="background: ;">
                <div class="col-12" style=" height: 300px; border-radius: 26px; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.239) ;">
                    <img src="{{ asset('img/photos/seccions/'.$elements[2]->imagen) }}" class="" height="100%" width="100%" style="border-radius: 26px;" alt="">
            {{-- html del input file estilizado --}}
                   <form id="form_image_element2" action="upelementimg/{{$elements[2]->id}}" method="POST" class="file-upload col-12    d-flex justify-content-center align-items-center m-0 p-0" style="position: absolute; background: ; top:0px; left: 0;" enctype="multipart/form-data">
                    @csrf
                    <input id="input_img_element2"  class="m-0 p-0" type="file" name="archivo">
                    <label class="col-12 m-0 p-0 d-flex justify-content-center align-items-center" for="input_img_element2" style="opacity: 100%; width: 100%; height: 300px; border-radius: 26px;">Seleccionar archivo</label>
                </form>
           {{-- html del input file estilizado --}}
                </div>
            </div>
            <div class="col-12 col-md-8 col-lg-5 p-2" style="background: ;">
                <div class="col-12 p-5" style=" height: 300px; background: white; border-radius: 26px; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.239) ;">
                    <div class="col-12"><p style="font-size: 35px; font-weight: lighter;">MISIÓN</div>
                        <div class=" col-12" style="max-height: 150px; "><textarea data-id="{{$elements[3]->id}}" data-campo="texto" class="text-input container" name="" id="" cols="45" rows="5" style="border:none;">{{$elements[3]->texto}}</textarea></div>
                </div>
            </div>
            <div class="col-12 col-md-8 col-lg-5 p-2" style="background: ;">
                <div class="col-12 p-5" style=" height: 300px; background: white; border-radius: 26px; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.239) ;">
                    <div class="col-12"><p style="font-size: 35px; font-weight: lighter;">VISIÓN</div>
                        <div class="col-12"  style="max-height: 150px;"><textarea data-id="{{$elements[4]->id}}" data-campo="texto" class="text-input container" name="" id="" cols="45" rows="5" style="border:none;">{{$elements[4]->texto}}</textarea></div>
                </div>
            </div>
            <div class="col-12 col-md-8 col-lg-5 p-2" style="background: ;">
                <div class="col-12" style=" height: 300px;  background-repeat: no-repeat; background-image: url(); border-radius: 26px; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.239) ;">
                    <img src="{{ asset('img/photos/seccions/'.$elements[5]->imagen) }}" height="100%" width="100%" style="border-radius: 26px;" alt="">
                {{-- html del input file estilizado --}}
                    <form id="form_image_element3" action="upelementimg/{{$elements[5]->id}}" method="POST" class="file-upload col-12    d-flex justify-content-center align-items-center m-0 p-0" style="position: absolute; background: ; top:0px; left: 0;" enctype="multipart/form-data">
                        @csrf
                        <input class="m-0 p-0" type="file" name="archivo" id="input_img_element3">
                        <label class="col-12 m-0 p-0 d-flex justify-content-center align-items-center" for="input_img_element3" style="opacity: 100%; width: 100%; height: 300px; border-radius: 26px;">Seleccionar archivo</label>
                    </form >
                {{-- html del input file estilizado --}}
                </div>
            </div>
        </div>
    
    </div>










@endsection
@section('jsLibExtras2')
<script src="{{asset('js/dropify.js')}}" charset="utf-8"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
@endsection
@section('jqueryExtra')
<script type="text/javascript">

$('#input_img_element').change(function(e) {
		// var campo = $(this).attr("data-campo");
		var valor = ($(this).val());

		console.log(valor);
		$('#form_image_element').trigger('submit');

	});
    $('#input_img_element2').change(function(e) {
		// var campo = $(this).attr("data-campo");
		var valor = ($(this).val());

		console.log(valor);
		$('#form_image_element2').trigger('submit');

	});
    $('#input_img_element3').change(function(e) {
		// var campo = $(this).attr("data-campo");
		var valor = ($(this).val());

		console.log(valor);
		$('#form_image_element3').trigger('submit');

	});

	$(document).ready(function() {
		$('.dropify').dropify();

		$('.fa-trash-alt').parent().click(function(e) {
				var id = $(this).attr('data-id');
				$("#ipdel").val(id);
				console.log(id);
			});

///////////////////// Editar campos ////////////////////
		$('.input-txt-nos').change(function(e) {

            var id = $(this).attr("data-id");
            var campo = $(this).attr("data-campo");
            var valor = ($(this).val());
            var tcsrf = $('meta[name="csrf-token"]').attr('content');

            $.ajax({
                url: 'textnosotrosup',
                type: 'post',
                dataType: 'json',
                data: {
                    "id": id,
                    "campo": campo,
                    "valor": valor,
                    "_token": tcsrf,
                }
            })
            .done(function(msg) {
                if (msg.success) {
                    toastr["success"]("Guardado Exitosamente");
                }else {
                    toastr["error"]("Error al actualizar");
                    setTimeout(function () { location.reload(); }, 1000);
                }
            })

            });
///////////////////// Editar campos ////////////////////

    $('.input-image-equipo').change(function(e) {
        var id = $(this).attr("data-id");
        console.log(id);
        $('#formEquipo'+id).trigger('submit');
    });

    $('.input_logo').change(function(e) {
        $('#form_logo_alianza').trigger('submit');
    });


	});
</script>
@endsection
