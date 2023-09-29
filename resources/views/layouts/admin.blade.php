<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>{{ config('app.name', 'Admin') }}</title>

	{{-- <link rel="stylesheet" type="text/css" href="{{asset('css/admin.css')}}"/> --}}
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
	<link rel="stylesheet" href="{{asset('css/bootstrap-4.min.css')}}">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="{{asset('css/slick/slick.css')}}"/>
	<link rel="stylesheet" type="text/css" href="{{asset('css/slick/slick-theme.css')}}"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<script src="https://code.jquery.com/jquery-3.6.1.slim.js" integrity="sha256-tXm+sa1uzsbFnbXt8GJqsgi2Tw+m4BLGDof6eUPjbtk=" crossorigin="anonymous"></script>
	{{-- <link rel="stylesheet" href="{{asset('css/mdb.min.css')}}"> --}}
	<link rel="stylesheet" href="{{asset('css/mdb-ad.css')}}">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
	{{-- @notifyCss --}}

@yield('cssExtras')
	@yield('jsLibExtras')
	@yield('styleExtras')

</head>
<style>
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

</style>
<body class="fixed-sn black-skin" style="background-repeat: no-repeat; background-size: 100%; background-image: url({{asset('img/design/fondoadmin.png')}})">
	@include('layouts.partials_ad.header')

	{{-- @include('notify::messages') --}}

	<main class="col-12" style="margin-left: 0%; margin-top: -28px;">
		<div class="card scrollux px-5 py-5" style="background: white;  border-radius: 16px; max-height: 92vh; box-shadow: 1px 1px 10px rgba(0, 0, 0, 0.291); overflow: auto;">
			@yield('content')
		</div>
	</main>

	<script type="text/javascript" src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
	<script type="text/javascript" src="{{asset('js/popper.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/bootstrap-4.js')}}"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
	<script type="text/javascript" src="{{asset('js/vendor/tinymce/tinymce.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/slick.min.js')}}"></script>
	{{-- <script src="https://cdn.tiny.cloud/1/jkghs698bzdurxbsfn1o8fh4mzzikbzxid9haupezccqmmge/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script> --}}
	<script type="text/javascript" src="{{asset('js/mdb-ad.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/modules/admin.js')}}"></script>
	{!! Toastr::message() !!}
	{{-- @notifyJs --}}
	{{-- <script type="text/javascript" src="{{asset('js/mdb.min.js')}}"></script> --}}
	@yield('jsLibExtras2')

	<script>
		$(".button-collapse").sideNav();

		var container = document.querySelector('.custom-scrollbar');
		var ps = new PerfectScrollbar(container, {
			wheelSpeed: 2,
			wheelPropagation: true,
			minScrollbarLength: 20
		});

		$(function() {
			$('[data-toggle="tooltip"]').tooltip()
		})
	</script>

	@yield('jqueryExtra')

</body>

</html>
