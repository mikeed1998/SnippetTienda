@extends('layouts.front')

@section('title', 'Inicio')
{{-- CABECERAS DE ESTILOS --}}
    @section('cssExtras')
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script> --}}
    {{-- <script src="https://cdn.conekta.io/js/latest/conekta.js"></script> --}}
    <script type="text/javascript" src="https://pay.conekta.com/v1.0/js/conekta-checkout.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.23/dist/sweetalert2.min.css">
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

    <div class="col-12 text-center d-flex justify-content-center align-items-center flex-column">
        <p class="mt-5" style="font-size: 2.5rem; font-family: 'Courier New', Courier, monospace; color: #909986;">Proceso de pago</p>
    </div>

    @if($car == 1)
    <div class="col-12 pb-5 d-flex justify-content-center align-items-center " style="">
        <form id="payment-form" action="{{route('procesarPago')}}" method="POST" class="container d-flex flex-row">
                <div class="col-8 card py-2 px-2 mx-2" style="height: 550px; overflow: auto; border-radius: 26px; border:; background: ; ">
                    <div class="col-12 text-center mt-2 mb-0">
                        <h5 style="color: " class="py-0">Ingresa los datos de tu tarjeta</h5>
                    </div>
                    {{-- <div class="container px-5">
                        <h2>Formulario de Pago con Conekta</h2>

                        <div class="col-12 d-flex justify-content-center align-items-center">
                            <img src="https://dzh2zima160vx.cloudfront.net/logo/993417c2c470bd1a4c350b1c60e7a718_272_160?Expires=1861920000&Signature=eShM229lVjm0mx0txeRY54k5iER77YCslzdVIta8D1r5a5ZSgeRdKK5kY-w6sfNKMYs~gbrGbwIl1bHjHntTsDqkoENqcFe4FjE2GKrItpzOV~C4JuUEEarW0crYeEErUckoElFqvlsIs-hvBkPzhRCVvEHFiyJKoQwLJBxbuhGbYb-975MYBql6ELk8oyySdhsUnVJl29zgdIQFadYsyIsCa7dzwu5Ajmw1~-yIi6HOyHMeV7X-kqhb3bZttkWT-OL64lX1kVidkMTBbRPOV5hdskF3J4jjy69s2t1V1bgbz3ZFYJZ~tOaJyboVEoJFHbwsMDEjpoY-PIsntlV7mQ__&Key-Pair-Id=APKAII5OVX4LZ3WT422Q" style="" alt="">
                            <svg class="me-1" width="40" height="29" viewBox="0 0 40 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M24.9553 0H20.0155V8.09931H19.7922L15.0447 0C7.02347 0 0.5 6.50342 0.5 14.5C0.5 22.4966 7.02347 29 15.0447 29H19.9845V20.9041H20.2113L24.9553 29C32.9731 29 39.5 22.4966 39.5 14.5C39.5 6.50342 32.9765 0 24.9553 0ZM24.9553 20.5411H15.0447C11.7022 20.5411 8.98498 17.8322 8.98498 14.5C8.98498 11.1678 11.7022 8.4589 15.0447 8.4589H24.9553C28.2978 8.4589 31.015 11.1678 31.015 14.5C31.015 17.8322 28.2978 20.5411 24.9553 20.5411Z" fill="white"></path>
                            </svg>
                            <svg width="97" height="30" viewBox="0 0 97 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M22.168 4.88281C17.8832 4.88281 14.8335 8.09805 14.8335 12.3021C14.8335 16.5062 17.8594 19.697 22.168 19.697C26.4766 19.697 29.4747 16.4797 29.4747 12.3021C29.4747 8.12456 26.4726 4.88281 22.168 4.88281ZM22.718 15.9353C20.4902 16.2677 18.5266 14.2472 18.7092 11.9453C18.8601 10.0105 20.246 8.60776 22.168 8.60776C24.2012 8.60776 25.6109 10.1879 25.6109 12.3042C25.6109 14.2023 24.4513 15.6784 22.718 15.9374V15.9353Z" fill="white"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M10.5252 13.5112H10.5212V13.5152C10.1003 15.0688 8.87326 15.9781 7.25904 15.9781C5.19609 15.9781 3.86381 14.3675 3.86381 12.3042C3.86381 10.2409 5.17028 8.60776 7.25904 8.60776C8.87525 8.60776 10.1241 9.54155 10.5431 11.1461C10.5431 11.1482 10.547 11.1502 10.549 11.1502L14.0634 10.2409H14.0654V10.2348C13.1779 6.70145 10.4915 4.88281 7.15182 4.88281C2.82141 4.88281 0 8.17757 0 12.3021C0 16.4267 2.82141 19.697 7.15182 19.697C10.4915 19.697 13.2037 17.9028 14.0674 14.4001C14.0674 14.396 14.0674 14.394 14.0634 14.394L10.5252 13.5091V13.5112Z" fill="white"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M50.5769 4.88281C46.7409 4.88281 43.5562 7.88194 43.5562 12.3021C43.5562 16.7223 46.4788 19.697 50.6822 19.697C53.3408 19.697 56.0014 18.5206 56.9961 15.3645C56.9961 15.3624 56.9961 15.3583 56.9921 15.3583L53.6108 14.555C53.6108 14.555 53.6068 14.555 53.6048 14.5591C53.0807 15.7335 51.8834 16.2412 50.6305 16.2412C48.8337 16.2412 47.5034 15.1198 47.4756 13.2747C47.4756 13.2726 47.4775 13.2685 47.4815 13.2685H57.4428V12.2777C57.4428 8.09805 54.8081 4.88281 50.5789 4.88281H50.5769ZM53.5989 10.669H47.5053C47.5053 10.669 47.4994 10.6649 47.4994 10.6629C47.686 9.40699 48.8059 8.12456 50.5769 8.12456C52.1912 8.12456 53.4202 9.24592 53.6048 10.6629C53.6048 10.667 53.6048 10.669 53.5989 10.669V10.669Z" fill="white"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M79.3531 5.22961H75.7058L75.7018 1.37214H72.1557L72.1497 5.22961H66.626L63.6517 9.9699H62.5021V0H58.6919V19.3485H62.5021V13.5644H63.7291L66.8087 19.3485H71.3456V19.3424L66.9417 11.8232V11.5276L68.8339 8.68951H71.8956V8.69359L71.9015 15.2607C71.9909 18.1415 73.5197 19.3526 76.2041 19.3526H79.2022V15.8438H79.1983L76.4305 15.8377C75.95 15.8356 75.6938 15.5033 75.7058 14.9589V8.69155H79.3551L79.3591 8.68747L79.3551 5.23369L79.3531 5.22961Z" fill="white"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M94.8045 15.8347C94.5066 15.8021 94.1969 15.6003 94.1969 15.1477V5.24912H90.3867V6.87407H90.0968C90.0968 6.87407 89.4396 4.89844 86.2866 4.89844C82.7643 4.89844 79.9727 8.03213 79.9727 12.2933C79.9727 16.5545 82.7901 19.7146 86.3144 19.7146C88.2979 19.7146 89.5448 18.8706 90.0948 17.6085H90.3847V17.7716C90.3907 18.2039 90.5435 18.6279 90.8433 18.9297C91.0776 19.1642 91.4231 19.3619 91.9235 19.366H96.6073V15.8409L94.8045 15.8347ZM87.1503 15.9632C85.3236 15.9632 83.8365 14.5442 83.8365 12.3198C83.8365 10.0954 85.2958 8.6764 87.1245 8.6764C88.9531 8.6764 90.4363 9.98941 90.4363 12.3198C90.4363 14.3036 89.1318 15.9632 87.1503 15.9632V15.9632Z" fill="white"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M37.9529 4.88281C36.3645 4.88281 35.1235 5.69631 34.6152 6.8564H34.3531V5.23145H30.5449V19.3483H34.3512V11.138L34.3591 10.9524C34.4365 9.84941 35.199 8.8667 36.2711 8.69543C37.8258 8.44466 38.9714 9.55582 38.9714 11.1257V19.3483H42.7797V9.86776L42.7757 9.62514C42.6665 6.9767 40.7663 4.88281 37.9509 4.88281H37.9529Z" fill="white"></path>
                            </svg>
                        </div>
                        <div class="form-group mb-3">
                            <label for="nombre-titular" style="color: white;">Titular de la tarjeta:</label>
                            <input type="text" name="card_name" class="form-control" id="card-name" placeholder="">
                        </div>
                            <div class="form-group mb-3">
                                <label for="card-number" style="color: white;">Número de Tarjeta:</label>
                                <input type="text" name="card_number" class="form-control" id="card-number" placeholder="1234 5678 9012 3456">
                            </div>
                            <div class="form-group d-flex align-items-center">
                                <div class="col-4 me-1">
                                    <label for="card-expiry" style="color: white;">Fecha de Expiración (MM/YY):</label>
                                    <div class="d-flex flex-row">
                                        <div class="col-4 me-3"><input type="text" name="card_expiry_year" class="form-control col-4" id="card-expiry-year" placeholder="MM"></div>
                                    
                                        <div class="col-4"><input type="text" name="card_expiry_mont" class="form-control col-4" id="card-expiry-mont" placeholder="YY"></div>
                                    </div>

                                </div>
                                <div class="col-2">
                                    <label for="card-cvc" style="color: white;">CVC:</label>
                                    <input type="text" name="card_cvc" class="form-control" id="card-cvc" placeholder="123">
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Realizar Pago</button>

                            <div class="col-12 d-flex justify-content-center align-items-center mt-4" style="font-size: 5.5rem; color: white;">
                                <i class="fa-brands fa-cc-visa mx-2"></i> <i class="fa-brands fa-cc-mastercard mx-2"></i>
                            </div>

                    </div> --}}
                    <div id="conektaIframeContainer" class="col-12" style="height: 524px;"></div>
                </div>
                <div class="col-4 card p-3 d-flex justify-content-between" style=" height: 350px; border-radius: 26px; border:none; box-shadow: 1px 1px 10px rgba(0, 0, 0, 0.11);">
                    <div class="col-12 " style="height: 50px;">
                        <h5>Resumen de compra</h5>
                    </div>
                    <div class="col-12 table p-3" style="height: 200px; background: rgb(233, 233, 233); overflow: auto; border-radius: 16px;">
                        @php
                            $total_prod = 0;
                            $cantidad_prods = 0;
                        @endphp
                        @foreach($productos as $p)
                        <div id="list_prod_{{$p->id}}"  class="col-12 my-0 d-flex align-items-center justify-content-between">
                            <div class="col-5 my-0"><h6 class="my-0">{{$p->nombre}} </h6></div>
                            <div class="col-2 my-0 text-end"><h6 id="txt_cant_{{$p->id}}" class="my-0">x {{$p->catidad_total}}: </h6></div>
                            @php
                                $precio_cant = $p->precio * $p->catidad_total;
                                $total_prod += $precio_cant;
                                $cantidad_prods += $p->catidad_total;
                            @endphp
                            <div class="col-5 my-0 text-end" style="" class="text-end"><h6 id="cat_total_{{$p->id}}" class="my-0" data-precio-u="{{$p->precio}}" data-precio-cant="{{$precio_cant}}" data-cant_prds_u="{{$cantidad_prods}}" >${{$precio_cant}}</h6></div>
                        </div>
                        @endforeach

                    </div>
                    {{-- <div class="col-12 mb-3 d-flex justify-content-center align-items-center" >
                        <select id="select-envio" class="form-select" aria-label="Default select example">
                            <option selected>Selecciona tu envio</option>
                            <option value="100">Nacional</option>
                            <option value="200">Global</option>
                          </select>
                    </div> --}}
                    <div class="col-12 d-flex justify-content-between">
                        <h6 style="font-weight: ;">Envio</h6>
                        <h6 id="cost-env" style="font-weight: ;">{{$envio}}</h6>
                    </div>
                    @php
                        $precio_final_p = $total_prod + $envio;
                    @endphp
                    <div class="col-12 d-flex justify-content-between">
                        <h5 style="font-weight: bold;">Total</h5>
                        <h5 id="total_compra" data-total-c="{{$total_prod}}" style="font-weight: bold;">${{$precio_final_p}}</h5>
                    </div>
                    <div class="col-12" style="height: 50px;">
                        @csrf
                        <input id="token_card" type="text" name="token_card" value="" hidden>
                        <input id="cant_prods_t" type="text" name="cant_prods" value="{{$cantidad_prods}}" hidden>
                        <input id="total_price" type="text" name="total_price"  value="{{$precio_final_p}}" >
                        {{-- <button type="submit" id="btn-comprar" class="col-12 btn btn-primary d-flex flex-row justify-content-center align-items-center" style="border-radius: 26px;" ><p class="fa-bounce py-0 my-auto">Comprar</p> <i class="fa-solid fa-credit-card fa-bounce ms-3"></i></button> --}}
                    </div>
                </div>
            </form>

    </div>

    @else

    <div class="container py-3 my-5" style="background: rgb(237, 237, 237); border-radius: 16px;">
        <div class="col-12 text-center d-flex justify-content-center align-items-center flex-column">
            
            <p class="mt-5" style="font-size: 4.5rem; font-family: 'Courier New', Courier, monospace; color: black;"><i class="fa-solid fa-cart-shopping fa-bounce"></i></p>
            <p class="mb-5" style="font-size: 4.5rem; font-family: 'Courier New', Courier, monospace; color: black;">Carrito vacio</p>
        </div>
    </div>

