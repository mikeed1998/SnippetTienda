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
@endsection
@section('content')
	<div class="row mb-4 px-2">
		<a href="{{ route('config.seccion.index') }}" class="col col-md-2 btn btn-sm grey darken-2 text-white mr-auto"><i class="fa fa-reply"></i> Regresar</a>
	</div>



{{-- leyenda inicial	 --}}
	<div class="col-12 my-5 mx-auto p-3 d-flex row" style="background: #3a3a3a; border-radius: 36px;">
		<div class="col-12 text-center">
			<p style="color:white; font-size: 30px; font-weight: lighter;">HERRAMIENTAS</p>
		</div>
		<div class="col-6 p-3" style="">
			<div class="col-12 d-flex justify-content-center" style="">
				@if(!empty($elements[2]->imagen))
				<div class="camp_img_cont d-flex justify-content-center align-items-center" style="width: 350px; height: 350px; background-repeat: no-repeat; background-size: cover; background-image: url({{asset('img/photos/seccions/'.$elements[2]->imagen)}}); border-radius:100%;">
					@else
					<div class="camp_img_cont d-flex justify-content-center align-items-center" style="width: 350px; height: 350px; background-repeat: no-repeat; background-size: cover; background-image: url({{asset('img/photos/seccions/imagen1.png')}}); border-radius:100%;">
				@endif
					<form id="miFormulario" action="portadaseccion/{{$elements[2]->id}}" method="POST" enctype="multipart/form-data">
						@csrf
						<input class="camp_img px-3" type="file" id="image_circle" name="image_circle" style="background: rgba(0, 0, 0, 0.557); color: white; border: 1px solid rgb(255, 255, 255); border-radius: 100%; padding-top: 160px; padding-bottom: 160px;">
					</form>
				</div>
			</div>
			<div class="col-12 m-2 p-3 d-flex justify-content-center">
				
			</div>
		</div>
		<div class="col-6 d-flex justify-content-center">
			
			<div class="col-12 d-flex justify-content-center text-start flex-column p-2">
				<h4 class="my-0" style="color:orange; font-weight: 700;"><input id="" class="text-input p-2 m-1" data-id="{{$elements[0]->id}}" data-campo="texto" type="text" value="{{$elements[0]->texto}}" style="border:none; border-radius: 16px;"></h4>
				<h4 class="mb-2" style="color:#9bb938; font-weight: 700;"><input id="" class="text-input p-2 m-1" data-id="{{$elements[1]->id}}" data-campo="texto" type="text" value="{{$elements[1]->texto}}" style="border:none; border-radius: 16px;"></h4>
				<form action="textareaup/{{$elements[3]->id}}"  method="POST" >
					@csrf
					<textarea name="textareaup"id="" rows="10" class="texteditor form-control" style="resize:none;" >{!!$elements[3]->texto!!}</textarea>
					<button type="submit" class="col-4 my-3 btn btn-primary" style="background: #9bb938 !important; border-radius: 26px; border-color: #9bb938;">Guardar</button>
				</form>
			</div>
		</div>
	</div>
{{-- leyenda inicial	 --}}


