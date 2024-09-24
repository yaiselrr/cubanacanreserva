@extends('layouts.plantilla')
@section('content')
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
                        <h3 class="card-title">Crear Reservación de Circuito</h3>
                    </div>
                    <div class="card-body">
                        <form id="addForm" name="addForm" role="form" method="post" enctype="multipart/form-data"
                              action="{{route('admin.content.rcircuitos.store')}}">
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
                                                       aria-selected="true">Hacer Nueva Reservación par el circuito</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="card-body">
                                            <div class="tab-content" id="custom-tabs-one-tabContent">
                                                <div class="tab-pane fade show active" id="custom-tabs-one-es"
                                                     role="tabpanel"
                                                     aria-labelledby="custom-tabs-one-es-tab">
                                                    <div class="box-body">
                                                        <div class="col-sm-3">
                                                            <div class="form-group">
                                                                <label>Circuito:*</label>
                                                                <select class="form-control select2bs4 {{ $errors->has('circuito_id')?'is-invalid':'' }}" id="circuito_id" name="circuito_id" >
                                                                    <option value="">--Seleccionar--</option>

                                                                    @foreach ($circuitos as $key => $c)
                                                                        <option value="{{ $c->circuitos_id }}">{{ $c->nombre }}</option>

                                                                    @endforeach
                                                                </select>{!! $errors->first('circuito_id', '<div class="invalid-feedback">:message</div>') !!}

                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-3">
                                                                <div class="form-group">
                                                                    <label for="tipo_habitacion">Tipo Habitación:*</label>
                                                                    <select class="form-control select2bs4 {{ $errors->has('tipo_habitacion')?'is-invalid':'' }}" name="tipo_habitacion" id="tipo_habitacion" onChange="mostrar(this.value);">
                                                                        <option value="">--Seleccionar--</option>
                                                                        <option value="doble">Doble</option>
                                                                        <option value="sencilla">Sencilla</option>
                                                                    </select>{!! $errors->first('tipo_habitacion', '<div class="invalid-feedback">:message</div>') !!}

                                                                </div>
                                                            </div>
                                                            <div id="doble" style="display: none;"class="col-sm-3">
                                                                <div class="form-group">
                                                                    <label for="cantidad_adultos">Cantidad Adultos:*</label>
                                                                    <select class="form-control select2bs4 {{ $errors->has('cantidad_adultos')?'is-invalid':'' }}" name="cantidad_adultosd" id="cantidad_adultosd">
                                                                        <option value="">--Seleccionar--</option>
                                                                        <option value="1">1</option>
                                                                        <option value="2">2</option>
                                                                    </select>{!! $errors->first('cantidad_adultos', '<div class="invalid-feedback">:message</div>') !!}

                                                                </div>
                                                            </div>
                                                            <div id="sencilla" style="display: none;"class="col-sm-3">
                                                                <div class="form-group">
                                                                    <label for="cantidad_adultos">Cantidad Adultos:*</label>
                                                                    <select class="form-control select2bs4 {{ $errors->has('cantidad_adultos')?'is-invalid':'' }}" name="cantidad_adultos" id="cantidad_adultos">
                                                                        <option value="">--Seleccionar--</option>
                                                                        <option value="1">1</option>
                                                                    </select>{!! $errors->first('cantidad_adultos', '<div class="invalid-feedback">:message</div>') !!}

                                                                </div>
                                                            </div>

                                                            <div class="col-sm-3">
                                                                <div class="form-group">
                                                                    <label for="cantidad_ninnos">Cantidad Niños 2 - 12:*</label>
                                                                    <select class="form-control select2bs4 {{ $errors->has('cantidad_ninnos')?'is-invalid':'' }}" name="cantidad_ninnos" id="cantidad_ninnos">
                                                                        <option value="">--Seleccionar--</option>
                                                                        <option value="0">0</option>
                                                                        <option value="1">1</option>
                                                                        <option value="2">2</option>
                                                                    </select>{!! $errors->first('cantidad_ninnos', '<div class="invalid-feedback">:message</div>') !!}

                                                                </div>
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <div class="form-group">
                                                                    <label for="cantidad_infantes">Cantidad Infantes 0 - 2:*</label>
                                                                    <select class="form-control select2bs4 {{ $errors->has('cantidad_infantes')?'is-invalid':'' }}" name="cantidad_infantes" id="cantidad_infantes">
                                                                        <option value="">--Seleccionar--</option>
                                                                        <option value="0">0</option>
                                                                        <option value="1">1</option>
                                                                        <option value="2">2</option>
                                                                    </select>{!! $errors->first('cantidad_infantes', '<div class="invalid-feedback">:message</div>') !!}

                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Requerimientos Especiales:*</label>
                                                            <textarea type="text" class="form-control {{ $errors->has('requerimientos')?'is-invalid':'' }}" name="requerimientos"
                                                                      id="requerimientos" value="{{ old('requerimientos') }}"
                                                                      placeholder="Requerimientos"></textarea>{!! $errors->first('requerimientos', '<div class="invalid-feedback">:message</div>') !!}
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
                                                                       name="nombre_en" id="nombre_en"
                                                                       value="{{ old('nombre_en') }}"
                                                                       placeholder="Nombre">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Modalidad</label>
                                                                <input type="text" class="form-control" name="modalidad_en"
                                                                       id="modalidad_en" value="{{ old('modalidad_en') }}"
                                                                       placeholder="Modalidad">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Itinerario</label>
                                                                <input type="text" class="form-control" name="itinerario_en"
                                                                       id="itinerario_en" value="{{ old('itinerario_en') }}"
                                                                       placeholder="Itinerario">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Descripción</label>
                                                                <input type="text" class="form-control" name="descripcion_en"
                                                                       id="descripcion_en" value="{{ old('descripcion_en') }}"
                                                                       placeholder="Descripción">
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="custom-tabs-one-dt" role="tabpanel"
                                                     aria-labelledby="custom-tabs-one-en-tab">
                                                    <div class="tab-pane fade show active" id="custom-tabs-one-dt"
                                                         role="tabpanel" aria-labelledby="custom-tabs-one-dt-tab">
                                                        <div class="box-body">
                                                            <div class="form-group">
                                                                <label>Nombre</label>
                                                                <input type="text" class="form-control"
                                                                       name="nombre_dt" id="nombre_dt"
                                                                       value="{{ old('nombre_dt') }}"
                                                                       placeholder="Nombre">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Modalidad</label>
                                                                <input type="text" class="form-control" name="modalidad_dt"
                                                                       id="modalidad_dt" value="{{ old('modalidad_dt') }}"
                                                                       placeholder="Modalidad">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Itinerario</label>
                                                                <input type="text" class="form-control" name="itinerario_dt"
                                                                       id="itinerario_dt" value="{{ old('itinerario_dt') }}"
                                                                       placeholder="Itinerario">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Descripción</label>
                                                                <input type="text" class="form-control" name="descripcion_dt"
                                                                       id="descripcion_fr" value="{{ old('descripcion_fr') }}"
                                                                       placeholder="Descripción">
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
                                                                       name="nombre_fr" id="nombre_fr"
                                                                       value="{{ old('nombre_fr') }}"
                                                                       placeholder="Nombre">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Modalidad</label>
                                                                <input type="text" class="form-control" name="modalidad_fr"
                                                                       id="modalidad_fr" value="{{ old('modalidad_fr') }}"
                                                                       placeholder="Modalidad">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Itinerario</label>
                                                                <input type="text" class="form-control" name="itinerario_fr"
                                                                       id="itinerario_fr" value="{{ old('itinerario_fr') }}"
                                                                       placeholder="Itinerario">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Descripción</label>
                                                                <input type="text" class="form-control" name="descripcion_fr"
                                                                       id="descripcion_fr" value="{{ old('descripcion_fr') }}"
                                                                       placeholder="Descripción">
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
                                                                       name="nombre_it" id="nombre_it"
                                                                       value="{{ old('nombre_it') }}"
                                                                       placeholder="Nombre">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Modalidad</label>
                                                                <input type="text" class="form-control" name="modalidad_it"
                                                                       id="modalidad_it" value="{{ old('modalidad_it') }}"
                                                                       placeholder="Modalidad">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Itinerario</label>
                                                                <input type="text" class="form-control" name="itinerario_it"
                                                                       id="itinerario_it" value="{{ old('itinerario_it') }}"
                                                                       placeholder="Itinerario">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Descripción</label>
                                                                <input type="text" class="form-control" name="descripcion_it"
                                                                       id="descripcion_it" value="{{ old('descripcion_it') }}"
                                                                       placeholder="Descripción">
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
                                                                       name="nombre_pt" id="nombre_pt"
                                                                       value="{{ old('nombre_pt') }}"
                                                                       placeholder="Nombre">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Modalidad</label>
                                                                <input type="text" class="form-control" name="modalidad_pt"
                                                                       id="modalidad_pt" value="{{ old('modalidad_pt') }}"
                                                                       placeholder="Modalidad">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Itinerario</label>
                                                                <input type="text" class="form-control" name="itinerario_pt"
                                                                       id="itinerario_pt" value="{{ old('itinerario_pt') }}"
                                                                       placeholder="Itinerario">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Descripción</label>
                                                                <input type="text" class="form-control" name="descripcion_pt"
                                                                       id="descripcion_pt" value="{{ old('descripcion_pt') }}"
                                                                       placeholder="Descripción">
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>


                                            </div>
                                            <div class="box-footer fa-pull-right">
                                                <div class="pull-right">
                                                    <a data-toggle="modal" data-target="#modal-cancel" class="btn btn-app">
                                                        <i class="fas fa-times-circle"></i> Cancelar
                                                    </a>
                                                    <a data-toggle="modal" data-target="#modal-add" class="btn btn-app">
                                                        <i class="fas fa-save"></i> Guardar
                                                    </a>
                                                    @include('admin.includes.modals.modalcancel')
                                                    @include('admin.includes.modals.modaladd')
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.card -->
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