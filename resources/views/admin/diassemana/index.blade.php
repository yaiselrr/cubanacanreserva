@extends('layouts.admin')
@section('content')
    @include('admin.delete')
    <section class="content-header">
        <a class="btn btn-primary btn-sm pull-right" href="{{route('admin.nomenclator.dias-semana.create')}}">
            <i class="fas fa-plus"></i> Adicionar
        </a>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Listado de Días de la Semana</h3>

                    </div>
                    <div class="card-body table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Dias de la Semana</th>
                                <th>Actualizado</th>
                                <th>Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($diassemana as $dias)
                                <tr>
                                    <td>{{ $dias->diassemana }}</td>
                                    <td>{{ \Carbon\Carbon::parse($dias->updated_at)->format('d/m/Y') }}</td>
                                    <td style="width: 120px;">
                                            @can('dias-semana.edit')
                                                <a href="{{route('admin.nomenclator.dias-semana.edit', $dias->id)}}" class="btn btn-info btn-sm" data-toggle="tooltip" title="Editar"><i class="fas fa-pencil-alt"></i></a>
                                            @endcan
                                            @can('dias-semana.destroy')
                                                <a href="" data-toggle="modal" data-route="{{route('admin.nomenclator.dias-semana.destroy', $dias->id)}}" data-target="#modal-delete" class="btn btn-danger btn-sm" data-toggle="tooltip" title="Eliminar"><i class="fas fa-trash"></i></a>
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