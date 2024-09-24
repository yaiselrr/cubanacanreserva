@extends('layouts.admin')
@section('content')
    @include('admin.delete')
    <section class="content-header">
        <a class="btn btn-primary btn-sm pull-right" href="{{route('admin.manager.roles.create')}}">
            <i class="fas fa-plus"></i> Adicionar
        </a>
    </section>
    <section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Listado de Roles</h3>
                </div>
                <div class="card-body table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Rol</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($roles as $role)
                            <tr>
                                <td>{{ $role->nombre }}</td>
                                <td style="width: 130px;">
                                    @can('roles.edit')
                                        <a href="{{route('admin.manager.roles.edit', $role->id)}}" class="btn btn-info"><i class="fas fa-pencil-alt"></i></a>
                                    @endcan
                                    @can('roles.destroy')
                                            @if(Auth::user()->rol->id == $role->id)
                                                <button class="btn btn-default" disabled><i class="fa fa-trash"></i></button>
                                            @else
                                                <a href="" data-toggle="modal" data-route="{{route('admin.manager.roles.destroy', $role->id)}}" data-target="#modal-delete" class="btn btn-danger"><i class="fas fa-trash"></i></a>
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