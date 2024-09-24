@extends('layouts.admin')
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
                        <h3 class="card-title">Editar Reservación de Circuito</h3>
                    </div>
                    <div class="card-body">
                        <form id="addForm" name="addForm" role="form" method="post" enctype="multipart/form-data"
                              action="{{route('admin.content.circuitos.update',$circuito->id)}}">
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
                                                       aria-selected="true">ES</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="custom-tabs-one-en-tab" data-toggle="pill"
                                                       href="#custom-tabs-one-en" role="tab"
                                                       aria-controls="custom-tabs-one-en"
                                                       aria-selected="false">EN</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="custom-tabs-one-dt-tab" data-toggle="pill"
                                                       href="#custom-tabs-one-dt" role="tab"
                                                       aria-controls="custom-tabs-one-dt"
                                                       aria-selected="false">DT</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="custom-tabs-one-fr-tab" data-toggle="pill"
                                                       href="#custom-tabs-one-fr" role="tab"
                                                       aria-controls="custom-tabs-one-fr"
                                                       aria-selected="false">FR</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="custom-tabs-one-it-tab" data-toggle="pill"
                                                       href="#custom-tabs-one-it" role="tab"
                                                       aria-controls="custom-tabs-one-it"
                                                       aria-selected="false">IT</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="custom-tabs-one-pt-tab" data-toggle="pill"
                                                       href="#custom-tabs-one-pt" role="tab"
                                                       aria-controls="custom-tabs-one-pt"
                                                       aria-selected="false">PT</a>
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
                                                            <label>Nombre</label>
                                                            <input type="text" class="form-control" name="nombre_es"
                                                                   id="nombre_es" value="{{ old('nombre_es') }}"
                                                                   placeholder="Nombre">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Modalidad</label>
                                                            <input type="text" class="form-control" name="modalidad_es"
                                                                   id="modalidad_es" value="{{ old('modalidad_es') }}"
                                                                   placeholder="Modalidad">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Itinerario</label>
                                                            <input type="text" class="form-control" name="itinerario_es"
                                                                   id="itinerario_es" value="{{ old('itinerario_es') }}"
                                                                   placeholder="Itinerario">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Descripción</label>
                                                            <input type="text" class="form-control" name="descripcion_es"
                                                                   id="descripcion_es" value="{{ old('descripcion_es') }}"
                                                                   placeholder="Descripción">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Fecha Inicio</label>
                                                            <input type="date" class="form-control" name="fecha_inicio"
                                                                   id="fecha_inicio" value="{{ old('fecha_inicio') }}"
                                                            >
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Fecha Fin</label>
                                                            <input type="date" class="form-control" name="fecha_fin"
                                                                   id="fecha_fin" value="{{ old('fecha_fin') }}"
                                                            >
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="duracion">Duración</label>
                                                            <select class="form-control" name="duracion" id="duracion">
                                                                <option value="">--Seleccionar--</option>
                                                                @if($circuito->duracion == 0)
                                                                    <option value="0" selected>0</option>
                                                                    <option value="1">1</option>
                                                                    <option value="2">2</option>
                                                                    <option value="3">3</option>
                                                                @endif
                                                                @if($circuito->duracion == 1)
                                                                    <option value="0" >0</option>
                                                                    <option value="1" selected>1</option>
                                                                    <option value="2">2</option>
                                                                    <option value="3">3</option>
                                                                @endif
                                                                @if($circuito->duracion == 2)
                                                                    <option value="0">0</option>
                                                                    <option value="1">1</option>
                                                                    <option value="2" selected>2</option>
                                                                    <option value="3">3</option>
                                                                @endif
                                                                @if($circuito->duracion == 3)
                                                                    <option value="0">0</option>
                                                                    <option value="1">1</option>
                                                                    <option value="2">2</option>
                                                                    <option value="3" selected>3</option>
                                                                @endif
                                                            </select>

                                                        </div>

                                                        <div class="form-group">
                                                            <label for="dias_antelacion">Días Antelación</label>
                                                            <select class="form-control" name="dias_antelacion" id="dias_antelacion">
                                                                <option value="">--Seleccionar--</option>
                                                                @if($circuito->duracion == 1)
                                                                    <option value="0">0</option>
                                                                    <option value="1">1</option>
                                                                    <option value="2">5</option>
                                                                    <option value="3">7</option>
                                                                @endif
                                                                @if($circuito->duracion == 1)
                                                                    <option value="0" >0</option>
                                                                    <option value="1" selected>1</option>
                                                                    <option value="2">2</option>
                                                                    <option value="3">3</option>
                                                                @endif
                                                                @if($circuito->duracion == 2)
                                                                    <option value="0">0</option>
                                                                    <option value="1">1</option>
                                                                    <option value="2" selected>2</option>
                                                                    <option value="3">3</option>
                                                                @endif
                                                                @if($circuito->duracion == 3)
                                                                    <option value="0">0</option>
                                                                    <option value="1">1</option>
                                                                    <option value="2">2</option>
                                                                    <option value="3" selected>3</option>
                                                                @endif
                                                            </select>

                                                        </div>
                                                        <div class="form-group">
                                                            <label for="frecuencia">Frecuencia</label>
                                                            <select class="form-control" name="frecuencia" id="frecuencia">
                                                                <option value="">--Seleccionar--</option>
                                                                <option value="Diaria">Diaria</option>
                                                                <option value="Semanal">Semanal</option>
                                                                <option value="Quincenal">Quincenal</option>
                                                                <option value="Mensual">Mensual</option>
                                                            </select>

                                                        </div>
                                                        <div class="form-group">
                                                            <label>Precio</label>
                                                            <input type="text" class="form-control" name="precio_desde"
                                                                   id="precio_desde" value="{{ old('precio_desde') }}"
                                                                   placeholder="Precio">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Pax Min</label>
                                                            <input type="text" class="form-control" name="pax_min"
                                                                   id="pax_min" value="{{ old('pax_min') }}"
                                                                   placeholder="Pax Min">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Provincica</label>
                                                            <select class="form-control" id="provincia_id" name="provincia_id" >
                                                                <option value="">--Seleccionar--</option>

                                                                @foreach ($provincias as $key => $c)
                                                                    <option value="{{ $c->id }}">{{ $c->nombre }}</option>

                                                                @endforeach
                                                            </select>

                                                        </div>
                                                        <div class="form-group">
                                                            <label>Imagen</label>
                                                            <input type="file" name="imagen" id="imagen" placeholder="Imagen">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Detalles</label>
                                                            <input type="file" name="detalles" id="detalles" placeholder="Detalle">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Mapa</label>
                                                            <input type="file" name="mapa" id="mapa" placeholder="Mapa">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="dias_antelacion">Oferta Especial</label>
                                                            <select class="form-control" name="oferta_especial" id="oferta_especial">
                                                                <option value="">--Seleccionar--</option>
                                                                <option value="1">Activo</option>
                                                                <option value="0">Inactivo</option>
                                                            </select>

                                                        </div>
                                                        <div class="form-group">
                                                            <label for="dias_antelacion">Estado Circuito</label>
                                                            <select class="form-control" name="esta_activo" id="esta_activo">
                                                                <option value="">--Seleccionar--</option>
                                                                <option value="1">Activo</option>
                                                                <option value="0">Inactivo</option>
                                                            </select>

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
                                        </div>
                                        <!-- /.card -->
                                    </div>
                                </div>
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer fa-pull-right">
                                <div class="pull-right">@include('admin.includes.modals.modaledit')
                                    <a href="" data-toggle="modal" data-target="#modal-cancel" class="btn btn-secondary btn-sm" >Cancelar</a>


                                    <a href="" data-toggle="modal" data-target="#modal-edit-{{ $circuito->id }}" class="btn btn-success btn-sm" ><i class="fas fa-tag">Guardar</i></a>
                                    @include('admin.includes.modals.modalcancel')

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