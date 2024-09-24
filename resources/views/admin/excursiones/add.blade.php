@extends('layouts.admin')
@section('content')
    @include('admin.cancel', ['route'=>route('admin.content.excursiones.index')])
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Crear Excursiones</h3>
                    </div>
                    <div class="card-body">
                        <form id="form" role="form" method="post" enctype="multipart/form-data"
                              action="{{route('admin.content.excursiones.store')}}">
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
                                                    <a class="nav-link" id="custom-tabs-one-de-tab" data-toggle="pill"
                                                       href="#custom-tabs-one-de" role="tab"
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
                                                     role="tabpanel" aria-labelledby="custom-tabs-one-es-tab">
                                                    <div class="box-body">
                                                        <div class="form-group @error('descripcion_es') has-error @enderror">
                                                            <label for="descripcion">Descripción
                                                                <small class="required" style="color: red"> *</small>
                                                            </label>
                                                            <textarea name="descripcion_es"
                                                                      class="textarea form-control @error('descripcion_es') is-invalid @enderror"
                                                                      style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"
                                                                      placeholder="Descripción">{{ old('descripcion') }}</textarea>
                                                            <!--<span class="error-container" style="color: red"></span>-->
                                                            @error('descripcion_es')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="custom-tabs-one-en" role="tabpanel"
                                                     aria-labelledby="custom-tabs-one-en-tab">
                                                    <div class="box-body">
                                                        <div class="form-group @error('descripcion_en') has-error @enderror">
                                                            <label for="descripcion">Descripción
                                                                {{--<small class="required" style="color: red"> *</small>--}}
                                                            </label>
                                                            <textarea name="descripcion_en"
                                                                      class="textarea form-control @error('descripcion_en') is-invalid @enderror"
                                                                      style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"
                                                                      placeholder="Descripción">{{ old('descripcion') }}</textarea>
                                                            <!--<span class="error-container" style="color: red"></span>-->
                                                            @error('descripcion_en')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="custom-tabs-one-fr" role="tabpanel"
                                                     aria-labelledby="custom-tabs-one-fr-tab">
                                                    <div class="box-body">
                                                        <div class="form-group @error('descripcion_fr') has-error @enderror">
                                                            <label for="descripcion">Descripción
                                                                {{--<small class="required" style="color: red"> *</small>--}}
                                                            </label>
                                                            <textarea name="descripcion_fr"
                                                                      class="textarea form-control @error('descripcion_fr') is-invalid @enderror"
                                                                      style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"
                                                                      placeholder="Descripción">{{ old('descripcion') }}</textarea>
                                                            <!--<span class="error-container" style="color: red"></span>-->
                                                            @error('descripcion_fr')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="custom-tabs-one-de" role="tabpanel"
                                                     aria-labelledby="custom-tabs-one-de-tab">
                                                    <div class="box-body">
                                                        <div class="form-group @error('descripcion_de') has-error @enderror">
                                                            <label for="descripcion">Descripción
                                                                {{--<small class="required" style="color: red"> *</small>--}}
                                                            </label>
                                                            <textarea name="descripcion_de"
                                                                      class="textarea form-control @error('descripcion_de') is-invalid @enderror"
                                                                      style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"
                                                                      placeholder="Descripción">{{ old('descripcion') }}</textarea>
                                                            <!--<span class="error-container" style="color: red"></span>-->
                                                            @error('descripcion_de')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="custom-tabs-one-it" role="tabpanel"
                                                     aria-labelledby="custom-tabs-one-it-tab">
                                                    <div class="box-body">
                                                        <div class="form-group @error('descripcion_it') has-error @enderror">
                                                            <label for="descripcion">Descripción
                                                                {{--<small class="required" style="color: red"> *</small>--}}
                                                            </label>
                                                            <textarea name="descripcion_it"
                                                                      class="textarea form-control @error('descripcion_it') is-invalid @enderror"
                                                                      style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"
                                                                      placeholder="Descripción">{{ old('descripcion') }}</textarea>
                                                            <!--<span class="error-container" style="color: red"></span>-->
                                                            @error('descripcion_it')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="custom-tabs-one-pt" role="tabpanel"
                                                     aria-labelledby="custom-tabs-one-pt-tab">
                                                    <div class="box-body">
                                                        <div class="form-group @error('descripcion_pt') has-error @enderror">
                                                            <label for="descripcion">Descripción
                                                                {{--<small class="required" style="color: red"> *</small>--}}
                                                            </label>
                                                            <textarea name="descripcion_pt"
                                                                      class="textarea form-control @error('descripcion_pt') is-invalid @enderror"
                                                                      style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"
                                                                      placeholder="Descripción">{{ old('descripcion') }}</textarea>
                                                            <!--<span class="error-container" style="color: red"></span>-->
                                                            @error('descripcion_pt')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group @error('imagen') has-error @enderror">
                                                        <label for="imagen">Imagen
                                                            <small class="required" style="color: red"> *</small>
                                                        </label>
                                                        <div class="input-group">
                                                            <input id="files" type="file" accept="image/*" name="imagen"
                                                                   class="custom-file-input @error('imagen') is-invalid @enderror">
                                                            <label class="custom-file-label" for="exampleInputFile">Seleccionar
                                                                archivo</label>
                                                            @error('imagen')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <div>
                                                            <span class="help-block">{{__('cubanacan.dimensiones', ['dim' => '200x200'])}}</span>
                                                        </div>
                                                        <span class="help-block">{{__('cubanacan.extensiones')}}</span>
                                                        <!--<span class="error-container" style="color: red"></span>-->
                                                        <div class="mt-3">
                                                            <output id="list"></output>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group @error('nombre') has-error @enderror">
                                                        <label class="control-label" for="nombre">Nombre de Excursión
                                                            <small class="required" style="color: red"> *</small>
                                                        </label>
                                                        <input type="text"
                                                               class="form-control @error('nombre') is-invalid @enderror"
                                                               name="nombre"
                                                               value="{{ old('nombre') }}"
                                                               placeholder="Nombre de Excursión"></input>
                                                        <!--<span class="error-container" style="color: red"></span>-->
                                                        @error('nombre')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group @error('modalidads_id') has-error @enderror">
                                                        <label class="control-label" for="modalidad">Modalidad
                                                            <small class="required" style="color: red"> *</small>
                                                        </label>
                                                        <select class="form-control select2bs4 @error('modalidads_id') is-invalid @enderror"
                                                                name="modalidads_id">
                                                            <option value="">--Seleccionar--</option>
                                                            @foreach($modalidades as $modalidad)
                                                                <option value="{{$modalidad->modalidads_id}}">{{$modalidad->nombre}}</option>
                                                            @endforeach
                                                        </select>
                                                        <!--<span class="error-container" style="color: red"></span>-->
                                                        @error('modalidads_id')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group @error('duracion_id') has-error @enderror">
                                                        <label class="control-label" for="duracion_id">Duración (horas)
                                                            <small class="required" style="color: red"> *</small>
                                                        </label>
                                                        <select class="form-control select2bs4 @error('duracion_id') is-invalid @enderror"
                                                                name="duracion_id">
                                                            <option value="">--Seleccionar--</option>
                                                            @foreach($duracion as $dura)
                                                                <option value="{{$dura->id}}">{{$dura->duracion}}</option>
                                                            @endforeach
                                                        </select>
                                                        <!--<span class="error-container" style="color: red"></span>-->
                                                        @error('duracion_id')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group @error('territorio_origen_id') has-error @enderror">
                                                        <label class="control-label" for="territorio_origen_id">Territorio
                                                            Origen
                                                            <small class="required" style="color: red"> *</small>
                                                        </label>
                                                        <select class="form-control select2bs4 @error('territorio_origen_id') is-invalid @enderror"
                                                                name="territorio_origen_id">
                                                            <option value="">--Seleccionar--</option>
                                                            @foreach($provincias as $provincia)
                                                                <option value="{{$provincia->id}}">{{$provincia->provincia}}</option>
                                                            @endforeach
                                                        </select>
                                                        <!--<span class="error-container" style="color: red"></span>-->
                                                        @error('territorio_origen_id')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group @error('territorio_destino_id') has-error @enderror">
                                                        <label class="control-label" for="territorio_destino_id">Territorio
                                                            Destino
                                                            <small class="required" style="color: red"> *</small>
                                                        </label>
                                                        <select class="form-control select2bs4 @error('territorio_destino_id') is-invalid @enderror"
                                                                name="territorio_destino_id">
                                                            <option value="">--Seleccionar--</option>
                                                            @foreach($provincias as $provincia)
                                                                <option value="{{$provincia->id}}">{{$provincia->provincia}}</option>
                                                            @endforeach
                                                        </select>
                                                        <!--<span class="error-container" style="color: red"></span>-->
                                                        @error('territorio_destino_id')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group @error('frecuencia_id') has-error @enderror">
                                                        <label class="control-label" for="frecuencia_id">Frecuencia
                                                            <small class="required" style="color: red"> *</small>
                                                        </label>
                                                        <select class="form-control select2bs4 @error('frecuencia_id') is-invalid @enderror"
                                                                name="frecuencia_id">
                                                            <option value="">--Seleccionar--</option>
                                                            @foreach($frecuencia as $frec)
                                                                <option value="{{$frec->frecuencias_id}}">{{$frec->frecuencia}}</option>
                                                            @endforeach
                                                        </select>
                                                        <!--<span class="error-container" style="color: red"></span>-->
                                                        @error('frecuencia_id')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group @error('paxminimo') has-error @enderror">
                                                        <label class="control-label" for="paxminimo">Pax Mínimo
                                                        </label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">$</span>
                                                            </div>
                                                            <input type="text" name="paxminimo"
                                                                   class="form-control @error('paxminimo') is-invalid @enderror"
                                                                   value="{{ old('paxminimo') }}"
                                                                   placeholder="Pax Mínimo">
                                                            <!--<span class="error-container" style="color: red"></span>-->
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">.00</span>
                                                            </div>
                                                            @error('paxminimo')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label class="control-label" for="oferta_especial">Oferta
                                                            Especial</label>
                                                        <select class="form-control select2bs4 @error('oferta_especial') is-invalid @enderror"
                                                                name="oferta_especial">
                                                            <option value="">--Seleccionar--</option>
                                                            @foreach($ofertaespeciales as $ofertaespeciale)
                                                                <option value="{{$ofertaespeciale['value']}}">{{$ofertaespeciale['oferta']}}</option>
                                                            @endforeach
                                                        </select>
                                                        <!--<span class="error-container" style="color: red"></span>-->
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group @error('estado') has-error @enderror">
                                                        <label class="control-label" for="estado">Estado
                                                            <small class="required" style="color: red"> *</small>
                                                        </label>
                                                        <select class="form-control select2bs4 @error('estado') is-invalid @enderror"
                                                                name="estado">
                                                            <option value="">--Seleccionar--</option>
                                                            @foreach($estados as $estado)
                                                                <option value="{{$estado['value']}}">{{$estado['estado']}}</option>
                                                            @endforeach
                                                        </select>
                                                        <!--<span class="error-container" style="color: red"></span>-->
                                                        @error('estado')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group @error('dias_antelacion_reserva_id') has-error @enderror">
                                                        <label class="control-label" for="dias_antelacion_reserva_id">Días
                                                            Antelación Reserva
                                                            <small class="required" style="color: red"> *</small>
                                                        </label>
                                                        <select class="form-control select2bs4 @error('dias_antelacion_reserva_id') is-invalid @enderror"
                                                                name="dias_antelacion_reserva_id" id="dias_antelacion_reserva_id">
                                                            <option value="">--Seleccionar--</option>
                                                            @foreach($diasantelacionreservas as $diasantelacion)
                                                                <option value="{{$diasantelacion->id}}">{{$diasantelacion->dias}}</option>
                                                            @endforeach
                                                        </select>
                                                        <span class="invalid-feedback"
                                                              id="error_dias_antelacion_reserva_id"></span>
                                                        @error('dias_antelacion_reserva_id')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group @error('capacidad') has-error @enderror">
                                                        <label class="control-label" for="capacidad">Capacidad
                                                            <small class="required" style="color: red"> *</small>
                                                        </label>
                                                        <input type="text" name="capacidad"
                                                               class="form-control @error('capacidad') is-invalid @enderror"
                                                               value="{{ old('capacidad') }}" placeholder="Capacidad">
                                                        <!--<span class="error-container" style="color: red"></span>-->
                                                        @error('capacidad')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group @error('fecha_inicio') has-error @enderror">
                                                        <label class="control-label" for="fecha_inicio">Fecha Inicio
                                                            (vigencia)
                                                            <small class="required" style="color: red"> *</small>
                                                        </label>
                                                        <input type="date" disabled name="fecha_inicio"
                                                               class="form-control @error('fecha_inicio') is-invalid @enderror"
                                                               id="fecha_inicio" value="{{ old('fecha_inicio') }}"
                                                               placeholder="Fecha Inicio (vigencia)">
                                                        <span class="invalid-feedback"
                                                              id="error_fecha_inicio"></span>
                                                        @error('fecha_inicio')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group @error('fecha_fin') has-error @enderror">
                                                        <label class="control-label" for="fecha_fin">Fecha Fin
                                                            (vigencia)
                                                            <small class="required" style="color: red"> *</small>
                                                        </label>
                                                        <input type="date" disabled name="fecha_fin"
                                                               class="form-control @error('fecha_fin') is-invalid @enderror"
                                                               id="fecha_fin" value="{{ old('fecha_fin') }}"
                                                               placeholder="Fecha Fin (vigencia)">
                                                        <span class="invalid-feedback"
                                                              id="error_fecha_fin"></span>
                                                        @error('fecha_fin')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group @error('idioma_id') has-error @enderror">
                                                        <label class="control-label" for="idioma_id">Idioma
                                                            <small class="required" style="color: red"> *</small>
                                                        </label>
                                                        <select class="form-control duallistbox @error('idioma_id') is-invalid @enderror"
                                                                multiple="multiple" name="idioma_id[]">
                                                            @foreach($idiomas as $idioma)
                                                                <option value="{{$idioma->id}}">{{$idioma->idioma}}</option>
                                                            @endforeach
                                                        </select>
                                                        <!--<span class="error-container" style="color: red"></span>-->
                                                        @error('idioma_id')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group @error('dias_semana_ids') has-error @enderror">
                                                        <label class="control-label" for="dias_semana_ids">Días de la
                                                            Semana
                                                            <small class="required" style="color: red"> *</small>
                                                        </label>
                                                        <select class="form-control duallistbox @error('dias_semana_ids') is-invalid @enderror"
                                                                multiple="multiple"
                                                                style="width: 100%;" name="dias_semana_ids[]">
                                                            @foreach($diassemanas as $diassemana)
                                                                <option value="{{$diassemana->id}}">{{$diassemana->diassemana}}</option>
                                                            @endforeach
                                                        </select>
                                                        <!--<span class="error-container" style="color: red"></span>-->
                                                        @error('dias_semana_ids')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="custom-control custom-radio">
                                                    <input class="custom-control-input" type="radio"
                                                           id="excursion_auto_clasico"
                                                           name="excursion_auto_clasico"
                                                           @if(old('excursion_auto_clasico')=="on")
                                                           checked @endif>
                                                    <label for="excursion_auto_clasico"
                                                           class="custom-control-label">El precio de la
                                                        excursión es por Auto</label>
                                                </div>
                                                @error('excursion_auto_clasico')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group @error('precio_pax_auto') has-error @enderror">
                                                        <label class="control-label" for="precio_pax_auto">Precio Pax
                                                            Auto
                                                        </label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">$</span>
                                                            </div>
                                                            <input type="text" name="precio_pax_auto"
                                                                   id="precio_pax_auto"
                                                                   class="form-control @error('precio_pax_auto') is-invalid @enderror"
                                                                   value="{{ old('precio_pax_auto') }}" disabled
                                                                   placeholder="Precio Pax Auto">
                                                            <!--<span class="error-container" style="color: red"></span>-->
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">.00</span>
                                                            </div>
                                                            @error('precio_pax_auto')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group @error('hora_salida_auto') has-error @enderror">
                                                        <label for="hora_salida_auto">Hora Salida</label>
                                                        <div class="bootstrap-timepicker">
                                                            <div class="input-group date"
                                                                 data-target-input="nearest">
                                                                <div class="input-group-append"
                                                                     data-target="#timepicker"
                                                                     data-toggle="datetimepicker">
                                                                    <div class="input-group-text"><i
                                                                                class="far fa-clock"></i></div>
                                                                </div>
                                                                <input type="time" disabled
                                                                       class="form-control datetimepicker-input @error('hora_salida_auto') is-invalid @enderror"
                                                                       name="hora_salida_auto" id="hora_salida_auto"
                                                                       placeholder="Hora Salida"
                                                                       value="{{ old('hora_salida_auto') }}"
                                                                       data-target="#timepicker"/>
                                                                @error('hora_salida_auto')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="custom-control custom-radio">
                                                    <input class="custom-control-input" type="radio"
                                                           id="excursion_unica" name="excursion_unica"
                                                           @if(old('excursion_unica')=="on")
                                                           checked @endif>
                                                    <label for="excursion_unica" class="custom-control-label">El
                                                        precio de la excursión es único</label>
                                                </div>
                                                @error('excursion_unica')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group @error('precio_pax_unica') has-error @enderror">
                                                        <label class="control-label" for="precio_pax">Precio x Pax
                                                            <small class="required" style="color: red"> *</small>
                                                        </label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">$</span>
                                                            </div>
                                                            <input type="text" disabled name="precio_pax_unica"
                                                                   id="precio_pax_unica"
                                                                   class="form-control @error('precio_pax_unica') is-invalid @enderror"
                                                                   value="{{ old('precio_pax_unica') }}"
                                                                   placeholder="Precio x Pax">
                                                            <!--<span class="error-container" style="color: red"></span>-->
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">.00</span>
                                                            </div>
                                                            @error('precio_pax_unica')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group @error('precio_ninnos2a12annos_unica') has-error @enderror">
                                                        <label class="control-label" for="precio_ninnos2a12annos_unica">Precio
                                                            x Niño de 2 a 12 años
                                                            <small class="required" style="color: red"> *</small>
                                                        </label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">$</span>
                                                            </div>
                                                            <input type="text" disabled
                                                                   name="precio_ninnos2a12annos_unica"
                                                                   id="precio_ninnos2a12annos_unica"
                                                                   class="form-control @error('precio_ninnos2a12annos_unica') is-invalid @enderror"
                                                                   value="{{ old('precio_ninnos2a12annos_unica') }}"
                                                                   placeholder="Precio x Niño de 2 a 12 años">
                                                            <!--<span class="error-container" style="color: red"></span>-->
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">.00</span>
                                                            </div>
                                                            @error('precio_ninnos2a12annos_unica')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <div class="custom-control custom-radio">
                                                        <input class="custom-control-input" type="radio"
                                                               id="excursion_alimentacion"
                                                               name="excursion_alimentacion"
                                                               @if(old('excursion_alimentacion')=="on")
                                                               checked @endif>
                                                        <label for="excursion_alimentacion"
                                                               class="custom-control-label">El precio de la
                                                            excursión es por la alimentación</label>
                                                    </div>
                                                    @error('excursion_alimentacion')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group @error('precio_pax_almuerzo') has-error @enderror">
                                                        <label class="control-label" for="precio_pax_almuerzo">Precio x
                                                            Pax
                                                            con almuerzo
                                                            <small class="required" style="color: red"> *</small>
                                                        </label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">$</span>
                                                            </div>
                                                            <input type="text" disabled
                                                                   name="precio_pax_almuerzo"
                                                                   id="precio_pax_almuerzo"
                                                                   class="form-control @error('precio_pax_almuerzo') is-invalid @enderror"
                                                                   value="{{ old('precio_pax_almuerzo') }}"
                                                                   placeholder="Precio x Pax con almuerzo">
                                                            <!--<span class="error-container" style="color: red"></span>-->
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">.00</span>
                                                            </div>
                                                            @error('precio_pax_almuerzo')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group @error('precio_ninnos2a12anno_almuerzo') has-error @enderror">
                                                        <label class="control-label"
                                                               for="precio_ninnos2a12anno_almuerzo">Precio
                                                            x Niño de 2 a 12 años con almuerzo
                                                            <small class="required" style="color: red"> *</small>
                                                        </label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">$</span>
                                                            </div>
                                                            <input type="text" disabled
                                                                   name="precio_ninnos2a12anno_almuerzo"
                                                                   id="precio_ninnos2a12anno_almuerzo"
                                                                   class="form-control @error('precio_ninnos2a12anno_almuerzo') is-invalid @enderror"
                                                                   value="{{ old('precio_ninnos2a12anno_almuerzo') }}"
                                                                   placeholder="Precio x Niño de 2 a 12 años con almuerzo">
                                                            <!--<span class="error-container" style="color: red"></span>-->
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">.00</span>
                                                            </div>
                                                            @error('precio_ninnos2a12anno_almuerzo')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group @error('precio_pax_sin_almuerzo') has-error @enderror">
                                                        <label class="control-label" for="precio_pax_sin_almuerzo">Precio
                                                            x
                                                            Pax sin almuerzo:
                                                            <small class="required" style="color: red"> *</small>
                                                        </label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">$</span>
                                                            </div>
                                                            <input type="text" disabled
                                                                   name="precio_pax_sin_almuerzo"
                                                                   id="precio_pax_sin_almuerzo"
                                                                   class="form-control @error('precio_pax_sin_almuerzo') is-invalid @enderror"
                                                                   value="{{ old('precio_pax_sin_almuerzo') }}"
                                                                   placeholder="Precio x Pax sin almuerzo">
                                                            <!--<span class="error-container" style="color: red"></span>-->
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">.00</span>
                                                            </div>
                                                            @error('precio_pax_sin_almuerzo')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group @error('precio_ninnos2a12anno_sin_almuerzo') has-error @enderror">
                                                        <label class="control-label"
                                                               for="precio_ninnos2a12anno_sin_almuerzo">Precio x Niño de
                                                            2 a
                                                            12 años sin almuerzo:
                                                            <small class="required" style="color: red"> *</small>
                                                        </label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">$</span>
                                                            </div>
                                                            <input type="text" disabled
                                                                   name="precio_ninnos2a12anno_sin_almuerzo"
                                                                   id="precio_ninnos2a12anno_sin_almuerzo"
                                                                   class="form-control @error('precio_ninnos2a12anno_sin_almuerzo') is-invalid @enderror"
                                                                   value="{{ old('precio_ninnos2a12anno_sin_almuerzo') }}"
                                                                   placeholder="Precio x Niño de 2 a 12 años sin almuerzo">
                                                            <!--<span class="error-container" style="color: red"></span>-->
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">.00</span>
                                                            </div>
                                                            @error('precio_ninnos2a12anno_sin_almuerzo')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group @error('precio_pax_TI') has-error @enderror">
                                                        <label class="control-label" for="precio_pax_TI">Precio x Pax
                                                            TI:
                                                            <small class="required" style="color: red"> *</small>
                                                        </label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">$</span>
                                                            </div>
                                                            <input type="text" disabled
                                                                   name="precio_pax_TI"
                                                                   id="precio_pax_TI"
                                                                   class="form-control @error('precio_pax_TI') is-invalid @enderror"
                                                                   value="{{ old('precio_pax_TI') }}"
                                                                   placeholder="Precio x Pax TI">
                                                            <!--<span class="error-container" style="color: red"></span>-->
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">.00</span>
                                                            </div>
                                                            @error('precio_pax_TI')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group @error('precio_ninnos2a12anno_TI') has-error @enderror">
                                                        <label class="control-label" for="precio_ninnos2a12anno_TI">Precio
                                                            x
                                                            Niño de 2 a 12 años TI:
                                                            <small class="required" style="color: red"> *</small>
                                                        </label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">$</span>
                                                            </div>
                                                            <input type="text" disabled
                                                                   name="precio_ninnos2a12anno_TI"
                                                                   id="precio_ninnos2a12anno_TI"
                                                                   class="form-control @error('precio_ninnos2a12anno_TI') is-invalid @enderror"
                                                                   value="{{ old('precio_ninnos2a12anno_TI') }}"
                                                                   placeholder="Precio x Niño de 2 a 12 años TI">
                                                            <!--<span class="error-container" style="color: red"></span>-->
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">.00</span>
                                                            </div>
                                                            @error('precio_ninnos2a12anno_TI')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <div class="custom-control custom-radio">
                                                        <input class="custom-control-input" type="radio"
                                                               id="excursion_habitacion"
                                                               name="excursion_habitacion"
                                                               @if(old('excursion_habitacion')=="on")
                                                               checked @endif>
                                                        <label for="excursion_habitacion"
                                                               class="custom-control-label">El precio de la excursión es
                                                            por
                                                            habitaciones</label>
                                                    </div>
                                                    @error('excursion_habitacion')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group @error('precio_pax_hab_sencilla') has-error @enderror">
                                                        <label class="control-label" for="precio_pax_hab_sencilla">Precio
                                                            x
                                                            Pax habitación sencilla:
                                                            <small class="required" style="color: red"> *</small>
                                                        </label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">$</span>
                                                            </div>
                                                            <input type="text" disabled
                                                                   name="precio_pax_hab_sencilla"
                                                                   id="precio_pax_hab_sencilla"
                                                                   class="form-control @error('precio_pax_sin_almuerzo') is-invalid @enderror"
                                                                   value="{{ old('precio_pax_hab_sencilla') }}"
                                                                   placeholder="Precio x Pax habitación sencilla">
                                                            <!--<span class="error-container" style="color: red"></span>-->
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">.00</span>
                                                            </div>
                                                            @error('precio_pax_hab_sencilla')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group @error('precio_ninnos2a12anno_hab_sencilla') has-error @enderror">
                                                        <label class="control-label"
                                                               for="precio_ninnos2a12anno_hab_sencilla">Precio x Pax
                                                            habitación sencilla niños 2 a 12 años:
                                                            <small class="required" style="color: red"> *</small>
                                                        </label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">$</span>
                                                            </div>
                                                            <input type="text" disabled
                                                                   name="precio_ninnos2a12anno_hab_sencilla"
                                                                   id="precio_ninnos2a12anno_hab_sencilla"
                                                                   class="form-control @error('precio_ninnos2a12anno_hab_sencilla') is-invalid @enderror"
                                                                   value="{{ old('precio_ninnos2a12anno_hab_sencilla') }}"
                                                                   placeholder="Precio x Pax habitación sencilla niños 2 a 12 años">
                                                            <!--<span class="error-container" style="color: red"></span>-->
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">.00</span>
                                                            </div>
                                                            @error('precio_ninnos2a12anno_hab_sencilla')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group @error('precio_pax_hab_dobles') has-error @enderror">
                                                        <label class="control-label" for="precio_pax_hab_dobles">Precio
                                                            x
                                                            Pax habitación doble:
                                                            <small class="required" style="color: red"> *</small>
                                                        </label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">$</span>
                                                            </div>
                                                            <input type="text" disabled
                                                                   name="precio_pax_hab_dobles"
                                                                   id="precio_pax_hab_dobles"
                                                                   class="form-control @error('precio_pax_hab_dobles') is-invalid @enderror"
                                                                   value="{{ old('precio_pax_hab_dobles') }}"
                                                                   placeholder="Precio x Pax habitación doble">
                                                            <!--<span class="error-container" style="color: red"></span>-->
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">.00</span>
                                                            </div>
                                                            @error('precio_pax_hab_dobles')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group @error('precio_ninnos2a12anno_hab_dobles') has-error @enderror">
                                                        <label class="control-label"
                                                               for="precio_ninnos2a12anno_hab_dobles">Precio
                                                            x Pax habitación doble niños 2 a 12 años:
                                                            <small class="required" style="color: red"> *</small>
                                                        </label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">$</span>
                                                            </div>
                                                            <input type="text" disabled
                                                                   name="precio_ninnos2a12anno_hab_dobles"
                                                                   id="precio_ninnos2a12anno_hab_dobles"
                                                                   class="form-control @error('precio_ninnos2a12anno_hab_dobles') is-invalid @enderror"
                                                                   value="{{ old('precio_ninnos2a12anno_hab_dobles') }}"
                                                                   placeholder="Precio x Pax habitación doble niños 2 a 12 años">
                                                            <!--<span class="error-container" style="color: red"></span>-->
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">.00</span>
                                                            </div>
                                                            @error('precio_ninnos2a12anno_hab_dobles')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <div class="custom-control custom-radio">
                                                        <input class="custom-control-input" type="radio"
                                                               id="excursion_pinar_vinnales"
                                                               name="excursion_pinar_vinnales"
                                                               @if(old('excursion_pinar_vinnales')=="on")
                                                               checked @endif>
                                                        <label for="excursion_pinar_vinnales"
                                                               class="custom-control-label">El precio de la excursión Pinar del Río o Viñales</label>
                                                    </div>
                                                    @error('excursion_pinar_vinnales')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group @error('precio_pax_Pinar') has-error @enderror">
                                                        <label class="control-label" for="precio_pax_Pinar">Precio x Pax desde Pinar del Río:
                                                            <small class="required" style="color: red"> *</small>
                                                        </label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">$</span>
                                                            </div>
                                                            <input type="text" disabled
                                                                   name="precio_pax_Pinar"
                                                                   id="precio_pax_Pinar"
                                                                   class="form-control @error('precio_pax_Pinar') is-invalid @enderror"
                                                                   value="{{ old('precio_pax_Pinar') }}"
                                                                   placeholder="Precio x Pax desde Pinar del Río">
                                                            <!--<span class="error-container" style="color: red"></span>-->
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">.00</span>
                                                            </div>
                                                            @error('precio_pax_Pinar')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group @error('precio_ninnos2a12anno_Pinar') has-error @enderror">
                                                        <label class="control-label"
                                                               for="precio_ninnos2a12anno_Pinar">Precio x Niños de 2 a 12 años desde Pinar:
                                                            <small class="required" style="color: red"> *</small>
                                                        </label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">$</span>
                                                            </div>
                                                            <input type="text" disabled
                                                                   name="precio_ninnos2a12anno_Pinar"
                                                                   id="precio_ninnos2a12anno_Pinar"
                                                                   class="form-control @error('precio_ninnos2a12anno_Pinar') is-invalid @enderror"
                                                                   value="{{ old('precio_ninnos2a12anno_Pinar') }}"
                                                                   placeholder="Precio x Niños de 2 a 12 años desde Pinar">
                                                            <!--<span class="error-container" style="color: red"></span>-->
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">.00</span>
                                                            </div>
                                                            @error('precio_ninnos2a12anno_Pinar')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group @error('precio_pax_Vinnales') has-error @enderror">
                                                        <label class="control-label" for="precio_pax_hab_dobles">Precio x Pax desde Viñales:
                                                            <small class="required" style="color: red"> *</small>
                                                        </label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">$</span>
                                                            </div>
                                                            <input type="text" disabled
                                                                   name="precio_pax_Vinnales"
                                                                   id="precio_pax_Vinnales"
                                                                   class="form-control @error('precio_pax_Vinnales') is-invalid @enderror"
                                                                   value="{{ old('precio_pax_Vinnales') }}"
                                                                   placeholder="Precio x Pax desde Viñales">
                                                            <!--<span class="error-container" style="color: red"></span>-->
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">.00</span>
                                                            </div>
                                                            @error('precio_pax_Vinnales')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group @error('precio_ninnos2a12anno_Vinnales') has-error @enderror">
                                                        <label class="control-label"
                                                               for="precio_ninnos2a12anno_Vinnales">Precio x Niño de 2 a 12 años desde Viñales:
                                                            <small class="required" style="color: red"> *</small>
                                                        </label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">$</span>
                                                            </div>
                                                            <input type="text" disabled
                                                                   name="precio_ninnos2a12anno_Vinnales"
                                                                   id="precio_ninnos2a12anno_Vinnales"
                                                                   class="form-control @error('precio_ninnos2a12anno_Vinnales') is-invalid @enderror"
                                                                   value="{{ old('precio_ninnos2a12anno_Vinnales') }}"
                                                                   placeholder="Precio x Niño de 2 a 12 años desde Viñales">
                                                            <!--<span class="error-container" style="color: red"></span>-->
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">.00</span>
                                                            </div>
                                                            @error('precio_ninnos2a12anno_Vinnales')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <div class="custom-control custom-radio">
                                                        <input class="custom-control-input" type="radio"
                                                               id="excursion_cicloturismo"
                                                               name="excursion_cicloturismo"
                                                               @if(old('excursion_cicloturismo')=="on")
                                                               checked @endif>
                                                        <label for="excursion_cicloturismo"
                                                               class="custom-control-label">El precio de la excursión por Cicloturismo</label>
                                                    </div>
                                                    @error('excursion_cicloturismo')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group @error('precio_pax_con_canopy') has-error @enderror">
                                                        <label class="control-label" for="precio_pax_con_canopy">Precio x Pax con Canopy:
                                                            <small class="required" style="color: red"> *</small>
                                                        </label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">$</span>
                                                            </div>
                                                            <input type="text" disabled
                                                                   name="precio_pax_con_canopy"
                                                                   id="precio_pax_con_canopy"
                                                                   class="form-control @error('precio_pax_con_canopy') is-invalid @enderror"
                                                                   value="{{ old('precio_pax_con_canopy') }}"
                                                                   placeholder="Precio x Pax sin Canopy">
                                                            <!--<span class="error-container" style="color: red"></span>-->
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">.00</span>
                                                            </div>
                                                            @error('precio_pax_con_canopy')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group @error('precio_pax_sin_canopy') has-error @enderror">
                                                        <label class="control-label"
                                                               for="precio_pax_sin_canopy">Precio x Pax sin Canopy:
                                                            <small class="required" style="color: red"> *</small>
                                                        </label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">$</span>
                                                            </div>
                                                            <input type="text" disabled
                                                                   name="precio_pax_sin_canopy"
                                                                   id="precio_pax_sin_canopy"
                                                                   class="form-control @error('precio_pax_sin_canopy') is-invalid @enderror"
                                                                   value="{{ old('precio_pax_sin_canopy') }}"
                                                                   placeholder="Precio x Pax sin Canopy">
                                                            <!--<span class="error-container" style="color: red"></span>-->
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">.00</span>
                                                            </div>
                                                            @error('precio_pax_sin_canopy')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <div class="custom-control custom-radio">
                                                        <input class="custom-control-input" type="radio"
                                                               id="excursion_delfines"
                                                               name="excursion_delfines"
                                                               @if(old('excursion_delfines')=="on")
                                                               checked @endif>
                                                        <label for="excursion_delfines"
                                                               class="custom-control-label">El precio de la excursión con Delfines</label>
                                                    </div>
                                                    @error('excursion_delfines')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group @error('precio_pax_banno_delfines') has-error @enderror">
                                                        <label class="control-label" for="precio_pax_banno_delfines">Precio x Pax baño con delfines:
                                                            <small class="required" style="color: red"> *</small>
                                                        </label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">$</span>
                                                            </div>
                                                            <input type="text" disabled
                                                                   name="precio_pax_banno_delfines"
                                                                   id="precio_pax_banno_delfines"
                                                                   class="form-control @error('precio_pax_banno_delfines') is-invalid @enderror"
                                                                   value="{{ old('precio_pax_banno_delfines') }}"
                                                                   placeholder="Precio x Pax baño con delfines">
                                                            <!--<span class="error-container" style="color: red"></span>-->
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">.00</span>
                                                            </div>
                                                            @error('precio_pax_banno_delfines')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group @error('precio_ninnos2a12anno_banno_delfines') has-error @enderror">
                                                        <label class="control-label"
                                                               for="precio_ninnos2a12anno_banno_delfines">Precio x Niño de 2 a 12 años baño con delfines:
                                                            <small class="required" style="color: red"> *</small>
                                                        </label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">$</span>
                                                            </div>
                                                            <input type="text" disabled
                                                                   name="precio_ninnos2a12anno_banno_delfines"
                                                                   id="precio_ninnos2a12anno_banno_delfines"
                                                                   class="form-control @error('precio_ninnos2a12anno_banno_delfines') is-invalid @enderror"
                                                                   value="{{ old('precio_ninnos2a12anno_banno_delfines') }}"
                                                                   placeholder="Precio x Niño de 2 a 12 años baño con delfines">
                                                            <!--<span class="error-container" style="color: red"></span>-->
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">.00</span>
                                                            </div>
                                                            @error('precio_ninnos2a12anno_banno_delfines')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group @error('precio_pax_show_delfines') has-error @enderror">
                                                        <label class="control-label" for="precio_pax_show_delfines">Precio x Pax show con delfines:
                                                            <small class="required" style="color: red"> *</small>
                                                        </label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">$</span>
                                                            </div>
                                                            <input type="text" disabled
                                                                   name="precio_pax_show_delfines"
                                                                   id="precio_pax_show_delfines"
                                                                   class="form-control @error('precio_pax_show_delfines') is-invalid @enderror"
                                                                   value="{{ old('precio_pax_show_delfines') }}"
                                                                   placeholder="Precio x Pax show con delfines">
                                                            <!--<span class="error-container" style="color: red"></span>-->
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">.00</span>
                                                            </div>
                                                            @error('precio_pax_show_delfines')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group @error('precio_ninnos2a12anno_show_delfines') has-error @enderror">
                                                        <label class="control-label" for="precio_ninnos2a12anno_show_delfines">Precio x Niño de 2 a 12 años show con delfines:
                                                            <small class="required" style="color: red"> *</small>
                                                        </label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">$</span>
                                                            </div>
                                                            <input type="text" disabled
                                                                   name="precio_ninnos2a12anno_show_delfines"
                                                                   id="precio_ninnos2a12anno_show_delfines"
                                                                   class="form-control @error('precio_ninnos2a12anno_show_delfines') is-invalid @enderror"
                                                                   value="{{ old('precio_ninnos2a12anno_show_delfines') }}"
                                                                   placeholder="Precio x Niño de 2 a 12 años show con delfines">
                                                            <!--<span class="error-container" style="color: red"></span>-->
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">.00</span>
                                                            </div>
                                                            @error('precio_ninnos2a12anno_show_delfines')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('jscript')
    <script>

        $('#dias_antelacion_reserva_id').on('change', function () {

            var dias_antelacion_reserva_id = document.getElementById('dias_antelacion_reserva_id');

            if (dias_antelacion_reserva_id.value != '') {
                $('#fecha_inicio').prop('disabled', false);
                $('#fecha_fin').prop('disabled', false);
                $('#fecha_inicio').val('');
                $('#fecha_fin').val('');

                $('#fecha_fin').removeClass('is-invalid');
                $('#error_fecha_fin').html('');
                $('#fecha_inicio').removeClass('is-invalid');
                $('#fecha_inicio').html('');
                $('#dias_antelacion_reserva_id').removeClass('is-invalid');
                $('#error_dias_antelacion_reserva_id').html('');

            }
            else {
                $('#fecha_inicio').val('');
                $('#fecha_fin').val('');
                $('#fecha_inicio').prop('disabled', true);
                $('#fecha_fin').prop('disabled', true);
                $('#fecha_fin').removeClass('is-invalid');
                $('#error_fecha_fin').html('');
                $('#fecha_inicio').removeClass('is-invalid');
                $('#error_fecha_inicio').html('');
                $('#dias_antelacion_reserva_id').removeClass('is-invalid');
                $('#error_dias_antelacion_reserva_id').html('');
            }
        })

        $("#fecha_inicio").on("input", function () {

            $('#fecha_fin').removeClass('is-invalid');
            $('#error_fecha_fin').html('');
            $('#fecha_fin').val('');
            $('#fecha_inicio').removeClass('is-invalid');
            $('#fecha_inicio').html('');
        });

        $("#fecha_fin").on("input", function () {
            var fecha_total = new Date($("#fecha_inicio").val() + 'T00:00:00');
            var fecha_fin = new Date($('#fecha_fin').val());
            var diasantelacion = $('#dias_antelacion_reserva_id').val();


            if ($('#fecha_inicio').val() != "") {
                fecha_total.setDate(fecha_total.getDate() + parseInt(diasantelacion));
                if (fecha_fin <= fecha_total) {
                    $('#fecha_fin').addClass('is-invalid');
                    $('#error_fecha_fin').html('');
                    $('#error_fecha_fin').append('La fecha seleccionada no cumple con los parámetros mínimos para la reserva. Mínimo ' + diasantelacion + ' días de antelación');
                    $('#fecha_inicio').removeClass('is-invalid');
                    $('#error_fecha_inicio').html('');
                    $('#fecha_fin').val('');
                }
                else {
                    $('#fecha_fin').removeClass('is-invalid');
                    $('#error_fecha_fin').html('');
                }
            }
            else {

                $('#fecha_inicio').addClass('is-invalid');
                $('#error_fecha_inicio').html('');
                $('#error_fecha_inicio').append('Debe seleccionar primero una fecha de incio.');
                $('#fecha_fin').val('');
            }
        });
    </script>
@endsection