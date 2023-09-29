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

		<div class="col-12 d-flex justify-content-center align-items-center flex-column mt-2 text-center">
			<h3 style="color:black;">Agregar Categoria</h3>
			<form action="newcat" method="POST">
				@csrf
				<input type="text" name="nuevo" value="1" hidden>
				<button class="btn btn-primary" style="background: #dfb1b3 !important; border-color: #dfb1b3 !important;">Agregar</button>
			</form>
			
		</div>

		<div class="col-12 pt-5 pb-2" style="  background-size: 100%; background-image: url({{asset('img/photos/seccions/fondo_productos.png')}}); border-radius:26px;">
			<div class="multiple-items2 container p-2 mb-5">
				
				@foreach($categoria as $cat)
				<div class="col-12  p-1 " >
					<div class="card d-flex justify-content-center align-items-center" style="border-radius: 26px;">
						<div class="col-12" style="height: 80px;">
						<img class="mx-auto mt-3" src="{{asset('img/design/'.$cat->image)}} " style="border-radius: 16px; max-height: 72px;" width="60%" alt="">
						                    {{-- html del input file estilizado --}}
											<form id="form_image_cat{{$cat->id}}" action="catimg/{{$cat->id}}" method="POST" class="file-upload px-auto" style="position: absolute; left: 5px; right: 5px; top: 5px; bottom: -10px; font-size: 10px; " enctype="multipart/form-data">
												@csrf
												<input id="input_img_cat{{$cat->id}}" class="m-0 p-0" type="file" name="archivo">
												<label class="col-12 m-0 px-2  d-flex justify-content-center align-items-center" for="input_img_cat{{$cat->id}}" style=" height: 100%;   border-radius: 20px;">Seleccionar archivo</label>
											</form >
										{{-- html del input file estilizado --}}
										<script>
											///////////////////// Editar campos imegn categoria ////////////////////
												$('#input_img_cat'+{{$cat->id}}).change(function(e) {
												$('#form_image_cat'+{{$cat->id}}).trigger('submit');
												});
												///////////////////// Editar campos imegn categoria ////////////////////
										</script>
						</div>
						<div class="col-12 mt-3 text-center">
							<textarea class="text-input-cat scrollbar col-12 m-0 py-1 text-center" rows="2" data-id="{{$cat->id}}" data-campo="nombre" style="font-size: 12px; background: #3a3a3a14; border-radius: 13px; font-weight: bold; border:none !important; outline: none !important;">{{$cat->nombre}}</textarea>
							<i id="pendcil" class="fas fa-pencil-alt" style="position: absolute; font-size: 10px; top: 5px; right: 20px;"></i>
							<div data-id="{{$cat->id}}" data-toggle="modal" data-target="#frameModalDelcat" class="col-12 m-0 my-1 mb-2 p-0 btn btn-primary text-center" style="background: rgba(255, 0, 0, 0.815) !important; border-color: rgba(255, 0, 0, 0.815) !important; height: 25px;; border-radius: 10px; color: white;">
								<i  class="del-cat fas fa-trash-alt"></i>
							</div>
						</div>
					</div>
				</div>
				@endforeach

		
			</div>
		
			{{-- <div class="multiple-items2 container p-2 my-5">
				
					<div class="col-12 d-flex justify-content-between align-items-center">
						<div id="" class=" col-1 d-flex justify-content-start" ><img src="img/design/menos.png" alt="" style=""></div>
						<div id="" class=" col-1 d-flex justify-content-end" ><img src="img/design/suma.png" alt=""></div>
					</div>
				
			</div> --}}
	
			{{-- <div class="col-12 mb-5">
				<div class="container py-2 d-flex justify-content-between flex-column flex-md-row">
					<div class="col-12 col-md-5 col-lg-4">
						<div class="col-12 py-auto d-flex justify-content-center align-items-center" style="background: white; border-radius: 36px;">
							<p class="my-2" style="font-size: 20px; color: #dfb1b3;">CATEGORÍA</p>
						</div>
					</div>
					<div class="col-12 col-md-7 col-lg-7 my-3 my-md-0 d-flex justify-content-end"> --}}
						{{-- <div class="col-6 col-md-5 mx-1 py-auto d-flex align-items-center justify-content-between" style="background: white; border-radius: 36px;">
							<p class="my-auto mx-4" style="font-size: 15px; font-weight: bold; color: rgba(102, 102, 102, 0.774);">Mayor precio</p>
							<img class="me-2" src="img/design/suma.png" width="30px" height="30px;" alt="">
						</div> --}}
						{{-- <input type="text" class="col-12 py-auto col-md-6  py-auto px-4 d-flex justify-content-center align-items-center" style="background: white; border-radius: 36px; border: none; min-height: 46px;" placeholder="Search">		
					</div>
				</div>
			</div> --}}
		</div>


		<form id="" action="nuevoprod" method="POST" class="col-12 d-flex justify-content-center align-items-center flex-column mt-2 text-center">
			@csrf
			<h3 style="color:black;">Agregar Producto</h3>
			<input type="text" name="nuevo" value="1" hidden>
			<button class="btn btn-primary" type="submit" style="background: #dfb1b3 !important; border-color: #dfb1b3 !important;">Agregar</button>
		</form>

		<div class="col-12 my-5 d-flex justify-content-center align-items-center">
			<div class="col-3 p-1 m-0 d-flex justify-content-between" style="background: #3a3a3a35; border-radius: 26px;">
				<div class="col-5 m-0 btn btn-primary" id="btn_grid" style="border-radius: 26px;  background: #3a3a3a !important; border-color: #3a3a3a !important;"><i class="fas fa-th"></i></div>
				<div class="col-5 m-0 btn btn-primary" id="btn_list" style="border-radius: 26px; background: #3a3a3a !important; border-color: #3a3a3a !important;"><i class="fas fa-list"></i></div>
			</div>
		</div>

		<div id="div_list" style="display:none;">
			<div class="col-12 my-5 px-4 px-0 mx-auto">
				<div class="card" style="box-shadow: none; border-radius: 15px;">
					<div class="card-body">
						<div class="table-responsive">
							<table id="myTable" class="table table-striped table-hover table-sm">
								<thead>
									<th style="">Productos</th>
									<th style="">Categoria</th>
									{{-- <th class="text-center" style="width: 5rem;">En inicio</th> --}}
									<th class="text-center" style="width: 50px;">inicio</th>
									<th class="text-center" style="width: 5rem;">Activo</th>
									<th class="text-center" style="width: 4rem;">Ops</th>
								</thead>
								<tbody class="sortable" data-table="vacante">
									@foreach($productos as $prod)
										<tr data-card="">
											<td class="align-middle">
												<p href="">
													{{$prod->nombre}}
												</p>
											</td>
											<td class="align-middle col-2">
												<select class="select-cat col-12" name="" id="" data-id="{{$prod->id}}">
													<option value="">{{!empty($prod->categoria) ? $prod->categoria : 'Sin categoria'}}</option>ipcon
													@foreach($categoria as $cat)
														@if($cat->nombre != $prod->categoria)
															<option value="{{$cat->id}}">{{$cat->nombre}}</option>
														@endif
													@endforeach
												</select>
											</td>
											
											{{-- <td class="align-middle">
												<div class="custom-control custom-switch" data-table="vacante" data-campo="inicio">
													<input type="checkbox" @if ($vac->inicio) checked @endif class="custom-control-input swiToAj" data-id="{{$vac->id}}" id="swiTo-{{$vac->id}}">
													<label class="custom-control-label" for="swiTo-{{$vac->id}}"></label>
												</div>
											</td> --}}
											<td class="align-middle col-1">
												<div class="custom-control custom-switch d-flex justify-content-end" data-table="Producto" data-campo="inicio">
													<input type="checkbox" {{$prod->inicio == 1 ? "checked" : ""}}  class="custom-control-input swiToAj" data-id="{{$prod->id}}" id="AswiTo-{{$prod->id}}">
													<label class="custom-control-label" for="AswiTo-{{$prod->id}}"></label>
												</div>
											</td>
											<td class="align-middle col-1">
												<div class="custom-control custom-switch d-flex justify-content-end" data-table="Producto" data-campo="inicio">
													<input type="checkbox"  {{$prod->activo == 1 ? "checked" : ""}} class="custom-control-input swiToAj" data-id="{{$prod->id}}" id="AswiTo-{{$prod->id}}">
													<label class="custom-control-label" for="AswiTo-{{$prod->id}}"></label>
												</div>
											</td>
											<td class="align-middle col-1">
												<div class="dropdown text-right">
													{{-- <button class="btn btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
														<i class="fas fa-ellipsis-v"></i>
													</button> --}}
													<a href="" class="btn btn-link btn-sm dropdown py-0" id="dropdownMenuButton"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
														<i class="fas fa-ellipsis-v"></i>
													</a>
													<div class="dropdown-menu" aria-labelledby="dropdownMenuButton" data-id="{{$prod->id}}">
														<a class="dropdown-item" href="productodetalle/{{$prod->id}}"><i class="far fa-fw fa-edit"></i> Editar</a>
														<button type="button" class="dropdown-item" data-toggle="modal" data-target="#frameModalDelProd" data-id="{{$prod->id}}"><i class="del-prod fas fa-fw fa-trash-alt"></i> Eliminar </button>
													</div>
												</div>
											</td>
										</tr>
										@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div id="div_grid" style="display:none;">
			<div class="col-12 d-flex justify-content-center align-items-center">
				
				<div class="col-12 px-2 d-flex " style="flex-wrap: wrap;">
		
					
					@foreach($productos as $prod)
					
					<div class="col-12 col-md-4 col-lg-3 p-1 px-4 mt-5 d-flex justify-content-center align-items-center" style="background: ;">
						<div class="col-9 col-md-12 p-1" style="background: white; border-radius: 26px; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.19) ;">
							<div class="col-12 p-4 d-flex justify-content-center align-items-center"><img src="{{asset('img/photos/productos/'.$prod->portada)}}" style="max-height: 145px !important; max-width: 228px !important;" alt="">
										{{-- html del input file estilizado --}}
											<form id="form_portada_prod{{$prod->id}}" action="portada_prod/{{$prod->id}}" method="POST" class="file-upload px-auto" style="position: absolute; left: 5px; right: 5px; top: 5px; bottom: 5px; font-size: 10px; " enctype="multipart/form-data">
											@csrf
												<input id="input_portada_prod{{$prod->id}}" class="m-0 p-0" type="file" name="archivo">
												<label class="col-12 m-0 px-2  d-flex justify-content-center align-items-center" for="input_portada_prod{{$prod->id}}" style=" height: 100%;   border-radius: 20px;">Seleccionar archivo</label>
											</form >
										{{-- html del input file estilizado --}}
										<div class="col-12 d-flex justify-content-end" style="position: absolute; top: -5px;" data-id="{{$prod->id}}">
											<i data-toggle="modal" data-target="#frameModalDelProd" class="del-prod fas fa-times p-2 px-3 m-0 mt-2" style="background: red;  color: white; border-radius: 16px; margin-right: -10px !important;"></i>
										</div>

										<script>
												///////////////////// Editar campos imegn categoria ////////////////////
												$('#input_portada_prod'+{{$prod->id}}).change(function(e) {
												$('#form_portada_prod'+{{$prod->id}}).trigger('submit');
												});
												///////////////////// Editar campos imegn categoria ////////////////////
										</script>

										
							</div>
							<div class="col-12 p-0 m-0" >
								<div class="col-12 p-2 m-0" style="background: #dfb1b3; border-radius: 26px;">
									<div class="col-12 mt-2 text-start">
										<textarea data-id="{{$prod->id}}" data-campo="nombre" rows="1" style="font-size: 15px; font-weight: bold; background: #ffffff14; border-radius: 13px; font-weight: bold; border:none !important; outline: none !important;" class="text-input-prod col-12 my-auto">{{$prod->nombre}}</textarea>
									</div>
									<div class="col-12 my-2 text-start">
										<textarea data-id="{{$prod->id}}" data-campo="descripcion" rows="3" style="font-size: 12px; font-weight: ; background: #ffffff14; border-radius: 13px; font-weight: ; border:none !important; outline: none !important;" class="containersc text-input-prod col-12 my-auto">{{$prod->descripcion}}</textarea>
									</div>
									<div class="col-12 my-2 text-start d-flex justify-content-between align-items-center">
										<textarea data-id="{{$prod->id}}" data-campo="precio" rows="1" style="font-size: 16px; background: #ffffff14; font-weight: bold; border-radius: 13px; font-weight: ; border:none !important; outline: none !important;" class="text-input-prod my-auto">{{$prod->precio}}</textarea>
										<a href="productodetalle/{{$prod->id}}" class="col-2 me-3">
											<img class="" src="{{asset('img/photos/productos/sección.png')}}" alt="">
										</a>
									</div>
								</div>
		
							</div>
						</div>
					</div>
		
					@endforeach
					
					</div>
		
				</div>
		
				<div class="col-12 my-3 d-flex justify-content-center align-items-center">
					<nav aria-label="Page navigation example">
						<ul class="pagination">
						<li class="page-item">
							{{-- <a class="page-link" href="#" aria-label="Previous">
							<span aria-hidden="true">&laquo;</span>
							</a> --}}
						</li>
						<li class="page-item"><a class="page-link m-2 p-3" style="border-radius: 16px; font-size: 15px; border: none; box-shadow: 1px 2px 10px rgba(0, 0, 0, 0.363) ; color: black; min-width: 50px; text-align: center;" href="#">1</a></li>
						<li class="page-item"><a class="page-link m-2 p-3" style="border-radius: 16px; font-size: 15px; border: none; box-shadow: 1px 2px 10px rgba(0, 0, 0, 0.363) ; color: black; min-width: 50px; text-align: center;" href="#">2</a></li>
						<li class="page-item"><a class="page-link m-2 p-3" style="border-radius: 16px; font-size: 15px; border: none; box-shadow: 1px 2px 10px rgba(0, 0, 0, 0.363) ; color: black; min-width: 50px; text-align: center;" href="#">3</a></li>
						<li class="page-item">
							{{-- <a class="page-link" href="#" aria-label="Next">
							<span aria-hidden="true">&raquo;</span>
							</a> --}}
						</li>
						</ul>
					</nav>
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
