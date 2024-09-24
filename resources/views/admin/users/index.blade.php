@extends('layouts.admin')
@section('content')
    @include('admin.delete')
    <section class="content-header">
        <a class="btn btn-primary btn-sm pull-right" href="{{route('admin.manager.users.create')}}">
            <i class="fas fa-plus"></i> Adicionar
        </a>
    </section>
    <section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Listado de Usuarios</h3>
                </div>
                <div class="card-body table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Nombre y apellidos</th>
                            <th>Correo electrónico</th>
                            <th>Rol</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->rol->nombre }}</td>
                                <td style="width: 150px;">
                                    @can('users.edit')
                                        <a href="{{route('admin.manager.users.edit', $user->id)}}" class="btn btn-info btn-sm" data-toggle="tooltip" title="Editar"><i class="fas fa-pencil-alt"></i></a>
                                    @endcan
                                        @can('users.edit')
                                            <a href="{{route('admin.manager.users.password-reset', $user->id)}}" class="btn btn-primary btn-sm" data-toggle="tooltip" title="Editar Contraseña"><i class="fa fa-key"></i></a>
                                        @endcan
                                        @can('users.destroy')
                                            @if(Auth::user()->id == $user->id)
                                                <button class="btn btn-default" disabled><i class="fa fa-trash"></i></button>
                                              @else
                                                <a href="" data-toggle="modal" data-route="{{route('admin.manager.users.destroy', $user->id)}}" data-target="#modal-delete" class="btn btn-danger  btn-sm" data-toggle="tooltip" title="Eliminar"><i class="fas fa-trash"></i></a>
                                               @endif
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