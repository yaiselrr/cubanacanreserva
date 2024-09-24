@extends('layouts.admin')
@section('content')
    @include('admin.delete')
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Detalles de Precios x Termporada de Viajes a la Medida</h3>
                    </div>
                    <div class="card-body table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Fecha de Inicio</th>
                                <th>Fecha Fin</th>
                                <th>Capacidad</th>
                                <th>Precios x Pax</th>
                                <th>Precio niños (2 a 12 años)</th>
                                <th>Días de Antelación Reserva</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>{{ \Carbon\Carbon::parse($preciosporviajesmedida->fecha_inicio)->format('d/m/Y')}}</td>
                                <td>{{ \Carbon\Carbon::parse($preciosporviajesmedida->fecha_fin)->format('d/m/Y')}}</td>
                                <td>{{ $preciosporviajesmedida->capacidad}}</td>
                                <td>{{ $preciosporviajesmedida->precio_x_pax}}</td>
                                <td>{{ $preciosporviajesmedida->precio_ninnos_12annos}}</td>
                                <td>{{ $preciosporviajesmedida->dias_antelacion_reserva}}</td>
                            </tr>
                            </tbody>
                        </table>
                        <br>
                        <div class="row">
                            <div class="col-12">
                                <div class="fa-pull-right float-right">
                                    <a href="{{route('admin.content.precios-por-viajes-medidas.index')}}"
                                       class="btn btn-primary ">Ir Atras
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
