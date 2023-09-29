@extends('layouts.front')

@section('title', 'Inicio')
{{-- CABECERAS DE ESTILOS --}}
    @section('cssExtras')


    @endsection
{{-- CABECERAS DE ESTILOS --}}

{{-- ESTILOS CSS PERSONALIZADOS --}}
    @section('styleExtras')
    <style>
        .card_ini{
            top:-100px;
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
            .titulo-relacionado{
               font-size: 2.5rem !important;
            }

        }
    </style>


    @endsection
{{-- ESTILOS CSS PERSONALIZADOS --}}

{{-- CONTENIDO DE LA PAGINA --}}
    @section('content')

{{-- detalle producto --}}

<form action="{{route('addCard')}}" method="POST" class="col-12 d-flex flex-wrap p-2 p-md-3 p-lg-5" style="background: #f2f2f2;">
    @csrf
    <div class="col-12 col-md-12 col-lg-6 p-4 px-0 px-md-5 px-lg-5 d-flex justify-content-center">
        <div class="card p-4 galImg" style="position: ; border-radius: 10px; width: 500px; height: 600px;">
			<img src="{{asset('img/photos/productos/'.$producto->portada)}}" style="width: 100%; height: 100%; border-radius: 5px;"  alt="">
			@foreach($productosPhoto as $imgp)

			<img src="{{asset('img/photos/productos/'.$imgp->image)}}" style=" max-width: 450px; max-height: 540px; border-radius: 5px;"  alt="">

			@endforeach
        </div>
    </div>
    <div class="col-12 col-md-12 col-lg-6 p-4 px-0 px-md-5 px-lg-5 d-flex justify-content-start">
        <div class="col-12 pt-5" style="border-radius: 5px; ">
            <div class=" col-12 col-md-12 col-lg-10 text-start" style="background: ;">
                <h4 class="" style="background: ;">{{$producto->nombre}}</h4>
                <hr>
                <p class="col-12" style="font-size: 12px; height: 150px;">{{$producto->descripcion}}</p>
                <div class="col-12 d-flex">
                    <div class="col-6">
                        <h4>Color</h4>
                        <div class="col-12 d-flex">
                            <div class="mx-1" style="background: {{$color->color}}; width:25px; height:25px; border-radius: 50%;"></div>
                        </div>
                    </div>
                    <div class="col-6">
                        <h4>Cantidad disponible</h4>
                        <div class="col-12">
                            @if($producto->cantidad > 0)
                            <h4>{{$producto->cantidad}}</h4>
                            @else
                            <h6>Sin existencias</h6>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-12 mt-5">
                    <h4>${{ number_format($producto->precio, 2, '.', ',') }}</h4>
                </div>
                <div class="col-12 mt-5 d-flex">
                    <input type="text" name="id_prod" value="{{$producto->id}}" hidden>
                    <button type="button" class="px-5 py-3 btn btn-primary me-3" style="background: #909986; border:none;"><h4 class="my-auto">ATRAS</h4></button>
                    @if($producto->cantidad > 0) 
                    <button type="submit" class="px-5 py-3 btn btn-primary" style="background: #B98C87; border:none;" ><h4 class="my-auto">COMPRAR</h4></button>
                    @endif
                </div>
            </div>
        </div>
    </div>
</form>

{{-- detalle producto --}}

{{-- store titulo productos --}}

<div class="col-12">
    <div class="col-12 my-5 mx-5 text-center">
        <p class="mt-5 titulo-relacionado" style="font-size: 3.5rem; font-family: 'Courier New', Courier, monospace; color: #909986;">RELACIONADOS</p>
    </div>
</div>

{{-- store titulo productos --}}


{{-- store productos --}}

<div class="col-12 my-5">

    <div class="container mb-5 d-flex flex-wrap">

        @foreach($relacionado as $r)
        <div class="col-12 col-md-6 col-lg-3 p-4">
            <a href="{{url('detprod/'.$r->id)}}" class="col-12" style="text-decoration: none; color: black;">
            <div class="card p-3 d-flex justify-content-center align-items-center" style="height: 300px;">
                <img src="{{asset('img/photos/productos/'.$r->portada)}}" style="max-width: 217px; max-height: 241px;" alt="">
            </div>
            <hr>
            <div class="col-12 d-flex flex-column" style="text-align: justify;">
                <h5 style="">{{$r->nombre}}</h5>
                <p>${{ number_format($r->precio, 2, '.', ',') }}</p>
            </div>
        </a>
        </div>
        @endforeach

    </div>

</div>

{{-- store productos --}}

    @endsection
{{-- CONTENIDO DE LA PAGINA --}}

{{-- JAVASCRIPT EXTRAS --}}
    @section('jqueryExtra')

    <script>

    </script>
        <script type="text/javascript">
	$('.galImg').slick({
            dots:true,
            infinite: true,
            autoplay: true,
            autoplaySpeed: 2000,
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplaySpeed: 2000,
            });
        </script>

    @endsection
{{-- JAVASCRIPT EXTRAS --}}
