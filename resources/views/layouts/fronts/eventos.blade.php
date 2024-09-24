@if(isset($vistaeventos)=='Si')
    <div class="row col-md-12" align="center">
        <img src="{{asset('assets/img/productos,circuitos.png')}}">
    </div>
    @include('layouts.fronts.botonesproductos')
@else
    <div class="row col-md-12" align="center">
        <img src="{{asset('assets/img/circuito home.png')}}">
    </div>
@endif
@if(count($eventos)==0)

    <div class="col-md-12 no-data">No hay eventos disponibles</div>
@else
    <div class="row mb-2" id="bloques1">
        @foreach($eventos as $c)
            <div class="col-md-5" style="margin-right: 90px;" id="cuadro">
                <div class="card border-danger mb-4 shadow-sm">
                    <div class="col-md-10">
                        <div class="card-body " style="text-transform: uppercase;"><b>{{ $c->nombre }}</b></div>
                    </div>
                    <img src="{{ asset('evento/imagen/'.$c->evento->imagen) }}" class="card-img-top"
                         style="height: 200px;width: 512px;">
                    <div class="card-body">
                        <p class="card-text"><i class="far fa-calendar-alt" style="color: #868686"></i> Fecha de
                            inicio: {{ $c->evento->fecha_inicio }}</p>
                        <p class="card-text"><i class="far fa-calendar-alt" style="color: #868686"></i> Fecha de
                            fin: {{ $c->evento->fecha_fin }}</p>
                        <p class="card-text"><i class="nav-icon fas fa-map-marker-alt"
                                                style="color: #868686"></i> {{ $c->evento->lugar->nombre }}</p>
                        <p class="card-text justify-content-between">{{ $c->resumen }}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                            </div>
                            <a href="{{ route('home.detalles-eventos', $c->evento_id) }}"><i class="fas fa-arrow-right"
                                                                                             style="color: #868686"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endif
{{ $eventos->links() }}
