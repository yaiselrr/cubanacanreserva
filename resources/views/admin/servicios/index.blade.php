@extends('layouts.admin')
@section('content')
    @include('admin.delete')
    <section class="content-header">
        @if(count($servicios)<=0)
            <a class="btn btn-primary btn-sm pull-right" href="{{route('admin.content.servicios.create')}}">
                <i class="fas fa-plus"></i> Adicionar
            </a>
        @endif
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Servicio</h3>
                    </div>
                    <div class="card-body table-responsive">
                        <table id="example1" class="table table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Autor</th>
                                <th>Actualizado</th>
                                <th>Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($servicios as $servicio)
                                <tr>
                                    <td>{{ $servicio->created_by }}</td>
                                    <td>{{ \Carbon\Carbon::parse($servicio->updated_at)->format('d/m/Y') }}</td>
                                    <td style="width: 5px;">
                                            @can('servicios.edit')
                                                <a href="{{route('admin.content.servicios.edit', $servicio->id)}}" class="btn btn-info btn-sm" data-toggle="tooltip" title="Editar"><i class="fas fa-pencil-alt"></i></a>
                                            @endcan
                                            @can('servicios.destroy')
                                                <a href="" data-toggle="modal" data-route="{{route('admin.content.servicios.destroy', $servicio->id)}}" data-target="#modal-delete" class="btn btn-danger btn-sm" data-toggle="tooltip" title="Eliminar"><i class="fas fa-trash"></i></a>
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