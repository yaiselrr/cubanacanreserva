@extends('layouts.admin')
@section('content')
    @include('admin.delete')
    <section class="content-header">
        <a class="btn btn-primary btn-sm pull-right" href="{{route('admin.content.hotel-flexy-drive.create')}}">
            <i class="fas fa-plus"></i> Adicionar
        </a>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Listado de Hoteles de Flexy & Drive</h3>
                    </div>
                    <div class="card-body table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Nombre de Hotel</th>
                                <th>Provincia</th>
                                <th>Cantidad Habitaciones dobles</th>
                                <th>Autor</th>
                                <th>Actualizado</th>
                                <th>Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($hotelflexydrives as $hotelflexydrive)
                                <tr>
                                    <td>{{ $hotelflexydrive->nombre}}</td>
                                    <td>{{ $hotelflexydrive->provincia}}</td>
                                    <td>{{ $hotelflexydrive->cantidad_habitaciones_dobles}}</td>
                                    <td>{{ $hotelflexydrive->created_by}}</td>
                                    <td>{{ \Carbon\Carbon::parse($hotelflexydrive->updated_at)->format('d/m/Y') }}</td>
                                    <td style="width: 120px;">
                                        @can('hoteles-flexy-drive.edit')
                                            <a href="{{route('admin.content.hotel-flexy-drive.edit', $hotelflexydrive->flexydriveId)}}"
                                               class="btn btn-info btn-sm" data-toggle="tooltip" title="Editar"><i
                                                    class="fas fa-pencil-alt"></i></a>
                                        @endcan
                                        @can('hoteles-flexy-drive.destroy')
                                            <a href="" data-toggle="modal"
                                               data-route="{{route('admin.content.hotel-flexy-drive.destroy', $hotelflexydrive->flexydriveId)}}"
                                               data-target="#modal-delete" class="btn btn-danger btn-sm"
                                               data-toggle="tooltip" title="Eliminar"><i class="fas fa-trash"></i></a>
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
