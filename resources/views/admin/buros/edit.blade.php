@extends('layouts.admin')
@section('content')
    @include('admin.cancel', ['route'=>route('admin.content.buros.index')])
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Editar Buro</h3>
                    </div>
                    <div class="card-body">
                        <form id="addForm" name="addForm" role="form" method="post" enctype="multipart/form-data"
                              action="{{route('admin.content.buros.update',$buro->id)}}">
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
                                                            <label>Nombre Oficina
                                                                <small class="required" style="color: red"> *</small>
                                                            </label>
                                                            <input type="text" class="form-control"
                                                                   name="nombre_ess" id="nombre_ess"
                                                                   value="{{ old('nombre_ess',$data['nombre_es']) }}"
                                                                   placeholder="Nombre">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Dirección</label>
                                                            <textarea type="text"
                                                                      class="textarea form-control {{ $errors->has('direccion_es')?'is-invalid':'' }}"
                                                                      name="direccion_es"
                                                                      id="direccion_es"
                                                                      placeholder="Dirección">{{ old('direccion_es', $data['direccion_es']) }}</textarea>{!! $errors->first('direccion_es', '<div class="invalid-feedback">:message</div>') !!}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="custom-tabs-one-en" role="tabpanel"
                                                     aria-labelledby="custom-tabs-one-en-tab">
                                                    <div class="tab-pane fade show active" id="custom-tabs-one-en"
                                                         role="tabpanel" aria-labelledby="custom-tabs-one-en-tab">
                                                        <div class="box-body">
                                                            <div class="form-group">
                                                                <label>Nombre
                                                                </label>
                                                                <input type="text"
                                                                       class="form-control {{ $errors->has('nombre_en')?'is-invalid':'' }}"
                                                                       name="nombre_en" id="nombre_en"
                                                                       value="{{ old('nombre_en',$data['nombre_en']) }}"
                                                                       placeholder="Nombre">{!! $errors->first('nombre_en', '<div class="invalid-feedback">:message</div>') !!}
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Dirección</label>
                                                                <textarea type="text"
                                                                          class="textarea form-control {{ $errors->has('direccion_en')?'is-invalid':'' }}"
                                                                          name="direccion_en"
                                                                          id="direccion_en"
                                                                          placeholder="Dirección">{{ old('direccion_en', $data['direccion_en']) }}</textarea>{!! $errors->first('direccion_en', '<div class="invalid-feedback">:message</div>') !!}
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
                                                                <label>Nombre
                                                                </label>
                                                                <input type="text"
                                                                       class="form-control {{ $errors->has('nombre_fr')?'is-invalid':'' }}"
                                                                       name="nombre_fr" id="nombre_fr"
                                                                       value="{{ old('nombre_fr',$data['nombre_fr']) }}"
                                                                       placeholder="Nombre">{!! $errors->first('nombre_fr', '<div class="invalid-feedback">:message</div>') !!}
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Dirección</label>
                                                                <textarea type="text"
                                                                          class="textarea form-control {{ $errors->has('direccion_fr')?'is-invalid':'' }}"
                                                                          name="direccion_fr"
                                                                          id="direccion_fr"
                                                                          placeholder="Dirección">{{ old('direccion_fr', $data['direccion_fr']) }}</textarea>{!! $errors->first('direccion_fr', '<div class="invalid-feedback">:message</div>') !!}
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
                                                                <label>Nombre
                                                                </label>
                                                                <input type="text"
                                                                       class="form-control {{ $errors->has('nombre_dt')?'is-invalid':'' }}"
                                                                       name="nombre_dt" id="nombre_dt"
                                                                       value="{{ old('nombre_dt',$data['nombre_dt']) }}"
                                                                       placeholder="Nombre">{!! $errors->first('nombre_dt', '<div class="invalid-feedback">:message</div>') !!}
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Dirección</label>
                                                                <textarea type="text"
                                                                          class="textarea form-control {{ $errors->has('direccion_dt')?'is-invalid':'' }}"
                                                                          name="direccion_dt"
                                                                          id="direccion_dt"
                                                                          placeholder="Dirección">{{ old('direccion_dt', $data['direccion_dt']) }}</textarea>{!! $errors->first('direccion_dt', '<div class="invalid-feedback">:message</div>') !!}
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
                                                                <label>Nombre
                                                                </label>
                                                                <input type="text"
                                                                       class="form-control {{ $errors->has('nombre_it')?'is-invalid':'' }}"
                                                                       name="nombre_it" id="nombre_it"
                                                                       value="{{ old('nombre_it',$data['nombre_it']) }}"
                                                                       placeholder="Nombre">{!! $errors->first('nombre_it', '<div class="invalid-feedback">:message</div>') !!}
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Dirección</label>
                                                                <textarea type="text"
                                                                          class="textarea form-control {{ $errors->has('direccion_it')?'is-invalid':'' }}"
                                                                          name="direccion_it"
                                                                          id="direccion_it"
                                                                          placeholder="Dirección">{{ old('direccion_it', $data['direccion_it']) }}</textarea>{!! $errors->first('direccion_it', '<div class="invalid-feedback">:message</div>') !!}
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
                                                                <label>Nombre
                                                                </label>
                                                                <input type="text"
                                                                       class="form-control {{ $errors->has('nombre_pt')?'is-invalid':'' }}"
                                                                       name="nombre_pt" id="nombre_pt"
                                                                       value="{{ old('nombre_pt',$data['nombre_pt']) }}"
                                                                       placeholder="Nombre">{!! $errors->first('nombre_pt', '<div class="invalid-feedback">:message</div>') !!}
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Dirección</label>
                                                                <textarea type="text"
                                                                          class="textarea form-control {{ $errors->has('direccion_pt')?'is-invalid':'' }}"
                                                                          name="direccion_pt"
                                                                          id="direccion_pt"
                                                                          placeholder="Dirección">{{ old('direccion_pt', $data['direccion_pt']) }}</textarea>{!! $errors->first('direccion_pt', '<div class="invalid-feedback">:message</div>') !!}
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>


                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Teléfono
                                                            <small class="required" style="color: red"> *</small>
                                                        </label>

                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i
                                                                            class="fas fa-phone"></i></span>
                                                            </div>
                                                            <input type="text"
                                                                   class="form-control {{ $errors->has('telefono')?'is-invalid':'' }}"
                                                                   data-inputmask='"mask": "(+53) 9999-99-99"' data-mask
                                                                   name="telefono"
                                                                   id="telefono"
                                                                   value="{{ old('telefono',$buro->telefono) }}"
                                                                   placeholder="Teléfono">
                                                            {!! $errors->first('telefono', '<div class="invalid-feedback">:message</div>') !!}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Oficina
                                                            <small class="required" style="color: red"> *</small>
                                                        </label>
                                                        <select class="form-control select2bs4 {{ $errors->has('oficina_id')?'is-invalid':'' }}"
                                                                style="width: 100%;" id="oficina_id" name="oficina_id">
                                                            <option value="">--Seleccionar--</option>

                                                            @foreach ($oficinas as $key => $c)
                                                                @if($c->oficina_id == $buro->oficina_id)
                                                                    <option value="{{ $c->oficina_id }}"
                                                                            selected>{{ $c->nombre }}</option>
                                                                @else
                                                                    <option value="{{ $c->oficina_id }}">{{ $c->nombre }}</option>
                                                                @endif

                                                            @endforeach
                                                        </select>

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