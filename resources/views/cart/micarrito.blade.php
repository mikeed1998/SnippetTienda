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

    <div class="col-12 text-center d-flex justify-content-center align-items-center flex-column">
        <p class="mt-5" style="font-size: 4.5rem; font-family: 'Courier New', Courier, monospace; color: #909986;">MI CARRITO</p>
    </div>

    @if($car == 1)
    <div class="col-12 pb-5 d-flex justify-content-center align-items-center " style="">
        <div class="container d-flex flex-row">
                <div class="col-8 card py-2 px-2 mx-2" style="main-height: 400px; max-height: 500px; overflow: auto; border-radius: 26px;">
                    @foreach($productos as $p)
                    <div id="card_{{$p->id}}" class="col-12 py-2 px-2 mb-2 card d-flex flex-row" style="height: 50px; border-radius: 26px;">
                        <div class="card d-flex justify-content-center align-items-center" style="width: 50px; height: 100%; border-radius: 16px;">
                            <img src="{{asset('img/photos/productos/'.$p->portada)}}" style="width: 10px;" alt="">
                        </div>
                        <div class="col-9 px-3 py-2 d-flex justify-content-between align-items-center">
                            <li class="" style="list-style: none;"><h6 class="my-auto">{{$p->nombre}}</h6></li>
                            <li class="d-flex flex-row" style="list-style: none;"><h6 class="my-auto">Cantidad : </h6><input id="input_cat_prod" data-id-prod="{{$p->id}}"  type="number" min="1" max="{{$p->cantidad}}" class="form-control input_cat_prod" style="width: 60px; height: 30px;;" value="{{$p->catidad_total}}"></li>
                            <li class="" style="list-style: none;"><h6 class="my-auto">Precio Unidad: {{$p->precio}}</h6></li>
                        </div>
                        <div class="col-2 d-flex justify-content-end align-items-center flex-row" style="background: ;">
                            {{-- <li class="mx-1" style="list-style: none;"><h6 class="my-auto"></h6><i class="fa-solid fa-eye"></i></li> --}}
                            <li class="mx-1" style="list-style: none;"><h6 class="my-auto"></h6><i class="fa-solid fa-trash" onclick="elimin_prod('{{$p->id}}')"></i></li>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="col-4 card p-3 d-flex justify-content-between" style=" height: 450px; border-radius: 26px;">
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
                    <div class="col-12 mb-3 d-flex justify-content-center align-items-center" >
                        <select id="select-envio" class="form-select" aria-label="Default select example">
                            <option selected>Selecciona tu envio</option>
                            <option value="100">Nacional</option>
                            <option value="200">Global</option>
                          </select>
                    </div>
                    <div class="col-12 d-flex justify-content-between">
                        <h6 style="font-weight: ;">Envio</h6>
                        <h6 id="cost-env" style="font-weight: ;">...</h6>
                    </div>
                    <div class="col-12 d-flex justify-content-between">
                        <h5 style="font-weight: bold;">Total</h5>
                        <h5 id="total_compra" data-total-c="{{$total_prod}}" style="font-weight: bold;">${{$total_prod}}</h5>
                    </div>
                    <form action="{{route('proceso_datos')}}" method="POST" class="col-12" style="height: 50px;">
                        @csrf
                        <input id="costo_envio" type="text" name="envio" value="0" hidden>
                        <input id="cant_prods_t" type="text" name="cant_prods" value="{{$cantidad_prods}}" hidden>
                        <button type="submit" id="btn-comprar" class="col-12 btn btn-primary" style="border-radius: 26px;" disabled>Proceder a pagar</button>
                    </form>
                </div>
        </div>

    </div>

    @else

    <div class="container py-3 my-5" style="background: rgb(237, 237, 237); border-radius: 16px;">
        <div class="col-12 text-center d-flex justify-content-center align-items-center flex-column">
            
            <p class="mt-5" style="font-size: 4.5rem; font-family: 'Courier New', Courier, monospace; color: black;"><i class="fa-solid fa-cart-shopping fa-bounce"></i></p>
            <p class="mb-5" style="font-size: 4.5rem; font-family: 'Courier New', Courier, monospace; color: black;">Carrito vacio</p>
        </div>
    </div>

    @php
        if(session('envio')){
            session()->forget('envio');
        }
    @endphp

@endif

    @endsection
{{-- CONTENIDO DE LA PAGINA --}}

