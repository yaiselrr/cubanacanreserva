<div class="row col-md-12" align="center" style="margin-top: 20px;margin-left: 20px;">
    <img src="{{asset('assets/img/ofertas.png')}}">
</div>
@if(count($ofertas)==0)

    <div class="no-data">No hay ofertas dsiponibles</div>
@else

    <div class="row mb-2" id="bloques1">
        @foreach($ofertas as $oferta)
            @if($oferta->tipo_producto == 'circuito')

                <div class="col-md-6" id="cuadro">
                    <div
                        class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                        <div class="col-auto d-lg-block">
                            <img class="img-responsive bloquethumb"
                                 src="{{ asset('imagen/circuitos/'.$oferta->circuitos->imagen) }}">
                            <a class="btn btn-light btn-block botonestotalpago"
                               style="background: #DA2513;color: #fff">CIRCUITO</a>
                        </div>

                        <div class="col p-5 d-flex flex-column position-static">
                            @foreach($oferta->circuitos->circuitostras as $trans)
                                @if($trans['idioma'] == 'es')
                                    <strong class="d-inline-block mb-2 text-primary"><b
                                            style="color: #DA2513;">{{ $trans['nombre'] }}</b></strong>
                                @endif
                            @endforeach
                            @foreach($oferta->circuitos->modalidad->traslations as $trans)
                                @if($trans['idioma'] == 'es')
                                    <div class="d-inline-block mb-2 "><b>Modalidad: </b> {{ $trans['nombre'] }}
                                    </div>
                                @endif
                            @endforeach
                            <div class="d-inline-block mb-2 "><b>Duración: </b> {{ $oferta->circuitos->duracions_id }}
                                días
                                y {{ $oferta->circuitos->duracions_id-1 }} noches
                            </div>
                            @foreach($oferta->circuitos->circuitostras as $trans)
                                @if($trans['idioma'] == 'es')
                                    <div class="d-inline-block mb-2 "><b>Itinerario: </b>{{ $trans['itinerario'] }}
                                    </div>
                                @endif
                            @endforeach

                            <div class="mb-1 visibleresponsive">
                                USD {{$oferta->circuitos->precio_desde}}
                            </div>
                            <a href="{{ route('home.detalles-circuitos', $oferta->circuitos->id) }}" class="stretched-link ">
                            </a>
                        </div>
                    </div>
                    <a href="{{route('home.detalles-circuitos', $oferta->circuitos->id)}}" class="stretched-link ">
                        <div class="ribbon gift" style="top:150px;">
                            <div class="theribbon ribbonprice">
                                USD {{$oferta->circuitos->precio_desde}}
                            </div>
                            <div class="ribbon-background ">
                            </div>
                        </div>
                    </a>
                </div>
            @endif
            @if($oferta->tipo_producto == 'excursion')

                    <div class="col-md-6" id="cuadro">
                        <div
                            class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                            <div class="col-auto d-lg-block">
                                <img class="img-responsive bloquethumb"
                                     src="{{ asset('/storage/'.$oferta->excursiones->imagen) }}">
                                <a class="btn btn-light btn-block botonestotalpago"
                                   style="background: #DA2513;color: #fff">EXCURSIÓN</a>
                            </div>

                            <div class="col p-5 d-flex flex-column position-static">
                                <strong class="d-inline-block mb-2 text-primary"><b
                                        style="color: #DA2513;">{{ $oferta->excursiones->nombre }}</b></strong>
                                @foreach($oferta->excursiones->modalidad->traslations as $trans)
                                    @if($trans['idioma'] == 'es')
                                        <div class="d-inline-block mb-2 "><b>Modalidad: </b> {{ $trans['nombre'] }}
                                        </div>
                                    @endif
                                @endforeach
                                <div class="d-inline-block mb-2 "><b>Duración: </b> {{ $oferta->excursiones->duracion_id }}
                                    días
                                    y {{ $oferta->excursiones->duracion_id-1 }} noches
                                </div>
                                <div class="d-inline-block mb-2 "><b>Origen: </b> {{ $oferta->excursiones->territorio_origen->provincia }}
                                </div>
                                <div class="d-inline-block mb-2 "><b>Destino: </b> {{ $oferta->excursiones->territorio_destino->provincia }}
                                </div>
                                <div class="mb-1 visibleresponsive">
                                    USD {{$oferta->excursiones->paxminimo}}
                                </div>
                                <a href="{{ route('home.detalles-excursiones', $oferta->excursiones->id) }}" class="stretched-link ">
                                </a>
                            </div>
                        </div>
                        <a href="{{route('home.detalles-excursiones', $oferta->excursiones->id)}}" class="stretched-link ">
                            <div class="ribbon gift" style="top:150px;">
                                <div class="theribbon ribbonprice">
                                    USD {{$oferta->excursiones->paxminimo}}
                                </div>
                                <div class="ribbon-background ">
                                </div>
                            </div>
                        </a>
                    </div>
                @endif
            @if($oferta->tipo_producto == 'hotel')

                <div class="col-md-6" id="cuadro">
                    <div
                        class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                        <div class="col-auto  d-lg-block">
                            <img class="img-responsive bloquethumb "
                                 src="{{asset('/storage/'.$oferta->hoteles->imagen)}}">
                            <a class="btn btn-light btn-block botonestotalpago"
                               style="background: #DA2513;color: #fff">HOTEL</a>
                        </div>
                        <div class="col p-5 d-flex flex-column position-static">
                            <strong class="d-inline-block mb-2 text-primary"><b
                                    style="color: #DA2513;"> Hotel {{$oferta->hoteles->nombre}}</b></strong>

                            <div class="mb-1" style="margin-top: -10px">
                                {{-- <h3 class="mb-0">Extrellas</h3>--}}
                                @if($oferta->hoteles->categoria_id == 1)
                                    <div class="p-2 stars" style="color: gold;">
                                        <i class="fa fa-star fa-1x"></i>
                                    </div>
                                @elseif($oferta->hoteles->categoria_id == 2)
                                    <div class="p-2 stars" style="color: gold;">
                                        @for($i = 0;$i< 2; $i++)
                                            <i class="fa fa-star fa-1x"></i>
                                        @endfor
                                    </div>
                                @elseif($oferta->hoteles->categoria_id == 3)
                                    <div class="p-2 stars" style="color: gold">
                                        @for($i = 0;$i< 3; $i++)
                                            <i class="fa fa-star fa-1x"></i>
                                        @endfor
                                    </div>
                                @elseif($oferta->hoteles->categoria_id == 4)
                                    <div class="p-2 stars" style="color: gold;">
                                        @for($i = 0;$i< 4; $i++)
                                            <i class="fa fa-star fa-1x"></i>
                                        @endfor
                                    </div>
                                @elseif($oferta->hoteles->categoria_id == 5)
                                    <div class="p-2 stars" style="color: gold;">
                                        @for($i = 0;$i< 5; $i++)
                                            <i class="fa fa-star fa-1x"></i>
                                        @endfor
                                    </div>
                                @endif
                            </div>
                            @foreach($oferta->hoteles->hoteles_translations as $trans)
                                @if($trans['locale'] == 'es')
                                    <div class="mb-1">
                                        <i class="nav-icon fas fa-map-marker-alt"
                                           style="color: #2A4660"></i> {{$trans['direccion']}}
                                    </div>
                                @endif
                            @endforeach

                            <div class="mb-1 visibleresponsive ">
                                USD Desde {{$oferta->hoteles->precio_desde}}
                            </div>
                            <a href="{{route('home.detalles-hotel', $oferta->hoteles->id)}}" class="stretched-link ">
                            </a>
                        </div>
                    </div>
                    <a href="{{route('home.detalles-hotel', $oferta->hoteles->id)}}" class="stretched-link ">
                        <div class="ribbon gift" style="top:150px;">
                            <div class="theribbon ribbonprice">
                                USD {{$oferta->hoteles->precio_desde}}
                            </div>
                            <div class="ribbon-background ">
                            </div>
                        </div>
                    </a>
                </div>
            @endif
            @if($oferta->tipo_producto == 'evento')

                <div class="col-md-6" id="cuadro">
                    <div
                        class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                        <div class="col-auto d-lg-block">
                            <img class="img-responsive bloquethumb"
                                 src="{{ asset('evento/imagen/'.$oferta->eventos->imagen) }}">
                            <a class="btn btn-light btn-block botonestotalpago"
                               style="background: #DA2513;color: #fff">EVENTO</a>
                        </div>

                        <div class="col p-5 d-flex flex-column position-static">
                            @foreach($oferta->eventos->traslations as $trans)
                                @if($trans['idioma'] == 'es')
                                    <strong class="d-inline-block mb-2 text-primary"><b
                                            style="color: #DA2513;">{{ $trans['nombre'] }}</b></strong>
                                @endif
                            @endforeach
                            <div class="d-inline-block mb-2 "><b>Fecha de
                                    inicio:</b> {{ $oferta->eventos->fecha_inicio }}
                            </div>
                            <div class="d-inline-block mb-2 "><b>Fecha de fin:</b> {{ $oferta->eventos->fecha_fin }}
                            </div>
                            <div class="mb-1">
                                <i class="nav-icon fas fa-map-marker-alt"
                                   style="color: #2A4660"></i> {{$oferta->eventos->lugar->nombre}}
                            </div>
                            <div class="mb-1 visibleresponsive">
                                USD {{$oferta->eventos->cuota}}
                            </div>
                            <a href="{{ route('home.detalles-eventos', $oferta->eventos->id) }}" class="stretched-link ">
                            </a>
                        </div>
                    </div>
                    <a href="{{route('home.detalles-eventos', $oferta->eventos->id)}}" class="stretched-link ">
                        <div class="ribbon gift" style="top:150px;">
                            <div class="theribbon ribbonprice">
                                USD {{$oferta->eventos->cuota}}
                            </div>
                            <div class="ribbon-background ">
                            </div>
                        </div>
                    </a>
                </div>
            @endif
        @endforeach
    </div>
@endif
