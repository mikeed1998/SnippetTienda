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
        .h1Ini{
            font-size: 1.5rem !important;
        }
        .txt-1-ini{
            font-size: 12px !important;
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
            .text-ini-port{
                top: 100px !important;
            }

        }
    </style>


    @endsection
{{-- ESTILOS CSS PERSONALIZADOS --}}

{{-- CONTENIDO DE LA PAGINA --}}
    @section('content')

{{-- index slider principal --}}

    <div class="col-12" style="position: relative; max-height: 1001px;">
        <div class="col-12" style="width: 100%; height: 100%;">
            <img src="{{asset('img/design/'.$elements[0]->imagen)}}" style="width: 100%; height: 100%;" alt="">
        </div>
        <div class="col-12 p-5 " style="position: absolute; top: 0px; bottom: 0px; background: ;">
            <div class="col-12 col-md-8 col-lg-6" style="position: relative; height: 100%;">
                <div class="col-12">
                    <h1 class="h1Ini" style="font-size: 4rem; font-family: 'Courier New', Courier, monospace;">
                        El Mejor Lugar para Decorar tu Hogar
                    </h1>
                </div>

                <div class="col-12 d-flex flex-column text-ini-port" style="position: absolute; bottom: 0px;">
                    <div class="col-12 col-md-10 col-lg-6" style="text-align: justify;">
                        <p class="txt-1-ini">{{$elements[1]->texto}}</p>
                    </div>
                    <div class="col-5">
                        <a href="{{url('products')}}" class="col-12 btn btn-primary px-5 py-3" style="background: #909986; border:none;">STORE</a>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
{{-- index slider principal --}}

{{-- index categorias --}}
    <div class="col-12 my-5 py-5">
        <div class="col-12 mt-5 mx-5 text-start">
            <p class="mt-5" style="font-size: 4.5rem; font-family: 'Courier New', Courier, monospace; color: #909986;">Categorias</p>
        </div>
        <div class="col-12 px-5 mb-5 responsive">
            @foreach($categoria as $c)
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
{{-- index categorias --}}

<hr>

{{-- index destacados --}}
<style>

    .responsive_cards{
        display: none !important;
    }

    @media only screen and (max-width: 768px){ 
        .cont_prods_dest_sec1{
            display: none !important;
        }
        .cont_prods_dest_sec2{
            display: none !important;
        }
        .responsive_cards{
        display: block !important;
    }
    .card_prod_dest{
        width: 100% !important;
    }
    }

    @media only screen and (max-width: 590px){  
        .card_prod_dest{
        height: 100% !important;
    }

    .prod_dest_1{
        height: 350px !important;
    }

    .prod_dest_image_1{
        max-width: 181px !important;
    }

    .prod_dest_2{
        height: 350px !important;
    }

    .prod_dest_image_2{
        max-width: 181px !important;
    }

    }
