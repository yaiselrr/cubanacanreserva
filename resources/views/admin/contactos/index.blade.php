@extends('layouts.admin')
@section('content')
    @include('admin.delete')
    <section class="content-header">
        @if(count($contacts)<=0)
            <a class="btn btn-primary btn-sm pull-right" href="{{route('admin.content.contactos.create')}}">
                <i class="fas fa-plus"></i> Adicionar
            </a>
        @endif
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Información de Contacto</h3>

                    </div>
                    <!-- /.box-header -->
                    <div class="card-body table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Teléfono</th>
                                <th>Email</th>
                                <th>Direccion</th>
                                <th>Actualizado</th>
                                <th>Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($contacts as $contact)
                                <tr>
                                    <td>{{ $contact->telefono }}</td>
                                    <td>{{ $contact->email }}</td>
                                    <td>{{ $contact->direccion}}</td>
                                    <td>{{ \Carbon\Carbon::parse($contact->updated_at)->format('d/m/Y') }}</td>
                                    <td style="width: 120px;">
                                        <!--<div class="btn-group btn-group-sm">-->
                                            @can('contactos.edit')
                                                <a href="{{route('admin.content.contactos.edit', $contact->id)}}" class="btn btn-info btn-sm" data-toggle="tooltip" title="Editar"><i class="fas fa-pencil-alt"></i></a>
                                            @endcan
                                            @can('contactos.destroy')
                                                <a href="" data-toggle="modal" data-route="{{route('admin.content.contactos.destroy', $contact->id)}}" data-target="#modal-delete" class="btn btn-danger btn-sm" data-toggle="tooltip" title="Eliminar"><i class="fas fa-trash"></i></a>
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