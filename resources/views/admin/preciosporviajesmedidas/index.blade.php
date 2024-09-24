@extends('layouts.admin')
@section('content')
    @include('admin.delete')
    <section class="content-header">
        <a class="btn btn-primary btn-sm pull-right"
           href="{{route('admin.content.precios-por-viajes-medidas.create')}}">
            <i class="fas fa-plus"></i> Adicionar
        </a>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Listado de Precios x Termporada de Viajes a la Medida</h3>
                    </div>
                    <div class="card-body table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Fecha de Inicio</th>
                                <th>Fecha Fin</th>
                                <th>Precios x Pax</th>
                                <th>Actualizado</th>
                                <th>Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($preciosporviajesmedida as $precioporviajemedida)
                                <tr>
                                    <td>{{ \Carbon\Carbon::parse($precioporviajemedida->fecha_inicio)->format('d/m/Y')}}</td>
                                    <td>{{ \Carbon\Carbon::parse($precioporviajemedida->fecha_fin)->format('d/m/Y')}}</td>
                                    <td>{{ $precioporviajemedida->precio_x_pax}}</td>
                                    <td>{{ \Carbon\Carbon::parse($precioporviajemedida->updated_at)->format('d/m/Y') }}</td>
                                    <td style="width: 120px;">
                                        @can('precios-por-viajes-medidas.edit')
                                            <a href="{{route('admin.content.precios-por-viajes-medidas.edit', $precioporviajemedida->preciosId)}}"
                                               class="btn-info btn-sm" data-toggle="tooltip" title="Editar"><i
                                                    class="fas fa-pencil-alt"></i></a>
                                        @endcan
                                        @can('precios-por-viajes-medidas.destroy')
                                            <a href="" data-toggle="modal"
                                               data-route="{{route('admin.content.precios-por-viajes-medidas.destroy', $precioporviajemedida->preciosId)}}"
                                               data-target="#modal-delete" class="btn btn-danger btn-sm"
                                               data-toggle="tooltip" title="Eliminar"><i class="fas fa-trash"></i></a>
                                        @endcan
                                        @can('precios-por-viajes-medidas.show')
                                            <a href="{{route('admin.content.precios-por-viajes-medidas.show', $precioporviajemedida->preciosId)}}"
                                               class="btn btn-primary btn-sm" data-toggle="tooltip"
                                               title="Ver Detalles"><i class="fas fa-eye"></i></a>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    <!--<div class="row" >
                            <div class="col-12">
                                <div class="fa-pull-left float-left">
                                    <a href="{{route('admin.content.hoteles.index')}}"  class="btn btn-primary ">Ir Atras
                                    </a>
                                </div>
                            </div>
                        </div>-->
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
