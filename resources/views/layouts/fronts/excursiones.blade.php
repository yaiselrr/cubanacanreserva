@if(isset($vistaexcursiones)=='Si')
    <div class="row col-md-12" align="center">
        <img src="{{asset('assets/img/productos, excursiones.png')}}">
    </div>
    @include('layouts.fronts.botonesproductos')
@else
    <div class="row col-md-12" align="center">
        <img src="{{asset('assets/img/excursiones home.png')}}">
    </div>
@endif
@if(count($excursiones)==0)

    <div class="col-md-12 no-data">No hay excursiones disponibles</div>
@else
    <div class="row mb-2" id="bloques1">
        @foreach($excursiones as $excursione)
            <div class="col-md-6" id="cuadro">
                <div
                    class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col-auto d-lg-block">
                        <img class="img-responsive bloquethumb" src="{{asset('/storage/'.$excursione->imagen)}}">
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
                            USD {{$excursione->paxminimo}}
                        </div>
                        <a href="{{route('home.detalles-excursiones', $excursione->id)}}" class="stretched-link ">
                        </a>
                    </div>
                </div>
                <a href="{{route('home.detalles-excursiones', $excursione->id)}}" class="stretched-link ">
                    <div class="ribbon gift">
                        <div class="theribbon ribbonprice">
                            USD {{$excursione->paxminimo}}
                        </div>
                        <div class="ribbon-background ">
                        </div>
                    </div>
                </a>
            </div>
        @endforeach

    </div>
@endif
