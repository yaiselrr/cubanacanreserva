@extends('layouts.admin')
@section('content')
    @include('admin.delete')
    <section class="content-header">
        <a class="btn btn-primary btn-sm pull-right" href="{{route('admin.content.hoteles.create')}}">
            <i class="fas fa-plus"></i> Adicionar
        </a>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Listado de Hoteles</h3>
                    </div>
                    <div class="card-body table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Categoría</th>
                                <th>Dirección</th>
                                <th>Precio</th>
                                <th>Autor</th>
                                <th>Actualizado</th>
                                <th>Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($hoteles as $hotel)
                                <tr>
                                    <td>{{ $hotel->nombre}}</td>
                                    <td>{{ $hotel->categoria}}</td>
                                    <td>{{ $hotel->direccion}}</td>
                                    <td>{{ $hotel->precio_desde}}</td>
                                    <td>{{ $hotel->created_by}}</td>
                                    <td>{{ \Carbon\Carbon::parse($hotel->updated_at)->format('d/m/Y') }}</td>
                                    <td style="width: 120px;">
                                        @can('hoteles.edit')
                                            <a href="{{route('admin.content.hoteles.edit', $hotel->id)}}"
                                               class="btn btn-info btn-sm" data-toggle="tooltip" title="Editar"><i
                                                    class="fas fa-pencil-alt"></i></a>
                                        @endcan
                                        @can('hoteles.destroy')
                                            <a href="" data-toggle="modal"
                                               data-route="{{route('admin.content.hoteles.destroy', $hotel->id)}}"
                                               data-target="#modal-delete" class="btn btn-danger btn-sm"
                                               data-toggle="tooltip" title="Eliminar"><i class="fas fa-trash"></i></a>
                                        @endcan
                                        @can('precios-pax-hotels1.index')
                                            <a href="{{route('admin.content.precios-pax-hotel.index', $hotel->id)}}"
                                               class="btn btn-success btn-sm"><i class="fa fa-toolbox"></i></a>
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
