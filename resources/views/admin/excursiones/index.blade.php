@extends('layouts.admin')
@section('content')
    @include('admin.delete')
    <section class="content-header">
        <a class="btn btn-primary btn-sm pull-right" href="{{route('admin.content.excursiones.create')}}">
            <i class="fas fa-plus"></i> Adicionar
        </a>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Listado de Excursiones</h3>
                    </div>
                    <div class="card-body table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Modalidad</th>
                                <th>Territorio Origen</th>
                                <th>Territorio Destino</th>
                                <th>Autor</th>
                                <th>Actualizado</th>
                                <th>Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($excursiones as $excursione)
                                <tr>
                                    <td>{{ $excursione->nombre}}</td>
                                    <td>{{ $excursione->modalidad}}</td>
                                    <td>{{ $excursione->origen}}</td>
                                    <td>{{ $excursione->destino}}</td>
                                    <td>{{ $excursione->created_by}}</td>
                                    <td>{{ \Carbon\Carbon::parse($excursione->updated_at)->format('d/m/Y') }}</td>
                                    <td style="width: 120px;">
                                        @can('excursiones.edit')
                                            <a href="{{route('admin.content.excursiones.edit', $excursione->id)}}"
                                               class="btn btn-info btn-sm" data-toggle="tooltip" title="Editar"><i
                                                    class="fas fa-pencil-alt"></i></a>
                                        @endcan
                                        @can('excursiones.destroy')
                                            <a href="" data-toggle="modal"
                                               data-route="{{route('admin.content.excursiones.destroy', $excursione->id)}}"
                                               data-target="#modal-delete" class="btn btn-danger btn-sm"
                                               data-toggle="tooltip" title="Eliminar"><i class="fas fa-trash"></i></a>
                                        @endcan
                                        @can('excursiones1.index')
                                            <a href="{{route('admin.content.excursiones.index', $excursione->id)}}"
                                               class="btn btn-success btn-sm"><i class="fa fa-toolbox"></i></a>
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
