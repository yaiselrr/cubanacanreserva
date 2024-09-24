@extends('layouts.admin')
@section('titulo')
    ADICIONAR CIRCUITO
@endsection
@section('content')
    @include('admin.cancel', ['route'=>route('admin.content.circuitos.index')])
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">

                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
                        <li class="breadcrumb-item active">Adicionar Circuito</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

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
                <div class="box box-primary">
                    <form id="addForm" name="addForm" role="form" method="post" enctype="multipart/form-data"
                          action="{{route('admin.content.circuitos.store')}}">
                        @csrf
                        <div class="row">
                            <div class="col-12 col-sm-6 col-lg-12">
                                <div class="card card-dark card-tabs">
                                    <div class="card-header p-0 pt-1">
                                        <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="custom-tabs-one-es-tab" data-toggle="pill" href="#custom-tabs-one-es" role="tab" aria-controls="custom-tabs-one-es" aria-selected="true"><img src="{{ asset('flags/es.png')}}" alt="flag" />&nbsp;&nbsp;ES</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="custom-tabs-one-en-tab" data-toggle="pill" href="#custom-tabs-one-en" role="tab" aria-controls="custom-tabs-one-en" aria-selected="false"><img src="{{ asset('flags/us.png')}}" alt="flag" />&nbsp;&nbsp;EN</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="custom-tabs-one-fr-tab" data-toggle="pill" href="#custom-tabs-one-fr" role="tab" aria-controls="custom-tabs-one-fr" aria-selected="false"><img src="{{ asset('flags/fr.png')}}" alt="flag" />&nbsp;&nbsp;FR</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="custom-tabs-one-dt-tab" data-toggle="pill" href="#custom-tabs-one-dt" role="tab" aria-controls="custom-tabs-one-de" aria-selected="false"><img src="{{ asset('flags/de.png')}}" alt="flag" />&nbsp;&nbsp;DE</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="custom-tabs-one-it-tab" data-toggle="pill" href="#custom-tabs-one-it" role="tab" aria-controls="custom-tabs-one-it" aria-selected="false"><img src="{{ asset('flags/it.png')}}" alt="flag" />&nbsp;&nbsp;IT</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="custom-tabs-one-pt-tab" data-toggle="pill" href="#custom-tabs-one-pt" role="tab" aria-controls="custom-tabs-one-pt" aria-selected="false"><img src="{{ asset('flags/pt.png')}}" alt="flag" />&nbsp;&nbsp;PT</a>
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
                                                        <div class="col-sm-5">
                                                            <!-- text input -->
                                                            <div class="form-group">
                                                                <label>Nombre:*</label>


                                                                <input type="text"
                                                                       class="form-control {{ $errors->has('nombre_es')?'is-invalid':'' }}"
                                                                       name="nombre_es"
                                                                       id="nombre_es" value="{{ old('nombre_es') }}"
                                                                       placeholder="Introduzca Nombre Circuito ...">
                                                                {!! $errors->first('nombre_es', '<div class="invalid-feedback">:message</div>') !!}
                                                            </div>


                                                        </div>
                                                        <div class="col-sm-5">
                                                            <div class="form-group">
                                                                <label>Modalidad</label>
                                                                <select class="form-control select2bs4"
                                                                        style="width: 100%;" id="modalidads_id"
                                                                        name="modalidads_id">
                                                                    <option value="">--Seleccione Modalidad--</option>

                                                                    @foreach ($modalidades as $key => $c)
                                                                        <option value="{{ $c->modalidads_id }}">{{ $c->nombre }}</option>

                                                                    @endforeach
                                                                </select>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-5">
                                                            <div class="form-group">
                                                                <label>Duración</label>
                                                                <select class="form-control select2bs4"
                                                                        style="width: 100%;" id="duracions_id"
                                                                        name="duracions_id">
                                                                    <option value="">--Seleccione Duración--</option>

                                                                    @foreach ($duraciones as $key => $c)
                                                                        <option value="{{ $c->id }}">{{ $c->duracion }}</option>

                                                                    @endforeach
                                                                </select>

                                                            </div>
                                                        </div>
                                                        <div class="col-sm-5">
                                                            <!-- text input -->
                                                            <div class="form-group">
                                                                <label>Itinerario</label>
                                                                <input type="text" class="form-control"
                                                                       name="itinerario_es"
                                                                       id="itinerario_en"
                                                                       value="{{ old('itinerario_es') }}"
                                                                       placeholder="Introduzca itinerario">
                                                            </div>


                                                        </div>

                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-5">
                                                            <!-- checkbox -->
                                                            <label>Idioma:*</label>
                                                            <div class="form-group clearfix">
                                                                <div class="icheck-primary d-inline">
                                                                    <input type="checkbox" id="es" name="es" checked>
                                                                    <label for="es">
                                                                        Español
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary d-inline">
                                                                    <input type="checkbox" id="en" name="en">
                                                                    <label for="en">
                                                                        Inglés
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary d-inline">
                                                                    <input type="checkbox" id="dt" name="dt">
                                                                    <label for="dt">
                                                                        Alemán
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary d-inline">
                                                                    <input type="checkbox" id="fr" name="fr">
                                                                    <label for="fr">
                                                                        Francés
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary d-inline">
                                                                    <input type="checkbox" id="it" name="it">
                                                                    <label for="it">
                                                                        Italiano
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary d-inline">
                                                                    <input type="checkbox" id="pt" name="pt">
                                                                    <label for="pt">
                                                                        Portugués
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div class="col-sm-5">
                                                            <label>Es una Oferta Especial:*</label>
                                                            <div class="form-group clearfix">
                                                                <div class="icheck-primary d-inline">
                                                                    <input type="checkbox" id="oferta_especial"
                                                                           name="oferta_especial" checked>
                                                                    <label for="oferta_especial">

                                                                    </label>
                                                                </div>

                                                            </div>


                                                        </div>


                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-5">
                                                            <div class="form-group">
                                                                <label>Imagen</label>
                                                                <input type="file" class="form-control" name="imagen"
                                                                       id="imagen"
                                                                       placeholder="Imagen">
                                                                <div>
                                                                    <span class="help-block">{{__('cubanacan.extensiones')}}</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-5">
                                                            <div class="form-group">
                                                                <label for="esta_activo">Estado:*</label>
                                                                <select class="form-control select2bs4"
                                                                        style="width: 100%;" name="esta_activo"
                                                                        id="esta_activo">
                                                                    <option value="">--Seleccione Estado--</option>
                                                                    <option value="1">Activo</option>
                                                                    <option value="0">Inactivo</option>
                                                                </select>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-10">
                                                            <!-- textarea -->
                                                            <div class="form-group">
                                                                <label>Descripción:*</label>
                                                                <textarea class="form-control" name="descripcion_es"
                                                                          id="descripcion_es"
                                                                          value="{{ old('descripcion_es') }}" rows="3"
                                                                          placeholder="Introduzca Descripción ..."></textarea>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-sm-5">
                                                            <div class="form-group">
                                                                <label>Fecha Inicio:*</label>
                                                                <input type="date" class="form-control"
                                                                       name="fecha_inicio"
                                                                       id="fecha_inicio"  min="{{  date('Y-m-d')}}"
                                                                       value="{{ old('fecha_inicio') }}"
                                                                >
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-5">
                                                            <div class="form-group">
                                                                <label>Fecha Fin:*</label>
                                                                <input type="date" class="form-control" name="fecha_fin"
                                                                       id="fecha_fin"  min="{{  date('Y-m-d')}}" value="{{ old('fecha_fin') }}"
                                                                >
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-5">
                                                            <div class="form-group">
                                                                <label>Frecuencia</label>
                                                                <select class="form-control select2bs4"
                                                                        style="width: 100%;" id="frecuencias_id"
                                                                        name="frecuencias_id">
                                                                    <option value="">--Seleccione Frecuencia--</option>

                                                                    @foreach ($frecuencias as $key => $c)
                                                                        <option value="{{ $c->frecuencias_id }}">{{ $c->nombre }}</option>

                                                                    @endforeach
                                                                </select>

                                                            </div>
                                                        </div>

                                                        <div class="col-sm-5">
                                                            <div class="form-group">
                                                                <label>Días de la Semana</label>
                                                                <select class="form-control select2bs4"
                                                                        style="width: 100%;" id="dias_semanas_id"
                                                                        name="dias_semanas_id">
                                                                    <option value="">--Seleccione Día--</option>

                                                                    @foreach ($dias_semana as $key => $c)
                                                                        <option value="{{ $c->dias_semanas_id }}">{{ $c->nombre }}</option>

                                                                    @endforeach
                                                                </select>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-5">
                                                            <div class="form-group">
                                                                <label>Detalles</label>
                                                                <input type="file" class="form-control" name="detalles"
                                                                       id="detalles"
                                                                       placeholder="Detalle">
                                                                <div>
                                                                    <span class="help-block">{{__('cubanacan.extensiones3')}}</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-5">
                                                            <div class="form-group">
                                                                <label>Mapa</label>
                                                                <input type="file" class="form-control" name="mapa"
                                                                       id="mapa"
                                                                       placeholder="Mapa">
                                                                <div>
                                                                    <span class="help-block">{{__('cubanacan.extensiones')}}</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-5">
                                                            <!-- text input -->
                                                            <div class="form-group">
                                                                <label>Precio desde:*</label>


                                                                <input type="text"
                                                                       class="form-control {{ $errors->has('precio_desde')?'is-invalid':'' }}"
                                                                       name="precio_desde"
                                                                       id="precio_desde"
                                                                       value="{{ old('precio_desde') }}"
                                                                       placeholder="Introduzca Precio Circuito ...">
                                                                {!! $errors->first('precio_desde', '<div class="invalid-feedback">:message</div>') !!}
                                                            </div>


                                                        </div>
                                                        <div class="col-sm-5">
                                                            <!-- text input -->
                                                            <div class="form-group">
                                                                <label>Precio Pax Min:*</label>


                                                                <input type="text"
                                                                       class="form-control {{ $errors->has('pax_min')?'is-invalid':'' }}"
                                                                       name="pax_min"
                                                                       id="pax_min" value="{{ old('pax_min') }}"
                                                                       placeholder="Introduzca  Pax Min Circuito ...">
                                                                {!! $errors->first('pax_min', '<div class="invalid-feedback">:message</div>') !!}
                                                            </div>


                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-5">

                                                            <div class="form-group">
                                                                <label>Días de antelación para reservar</label>
                                                                <select class="form-control select2bs4"
                                                                        style="width: 100%;" id="dias_antelacions_id"
                                                                        name="dias_antelacions_id">
                                                                    <option value="">--Seleccione Días--</option>

                                                                    @foreach ($dias_antelacion as $key => $c)
                                                                        <option value="{{ $c->id }}">{{ $c->dias }}</option>

                                                                    @endforeach
                                                                </select>

                                                            </div>
                                                        </div>
                                                        <div class="col-sm-5">
                                                            <div class="form-group">
                                                                <label>Provincica origen del circuito </label>
                                                                <select class="form-control select2bs4"
                                                                        style="width: 100%;" id="provincias_id"
                                                                        name="provincias_id">
                                                                    <option value="">--Seleccione Provincia--</option>

                                                                    @foreach ($provincias as $key => $c)
                                                                        <option value="{{ $c->id }}">{{ $c->provincia}}</option>

                                                                    @endforeach
                                                                </select>

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
                                                            <label>Name</label>
                                                            <input type="text" class="form-control"
                                                                   name="nombre_en" id="nombre_en"
                                                                   value="{{ old('nombre_en') }}"
                                                                   placeholder="Intro Buró Name">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Modalidad</label>
                                                            <input type="text" class="form-control" name="modalidad_en"
                                                                   id="modalidad_en" value="{{ old('modalidad_en') }}"
                                                                   placeholder="Introduzca Modalidad">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Itinerario</label>
                                                            <input type="text" class="form-control" name="itinerario_en"
                                                                   id="itinerario_en" value="{{ old('itinerario_en') }}"
                                                                   placeholder="Introduzca itinerario">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Descripción</label>
                                                            <input type="text" class="form-control"
                                                                   name="descripcion_en"
                                                                   id="descripcion_en"
                                                                   value="{{ old('descripcion_en') }}"
                                                                   placeholder="Introduzca Descripción">
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
                                                            <label>Name</label>
                                                            <input type="text" class="form-control"
                                                                   name="nombre_dt" id="nombre_dt"
                                                                   value="{{ old('nombre_dt') }}"
                                                                   placeholder="Buró NameDT">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Modalidad</label>
                                                            <input type="text" class="form-control" name="modalidad_dt"
                                                                   id="modalidad_dt" value="{{ old('modalidad_dt') }}"
                                                                   placeholder="Introduzca Modalidad">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Itinerario</label>
                                                            <input type="text" class="form-control" name="itinerario_dt"
                                                                   id="itinerario_dt" value="{{ old('itinerario_dt') }}"
                                                                   placeholder="Introduzca itinerario">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Descripción</label>
                                                            <input type="text" class="form-control"
                                                                   name="descripcion_dt"
                                                                   id="descripcion_fr"
                                                                   value="{{ old('descripcion_fr') }}"
                                                                   placeholder="Introduzca Descripción">
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
                                                            <label>Name</label>
                                                            <input type="text" class="form-control"
                                                                   name="nombre_fr" id="nombre_fr"
                                                                   value="{{ old('nombre_fr') }}"
                                                                   placeholder="Buró NameFR">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Modalidad</label>
                                                            <input type="text" class="form-control" name="modalidad_fr"
                                                                   id="modalidad_fr" value="{{ old('modalidad_fr') }}"
                                                                   placeholder="Introduzca Modalidad">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Itinerario</label>
                                                            <input type="text" class="form-control" name="itinerario_fr"
                                                                   id="itinerario_fr" value="{{ old('itinerario_fr') }}"
                                                                   placeholder="Introduzca itinerario">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Descripción</label>
                                                            <input type="text" class="form-control"
                                                                   name="descripcion_fr"
                                                                   id="descripcion_fr"
                                                                   value="{{ old('descripcion_fr') }}"
                                                                   placeholder="Introduzca Descripción">
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
                                                            <label>Name</label>
                                                            <input type="text" class="form-control"
                                                                   name="nombre_it" id="nombre_it"
                                                                   value="{{ old('nombre_it') }}"
                                                                   placeholder="Buró NameIT">
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
                                                                   placeholder="Introduzca itinerario">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Descripción</label>
                                                            <input type="text" class="form-control"
                                                                   name="descripcion_it"
                                                                   id="descripcion_it"
                                                                   value="{{ old('descripcion_it') }}"
                                                                   placeholder="Introduzca Descripción">
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
                                                            <label>Name</label>
                                                            <input type="text" class="form-control"
                                                                   name="nombre_pt" id="nombre_pt"
                                                                   value="{{ old('nombre_pt') }}"
                                                                   placeholder="Buró NamePT">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Modalidad</label>
                                                            <input type="text" class="form-control" name="modalidad_pt"
                                                                   id="modalidad_pt" value="{{ old('modalidad_pt') }}"
                                                                   placeholder="Introduzca Modalidad">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Itinerario</label>
                                                            <input type="text" class="form-control" name="itinerario_pt"
                                                                   id="itinerario_pt" value="{{ old('itinerario_pt') }}"
                                                                   placeholder="Introduzca itinerario">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Descripción</label>
                                                            <input type="text" class="form-control"
                                                                   name="descripcion_pt"
                                                                   id="descripcion_pt"
                                                                   value="{{ old('descripcion_pt') }}"
                                                                   placeholder="Introduzca Descripción">
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
                                                <button type="submit" class="btn btn-app"><i class="fas fa-save"></i>Guardar
                                                </button>
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
    </section>
    <!-- /.content -->

    <!-- /.content-wrapper -->

@endsection