</style>
    <div class="col-12 mt-5 pt-5">
        <div class="col-12 mb-5 d-flex justify-content-center align-items-center text-center flex-column">
            <p class="mt-5" style="font-size: 4.5rem; font-family: 'Courier New', Courier, monospace; color: #909986;">DESTACADOS</p>
            <div class="col-12 col-md-8 col-lg-6"><p>{{$elements[2]->texto}}</p></div>
        </div>
        <div class="container d-flex flex-column mb-5 p-0" style="background: ;">
            <div class="col-12 d-flex ">
                @if(isset($productos[0]->nombre))
                <a  class="col-12 col-md-12 col-lg-6 p-4" href="{{url('detprod/'.$productos[0]->id)}}" style="text-decoration: none; color: black;">
                    <div class="card pt-4 d-flex align-items-center card_prod_dest prod_dest_1" style="position: relative; width: 612px; height: 700px;">
                        <img class="prod_dest_image_1" src="{{asset('img/photos/productos/'.$productos[0]->portada)}}" style="max-width: 487px;" alt="">
                        <div class="col-12 p-3" style="height: 100px; background: ;">
                            <div class="col-12" style="text-align: justify;">
                                <p>{{$productos[0]->nombre}}</p>
                                <P>${{ number_format($productos[0]->precio, 2, '.', ',') }}</P>
                            </div>
                        </div>
                    </div>
                </a>
                @endif
                <div class="col-6 py-4 pe-4 d-flex cont_prods_dest_sec1">
                    @if(isset($productos[1]->nombre))
                    <a class="col-6"  href="{{url('detprod/'.$productos[1]->id)}}" style="text-decoration: none; color: black;">
                        <div class="card d-flex justify-content-center align-items-center" style="height: 350px;">
                            <img src="{{asset('img/photos/productos/'.$productos[1]->portada)}}" style="max-width: 281px;" alt="">
                        </div>
                        <div class="col-12 p-2" style="text-align: justify;">
                            <p>{{$productos[1]->nombre}}</p>
                            <P>${{ number_format($productos[1]->precio, 2, '.', ',') }}</P>
                        </div>
                    </a>
                    @endif
                    @if(isset($productos[2]->nombre))
                    <a class="col-6 ps-3"  href="{{url('detprod/'.$productos[2]->id)}}" style="text-decoration: none; color: black;">
                        <div class="card d-flex justify-content-center align-items-center" style="height: 350px;">
                            <img src="{{asset('img/photos/productos/'.$productos[2]->portada)}}" style="max-width: 281px;" alt="">
                        </div>
                        <div class="col-12 p-2" style="text-align: justify;">
                            <p>{{$productos[2]->nombre}}</p>
                            <P>${{ number_format($productos[2]->precio, 2, '.', ',') }}</P>
                        </div>
                    </a>
                    @endif
                </div>
            </div>
            <div class="col-12 d-flex" style="position: relative;">
                <div class="col-12 col-md-12 col-lg-6 pb-4 pe-4 d-flex flex-wrap">
                    @if(isset($productos[3]->nombre))
                    <a class="col-12 col-md-6 col-lg-6 ps-3 "  href="{{url('detprod/'.$productos[3]->id)}}" style="text-decoration: none; color: black;">
                        <div class="card d-flex justify-content-center align-items-center" style="height: 350px;">
                            <img src="{{asset('img/photos/productos/'.$productos[3]->portada)}}" style="max-width: 281px;" alt="">
                        </div>
                        <div class="col-12 p-2" style="text-align: justify;">
                            <p>{{$productos[3]->nombre}}</p>
                            <P>${{ number_format($productos[3]->precio, 2, '.', ',') }}</P>
                        </div>
                    </a>
                    @endif
                    @if(isset($productos[4]->nombre))
                    <a class="col-12 col-md-6 col-lg-6 ps-3"  href="{{url('detprod/'.$productos[4]->id)}}" style="text-decoration: none; color: black;">
                        <div class="card d-flex justify-content-center align-items-center" style="height: 350px;">
                            <img src="{{asset('img/photos/productos/'.$productos[4]->portada)}}" style="max-width: 281px;" alt="">
                        </div>
                        <div class="col-12 p-2" style="text-align: justify;">
                            <p>{{$productos[4]->nombre}}</p>
                            <P>${{ number_format($productos[4]->precio, 2, '.', ',') }}</P>
                        </div>
                    </a>
                    @endif
                </div>
                @if(isset($productos[5]->nombre))
                <a class="col-6 py-4 pe-4 cont_prods_dest_sec2"  href="{{url('detprod/'.$productos[5]->id)}}" style="text-decoration: none; color: black;">
                    <div class="card pt-4 d-flex align-items-center" style="width: 640px; height: 700px; position: absolute; top:-260px;">
                        <img src="{{asset('img/photos/productos/'.$productos[5]->portada)}}"style="max-width: 487px;" alt="">
                        <div class="col-12 p-3" style="height: 100px; background: ;">
                            <div class="col-12" style="text-align: justify;">
                                <p>{{$productos[5]->nombre}}</p>
                                <P>${{ number_format($productos[5]->precio, 2, '.', ',') }}</P>
                            </div>
                        </div>
                    </div>
                </a>
                @endif
            </div>


            {{-- responsive --}}

            <div class="col-12 d-flex responsive_cards">
                @if(isset($productos[5]->nombre))
                <a  class="col-12 col-md-12 col-lg-6 p-4" href="{{url('detprod/'.$productos[5]->id)}}" style="text-decoration: none; color: black;">
                    <div class="card pt-4 d-flex align-items-center card_prod_dest prod_dest_2" style="position: relative; width: 612px; height: 700px;">
                        <img class="prod_dest_image_2" src="{{asset('img/photos/productos/'.$productos[5]->portada)}}" style="max-width: 487px;" alt="">
                        <div class="col-12 p-3" style="height: 100px; background: ;">
                            <div class="col-12" style="text-align: justify;">
                                <p>{{$productos[5]->nombre}}</p>
                                <P>${{ number_format($productos[5]->precio, 2, '.', ',') }}</P>
                            </div>
                        </div>
                    </div>
                </a>
                @endif
            </div>
            <div class="col-12 d-flex responsive_cards" style="position: relative;">
                <div class="col-12 col-md-12 col-lg-6 pb-4 pe-4 d-flex flex-wrap">
                    @if(isset($productos[1]->nombre))
                    <a class="col-12 col-md-6 col-lg-6 ps-3 "  href="{{url('detprod/'.$productos[1]->id)}}" style="text-decoration: none; color: black;">
                        <div class="card d-flex justify-content-center align-items-center" style="height: 350px;">
                            <img src="{{asset('img/photos/productos/'.$productos[1]->portada)}}" style="max-width: 281px;" alt="">
                        </div>
                        <div class="col-12 p-2" style="text-align: justify;">
                            <p>{{$productos[1]->nombre}}</p>
                            <P>${{ number_format($productos[1]->precio, 2, '.', ',') }}</P>
                        </div>
                    </a>
                    @endif
                    @if(isset($productos[2]->nombre))
                    <a class="col-12 col-md-6 col-lg-6 ps-3"  href="{{url('detprod/'.$productos[2]->id)}}" style="text-decoration: none; color: black;">
                        <div class="card d-flex justify-content-center align-items-center" style="height: 350px;">
                            <img src="{{asset('img/photos/productos/'.$productos[2]->portada)}}" style="max-width: 281px;" alt="">
                        </div>
                        <div class="col-12 p-2" style="text-align: justify;">
                            <p>{{$productos[2]->nombre}}</p>
                            <P>${{ number_format($productos[2]->precio, 2, '.', ',') }}</P>
                        </div>
                    </a>
                    @endif
                </div>

            </div>

            {{-- responsive --}}
            
        </div>
    </div>

