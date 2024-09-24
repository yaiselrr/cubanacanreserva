<div class="row col-md-12" align="center" style="margin-top: 20px;margin-left: 20px;">
    <img src="{{asset('assets/img/resultados.png')}}">
</div>
@if(count($searchResult)<=0)
    <div class="no-data"> Su búsqueda no produjo resultados</div>
@else

    <div class="row mb-2" id="bloques1">
        @foreach($searchResult as $product)
            @if($product['tipo_producto'] == 'circuito')
                <div class="col-md-6" id="cuadro">
                    <div
                        class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                        <div class="col-auto d-lg-block">
                            <img class="img-responsive bloquethumb"
                                 src="{{ asset('imagen/circuitos/'.$product->circuitos->imagen) }}">
                            <a class="btn btn-light btn-block botonestotalpago"
                               style="background: #DA2513;color: #fff">CIRCUITO</a>
                        </div>

                        <div class="col p-5 d-flex flex-column position-static">
                            @foreach($product->circuitos->circuitostras as $trans)
                                @if($trans['idioma'] == 'es')
                                    <strong class="d-inline-block mb-2 text-primary"><b
                                            style="color: #DA2513;">{{ $trans['nombre'] }}</b></strong>
                                @endif
                            @endforeach
                            @foreach($product->circuitos->modalidad->traslations as $trans)
                                @if($trans['idioma'] == 'es')
                                    <div class="d-inline-block mb-2 "><b>Modalidad: </b> {{ $trans['nombre'] }}
                                    </div>
                                @endif
                            @endforeach
                            <div class="d-inline-block mb-2 "><b>Duración: </b> {{ $product->circuitos->duracions_id }}
                                días
                                y {{ $product->circuitos->duracions_id-1 }} noches
                            </div>
                            @foreach($product->circuitos->circuitostras as $trans)
                                @if($trans['idioma'] == 'es')
                                    <div class="d-inline-block mb-2 "><b>Itinerario: </b>{{ $trans['itinerario'] }}
                                    </div>
                                @endif
                            @endforeach

                            <div class="mb-1 visibleresponsive">
                                USD {{$product->circuitos->precio_desde}}
                            </div>
                            <a href="{{ route('home.detalles-circuitos', $product->circuitos->id) }}"
                               class="stretched-link ">
                            </a>
                        </div>
                    </div>
                    <a href="{{route('home.detalles-circuitos', $product->circuitos->id)}}" class="stretched-link ">
                        <div class="ribbon gift" style="top:150px;">
                            <div class="theribbon ribbonprice">
                                USD {{$product->circuitos->precio_desde}}
                            </div>
                            <div class="ribbon-background ">
                            </div>
                        </div>
                    </a>
                </div>
            @endif
            @if($product['tipo_producto'] == 'excursion')

                <div class="col-md-6" id="cuadro">
                    <div
                        class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                        <div class="col-auto d-lg-block">
                            <img class="img-responsive bloquethumb"
                                 src="{{ asset('/storage/'.$product->excursiones->imagen) }}">
                            <a class="btn btn-light btn-block botonestotalpago"
                               style="background: #DA2513;color: #fff">EXCURSIÓN</a>
                        </div>

                        <div class="col p-5 d-flex flex-column position-static">
                            <strong class="d-inline-block mb-2 text-primary"><b
                                    style="color: #DA2513;">{{ $product->excursiones->nombre }}</b></strong>
                            @foreach($product->excursiones->modalidad->traslations as $trans)
                                @if($trans['idioma'] == 'es')
                                    <div class="d-inline-block mb-2 "><b>Modalidad: </b> {{ $trans['nombre'] }}
                                    </div>
                                @endif
                            @endforeach
                            <div class="d-inline-block mb-2 "><b>Duración: </b> {{ $product->excursiones->duracion_id }}
                                días
                                y {{ $product->excursiones->duracion_id-1 }} noches
                            </div>
                            <div class="d-inline-block mb-2 ">
                                <b>Origen: </b> {{ $product->excursiones->territorio_origen->provincia }}
                            </div>
                            <div class="d-inline-block mb-2 ">
                                <b>Destino: </b> {{ $product->excursiones->territorio_destino->provincia }}
                            </div>
                            <div class="mb-1 visibleresponsive">
                                USD {{$product->excursiones->paxminimo}}
                            </div>
                            <a href="{{ route('home.detalles-circuitos', $product->excursiones->id) }}"
                               class="stretched-link ">
                            </a>
                        </div>
                    </div>
                    <a href="{{route('home.detalles-excursiones', $product->excursiones->id)}}" class="stretched-link ">
                        <div class="ribbon gift" style="top:150px;">
                            <div class="theribbon ribbonprice">
                                USD {{$product->excursiones->paxminimo}}
                            </div>
                            <div class="ribbon-background ">
                            </div>
                        </div>
                    </a>
                </div>
            @endif
            @if($product['tipo_producto'] == 'hotel')

                <div class="col-md-6" id="cuadro">
                    <div
                        class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                        <div class="col-auto  d-lg-block">
                            <img class="img-responsive bloquethumb "
                                 src="{{asset('/storage/'.$product->hoteles->imagen)}}">
                            <a class="btn btn-light btn-block botonestotalpago"
                               style="background: #DA2513;color: #fff">HOTEL</a>
                        </div>
                        <div class="col p-5 d-flex flex-column position-static">
                            <strong class="d-inline-block mb-2 text-primary"><b
                                    style="color: #DA2513;"> Hotel {{$product->hoteles->nombre}}</b></strong>

                            <div class="mb-1" style="margin-top: -10px">
                                {{-- <h3 class="mb-0">Extrellas</h3>--}}
                                @if($product->hoteles->categoria_id == 1)
                                    <div class="p-2 stars" style="color: gold;">
                                        <i class="fa fa-star fa-1x"></i>
                                    </div>
                                @elseif($product->hoteles->categoria_id == 2)
                                    <div class="p-2 stars" style="color: gold;">
                                        @for($i = 0;$i< 2; $i++)
                                            <i class="fa fa-star fa-1x"></i>
                                        @endfor
                                    </div>
                                @elseif($product->hoteles->categoria_id == 3)
                                    <div class="p-2 stars" style="color: gold">
                                        @for($i = 0;$i< 3; $i++)
                                            <i class="fa fa-star fa-1x"></i>
                                        @endfor
                                    </div>
                                @elseif($product->hoteles->categoria_id == 4)
                                    <div class="p-2 stars" style="color: gold;">
                                        @for($i = 0;$i< 4; $i++)
                                            <i class="fa fa-star fa-1x"></i>
                                        @endfor
                                    </div>
                                @elseif($product->hoteles->categoria_id == 5)
                                    <div class="p-2 stars" style="color: gold;">
                                        @for($i = 0;$i< 5; $i++)
                                            <i class="fa fa-star fa-1x"></i>
                                        @endfor
                                    </div>
                                @endif
                            </div>
                            @foreach($product->hoteles->hoteles_translations as $trans)
                                @if($trans['locale'] == 'es')
                                    <div class="mb-1">
                                        <i class="nav-icon fas fa-map-marker-alt"
                                           style="color: #2A4660"></i> {{$trans['direccion']}}
                                    </div>
                                @endif
                            @endforeach

                            <div class="mb-1 visibleresponsive ">
                                USD Desde {{$product->hoteles->precio_desde}}
                            </div>
                            <a href="{{route('home.detalles-hotel', $product->hoteles->id)}}" class="stretched-link ">
                            </a>
                        </div>
                    </div>
                    <a href="{{route('home.detalles-hotel', $product->hoteles->id)}}" class="stretched-link ">
                        <div class="ribbon gift" style="top:150px;">
                            <div class="theribbon ribbonprice">
                                USD {{$product->hoteles->precio_desde}}
                            </div>
                            <div class="ribbon-background ">
                            </div>
                        </div>
                    </a>
                </div>
            @endif
            @if($product['tipo_producto'] == 'evento')

                <div class="col-md-6" id="cuadro">
                    <div
                        class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                        <div class="col-auto d-lg-block">
                            <img class="img-responsive bloquethumb"
                                 src="{{ asset('evento/imagen/'.$product->eventos->imagen) }}">
                            <a class="btn btn-light btn-block botonestotalpago"
                               style="background: #DA2513;color: #fff">EVENTO</a>
                        </div>

                        <div class="col p-5 d-flex flex-column position-static">
                            @foreach($product->eventos->traslations as $trans)
                                @if($trans['idioma'] == 'es')
                                    <strong class="d-inline-block mb-2 text-primary"><b
                                            style="color: #DA2513;">{{ $trans['nombre'] }}</b></strong>
                                @endif
                            @endforeach
                            <div class="d-inline-block mb-2 "><b>Fecha de
                                    inicio:</b> {{ $product->eventos->fecha_inicio }}
                            </div>
                            <div class="d-inline-block mb-2 "><b>Fecha de fin:</b> {{ $product->eventos->fecha_fin }}
                            </div>
                            <div class="mb-1">
                                <i class="nav-icon fas fa-map-marker-alt"
                                   style="color: #2A4660"></i> {{$product->eventos->lugar->nombre}}
                            </div>
                            <div class="mb-1 visibleresponsive">
                                USD {{$product->eventos->cuota}}
                            </div>
                            <a href="{{ route('home.detalles-eventos', $product->eventos->id) }}"
                               class="stretched-link ">
                            </a>
                        </div>
                    </div>
                    <a href="{{route('home.detalles-eventos', $product->eventos->id)}}" class="stretched-link ">
                        <dciv class="ribbon gift" style="top:150px;">
                            <div class="theribbon ribbonprice">
                                USD {{$product->eventos->cuota}}
                            </div>
                            <div class="ribbon-background ">
                            </div>
                        </dciv>
                    </a>
                </div>
            @endif
            @if($product['tipo_producto'] == 'viaje')

                <div class="col-md-6" id="cuadro">
                    <div
                        class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                        <div class="col-auto d-lg-block">
                            <img class="img-responsive bloquethumb"
                                 src="{{ asset('/storage/'.$product->viajesmedida->imagen) }}">
                            <a class="btn btn-light btn-block botonestotalpago"
                               style="background: #DA2513;color: #fff">VIAJE A LA MEDIDA</a>
                        </div>

                        <div class="col p-5 d-flex flex-column position-static">
                            <strong class="d-inline-block mb-2 text-primary"><b
                                    style="color: #DA2513;">{{$product->viajesmedida->nombre}}</b></strong>

                            @foreach($product->viajesmedida->viajes_medidas_translations as $trans)
                                @if($trans['locale'] == 'es')
                                    <div class="mb-1">
                                        {!! nl2br(html_entity_decode( $trans['descripcion'])) !!}
                                    </div>
                                @endif
                            @endforeach
                        </div>

                    </div>
                    <a href="{{route('home.detalle-viajes-medida', $product->viajesmedida->id)}}"
                       class="stretched-link ">
                    </a>
                </div>
            @endif
        @endforeach
    </div>
@endif
