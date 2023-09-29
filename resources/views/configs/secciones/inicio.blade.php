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

	.elim-div{
		opacity: 0%;
		transition: all 0.5s;
	}

	.cont_slid:hover .elim-div{
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


</style>
<style>
	.card_ini{
		top:-100px;
	}

#imgUpdate{
	opacity: 0%;
	background: rgba(0, 0, 0, 0.147);
	transition: all 0.5s;
}
#imgUpdate:hover{
	/* backdrop-filter: blur(5px); */
	opacity: 100%;
	color: white;
	font-weight: bold;
	
}

	@media only screen and (max-width: 768px){ 
		.card_ini{
		top:20px;
	}
	.cont_cards_ini{
		top: 1px !important;
	}
	}

	@media only screen and (max-width: 590px){  
		.tutulo_inicio{
			font-size: 35px !important;
		}
		.desc_inicio{
			font-size: 12px !important;
		}
		.cont_clientes{
			margin-top: 300px !important;
		}

	}
</style>
@endsection
@section('content')

<div class="row mb-4 px-2">
	<a href="{{ route('config.seccion.index') }}" class="col col-md-2 btn btn-sm grey darken-2 text-white mr-auto"><i class="fa fa-reply"></i> Regresar</a>
</div>
{{-- index slider principal --}}
<div class="col-12 mx-0 px-0" style="position: relative;max-width: 1375px;  max-height: 1001px;">
	<div class="col-12 mx-0 px-0" style="max-width: 1375px; height: 764px; position: relative;">
		<img src="{{asset('img/design/'.$elements[0]->imagen)}}" style="width: 100%; height: 100%;  border-radius: 16px;" alt="">
		{{-- <form action="{{route('config.seccion.delete_img')}}" method="POST" class="col-12 d-flex justify-content-end" style="position: absolute; background: ; top: 0;">
			@csrf
			<input type="text" name="id_img"  value="{{$elements[0]->id}}" hidden>
			<button class="btn btn-primary " style="z-index: 4; background: red !important; border:none;">Eliminar</button>
		</form> --}}
	</div>
	<div class="col-12 p-5" style="position: absolute; top: 0px; bottom: 0px; background: ;  ">
		<div class="col-6" style="position: relative; height: 100%;">
			<div class="col-12" style="z-index: 1;">
				<h1 style="font-size: 4rem; font-family: 'Courier New', Courier, monospace;">
					El Mejor Lugar para Decorar tu Hogar
				</h1>
			</div>

			<div class="col-12 d-flex flex-column" style="position: absolute; bottom: 0px; ">
				<div class="col-6" style="text-align: justify; z-index: 1;">
					<div class="col-12 mb-2 text-center"><i class="fa-solid fa-pencil" style="font-size: 1.5rem;"></i></div>
					<textarea class="col-12 scrollux editar_text_seccion_global" data-url="{{route('config.seccion.textglobalseccion')}}" data-id="{{$elements[1]->id}}" data-table="elemento" data-campo="texto"  cols="30" rows="5" style="background: #f2f2f2; border:none; border-radius: 10px;">{{$elements[1]->texto}}
					</textarea>
				</div>
				<div class="col-5" style="z-index: 1;">
					<button class="col-12 btn btn-primary px-5 py-3" style="background: #909986 !important; border:none;">STORE</button>
				</div>
				
			</div>
		</div>
	</div>
	{{-- html del input file estilizado --}}
		<form id="form_image_element" action="{{route('config.seccion.image_input_ejemplo')}}" method="POST" class="file-upload col-12 p-0 m-0" style="position: absolute; top: 0; bottom: 0; background: ; height: 100%;" enctype="multipart/form-data">
			@csrf
			<input type="text" name="id_elemento" value="{{$elements[0]->id}}" hidden>
			<input id="input_img_element" class="m-0 p-0" type="file" name="archivo">
			<label class="col-12 m-0 p-0 d-flex justify-content-center align-items-center" for="input_img_element" style="opacity: 100%; height: 100%;  border-radius: 16px;">Seleccionar archivo</label>
		</form>
	{{-- html del input file estilizado --}}
	<script>
		///////////////////// Editar campos imegn categoria ////////////////////
		$('#input_img_element').change(function(e) {
			$('#form_image_element').trigger('submit');
		});
		///////////////////// Editar campos imegn categoria ////////////////////
	</script>
</div>
{{-- index slider principal --}}

