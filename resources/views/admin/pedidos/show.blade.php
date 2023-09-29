@extends('layouts.admin')

@section('cssExtras')
	<link rel="stylesheet" href="{{asset('css/dropify.css')}}">
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
@endsection
@section('jsLibExtras')
@endsection

@section('content')

<div class="row mb-4 px-2">
	<a href="{{ route('config.seccion.index') }}" class="col col-md-2 btn btn-sm grey darken-2 text-white mr-auto" style="border-radius: 16px;"><i class="fa fa-reply"></i> Regresar</a>
</div>

<div class="col-12 my-3">
	<h5 class="col-12 text-center my-auto" style="font-weight: bold;">Lista de Pedidos</h5>
</div>
		
		<div id="conthorarios" class="col-12 " style="min-height: 700px; overflow: auto; background: #F5F7FF; border-radius: 26px;">
		
			<div class="col-12 px-0 py-3 d-flex flex-column">
				@forEach($pedido as $p)
				<div class="col-12 card py-2 px-2 mb-2 d-flex flex-row justify-content-between align-items-center" style="border-radius: 16px; box-shadow: 1px 1px 10px rgba(0, 0, 0, 0.085);">
					<label class="card col-3 text-start py-2 my-0" style="box-shadow: none; background: #F5F7FF; border-radius:13px;">
						<p class="col-auto my-auto">Num p :  {{$p->uid}}</p>
					</label>
					<label class="card col-3 text-start py-2 my-0" style="box-shadow: none; border:none; background: ; border-radius:13px;">
						<p class="col-auto my-auto">Cliente : {{$p->nom_user}}</p>
					</label>
					<label class="card col-3 text-start py-2 my-0" style="box-shadow: none; border:none; background: ; border-radius:13px;">
						<p class="col-auto my-auto">Total :  ${{ number_format($p->total, 2, '.', ',') }}</p>
					</label>
					<label class="card col-3 py-2 my-0 d-flex flex-wrap justify-content-end" style="box-shadow: none;  border-radius:13px; border:none;">
						<div class="col-auto d-flex flex-wrap justify-content-end" style=" ">
							<style>
								.cancelado {color: red; }
								.aprobado { color: #FFCA2C; } /* Amarillo */
								.revision { color: #28a745; } /* Verde */
								.diagnosticado { color: #007bff; } /* Azul */
								.aceptado { color: #17a2b8; } /* Cyan */
								.pago-efectivo { color: #6610f2; } /* Púrpura */
								.cotizacion-aceptada { color: #dc3545; } /* Rojo */
								.pago-50-cotizacion { color: #fd7e14; } /* Naranja */
								.reparando { color: #28a745; } /* Gris */
								.servicio-completado { color: #20c997; } /* Verde claro */
							</style>
							
							{{-- <a style="color: black;"><i class="fa-solid fa-user-pen"></i> </a> --}}
							<a style="color: black;" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fa-solid fa-eye ms-3" onclick="verPediso({{$p->id}})"></i></a>
							<a style="color: black;"><i class="fa-solid fa-circle ms-3" style="color:green;"></i> </a>
							{{-- <i class="fa-solid fa-circle mx-3 ms-4" style="color:#FFCA2C;"></i> --}}
						</div>
					</label>
				</div>
				@endforeach
			</div>
		
		
<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-xl">
	  <div class="modal-content" style="border-radius:26px;">
		<div class="modal-header">
		  <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
		  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		</div>
		<div id="modal_body" class="modal-body">
			
		</div>
		<div class="modal-footer">
		  <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
		  {{-- <button type="button" class="btn btn-primary">Understood</button> --}}
		</div>
	  </div>
	</div>
  </div>
		
	</div>

	<div class="col-12 mt-5 d-flex justify-content-center align-items-center">
		{{$pedido->links()}}
	</div>

@endsection
@section('jsLibExtras2')
<script src="{{asset('js/dropify.js')}}" charset="utf-8"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
@endsection
@section('jqueryExtra')
	<script type="text/javascript">
		function verPediso(id){
		console.log(id);
		var csrf = $('meta[name="csrf-token"]').attr('content');
		var URL = "{{route('detallesPU')}}";
		$.ajax({
			method: "POST",
			url: URL,
			data: {
				"_method": 'post',
				"_token": csrf,
				id: id
			}
		})
		.done(function(msg) {
			if (msg.success) {
				console.log(msg.mensaje);
				$('#modal_body').html(msg.mensaje)
			}else{
				toastr["error"]('no se encontro informacion del usuario');
			}
		});
		}	
	</script>
@endsection