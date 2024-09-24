@if(isset($vistahoteles)=='Si')
    <div class="row col-md-12" align="center">
        <img src="{{asset('assets/img/productos, hoteles.png')}}">
    </div>
    @include('layouts.fronts.botonesproductos')
@else
    <div class="row col-md-12" align="center">
        <img src="{{asset('assets/img/hoteles home.png')}}">
    </div>
@endif
@if(count($hoteles)==0)

    <div class="col-md-12 no-data">No hay hoteles disponibles</div>
@else
    <div class="row mb-2" id="bloques1">
        @foreach($hoteles as $hotel)
            <div class="col-md-6" id="cuadro">
                <div
                    class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    @php
                        $imagenes = explode(',',$hotel->imagen);
                    @endphp
                    <div class="col-auto  d-lg-block">
                        <img class="img-responsive bloquethumb " src="{{asset('/storage/'.$imagenes[0])}}">
                    </div>
                    {{-- <div class="col-auto">
                         <a class="btn btn-light btn-block botonestotalpago"
                            style="background: #DA2513;color: #fff">EXCURSIÓN</a>
                     </div>--}}
                    <div class="col p-5 d-flex flex-column position-static">
                        <strong class="d-inline-block mb-2" style="color: #DA2513"> Hotel {{$hotel->nombre}}</strong>
                        <div class="mb-1" style="margin-top: -10px">
                            {{-- <h3 class="mb-0">Extrellas</h3>--}}
                            @if($hotel->categoria_id == 1)
                                <div class="p-2 stars" style="color: #DA2513;">
                                    <i class="fa fa-star fa-1x"></i>
                                </div>
                            @elseif($hotel->categoria_id == 2)
                                <div class="p-2 stars" style="color: gold;">
                                    @for($i = 0;$i< 2; $i++)
                                        <i class="fa fa-star fa-1x"></i>
                                    @endfor
                                </div>
                            @elseif($hotel->categoria_id == 3)
                                <div class="p-2 stars" style="color: gold;">
                                    @for($i = 0;$i< 3; $i++)
                                        <i class="fa fa-star fa-1x"></i>
                                    @endfor
                                </div>
                            @elseif($hotel->categoria_id == 4)
                                <div class="p-2 stars" style="color: gold;">
                                    @for($i = 0;$i< 4; $i++)
                                        <i class="fa fa-star fa-1x"></i>
                                    @endfor
                                </div>
                            @elseif($hotel->categoria_id == 5)
                                <div class="p-2 stars" style="color: gold;">
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
                        <a href="{{route('home.detalles-hotel', $hotel->id)}}" class="stretched-link ">
                        </a>
                    </div>
                </div>
                <a href="{{route('home.detalles-hotel', $hotel->id)}}" class="stretched-link ">
                    <div class="ribbon gift">
                        <div class="theribbon ribbonprice">
                            USD {{$hotel->precio_desde}}
                        </div>
                        <div class="ribbon-background ">
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
@endif
