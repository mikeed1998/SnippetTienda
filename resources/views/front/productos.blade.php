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
        .titulocat{
            font-size: 2.5rem !important;
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
            .titulocat{
            font-size: 1.5rem !important;
        }

        }
    </style>


    @endsection
{{-- ESTILOS CSS PERSONALIZADOS --}}

{{-- CONTENIDO DE LA PAGINA --}}
    @section('content')



{{-- store categorias --}}
<div class="col-12 my-5 py-5">
    <div class="col-12 px-5 mb-5 responsive">
        @foreach($categorias as $c)
        <form action="{{url('products')}}" method="GET" class="col-3 p-4" style="text-decoration: none; color: black;">
            <input type="text" name="Categoria" value="{{$c->id}}" hidden>
            <button type="submit" class="col-12" style="border:none; background:none;">
                <div class="card" style="height: 230px; position: relative;">
                    <img src="{{asset('img/photos/categorias/'.$c->image)}}" style="height: 100%;" alt="">
                </div>
                <h5 class="mt-2" style="font-weight: bold;">
                    {{$c->nombre}}
                </h5>
            </button>
        </form>
        @endforeach
    </div>
</div>
{{-- store categorias --}}

{{-- store titulo productos --}}

<div class="col-12">
    <div class="col-12 my-5 mx-5 text-center">
        <p class="mt-5 titulocat" style="font-size: 3.5rem; font-family: 'Courier New', Courier, monospace; color: #909986;">CATEGORIA / @if(!empty($nom_cat)) {{$nom_cat->nombre}} @else TODAS @endif</p>
    </div>
</div>

{{-- store titulo productos --}}

{{-- store productos --}}

<div class="col-12 my-5">

    <div class="container mb-5 d-flex justify-content-center align-items-center flex-wrap">

        @foreach($productos as $p)
        <div class="col-12 col-md-6 col-lg-3 p-4">
            <a href="{{url('detprod/'.$p->id)}}" class="col-12" style="text-decoration: none; color: black;">
            <div class="card p-3 d-flex justify-content-center align-items-center" style="height: 300px;">
                <img src="{{asset('img/photos/productos/'.$p->portada)}}" style="max-width: 217px; max-height: 241px;" alt="">
            </div>
            <hr>
            <div class="col-12 d-flex flex-column" style="text-align: justify;">
                <h5 style="">{{$p->nombre}}</h5>
                <p>${{ number_format($p->precio, 2, '.', ',') }}</p>
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

    @endsection
{{-- JAVASCRIPT EXTRAS --}}
