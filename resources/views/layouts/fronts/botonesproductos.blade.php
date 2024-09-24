<br>
<br>
<div id="carouselbotonesproductos" class="owl-carousel owl-theme">
    <div class="owl-item" id="botones" style=" height: 80px">
        <a href="{{ route('home.circuitos') }}">
            @if(request()->routeIs('home.circuitos') || request()->routeIs('home.circuitos-habitaciones') ||
             request()->routeIs('home.circuitos-datos') ||  request()->routeIs('home.detalles-circuitos'))
                <img src="{{asset('assets/img/Boton circuitos activo.png')}}" style="width: 250px;">
            @else
                <img src="{{asset('assets/img/Boton circuitos pasivo.png')}}" style="width: 250px;">
            @endif
        </a>
    </div>
    <div class="owl-item" id="botones" style=" height: 80px">
        <a href="{{ route('home.excursiones') }}">
            @if(request()->routeIs('home.excursiones')|| request()->routeIs('home.detalles-excursiones'))
                <img src="{{asset('assets/img/Boton excursiones activo.png')}}"
                     style="width: 250px;">
            @else
                <img src="{{asset('assets/img/Boton excursiones pasivo.png')}}"
                     style="width: 250px;">
            @endif
        </a>
    </div>
    <div class="owl-item" id="botones" style=" height: 80px">
        <a href="{{ route('home.hoteles') }}">
            @if(request()->routeIs('home.hoteles') || request()->routeIs('home.detalles-hotel'))
                <img src="{{asset('assets/img/Boton hoteles activo.png')}}" style="width: 250px;">
            @else
                <img src="{{asset('assets/img/Boton hoteles pasivo.png')}}" style="width: 250px;">
            @endif
        </a>
    </div>
    <div class="owl-item" id="botones" style=" height: 80px">
        <a href="{{ route('home.viajes-medida') }}">
            @if(request()->routeIs('home.viajes-medida') || request()->routeIs('home.detalle-viajes-medida'))
                <img src="{{asset('assets/img/BOTON 2B.png')}}" style="width: 250px;">
            @else
                <img src="{{asset('assets/img/BOTON 2A.png')}}" style="width: 250px;">
            @endif
        </a>
    </div>
    <div class="owl-item" id="botones" style=" height: 80px">
        <a href="{{ route('home.transfercolectivot') }}">
            @if(request()->routeIs('home.transfercolectivot'))
                <div class="col-md-2 mb-2">
                    <img src="{{asset('assets/img/transfercolectivoac.png')}}"style="width: 250px;">
                </div>
            @else
                <div class="col-md-2 mb-2">
                    <img src="{{asset('assets/img/transfercolectivo.png')}}"style="width: 250px;">
                </div>
            @endif
        </a>
    </div>
    <div class="owl-item" id="botones" style=" height: 80px">
        <a href="{{ route('home.transferprivadot') }}">
            @if(request()->routeIs('home.transferprivadot'))
                <div class="col-md-2 mb-2">
                    <img src="{{asset('assets/img/transferprivadoac.png')}}" style="width: 250px;">
                </div>
            @else
                <div class="col-md-2 mb-2">
                    <img src="{{asset('assets/img/transferprivado.png')}}" style="width: 250px;">
                </div>
            @endif
        </a>
    </div>
    <div class="owl-item" id="botones" style=" height: 80px">
        <a href="{{ route('home.transfercolectivoprecio') }}">
            @if(request()->routeIs('home.transfercolectivoprecio'))
                <div class="col-md-2 mb-2">
                    <img src="{{asset('assets/img/transfercolectivoprecioac.png')}}"  style="width: 250px;">
                </div>
            @else
                <div class="col-md-2 mb-2">
                    <img src="{{asset('assets/img/transfercolectivoprecio.png')}}"  style="width: 250px;">
                </div>
            @endif
        </a>
    </div>
    <div class="owl-item" id="botones" style=" height: 80px">
            <a href="{{ route('home.trasladosconectandocubat') }}">
            @if(request()->routeIs('home.trasladosconectandocubat'))
                <div class="col-md-2 mb-2">
                    <img src="{{asset('assets/img/conectandoac.png')}}"  style="width: 250px;">
                </div>
            @else
                <div class="col-md-2 mb-2">
                    <img src="{{asset('assets/img/conectando.png')}}"  style="width: 250px;">
                </div>
            @endif
        </a>
    </div>
    <div class="owl-item" id="botones" style=" height: 80px">
        <a href="{{ route('home.flexyflydrive') }}">
        @if(request()->routeIs('home.flexyflydrive'))
            <div class="col-md-2 mb-2">
                <img src="{{asset('assets/img/BOTON 1B.png')}}"  style="width: 250px;">
            </div>
        @else
            <div class="col-md-2 mb-2">
                <img src="{{asset('assets/img/BOTON 1A.png')}}"  style="width: 250px;">
            </div>
        @endif
    </a>
</div>
</div>
