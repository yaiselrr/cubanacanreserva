@extends('layouts.admin')
@section('content')
    @include('admin.cancel', ['route'=>route('admin.content.conectandos.index')])
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Crear Traslado Conectando Cuba</h3>
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
                        <form action="{{ route('admin.content.conectandos.store') }}" method="post"
                              enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="ruta">Ruta</label>
                                        <select class="form-control select2bs4"
                                                style="width: 100%;" name="ruta" id="ruta">

                                            <option value="">--Seleccionar--</option>
                                            @foreach ($rutas as $key => $c)
                                                <option value="{{ $c->id }}">{{ $c->ruta }}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="dias_antelacion">Días Antelación</label>
                                        <select class="form-control select2bs4"
                                                style="width: 100%;" name="dias_antelacion" id="dias_antelacion">
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
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="provincia_origen">Provincia Origen</label>
                                        <select class="form-control select2bs4"
                                                style="width: 100%;" name="provincia_origen" id="provincia_origen">

                                            <option value="">--Seleccionar--</option>
                                            @foreach ($provincias as $key => $c)
                                                <option value="{{ $c->id }}">{{ $c->provincia }}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="provincia_destino">Provincia Destino</label>
                                        <select class="form-control select2bs4"
                                                style="width: 100%;" name="provincia_destino" id="provincia_destino">

                                            <option value="">--Seleccionar--</option>
                                            @foreach ($provincias as $key => $c)
                                                <option value="{{ $c->id }}">{{ $c->provincia }}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Precio PAX</label>
                                        <input type="text" class="form-control" name="precio_pax"
                                               id="precio_pax" value="{{ old('precio_pax') }}"
                                               placeholder="Precio PAX">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Precio Niños (2 a 12 años)</label>
                                        <input type="text" class="form-control" name="precio_ninnos"
                                               id="precio_ninnos" value="{{ old('precio_ninnos') }}"
                                               placeholder="Precio Niños (2 a 12 años)">
                                    </div>
                                </div>
                            </div>

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
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>

        </form>
    </section>
    <!-- /.content -->

    <!-- /.content-wrapper -->

@endsection