@endif

    @endsection
{{-- CONTENIDO DE LA PAGINA --}}

{{-- JAVASCRIPT EXTRAS --}}
    @section('jqueryExtra')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.23/dist/sweetalert2.all.min.js"></script>
    <script type="text/javascript">

        const config = {
          targetIFrame: "#conektaIframeContainer",
          publicKey: "key_DBhh1a7u2Fn5GVBD04mMN3T", // Llaves: https://developers.conekta.com/docs/como-obtener-tus-api-keys
          locale: 'es', // 'es' Español | 'en' Ingles
        };
        
        const callbacks = {
        // Evento que permitirá saber que el token se creado de forma satisfactoria, es importante que se consuman los datos que de él derivan.

          onCreateTokenSucceeded: function(token) {
            console.log(token)
            $('#token_card').val(token.id);
            // $('#payment-form').submit();
            var cant_prod = $('#cant_prods_t').val();
            var total_price = $('#total_price').val();

            Swal.fire({
				title: 'Procesando pago',
				html: 'Espere por favor...',
				timer: 30000,
				timerProgressBar: true,
				didOpen: () => {
					Swal.showLoading()
				}
				})

                var csrf = $('meta[name="csrf-token"]').attr('content');
                var URL = "{{route('procesarPago')}}";
                $.ajax({
                    method: "POST",
                    url: URL,
                    data: {
                        "_method": 'post',
                        "_token": csrf,
                        cant_prods: cant_prod,
                        total_price: total_price,
                        token_card:token.id
                    }
                })
                .done(function(msg) {
                    console.log(msg);
                    if (msg.success) {
                        Swal.fire({
						icon: 'success',
						title: 'Pago exitoso',
						html: 'Espere un momento será redirigido a otra ventana',
						timer: 4000,
						timerProgressBar: true,
						didOpen: () => {
							Swal.showLoading()
						}
						})

                        setTimeout(function(){
							window.location.href ="{{route('pedidos')}}";
						}, 3000);
                    }else{
                        Swal.fire({
						icon: 'error',
						title: 'Oups error en el pago',
						text: 'Revise los datos de la tarjeta y vuelva a intentarlo',
						showConfirmButton: false,
						})
                    }
                }).fail(function(jqXHR, textStatus, errorThrown) {
                    // Código para manejar la falla de la solicitud AJAX
                    console.log('Error en la solicitud AJAX:', textStatus, errorThrown);
                    Swal.fire({
                        icon: 'error',
                        title: 'Error en la solicitud',
                        text: 'Hubo un problema al procesar la solicitud. Intente nuevamente más tarde.',
                        showConfirmButton: false,
                    });
                    // Recargar la página después de 4 segundos (4000 milisegundos)
                    setTimeout(function() {
                        location.reload(); // Recargar la página
                    },  1000);
                });

    
          },
            // Evento que permitirá saber que el token se creado de manera incorrecta, es importante que se consuman los datos que de él derivan y se hagan las correciones pertinentes.
          onCreateTokenError: function(error) {
            console.log(error)
            Swal.fire({
			icon: 'error',
            title: 'Oups error en el pago',
            text: 'Revise los datos de la tarjeta y vuelva a intentarlo',
            showConfirmButton: false,
			})

            // Recargar la página después de 4 segundos (4000 milisegundos)
            setTimeout(function() {
                location.reload(); // Recargar la página
            }, 1000);
            }
        };
        window.ConektaCheckoutComponents.Card({
          config,
                callbacks,
          //Este componente "allowTokenization" permite personalizar el tokenizador, por lo que su valor siempre será TRUE
          allowTokenization: true, 
        })
      </script>
    <script>

    </script>
        <script type="text/javascript">

        </script>

    @endsection
{{-- JAVASCRIPT EXTRAS --}}
