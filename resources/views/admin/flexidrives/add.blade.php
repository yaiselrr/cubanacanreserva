@extends('layouts.admin')
@section('content')
    @include('admin.cancel', ['route'=>route('admin.content.flexi-drive.index')])
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Crear Flexi & Drive</h3>
                    </div>
                    <div class="card-body">
                        <form id="form" role="form" method="post" enctype="multipart/form-data" action="{{route('admin.content.flexi-drive.store')}}">
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
                                                    <a class="nav-link" id="custom-tabs-one-de-tab" data-toggle="pill" href="#custom-tabs-one-de" role="tab" aria-controls="custom-tabs-one-de" aria-selected="false"><img src="{{ asset('flags/de.png')}}" alt="flag" />&nbsp;&nbsp;DE</a>
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
                                                <div class="tab-pane fade show active" id="custom-tabs-one-es" role="tabpanel" aria-labelledby="custom-tabs-one-es-tab">
                                                    <div class="box-body">
                                                        <div class="form-group @error('descripcion_general_es') has-error @enderror">
                                                            <label for="descripcion_general">Descripción General<small class="required" style="color: red"> *</small></label>
                                                            <textarea class="textarea form-control @error('descripcion_general_es') is-invalid @enderror" name="descripcion_general_es" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"
                                                                      placeholder="Descripción General">{{ old('descripcion_general')}}</textarea>
                                                            <!--<span class="error-container" style="color: red"></span>--> </span>
                                                            @error('descripcion_general_es')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group @error('descripcion_hoteles_es') has-error @enderror">
                                                            <label for="descripcion_hoteles">Descripción Hoteles<small class="required" style="color: red"> *</small></label>
                                                            <textarea name="descripcion_hoteles_es" class="textarea form-control @error('descripcion_hoteles_es') is-invalid @enderror" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"
                                                                      placeholder="Descripción Hoteles">{{ old('descripcion_hoteles') }}</textarea>
                                                            <!--<span class="error-container" style="color: red"></span>-->
                                                            @error('descripcion_hoteles_es')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group @error('descripcion_autos_es') has-error @enderror">
                                                            <label for="descripcion_autos">Descripción Autos<small class="required" style="color: red"> *</small></label>
                                                            <textarea name="descripcion_autos_es" class="textarea form-control @error('descripcion_autos_es') is-invalid @enderror" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"
                                                                      placeholder="Descripción Autos">{{ old('descripcion_autos') }}</textarea>
                                                            <!--<span class="error-container" style="color: red"></span>-->
                                                            @error('descripcion_autos_es')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="custom-tabs-one-en" role="tabpanel" aria-labelledby="custom-tabs-one-en-tab">
                                                    <div class="box-body">
                                                        <div class="form-group @error('descripcion_general_en') has-error @enderror">
                                                            <label for="descripcion_general">Descripción General{{--<small class="required" style="color: red"> *</small>--}}</label>
                                                            <textarea class="textarea form-control @error('descripcion_general_en') is-invalid @enderror" name="descripcion_general_en" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"
                                                                      placeholder="Descripción General">{{ old('descripcion_general') }}</textarea>
                                                            <!--<span class="error-container" style="color: red"></span>-->
                                                            @error('descripcion_general_en')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group @error('descripcion_hoteles_en') has-error @enderror">
                                                            <label for="descripcion_hoteles">Descripción Hoteles{{--<small class="required" style="color: red"> *</small>--}}</label>
                                                            <textarea name="descripcion_hoteles_en" class="textarea form-control @error('descripcion_hoteles_en') is-invalid @enderror" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"
                                                                      placeholder="Descripción Hoteles">{{ old('descripcion_hoteles') }}</textarea>
                                                            <!--<span class="error-container" style="color: red"></span>-->
                                                            @error('descripcion_hoteles_en')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group @error('descripcion_autos_en') has-error @enderror">
                                                            <label for="descripcion_autos">Descripción Autos{{--<small class="required" style="color: red"> *</small>--}}</label>
                                                            <textarea name="descripcion_autos_en" class="textarea form-control @error('descripcion_autos_en') is-invalid @enderror" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"
                                                                      placeholder="Descripción Autos">{{ old('descripcion_autos') }}</textarea>
                                                            <!--<span class="error-container" style="color: red"></span>-->
                                                            @error('descripcion_autos_en')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="custom-tabs-one-fr" role="tabpanel" aria-labelledby="custom-tabs-one-fr-tab">
                                                    <div class="box-body">
                                                        <div class="form-group @error('descripcion_general_fr') has-error @enderror">
                                                            <label for="descripcion_general">Descripción General{{--<small class="required" style="color: red"> *</small>--}}</label>
                                                            <textarea class="textarea form-control @error('descripcion_general_fr') is-invalid @enderror" name="descripcion_general_fr" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"
                                                                      placeholder="Descripción General">{{ old('descripcion_general') }}</textarea>
                                                            <!--<span class="error-container" style="color: red"></span>-->
                                                            @error('descripcion_general_fr')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group @error('descripcion_hoteles_fr') has-error @enderror">
                                                            <label for="descripcion_hoteles">Descripción Hoteles{{--<small class="required" style="color: red"> *</small>--}}</label>
                                                            <textarea name="descripcion_hoteles_fr" class="textarea form-control @error('descripcion_hoteles_fr') is-invalid @enderror" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"
                                                                      placeholder="Descripción Hoteles">{{ old('descripcion_hoteles') }}</textarea>
                                                            <!--<span class="error-container" style="color: red"></span>-->
                                                            @error('descripcion_hoteles_fr')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group @error('descripcion_autos_fr') has-error @enderror">
                                                            <label for="descripcion_autos">Descripción Autos{{--<small class="required" style="color: red"> *</small>--}}</label>
                                                            <textarea name="descripcion_autos_fr" class="textarea form-control @error('descripcion_autos_fr') is-invalid @enderror" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"
                                                                      placeholder="Descripción Autos">{{ old('descripcion_autos') }}</textarea>
                                                            <!--<span class="error-container" style="color: red"></span>-->
                                                            @error('descripcion_autos_fr')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="custom-tabs-one-de" role="tabpanel" aria-labelledby="custom-tabs-one-de-tab">
                                                    <div class="box-body">
                                                        <div class="form-group @error('descripcion_general_de') has-error @enderror">
                                                            <label for="descripcion_general">Descripción General{{--<small class="required" style="color: red"> *</small>--}}</label>
                                                            <textarea class="textarea form-control @error('descripcion_general_de') is-invalid @enderror" name="descripcion_general_de" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"
                                                                      placeholder="Descripción General">{{ old('descripcion_general') }}</textarea>
                                                            <!--<span class="error-container" style="color: red"></span>-->
                                                            @error('descripcion_general_de')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group @error('descripcion_hoteles_de') has-error @enderror">
                                                            <label for="descripcion_hoteles">Descripción Hoteles{{--<small class="required" style="color: red"> *</small>--}}</label>
                                                            <textarea name="descripcion_hoteles_de" class="textarea form-control @error('descripcion_hoteles_de') is-invalid @enderror" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"
                                                                      placeholder="Descripción Hoteles">{{ old('descripcion_hoteles') }}</textarea>
                                                            <!--<span class="error-container" style="color: red"></span>-->
                                                            @error('descripcion_hoteles_de')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group @error('descripcion_autos_de') has-error @enderror">
                                                            <label for="descripcion_autos">Descripción Autos{{--<small class="required" style="color: red"> *</small>--}}</label>
                                                            <textarea name="descripcion_autos_de" class="textarea form-control @error('descripcion_autos_de') is-invalid @enderror" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"
                                                                      placeholder="Descripción Autos">{{ old('descripcion_autos') }}</textarea>
                                                            <!--<span class="error-container" style="color: red"></span>-->
                                                            @error('descripcion_autos_de')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="custom-tabs-one-it" role="tabpanel" aria-labelledby="custom-tabs-one-it-tab">
                                                    <div class="box-body">
                                                        <div class="form-group @error('descripcion_general_it') has-error @enderror">
                                                            <label for="descripcion_general">Descripción General{{--<small class="required" style="color: red"> *</small>--}}</label>
                                                            <textarea class="textarea form-control @error('descripcion_general_it') is-invalid @enderror" name="descripcion_general_it" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"
                                                                      placeholder="Descripción General">{{ old('descripcion_general') }}</textarea>
                                                            <!--<span class="error-container" style="color: red"></span>-->
                                                            @error('descripcion_general_it')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group @error('descripcion_hoteles_it') has-error @enderror">
                                                            <label for="descripcion_hoteles">Descripción Hoteles{{--<small class="required" style="color: red"> *</small>--}}</label>
                                                            <textarea name="descripcion_hoteles_it" class="textarea form-control @error('descripcion_hoteles_it') is-invalid @enderror" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"
                                                                      placeholder="Descripción Hoteles">{{ old('descripcion_hoteles') }}</textarea>
                                                            <!--<span class="error-container" style="color: red"></span>-->
                                                            @error('descripcion_hoteles_it')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group @error('descripcion_autos_it') has-error @enderror">
                                                            <label for="descripcion_autos">Descripción Autos{{--<small class="required" style="color: red"> *</small>--}}</label>
                                                            <textarea name="descripcion_autos_it" class="textarea form-control @error('descripcion_autos_it') is-invalid @enderror" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"
                                                                      placeholder="Descripción Autos">{{ old('descripcion_autos') }}</textarea>
                                                            <!--<span class="error-container" style="color: red"></span>-->
                                                            @error('descripcion_autos_it')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="custom-tabs-one-pt" role="tabpanel" aria-labelledby="custom-tabs-one-pt-tab">
                                                    <div class="box-body">
                                                        <div class="form-group @error('descripcion_general_pt') has-error @enderror">
                                                            <label for="descripcion_general">Descripción General{{--<small class="required" style="color: red"> *</small>--}}</label>
                                                            <textarea class="textarea form-control @error('descripcion_general_pt') is-invalid @enderror" name="descripcion_general_pt" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"
                                                                      placeholder="Descripción General">{{ old('descripcion_general') }}</textarea>
                                                            <!--<span class="error-container" style="color: red"></span>-->
                                                            @error('descripcion_general_pt')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group @error('descripcion_hoteles_pt') has-error @enderror">
                                                            <label for="descripcion_hoteles">Descripción Hoteles{{--<small class="required" style="color: red"> *</small>--}}</label>
                                                            <textarea name="descripcion_hoteles_pt" class="textarea form-control @error('descripcion_hoteles_pt') is-invalid @enderror" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"
                                                                      placeholder="Descripción Hoteles">{{ old('descripcion_hoteles') }}</textarea>
                                                            <!--<span class="error-container" style="color: red"></span>-->
                                                            @error('descripcion_hoteles_pt')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group @error('descripcion_autos_pt') has-error @enderror">
                                                            <label for="descripcion_autos">Descripción Autos{{--<small class="required" style="color: red"> *</small>--}}</label>
                                                            <textarea name="descripcion_autos_pt" class="textarea form-control @error('descripcion_autos_pt') is-invalid @enderror" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"
                                                                      placeholder="Descripción Autos">{{ old('descripcion_autos') }}</textarea>
                                                            <!--<span class="error-container" style="color: red"></span>-->
                                                            @error('descripcion_autos_pt')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group @error('imagen') has-error @enderror">
                                                        <label for="imagen">Imagen<small class="required" style="color: red"> *</small></label>
                                                        <div class="input-group">
                                                            <input id="files" type="file" accept="image/*" name="imagen" class="custom-file-input @error('imagen') is-invalid @enderror">
                                                            <label class="custom-file-label" for="exampleInputFile">Seleccionar archivo</label>
                                                            @error('imagen')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <div><span class="help-block">{{__('cubanacan.dimensiones', ['dim' => '200x200'])}}</span></div>
                                                        <span class="help-block">{{__('cubanacan.extensiones')}}</span>
                                                        <!--<span class="error-container" style="color: red"></span>-->
                                                        <div class="mt-3">
                                                            <output id="list"></output>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group @error('tarifario_FFD') has-error @enderror">
                                                        <label for="tarifario">Tarifario FFD<small class="required" style="color: red"> *</small></label>
                                                        <div class="input-group">
                                                            <input type="file" accept="image/*" name="tarifario_FFD" id="tarifario" class="custom-file-input @error('tarifario_FFD') is-invalid @enderror">
                                                            <label class="custom-file-label" for="exampleInputFile">Seleccionar archivo</label>
                                                            @error('tarifario_FFD')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <div><span class="help-block">{{__('cubanacan.extensiones1')}}</span></div>
                                                        <!--<span class="error-container" style="color: red"></span>-->
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group @error('fichero_informacion_ampliada') has-error @enderror">
                                                        <label for="fichero_informacion_ampliada">Información ampliada<small class="required" style="color: red"> *</small></label>
                                                        <div class="input-group">
                                                            <input type="file" accept="image/*" name="fichero_informacion_ampliada"
                                                                   id="fichero_informacion_ampliada" class="custom-file-input @error('fichero_informacion_ampliada') is-invalid @enderror">
                                                            <label class="custom-file-label" for="exampleInputFile">Seleccionar archivo</label>
                                                            @error('fichero_informacion_ampliada')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <div><span class="help-block">{{__('cubanacan.extensiones2')}}</span></div>
                                                        <!--<span class="error-container" style="color: red"></span>-->
                                                    </div>
                                                </div>

                                                <div class="col-sm-6">
                                                    <div class="form-group @error('fichero_listado_hoteles') has-error @enderror">
                                                        <label for="fichero_listado_hoteles">Listado de Hoteles<small class="required" style="color: red"> *</small></label>
                                                        <div class="input-group">
                                                            <input type="file" accept="image/*" name="fichero_listado_hoteles" id="fichero_listado_hoteles"
                                                                   class="custom-file-input @error('fichero_listado_hoteles') is-invalid @enderror">
                                                            <label class="custom-file-label" for="exampleInputFile">Seleccionar archivo</label>
                                                            @error('fichero_listado_hoteles')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <div> <span class="help-block">{{__('cubanacan.extensiones2')}}</span></div>
                                                        <!--<span class="error-container" style="color: red"></span>-->
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group @error('dias_antelacion_rese_baja_id') has-error @enderror">
                                                        <label class="control-label" for="diasantelacion">Dias Antelación
                                                            Reserva Temporada Baja
                                                            <small class="required" style="color: red"> *</small>
                                                        </label>
                                                        <select class="form-control select2bs4 @error('dias_antelacion_rese_baja_id') is-invalid @enderror" name="dias_antelacion_rese_baja_id">
                                                            <option value="">--Seleccionar--</option>
                                                            @foreach($diasantelacionreservas as $diasantelacionreserva)
                                                                    <option value="{{$diasantelacionreserva->id}}">{{$diasantelacionreserva->dias}}</option>
                                                            @endforeach
                                                        </select>
                                                        <!--<span class="error-container" style="color: red"></span>-->
                                                        @error('dias_antelacion_rese_baja_id')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group @error('dias_antelacion_rese_alta_id') has-error @enderror">
                                                        <label class="control-label" for="diasantelacion">Dias Antelación
                                                            Reserva Temporada Alta
                                                            <small class="required" style="color: red"> *</small>
                                                        </label>
                                                        <select class="form-control select2bs4 @error('dias_antelacion_rese_alta_id') is-invalid @enderror" name="dias_antelacion_rese_alta_id">
                                                            <option value="">--Seleccionar--</option>
                                                            @foreach($diasantelacionreservas as $diasantelacionreserva)
                                                                    <option value="{{$diasantelacionreserva->id}}">{{$diasantelacionreserva->dias}}</option>
                                                            @endforeach
                                                        </select>
                                                        <!--<span class="error-container" style="color: red"></span>-->
                                                        @error('dias_antelacion_rese_alta_id')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
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
                                        <button type="submit" class="btn btn-app"> <i class="fas fa-save"></i>Guardar</button>
                                        <a type="button" class="btn btn-app" data-toggle="modal" data-target="#modal-cancel"><i class="fas fa-times-circle"></i>Cancelar</a>
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