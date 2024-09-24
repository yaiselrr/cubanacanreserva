@extends('layouts.admin')
@section('content')
    @include('admin.delete')
    <section class="content-header">
        @if(count($quienessomos)<=0)
            <a class="btn btn-primary btn-sm pull-right" href="{{route('admin.content.quienes-somos.create')}}">
                <i class="fas fa-plus"></i> Adicionar
            </a>
        @endif
            <!--<div class="row mb-2">
                <div class="col-sm-6">
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
                        <li class="breadcrumb-item active">Adicionar Carrusel</li>
                    </ol>
                </div>
            </div>-->
    </section>
<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Quienes Somos</h3>

                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Título</th>
                            <th>Imagen</th>
                            <th>Autor</th>
                            <th>Actualizado</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($quienessomos as $quienes)

                            <tr>
                                <td>{{ $quienes->titulo}}</td>
                                <td><img src="{{asset('/storage/'.$quienes->imagen)}}" class="img-circle img-thumbnail " width="75px"
                                         height="75px" alt="Imagen"></td>
                                <td>{{ $quienes->created_by}}</td>
                                <td>{{ \Carbon\Carbon::parse($quienes->updated_at)->format('d/m/Y') }}</td>
                                <td style="width: 120px;">
                                        @can('quienes-somos.edit')
                                            <a href="{{route('admin.content.quienes-somos.edit', $quienes->id)}}" class="btn btn-info btn-sm" data-toggle="tooltip" title="Editar"><i class="fas fa-pencil-alt"></i></a>
                                        @endcan
                                        @can('quienes-somos.destroy')
                                            <a href="" data-toggle="modal" data-route="{{route('admin.content.quienes-somos.destroy', $quienes->id)}}" data-target="#modal-delete" class="btn btn-danger btn-sm" data-toggle="tooltip" title="Eliminar"><i class="fas fa-trash"></i></a>

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