@extends('layouts.admin')
@section('content')
    @include('admin.delete')
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Detalles de Precios Pax por temporada del Hotel</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Fecha de Inicio</th>
                                <th>Fecha Fin</th>
                                <th>Cantidad hab sencillas</th>
                                <th>Cantidad hab dobles</th>
                                <th>Cantidad hab triples</th>
                                <th>Variante 2 adultos y hasta dos niños de 2 a 12 año</th>
                                <th>Variante 1 adulto y hasta tres niños de 2 a 12 años</th>
                                <th>Variante 2 adultos y de 2 a 3 niños de 2 a 12 años</th>
                                <th>Variante 3 adultos alojados todos en una habitación</th>
                                <th>Variante 1 adulto alojado solo en una habitación</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>{{ \Carbon\Carbon::parse($hotel->fecha_inicio)->format('d/m/Y')}}</td>
                                <td>{{ \Carbon\Carbon::parse($hotel->fecha_fin)->format('d/m/Y')}}</td>
                                <td>{{ $hotel->cantidad_hab_sencillas}}</td>
                                <td>{{ $hotel->cantidad_hab_dobles}}</td>
                                <td>{{ $hotel->cantidad_hab_triples}}</td>

                                <td>
                                    @if($hotel->variante2adultos_hasta2ninnos_2a12annos)
                                        <span class="badge bg-green"><i class="fa fa-check-circle"></i></span>
                                    @else
                                        <span class="badge bg-red"><i class="fa fa-check-square"></i></span>
                                    @endif
                                </td>
                                <td>
                                    @if($hotel->variante1adulto_hasta3ninnos_2a12annos)
                                        <span class="badge bg-green"><i class="fa fa-check-circle"></i></span>
                                    @else
                                        <span class="badge bg-red"><i class="fa fa-check-square"></i></span>
                                    @endif
                                </td>
                                <td>
                                    @if($hotel->variante2adultos_2hasta3ninnos_2a12annos)
                                        <span class="badge bg-green"><i class="fa fa-check-circle"></i></span>
                                    @else
                                        <span class="badge bg-red"><i class="fa fa-check-square"></i></span>
                                    @endif
                                </td>
                                <td>
                                    @if($hotel->variante3adultos_mismahabitacion)
                                        <span class="badge bg-green"><i class="fa fa-check-circle"></i></span>
                                    @else
                                        <span class="badge bg-red"><i class="fa fa-check-square"></i></span>
                                    @endif
                                </td>
                                <td>
                                    @if($hotel->variante1adulto_mismahabitacion)
                                        <span class="badge bg-green"><i class="fa fa-check-circle"></i></span>
                                    @else
                                        <span class="badge bg-red"><i class="fa fa-check-square"></i></span>
                                    @endif
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <br>
                        <div class="row">
                            <div class="col-12">
                                <div class="fa-pull-right float-right">
                                    <a href="{{route('admin.content.precios-pax-hotel.index')}}"
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
