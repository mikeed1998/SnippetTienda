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

</style>
@endsection
@section('content')
	<div class="row mb-4 px-2">
		<a href="{{ route('config.seccion.index') }}" class="col col-md-2 btn btn-sm grey darken-2 text-white mr-auto"><i class="fa fa-reply"></i> Regresar</a>
	</div>



{{-- leyenda inicial	 --}}
{{-- leyenda inicial	 --}}
<div class="col-12 my-5 mx-auto p-3 d-flex row" style="background: #3a3a3a; border-radius: 36px;">
	<div class="col-12 text-center">
		<p style="color:white; font-size: 30px; font-weight: lighter;">COVERTURA</p>
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
{{-- leyenda inicial	 --}}





{{-- Te acompañamos con  --}}
	<div class="col-12 py-5" style="background:#3a3a3a;   border-radius: 40px; margin-top: -5px; ">

        <div class="col-12 mx-auto" style="background:; ">

            <div class="container  text-center">
                <p class="mx-5 m-0 p-0" style="color:white; font-size: 50px; font-weight: lighter; margin-top: ;">COVERTURA DE VIDA</p>
            </div>

            {{-- <div class="col-12 d-flex justify-content-center align-items-center flex-column my-5 text-center">
				<h3 style="color:white;">Agregar Covertura</h3>
				<a  class="col-2 mb-5 btn btn-primary" style="background: #9bb938 !important; border-radius: 26px; border-color: #9bb938;">Agregar</a>
			</div> --}}

            <div class="col-12 my-5 d-flex row">

              <div class="col-5 p-3">
                {{-- imagen --}}
                  <div class="col-12 d-flex justify-content-center" style="min-height: 300px; max-height: 300px;">
                    <img src="{{asset('img/design/icono_001.png')}}" alt="">
                  </div>
                {{-- imagen --}}
                
                {{-- card --}}
                  <div class="card col-12" style="border-radius: 36px 36px 0 0; box-shadow: none; border:none; background: none;">
                    <div class="col-12 d-flex justify-content-end">
                      <div class=" col-10 card-header  text-center" style="border-radius: 36px 36px 0 0; background: #9bb938 !important;">
                        <h2 style=""><input class="text-input col-12" style="border-radius: 26px; border:none; background: none; font-weight: 600; text-align: center;" type="text" name="" id="" data-id="{{$elements[4]->id}}" data-campo="texto" value="{{$elements[4]->texto}}"></h2>
                      </div>
                    </div>

                    <div class="card-body d-flex row"  style="background: ; max-height: 160px;">
                      <div class="col-8 p-4" style=""> <textarea class="text-input col-12 p-0" style="border-radius: 16px; border:none; background: none; color: white;" name="" id="" cols="30" rows="3" data-id="{{$elements[5]->id}}" data-campo="texto">{{$elements[5]->texto}}</textarea> </div>
                      <div class="col-3 p-2 d-flex justify-content-center align-items-center" style="border: 1px solid white; border-radius: 200px;;"><img src="{{asset('img/design/icono_003.png')}}" alt="" width="50px;" height="50px;"></div>
                      <div class="col-1 d-flex justify-content-end p-0" ><img src="{{asset('img/design/flecha.png')}}" alt=""></div>
                    </div>
                    <div class="card-body d-flex row" style="background: ; max-height: 160px;">
                      <div class="col-8 p-4" style="background: ; max-height: 137px; overflow-y: auto;"> <textarea class="text-input col-12 p-0" style="border-radius: 16px; border:none; background: none; color: white;" name="" id="" cols="30" rows="3" data-id="{{$elements[6]->id}}" data-campo="texto">{{$elements[6]->texto}}</textarea></div>
                      <div class="col-3 p-2 d-flex justify-content-center align-items-center" style="border: 1px solid white; border-radius: 200px;;"><img src="{{asset('img/design/icono_005.png')}}" alt="" width="50px;" height="50px;"></div>
                      <div class="col-1 d-flex justify-content-end p-0" ><img src="{{asset('img/design/flecha.png')}}" alt=""></div>
                    </div>
                    <div class="card-body d-flex row" style="background: ; max-height: 160px;">
                      <div class="col-8 p-4" style="background: ; max-height: 137px; overflow-y: auto;"> <textarea class="text-input col-12 p-0" style="border-radius: 16px; border:none; background: none; color: white;" name="" id="" cols="30" rows="3" data-id="{{$elements[7]->id}}" data-campo="texto">{{$elements[7]->texto}}</textarea> </div>
                      <div class="col-3 p-2 d-flex justify-content-center align-items-center" style="border: 1px solid white; border-radius: 200px;;"><img src="{{asset('img/design/icono_004.png')}}" alt="" width="50px;" height="50px;"></div>
                      <div class="col-1 d-flex justify-content-end p-0" ><img src="{{asset('img/design/flecha.png')}}" alt=""></div>
                    </div>
                  </div>
                {{-- card --}}

              </div>

              <div class="col-2 p-3 d-flex flex-column">
                <div class="col-12 d-flex align-items-center justify-content-center" style="height:365px;">
                   
                </div>

                <div class="col-12 text-center d-flex justify-content-center align-items-center" style="height: 160px;">
                  <h3 class="pt-3" style="color:white; font-weight: bold;"><input type="text" class="text-input col-12" style="background: none; border: none; border-radius: 26px; color: white;" data-id="{{$elements[8]->id}}" data-campo="texto" value="{{$elements[8]->texto}}"></h3>
                </div>

                <div class="col-12 text-center d-flex justify-content-center align-items-center" style="height: 160px;">
                  <h3 class="pt-3" style="color:white; font-weight: bold;"><input type="text" class="text-input col-12" style="background: none; border: none; border-radius: 26px; color: white;" data-id="{{$elements[9]->id}}" data-campo="texto" value="{{$elements[9]->texto}}"></h3>
                </div>

                <div class="col-12 text-center d-flex justify-content-center align-items-center" style="height: 160px;">
                  <h3 class="pt-3" style="color:white; font-weight: bold;"><input type="text" class="text-input col-12" style="background: none; border: none; border-radius: 26px; color: white;" data-id="{{$elements[10]->id}}" data-campo="texto" value="{{$elements[10]->texto}}"></h3>
                </div>
              </div>
              <div class="col-5 p-3">
                {{-- imagen --}}
                  <div class="col-12 d-flex justify-content-center" style="min-height: 300px;">
                    <img src="{{asset('img/design/icono_002.png')}}" alt="">
                  </div>
                {{-- imagen --}}
                
                {{-- card --}}
                  <div class="card col-12" style="border-radius: 36px 36px 0 0; box-shadow: none; border:none; background: none;">
                    <div class="col-12 d-flex justify-content-start">
                      <div class=" col-10 card-header  text-center" style="border-radius: 36px 36px 0 0; background: #9bb938 !important;">
                        <h2 style="font-weight: 800;"><input class="text-input col-12" style="border-radius: 26px; border:none; background: none; font-weight: 600; text-align: center;" type="text" name="" id="" data-id="{{$elements[11]->id}}" data-campo="texto" value="{{$elements[11]->texto}}"></h2>
                      </div>
                    </div>

                    <div class="card-body d-flex row" style="background: ; max-height: 160px;">
                      <div class="col-1 d-flex justify-content-start p-0" ><img src="{{asset('img/design/flechad.png')}}" alt=""></div>
                      <div class="col-3 p-2 d-flex justify-content-center align-items-center" style="border: 1px solid white; border-radius: 200px;;"><img src="{{asset('img/design/icono_004.png')}}" alt="" width="50px;" height="50px;"></div>
                      <div class="col-8 p-4" style="background: ; max-height: 137px; overflow-y: auto;"><textarea class="text-input col-12 p-0" style="border-radius: 16px; background: none; border:none; color: white;" name="" id="" cols="30" rows="3" data-id="{{$elements[12]->id}}" data-campo="texto">{{$elements[12]->texto}}.</textarea></div>

                    </div>
                    <div class="card-body d-flex row" style="background: ; max-height: 160px;">
                      <div class="col-1 d-flex justify-content-start p-0" ><img src="{{asset('img/design/flechad.png')}}" alt=""></div>
                      <div class="col-3 p-2 d-flex justify-content-center align-items-center" style="border: 1px solid white; border-radius: 200px;;"><img src="{{asset('img/design/icono_006.png')}}" alt="" width="50px;" height="50px;"></div>
                      <div class="col-8 p-4" style="background: ; max-height: 137px; overflow-y: auto;"><textarea class="text-input col-12 p-0" style="border-radius: 16px; background: none; border:none; color: white;" name="" id="" cols="30" rows="3" data-id="{{$elements[13]->id}}" data-campo="texto">{{$elements[13]->texto}}.</textarea></div>

                    </div>
                    <div class="card-body d-flex row" style="background: ; max-height: 160px;">
                      <div class="col-1 d-flex justify-content-start p-0" ><img src="{{asset('img/design/flechad.png')}}" alt=""></div>
                      <div class="col-3 p-2 d-flex justify-content-center align-items-center" style="border: 1px solid white; border-radius: 200px;;"><img src="{{asset('img/design/icono_003.png')}}" alt="" width="50px;" height="50px;"></div>
                      <div class="col-8 p-4" style="background: ; max-height: 137px; overflow-y: auto;"><textarea class="text-input col-12 p-0" style="border-radius: 16px; background: none; border:none; color: white;" name="" id="" cols="30" rows="3" data-id="{{$elements[14]->id}}" data-campo="texto">{{$elements[14]->texto}}.</textarea></div>

                    </div>
                  </div>
                {{-- card --}}

              </div>

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
						Eliminar Servicio
						<br>
					{{-- </p>
					<p class="pt-3 pr-2 text-white text-uppercase"> --}}
						<span class=" text-white text-uppercase font-weight-bolder">
							Seguro que quieres eliminar este servicio?
						</span>
					</p>
					<button type="button" class="col-2 btn btn-secondary" data-dismiss="modal">Cerrar</button>
					<button type="button" class="col-2 btn red darken-3 text-white delsize">Eliminar</button>
					<form id="tamdel" action="" method="POST" style="display: none;">
							@csrf
							<input type="hidden" id="ipdel" name="producto" value="">
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
