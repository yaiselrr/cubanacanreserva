@extends('layouts.admin')
@section('content')
    @include('admin.cancel', ['route'=>route('admin.content.precipaxs.index')])
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
                        <h3 class="card-title">Editar Precios Pax Circuito</h3>
                    </div>
                    <div class="card-body">
                        <form id="addForm" name="addForm" role="form" method="post" enctype="multipart/form-data"
                              action="{{route('admin.content.precipaxs.update',$rcircuito->id)}}">
                            @csrf
                            @method('PUT')
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
                                                       aria-selected="true">Precio Pax del circuito</a>
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
                                                            <div class="col-sm-4">
                                                                <div class="form-group">
                                                                    <label>Circuitos</label>
                                                                    <select class="form-control select2bs4 {{ $errors->has('circuitos_id')?'is-invalid':'' }}" id="circuitos_id" name="circuitos_id" >
                                                                        <option value="">--Seleccionar--</option>

                                                                        @foreach ($circuitos as $key => $c)
                                                                            @if($c->circuitos_id == $rcircuito->oficina_id)
                                                                                <option value="{{ $c->circuitos_id }}">{{ $c->nombre }}</option>
                                                                            @else
                                                                                <option value="{{ $c->circuitos_id }}">{{ $c->nombre }}</option>
                                                                            @endif

                                                                        @endforeach
                                                                    </select>{!! $errors->first('circuitos_id', '<div class="invalid-feedback">:message</div>') !!}

                                                                </div>
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <div class="form-group">
                                                                    <label>Fecha Inicio</label>
                                                                    <input type="date" class="form-control" name="fecha_inicio"
                                                                           id="fecha_inicio" value="{{ old('fecha_inicio') }}"
                                                                    >
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <div class="form-group">
                                                                    <label>Fecha Fin</label>
                                                                    <input type="date" class="form-control" name="fecha_fin"
                                                                           id="fecha_fin" value="{{ old('fecha_fin') }}"
                                                                    >
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-4">
                                                                <div class="form-group">
                                                                    <label for="nombre">Precio Habitación Sencilla</label>
                                                                    <input type="text" class="form-control" name="precio_habitacions" id="precio_habitacions"
                                                                           value="{{ old('precio_habitacions') }}" placeholder="Pecio Habitación Sencilla">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <div class="form-group">
                                                                    <label for="nombre">Precio Habitación Doble</label>
                                                                    <input type="text" class="form-control" name="precio_habitaciond" id="precio_habitaciond"
                                                                           value="{{ old('precio_habitaciond') }}" placeholder="Pecio Habitación Doble">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <div class="form-group">
                                                                    <label for="nombre">Precio Niños (2 a 12 años)</label>
                                                                    <input type="text" class="form-control" name="precio_ninnos" id="precio_ninnos"
                                                                           value="{{ old('precio_ninnos') }}" placeholder="Pecio Niños (2 a 12 años)">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-4">
                                                                <div class="form-group">
                                                                    <label for="nombre">Capacidad Habitación Sencilla</label>
                                                                    <input type="text" class="form-control" name="capacidad_habitacions" id="capacidad_habitacions"
                                                                           value="{{ old('capacidad_habitacions') }}" placeholder="Capacidad Habitación Sencilla">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <div class="form-group">
                                                                    <label for="nombre">Capacidad Habitación Doble</label>
                                                                    <input type="text" class="form-control" name="capacidad_habitaciond" id="capacidad_habitaciond"
                                                                           value="{{ old('capacidad_habitaciond') }}" placeholder="Capacidad Habitación Doble">
                                                                </div>
                                                            </div>
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
                                                                       placeholder="Introduzca Modalidad">
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