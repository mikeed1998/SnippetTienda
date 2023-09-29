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
		display: none;
		transition: all 0.5s;
	}
	.camp_img_cont:hover{
		
	}
	.camp_img_cont:hover .camp_img{
		display: block;
		background: #3a3a3a;
		transition: all 0.5s !important;
	}

</style>
@endsection
@section('content')
	<div class="row mb-4 px-2">
		<a href="{{ route('config.seccion.index') }}" class="col col-md-2 btn btn-sm grey darken-2 text-white mr-auto"><i class="fa fa-reply"></i> Regresar</a>
	</div>


<div class="col-12">

</div>

{{-- triangulo negro  --}}
	<div class="head2 col-11 mx-auto" style=""></div>
{{-- triangulo negro  --}}


{{-- leyenda inicial	 --}}
	<div class="col-12 my-5 p-3 d-flex row" style="background: #3a3a3a; border-radius: 36px;">
		<div class="col-12 text-center">
			<p style="color:white; font-size: 60px; font-weight: lighter;">INICIO</p>
		</div>
		<div class="col-6 p-3" style="">
			<div class="col-12 d-flex justify-content-center" style="">
				<div class="camp_img_cont d-flex justify-content-center align-items-center" style="width: 500px; height: 500px; background-repeat: no-repeat; background-size: cover; background-image: url({{asset('img/design/imagen1.png')}}); border-radius:100%;">
					<input class="camp_img p-3" type="file" style="background: rgba(0, 0, 0, 0.557); color: white; border: 1px solid rgb(255, 255, 255); border-radius: 26px;">
				</div>
			</div>
			<div class="col-12 m-2 p-3 d-flex justify-content-center">
				
			</div>
		</div>
		<div class="col-6 d-flex justify-content-center">
			
			<div class="col-12 d-flex justify-content-center text-start flex-column p-2">
				<h2 class="my-0" style="color:orange; font-weight: 700;"><input class="p-2 m-1" type="text" value="Ayudanos a" style="border:none; border-radius: 16px;"></h2>
				<h2 class="mb-2" style="color:#9bb938; font-weight: 700;"><input class="p-2 m-1" type="text" value="Nuestros clientes" style="border:none; border-radius: 16px;"></h2>
				<p class="my-2" style="color:white;"><input class="col-12 p-2" type="text" value="En Vida y Gastos Medicos Mayores desde 2 focos de atencion" style="border:none; border-radius: 16px;"></p>
				<p class="my-2" style="color:white;"><input class="col-12 p-2" type="text" value="1. Construccion de seguridad patrimonial financiera en vida y gastos medicos mayores para personas en lo individual" style="border:none; border-radius: 16px;"></p>
				<p class="my-2" style="color:white;"><input class="col-12 p-2" type="text" value="2. Mejora del clima laboral de las empresas,al facilitar las prestaciones de proteccion en vida, Gastos Medicos mayores y creacion e fondo privado para la jubilacion de los empleados." style="border:none; border-radius: 16px;"></p>
			</div>
		</div>
	</div>
{{-- leyenda inicial	 --}}

