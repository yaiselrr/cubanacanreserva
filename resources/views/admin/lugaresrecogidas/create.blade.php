@extends('layouts.admin')
@section('content')
    @include('admin.cancel', ['route'=>route('admin.content.lugaresrecogida.index')])
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Crear Lugares de Recogida Conectando Cuba</h3>
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
                        <form action="{{ route('admin.content.lugaresrecogida.store') }}" method="post"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-12 col-sm-6 col-lg-12">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="hotel">Hotel</label>
                                                    <select class="form-control select2bs4"
                                                            style="width: 100%;" name="hotel" id="hotel">
                                                        <option value="">--Seleccionar--</option>
                                                        @foreach ($hoteles as $key => $c)
                                                            <option value="{{ $c->id }}">{{ $c->nombre }}</option>
                                                        @endforeach
                                                    </select>

                                                </div>
                                            </div>
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
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Hora</label>
                                                    <input type="time" class="form-control" name="hora"
                                                           id="hora" value="{{ old('hora') }}"
                                                           placeholder="Hora">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Area</label>
                                                    <input type="text" class="form-control" name="area"
                                                           id="area" value="{{ old('area') }}"
                                                           placeholder="Area">
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