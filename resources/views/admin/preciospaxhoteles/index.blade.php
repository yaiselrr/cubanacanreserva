@extends('layouts.admin')
@section('content')
    @include('admin.delete')
    <section class="content-header">
        <a class="btn btn-primary btn-sm pull-right" href="{{route('admin.content.precios-pax-hotel.create')}}">
            <i class="fas fa-plus"></i> Adicionar
        </a>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Listado de Precios Pax del Hotel</h3>
                    </div>
                    <div class="card-body table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Fecha de Inicio</th>
                                <th>Fecha Fin</th>
                                <th>Autor</th>
                                <th>Actualizado</th>
                                <th>Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($preciospaxhoteles as $preciospaxhotele)
                                <tr>
                                    <td>{{ \Carbon\Carbon::parse($preciospaxhotele->fecha_inicio)->format('d/m/Y')}}</td>
                                    <td>{{ \Carbon\Carbon::parse($preciospaxhotele->fecha_fin)->format('d/m/Y')}}</td>
                                    <td>{{ $preciospaxhotele->created_by}}</td>
                                    <td>{{ \Carbon\Carbon::parse($preciospaxhotele->updated_at)->format('d/m/Y') }}</td>
                                    <td style="width: 120px;">
                                        @can('precios-pax-hotels.edit')
                                            <a href="{{route('admin.content.precios-pax-hotel.edit', $preciospaxhotele->preciosId)}}"
                                               class="btn btn-info btn-sm" data-toggle="tooltip" title="Editar"><i
                                                    class="fas fa-pencil-alt"></i></a>
                                        @endcan
                                        @can('precios-pax-hotels.destroy')
                                            <a href="" data-toggle="modal"
                                               data-route="{{route('admin.content.precios-pax-hotel.destroy', $preciospaxhotele->preciosId)}}"
                                               data-target="#modal-delete" class="btn btn-danger btn-sm"
                                               data-toggle="tooltip" title="Eliminar"><i class="fas fa-trash"></i></a>
                                        @endcan
                                        @can('precios-pax-hotels.show')
                                            <a href="{{route('admin.content.precios-pax-hotel.show', $preciospaxhotele->preciosId)}}"
                                               class="btn btn-primary btn-sm" data-toggle="tooltip"
                                               title="Ver Detalles"><i class="fa fa-eye"></i></a>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
