@extends('layouts.admin')
@section('content')
    @include('admin.cancel', ['route'=>route('admin.content.circuitos.index')])
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
                        <h3 class="card-title">Crear Autos Flexi Fly & Drive</h3>
                    </div>
                    <div class="card-body">
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


                                                                    <input type="text" class="form-control {{ $errors->has('nombre_es')?'is-invalid':'' }}"
                                                                           name="nombre_es"
                                                                           id="nombre_es" value="{{ old('nombre_es',$data['nombre_es']) }}"
                                                                           placeholder="Nombre">
                                                                    {!! $errors->first('nombre_es', '<div class="invalid-feedback">:message</div>') !!}
                                                                </div>


                                                            </div>
                                                            <div class="col-sm-5">
                                                                <div class="form-group">
                                                                    <label>Modalidad</label>
                                                                    <select class="form-control select2bs4"style="width: 100%;" id="modalidads_id" name="modalidads_id" >
                                                                        <option value="">--Seleccionar--</option>

                                                                        @foreach ($modalidades as $key => $c)
                                                                            @if($c->modalidads_id == $circuito->modalidads_id)
                                                                                <option value="{{ $c->modalidads_id }}" selected>{{ $c->nombre }}</option>
                                                                            @else
                                                                                <option value="{{ $c->modalidads_id }}">{{ $c->nombre }}</option>
                                                                            @endif

                                                                        @endforeach
                                                                    </select>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-5">
                                                                <div class="form-group">
                                                                    <label>Duración</label>
                                                                    <select class="form-control select2bs4"style="width: 100%;" id="duracions_id" name="duracions_id" >
                                                                        <option value="">--Seleccionar--</option>

                                                                        @foreach ($duraciones as $key => $c)
                                                                            @if($c->id == $circuito->duracions_id)
                                                                                <option value="{{ $c->id }}" selected>{{ $c->duracion }}</option>
                                                                            @else
                                                                                <option value="{{ $c->id }}">{{ $c->duracion }}</option>
                                                                            @endif

                                                                        @endforeach
                                                                    </select>

                                                                </div>
                                                            </div>
                                                            <div class="col-sm-5">
                                                                <!-- text input -->
                                                                <div class="form-group">
                                                                    <label>Itinerario</label>
                                                                    <input type="text" class="form-control" name="itinerario_es"
                                                                           id="itinerario_en" value="{{ old('itinerario_es',$data['itinerario_es']) }}"
                                                                           placeholder="Itinerario">
                                                                </div>


                                                            </div>

                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-5">
                                                                <!-- checkbox -->
                                                                <label>Idioma:*</label>
                                                                <div class="form-group clearfix">
                                                                    <div class="icheck-primary d-inline">
                                                                        @if($circuito->es == 1)
                                                                            <input type="checkbox" id="es" name="es" checked>
                                                                            <label for="es">
                                                                                Español
                                                                            </label>
                                                                        @else
                                                                            <input type="checkbox" id="es" name="es">
                                                                            <label for="es">
                                                                                Español
                                                                            </label>
                                                                        @endif
                                                                    </div>
                                                                    <div class="icheck-primary d-inline">
                                                                        @if($circuito->en == 1)
                                                                            <input type="checkbox" id="en" name="en" checked>
                                                                            <label for="en">
                                                                                Inglés
                                                                            </label>
                                                                        @else
                                                                            <input type="checkbox" id="en" name="en">
                                                                            <label for="en">
                                                                                Inglés
                                                                            </label>
                                                                        @endif
                                                                    </div>
                                                                    <div class="icheck-primary d-inline">
                                                                        @if($circuito->dt == 1)
                                                                            <input type="checkbox" id="dt" name="dt" checked>
                                                                            <label for="dt">
                                                                                Alemán
                                                                            </label>
                                                                        @else
                                                                            <input type="checkbox" id="dt" name="dt">
                                                                            <label for="dt">
                                                                                Alemán
                                                                            </label>
                                                                        @endif
                                                                    </div>
                                                                    <div class="icheck-primary d-inline">
                                                                        @if($circuito->fr == 1)
                                                                            <input type="checkbox" id="fr" name="fr" checked>
                                                                            <label for="fr">
                                                                                Francés
                                                                            </label>
                                                                        @else
                                                                            <input type="checkbox" id="fr" name="fr">
                                                                            <label for="fr">
                                                                                Francés
                                                                            </label>
                                                                        @endif
                                                                    </div>
                                                                    <div class="icheck-primary d-inline">
                                                                        @if($circuito->it == 1)
                                                                            <input type="checkbox" id="it" name="it" checked>
                                                                            <label for="it">
                                                                                Italiano
                                                                            </label>
                                                                        @else
                                                                            <input type="checkbox" id="it" name="it">
                                                                            <label for="it">
                                                                                Italiano
                                                                            </label>
                                                                        @endif
                                                                    </div>
                                                                    <div class="icheck-primary d-inline">
                                                                        @if($circuito->pt == 1)
                                                                            <input type="checkbox" id="pt" name="pt" checked>
                                                                            <label for="pt">
                                                                                Portugués
                                                                            </label>
                                                                        @else
                                                                            <input type="checkbox" id="pt" name="pt">
                                                                            <label for="pt">
                                                                                Portugués
                                                                            </label>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>


                                                            <div class="col-sm-5">
                                                                <label>Es una Oferta Especial:*</label>
                                                                <div class="form-group clearfix">
                                                                    <div class="icheck-primary d-inline">
                                                                        @if($circuito->oferta_especial == 1)
                                                                            <input type="checkbox" id="oferta_especial" name="oferta_especial" checked>
                                                                            <label for="oferta_especial">

                                                                            </label>
                                                                        @else
                                                                            <input type="checkbox" id="oferta_especial" name="oferta_especial" >
                                                                            <label for="oferta_especial">

                                                                            </label>
                                                                        @endif
                                                                    </div>

                                                                </div>


                                                            </div>


                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-5">
                                                                <div class="form-group">
                                                                    <label>Imagen</label>
                                                                    <div class="input-group">
                                                                        <input id="files" type="file" name="imagen" accept="image/*" class="custom-file-input {{ $errors->has('imagen')?'is-invalid':'' }}">
                                                                        <label class="custom-file-label" for="exampleInputFile">Seleccionar archivo</label>
                                                                    </div>

                                                                    <span class="help-block">{{__('cubanacan.extensiones')}}</span>
                                                                    <div class="mt-3">
                                                                        <output id="list">
                                                                <span>
                                                                    <img src="{{asset('/storage/'.$circuito->imagen)}}" class="thumb img-circle img-thumbnail" alt="Imagen">
                                                                </span>
                                                                        </output>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-5">
                                                                <div class="form-group">
                                                                    <label for="esta_activo">Estado:*</label>
                                                                    <select class="form-control select2bs4"style="width: 100%;" name="esta_activo" id="esta_activo">

                                                                        <option value="">--Seleccionar--</option>
                                                                        @if($circuito->esta_activo == 1)
                                                                            <option value="1" selected>Activo</option>
                                                                            <option value="0">Inactivo</option>
                                                                        @else
                                                                            <option value="1">Activo</option>
                                                                            <option value="0">Inactivo</option>
                                                                        @endif
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
                                                                              id="descripcion_es" rows="3" placeholder="Descripción">{{ old('descripcion_es',$data['descripcion_es']) }}</textarea>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-sm-5">
                                                                <div class="form-group">
                                                                    <label>Fecha Inicio (vigente):*</label>
                                                                    <input type="date" class="form-control" name="fecha_inicio"
                                                                           id="fecha_inicio"  min="{{  date('Y-m-d')}}" value="{{ old('fecha_inicio',$circuito->fecha_inicio) }}"
                                                                    >
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-5">
                                                                <div class="form-group">
                                                                    <label>Fecha Fin (vigente):*</label>
                                                                    <input type="date" class="form-control" name="fecha_fin"
                                                                           id="fecha_fin"  min="{{  date('Y-m-d')}}" value="{{ old('fecha_fin',$circuito->fecha_fin) }}"
                                                                    >
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-5">
                                                                <div class="form-group">
                                                                    <label>Frecuencia</label>
                                                                    <select class="form-control select2bs4"style="width: 100%;" id="frecuencias_id" name="frecuencias_id" >
                                                                        <option value="">--Seleccionar--</option>

                                                                        @foreach ($frecuencias as $key => $c)
                                                                            @if($c->frecuencias_id == $circuito->frecuencias_id)
                                                                                <option value="{{ $c->frecuencias_id }}" selected>{{ $c->nombre }}</option>
                                                                            @else
                                                                                <option value="{{ $c->frecuencias_id }}">{{ $c->nombre }}</option>
                                                                            @endif

                                                                        @endforeach
                                                                    </select>

                                                                </div>
                                                            </div>

                                                            <div class="col-sm-5">
                                                                <div class="form-group">
                                                                    <label>Días de la Semana</label>
                                                                    <select class="form-control select2bs4"style="width: 100%;" id="dias_semanas_id" name="dias_semanas_id" >
                                                                        <option value="">--Seleccionar--</option>

                                                                        @foreach ($dias_semana as $key => $c)
                                                                            @if($c->dias_semanas_id == $circuito->dias_semanas_id)
                                                                                <option value="{{ $c->dias_semanas_id }}" selected>{{ $c->nombre }}</option>
                                                                            @else
                                                                                <option value="{{ $c->dias_semanas_id }}">{{ $c->nombre }}</option>
                                                                            @endif

                                                                        @endforeach
                                                                    </select>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-5">
                                                                @if($circuito->detalles == null)
                                                                    <div class="form-group">
                                                                        <label>Detalles</label>
                                                                        <input type="file" name="detalles" id="detalles" placeholder="Detalle">
                                                                        <div><span class="help-block">{{__('cubanacan.extensiones3')}}</span></div>
                                                                    </div>
                                                                @else
                                                                    <div class="form-group">
                                                                        <label>Detalles</label>
                                                                        <br/>
                                                                        <img src="{{asset('adminLTE/dist/img/pdf.jpg')}}" alt="" width="100">
                                                                        <br/>
                                                                        <input type="file" name="detalles" id="detalles" placeholder="Detalle">
                                                                    </div>
                                                                @endif
                                                            </div>
                                                            <div class="col-sm-5">
                                                                <div class="form-group">
                                                                    <label>Mapa</label>
                                                                    <br/>
                                                                    <img src="{{ asset('mapa/circuitos/'.$circuito->mapa) }}" alt="" width="200">
                                                                    <div><span class="help-block">{{__('cubanacan.extensiones')}}</span></div>
                                                                    <br/>
                                                                    <input type="file" name="mapa" id="mapa" placeholder="Mapa">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-5">
                                                                <!-- text input -->
                                                                <div class="form-group">
                                                                    <label>Precio desde:*</label>


                                                                    <input type="text" class="form-control {{ $errors->has('precio_desde')?'is-invalid':'' }}"
                                                                           name="precio_desde"
                                                                           id="precio_desde" value="{{ old('precio_desde',$circuito->precio_desde) }}"
                                                                           placeholder="Precio desde">
                                                                    {!! $errors->first('precio_desde', '<div class="invalid-feedback">:message</div>') !!}
                                                                </div>


                                                            </div>
                                                            <div class="col-sm-5">
                                                                <!-- text input -->
                                                                <div class="form-group">
                                                                    <label>Precio Pax Min:*</label>


                                                                    <input type="text" class="form-control {{ $errors->has('pax_min')?'is-invalid':'' }}"
                                                                           name="pax_min"
                                                                           id="pax_min" value="{{ old('pax_min',$circuito->pax_min) }}"
                                                                           placeholder="Pax Min">
                                                                    {!! $errors->first('pax_min', '<div class="invalid-feedback">:message</div>') !!}
                                                                </div>


                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-5">

                                                                <div class="form-group">
                                                                    <label>Días de antelación para reservar</label>
                                                                    <select class="form-control select2bs4"style="width: 100%;" id="dias_antelacions_id" name="dias_antelacions_id" >
                                                                        <option value="">--Seleccionar--</option>

                                                                        @foreach ($dias_antelacion as $key => $c)
                                                                            @if($c->id == $circuito->dias_antelacions_id)
                                                                                <option value="{{ $c->id }}" selected>{{ $c->dias }}</option>
                                                                            @else
                                                                                <option value="{{ $c->id }}" selected>{{ $c->dias }}</option>
                                                                            @endif

                                                                        @endforeach
                                                                    </select>

                                                                </div>
                                                            </div>
                                                            <div class="col-sm-5">
                                                                <div class="form-group">
                                                                    <label>Provincica origen del circuito </label>
                                                                    <select class="form-control select2bs4"style="width: 100%;" id="provincias_id" name="provincias_id" >
                                                                        <option value="">--Seleccionar--</option>

                                                                        @foreach ($provincias as $key => $c)
                                                                            @if($c->id == $circuito->provincias_id)
                                                                                <option value="{{ $c->id }}" selected>{{ $c->provincia}}</option>
                                                                            @else
                                                                                <option value="{{ $c->id }}">{{ $c->provincia}}</option>
                                                                            @endif
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
                                                <div class="tab-pane fade" id="custom-tabs-one-dt" role="tabpanel"
                                                     aria-labelledby="custom-tabs-one-dt-tab">
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
                                                                       id="descripcion_dt" value="{{ old('descripcion_dt') }}"
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

                                                    <button type="submit" class="btn btn-app"> <i class="fas fa-save"></i>Guardar</button>
                                                    <a data-toggle="modal" data-target="#modal-cancel" class="btn btn-app">
                                                        <i class="fas fa-times-circle"></i> Cancelar
                                                    </a>
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