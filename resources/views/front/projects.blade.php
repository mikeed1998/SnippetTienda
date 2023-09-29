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

        }
    </style>


    @endsection
{{-- ESTILOS CSS PERSONALIZADOS --}}

{{-- CONTENIDO DE LA PAGINA --}}
    @section('content')

    <div class="col-12 my-5 text-center d-flex justify-content-center align-items-center flex-column">
        <p class="mt-5 titulo-proy" style="font-size: 4.5rem; font-family: 'Courier New', Courier, monospace; color: #909986;">PROYECTOS</p>
        <p class="col-12 col-md-10 col-lg-6">{{$elements[0]->texto}}</p>
    </div>

    <div class="col-12">
        <div class="container d-flex flex-wrap">

            @foreach($proyectos as $p)
            <div class="col-12 col-md-6 col-lg-4 p-3">
                <div class="card" style="height: 260px;">
                    <img src="{{asset('img/photos/servicios/'.$p->image)}}" alt="">
                </div>
                <div class="col-12 mt-3 d-flex flex-column" style="text-align: justify;">
                    <h5>{{$p->titulo}}</h5>
                    <hr class="my-2">
                    <p>{{$p->descripcion}}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <div class="col-12 my-5 d-flex justify-content-center align-items-center flex-column text-center">
        <img src="{{asset('img/design/footerp.png')}}" alt="">
        <a href="" class="mt-2" style="color: #909986; font-size: 1.2rem;">VISITAR</a>
        <div class="col-auto d-flex justify-content-center align-items-center flex-row">
            
        </div>
    </div>

    @endsection
{{-- CONTENIDO DE LA PAGINA --}}

{{-- JAVASCRIPT EXTRAS --}}
    @section('jqueryExtra')

    <script>

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

    @endsection
{{-- JAVASCRIPT EXTRAS --}}