{{-- Te acompañamos con  --}}
	<div class="col-12 py-5" style="background:#3a3a3a;   border-radius: 40px; margin-top: -5px;  max-width: 1540px;">
		<div class="col-11 mx-auto" style="background: ; ">
			<div class="col-12 text-center">
				<p style="color:white; font-size: 60px; font-weight: lighter;">TE ACOMPAÑAMOS CON</p>
			</div>

			<div class="col-12 d-flex justify-content-center align-items-center flex-column my-5 text-center">
				<h3 style="color:white;">Agregar Carta</h3>
				<div class="col-2 mb-5 btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" style="background: #9bb938 !important; border-radius: 26px; border-color: #9bb938;">Agregar</div>
			</div>

			<div class="multiple-items mt-5 col-12 d-flex align-items-center row p-0" style="background:white; border-radius:50px; position: relative;">

				<div class="card-slick col-3" style=" border-radius: 50px; position: ; height: 307;">
					<div class="col-12 d-flex justify-content-space row px-2 m-2 mt-4">
						<div class="col-3 p-2 d-flex justify-content-center align-items-center" style="background: orange; border-radius:10px; width: 60px;">
							<img src="{{asset('img/design/icono1.png')}}" width="40px" height="40px" alt="">
						</div>
						<div class="col-9 p-2" style="background: ; font-size: 30px; text-align: end; color:red; cursor: url(nat870.cur), pointer"><i data-toggle="modal" data-target="#frameModalDel" data-id="1" class="fas fa-trash-alt"></i></div>
					</div>

					<div class="col-8 px-2 m-2 mt-5">
						<h4 class="text-card">
							Orientacion en salida de deuda de manera sana
						</h4>
					</div>

					<div class="col-12 px-2 m-2 mt-3 mb-5 text-end">
						<p class="text-card">
							<i data-toggle="modal" data-target="#editmodal" data-id="1"  style="font-size: 30px; cursor: url(nat870.cur), pointer" class="fas fa-cog"></i>
						</p>
					</div>
				</div>
				
				<div class="card-slick col-3" style=" border-radius: 50px; position: ;">
					<div class="col-12 d-flex justify-content-space row px-2 m-2 mt-4">
						<div class="col-3 p-2 d-flex justify-content-center align-items-center" style="background: orange; border-radius:10px; width: 60px;">
							<img src="{{asset('img/design/icono1.png')}}" width="40px" height="40px" alt="">
						</div>
						<div class="col-9 p-2" style="background: ; font-size: 30px; text-align: end; color:red; cursor: url(nat870.cur), pointer"><i class="fas fa-trash-alt"></i></div>
					</div>

					<div class="col-8 px-2 m-2 mt-5">
						<h4 class="text-card">
							Orientacion en salida de deuda de manera sana
						</h4>
					</div>

					<div class="col-12 px-2 m-2 mt-3 mb-5 text-end">
						<p class="text-card">
							<i style="font-size: 30px; cursor: url(nat870.cur), pointer" class="fas fa-cog"></i>
						</p>
					</div>
				</div>

				

			</div>



			<div class="col-12 my-4 row">

				<div class="col-6 p-3 d-flex justify-content-center align-items-center">
					<img src="{{asset('img/design/imagen_02.png')}}" width="500px" height="430px" alt="">
				</div>
				<div class="col-6 p-3 d-flex justify-content-center align-items-center" style="background: ;">
					<div class="col-12  d-flex justify-content-start flex-column" style="background: ;">
						<p class="mx-3 my-0" style="color: white; font-size: 50px; font-weight: lighter;">CONFIAS</p>
						<p class="mx-3 my-0" style="color: white; font-size: 50px; font-weight: lighter;">EN NOSOTROS</p>
						<textarea class="mx-3 p-3" name="" id="" rows="8" style="border:none; color:black; text-align: justify; border-radius: 26px;">Nuestra vision para la relacion que tenemos con cada uno de mis clientes, es ser una de sus tres llamadas, es decir, el dia que reciba una noticia que le oscurezca el dia, normalmente somos la primera de las llamadas que hara y de ahi nosotros le acompañemos hasta que vuelva a salir la luz y su vida se llene de alegria.</textarea>
						<p class="mx-3 mt-5" style="color:orange;">
							Leer Mas >
						</p>

					</div>
				</div>

			</div>


		</div>
	</div>
{{-- Te acompañamos con  --}}

