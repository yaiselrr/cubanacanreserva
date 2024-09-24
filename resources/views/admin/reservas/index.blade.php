@extends('layouts.admin')
@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                @if (session('notificacion'))

                    <div id="toast-container" class="toast-top-right">
                        <div class="toast toast-success toastsDefaultAutohide" aria-live="polite">
                            <div class="toast-message">{{ Session::get('notificacion') }}.</div>
                        </div>
                    </div>


                @endif
                @if (session('notificacionerror'))

                    <div id="toast-container" class="toast-top-right">
                        <div class="toast toast-success" aria-live="polite" style="">
                            <div class="toast-message">{{ Session::get('notificacionerror') }}.</div>
                        </div>
                    </div>

                @endif

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Listado de Reservas</h3>
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Nombre del producto</th>
                                <th>Fecha de reservación</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($reservas as $key => $r)
                                <tr>
                                    <td>{{ $r['nombre'] }}</td>
                                    <td>{{ $r['fecha'] }}</td>
                                    <td>{{ $r['estado'] }}</td>
                                    <td style="text-align: center;">
                                        <a href="{{route('admin.content.reservas-detalles',[$r['id'],$r['type']])}}"
                                           class="btn btn-primary btn-sm" data-toggle="tooltip"
                                           title="Ver Detalles"><i class="fas fa-eye"></i></a>
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

