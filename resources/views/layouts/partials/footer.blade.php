    
    <style>

        @media only screen and (max-width: 768px){  
            .temas{
                display: none !important;
            }
        }

        @media only screen and (max-width: 390px){  


        }
        </style>
    
    
    <footer class="footer_chido col-12 pt-5" style="position: relative; background: #E2D7D3;">
        <div class="container d-flex align-items-center flex-column" style="">
            <div class="col-12 d-flex temas" style="border-bottom:solid 1px #B49B9C; border-top:solid 1px #B49B9C;">
                <div class="col-4 my-2"></div>
                <div class="col-3 my-2"><h2 class="my-auto" style="color: black; font-weight: lighter;">NAVEGACIÓN</h2></div>
                <div class="col-2 my-2 mx-5"><h2 class="my-auto" style="color: black; font-weight: lighter;">AYUDA</h2></div>
                <div class="col-3 my-2"><h2 class="my-auto" style="color: black; font-weight: lighter;">CONTACTO</h2></div>
            </div>

            <div class="col-12 d-flex flex-column flex-md-column flex-lg-row" style="border-bottom:solid 1px #B49B9C;">
                <div class="col-12 col-md-12 col-lg-4 my-2 d-flex justify-content-center">
                    <img src="{{asset('img/design/logo02.png')}}" alt="">
                </div>
                <div class="col-12 col-md-12 col-lg-3 my-2 text-center text-md-center text-lg-start">
                    <ul class="mx-0 px-0" style="color: white; list-style: none;">
                        <li class="my-2"><a href="{{route('front.index')}}" style="text-decoration: none; color: black;">INICIO</a></li>
                        <li class="mb-2"><a href="{{route('front.products')}}" style="text-decoration: none; color: black;">STORE</a></li>
                        <li class="mb-2"><a href="{{route('front.projects')}}" style="text-decoration: none; color: black;">PROYECTOS</a></li>
                        <li class="mb-2"><a href="{{route('front.contact')}}" style="text-decoration: none; color: black;">CONTACTO</a></li>
                    </ul>
                </div>
                <div class="col-12 col-md-12 col-lg-2 my-2 mx-0 mx-md-0 mx-lg-5 text-center text-md-center text-lg-start">
                    <ul class="mx-0 px-0" style="color: black; list-style: none;">
                        <li class="my-2"><a href="{{route('front.index')}}" style="text-decoration: none; color: black;">PREGUNTAS FRECUENTES</a></li>
                        <li class="mb-2"><a href="{{route('front.index')}}" style="text-decoration: none; color: black;">AVISO DE PRIVACIDAD</a></li>
                        <li class="mb-2"><a href="{{route('front.index')}}" style="text-decoration: none; color: black;">POLITICAS DE DISTRIBUCIÓN</a></li>
                    </ul>
                </div>
                <div class="col-12 col-md-12 col-lg-3 my-2 text-center text-md-center text-lg-start">
                    <ul class="mx-0 px-0" style="color: black; list-style: none;">
                        <li class="my-2"><a href="" style="text-decoration: none; color: black;">CONTACTO</a></li>
                        <li class="mb-2"><a href="" style="text-decoration: none; color: black;">TEL.</a></li>
                        <li class="mb-2"><a href="" style="text-decoration: none; color: black;">DIRECCION DEL LUGAR</a></li>
                        <li class="mb-2 col-12"><a href="" style="text-decoration: none; color: black;">Av.Lapizlazuli 2074, 44560 Guadalajara, Jal.</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-12 text-center">
                <p class="my-4" style="font-weight: lighter; font-size: 1rem; color: #B49B9C;">CUATRO 44 2023 TODOS LOS DERECHOS RESERVADOS DISEÑO POR WOZIAL</p>
            </div>

        </div>
    </footer>