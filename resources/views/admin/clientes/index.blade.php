@extends('layouts.admin')
@section('content')
    @include('admin.delete')
    <section class="content-header">
            <a href="{{ route('admin.content.clientes.create') }}" class="btn btn-primary btn-sm pull-right">
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
                  <h3 class="card-title">Listado de Clientes</h3>
              </div>

            <!-- /.card-header -->
            <div class="card-body table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Id</th>
                                            <th>Nombre</th>
                                            <th>1er Apellido</th>
                                            <th>Pasaporte</th>
                                            <th>Nacionalidad</th>
                                            <th>Fecha</th>
                                            
                                            <th>Creado</th>
                                            <th>Actualizado</th>
                                            <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($clientes as $key => $c)
                                        <tr>
                                            <td>{{ ++$key }}</td>
                                            <td>{{ $c->nombre }}</td>
                                            <td>{{ $c->apaterno }}</td>
                                            <td>{{ $c->pasaporte }}</td>
                                            <td>{{ $c->nacionalidad_id }}</td>
                                            <td>{{ $c->fecha }}</td>
                                            <td>{{ $c->created_at }}</td>
                                            <td>{{ $c->updated_at }}</td>
                                            
                                            <td>
                                                
                                                
                              <a href="{{ route('admin.content.clientes.edit',$c->id) }}" class="btn btn-info btn-sm"><i class="fas fa-pencil-alt">
                              </i></a>
                              <a href="" data-toggle="modal" data-route="{{route('admin.content.clientes.destroy', $c->id )}}" data-target="#modal-delete" class="btn btn-danger btn-sm" ><i class="fas fa-trash">
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

