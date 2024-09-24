@extends('layouts.admin')
@section('content')
    @include('admin.cancel', ['route'=>route('admin.content.oficinas.index')])
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
                        <h3 class="card-title">Editar Oficinas Comerciales</h3>
                    </div>
                    <div class="card-body">
                        <form id="addForm" name="addForm" role="form" method="post" enctype="multipart/form-data"
                              action="{{route('admin.content.oficinas.update',$oficina->id)}}">
                            @csrf
                            @method('PUT')
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
                                                            <label>Nombre
                                                                <small class="required" style="color: red"> *</small>
                                                            </label>
                                                            <input type="text"
                                                                   class="form-control {{ $errors->has('oficina_nombre_es')?'is-invalid':'' }}"
                                                                   name="oficina_nombre_es"
                                                                   id="oficina_nombre_es"
                                                                   value="{{ old('oficina_nombre_es',$data['nombre_es']) }}"
                                                                   placeholder="Nombre">
                                                            {!! $errors->first('oficina_nombre_es', '<div class="invalid-feedback">:message</div>') !!}
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Dirección</label>
                                                            <textarea class="textarea form-control" name="direccion_es"
                                                                      id="direccion_es" rows="3"
                                                                      placeholder="Dirección"> {{ old('direccion_es', $data['direccion_es']) }}</textarea>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="custom-tabs-one-en" role="tabpanel"
                                                     aria-labelledby="custom-tabs-one-en-tab">
                                                    <div class="tab-pane fade show active" id="custom-tabs-one-en"
                                                         role="tabpanel" aria-labelledby="custom-tabs-one-en-tab">
                                                        <div class="box-body">
                                                            <div class="form-group">
                                                                <label>Nombre</label>
                                                                <input type="text" class="form-control"
                                                                       name="oficina_nombre_en"
                                                                       id="oficina_nombre_en"
                                                                       value="{{ old('oficina_nombre_en',$data['nombre_en']) }}"
                                                                       placeholder="Nombre">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Dirección</label>
                                                                <textarea class="textarea form-control"
                                                                          name="direccion_en"
                                                                          id="direccion_en" rows="3"
                                                                          placeholder="Dirección"> {{ old('direccion_en', $data['direccion_en']) }}</textarea>
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
                                                                <label>Nombre</label>
                                                                <input type="text" class="form-control"
                                                                       name="oficina_nombre_fr"
                                                                       id="oficina_nombre_fr"
                                                                       value="{{ old('oficina_nombre_fr',$data['nombre_fr']) }}"
                                                                       placeholder="Nombre">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Dirección</label>
                                                                <textarea class="textarea form-control"
                                                                          name="direccion_fr"
                                                                          id="direccion_fr" rows="3"
                                                                          placeholder="Dirección"> {{ old('direccion_fr', $data['direccion_fr']) }}</textarea>
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
                                                                <label>Nombre</label>
                                                                <input type="text" class="form-control"
                                                                       name="oficina_nombre_dt"
                                                                       id="oficina_nombre_dt"
                                                                       value="{{ old('oficina_nombre_dt',$data['nombre_dt']) }}"
                                                                       placeholder="Nombre">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Dirección</label>
                                                                <textarea class="textarea form-control"
                                                                          name="direccion_dt"
                                                                          id="direccion_dt" rows="3"
                                                                          placeholder="Dirección"> {{ old('direccion_dt', $data['direccion_dt']) }}</textarea>
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
                                                                <label>Nombre</label>
                                                                <input type="text" class="form-control"
                                                                       name="oficina_nombre_it"
                                                                       id="oficina_nombre_it"
                                                                       value="{{ old('oficina_nombre_it',$data['nombre_it']) }}"
                                                                       placeholder="Nombre">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Dirección</label>
                                                                <textarea class="textarea form-control"
                                                                          name="direccion_it"
                                                                          id="direccion_it" rows="3"
                                                                          placeholder="Dirección"> {{ old('direccion_it', $data['direccion_it']) }}</textarea>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="custom-tabs-one-pt" role="tabpanel"
                                                     aria-labelledby="custom-tabs-one-pt-tab">
                                                    <div class="tab-pane fade show active" id="custom-tabs-one-pt"
                                                         role="tabpanel" aria-labelledby="custom-tabs-one-pt-tab">
                                                        <div class="box-body">
                                                            <div class="form-group">
                                                                <label>Nombre</label>
                                                                <input type="text" class="form-control"
                                                                       name="oficina_nombre_pt"
                                                                       id="oficina_nombre_pt"
                                                                       value="{{ old('oficina_nombre_pt',$data['nombre_pt']) }}"
                                                                       placeholder="Nombre">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Dirección</label>
                                                                <textarea class="textarea form-control"
                                                                          name="direccion_pt"
                                                                          id="direccion_pt" rows="3"
                                                                          placeholder="Dirección"> {{ old('direccion_pt', $data['direccion_pt']) }}</textarea>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                        <!-- /.card -->
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Teléfono
                                                <small class="required" style="color: red"> *
                                                </small>
                                            </label>

                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                                        <span class="input-group-text"><i
                                                                                    class="fas fa-phone"></i></span>
                                                </div>
                                                <input type="text"
                                                       class="form-control {{ $errors->has('telefono')?'is-invalid':'' }}"
                                                       data-inputmask='"mask": "(+53) 9999-99-99"'
                                                       data-mask name="telefono"
                                                       id="telefono"
                                                       value="{{ old('telefono',$oficina->telefono) }}"
                                                       placeholder="Teléfono">
                                                {!! $errors->first('telefono', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.box-body -->
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
            </div>
        </div>
    </section>
    <!-- /.content -->

    <!-- /.content-wrapper -->

@endsection