{{-- index categorias --}}
	<div class="col-12 my-5 py-5 mx-0 px-0" style="position: relative;">
		<div class="col-12 mt-5 mx-5 text-start">
			<p class="mt-5" style="font-size: 4.5rem; font-family: 'Courier New', Courier, monospace; color: #909986;">Categorias</p>
		</div>
		<div class="col-12 px-5 mb-5 d-flex justify-content-center align-items-center flex-wrap">
			@for($i = 1; $i <= 4; $i++)
			<div class="col-3 p-4">
				<div class="card" style="height: 230px; position: relative;">
					<img src="{{asset('img/design/categoría0'.$i.'.png')}}" style="height: 100%;" alt="">
				</div>
				<h5 class="mt-2" style="font-weight: bold;">
					Categoria {{$i}}
				</h5>
			</div>
			@endfor
		</div>
		<div class="col-12 d-flex justify-content-center align-items-center" style="background: rgba(0, 0, 0, 0.311);   position: absolute; top:0; bottom: 0; border-radius: 16px;">
			<p style="color: white; font-size: 2rem; font-weight: bold;">SECCION EDITABLE EN PRODUCTOS</p>
		</div>
	</div>
{{-- index categorias --}}

<hr>

{{-- index destacados --}}

	<div class="col-12 mt-5 pt-5">
		<div class="col-12 mb-5 d-flex justify-content-center align-items-center text-center flex-column">
			<p class="mt-5" style="font-size: 4.5rem; font-family: 'Courier New', Courier, monospace; color: #909986;">DESTACADOS</p>
			<div class="col-6">
				<div class="col-12 mb-2 text-center"><i class="fa-solid fa-pencil" style="font-size: 1.5rem;"></i></div>
				<textarea class="col-12 text-center editar_text_seccion_global" data-url="{{route('config.seccion.textglobalseccion')}}" data-id="{{$elements[2]->id}}" data-table="elemento" data-campo="texto" name="" id="" cols="30" rows="3" style="border-radius: 10px; border:none;">{{$elements[2]->texto}}</textarea>
			</div>
		</div>
		<div class="container d-flex flex-column mb-5 p-0" style="background: ; position: relative;">
			<div class="col-12 d-flex">
				<div class="col-6 p-4">
					<div class="card pt-4 d-flex align-items-center" style="position: relative; width: 612px;; height: 700px;">
						<img src="{{asset('img/design/producto01.png')}}" style="width: 80%;" alt="">
						<div class="col-12 p-3" style="height: 100px; background: ;">
							<div class="col-12" style="text-align: justify;">
								<p>NOMBRE DEL PRODUCTO</p>
								<P>$4,000</P>
							</div>
						</div>
					</div>
				</div>
				<div class="col-6 py-4 pe-4 d-flex ">
					<div class="col-6 " >
						<div class="card d-flex justify-content-center align-items-center" style="height: 350px;">
							<img src="{{asset('img/design/producto02.png')}}" alt="">
						</div>
						<div class="col-12 p-2" style="text-align: justify;">
							<p>NOMBRE DEL PRODUCTO</p>
							<P>$4,000</P>
						</div>
					</div>
					<div class="col-6 ps-3" >
						<div class="card d-flex justify-content-center align-items-center" style="height: 350px;">
							<img src="{{asset('img/design/producto03.png')}}" alt="">
						</div>
						<div class="col-12 p-2" style="text-align: justify;">
							<p>NOMBRE DEL PRODUCTO</p>
							<P>$4,000</P>
						</div>
					</div>
				</div>
			</div>
			<div class="col-12 d-flex" style="position: relative;">
				<div class="col-6 pb-4 pe-4 d-flex ">
					<div class="col-6 ps-3 " >
						<div class="card d-flex justify-content-center align-items-center" style="height: 350px;">
							<img src="{{asset('img/design/producto04.png')}}" alt="">
						</div>
						<div class="col-12 p-2" style="text-align: justify;">
							<p>NOMBRE DEL PRODUCTO</p>
							<P>$4,000</P>
						</div>
					</div>
					<div class="col-6 ps-3" >
						<div class="card d-flex justify-content-center align-items-center" style="height: 350px;">
							<img src="{{asset('img/design/producto05.png')}}" alt="">
						</div>
						<div class="col-12 p-2" style="text-align: justify;">
							<p>NOMBRE DEL PRODUCTO</p>
							<P>$4,000</P>
						</div>
					</div>
				</div>
				<div class="col-6 py-4 pe-4">
					<div class="card pt-4 d-flex align-items-center" style="width: 640px; height: 700px; position: absolute; top:-260px;">
						<img src="{{asset('img/design/producto06.png')}}" style="width: 70%;" alt="">
						<div class="col-12 p-3" style="height: 100px; background: ;">
							<div class="col-12" style="text-align: justify;">
								<p>NOMBRE DEL PRODUCTO</p>
								<P>$4,000</P>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-12 d-flex justify-content-center align-items-center" style="background: rgba(0, 0, 0, 0.311);   position: absolute; top:0; bottom: 0; border-radius: 16px;">
				<p style="color: white; font-size: 2rem; font-weight: bold;">SECCION EDITABLE EN PRODUCTOS</p>
			</div>
		</div>
	</div>

{{-- index destacados --}}


{{-- index proceso de compra --}}

