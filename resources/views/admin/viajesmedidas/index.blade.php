@extends('layouts.admin')
@section('content')
    @include('admin.delete')
    <section class="content-header">
        <a class="btn btn-primary btn-sm pull-right" href="{{route('admin.content.viajes-medidas.create')}}">
            <i class="fas fa-plus"></i> Adicionar
        </a>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Listado de Viajes a la Medida</h3>
                    </div>
                    <div class="card-body table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Provincia</th>
                                <th>Autor</th>
                                <th>Actualizado</th>
                                <th >Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($viajesmedidas as $viajesmedida)
                                <tr>
                                    <td>{{ $viajesmedida->nombre}}</td>
                                    <td>{{ $viajesmedida->provincia}}</td>
                                    <td>{{ $viajesmedida->created_by}}</td>
                                    <td>{{ \Carbon\Carbon::parse($viajesmedida->updated_at)->format('d/m/Y') }}</td>
                                    <td style="width: 120px;">
                                            @can('viajes-medidas.edit')
                                                <a href="{{route('admin.content.viajes-medidas.edit', $viajesmedida->id)}}" class="btn-info btn-sm" data-toggle="tooltip" title="Editar"><i class="fas fa-pencil-alt"></i></a>
                                            @endcan
                                            @can('viajes-medidas.destroy')
                                                <a href="" data-toggle="modal" data-route="{{route('admin.content.viajes-medidas.destroy', $viajesmedida->id)}}" data-target="#modal-delete" class="btn btn-danger btn-sm" data-toggle="tooltip" title="Eliminar"><i class="fas fa-trash"></i></a>
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