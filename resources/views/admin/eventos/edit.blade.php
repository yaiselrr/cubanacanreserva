@extends('layouts.admin')
@section('content')
    @include('admin.cancel', ['route'=>route('admin.content.eventos.index')])
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
                        <h3 class="card-title">Editar Evento</h3>
                    </div>
                    <div class="card-body">
                        <form id="addForm" name="addForm" role="form" method="post" enctype="multipart/form-data"
                              action="{{route('admin.content.eventos.update',$evento->id)}}">
                            @csrf
                            @method('PUT')
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
                                                                <div class="form-group">
                                                                    <label>Nombre</label>
                                                                    <input type="text" class="form-control" name="nombre_es"
                                                                           id="nombre_es" value="{{ old('nombre_es',$data['nombre_es']) }}"
                                                                           placeholder="Nombre">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-5">

                                                                <div class="form-group">
                                                                    <label>Imagen</label>
                                                                    <div class="input-group">
                                                                        <input id="files" type="file" name="imagen" accept="image/*" class="custom-file-input">
                                                                        <label class="custom-file-label" for="exampleInputFile">Seleccionar archivo</label>
                                                                    </div>

                                                                    <span class="help-block">{{__('cubanacan.extensiones')}}</span>
                                                                    <div class="mt-3">
                                                                        <output id="list">
                                                                <span>
                                                                    <img src="{{asset('/imagen/eventos'.$evento->imagen)}}" class="thumb img-circle img-thumbnail" alt="Imagen">
                                                                </span>
                                                                        </output>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-5">
                                                                <div class="form-group">
                                                                    <label>Fecha Inicio</label>
                                                                    <input type="date" class="form-control" name="fecha_inicio"
                                                                           id="fecha_inicio"  min="{{  date('Y-m-d')}}" value="{{ old('fecha_inicio',$evento->fecha_inicio) }}"
                                                                    >
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-5">
                                                                <div class="form-group">
                                                                    <label>Fecha Fin</label>
                                                                    <input type="date" class="form-control" name="fecha_fin"
                                                                           id="fecha_fin"  min="{{  date('Y-m-d')}}" value="{{ old('fecha_fin',$evento->fecha_fin) }}"
                                                                    >
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-5">
                                                                <div class="form-group">
                                                                    <label>Lugar</label>
                                                                    <select class="form-control select2bs4"style="width: 100%;" id="lugars_id" name="lugars_id" >
                                                                        <option value="">--Seleccionar--</option>

                                                                        @foreach ($lugares as $key => $c)

                                                                            @if($c->lugars_id == $evento-> lugars_id)
                                                                                <option value="{{ $c->lugars_id }}" selected>{{ $c->nombre }}</option>
                                                                            @else
                                                                                <option value="{{ $c->lugars_id }}">{{ $c->nombre }}</option>
                                                                            @endif

                                                                        @endforeach
                                                                    </select>

                                                                </div> </div>
                                                            <div class="col-sm-5">
                                                                <div class="form-group">
                                                                    <label>Cuota de Inscripción</label>
                                                                    <input type="text" class="form-control" name="cuota"
                                                                           id="cuota" value="{{ old('cuota',$evento->cuota) }}"

                                                                           placeholder="Descripción">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-10">
                                                                <!-- textarea -->
                                                                <div class="form-group">
                                                                    <label>Descripción:*</label>
                                                                    <textarea class="form-control" name="descripcion_es"
                                                                              id="descripcion_es"  rows="3" placeholder="Descripción">{{ old('descripcion_es',$data['descripcion_es']) }}</textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-5">
                                                                <div class="form-group">
                                                                    <label>Convocatoria</label>
                                                                    <input type="file" class="form-control" name="convocatorias" id="convocatorias" placeholder="Convocatoria">
                                                                </div>
                                                                <div><span class="help-block">{{__('cubanacan.extensiones2')}}</span></div>
                                                            </div>
                                                            <div class="col-sm-5">
                                                                <div class="form-group">
                                                                    <label>Programa</label>
                                                                    <input type="file" class="form-control" name="programas" id="programas" placeholder="Programa">
                                                                </div>
                                                                <div><span class="help-block">{{__('cubanacan.extensiones2')}}</span></div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-5">
                                                                <div class="form-group">
                                                                    <label>Días de antelación para reservar</label>
                                                                    <select class="form-control select2bs4"style="width: 100%;" id="dias_antelacions_id" name="dias_antelacions_id" >
                                                                        <option value="">--Seleccionar--</option>

                                                                        @foreach ($dias_antelacion as $key => $c)
                                                                            @if($c->id == $evento-> dias_antelacions_id)
                                                                                <option value="{{ $c->id }}" selected>{{ $c->dias }}</option>
                                                                            @else
                                                                                <option value="{{ $c->id }}">{{ $c->nombre }}</option>
                                                                            @endif

                                                                        @endforeach
                                                                    </select>

                                                                </div> </div>
                                                            <div class="col-sm-5">
                                                                <div class="form-group">
                                                                    <label>Provincia</label>
                                                                    <select class="form-control select2bs4"style="width: 100%;" id="provincia_id" name="provincia_id" >
                                                                        <option value="">--Seleccionar--</option>

                                                                        @foreach ($provincias as $key => $c)
                                                                            @if($c->id == $evento->provincia_id)
                                                                                <option value="{{ $c->id }}" selected>{{ $c->provincia }}</option>
                                                                            @else
                                                                                <option value="{{ $c->id }}">{{ $c->provincia }}</option>
                                                                            @endif

                                                                        @endforeach
                                                                    </select>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-5">
                                                                <label>Es una Oferta Especial:*</label>
                                                                <div class="form-group clearfix">
                                                                    <div class="icheck-primary d-inline">
                                                                        @if($evento->oferta_especial == 1)
                                                                            <input type="checkbox" id="oferta_especial" name="oferta_especial" checked>
                                                                            <label for="oferta_especial">

                                                                            </label>
                                                                        @else
                                                                            <input type="checkbox" id="oferta_especial" name="oferta_especial">
                                                                            <label for="oferta_especial">

                                                                            </label>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-5">
                                                                <div class="form-group">
                                                                    <label>Servicio de Transporte</label>
                                                                    <select class="form-control select2bs4" style="width: 100%;" name="servicio_transporte" >
                                                                        <option value="">--Seleccionar--</option>
                                                                        @foreach($serviciotransportes as $serviciotransporte)
                                                                            @if($serviciotransporte['value'] == $evento->servicio_transporte)
                                                                                <option value="{{$serviciotransporte['value']}}" selected>{{$serviciotransporte['servicotransporte']}}</option>
                                                                            @else
                                                                                <option value="{{$serviciotransporte['value']}}">{{$serviciotransporte['servicotransporte']}}</option>
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
                                                                <label>Descripción</label>
                                                                <input type="text" class="form-control" name="descripcion_en"
                                                                       id="descripcion_en" value="{{ old('descripcion_en') }}"
                                                                       placeholder=" Descripción">
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