{{-- PLAN DE CONTACTO  --}}
	<div class="col-12 x-auto mt-5" style="background:;   border-radius: 40px; margin-top: -5px;  max-width: 1540px;">
		<div class="col-11 mx-auto" style="background: ; ">

			<div class="col-12 text-center">
				<P style="font-size: 50px;">PLAN DE CONTACTO</P>
			</div>
			
			<div class="container my-5 row d-flex justify-content-center">

				<div class="col-5 d-flex justify-content-center align-items-center flex-column">

					<div class="col-12 my-2 d-flex row align-items-center">
						<div class="col-1"><img src="{{asset('img/design/uno.png')}}" alt="" style="width: 30px;"></div>
						<div class="col-11" style="background: ;"><p class="my-auto"><input class="col-12" style="height: 50px; BORDER-RADIUS:16PX;" type="text" value="Lorem, ipsum dolor sit amet consectetur adipisicingaaajshks"></p></div>
					</div>

					<div class="col-12 my-2 d-flex row align-items-center">
						<div class="col-1"><img src="{{asset('img/design/2.png')}}" alt="" style="width: 30px;"></div>
						<div class="col-11"><p class="my-auto"><input class="col-12" style="height: 50px; BORDER-RADIUS:16PX;" type="text" value="Lorem, ipsum dolor sit amet consectetur adipisicingaaajshks"></p></div>
					</div>

					<div class="col-12 my-2 d-flex row align-items-center">
						<div class="col-1"><img src="{{asset('img/design/3.png')}}" alt="" style="width: 30px;"></div>
						<div class="col-11"><p class="my-auto"><input class="col-12" style="height: 50px; BORDER-RADIUS:16PX;" type="text" value="Lorem, ipsum dolor sit amet consectetur adipisicingaaajshks"></p></div>
					</div>

					<div class="col-12 my-2 d-flex row align-items-center">
						<div class="col-1"><img src="{{asset('img/design/4.png')}}" alt="" style="width: 30px;"></div>
						<div class="col-11"><p class="my-auto"><input class="col-12" style="height: 50px; BORDER-RADIUS:16PX;" type="text" value="Lorem, ipsum dolor sit amet consectetur adipisicingaaajshks"></p></div>
					</div>

					<div class="col-12 my-2 d-flex row align-items-center">
						<div class="col-1"><img src="{{asset('img/design/5.png')}}" alt="" style="width: 30px;"></div>
						<div class="col-11"><p class="my-auto"><input class="col-12" style="height: 50px; BORDER-RADIUS:16PX;" type="text" value="Lorem, ipsum dolor sit amet consectetur adipisicingaaajshks"></p></div>
					</div>

					<div class="col-12 my-2 d-flex row align-items-center">
						<div class="col-1"><img src="{{asset('img/design/6.png')}}" alt="" style="width: 30px;"></div>
						<div class="col-11"><p class="my-auto"><input class="col-12" style="height: 50px; BORDER-RADIUS:16PX;" type="text" value="Lorem, ipsum dolor sit amet consectetur adipisicingaaajshks"></p></div>
					</div>

					<div class="col-12 my-2 d-flex row align-items-center">
						<div class="col-1"><img src="{{asset('img/design/7.png')}}" alt="" style="width: 30px;"></div>
						<div class="col-11"><p class="my-auto"><input class="col-12" style="height: 50px; BORDER-RADIUS:16PX;" type="text" value="Lorem, ipsum dolor sit amet consectetur adipisicingaaajshks"></p></div>
					</div>

				</div>
				<div class="col-5 d-flex justify-content-center align-items-center" style="background: #9bb938; height: 500px; border-top-left-radius: 100px; border-end-end-radius: 100px;">
					<img src="{{asset('img/design/individual.png')}}" alt="">
				</div>
				<div class="col-5 d-flex justify-content-center align-items-center" style="background: orange; height: 500px; border-top-left-radius: 100px; border-end-end-radius: 100px;">
					<img src="{{asset('img/design/grupal.png')}}" alt="">
				</div>
				<div class="col-5 d-flex justify-content-center align-items-center flex-column">

					<div class="col-12 my-2 d-flex row align-items-center">
						<div class="col-1"><img src="{{asset('img/design/1_naranja.png')}}" alt="" style="width: 30px;"></div>
						<div class="col-11"><p class="my-auto"><input class="col-12" style="height: 50px; BORDER-RADIUS:16PX;" type="text" value="Lorem, ipsum dolor sit amet consectetur adipisicingaaajshks"></p></div>
					</div>

					<div class="col-12 my-2 d-flex row align-items-center">
						<div class="col-1"><img src="{{asset('img/design/2_naranja.png')}}" alt="" style="width: 30px;"></div>
						<div class="col-11"><p class="my-auto"><input class="col-12" style="height: 50px; BORDER-RADIUS:16PX;" type="text" value="Lorem, ipsum dolor sit amet consectetur adipisicingaaajshks"></p></div>
					</div>

					<div class="col-12 my-2 d-flex row align-items-center">
						<div class="col-1"><img src="{{asset('img/design/3_naranja.png')}}" alt="" style="width: 30px;"></div>
						<div class="col-11"><p class="my-auto"><input class="col-12" style="height: 50px; BORDER-RADIUS:16PX;" type="text" value="Lorem, ipsum dolor sit amet consectetur adipisicingaaajshks"></p></div>
					</div>


				</div>

			</div>

		</div>
	</div>
{{-- PLAN DE CONTACTO  --}}

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="background: ;">
  <div class="modal-dialog modal-dialog-centered" >
    <div class="modal-content" style="background: ; border-radius: 16px;">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo Servicio</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Titulo</label>
            <input type="text" class="form-control" id="recipient-name">
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Descripcion:</label>
            <textarea class="form-control" id="message-text"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="background: red !important; border:none;">Cerrar</button>
        <button type="button" class="btn btn-primary" style="background: #0f478a !important; border:none;">Crear</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="editmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="background: ;">
	<div class="modal-dialog modal-dialog-centered" >
	  <div class="modal-content" style="background: ; border-radius: 16px;">
		<div class="modal-header">
		  <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Servicio</h1>
		  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		</div>
		<div class="modal-body">
		  <form>
			<div class="mb-3">
				<div class="camp_img_cont col-12 p-2 d-flex justify-content-center align-items-center" style="height: 200px; background-repeat: no-repeat; background-size: cover; background-image: url({{asset('img/design/servicio_1.png')}});">
					<input class="camp_img p-3" type="file" style="background: rgba(0, 0, 0, 0.557); color: white; border: 1px solid rgb(255, 255, 255); border-radius: 26px;">
				</div>
			</div>
			<div class="mb-3">
				<label for="recipient-name" class="col-form-label">Titulo</label>
				<input type="text" class="form-control" id="recipient-name">
			  </div>
			<div class="mb-3">
			  <label for="message-text" class="col-form-label">Descripcion:</label>
			  <textarea class="form-control" id="message-text"></textarea>
			</div>
		  </form>
		</div>
		<div class="modal-footer">
		  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="background: red !important; border:none;">Cerrar</button>
		  <button type="button" class="btn btn-primary" style="background: #0f478a !important; border:none;">Guardar</button>
		</div>
	  </div>
	</div>
  </div>

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



	<div>
		{{-- <div class="row">
			@if (!empty($seccion->portada))
			<div class="col-12 col-md-6 py-3">
				<div class="card h-100">
					<form action="{{route('config.seccion.updatePortada',$seccion->id)}}" class="card-body" method="post" enctype="multipart/form-data">
						@csrf
						@method('put')
						<div class="text-center">
							<label class="h5 text-capitalize"> Portada</label>
						</div>
						<div class="form-group">
							<input type="file" id="portada" name="portada" class="dropify"  data-weight="7em" @if ($seccion->portada) data-default-file="{{ asset("/img/photos/seccions/".$seccion->portada)}}" @endif required />
							<div class="text-center">
								<small class="text-muted">Dimensiones sugeridas: 1500 x 500 px</small>
							</div>
						</div>
						<div class="text-center">
							<button type="submit" class="btn btn-primary">Guardar</button>
						</div>
					</form>
				</div>
			</div>
			@endif

			@foreach ($elements as $elem)
				@if (!$elem->contenido)
				<div class="col-12 col-md-6 py-3">
					<div class="card">
						<form action="{{route('config.seccion.update',$elem->id)}}" class="card-body" method="post">
							@csrf
							@method('put')
							<div class="text-center">
								<label class="h5 text-capitalize">{{ $elem->elemento}}</label>
							</div>
							<div class=" form-group">
								<textarea name="descripcion" class="texteditor" rows="10">{!! $elem->texto !!}</textarea>
							</div>
							<div class="text-center mt-1">
								<button type="submit" class="btn btn-primary">Guardar</button>
							</div>
						</form>
					</div>
				</div>
				@else
				<div class="col-12 col-md-6 py-3">
					<div class="card h-100">
						<form action="{{route('config.seccion.update',$elem->id)}}" class="card-body" method="post" enctype="multipart/form-data">
							@csrf
							@method('put')
							<div class="text-center">
								<label class="h5 text-capitalize">{{ $elem->elemento}} - imagen</label>
							</div>
							<div class="form-group">
								<input type="file" id="imagen" name="imagen" class="dropify"  data-weight="7em" @if ($elem->imagen) data-default-file="{{ asset("/img/photos/seccions/".$elem->imagen)}}" @endif data-show-remove="false" required />
								{{-- <div class="text-center">
									@switch($elem->seccion)
										@case(1)
											@if (strpos($elem->elemento, 'card') !== false)
												<small class="text-muted">Dimensiones sugeridas: 500 x 500 px</small>
											@else
												<small class="text-muted">Dimensiones sugeridas: 950 x 950 px</small>
											@endif
										@break
										@case(4)
											@if (strpos($elem->elemento, 'card') !== false)
												<small class="text-muted">Dimensiones sugeridas: 500 x 500 px</small>
											@else
												<small class="text-muted">Dimensiones sugeridas: 650 x 350 px</small>
											@endif
										@break
										@case(5)
										<small class="text-muted">Dimensiones sugeridas: 900 x 650 px</small>
										@break
									@endswitch
								</div> --}}
							{{-- </div>
							<div class="text-center mt-1">
								<button type="submit" class="btn btn-primary">Guardar</button>
							</div>
						</form>
					</div>
				</div>
				@endif

			@endforeach
		</div> --}} 
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

			

	});
</script>
@endsection
