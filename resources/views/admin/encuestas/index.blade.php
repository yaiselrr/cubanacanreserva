@extends('layouts.admin')
@section('content')
    @include('admin.delete')
    <section class="content-header">
        <a class="btn btn-primary btn-sm pull-right" href="{{route('admin.content.encuestas.create')}}">
            <i class="fas fa-plus"></i> Adicionar
        </a>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Listado de Encuestas</h3>

                    </div>
                    <!-- /.box-header -->
                    <div class="card-body table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Pregunta</th>
                                <th>Autor</th>
                                <th>Actualizado</th>
                                <th >Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($encuestas as $encuesta)
                                <tr>
                                    <td>{{ $encuesta->pregunta}}</td>
                                    <td>{{ $encuesta->created_by}}</td>
                                    <td>{{ \Carbon\Carbon::parse($encuesta->updated_at)->format('d/m/Y') }}</td>
                                    <td style="width: 120px;">
                                            @can('encuestas.edit')
                                                <a href="{{route('admin.content.encuestas.edit', $encuesta->id)}}" class="btn btn-info btn-sm" data-toggle="tooltip" title="Editar"><i class="fas fa-pencil-alt"></i></a>
                                            @endcan
                                            @can('encuestas.destroy')
                                                <a href="" data-toggle="modal" data-route="{{route('admin.content.encuestas.destroy', $encuesta->id)}}" data-target="#modal-delete" class="btn btn-danger btn-sm" data-toggle="tooltip" title="Eliminar"><i class="fas fa-trash"></i></a>
                                            @endcan
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