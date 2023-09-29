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
        .cont_map iframe{
            width: 100% !important;
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

    <div class="col-12 my-5 d-flex justify-content-center align-items-center flex-column" style="">
        <div class="col-12 my-5 text-center d-flex justify-content-center align-items-center flex-column">
            <p class="mt-5" style="font-size: 4.5rem; font-family: 'Courier New', Courier, monospace; color: #909986;">CONTACTO</p>
            <p class="col-12 col-md-10 col-lg-6">{{$elements[0]->texto}}</p>
        </div>
        <form action="" method="POST" class="col-12 d-flex flex-column align-items-center">
            @csrf
            <div class="col-12 d-flex mb-3 justify-content-center flex-wrap">

                <div class="col-10 col-md-5 col-lg-4 pe-0 pe-md2 pe-lg-2 mb-3 mb-md-0 mb-lg-0">
                    <div class="input-group">
                        <input type="text" class="form-control" name="nombre" placeholder="Nombre" aria-label="" aria-describedby="" style="height: 80px;">
                      </div>
                </div>
                <div class="col-10 col-md-5 col-lg-4 ps-0    ps-md-2 ps-lg-2">
                    <div class="input-group">
                        <input type="text" class="form-control" name="empresa" placeholder="Empresa" aria-label="" aria-describedby="" style="height: 80px;">
                      </div>
                </div>

            </div>

            <div class="col-12 d-flex justify-content-center flex-wrap">

                <div class="col-10 col-md-5 col-lg-4 pe-0 pe-md2 pe-lg-2 mb-3 mb-md-0 mb-lg-0">
                    <div class="input-group">
                        <input type="text" class="form-control" name="telefono" placeholder="Telefono" aria-label="" aria-describedby="" style="height: 80px;">
                      </div>
                </div>
                <div class="col-10 col-md-5 col-lg-4 ps-0    ps-md-2 ps-lg-2">
                    <div class="input-group">
                        <input type="email" class="form-control" placeholder="Email" aria-label="" aria-describedby="" style="height: 80px;">
                      </div>
                </div>

            </div>

            
            <div class="col-10 col-md-10 col-lg-8 my-3">
                <div class="input-group" style="position: relative;">
                    <textarea class="form-control" placeholder="Mensaje" name="" id="" cols="30" rows="6"></textarea>
                  </div>
            </div>

            <div class="col-12">
                <div class="col-12 p-2 d-flex justify-content-center align-items-center" style="">
                    <button class="btn btn-primary px-5 py-3" style="background: #909986; border:none; height: 100%; width: 250px;">ENVIAR</button>
                </div>
            </div>
        </form>

    </div>


    <div class="col-12 cont_map">
        {!!$elements[1]->texto!!}
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
