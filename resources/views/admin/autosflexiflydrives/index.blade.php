@extends('layouts.admin')
@section('content')
    @include('admin.delete')
    <section class="content-header">
        <a class="btn btn-primary btn-sm pull-right" href="{{route('admin.content.autos-flexifly-drive.create')}}">
            <i class="fas fa-plus"></i> Adicionar
        </a>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Listado de Autos Flexi Fly & Drive</h3>
                    </div>
                    <div class="card-body table-responsive">
                        <table id="example1" class="table table-bordered table-striped ">
                            <thead>
                            <tr>
                                <th>Tipo</th>
                                <th>Capacidad</th>
                                <th>Autor</th>
                                <th>Actualizado</th>
                                <th >Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($autosflexiflydrive as $autosflexifly)
                                <tr>
                                    <td>{{ $autosflexifly->tipo}}</td>
                                    <td>{{ $autosflexifly->capacidad_pasajero}}</td>
                                    <td>{{ $autosflexifly->created_by}}</td>
                                    <td>{{ \Carbon\Carbon::parse($autosflexifly->updated_at)->format('d/m/Y') }}</td>
                                    <td style="width: 120px;">
                                        <div class="btn-group btn-group-sm">
                                            @can('autos-flexifly-drive.edit')
                                                <a href="{{route('admin.content.autos-flexifly-drive.edit', $autosflexifly->id)}}" class="btn btn-info btn-sm" data-toggle="tooltip" title="Editar"><i class="fas fa-pencil-alt"></i></a>
                                            @endcan
                                            @can('autos-flexifly-drive.destroy')
                                                <a href="" data-toggle="modal" data-route="{{route('admin.content.autos-flexifly-drive.destroy', $autosflexifly->id)}}" data-target="#modal-delete" class="btn btn-danger btn-sm" data-toggle="tooltip" title="Eliminar"><i class="fas fa-trash"></i></a>
                                            @endcan
                                        </div>
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