@extends('layouts.fronts.assest')
@section('header')
    @include('layouts.fronts.header')
@endsection
@section('navbar')
    @include('layouts.fronts.navbar')
@endsection
@section('content')
    <br>
    <br>
    <div class="row col-md-12" align="center">
        <img src="{{asset('assets/img/quienes somos.png')}}">
    </div>
    <br>
    @foreach($quienessomos as $quienessomo)
        <div class="col-md-12" align="center">
            <img src="{{asset('/storage/'.$quienessomo->imagen)}}">
        </div>
        <div class="col-md-12 mt-4" align="center">
            <p class="card-text mb-auto">
                {!! nl2br(html_entity_decode( $quienessomo->descripcion)) !!}

            </p>
        </div>
    @endforeach
    <div class="row col-md-12" align="center" style="margin-top: 30px">
        <img src="{{asset('assets/img/oficinas comerciales en quienes somos.png')}}">
    </div>
    <div class="row" id="bloques1">
        @foreach($oficinas as $oficina)
            @include('home.buros-modal')
            <div class="col-md-4">
                <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static" align="center">
                        <strong class="d-inline-block mb-2 text-primary">Oficina
                            Comercial {{$oficina->nombre}}</strong>
                        <div class="mb-1">
                            <i class="nav-icon fas fa-map-marker-alt"
                               style="color: #2A4660"></i> {{$oficina->direccion}}
                        </div>
                        <div class="mb-1">
                            <i class="nav-icon fas fa-phone-alt" style="color: #2A4660"></i> {{$oficina->telefono}}
                        </div>
                        <a href="" data-toggle="modal" data-target="#buros-modal-{{$oficina->id}}"
                           class="stretched-link">
                            Buros de Ventas
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="card-footer clearfix">
        <nav aria-label="Contacts Page Navigation">
            <ul class="pagination justify-content-center m-0">
                {{$oficinas->render()}}
            </ul>
        </nav>
    </div>
@endsection
@section('jscript')
    <script type="text/javascript">

        var buros = [];
        @foreach ($buros as $buro )
        buros.push(@json($buro));
        @endforeach

        /*$('#buro-modal').on('show.bs.modal', function (e) {
            noElementosMostrar();
        });*/

        function noElementosMostrar() {
            $('#listado_buros tbody').html('');
            var oficina_id = $('#oficina_id').val();

            if (buros.length == 0) {
                let tr = document.createElement('tr');
                let td = document.createElement('td');
                td.colSpan = 3;
                td.align = 'center';
                td.appendChild(document.createTextNode('No existen buros de ventas a mostrar'));
                tr.appendChild(td);
                $('#listado_buros tbody').append(tr);

            }
            else {
                for (var i = 0; i <= buros.length - 1; i++) {
                    if(buros[i].id == oficina_id ){

                        let tr = document.createElement('tr');

                        let tdnombre = document.createElement('td');
                        tdnombre.appendChild(document.createTextNode(buros[i].nombre));

                        let tddireccion = document.createElement('td');
                        tddireccion.appendChild(document.createTextNode(buros[i].direccion));

                        let tdtelefono = document.createElement('td');
                        tdtelefono.appendChild(document.createTextNode(buros[i].telefono));

                        tr.appendChild(tdnombre);
                        tr.appendChild(tddireccion);
                        tr.appendChild(tdtelefono);

                        $('#listado_buros tbody').append(tr);
                    }
                }
            }
        };
    </script>
@endsection