<div class="col-12">
<div class="container my-5 py-5" style="background: #F8F8F8;">
	<div class="col-12 mb-5 text-center">
		<h4 style="font-weight: bold;">PROCESO DE COMPRA</h4>
	</div>
	<div class="col-12 d-flex flex-wrap">
		<div class="col-3 text-center d-flex flex-column"><i class="mb-3 fas fa-shopping-cart" style="font-size: 3rem;"></i>
		<div class="col-12 mb-2 text-center"><i class="fa-solid fa-pencil" style="font-size: 1rem;"></i></div>
			<textarea class="text-center scrollux editar_text_seccion_global" data-url="{{route('config.seccion.textglobalseccion')}}" data-id="{{$elements[3]->id}}" data-table="elemento" data-campo="texto" style="border-radius: 10px; border:none;">{{$elements[3]->texto}}</textarea>
		</div>
		<div class="col-3 text-center d-flex flex-column"><i class="mb-3 fas fa-user" style="font-size: 3rem;"></i>
		<div class="col-12 mb-2 text-center"><i class="fa-solid fa-pencil" style="font-size: 1rem;"></i></div>
			<textarea class="text-center scrollux editar_text_seccion_global" data-url="{{route('config.seccion.textglobalseccion')}}" data-id="{{$elements[4]->id}}" data-table="elemento" data-campo="texto" style="border-radius: 10px; border:none;">{{$elements[4]->texto}}</textarea>
		</div>
		<div class="col-3 text-center d-flex flex-column"><i class="mb-3 fas fa-wallet" style="font-size: 3rem;"></i>
		<div class="col-12 mb-2 text-center"><i class="fa-solid fa-pencil" style="font-size: 1rem;"></i></div>
			<textarea class="text-center scrollux editar_text_seccion_global" data-url="{{route('config.seccion.textglobalseccion')}}" data-id="{{$elements[5]->id}}" data-table="elemento" data-campo="texto" style="border-radius: 10px; border:none;">{{$elements[5]->texto}}</textarea>
		</div>
		<div class="col-3 text-center d-flex flex-column"><i class="mb-3 fas fa-truck" style="font-size: 3rem;"></i>
		<div class="col-12 mb-2 text-center"><i class="fa-solid fa-pencil" style="font-size: 1rem;"></i></div>
			<textarea class="text-center scrollux editar_text_seccion_global" data-url="{{route('config.seccion.textglobalseccion')}}" data-id="{{$elements[6]->id}}" data-table="elemento" data-campo="texto" style="border-radius: 10px; border:none;">{{$elements[6]->texto}}</textarea>
		</div>
	</div>
</div>
</div>

{{-- index proceso de compra --}}

{{-- index contacto --}}

<div class="col-12 my-5 py-5 mx-0 px-0" style="position: relative;">
	<div class="col-12 text-center">
		<p class="mt-5" style="font-size: 4.5rem; font-family: 'Courier New', Courier, monospace; color: #909986;">CONTACTO</p>
	</div>
	<form class="container d-flex justify-content-center flex-wrap">
		<div class="col-4 pe-2">
			<div class="input-group">
				<input type="text" class="form-control" placeholder="Nombre" aria-label="" aria-describedby="" style="height: 80px;">
			</div>
		</div>
		<div class="col-4 ps-2">
			<div class="input-group">
				<input type="text" class="form-control" placeholder="Email" aria-label="" aria-describedby="" style="height: 80px;">
			</div>
		</div>
		<div class="col-8 my-4">
			<div class="input-group" style="position: relative;">
				<input type="text" class="form-control" placeholder="Mensaje" aria-label="" aria-describedby="" style="height: 80px;">
				<div class="col-12 p-2 d-flex justify-content-end align-items-center" style="position: absolute; top: 0px; bottom: 0px;">
					<button class="btn btn-primary px-5 py-3" style="background: #909986 !important; border:none; height: 100%; width: 250px;">ENVIAR</button>
				</div>
			</div>
		</div>
	</form>
	<div class="col-12 d-flex justify-content-center align-items-center" style=" background: rgba(0, 0, 0, 0.311); z-index: 10;  position: absolute; top:0; bottom: 0; border-radius: 16px;">
		<p style="color: white; font-size: 2rem; font-weight: bold;">SECCION NO EDITABLE</p>
	</div>
</div>

{{-- index contacto --}}

@endsection
@section('jsLibExtras2')
	<script src="{{asset('js/dropify.js')}}" charset="utf-8"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
@endsection
@section('jqueryExtra')
<script type="text/javascript">


</script>
<script type="text/javascript">
	$('.multiple-items').slick({
	infinite: false,
	slidesToShow: 1,
	slidesToScroll: 1,
	arrows:false
	});
	$('.multiple-items2').slick({
	infinite: false,
	slidesToShow: 4,
	slidesToScroll: 1,
	arrows:false,
	responsive: [
{
breakpoint: 1024,
settings: {
slidesToShow: 2,
slidesToScroll: 1
}
},
{
breakpoint: 600,
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
</script>
<!-- Facebook Pixel Code -->

	<!-- End Facebook Pixel Code -->
	

@endsection
