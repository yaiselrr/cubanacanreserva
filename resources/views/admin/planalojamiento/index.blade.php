@extends('layouts.admin')
@section('content')
    @include('admin.delete')
    <section class="content-header">
        <a class="btn btn-primary btn-sm pull-right" href="{{route('admin.nomenclator.plan-alojamiento.create')}}">
            <i class="fas fa-plus"></i> Adicionar
        </a>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Listado de Planes de alojamientos</h3>

                    </div>
                    <!-- /.box-header -->
                    <div class="card-body table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Plan Alojamiento</th>
                                <th>Actualizado</th>
                                <th>Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($planalojamientos as $planalojamiento)
                                <tr>
                                    <td>{{ $planalojamiento->planalojamiento }}</td>
                                    <td>{{ \Carbon\Carbon::parse($planalojamiento->updated_at)->format('d/m/Y') }}</td>
                                    <td style="width: 120px;">
                                            @can('plan-alojamiento.edit')
                                                <a href="{{route('admin.nomenclator.plan-alojamiento.edit', $planalojamiento->id)}}" class="btn btn-info btn-sm" data-toggle="tooltip" title="Editar"><i class="fas fa-pencil-alt"></i></a>
                                            @endcan
                                            @can('plan-alojamiento.destroy')
                                                <a href="" data-toggle="modal" data-route="{{route('admin.nomenclator.plan-alojamiento.destroy', $planalojamiento->id)}}" data-target="#modal-delete" class="btn btn-danger btn-sm" data-toggle="tooltip" title="Eliminar"><i class="fas fa-trash"></i></a>
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