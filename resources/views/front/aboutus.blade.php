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

{{-- slider inicio --}}
    <div class="col-12 d-flex justify-content-center" style="position: ;  max-height:600px;">
        <div class="container d-flex justify-content-center align-items-center text-center flex-column py-5">
            <img src="{{asset('img/design/logo.png')}}" alt="" style="width: 50%;">
            <div class="col-12 col-md-10 col-lg-5 mt-5">
                <p style="text-align: justify;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis assumenda mollitia modi temporibus sunt obcaecati tenetur nam vero quas molestiae. Asperiores, assumenda doloribus! Magni, voluptate incidunt iusto
                    <br></p>
                <p style="text-align: justify;">nisi totam deserunt eveniet, minima, quidem asperiores quisquam veritatis. Voluptatum, laborum voluptas officia repellat quis excepturi cupiditate, sit adipisci sint, rerum perspiciatis! Molestiae?</p>
            </div>
        </div>
    </div>
{{-- slider inicio --}}


<div class="col-12 my-5" style="background: #f7f7f7;">

    <div class="container d-flex flex-column flex-md-column flex-lg-row mb-5 py-4">
        <div class="col-12 col-md-12 col-lg-6 my-5 my-md-5 my-lg-0 d-flex justify-content-center justify-content-md-start justify-content-lg-center align-items-center flex-column ">
            <div class="col-auto">
                <p class="mt-0 p-0" style="font-size: 5rem; font-weight: bold; color: #27306B;">Misión</p>
                <hr class="mt-0 col-10" style="color: red; background: red; height: 5px;">
                <div class="col-10">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                        Debitis tempora accusamus aut id iste, architecto sunt 
                        quibusdam fugit incidunt similique dolores ut voluptatem 
                        magni libero cupiditate nisi, veritatis provident obcaecati!</p>
                </div>
            </div>
            <div class="col-auto">
                <p class="mt-0 p-0" style="font-size: 5rem; font-weight: bold; color: #27306B;">visión</p>
                <hr class="mt-0 col-10" style="color: red; background: red; height: 5px;">
                <div class="col-10">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                        Debitis tempora accusamus aut id iste, architecto sunt 
                        quibusdam fugit incidunt similique dolores ut voluptatem 
                        magni libero cupiditate nisi, veritatis provident obcaecati!</p>
                </div>
            </div>


        </div>
        <div class="col-12 col-md-12 col-lg-6 my-5 my-md-5 my-lg-0">
            <img class="col-12" src="{{asset('img/design/nosotros_01.png')}}" alt="">
        </div>
    </div>

</div>

<div class="col-12 my-5">
    <div class="container text-center d-flex flex-column justify-content-center align-items-center">
        <h1 style="color: #27306B;">Juntos logramos nuestros objetivos</h1>
        <p class="col-12 col-md-10 col-lg-6 mt-3">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sequi beatae corporis similique repellendus, mollitia magnam iure exercitationem quod quos hic optio a veniam</p>
    </div>
</div>


<div class="col-12 cont_clientes py-5" style="margin-top: 50px; background: #f7f7f7;">

    <div class="container">
        <h1 class="text-center col-12" style="color: #27306B; font-weight: bold;">Clientes</h1>

        <div class="col-12 multiple-items2 py-3">
            @for($i = 1 ; $i <= 6; $i++)
            <div class="p-5 p-md-3 p-lg-2">
                <div class="card d-flex justify-content-center align-items-center p-3" style="width: 310px; min-height: 100px; box-shadow: 1px 1px 10px rgba(0, 0, 0, 0.207); border-radius: 16px;">
                    <img src="{{asset('img/design/cliente_02.png')}}" style="width: 100%; height: 100%;" alt="">
                </div>
            </div>
            @endfor
        </div>
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
