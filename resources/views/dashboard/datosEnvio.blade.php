@extends('layouts.app')

@section('title','Home')
@section('content')

<div class="container">
    <div class="col-12 py-3 px-3">
        <h6 class="col-12 text-center">Direccion de envio</h6>
        <div class="col-12 ">
            <div class="col-12 ">
                <div class="col-12 my-3 mt-2 d-flex px-4">
                    <div class="col-6 px-5">
                        <label for="" class="form-label">Nombre de quien recibe</label>
                        <input type="text" class="form-control domicilio_txt_change" data-id-cliente="{{$usuario->id}}" data-campo="alias" aria-describedby="" value="{{$domicilio->alias}}" required>
                    </div>
                    <div class="col-6 px-5">
                      <label for="" class="form-label">Calle</label>
                      <input type="text" class="form-control domicilio_txt_change" data-id-cliente="{{$usuario->id}}" data-campo="calle" aria-describedby="" value="{{$domicilio->calle}}" required>
                    </div>
                </div>
                <div class="col-12 mb-3 d-flex px-4">
                    <div class="col-6 px-5">
                        <label for="" class="form-label">Numero exterior</label>
                        <input type="text" class="form-control domicilio_txt_change" data-id-cliente="{{$usuario->id}}" data-campo="numext" aria-describedby="" value="{{$domicilio->numext}}" required>
                    </div>
                    <div class="col-6 px-5">
                      <label for="" class="form-label">Numero interior</label>
                      <input type="text" class="form-control domicilio_txt_change" data-id-cliente="{{$usuario->id}}" data-campo="numint" aria-describedby="" value="{{$domicilio->numint}}">
                    </div>
                </div>
                <div class="col-12 mb-3 d-flex px-4">
                    <div class="col-6 px-5">
                        <label for="" class="form-label">Entre calles</label>
                        <input type="text" class="form-control domicilio_txt_change" data-id-cliente="{{$usuario->id}}" data-campo="entrecalles" aria-describedby="" value="{{$domicilio->entrecalles}}" required>
                    </div>
                    <div class="col-6 px-5">
                      <label for="" class="form-label">Colonia</label>
                      <input type="text" class="form-control domicilio_txt_change" data-id-cliente="{{$usuario->id}}" data-campo="colonia" aria-describedby="" value="{{$domicilio->colonia}}" required>
                    </div>
                </div>
                <div class="col-12 mb-3 d-flex px-4">
                    <div class="col-6 px-5">
                        <label for="" class="form-label">CP</label>
                        <input type="text" class="form-control domicilio_txt_change" data-id-cliente="{{$usuario->id}}" data-campo="cp" aria-describedby="" value="{{$domicilio->cp}}" required>
                    </div>
                    <div class="col-6 px-5">
                      <label for="" class="form-label">Municipio</label>
                      <input type="text" class="form-control domicilio_txt_change" data-id-cliente="{{$usuario->id}}" data-campo="municipio" aria-describedby="" value="{{$domicilio->municipio}}" required>
                    </div>
                </div>
                <div class="col-12 mb-3 d-flex px-4">
                    <div class="col-6 px-5">
                        <label for="" class="form-label">Estado</label>
                        <input type="text" class="form-control domicilio_txt_change" data-id-cliente="{{$usuario->id}}" data-campo="estado" aria-describedby="" value="{{$domicilio->estado}}" required>
                    </div>
                    <div class="col-6 px-5">
                      <label for="" class="form-label">Pais</label>
                      <input type="text" class="form-control "  aria-describedby="" value="MEXICO" readonly>
                    </div>
                </div>
        </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    
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

</script>
@endsection