{{-- Te acompañamos con  --}}
	<div class="col-12 py-5" style="background:#3a3a3a;   border-radius: 40px; margin-top: -5px; ">
        <div class="col-12 mx-auto" style="background:; ">

            <div class="container  text-center">
                <p class="mx-5 m-0 p-0" style="color:white; font-size: 30px; font-weight: lighter;">HERRAMIENTAS QUE TE MANTENDRAN PROTEGIDO</p>
            </div>

            <div class="col-12 d-flex justify-content-center align-items-center flex-column my-5 text-center">
				<h3 style="color:white;">Agregar herramienta</h3>
				<div onclick="agrher()"  class="col-2 mb-5 btn btn-primary"  style="background: #9bb938 !important; border-radius: 26px; border-color: #9bb938;">Agregar</div>
			</div>


            <div class="col-12 my-5 d-flex row">

			@foreach($herramienta as $her)
			<div class="col-3 p-2" >
				
                <div class="col-12 d-flex flex-column" style="background: white; border-radius: 36px; min-height: 250px;">
					<div class="col-12 mt-2 d-flex justify-content-end align-items-center "  data-id="{{$her->id}}"><i data-id="{{$her->id}}" data-toggle="modal" data-target="#frameModalDel" class="fas fa-trash-alt p-2" style="background: none; border-radius: 10px; color: red; font-size: 30px;"></i></div>
                  <div class="col-12 d-flex justify-content-center" style="background: ;"><div class="col-3 p-2 m-1 mt-2 d-flex justify-content-center" style=" background: rgb(147, 190, 90); border-radius: 10px;"><img class="" src="{{asset('img\photos\seccions/'.$her->icono)}}" alt="" width="40px" height="40px;"></div></div>
                  <div class="col-12 d-flex justify-content-center mt-1"><div class="col-12 text-center"><h4 style="font-weight: 800; color: rgb(147, 190, 90)"><textarea data-id="{{$her->id}}" data-campo="titulo" class="input-txt-her col-12 text-center" name="" id="" cols="" rows="2" style="font-weight: 800; color: rgb(147, 190, 90); min-height: 100px; border:none;">{{$her->titulo}}</textarea></h4></div></div>
				  @if(!empty($her->pdf))
				  <div class="col-12 d-flex justify-content-center my-1"><div class="col-12 text-center"><a href="/img/photos/seccions/pdf/{{$her->pdf}}" class="btn btn-rpimary" style=" background: #9bb938; color: white; ">Ver pdf</a></div></div>
				  @else
				  <div class="col-12 d-flex justify-content-center my-1"><div class="col-12 text-center"><a class="" style=" background: ; color: ; ">Aun no hay pdf</a></div></div>
				  @endif
                  <form id="form_pdf{{$her->id}}" action="pdf/{{$her->id}}"  method="POST" enctype="multipart/form-data" class="col-12 d-flex justify-content-center">@csrf<div class="col-10 btn btn-primary d-flex justify-content-center" style="border-radius: 26px; border-color: rgb(64, 64, 64); background: rgb(64, 64, 64) !important;"><input class="input_pdf mx-1" data-id="{{$her->id}}" name="pdf_name" type="file" style="color: #3a3a3a;"></div></form>  
                </div>
              </div>
			@endforeach



            </div>


      </div>
	</div>
{{-- Te acompañamos con  --}}




<div class="modal fade bottom" id="frameModalDel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-frame modal-top" role="document">
		<div class="modal-content">
			<div class="modal-body bg-danger" style="background: #3a3a3a !important;">
				<div class="row d-flex justify-content-center align-items-center">
					<p class="pt-3 pr-2 text-white text-center text-lg-left">
						Eliminar Herramienta
						<br>
					{{-- </p>
					<p class="pt-3 pr-2 text-white text-uppercase"> --}}
						<span class=" text-white text-uppercase font-weight-bolder">
							Seguro que quieres eliminar esta herramienta?
						</span>
					</p>
					<button type="button" class="col-2 btn btn-secondary" data-dismiss="modal">Cerrar</button>
					<button type="button" class="col-2 btn red darken-3 text-white delhb">Eliminar</button>
					<form id="delh" action="delher" method="POST" style="display: none;">
							@csrf
							<input type="hidden" id="ipdel" name="herramienta" value="">
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
		$('.input-txt-her').change(function(e) {

            var id = $(this).attr("data-id");
            var campo = $(this).attr("data-campo");
            var valor = ($(this).val());
			var tcsrf = $('meta[name="csrf-token"]').attr('content');

            //  console.log(id,valor,campo);


            $.ajax({
                url: 'secciontexth',
                type: 'post',
				dataType: 'json',
                data: {
                    "id": id,
                    "campo": campo,
                    "valor": valor,
					"_method": 'post',
					"_token": tcsrf,
                }
            })
            .done(function(msg) {
                console.log(msg);

                if (msg.success) {
                    toastr["success"]("Guardado Exitosamente");
                }else {
                    toastr["error"]("Error al actualizar");
                    // setTimeout(function () { location.reload(); }, 1000);
                }
            })

            });
///////////////////// Editar campos ////////////////////
	});

	function agrher(){

		var tcsrf = $('meta[name="csrf-token"]').attr('content');

		$.ajax({
				url: 'agrher',
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

	$('.input_pdf').change(function(e) {

		var id = $(this).attr("data-id");
		$('#form_pdf'+id).trigger('submit');

		});

		$('.fa-trash-alt').parent().click(function(e) {
				var id = $(this).attr('data-id');
				$("#ipdel").val(id);
				
			});
			$('.delhb').click(function(e) {
				$('#delh').submit();
			});

	
</script>
@endsection
