@extends('layouts.admin')

@section('content')

    {{--    <div class="jumbotron jumbotron-fluid">--}}
    <div class="container">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Detalles de la reserva</div>
                <div class="card-body">
{{--                    @if($reserva->type == 'hotel' or $reserva->type == 'circuito')--}}
                        <div class="row">
                            <div class="col-4">
                                <label>Hotel: </label><span>{{$reserva->nombre}}</span>
                            </div>
                            <div class="col-4">
                                <label>Fecha de entrada: </label><span>{{$reserva->fecha}}</span>
                            </div>
                            @if($reserva->type == 'hotel')
                                <div class="col-4">
                                    <label>Habitación: </label><span>{{$reserva->habitacion}}</span>
                                </div>
                            @endif
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <label>Adultos: </label><span>{{$reserva->adultos}}</span>
                            </div>
                            <div class="col-4">
                                <label>Niños: </label><span>{{$reserva->ninnos}}</span>
                            </div>
                            <div class="col-4">
                                <label>Infantes: </label><span>{{$reserva->infantes}}</span>
                            </div>
                        </div>
{{--                    @endif--}}
                </div>
            </div>
        </div>

        {{--    </div>--}}
        <a href="{{ route('admin.content.reservas') }}" class="btn btn-secondary btn-sm">Volver</a>
    </div>

@endsection
