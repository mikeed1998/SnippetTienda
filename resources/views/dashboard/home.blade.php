@extends('layouts.app')

@section('title','Home')
@section('content')
<div class="col-12 px-3 mt-3 d-flex justify-content-center  align-items-center">
    <div class="col-4 d-flex justify-content-center align-items-center" style="">
        <div class="" style="width: 100px; height: 100px; background: ; border-radius: 50%;">
            <img src="{{asset('img/design/userIcon.png')}}" style="width: 100%;" alt="">
        </div>
    </div>
    <div class="col-8 d-flex flex-column" style="background: ; height: 100%;">
        <h1>{{$usuario->name." ".$usuario->lastname}}</h1>
        <h5>Email: {{$usuario->email}}</h5>
    </div>
</div>
<div class="container">
    <hr>
    <div class="col-12 py-3 px-3">
        <h6 class="col-12 text-center">Información básica</h6>
        <div class="col-12 ">
                <div class="col-12 my-3 d-flex px-4">
                    <div class="col-6 px-5">
                        <label for="" class="form-label">Nombre</label>
                        <input type="text" class="form-control usuario_txt_change" data-id-cliente="{{$usuario->id}}" data-campo="name" id="" aria-describedby="" value="{{$usuario->name}}">
                    </div>
                    <div class="col-6 px-5">
                      <label for="" class="form-label">Apellido</label>
                      <input type="text" class="form-control usuario_txt_change" data-id-cliente="{{$usuario->id}}" data-campo="lastname" id="" aria-describedby="" value="{{$usuario->lastname}}">
                    </div>
                </div>
                <div class="col-12 px-4">
                    <div class="mb-3 col-6 px-5">
                        <label for="" class="form-label">Telefono</label>
                        <input type="text" class="form-control usuario_txt_change" data-id-cliente="{{$usuario->id}}" data-campo="telefono" id="" value="{{$usuario->telefono}}">
                    </div>
                </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
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
