@extends('layouts.admin')
@section('content')
    @include('admin.cancel', ['route'=>route('admin.content.autos-flexifly-drive.index')])
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Crear Autos Flexi Fly & Drive</h3>
                    </div>
                    <div class="card-body">
                        <form id="addform" role="form" method="post" enctype="multipart/form-data" action="{{route('admin.content.autos-flexifly-drive.store')}}">
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
                                                        <div class="form-group @error('caracteristicas_es') has-error @enderror">
                                                            <label for="caracteristicas">Características<small class="required" style="color: red"> *</small></label>
                                                            <textarea type="text" name="caracteristicas_es" class="textarea form-control @error('caracteristicas_es') is-invalid @enderror"
                                                                      placeholder="Características">{{ old('caracteristicas') }}</textarea>
                                                            <!--<span class="error-container" style="color: red"></span>-->
                                                            @error('caracteristicas_es')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="custom-tabs-one-en" role="tabpanel" aria-labelledby="custom-tabs-one-en-tab">
                                                    <div class="box-body">
                                                        <div class="form-group @error('caracteristicas_en') has-error @enderror">
                                                            <label for="caracteristicas">Características{{--<small class="required" style="color: red"> *</small>--}}</label>
                                                            <textarea name="caracteristicas_en" class="textarea form-control @error('caracteristicas_en') is-invalid @enderror"
                                                                      placeholder="Características">{{ old('caracteristicas') }}</textarea>
                                                            <!--<span class="error-container" style="color: red"></span>-->
                                                            @error('caracteristicas_en')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="custom-tabs-one-fr" role="tabpanel" aria-labelledby="custom-tabs-one-fr-tab">
                                                    <div class="box-body">
                                                        <div class="form-group @error('caracteristicas_fr') has-error @enderror">
                                                            <label for="caracteristicas">Características{{--<small class="required" style="color: red"> *</small>--}}</label>
                                                            <textarea name="caracteristicas_fr" class="textarea form-control @error('caracteristicas_fr') is-invalid @enderror"
                                                                      placeholder="Características">{{ old('caracteristicas') }}</textarea>
                                                            <!--<span class="error-container" style="color: red"></span>-->
                                                            @error('caracteristicas_fr')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="custom-tabs-one-de" role="tabpanel" aria-labelledby="custom-tabs-one-de-tab">
                                                    <div class="box-body">
                                                        <div class="form-group @error('caracteristicas_de') has-error @enderror">
                                                            <label for="caracteristicas">Características{{--<small class="required" style="color: red"> *</small>--}}</label>
                                                            <textarea name="caracteristicas_de" class="textarea form-control @error('caracteristicas_de') is-invalid @enderror"
                                                                      placeholder="Características">{{ old('caracteristicas') }}</textarea>
                                                            <!--<span class="error-container" style="color: red"></span>-->
                                                            @error('caracteristicas_de')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="custom-tabs-one-it" role="tabpanel" aria-labelledby="custom-tabs-one-it-tab">
                                                    <div class="box-body">
                                                        <div class="form-group @error('caracteristicas_it') has-error @enderror">
                                                            <label for="caracteristicas">Características{{--<small class="required" style="color: red"> *</small>--}}</label>
                                                            <textarea name="caracteristicas_it" class="textarea form-control @error('caracteristicas_it') is-invalid @enderror"
                                                                      placeholder="Características">{{ old('caracteristicas') }}</textarea>
                                                            <!--<span class="error-container" style="color: red"></span>-->
                                                            @error('caracteristicas_it')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="custom-tabs-one-pt" role="tabpanel" aria-labelledby="custom-tabs-one-pt-tab">
                                                    <div class="box-body">
                                                        <div class="form-group @error('caracteristicas_pt') has-error @enderror">
                                                            <label for="caracteristicas">Características{{--<small class="required" style="color: red"> *</small>--}}</label>
                                                            <textarea name="caracteristicas_pt" class="textarea form-control @error('caracteristicas_pt') is-invalid @enderror"
                                                                      placeholder="Características">{{ old('caracteristicas') }}</textarea>
                                                            <!--<span class="error-container" style="color: red"></span>-->
                                                            @error('caracteristicas_pt')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="box-body">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group @error('categoria') has-error @enderror">
                                                    <label class="control-label" for="categoria">Categoría
                                                        <small class="required" style="color: red"> *</small>
                                                    </label>
                                                    <input type="text" name="categoria" class="form-control @error('categoria') is-invalid @enderror"
                                                           value="{{ old('categoria') }}" placeholder="Categoría">
                                                    <!--<span class="error-container" style="color: red"></span>-->
                                                    @error('categoria')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group @error('rentadora') has-error @enderror">
                                                    <label class="control-label" for="rentadora">Rentadora
                                                        <small class="required" style="color: red"> *</small>
                                                    </label>
                                                    <input type="text" name="rentadora" class="form-control @error('rentadora') is-invalid @enderror"
                                                           value="{{ old('rentadora') }}" placeholder="Rentadora">
                                                    <!--<span class="error-container" style="color: red"></span>-->
                                                    @error('rentadora')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group @error('imagen') has-error @enderror">
                                                    <label for="imagen">Imagen<small class="required" style="color: red"> *</small></label>
                                                    <div class="input-group">
                                                            <input type="file" class="custom-file-input @error('imagen') is-invalid @enderror"
                                                                   name="imagen" id="exampleInputFile">
                                                            <label class="custom-file-label" for="exampleInputFile">Seleccionar archivo</label>
                                                            @error('imagen')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                    </div>
                                                </div>
                                                <div><span class="help-block">{{__('cubanacan.dimensiones', ['dim' => '1349X480'])}}</span></div>
                                                <span class="help-block">{{__('cubanacan.extensiones')}}</span>
                                                <div class="mt-3">
                                                    <output id="list"></output>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group @error('tipo') has-error @enderror">
                                                    <label class="control-label" for="tipo">Tipo
                                                        <small class="required" style="color: red"> *</small>
                                                    </label>
                                                    <input type="text" name="tipo" class="form-control @error('tipo') is-invalid @enderror"
                                                           value="{{ old('tipo') }}" placeholder="Tipo">
                                                    <!--<span class="error-container" style="color: red"></span>-->
                                                    @error('tipo')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group @error('capacidad_pasajero') has-error @enderror">
                                                    <label class="control-label" for="capacidad_pasajero">Capacidad Pasajeros
                                                        <small class="required" style="color: red"> *</small>
                                                    </label>
                                                    <input type="text" name="capacidad_pasajero" class="form-control @error('capacidad_pasajero') is-invalid @enderror"
                                                           value="{{ old('capacidad_pasajero') }}" placeholder="Capacidad Pasajeros">
                                                    <!--<span class="error-container" style="color: red"></span>-->
                                                    @error('capacidad_pasajero')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group @error('trasnmision') has-error @enderror">
                                                    <label class="control-label" for="trasnmision">Trasnmisión
                                                        <small class="required" style="color: red"> *</small>
                                                    </label>
                                                    <input type="text" name="trasnmision" class="form-control @error('trasnmision') is-invalid @enderror"
                                                           value="{{ old('trasnmision') }}" placeholder="Trasnmisión">
                                                    <!--<span class="error-container" style="color: red"></span>-->
                                                    @error('trasnmision')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group @error('aire_acondicionado') has-error @enderror">
                                                    <label class="control-label" for="aire_acondicionado">Aire Acondicionado
                                                        Reserva
                                                        <small class="required" style="color: red"> *</small>
                                                    </label>
                                                    <select class="form-control select2bs4 @error('aire_acondicionado') is-invalid @enderror" name="aire_acondicionado">
                                                        <option value="">--Seleccionar--</option>
                                                        <option value="Si">Si</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                    <!--<span class="error-container" style="color: red"></span>-->
                                                    @error('aire_acondicionado')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group @error('reproductor') has-error @enderror">
                                                    <label class="control-label" for="reproductor">Reproductor
                                                        <small class="required" style="color: red"> *</small>
                                                    </label>
                                                    <input type="text" name="reproductor" class="form-control @error('reproductor') is-invalid @enderror"
                                                           value="{{ old('reproductor') }}" placeholder="Reproductor">
                                                    <!--<span class="error-container" style="color: red"></span>-->
                                                    @error('reproductor')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group @error('air_baqs') has-error @enderror">
                                                    <label class="control-label" for="air_baqs">Air Baqs
                                                        <small class="required" style="color: red"> *</small>
                                                    </label>
                                                    <select class="form-control select2bs4 @error('air_baqs') is-invalid @enderror" name="air_baqs">
                                                        <option value="">--Seleccionar--</option>
                                                        <option value="Si">Si</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                    <!--<span class="error-container" style="color: red"></span>-->
                                                    @error('air_baqs')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group @error('puertas') has-error @enderror">
                                                    <label class="control-label" for="puertas"># de Puertas
                                                        <small class="required" style="color: red"> *</small>
                                                    </label>
                                                    <input type="text" name="puertas" class="form-control @error('puertas') is-invalid @enderror"
                                                           value="{{ old('puertas') }}" placeholder="# de Puertas">
                                                    <!--<span class="error-container" style="color: red"></span>-->
                                                    @error('puertas')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group @error('motor') has-error @enderror">
                                                    <label class="control-label" for="motor">Motor
                                                        <small class="required" style="color: red"> *</small>
                                                    </label>
                                                    <input type="text" name="motor" class="form-control @error('motor') is-invalid @enderror"
                                                           value="{{ old('motor') }}" placeholder="Motor">
                                                    <!--<!--<span class="error-container" style="color: red"></span>-->
                                                    @error('motor')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
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
{{--
@section('jscript')
    <script>
        $(document).ready(function() {
            $("#addform").validate({
                ignore: [],
                lang: 'es',
                onfocusout: function (element) {
                    $(element).valid();
                },
                errorPlacement: function(error, element) {
                    error.appendTo(element.parent(".form-group").find(".error-container"));
                },
                rules: {
                    /*caracteristicas_es: {
                        required: true,
                    },
                    caracteristicas_en: {
                        required: true,
                    },
                    caracteristicas_fr: {
                        required: true,
                    },
                    caracteristicas_de: {
                        required: true,
                    },
                    caracteristicas_it: {
                        required: true,
                    },
                    caracteristicas_pt: {
                        required: true,
                    },
                   categoria: {
                        required: true,
                    },
                   capacidad_pasajero: {
                       required: true,
                       digits:true
                   },
                    rentadora: {
                       required: true,
                   },
                    tipo: {
                        required: true,
                    },
                     trasnmision: {
                         required: true,
                     },
                     aire_acondicionado: {
                         required: true,
                     },
                    air_baqs: {
                        required: true,
                    },
                    reproductor: {
                        required: true,
                    },
                    puertas: {
                        required: true,
                        digits:true
                    },
                    motor: {
                        required: true,
                    },
                    imagen: {
                        required: true,
                        //extension: "jpg,jpeg,png,gif",
                        //checkDim: [1349, 480],
                        max: 20000,
                    }*/
                },
                messages: {
                    caracteristicas_es: {
                        required: 'El campo características es obligatorio',
                    },
                    caracteristicas_en: {
                        required: 'El campo características es obligatorio',
                    },
                    caracteristicas_fr: {
                        required: 'El campo características  es obligatorio',
                    },
                    caracteristicas_de: {
                        required: 'El campo características  es obligatorio',
                    },
                    caracteristicas_it: {
                        required: 'El campo características  es obligatorio',
                    },
                    caracteristicas_pt: {
                        required: 'El campo características es obligatorio',
                    },
                    /*rentadora: {
                        required: 'El campo rentadora es obligatorio',
                    },
                    reproductor: {
                        required: 'El campo reproductor es obligatorio',
                    },
                    tipo: {
                        required: 'El campo tipo es obligatorio',
                    },
                    trasnmision: {
                        required: 'El campo trasnmisión es obligatorio',
                    },
                    aire_acondicionado: {
                        required: 'El campo aire acondicionado es obligatorio',
                    },
                    air_baqs: {
                        required: 'El campo air baqs es obligatorio',
                    },
                    puertas: {
                        required: 'El campo # de puertas es obligatorio',
                        digits:'El campo # de puertas solo admite números'
                    },
                    motor: {
                        required: 'El campo motor es obligatorio',
                    },
                    categoria: {
                        required: 'El campo categoria es obligatorio',
                    },
                    capacidad_pasajero: {
                        required: 'El campo capacidad de pasajero es obligatorio',
                        digits:'El campo capacidad de pasajero solo admite números'
                    },
                    imagen: {
                        required: 'El campo imagen es obligatorio',
                        extension: 'Las extensiones permitidas son jpg,jpeg,gif y png',
                        max: 'El tamaño del archivo no debe exceder los 2Mb',
                    }*/
                }
            });
        });
    </script>
@endsection--}}
