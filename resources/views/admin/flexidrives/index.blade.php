@extends('layouts.admin')
@section('content')
    @include('admin.delete')
    <section class="content-header">
        @if(count($flexidrives)<=0)
            <a class="btn btn-primary btn-sm pull-right" href="{{route('admin.content.flexi-drive.create')}}">
                <i class="fas fa-plus"></i> Adicionar
            </a>
        @endif
    </section>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Listado de Flexi & Drive</h3>

                </div>
                <div class="card-body table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Días de Antelación Temp Baja</th>
                            <th>Días de Antelación Temp Alta</th>
                            <th>Imagen</th>
                            <th>Autor</th>
                            <th>Actualizado</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($flexidrives as $flexidrive)

                            <tr>
                                <td>{{ $flexidrive->dias_antelacion_rese_baja_id}}</td>
                                <td>{{ $flexidrive->dias_antelacion_rese_alta_id}}</td>
                                <td><img src="{{asset('/storage/'.$flexidrive->imagen)}}"class="img-circle img-thumbnail " width="75px"
                                         height="75px" alt="Imagen"></td>
                                <td>{{ $flexidrive->created_by}}</td>
                                <td>{{ \Carbon\Carbon::parse($flexidrive->updated_at)->format('d/m/Y') }}</td>
                                <td style="width: 120px;">
                                        @can('flexi-drive.edit')
                                            <a href="{{route('admin.content.flexi-drive.edit', $flexidrive->id)}}" class="btn btn-info btn-sm" data-toggle="tooltip" title="Editar"><i class="fas fa-pencil-alt"></i></a>
                                        @endcan
                                        @can('flexi-drive.destroy')
                                            <a href="" data-toggle="modal" data-route="{{route('admin.content.flexi-drive.destroy', $flexidrive->id)}}" data-target="#modal-delete" class="btn btn-danger btn-sm" data-toggle="tooltip" title="Eliminar"><i class="fas fa-trash"></i></a>

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