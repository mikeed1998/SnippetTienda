<!-- Menu de la cabecera -->
<style>

    .icon_menu{
      display: none;
    }
    .icon-use{
      display: none;
    }

  @media only screen and (max-width: 780px){  
    .div_menu{
      display: none !important;
    }
    .icon_redes{
    
      font-size: 15px;
  }
  .icon_menu{
      display: block;
    }
  }  
  @media only screen and (max-width: 490px){  
  .icon_redes{
    display: none;
  }
    .div_menu_movil{
      display: block !important;
    }
    .icon-use{
      display: block;
    }
  }
</style>
{{--  --}}


<!-- Menu de la cabecera -->

<div class="menu_completo col-12 py-3 d-flex align-items-center" style="background: ; position: ; top:0; z-index: 1000;">
  <div class="col-12 px-3 px-lg-5 d-flex justify-content-between justify-content-md-between align-items-center">

    {{-- parte izquierda header --}}
      <div class="col-8 col-md-3 col-lg-auto row d-flex justify-content-start align-items-center" style="background:;">
        <img src="{{asset('img/design/logo.png')}}" style="width: 100%; max-width: 150px;" alt="">
      </div>
    {{-- parte izquierda header --}}

    {{-- parte derecha header --}}
    <div class="div_menu col-12 col-md-9 col-lg-6 d-flex justify-content-md-end justify-content-lg-center align-items-center" style="background:  ;">
      <a href="{{route('front.index')}}" class="col-auto mx-4 my-auto text-center" style="text-decoration: none; color: black; font-size: 13px; font-weight: bold;">Home</a>
      <a href="{{route('front.products')}}" class="col-auto mx-4 my-auto text-center" style="text-decoration: none; color: black; font-size: 13px; font-weight: bold;">Store</a>
      <a href="{{route('front.projects')}}" class="col-auto mx-4 my-auto text-center" style="text-decoration: none; color: black; font-size: 13px; font-weight: bold;">Proyectos</a>
      <a href="{{route('front.contact')}}" class="col-auto mx-4 my-auto text-center" style="text-decoration: none; color: black; font-size: 13px; font-weight: bold;">Contacto</a>
      <div class="col-auto ms-5 d-flex justify-content-center align-items-center flex-row">
        <a href="https://api.whatsapp.com/send?phone={{$config->whatsapp}}&text=Hola,%20estoy%20interesado%20en%20obtener%20m%C3%A1s%20informaci%C3%B3n"><i class="my-auto p-1 text-center fa-brands fa-whatsapp icon_redes" style="font-size: 1.8rem; background: ; border:1px solid #a99091; width: 40px; border-radius: 50%; color: #a99091;"></i></a>
        <a href="{{$config->facebook}}"><i class="my-auto p-1 text-center fa-brands fa-facebook-f mx-3 mx-md-3 mx-lg-4 icon_redes" style="font-size: 1.8rem; background: ; border:1px solid #a99091; width: 40px; border-radius: 50%; color: #a99091;"></i></a>
        <a href="{{$config->instagram}}"><i class="my-auto p-1 text-center fa-brands fa-instagram icon_redes" style="font-size: 1.8rem; background: ; border:1px solid #a99091; width: 40px; border-radius: 50%; color: #a99091;"></i></a>
        <a href=""><i class="my-auto p-1 text-center fab fa-tiktok icon_redes mx-3 mx-md-3 mx-lg-4" style="font-size: 1.8rem; background: ; border:1px solid #a99091; width: 40px; border-radius: 50%; color: #a99091;"></i></a>
      </div>
    </div>
    {{-- parte derecha header --}}

    <div class="col-auto d-flex justify-content-between align-items-center flex-row" style="background: ; color: rgb(0, 0, 0); font-size: 15px;">
      <a href="{{url('login')}}" class="me-3 my-auto icon_redes" style="text-decoration: none; color: black;">@if(isset($user)) {{$user->name." ".$user->lastname }} @else Iniciar sesion @endif</a>
      <a href="{{url('login')}}" style="color: black;"><i class="fa-solid fa-user me-3 icon-use" style="font-size: 20px;"></i></a>
      <a href="{{url('miCarrito')}}" style="position: relative;">
        <i class="fas fa-shopping-cart me-0 me-md-4"  style="font-size: 22px; color: black;"></i>
        @if(session('carrito'))
        <i class="fa-solid fa-circle" style="position: absolute; top: -10px; left: 20px; color: red; font-size: 12px;"></i>
          @php
              $cuenta = count(session('carrito'));
          @endphp
          @if($cuenta > 9)
          <p style="position: absolute; top: -2px; left: 8px; color: white; font-size: 11px;">9+</p>
          @else
            <p style="position: absolute; top: -1px; left: 11px; color: white; font-size: 11px;">{{$cuenta}}</p>
          @endif
        @endif
      </a>
      
      <i onclick="toggleDiv()" class="fa-solid fa-bars ms-4 icon_menu" style="color: black; font-size: 30px;"></i>
    </div>



  </div>


