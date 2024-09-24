@extends('layouts.admin')

@section('content')
    @include('admin.delete')
    <!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <a href="{{ route('admin.content.lugaresrecogida.create') }}"
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
                        <h3 class="card-title">Listado de Lugares de Recogida Conectando Cuba</h3>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>

                                <th>Hotel</th>
                                <th>Hora</th>
                                <th>Area</th>
                                <th>Ruta</th>

                                <th>Creado</th>
                                <th>Actualizado</th>
                                <th>Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($lugares as $key => $c)
                                <tr>

                                    <th>{{ $c->hotel->nombre }}</th>
                                    <th>{{ $c->hora_recogida }}</th>
                                    <th>{{ $c->area }}</th>
                                    <th>{{ $c->ruta->ruta }}</th>
                                    <td>{{ $c->created_at }}</td>
                                    <td>{{ $c->updated_at }}</td>

                                    <td style="width: 120px;">


                                        <a href="{{ route('admin.content.lugaresrecogida.edit',$c->id) }}"
                                           class="btn btn-info btn-sm"><i class="fas fa-pencil-alt">
                                            </i></a>
                                        <a href="" data-toggle="modal"
                                           data-route="{{route('admin.content.lugaresrecogida.destroy',  $c->id)}}"
                                           data-target="#modal-delete" class="btn btn-danger btn-sm"><i
                                                    class="fas fa-trash">
                                            </i></a>
                                    </td>
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

