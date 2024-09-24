@extends('layouts.admin')
@section('content')
    @include('admin.cancel', ['route'=>route('admin.content.colectivos.index')])
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-10">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Datos Traslado Colectivo</h3>
                    </div>
                    <div class="card-body">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
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
                        <form action="{{ route('admin.content.colectivos.store') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="dias_antelacion">Días Antelación</label>
                                <select class="form-control" name="dias_antelacion" id="dias_antelacion">
                                    <option value="">--Seleccionar--</option>
                                    <option value="0">0</option>
                                    <option value="10">10</option>
                                    <option value="20">20</option>
                                    <option value="30">30</option>
                                    <option value="50">50</option>
                                    <option value="80">80</option>
                                    <option value="100">100</option>
                                </select>

                            </div>
                            <div class="form-group">
                                <label>Tarifario</label>
                                <input type="file" name="tarifario" id="tarifario" value="{{ old('tarifario') }}" placeholder="Tarifario">
                            </div>

                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>

        </div>
        <div class="row">
            <div class="col-10">
                <button type="submit" class="btn btn-app"> <i class="fas fa-save"></i>Guardar</button>
                <a type="button" class="btn btn-app" data-toggle="modal" data-target="#modal-cancel"><i class="fas fa-times-circle"></i>Cancelar</a>

            </div>
        </div>
        </form>
    </section>
    <!-- /.content -->

    <!-- /.content-wrapper -->

@endsection