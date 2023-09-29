<style>
	.opt:hover{
		background: rgba(0, 0, 0, 0.097);
	}
	
</style>

<style>
	.div-cont{
		display: block;
	}
	.div-cont2{
		display: none !important;
	}

	.scrollux::-webkit-scrollbar {
		width: 8px;     /* Tamaño del scroll en vertical */
		height: 8px;    /* Tamaño del scroll en horizontal */
		display: none;  /* Ocultar scroll */
	}
	/* Ponemos un color de fondo y redondeamos las esquinas del thumb */
	.scrollux::-webkit-scrollbar-thumb {
		background: #ccc;
		border-radius: 4px;
	}

	/* Cambiamos el fondo y agregamos una sombra cuando esté en hover */
	.scrollux::-webkit-scrollbar-thumb:hover {
		background: #b3b3b3;
		box-shadow: 0 0 2px 1px rgba(0, 0, 0, 0.2);
	}

	/* Cambiamos el fondo cuando esté en active */
	.scrollux::-webkit-scrollbar-thumb:active {
		background-color: #999999;
	}
	/* Ponemos un color de fondo y redondeamos las esquinas del track */
	.scrollux::-webkit-scrollbar-track {
		background: #e1e1e1;
		border-radius: 4px;
	}

	/* Cambiamos el fondo cuando esté en active o hover */
	.scrollux::-webkit-scrollbar-track:hover,
	.scrollux::-webkit-scrollbar-track:active {
	background: #d4d4d4;
	}

	@media only screen and (max-width: 768px){ 
		.div-cont{
		display:none !important;
	}
	.div-cont2{
		display: block !important;
	}
	}

	@media only screen and (max-width: 590px){  


	}
</style>

<div class="col-12 card pt-2 px-2 d-flex justify-content-between flex-lg-column div-cont" style="width: 160px ; border-radius: 12px; height: 500px;">

	<div class="col-12 d-flex flex-column" style="max-height: ">
	<a href="{{url('/')}}" class="opt col-12 mb-2 p-2 d-flex " style="background: ; color: black; border-radius: 6px; box-shadow:1px 1px 10px rgba(0, 0, 0, 0.097);">
		<i class="fa-solid fa-house me-2 my-auto"></i><p class="col-auto my-auto" style="font-weight: bold;">Home</p>
	</a>
	<a href="{{url('home')}}" class="opt col-12 mb-2 p-2 d-flex " style="background: ; color: black; border-radius: 6px; box-shadow:1px 1px 10px rgba(0, 0, 0, 0.097);">
		<i class="fa-solid fa-user-gear me-2 my-auto"></i><p class="col-auto my-auto" style="font-weight: bold;">Perfil</p>
	</a>
	<a href="{{url('denvios')}}" class="opt col-12 mb-2 p-2 d-flex " style="background: ; color: black; border-radius: 6px; box-shadow:1px 1px 10px rgba(0, 0, 0, 0.097);">
		<i class="fa-regular fa-paper-plane me-2 my-auto"></i><p class="col-auto my-auto" style="font-weight: bold;">Datos envio</p>
	</a>
	<a href="{{url('miCarrito')}}" class="opt col-12 mb-2 p-2 d-flex " style="background: ; color: black; border-radius: 6px; box-shadow:1px 1px 10px rgba(0, 0, 0, 0.097);">
		<i class="fas fa-shopping-cart  me-2 my-auto"></i><p class="col-auto my-auto" style="font-weight: bold;">Mi carrito</p>
	</a>
	<a href="{{url('pedidos')}}" class="opt col-12 mb-2 p-2 d-flex " style="background: ; color: black; border-radius: 6px; box-shadow:1px 1px 10px rgba(0, 0, 0, 0.097);">
		<i class="fa-solid fa-bag-shopping  me-2 my-auto"></i><p class="col-auto my-auto" style="font-weight: bold;">Mis pedidos</p>
	</a>
	</div>

	<div class="col-12 d-flex flex-column" style="max-height: ">
		<form action="{{ route('logout') }}" method="POST" class="p-0" style="background: none; border:none;">
			@csrf
		<button  class="col-12 mb-2 p-2 d-flex " style="background: rgba(255, 0, 0, 0.179); border:none; border-radius: 50px; box-shadow:1px 1px 10px rgba(0, 0, 0, 0.097); color: black;">
			
			<i class="fa-solid fa-power-off me-2 my-auto"></i><p class="col-auto my-auto" style="font-weight: bold;">Cerrar sesion</p>
		</button>
	</form>
	</div>

