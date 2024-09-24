@if(isset($vistacircuitos)=='Si')
    <div class="row col-md-12" align="center">
        <img src="{{asset('assets/img/productos,circuitos.png')}}">
    </div>
    @include('layouts.fronts.botonesproductos')
@else
    <div class="row col-md-12" align="center">
        <img src="{{asset('assets/img/circuito home.png')}}">
    </div>
@endif
@if(count($circuitos)==0)
    <div class="col-md-12 no-data">No hay circuitos disponibles</div>
@else
    <div class="row mb-2" id="bloques1">
        @foreach($circuitos as $c)
            <div class="col-md-6" id="cuadro">
                <div
                    class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col-auto d-lg-block">
                        <img class="img-responsive bloquethumb" src="{{ asset('imagen/circuitos/'.$c->imagen) }}">
                    </div>
                    <div class="col p-5 d-flex flex-column position-static">
                        <strong class="d-inline-block mb-2 text-primary"><b
                                style="color: #DA2513;">{{ $c->nombre }}</b></strong>
                        <div class="d-inline-block mb-2 "><b>Duración: </b> {{ $c->duracions_id }} días
                            y {{ $c->duracions_id-1 }} noches
                        </div>
                        <div class="d-inline-block mb-2 "><b>Itinerario: </b> {{ $c->itinerario }}</div>
                        <div class="mb-1 visibleresponsive">
                            USD {{$c->precio_desde}}
                        </div>
                        <a href="{{ route('home.detalles-circuitos', $c->id) }}" class="stretched-link ">
                        </a>
                    </div>
                </div>
                <a href="{{ route('home.detalles-circuitos', $c->id) }}" class="stretched-link ">
                    <div class="ribbon gift">
                        <div class="theribbon ribbonprice">
                            USD {{$c->precio_desde}}
                        </div>
                        <div class="ribbon-background ">
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
    {{ $circuitos->links() }}
@endif

