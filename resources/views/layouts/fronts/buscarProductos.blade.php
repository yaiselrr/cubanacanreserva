<form id="searchForm" role="form" method="get" enctype="multipart/form-data"
      action="{{ route('home.search')}}">
{{--    @csrf--}}
    <div class="row " id="formulario">
        <div class="col-md-1"></div>
        <div class="col-md-3">
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text text-danger" style="background-color: #DA2513"><i
                                class="nav-icon fas fa-map-marker-alt" style="color: #fff"></i></span>
                    </div>
                    @php
                        $destinoSelected = app('request')->input('destino');
                        $productSelected = app('request')->input('producto');
                        $fechaSelected = app('request')->input('fecha');
                    @endphp

                    {{--                <input type="text" class="form-control" name="destino" placeholder="Destino ">--}}
                    <select class="form-control select2bs4 select2-hidden-accessible" name="destino" id="destino">
                        <option value="-1">Destino</option>
                        @foreach($destinos as $destino)
                            <option value="{{ $destino->id }}" @if($destino->id == $destinoSelected) selected @endif>{{$destino->provincia}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

        </div>
        <div class="col-md-3">
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" style="background-color: #DA2513"><i class="nav-icon fas fa-tag"
                                                                                            style="color: #fff"></i></span>
                    </div>
                    {{--                <input type="text" class="form-control" name="producto" placeholder="Producto ">--}}
                    <select class="form-control select2bs4 select2-hidden-accessible" name="producto" id="producto">
                        <option value="-1">Productos</option>
                        <option value="circuito" @if($productSelected == 'circuito') selected @endif>Circuitos</option>
                        <option value="excursion" @if($productSelected == 'excursion') selected @endif>Excursiones</option>
                        <option value="hotel" @if($productSelected == 'hotel') selected @endif>Hoteles</option>
                        <option value="evento" @if($productSelected == 'evento') selected @endif>Eventos</option>
                        <option value="viaje" @if($productSelected == 'viaje') selected @endif>Viajes a la medida</option>

                    </select>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" style="background-color: #DA2513"><i class="far fa-calendar-alt"
                                                                                            style="color: #fff"></i></span>
                    </div>
                    <input type="date" class="form-control" name="fecha" id="fecha" value="{{ $fechaSelected }}">
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <button type="submit" class="btn botones" id="btn_search" style="background: #DA2513;color: #fff;">
                    Buscar
                </button>
            </div>
        </div>
    </div>
</form>

<hr class="featurette-divider" id="divisor">

@section('custom_js')
    <script type="text/javascript" src="{{asset('assets/js/search.js')}}"></script>
@endsection
