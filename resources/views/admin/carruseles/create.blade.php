@extends('layouts.admin')
@section('content')
    @include('admin.cancel', ['route'=>route('admin.content.carruseles.index')])
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
                        <h3 class="card-title">Crear Carrusel</h3>
                    </div>
                    <div class="card-body">
                        <form id="addForm" name="addForm" role="form" method="post" enctype="multipart/form-data"
                              action="{{route('admin.content.carruseles.store')}}">
                            @csrf
                            <div class="row">
                                <div class="col-12 col-sm-6 col-lg-12">
                                    <div class="card card-dark card-tabs">
                                        <div class="card-header p-0 pt-1">
                                            <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active" id="custom-tabs-one-es-tab"
                                                       data-toggle="pill" href="#custom-tabs-one-es" role="tab"
                                                       aria-controls="custom-tabs-one-es" aria-selected="true"><img
                                                                src="{{ asset('flags/es.png')}}" alt="flag"/>&nbsp;&nbsp;ES</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="custom-tabs-one-en-tab" data-toggle="pill"
                                                       href="#custom-tabs-one-en" role="tab"
                                                       aria-controls="custom-tabs-one-en" aria-selected="false"><img
                                                                src="{{ asset('flags/us.png')}}" alt="flag"/>&nbsp;&nbsp;EN</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="custom-tabs-one-fr-tab" data-toggle="pill"
                                                       href="#custom-tabs-one-fr" role="tab"
                                                       aria-controls="custom-tabs-one-fr" aria-selected="false"><img
                                                                src="{{ asset('flags/fr.png')}}" alt="flag"/>&nbsp;&nbsp;FR</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="custom-tabs-one-dt-tab" data-toggle="pill"
                                                       href="#custom-tabs-one-dt" role="tab"
                                                       aria-controls="custom-tabs-one-de" aria-selected="false"><img
                                                                src="{{ asset('flags/de.png')}}" alt="flag"/>&nbsp;&nbsp;DE</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="custom-tabs-one-it-tab" data-toggle="pill"
                                                       href="#custom-tabs-one-it" role="tab"
                                                       aria-controls="custom-tabs-one-it" aria-selected="false"><img
                                                                src="{{ asset('flags/it.png')}}" alt="flag"/>&nbsp;&nbsp;IT</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="custom-tabs-one-pt-tab" data-toggle="pill"
                                                       href="#custom-tabs-one-pt" role="tab"
                                                       aria-controls="custom-tabs-one-pt" aria-selected="false"><img
                                                                src="{{ asset('flags/pt.png')}}" alt="flag"/>&nbsp;&nbsp;PT</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="card-body">
                                            <div class="tab-content" id="custom-tabs-one-tabContent">
                                                <div class="tab-pane fade show active" id="custom-tabs-one-es"
                                                     role="tabpanel"
                                                     aria-labelledby="custom-tabs-one-es-tab">
                                                    <div class="box-body">
                                                        <div class="form-group">
                                                            <label>Título
                                                                <small class="required" style="color: red"> *
                                                                </small>
                                                            </label>


                                                            <input type="text"
                                                                   class="form-control {{ $errors->has('nombre_es')?'is-invalid':'' }}"
                                                                   name="nombre_es"
                                                                   id="nombre_es" value="{{ old('nombre_es') }}"
                                                                   placeholder="Título">
                                                            {!! $errors->first('nombre_es', '<div class="invalid-feedback">:message</div>') !!}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="custom-tabs-one-en" role="tabpanel"
                                                     aria-labelledby="custom-tabs-one-en-tab">
                                                    <div class="tab-pane fade show active" id="custom-tabs-one-en"
                                                         role="tabpanel" aria-labelledby="custom-tabs-one-en-tab">
                                                        <div class="box-body">
                                                            <div class="form-group">
                                                                <label>Título</label>


                                                                <input type="text"
                                                                       class="form-control {{ $errors->has('nombre_en')?'is-invalid':'' }}"
                                                                       name="nombre_en"
                                                                       id="nombre_en" value="{{ old('nombre_en') }}"
                                                                       placeholder="Título">
                                                                {!! $errors->first('nombre_en', '<div class="invalid-feedback">:message</div>') !!}
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="custom-tabs-one-fr" role="tabpanel"
                                                     aria-labelledby="custom-tabs-one-fr-tab">
                                                    <div class="tab-pane fade show active" id="custom-tabs-one-fr"
                                                         role="tabpanel" aria-labelledby="custom-tabs-one-fr-tab">
                                                        <div class="box-body">
                                                            <div class="form-group">
                                                                <label>Título</label>


                                                                <input type="text"
                                                                       class="form-control {{ $errors->has('nombre_fr')?'is-invalid':'' }}"
                                                                       name="nombre_fr"
                                                                       id="nombre_fr" value="{{ old('nombre_fr') }}"
                                                                       placeholder="Título">
                                                                {!! $errors->first('nombre_fr', '<div class="invalid-feedback">:message</div>') !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="custom-tabs-one-dt" role="tabpanel"
                                                     aria-labelledby="custom-tabs-one-dt-tab">
                                                    <div class="tab-pane fade show active" id="custom-tabs-one-dt"
                                                         role="tabpanel" aria-labelledby="custom-tabs-one-dt-tab">
                                                        <div class="box-body">
                                                            <div class="form-group">
                                                                <label>Título</label>


                                                                <input type="text"
                                                                       class="form-control {{ $errors->has('nombre_dt')?'is-invalid':'' }}"
                                                                       name="nombre_dt"
                                                                       id="nombre_dt" value="{{ old('nombre_dt') }}"
                                                                       placeholder="Título">
                                                                {!! $errors->first('nombre_dt', '<div class="invalid-feedback">:message</div>') !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="custom-tabs-one-it" role="tabpanel"
                                                     aria-labelledby="custom-tabs-one-it-tab">
                                                    <div class="tab-pane fade show active" id="custom-tabs-one-it"
                                                         role="tabpanel" aria-labelledby="custom-tabs-one-it-tab">
                                                        <div class="box-body">
                                                            <div class="form-group">
                                                                <label>Título</label>


                                                                <input type="text"
                                                                       class="form-control {{ $errors->has('nombre_it')?'is-invalid':'' }}"
                                                                       name="nombre_it"
                                                                       id="nombre_it" value="{{ old('nombre_it') }}"
                                                                       placeholder="Título">
                                                                {!! $errors->first('nombre_it', '<div class="invalid-feedback">:message</div>') !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="custom-tabs-one-pt" role="tabpanel"
                                                     aria-labelledby="custom-tabs-one-pt-tab">
                                                    <div class="tab-pane fade show active" id="custom-tabs-one-pt"
                                                         role="tabpanel" aria-labelledby="custom-tabs-one-pt-tab">
                                                        <div class="box-body">
                                                            <!-- text input -->
                                                            <div class="form-group">
                                                                <label>Título</label>


                                                                <input type="text"
                                                                       class="form-control {{ $errors->has('nombre_pt')?'is-invalid':'' }}"
                                                                       name="nombre_pt"
                                                                       id="nombre_pt" value="{{ old('nombre_pt') }}"
                                                                       placeholder="Título">
                                                                {!! $errors->first('nombre_pt', '<div class="invalid-feedback">:message</div>') !!}
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>


                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Imagen</label>
                                                        <div class="input-group">
                                                            <input id="files" type="file" name="imagen" accept="image/*"
                                                                   class="custom-file-input">
                                                            <label class="custom-file-label" for="exampleInputFile">Seleccionar
                                                                archivo</label>
                                                        </div>
                                                        <div>
                                                            <span class="help-block">{{__('cubanacan.dimensiones', ['dim' => '1349x480'])}}</span>
                                                        </div>
                                                        <span class="help-block">{{__('cubanacan.extensiones')}}</span>
                                                    </div>
                                                    <div class="mt-3">
                                                        <output id="list"></output>
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