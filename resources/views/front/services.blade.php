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

    <div class="col-12 my-5">

        <div class="container d-flex flex-column flex-md-column flex-lg-row mb-5 py-4">
            <div class="col-12 col-md-12 col-lg-6 my-5 my-md-5 my-lg-0 d-flex justify-content-center justify-content-md-start justify-content-lg-center align-items-center flex-column ">
                <div class="col-auto">
                    <h1 class="mb-0 pb-0" style="font-weight: bold; color: #3f7ad3;">Nuestros</h1>
                    <p class="mt-0 p-0" style="font-size: 5rem; font-weight: bold; color: #27306B;">Servicios</p>
                    <hr class="mt-0" style="color: red; background: red; height: 5px;">
                </div>
    
    
            </div>
            <div class="col-12 col-md-12 col-lg-6 my-5 my-md-5 my-lg-0">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                    Debitis tempora accusamus aut id iste, architecto sunt 
                    quibusdam fugit incidunt similique dolores ut voluptatem 
                    magni libero cupiditate nisi, veritatis provident obcaecati!</p>
                    <br>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                        Debitis tempora accusamus aut id iste, architecto sunt 
                        quibusdam fugit incidunt similique dolores ut voluptatem 
                        magni libero cupiditate nisi, veritatis provident obcaecati!</p>
            </div>
        </div>
    
    </div>

<div class="col-12 d-flex flex-row justify-content-center p-2 pb-5 pb-md-5 pb-lg-5" style="position: ; background: ; height: 100%;">

    <div class="container d-flex justify-content-center flex-wrap cont_cards_ini" style="z-index: 3; position: relative ; background: ; top:0; height: 100%;">
        @for($i = 0; $i <6 ; $i++)
        <div class="card m-2 " style="position: ; width: 400px; height: 450px; background-size: cover; background-image: url({{asset('img/design/servicio_01.png')}}); border-radius:16px; border:none;">
            <div class="col-12 contenedor" style="height: 450px; position: absolute; background: linear-gradient(rgba(0, 0, 255, 0.027),#3f7ad3); border-radius:16px; border:none;">
                <div class="contenido col-12 p-3 d-flex justify-content-center align-items-center flex-column" style=" display: none;">

                    <div class="p-2 mt-5" style="z-index: 4; border-radius: 100px; background: rgba(255, 255, 255, 0.438); max-width: 100px;">
                        <div class="p-2 d-flex justify-content-center align-items-center" style="border-radius: 100px; background: white; max-width: 100px;">
                            <img class="p-2" src="{{asset('img/photos/servicios/icono_01.png')}}" style="" alt="">
                        </div>
                    </div>

                    <div class="col-12" style="z-index: 4;">
                        <h1 class="col-12 text-center my-2" style=" color: white; font-weight: bold;">Nombre del servicio</h1>
                    </div>

                    <div class="col-12 mt-3 pt-2 px-1 text-center" style="z-index: 4; color: white; max-height: 136px; overflow-y: auto;">
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quod dolore voluptatum dolorem commodi corporis, cumque aliquam suscipit sint debitis nemo! Laudantium debitis eveniet fuga animi laborum ad dolorem earum </p>
                    </div>

                </div>
            </div>
            <div class="col-12" style="height: 450px; position: absolute; background: #3f7ad3; border-radius:16px; border:none; opacity: 0%;"></div>
        </div>
        @endfor

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
            arrows:false
            });
        </script>

    @endsection
{{-- JAVASCRIPT EXTRAS --}}
