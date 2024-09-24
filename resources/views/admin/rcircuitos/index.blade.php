@extends('layouts.admin')
@section('content')
    <section class="content-header">
            <a href="{{ route('admin.content.rcircuitos.create') }}" class="btn btn-success btn-block">
                <i class="fas fa-plus"> </i> Adicionar
            </a>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          @if (session('notificacion'))
                  
                  <div id="toast-container" class="toast-top-right">
            <div class="toast toast-success toastsDefaultAutohide" aria-live="polite" >
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
                  <h3 class="card-title">Listado de Reservación del Circuito</h3>
              </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Id</th>
                                            <th>Tipo Hab</th>
                                            <th>Cant Adultos</th>
                                            <th>Cant Niños</th>
                                            <th>Cant Infantes</th>
                                            
                                            <th>Creado</th>
                                            <th>Actualizado</th>
                                            <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($rcircuitos as $key => $c)
                                        <tr>
                                            <td>{{ ++$key }}</td>
                                            <td>{{ $c->tipo_habitacion }}</td>
                                            <td>{{ $c->cantidad_adultos }}</td>
                                            <td>{{ $c->cantidad_ninnos }}</td>
                                            <td>{{ $c->cantidad_infantes }}</td>
                                            <td>{{ $c->created_at }}</td>
                                            <td>{{ $c->updated_at }}</td>
                                            
                                            <td>
                                                
                                                
                              <a href="{{ route('admin.content.circuitos.edit',$c->id) }}" class="btn btn-info btn-sm"><i class="fas fa-pencil-alt">
                              </i></a>
                              <a href="" data-toggle="modal" data-target="#modal-delete-{{ $c->id }}" class="btn btn-danger btn-sm" ><i class="fas fa-trash">
                              </i></a>
                            </td>
                                        </tr>
                                        @include('admin.includes.modals.modaldel')
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

