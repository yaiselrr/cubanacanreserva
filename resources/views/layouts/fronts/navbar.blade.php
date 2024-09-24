<!-- Header -->
<header class="masthead navbar navbar-expand-md navbar-light bg-light">
    <div class="container">
        <button class="navbar-toggler navbar-toggler-right text-uppercase bg-secondary text-white rounded" type="button"
                data-toggle="collapse" data-target="#navbar" aria-controls="navbarResponsive"
                aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbar">
            <li class="nav-item dropdown navbar-nav">
                <a class="nav-item nav-link dropdown-toggle mr-md-2" href="#" id="bd-versions"
                   data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    <img src="{{asset('assets/img/idioma.png')}}" width="30" height="30"
                         class="d-inline-block align-top" alt=""> Español
                </a>
                <div class="dropdown-menu dropdown-menu-md-right" aria-labelledby="bd-versions">
                    <a class="dropdown-item active" href="#"><img src="{{asset('assets/img/idioma.png')}}"
                                                                  width="30"
                                                                  height="30" class="d-inline-block align-top"
                                                                  alt="">Español</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#"><img src="{{asset('assets/img/icono idioma ingles.png')}}"
                                                           width="30" height="30" class="d-inline-block align-top"
                                                           alt="">Inglés</a>
                </div>
            </li>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger botones_menu {{request()->routeIs('home.quienes-somos') ? 'active' :  ''}}"
                       href="{{route('home.quienes-somos')}}" > QUIENES SOMOS</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger botones_menu {{request()->routeIs('home.circuitos') || request()->routeIs('home.detalles-circuitos')
                   || request()->routeIs('home.circuitos-habitaciones') || request()->routeIs('home.excursiones') || request()->routeIs('home.detalles-excursiones')
                      || request()->routeIs('home.hoteles') || request()->routeIs('home.detalles-hotel') || request()->routeIs('home.hoteles-habitaciones') ? 'active' :  ''}}"
                       href="{{route('home.circuitos')}}" >PRODUCTOS</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger botones_menu" href="{{route('home.ofertas')}}" >OFERTAS</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger botones_menu {{request()->routeIs('home.servicios') ? 'active' :  ''}}"
                       href="{{route('home.servicios')}}" >SERVICIOS</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger botones_menu {{request()->routeIs('home.preguntas') ? 'active' :  ''}}"
                       href="{{route('home.preguntas')}}" >PREGUNTAS</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger botones_menu"
                       href="{{route('home.blogs')}}" >BLOG</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger botones_menu {{request()->routeIs('home.contactos') ? 'active' :  ''}}"
                       href="{{route('home.contactos')}}" >CONTACTO</a>
                </li>

            </ul>
            <div class="col-1 d-flex justify-content-end align-items-center">
                <a class="text-muted" href="#" aria-label="Search">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor"
                         stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="mx-3" role="img"
                         viewBox="0 0 24 24" focusable="false"><title>Search</title>
                        <circle cx="10.5" cy="10.5" r="7.5"></circle>
                        <path d="M21 21l-5.2-5.2"></path>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</header>
@section('morejs')
    <script>
        $(document).ready(function () {
            $("#search").on('keyup', function () {
                console.log('tecleando...', $(this).val().length);
                if ($(this).val().length > 3) {
                    $("#search_button").attr('disabled', false);
                }
                else {
                    $("#search_button").attr('disabled', true);
                }
            })
        })
    </script>
@endsection