{{-- JAVASCRIPT EXTRAS --}}
    @section('jqueryExtra')

    <script>

    </script>
        <script type="text/javascript">

            $('#select-envio').change(function (e){
                var valor = parseFloat($(this).val()); // Convierte a número de punto flotante
                $('#cost-env').text('$' + valor.toFixed(2)); // Mostrar con dos decimales
                var envio = parseFloat($('#costo_envio').val());

                var total = parseFloat($('#total_compra').data('total-c'));
                total = total - envio;
                console.log(total);
                
                var total_final = valor + total; // Suma los valores numéricos
                $('#total_compra').data('total-c', total_final);
                $('#total_compra').text('$' + total_final.toFixed(2)); // Mostrar con dos decimales

                $('#costo_envio').val(valor);

                $('#btn-comprar').prop('disabled', false);

            });

            function elimin_prod(id){

                var cant_prod = parseFloat($('#cat_total_' + id).data('precio-cant'));
                var cant_prod_u = ($('#cat_total_' + id).data('cant_prds_u'));
                var total = parseFloat($('#total_compra').data('total-c'));
                var cant_prods_t = $('#cant_prods_t').val() - cant_prod_u;
                var total_final = total - cant_prod; // Suma los valores numéricos
                $('#card_' + id).fadeOut(500, function() {
                    $(this).remove();
                });
                $('#list_prod_' + id).fadeOut(500, function() {
                    $(this).remove();
                });


                var csrf = $('meta[name="csrf-token"]').attr('content');
                var URL = "{{route('elim_prod_car')}}";
                $.ajax({
                    method: "POST",
                    url: URL,
                    data: {
                        "_method": 'post',
                        "_token": csrf,
                        id: id
                    }
                })
                .done(function(msg) {
                    if (msg.success) {
                        toastr["success"](msg.mensaje);
                    }
                });
               
                $('#cant_prods_t').val(cant_prods_t);
                $('#total_compra').data('total-c', total_final);
                $('#total_compra').text('$' + total_final.toFixed(2)); // Mostrar con dos decimales

                if(cant_prods_t < 1){
                    location.reload();
                }
                
            }

            $('.input_cat_prod').change(function (e){
                var value = $(this).val();
                var id_prod = $(this).data('id-prod');

                var csrf = $('meta[name="csrf-token"]').attr('content');
                var URL = "{{route('cant_change')}}";
                $.ajax({
                    method: "POST",
                    url: URL,
                    data: {
                        "_method": 'post',
                        "_token": csrf,
                        value: value,
                        id: id_prod
                    }
                })
                .done(function(msg) {
                    if (msg.success) {
                        toastr["success"](msg.mensaje);
                        location.reload();
                        // $('#txt_cant_'+id_prod).text('x '+value+':'); // se agrega el texto de x 123...
                        // var cant_prod = parseFloat($('#cat_total_' + id_prod).data('precio-u')); // cantidad de costo por unidad
                        // var prec_total = cant_prod * value; // operacion precio por unidad * cantidad puesta
                        // $('#cat_total_' + id_prod).attr('data-precio-cant', prec_total); // agregamos el precio total que quedaria con el cambio

                        // var cant_prod_u = $('#cat_total_' + id_prod).data('cant_prds_u'); // optenemos las unidades que teniamos antes del cambio

                        // $('#cat_total_' + id_prod).data('cant_prds_u',value);// agregamos la nueva cantidad de unidades que pusimos
                        // $('#cat_total_' + id_prod).text('$'+prec_total);// agregamos en el texto el precio total con las unidades cambiadas

                        // var cat_anterior = cant_prod * cant_prod_u; // hacemos una operacion para saber el precio que valia antes del cambio
                        // var total = parseFloat($('#total_compra').data('total-c'));// optenemos el total actual
                        // console.log(total);

                        // var total_final1 = total - cat_anterior; // operacion para restar lo el precio anterior al precio final
                        // var total_final = total_final1 + prec_total; // operacion para sumar el total restante y sumamos el nuevo precio
                        // $('#total_compra').data('total-c', total_final);
                        // $('#total_compra').text('$' + total_final.toFixed(2));
                        
                        
                    }else{
                        toastr["error"](msg.mensaje);
                        location.reload();
                    }
                });
            });


        </script>

    @endsection
{{-- JAVASCRIPT EXTRAS --}}
