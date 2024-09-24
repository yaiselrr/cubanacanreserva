@extends('layouts.fronts.assest')
@section('content')
    @include('layouts.fronts.carousel')
    @include('layouts.fronts.buscarProductos')
    <div class="row col-md-12" align="center">
        <img src="{{asset('assets/img/ofertas.png')}}">
    </div>

    {{--Listado de Excursiones--}}
    <div class="row mb-2" id="bloques1">
        @foreach($excursiones as $excursione)
            <div class="col-md-6">
                <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col-auto d-lg-block">
                            <img class="img-responsive bloquethumb" src="{{asset('/storage/'.$excursione->imagen)}}">
                            <a class="btn btn-light btn-block botonestotalpago"
                               style="background: #DA2513;color: #fff">EXCURSIÓN</a>
                    </div>
                    <div class="col p-5 d-flex flex-column position-static">
                        <div style="margin-top: -25px">
                            <strong class="d-inline-block mb-1" style="color: #DA2513"> {{$excursione->nombre}}</strong>
                            <div class="mb-1">
                                <i class="nav-icon detalleproductos">Modalidad:</i> {{$excursione->modalidad}}
                            </div>
                            <div class="mb-1">
                                <i class="nav-icon detalleproductos">Duración: </i>{{$excursione->duracion}}
                            </div>
                            <div class="mb-1">
                                <i class="nav- detalleproductos">Territorio Origen:</i> {{$excursione->origen}}
                            </div>
                            <div class="mb-1">
                                <i class="nav-icon detalleproductos">Territorio Destino:</i> {{$excursione->destino}}
                            </div>
                        </div>

                        <div class="mb-1 visibleresponsive">
                            USD @if($excursione->auto_clasico == 1) {{$excursione->precio_pax_auto}}
                            @else {{$excursione->precio_pax}}  @endif
                        </div>
                    </div>
                </div>
                <div class="ribbon gift">
                    <div class="theribbon ribbonprice">
                        USD @if($excursione->auto_clasico == 1) {{$excursione->precio_pax_auto}}
                        @else {{$excursione->precio_pax}}  @endif
                    </div>
                    <div class="ribbon-background ">
                    </div>
                </div>
            </div>
        @endforeach

        {{--Listado de Hoteles--}}
        @foreach($hoteles as $hotel)
            <div class="col-md-6">
                <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col-auto d-lg-block">
                            <img class="img-responsive bloquethumb " src="{{asset('/storage/'.$hotel->imagen)}}">
                            <a class="btn btn-light btn-block botonestotalpago"
                               style="background: #DA2513;color: #fff">HOTEL</a>
                    </div>
                    <div class="col p-5 d-flex flex-column position-static">
                        <strong class="d-inline-block mb-2" style="color: #DA2513"> Hotel {{$hotel->nombre}}</strong>
                        <div class="mb-1" style="margin-top: -10px">
                            {{-- <h3 class="mb-0">Extrellas</h3>--}}
                            @if($hotel->categoria_id == 1)
                                <div class="p-2 stars" style="color: #DA2513;">
                                    <i class="fa fa-star fa-1x"></i>
                                </div>
                            @elseif($hotel->categoria_id == 2)
                                <div class="p-2 stars" style="color: #DA2513;">
                                    @for($i = 0;$i< 2; $i++)
                                        <i class="fa fa-star fa-1x"></i>
                                    @endfor
                                </div>
                            @elseif($hotel->categoria_id == 3)
                                <div class="p-2 stars" style="color: #DA2513">
                                    @for($i = 0;$i< 3; $i++)
                                        <i class="fa fa-star fa-1x"></i>
                                    @endfor
                                </div>
                            @elseif($hotel->categoria_id == 4)
                                <div class="p-2 stars" style="color: #DA2513;">
                                    @for($i = 0;$i< 4; $i++)
                                        <i class="fa fa-star fa-1x"></i>
                                    @endfor
                                </div>
                            @elseif($hotel->categoria_id == 5)
                                <div class="p-2 stars" style="color: #DA2513;">
                                    @for($i = 0;$i< 5; $i++)
                                        <i class="fa fa-star fa-1x"></i>
                                    @endfor
                                </div>
                            @endif
                        </div>
                        <div class="mb-1">
                            <i class="nav-icon fas fa-map-marker-alt" style="color: #2A4660"></i> {{$hotel->direccion}}
                        </div>
                        <div class="mb-1 visibleresponsive ">
                            USD {{$hotel->precio_desde}}
                        </div>
                    </div>
                </div>
                <div class="ribbon gift">
                    <div class="theribbon ribbonprice">
                        USD {{$hotel->precio_desde}}
                    </div>
                    <div class="ribbon-background ">
                    </div>
                </div>
            </div>
        @endforeach
        {{--Listado de Circuitos--}}
        @foreach($circuitos as $c)
            <div class="col-md-6">
                <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col-auto d-lg-block">
                            <img class="img-responsive bloquethumb" src="{{ asset('imagen/circuitos/'.$c->imagen) }}">
                            <a class="btn btn-light btn-block botonestotalpago"
                               style="background: #DA2513;color: #fff">CIRCUITO</a>
                    </div>
                    <div class="col p-5 d-flex flex-column position-static">
                        <div style="margin-top: -25px">
                            <strong class="d-inline-block mb-2 text-primary">{{ $c->nombre }}</strong>
                            <h3 class="mb-0">Featured post</h3>
                            <div class="mb-1 text-muted">Nov 12</div>
                            <p class="card-text mb-auto">This is a wider card with supporting text below as a natural
                                lead-in to additional content.</p>
                            <a href="#" class="stretched-link">Continue reading</a>
                        </div>
                        <div class="mb-1 visibleresponsive">
                            USD {{$c->precio_desde}}
                        </div>
                    </div>
                </div>
                <div class="ribbon gift">
                    <div class="theribbon ribbonprice">
                        USD {{$c->precio_desde}}
                    </div>
                    <div class="ribbon-background ">
                    </div>
                </div>
            </div>
        @endforeach
        {{--Listado de Evento--}}
        @foreach($eventos as $evento)
            <div class="col-md-6">
                <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col-auto d-lg-block">
                            <img class="img-responsive bloquethumb" src="{{ asset('imagen/evento/'.$evento->imagen) }}">
                            <a class="btn btn-light btn-block botonestotalpago"
                               style="background: #DA2513;color: #fff">EVENTO</a>
                    </div>
                    <div class="col p-5 d-flex flex-column position-static">
                        <div style="margin-top: -25px">
                            <strong class="d-inline-block mb-1" style="color: #DA2513"> {{$evento->nombre}}</strong>
                            <div class="mb-1">
                                <i class="nav-icon detalleproductos">Duración: </i>{{$evento->fecha_inicio}}
                            </div>
                            <div class="mb-1">
                                <i class="nav- detalleproductos">Territorio Origen:</i> {{$evento->fecha_fin}}
                            </div>
                            <div class="mb-1">
                                <i class="nav-icon detalleproductos">Territorio Destino:</i> {{$evento->lugar}}
                            </div>
                        </div>
                        <div class="mb-1 visibleresponsive">
                            USD {{$evento->precio_desde}}
                        </div>
                    </div>
                </div>
                <div class="ribbon gift">
                    <div class="theribbon ribbonprice">
                        USD {{$evento->precio_desde}}
                    </div>
                    <div class="ribbon-background ">
                    </div>
                </div>
            </div>
        @endforeach
    </div>
        <nav aria-label="Contacts Page Navigation">
            <ul class="pagination justify-content-center m-0">
                {{$paginator->links('paginacion.pagination')}}
            </ul>
        </nav>
@endsection