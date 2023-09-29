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

</style>
@endsection
@section('content')
	<div class="row mb-4 px-2">
		<a href="{{ route('config.seccion.index') }}" class="col col-md-2 btn btn-sm grey darken-2 text-white mr-auto"><i class="fa fa-reply"></i> Regresar</a>
	</div>

	<div class="col-12 p-1" style="background: white; border-radius: 26px;">

		
		<div class="col-12 mt-5 d-flex justify-content-center align-items-center">
			<div class="container">
				<div class="col-12 d-flex justify-content-center align-items-center flex-column">
					<p style="font-size: 20px; font-weight: bold; color: ;" class="my-auto">¿Tienes alguna duda?</p>
					<p style="font-size: 25px; font-weight: bold; color: #dfb1b3;" class="my-auto">ENVIANOS UN MENSAJE</p>
					<form class="col-12 col-md-6 my-5" action="" method="POST">
						@csrf
						<div class="input-group mb-3">
							<input type="text" class="col-6 form-control m-1" placeholder="Nombre" aria-label="" style="border-radius: 16px; box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.239) ;">
							<input type="text" class="col-6 form-control m-1" placeholder="Telefono" aria-label="" style="border-radius: 16px; box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.239) ;">
						  </div>
						  <div class="input-group mb-3">
							<input type="email" class="col-6 form-control m-1" placeholder="Correo" aria-label="" style="border-radius: 16px; box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.239) ;">
							<input type="text" class="col-6 form-control m-1" placeholder="Asunto" aria-label="" style="border-radius: 16px; box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.239) ;">
						  </div>
						  <div class="mb-3">
							<textarea class="col-12 form-control m-1" id="exampleFormControlTextarea1" rows="4" style="border-radius: 16px; box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.239) ;">Mensaje</textarea>
						  </div>
						  <div class="input-group mb-3 d-flex justify-content-center">
							<button class="btn btn-primary" style="background: #dfb1b3 !important; border:none !important; font-size: 15px; font-weight: bold; color: white; border-radius: 16px;">Enviar</button>
						  </div>
					</form>
	
					<div class="col-12 mb-5 d-flex justify-content-center align-items-center flex-column flex-md-row" style="color: #dfb1b3 !important;">
						<div class="col-12 col-md-4 col-lg-3 my-2 my-md-0 text-center text-md-start"><i class="mx-2 fa-brands fa-whatsapp"></i>
							<i class="mx-2 fa-brands fa-facebook"></i>
							<i class="mx-2 fa-brands fa-instagram"></i></div>
						<div class="col-12 col-md-4 col-lg-3 my-2 my-md-0 text-center"><i class="fa-solid fa-envelope"></i> contacto@sandpa.com</div>
						<div class="col-12 col-md-4 col-lg-3 my-2 my-md-0 text-center text-md-end"><i class="fa-solid fa-phone"></i> Tel. 33 33 33 33 33</div>
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