{{-- index destacados --}}


{{-- index proceso de compra --}}

    <div class="col-12">
        <div class="container my-5 py-5" style="background: #F8F8F8;">
            <div class="col-12 mb-5 text-center">
                <h4 style="font-weight: bold;">PROCESO DE COMPRA</h4>
            </div>
            <div class="col-12 d-flex justify-content-center align-items-center flex-column flex-md-column flex-lg-row">
                <div class="col-12 col-md-8 col-lg-3 my-3 my-md-3 my-lg-0  text-center d-flex flex-column"><i class="mb-3 fas fa-shopping-cart" style="font-size: 3rem;"></i>
                <p>{{$elements[3]->texto}}</p>
                </div>
                <div class="col-12 col-md-8 col-lg-3 my-3 my-md-3 my-lg-0  text-center d-flex flex-column"><i class="mb-3 fas fa-user" style="font-size: 3rem;"></i>
                <p>{{$elements[4]->texto}}</p>
                </div>
                <div class="col-12 col-md-8 col-lg-3 my-3 my-md-3 my-lg-0  text-center d-flex flex-column"><i class="mb-3 fas fa-wallet" style="font-size: 3rem;"></i>
                <p>{{$elements[5]->texto}}</p>
                </div>
                <div class="col-12 col-md-8 col-lg-3 my-3 my-md-3 my-lg-0  text-center d-flex flex-column"><i class="mb-3 fas fa-truck" style="font-size: 3rem;"></i>
                <p>{{$elements[6]->texto}}</p>
                </div>
            </div>
        </div>
    </div>

{{-- index proceso de compra --}}

{{-- index contacto --}}

    <div class="col-12 my-5 py-5">
        <div class="col-12 text-center">
            <p class="mt-5" style="font-size: 4.5rem; font-family: 'Courier New', Courier, monospace; color: #909986;">CONTACTO</p>
        </div>
        <form action="{{route('formularioContac')}}" method="POST" class="container d-flex justify-content-center flex-wrap">
            @csrf
            <div class="col-12 d-flex mb-3 justify-content-center flex-wrap">

                <div class="col-10 col-md-5 col-lg-4 pe-0 pe-md2 pe-lg-2 mb-3 mb-md-0 mb-lg-0">
                    <div class="input-group">
                        <input type="text" class="form-control" name="nombre" placeholder="Nombre" aria-label="" aria-describedby="" style="height: 80px;">
                    </div>
                </div>
                <div class="col-10 col-md-5 col-lg-4 ps-0    ps-md-2 ps-lg-2">
                    <div class="input-group">
                        <input type="email" class="form-control" name="correo" placeholder="Correo" aria-label="" aria-describedby="" style="height: 80px;">
                    </div>
                </div>

            </div>
            <div class="col-10 col-md-10 col-lg-8 my-4">
                <div class="input-group" style="position: relative;">
                    <input type="text" class="form-control" placeholder="Mensaje" name="mensaje" aria-label="" aria-describedby="" style="height: 80px;">
                    <div class="col-1 p-2 d-flex justify-content-end align-items-center" style="z-index: 1000;  position: absolute; top: 0px; bottom: 0px; right: 0;">
                        <button class="btn btn-primary px-5 py-3" style="background: #909986; border:none; height: 100%; width: 250px;">ENVIAR</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

{{-- index contacto --}}

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
