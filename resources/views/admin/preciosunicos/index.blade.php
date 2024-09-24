@extends('layouts.admin')
@section('content')
    @include('admin.delete')
    <section class="content-header">
        @if(count($transfers)<=0)
            <a class="btn btn-primary btn-sm pull-right" href="{{route('admin.content.preciosunicos.create')}}">
                <i class="fas fa-plus"></i> Adicionar
            </a>
        @endif
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Información de Transfer Colectivo Precio Unico</h3>

                    </div>
                    <!-- /.box-header -->
                    <div class="card-body table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Dias Antelacion</th>
                                <th>Actualizado</th>
                                <th>Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($transfers as $transfer)
                                <tr>
                                    <td>{{ $transfer->dias_antelacion }}</td>
                                    <td>{{ \Carbon\Carbon::parse($transfer->updated_at)->format('d/m/Y') }}</td>
                                    <td style="width: 120px;">
                                        <!--<div class="btn-group btn-group-sm">-->

                                            <a href="{{route('admin.content.preciosunicos.edit', $transfer->id)}}" class="btn btn-info btn-sm" data-toggle="tooltip" title="Editar"><i class="fas fa-pencil-alt"></i></a>


                                            <a href="" data-toggle="modal" data-route="{{route('admin.content.preciosunicos.destroy', $transfer->id)}}" data-target="#modal-delete" class="btn btn-danger btn-sm" data-toggle="tooltip" title="Eliminar"><i class="fas fa-trash"></i></a>

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