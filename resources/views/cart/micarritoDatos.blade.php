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
        <p class="mt-5" style="font-size: 2.5rem; font-family: 'Courier New', Courier, monospace; color: #909986;">Datos para tu envio</p>
    </div>

    @if($car == 1)
    <div class="col-12 pb-5 d-flex justify-content-center align-items-center " style="">
        <form action="{{route('pasarelaPago')}}" method="POST" class="container d-flex flex-row">
                <div class="col-8 card py-2 px-2 mx-2" style="main-height: 400px; overflow: auto; border-radius: 26px; border:; ">
                    <div class="col-12 text-center mb-3">
                        <h5>Verifica que tus datos sean correctos</h5>
                    </div>
                    <div class="col-12 ">
                        <div class="col-12 my-3 mt-2 d-flex px-4">
                            <div class="col-6 px-5">
                                <label for="" class="form-label">Nombre de quien recibe</label>
                                <input type="text" class="form-control domicilio_txt_change" data-id-cliente="{{$user->id}}" data-campo="alias" aria-describedby="" value="{{$domicilio->alias}}" required>
                            </div>
                            <div class="col-6 px-5">
                                <label for="" class="form-label">Telefono</label>
                                <input type="text" class="form-control usuario_txt_change" data-id-cliente="{{$user->id}}" data-campo="telefono" aria-describedby="" value="{{$user->telefono}}" required>
                            </div>
                        </div>
                        <div class="col-12 my-3 mt-2 d-flex px-4">
                            <div class="col-6 px-5">
                                <label for="" class="form-label">Calle</label>
                                <input type="text" class="form-control domicilio_txt_change" data-id-cliente="{{$user->id}}" data-campo="calle" aria-describedby="" value="{{$domicilio->calle}}" required>
                              </div>
                        </div>
                        <div class="col-12 mb-3 d-flex px-4">
                            <div class="col-6 px-5">
                                <label for="" class="form-label">Numero exterior</label>
                                <input type="text" class="form-control domicilio_txt_change" data-id-cliente="{{$user->id}}" data-campo="numext" aria-describedby="" value="{{$domicilio->numext}}" required>
                            </div>
                            <div class="col-6 px-5">
                              <label for="" class="form-label">Numero interior</label>
                              <input type="text" class="form-control domicilio_txt_change" data-id-cliente="{{$user->id}}" data-campo="numint" aria-describedby="" value="{{$domicilio->numint}}">
                            </div>
                        </div>
                        <div class="col-12 mb-3 d-flex px-4">
                            <div class="col-6 px-5">
                                <label for="" class="form-label">Entre calles</label>
                                <input type="text" class="form-control domicilio_txt_change" data-id-cliente="{{$user->id}}" data-campo="entrecalles" aria-describedby="" value="{{$domicilio->entrecalles}}" required>
                            </div>
                            <div class="col-6 px-5">
                              <label for="" class="form-label">Colonia</label>
                              <input type="text" class="form-control domicilio_txt_change" data-id-cliente="{{$user->id}}" data-campo="colonia" aria-describedby="" value="{{$domicilio->colonia}}" required>
                            </div>
                        </div>
                        <div class="col-12 mb-3 d-flex px-4">
                            <div class="col-6 px-5">
                                <label for="" class="form-label">CP</label>
                                <input type="text" class="form-control domicilio_txt_change" data-id-cliente="{{$user->id}}" data-campo="cp" aria-describedby="" value="{{$domicilio->cp}}" required>
                            </div>
                            <div class="col-6 px-5">
                              <label for="" class="form-label">Municipio</label>
                              <input type="text" class="form-control domicilio_txt_change" data-id-cliente="{{$user->id}}" data-campo="municipio" aria-describedby="" value="{{$domicilio->municipio}}" required>
                            </div>
                        </div>
                        <div class="col-12 mb-3 d-flex px-4">
                            <div class="col-6 px-5">
                                <label for="" class="form-label">Estado</label>
                                <input type="text" class="form-control domicilio_txt_change" data-id-cliente="{{$user->id}}" data-campo="estado" aria-describedby="" value="{{$domicilio->estado}}" required>
                            </div>
                            <div class="col-6 px-5">
                              <label for="" class="form-label">Pais</label>
                              <input type="text" class="form-control "  aria-describedby="" value="MEXICO" readonly>
                            </div>
                        </div>
                </div>
                </div>
                <div class="col-4 card p-3 d-flex justify-content-between" style=" height: 450px; border-radius: 26px; border:none; box-shadow: 1px 1px 10px rgba(0, 0, 0, 0.11);">
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
                        <h6 id="cost-env" style="font-weight: ;">{{session('envio')}}</h6>
                    </div>
                    @php
                        $precio_final_p = $total_prod + session('envio');
                    @endphp
                    <div class="col-12 d-flex justify-content-between">
                        <h5 style="font-weight: bold;">Total</h5>
                        <h5 id="total_compra" data-total-c="{{$total_prod}}" style="font-weight: bold;">${{$precio_final_p}}</h5>
                    </div>
                    <div class="col-12" style="height: 50px;">
                        @csrf
                        <input id="cant_prods_t" type="text" name="cant_prods" value="{{$cantidad_prods}}" hidden>
                        <button type="submit" id="btn-comprar" class="col-12 btn btn-primary d-flex flex-row justify-content-center align-items-center" style="border-radius: 26px;" ><p class="fa-bounce py-0 my-auto">Comprar</p> <i class="fa-solid fa-credit-card fa-bounce ms-3"></i></button>
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

    <script>

    </script>
        <script type="text/javascript">



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

            $('.domicilio_txt_change').change(function (e){

                var valor = $(this).val();
                var campo = $(this).data('campo');
                var id_u = $(this).data('id-cliente');

                console.log(valor, campo, id_u);

                var csrf = $('meta[name="csrf-token"]').attr('content');
                var URL = "{{route('update_d_envio')}}";
                $.ajax({
                    method: "POST",
                    url: URL,
                    data: {
                        "_method": 'post',
                        "_token": csrf,
                        id: id_u,
                        campo: campo,
                        valor: valor
                    }
                })
                .done(function(msg) {
                    if (msg.success) {
                        toastr["success"](msg.mensaje);
                    }else{
                        toastr["error"](msg.mensaje);
                    }
                });

            });

            $('.usuario_txt_change').change(function (e){

                var valor = $(this).val();
                var campo = $(this).data('campo');
                var id_u = $(this).data('id-cliente');

                console.log(valor, campo, id_u);

                var csrf = $('meta[name="csrf-token"]').attr('content');
                var URL = "{{route('update_perfil')}}";
                $.ajax({
                    method: "POST",
                    url: URL,
                    data: {
                        "_method": 'post',
                        "_token": csrf,
                        id: id_u,
                        campo: campo,
                        valor: valor
                    }
                })
                .done(function(msg) {
                    if (msg.success) {
                        toastr["success"](msg.mensaje);
                    }else{
                        toastr["error"](msg.mensaje);
                    }
                });

            });


        </script>

    @endsection
{{-- JAVASCRIPT EXTRAS --}}