</div>
<div id="miDiv" class=" col-12 mt-0" style="height: 0px; overflow: hidden; background: white;">
  <div class="container d-flex flex-column mt-3">
    <div class="col-12" style="">

    </div>
    <a href="{{route('front.index')}}" class="col-12 ps-5 d-flex align-items-center" style="color: black; text-decoration: none;"><img src="{{asset('img/assets/icono_menú.png')}}" alt=""><p class="my-auto mx-2">Home</p></a>
    <hr style="color: white;">
    <a href="{{route('front.products')}}" class="col-12 ps-5 d-flex align-items-center" style="color: black; text-decoration: none;"><img src="{{asset('img/assets/icono_menú.png')}}" alt=""><p class="my-auto mx-2">Store</p></a>
    <hr style="color: white;">
    <a href="{{route('front.projects')}}" class="col-12 ps-5 d-flex align-items-center" style="color: black; text-decoration: none;"><img src="{{asset('img/assets/icono_menú.png')}}" alt=""><p class="my-auto mx-2">Proyectos</p></a>
    <hr style="color: white;">
    <a href="{{route('front.contact')}}" class="col-12 ps-5 d-flex align-items-center" style="color: black; text-decoration: none;"><img src="{{asset('img/assets/icono_menú.png')}}" alt=""><p class="my-auto mx-2">Contacto</p></a>
    <hr style="color: white;">
  </div>
  <div class="col-auto d-flex justify-content-center align-items-center flex-row mb-3" style="background: ; color: black; font-size: 20px;">
    <a href="https://api.whatsapp.com/send?phone={{$config->whatsapp}}&text=Hola,%20estoy%20interesado%20en%20obtener%20m%C3%A1s%20informaci%C3%B3n"><i class="my-auto fa-brands fa-whatsapp "></i></a>
    <a href="{{$config->facebook}}"><i class="my-auto fa-brands fa-facebook-f mx-3 mx-md-3 mx-lg-5 "></i></a>
    <a href="{{$config->instagram}}"><i class="my-auto fa-brands fa-instagram "></i></a>
  </div>
</div>

<!-- Menu de la cabecera -->
<script>
function toggleDiv() {
  var div = $("#miDiv");
  if (div.height() == 0) {
    div.animate({height: 'auto'}, 500);
  } else {
    div.animate({height: '0px'}, 500);
  }
}

$(window).scroll(function() {
  
  var scroll = $(window).scrollTop();
  
  if (scroll > 0) {
    console.log('mayor');
    $('.menu_completo').addClass('menu-scrolled');
  } else {
    console.log('cero');
    $('.menu_completo').removeClass('menu-scrolled');
  }
});

  $(document).ready(function() {
    // código que se ejecuta cuando el documento esté listo

  });
</script>
