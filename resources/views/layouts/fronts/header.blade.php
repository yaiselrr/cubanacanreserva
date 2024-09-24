<header class="navbar navbar-expand-lg fixed-top text-uppercase" id="mainNav">
    <div class="container">

        <a class="navbar-toggler navbar-brand js-scroll-trigger" href="{{route('home')}}"><img
                    src="{{asset('assets/img/Logo.png')}}"> <a
                    class="navbar-toggler navbar-toggler-right nav-link redes_sociales"
                    href="{{ route('home.mostrar-suscribirce') }}"> <i
                        class="nav-icon fas fa-envelope"></i> Suscribirse</a>

            <a class="navbar-toggler navbar-toggler-right  nav-link redes_sociales"
               href="#"> <i
                        class="nav-icon fas fa-clipboard"></i> Encuesta</a></a>
        {{--Responsive design--}}


        <a class="navbar-toggler navbar-toggler-right nav-link redes_sociales "
           href="#"> <i class="nav-icon fab fa-twitter"></i></a>
        <a class="navbar-toggler navbar-toggler-right nav-link redes_sociales "
           href="#"> <i class="nav-icon fab fa-instagram"></i></a>
        <a class="navbar-toggler navbar-toggler-right nav-link redes_sociales"
           href="{{ route('home.carrito-compras') }}"> <i class="nav-icon fas fa-shopping-cart"></i></a>
        {{--End Responsive design--}}

        <div class="row col-sm-12">
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <div class="col-md-2 ">
                    <a class="navbar-brand js-scroll-trigger" href="{{route('home')}}"><img
                                src="{{asset('assets/img/Logo.png')}}"></a>

                </div>
                <div class="col-md-8 mb-5 mb-lg-0">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item mx-0 mx-lg-1 list-inline-item">
                            <a class="nav-link subcribe_encuesta" href="{{ route('home.mostrar-suscribirce') }}"> <i
                                        class="nav-icon fas fa-envelope"></i> Suscribirse</a>
                        </li>
                        <li class="nav-item mx-0 mx-lg-1 list-inline-item">
                            <a class="nav-link subcribe_encuesta" href="{{ route('home.index-encuesta') }}"> <i
                                        class="nav-icon fas fa-clipboard"></i> Encuesta</a>
                        </li>
                    </ul>
                </div>

                <div class="col-md-1  top-right">
                    <ul class="navbar-nav ml-auto">
                        @foreach($enlaces as $c)
                        <li class="nav-item mx-0 mx-lg-1" id="enlace">
                            <a class="nav-link redes_sociales" href="{{ $c->nombre }}">
                                <img class="img-responsive bloquethumb"
                                     src="{{ asset('imagen/enlacered/'.$c->imagen) }}" style="
height: 15px;width: 15px;color: white;"></a>
                        </li>
                        @endforeach
                            <li class="nav-item mx-0 mx-lg-1">
                                <a class="nav-link redes_sociales" href="{{ route('home.carrito-compras') }}"> <i
                                            class="nav-icon fas fa-shopping-cart"></i></a>
                            </li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>
