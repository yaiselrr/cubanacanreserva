@extends('layouts.admin')

@section('content')
    @include('admin.cancel', ['route'=>route('admin.content.privados.index')])
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Crear Traslado</h3>
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
                        <form action="{{ route('admin.content.privados.store') }}" method="post"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-12 col-sm-6 col-lg-12">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="dias_antelacion">Días Antelación</label>
                                                    <select class="form-control select2bs4"
                                                            style="width: 100%;" name="dias_antelacion"
                                                            id="dias_antelacion">
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

                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="hidden" id="chek_tipohab" name="chek_tipohab"
                                                           value="0">
                                                    <label for="tipo_traslado">Tipo de Traslado:
                                                        <small class="required" style="color: red"> *</small>
                                                    </label>
                                                    <select class="form-control select2bs4" id="tipo_traslado"
                                                            name="tipo_traslado">
                                                        <option value="">--Seleccionar--</option>
                                                        <option value="Privado">Privado</option>
                                                        <option value="Colectivo">Colectivo</option>
                                                    </select>
                                                    <span class="invalid-feedback" id="error_tipo_habitacion"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Tarifario</label>
                                                    <div class="input-group">
                                                        <input type="file" class="custom-file-input form-control"
                                                               name="tarifario" id="tarifario"
                                                               value="{{ old('tarifario') }}"
                                                               placeholder="Tarifario">
                                                        <label class="custom-file-label" for="exampleInputFile">Seleccionar
                                                            archivo</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <!-- /.card -->


                            <div class="row">
                                <div class="col-12">
                                    <div class="pull-right float-right">
                                        <button type="submit" class="btn btn-app"><i class="fas fa-save"></i>Guardar
                                        </button>
                                        <a type="button" class="btn btn-app" data-toggle="modal"
                                           data-target="#modal-cancel"><i class="fas fa-times-circle"></i>Cancelar</a>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
    </section>
    <!-- /.content -->

    <!-- /.content-wrapper -->

@endsection