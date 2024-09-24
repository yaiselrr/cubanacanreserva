@extends('layouts.admin')

@section('content')
    <!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <a href="{{ route('admin.content.privadosimport.create') }}"
           class="btn btn-primary btn-sm pull-right"> <i class="fas fa-plus">
            </i> Adicionar</a>
    </section>


    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                @if (session('notificacion'))

                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h5><i class="icon fas fa-check"></i> Congratulaciones!</h5>
                        {{ session('notificacion') }}
                    </div>

                @endif
                @if (session('notificacionerror'))

                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h5><i class="icon fas fa-check"></i> Ha ocurrido un error</h5>
                        {{ session('notificacionerror') }}
                    </div>

                @endif

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Listado de Traslado Privado</h3>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Id</th>


                                <th>Origen</th>
                                <th>Destino</th>

                                <th>Creado</th>
                                <th>Actualizado</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($privados as $key => $c)
                                <tr>
                                    <td>{{ ++$key }}</td>

                                    <th>{{ $c->origen }}</th>
                                    <th>{{ $c->destino }}</th>
                                    <td>{{ $c->created_at }}</td>
                                    <td>{{ $c->updated_at }}</td>
                                </tr>

                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
    </div>
@endsection