</div>



<div class="col-12 card pt-2 px-2 mb-3 d-flex justify-content-between flex-lg-column div-cont2 " style=" border-radius: 12px; ">

	<div class="col-12 d-flex flex-row scrollux" style="overflow-x: auto; ">
		<a href="{{url('/')}}" class="opt col-12 col-md-3 mb-2 p-2 d-flex " style="background: ; color: black; border-radius: 6px; box-shadow:1px 1px 10px rgba(0, 0, 0, 0.097);">
			<i class="fa-solid fa-house me-2 my-auto"></i><p class="col-auto my-auto" style="font-weight: bold;">Home</p>
		</a>
		<a href="{{url('home')}}" class="opt col-12 col-md-3 mb-2 p-2 d-flex " style="background: ; color: black; border-radius: 6px; box-shadow:1px 1px 10px rgba(0, 0, 0, 0.097);">
			<i class="fa-solid fa-user-gear me-2 my-auto"></i><p class="col-auto my-auto" style="font-weight: bold;">Perfil</p>
		</a>
		<a href="{{url('denvios')}}" class="opt col-12 col-md-3 mb-2 p-2 d-flex " style="background: ; color: black; border-radius: 6px; box-shadow:1px 1px 10px rgba(0, 0, 0, 0.097);">
			<i class="fa-regular fa-paper-plane me-2 my-auto"></i><p class="col-auto my-auto" style="font-weight: bold;">Datos envio</p>
		</a>
		<a href="{{url('miCarrito')}}" class="opt col-12 col-md-3 mb-2 p-2 d-flex " style="background: ; color: black; border-radius: 6px; box-shadow:1px 1px 10px rgba(0, 0, 0, 0.097);">
			<i class="fas fa-shopping-cart  me-2 my-auto"></i><p class="col-auto my-auto" style="font-weight: bold;">Mi carrito</p>
		</a>
		<a href="{{url('pedidos')}}" class="opt col-12 col-md-3 mb-2 p-2 d-flex " style="background: ; color: black; border-radius: 6px; box-shadow:1px 1px 10px rgba(0, 0, 0, 0.097);">
			<i class="fa-solid fa-bag-shopping  me-2 my-auto"></i><p class="col-auto my-auto" style="font-weight: bold;">Mis pedidos</p>
		</a>
	</div>

</div>

<div class="col-3 col-md-2 d-flex flex-column div-cont2" style="position: absolute; bottom: 0px;">
	<form action="{{ route('logout') }}" method="POST" class="p-0" style="background: none; border:none;">
		@csrf
	<button  class="col-12 mb-2 p-2 d-flex text-center" style="background: rgba(255, 0, 0, 0.179); border:none; border-radius: 50px; box-shadow:1px 1px 10px rgba(0, 0, 0, 0.097); color: black;">
		<i class="col-12 fa-solid fa-power-off me-2 my-auto"></i>
	</button>
</form>
</div>

<script type="text/javascript">
	$('.responsive').slick({
	dots: true,
	infinite: true,
	speed: 300,
	slidesToShow: 4,
	slidesToScroll: 1,
	arrow:true,
	autoplay: true,
	autoplaySpeed: 2000,
	responsive: [
		{
		breakpoint: 1024,
		settings: {
			slidesToShow: 2,
			slidesToScroll: 2,
			infinite: true,
			dots: true
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