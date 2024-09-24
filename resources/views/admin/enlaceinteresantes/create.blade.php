@extends('layouts.admin')
@section('content')
    @include('admin.cancel', ['route'=>route('admin.content.enlace_interesantes.index')])
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
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
            <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Crear Enlaces Interesante</h3>
                    </div>
                    <div class="card-body">
                        <form id="addForm" name="addForm" role="form" method="post" enctype="multipart/form-data"
                              action="{{route('admin.content.enlace_interesantes.store')}}">
                            @csrf
                            <div class="row">
                                <div class="col-12 col-sm-6 col-lg-12">
                                    <div class="card card-dark card-tabs">
                                        <div class="card-header p-0 pt-1">
                                            <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active" id="custom-tabs-one-es-tab"
                                                       data-toggle="pill"
                                                       href="#custom-tabs-one-es" role="tab"
                                                       aria-controls="custom-tabs-one-es"
                                                       aria-selected="true">Enlace Interesante</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="card-body">
                                            <div class="tab-content" id="custom-tabs-one-tabContent">
                                                <div class="tab-pane fade show active" id="custom-tabs-one-es"
                                                     role="tabpanel"
                                                     aria-labelledby="custom-tabs-one-es-tab">
                                                    <div class="box-body">
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <!-- text input -->
                                                                <div class="form-group">
                                                                    <label>URL
                                                                        <small class="required" style="color: red"> *
                                                                        </small>
                                                                    </label>


                                                                    <input type="text"
                                                                           class="form-control {{ $errors->has('nombre')?'is-invalid':'' }}"
                                                                           name="nombre"
                                                                           id="nombre" value="{{ old('nombre') }}"
                                                                           placeholder="URL">
                                                                    {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
                                                                </div>

                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label>Imagen
                                                                        <small class="required" style="color: red"> *
                                                                        </small>
                                                                    </label>
                                                                    <div class="input-group">
                                                                        <input id="files" type="file" name="imagen"
                                                                               accept="image/*"
                                                                               class="custom-file-input {{ $errors->has('imagen')?'is-invalid':'' }}">
                                                                        <label class="custom-file-label"
                                                                               for="exampleInputFile">Seleccionar
                                                                            archivo</label>
                                                                        {!! $errors->first('imagen', '<div class="invalid-feedback">:message</div>') !!}
                                                                    </div>

                                                                    <span class="help-block">{{__('cubanacan.extensiones')}}</span>
                                                                    <div class="mt-3">
                                                                        <output id="list"></output>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>


                                            </div>

                                        </div>
                                        <!-- /.card -->
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
                            <!-- /.box-body -->

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->

    <!-- /.content-wrapper -->

@endsection