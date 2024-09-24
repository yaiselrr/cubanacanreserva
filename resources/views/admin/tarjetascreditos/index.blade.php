@extends('layouts.admin')
@section('content')
    @include('admin.delete')
    <section class="content-header">
        <a class="btn btn-primary btn-sm pull-right" href="{{route('admin.content.tarjeta-credito.create')}}">
            <i class="fas fa-plus"></i> Adicionar
        </a>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Listado de Tarjetas de Créditos</h3>
                    </div>
                    <div class="card-body table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Imagen</th>
                                <th>Autor</th>
                                <th>Actualizado</th>
                                <th>Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($tarjetacreditos as $tarjetacredito)
                                <tr>
                                    <td>{{ $tarjetacredito->nombre }}</td>
                                    <td><img src="{{asset('/storage/'.$tarjetacredito->imagen)}}" class="img-circle img-thumbnail" width="75px"
                                             height="75px" alt="Imagen"></td>
                                    <td>{{ $tarjetacredito->created_by }}</td>
                                    <td>{{ \Carbon\Carbon::parse($tarjetacredito->updated_at)->format('d/m/Y') }}</td>
                                    <td style="width: 120px;">
                                            @can('tarjeta-credito.edit')
                                                <a href="{{route('admin.content.tarjeta-credito.edit', $tarjetacredito->id)}}" class="btn btn-info btn-sm" data-toggle="tooltip" title="Editar"><i class="fas fa-pencil-alt"></i></a>
                                            @endcan
                                            @can('tarjeta-credito.destroy')
                                                <a href="" data-toggle="modal" data-route="{{route('admin.content.tarjeta-credito.destroy', $tarjetacredito->id)}}" data-target="#modal-delete" class="btn btn-danger btn-sm" data-toggle="tooltip" title="Eliminar"><i class="fas fa-trash"></i></a>
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