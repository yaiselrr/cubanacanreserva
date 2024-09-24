@extends('layouts.admin')

@section('content')
    @include('admin.delete')
   <!-- Content Wrapper. Contains page content -->
  
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <a href="{{ route('admin.content.colectivos.create') }}"
                                   class="btn btn-primary btn-sm pull-right"> <i class="fas fa-plus">
                              </i> Adicionar</a>
    </section>


    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">  
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
              <h3 class="card-title">Listado de Traslado Colectivo</h3>

            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                                            
                                            <th>Días Antelación</th>
                                            
                                            <th>Creado</th>
                                            <th>Actualizado</th>
                                            <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($colectivos as $key => $c)
                                        <tr>
                                            
                                            <th>{{ $c->dias_antelacion }}</th>
                                            <td>{{ $c->created_at }}</td>
                                            <td>{{ $c->updated_at }}</td>

                                            <td style="width: 120px;">
                                                
                                                
                              <a href="{{ route('admin.content.colectivos.edit',$c->id) }}" class="btn btn-info btn-sm"><i class="fas fa-pencil-alt">
                              </i></a>
                              <a href="" data-toggle="modal" data-route="{{route('admin.content.colectivos.destroy',  $c->id)}}" data-target="#modal-delete" class="btn btn-danger btn-sm" ><i class="fas fa-trash">
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

