@extends('layouts.admin')

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-10">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Importar Datos de Traslado Privado</h3>
                    </div>
                    <div class="card-body">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;
                                </button>
                                <h5><i class="icon fas fa-check"></i> Atención lea las siguientes indicaciones</h5>
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>
                                            {{ $error }}
                                        </li>
                                    @endforeach
                                </ul>
                            </div>

                        @endif
                            <form action="{{ url('importarpri-excel') }}" method="POST" name="importform"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Tarifario</label>
                                    <input type="file" name="tarifario" id="tarifario" >
                                </div>
                                <br>
                                <button class="btn btn-success">Importar Archivo</button>
                            </form>

                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>

        </div>
        <div class="row">
            <div class="col-10">
                <a href="" data-toggle="modal" data-target="#modal-cancel" class="btn btn-secondary btn-sm">Cancelar</a>
                
            </div>
        </div>
    </section>
    <!-- /.content -->

    <!-- /.content-wrapper -->

@endsection