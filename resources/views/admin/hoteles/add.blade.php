@extends('layouts.admin')
@section('content')
    @include('admin.cancel', ['route'=>route('admin.content.hoteles.index')])
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Crear Hotel</h3>
                    </div>
                    <div class="card-body">
                        <form id="form" role="form" method="post" enctype="multipart/form-data"
                              action="{{route('admin.content.hoteles.store')}}">
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
                                       {{-- <input type="hidden" name="campos_vacios" id="campos_vacios" value="0">--}}
                                        <div class="card-body">
                                            <div class="tab-content" id="custom-tabs-one-tabContent">
                                                <div class="tab-pane fade show active" id="custom-tabs-one-es"
                                                     role="tabpanel" aria-labelledby="custom-tabs-one-es-tab">
                                                    <div class="box-body">
                                                        <div
                                                            class="form-group @error('direccion_es') has-error @enderror">
                                                            <label for="direccion">Dirección
                                                                <small class="required" style="color: red"> *</small>
                                                            </label>
                                                            <input type="text" name="direccion_es"
                                                                   class="form-control @error('direccion_es') is-invalid @enderror"
                                                                   placeholder="Dirección" {{--id="direccion_es"--}}
                                                                   value="{{ old('direccion') }}"></input>
                                                            <!--<span class="error-container" style="color: red">-->
                                                            @error('direccion_es')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <div
                                                            class="form-group @error('descripcion_es') has-error @enderror">
                                                            <label for="descripcion">Descripción
                                                                <small class="required" style="color: red"> *</small>
                                                            </label>
                                                            <textarea name="descripcion_es"
                                                                      class="textarea form-control @error('descripcion_es') is-invalid @enderror"
                                                                      style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"
                                                                      placeholder="Descripción">{{ old('descripcion') }}</textarea>
                                                            <!--<span class="error-container" style="color: red">-->
                                                            @error('descripcion_es')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="custom-tabs-one-en" role="tabpanel"
                                                     aria-labelledby="custom-tabs-one-en-tab">
                                                    <div class="box-body">
                                                        <div
                                                            class="form-group @error('direccion_en') has-error @enderror">
                                                            <label for="direccion">Dirección
                                                                {{--<small class="required" style="color: red"> *</small>--}}
                                                            </label>
                                                            <input type="text" name="direccion_en"
                                                                   class="form-control @error('direccion_en') is-invalid @enderror"
                                                                   placeholder="Dirección"
                                                                   value="{{ old('direccion') }}"></input>
                                                            <!--<span class="error-container" style="color: red" >-->
                                                            @error('direccion_en')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <div
                                                            class="form-group @error('descripcion_en') has-error @enderror">
                                                            <label for="descripcion">Descripción
                                                               {{-- <small class="required" style="color: red"> *</small>--}}
                                                            </label>
                                                            <textarea name="descripcion_en"
                                                                      class="textarea form-control @error('descripcion_en') is-invalid @enderror"
                                                                      style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"
                                                                      placeholder="Descripción">{{ old('descripcion') }}</textarea>
                                                            <!--<span class="error-container" style="color: red">-->
                                                            @error('descripcion_en')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="custom-tabs-one-fr" role="tabpanel"
                                                     aria-labelledby="custom-tabs-one-fr-tab">
                                                    <div class="box-body">
                                                        <div
                                                            class="form-group @error('direccion_fr') has-error @enderror">
                                                            <label for="direccion">Dirección
                                                               {{-- <small class="required" style="color: red"> *</small>--}}
                                                            </label>
                                                            <input type="text" name="direccion_fr"
                                                                   class="form-control @error('direccion_fr') is-invalid @enderror"
                                                                   placeholder="Dirección"
                                                                   value="{{ old('direccion') }}"></input>
                                                            <!--<span class="error-container" style="color: red">-->
                                                            @error('direccion_fr')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <div
                                                            class="form-group @error('descripcion_fr') has-error @enderror">
                                                            <label for="descripcion">Descripción
                                                                {{--<small class="required" style="color: red"> *</small>--}}
                                                            </label>
                                                            <textarea name="descripcion_fr"
                                                                      class="textarea form-control @error('descripcion_fr') is-invalid @enderror"
                                                                      style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"
                                                                      placeholder="Descripción">{{ old('descripcion') }}</textarea>
                                                            <!--<span class="error-container" style="color: red">-->
                                                            @error('descripcion_fr')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="custom-tabs-one-de" role="tabpanel"
                                                     aria-labelledby="custom-tabs-one-de-tab">
                                                    <div class="box-body">
                                                        <div
                                                            class="form-group @error('direccion_de') has-error @enderror">
                                                            <label for="direccion">Dirección
                                                                {{--<small class="required" style="color: red"> *</small>--}}
                                                            </label>
                                                            <input type="text" name="direccion_de"
                                                                   class="form-control @error('direccion_de') is-invalid @enderror"
                                                                   placeholder="Dirección"
                                                                   value="{{ old('direccion') }}"></input>
                                                            <!--<span class="error-container" style="color: red">-->
                                                            @error('direccion_de')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <div
                                                            class="form-group @error('descripcion_de') has-error @enderror">
                                                            <label for="descripcion">Descripción
                                                                {{--<small class="required" style="color: red"> *</small>--}}
                                                            </label>
                                                            <textarea name="descripcion_de"
                                                                      class="textarea form-control @error('descripcion_de') is-invalid @enderror"
                                                                      style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"
                                                                      placeholder="Descripción">{{ old('descripcion') }}</textarea>
                                                            <!--<span class="error-container" style="color: red">-->
                                                            @error('descripcion_de')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="custom-tabs-one-it" role="tabpanel"
                                                     aria-labelledby="custom-tabs-one-it-tab">
                                                    <div class="box-body">
                                                        <div
                                                            class="form-group @error('direccion_it') has-error @enderror">
                                                            <label for="direccion">Dirección
                                                               {{-- <small class="required" style="color: red"> *</small>--}}
                                                            </label>
                                                            <input type="text" name="direccion_it"
                                                                   class="form-control @error('direccion_it') is-invalid @enderror "
                                                                   placeholder="Dirección"
                                                                   value="{{ old('direccion') }}"></input>
                                                            <!--<span class="error-container" style="color: red">-->
                                                            @error('direccion_it')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <div
                                                            class="form-group @error('descripcion_it') has-error @enderror">
                                                            <label for="descripcion">Descripción
                                                               {{-- <small class="required" style="color: red"> *</small>--}}
                                                            </label>
                                                            <textarea name="descripcion_it"
                                                                      class="textarea form-control @error('descripcion_it') is-invalid @enderror"
                                                                      style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"
                                                                      placeholder="Descripción">{{ old('descripcion') }}</textarea>
                                                            <!--<span class="error-container" style="color: red">-->
                                                            @error('descripcion_it')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="custom-tabs-one-pt" role="tabpanel"
                                                     aria-labelledby="custom-tabs-one-pt-tab">
                                                    <div class="box-body">
                                                        <div
                                                            class="form-group @error('direccion_pt') has-error @enderror">
                                                            <label for="direccion">Dirección
                                                               {{-- <small class="required" style="color: red"> *</small>--}}
                                                            </label>
                                                            <input type="text" name="direccion_pt"
                                                                   class="form-control @error('direccion_pt') is-invalid @enderror  "
                                                                   placeholder="Dirección"
                                                                   value="{{ old('direccion') }}"></input>
                                                            <!--<span class="error-container" style="color: red">-->
                                                            @error('direccion_pt')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <div
                                                            class="form-group @error('descripcion_pt') has-error @enderror">
                                                            <label for="descripcion">Descripción
                                                             {{--   <small class="required" style="color: red"> *</small>--}}
                                                            </label>
                                                            <textarea name="descripcion_pt"
                                                                      class="textarea form-control @error('descripcion_pt') is-invalid @enderror"
                                                                      style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"
                                                                      placeholder="Descripción">{{ old('descripcion') }}</textarea>
                                                            <!--<span class="error-container" style="color: red">-->
                                                            @error('descripcion_pt')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="imagen">Imagen
                                                            <small class="required" style="color: red"> *</small>
                                                        </label>
                                                        <div class="input-group">
                                                            {{--<div class="custom-file">--}}
                                                            <input id="files" type="file" accept="image/*"
                                                                   name="imagen[]"
                                                                   multiple="multiple"
                                                                   class="custom-file-input @error('imagen') is-invalid @enderror">
                                                            <label class="custom-file-label" for="exampleInputFile">Seleccionar
                                                                archivo</label>
                                                            {{--</div>--}}
                                                            @error('imagen')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <div><span
                                                                class="help-block">{{__('cubanacan.dimensiones', ['dim' => '200x200'])}}</span>
                                                        </div>
                                                        <span class="help-block">{{__('cubanacan.extensiones')}}</span>
                                                        <!--<span class="error-container" style="color: red">-->
                                                    </div>
                                                    <output id="list"></output>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group @error('nombre') has-error @enderror">
                                                        <label for="nombre">Nombre de Hotel
                                                            <small class="required" style="color: red"> *</small>
                                                        </label>
                                                        <input type="text"
                                                               class="form-control @error('nombre') is-invalid @enderror"
                                                               value="{{ old('nombre') }}" name="nombre"
                                                               placeholder="Nombre de Hotel">
                                                        <!--<span class="error-container" style="color: red">-->
                                                        @error('nombre')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group @error('telefono') has-error @enderror">
                                                        <label class="control-label" for="telefono">Teléfono<small
                                                                class="required" style="color: red"> *</small></label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i
                                                                        class="fas fa-phone"></i></span>
                                                            </div>
                                                            <input type="text"
                                                                   class="form-control @error('telefono') is-invalid @enderror"
                                                                   data-inputmask='"mask": "(+53) 9999-99-99"' data-mask
                                                                   value="{{ old('telefono')}}"
                                                                   name="telefono" placeholder="Teléfono">
                                                            @error('telefono')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <div><span
                                                                class="help-block">{{__('cubanacan.phoneformato')}}</span>
                                                        </div>
                                                        <!--<span class="error-container" style="color: red"></span>-->
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label class="control-label" for="email">Correo
                                                            electrónico</label>
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i
                                                                        class="fas fa-envelope"></i></span>
                                                            </div>
                                                            <input type="text"
                                                                   class="form-control @error('email') is-invalid @enderror"
                                                                   value="{{ old('email') }}"
                                                                   name="email" placeholder="Correo electrónico">
                                                            @error('email')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <span class="help-block">{{__('cubanacan.email')}}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group @error('provincia_id') has-error @enderror">
                                                        <label class="control-label" for="provincia_id">Provincia
                                                            <small class="required" style="color: red"> *</small>
                                                        </label>
                                                        <select
                                                            class="form-control select2bs4 @error('provincia_id') is-invalid @enderror"
                                                            name="provincia_id">
                                                            <option value="">--Seleccionar--</option>
                                                            @foreach($provincias as $provincia)
                                                                <option
                                                                    value="{{$provincia->id}}">{{$provincia->provincia}}</option>
                                                            @endforeach
                                                        </select>
                                                        <!--<span class="error-container" style="color: red">-->
                                                        @error('provincia_id')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group @error('categoria_id') has-error @enderror">
                                                        <label class="control-label" for="categoria">Categoría
                                                            <small class="required" style="color: red"> *</small>
                                                        </label>
                                                        <select
                                                            class="form-control select2bs4 @error('categoria_id') is-invalid @enderror"
                                                            name="categoria_id">
                                                            <option value="">--Seleccionar--</option>
                                                            @foreach($categorias as $categoria)
                                                                <option
                                                                    value="{{$categoria->categoria_id}}">{{$categoria->categoria}}</option>
                                                            @endforeach
                                                        </select>
                                                        <!--<span class="error-container" style="color: red">-->
                                                        @error('categoria_id')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group @error('precio_desde') has-error @enderror">
                                                        <label class="control-label" for="preciodesde">Precio Desde
                                                            <small class="required" style="color: red"> *</small>
                                                        </label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">$</span>
                                                            </div>
                                                            <input type="text"
                                                                   class="form-control @error('precio_desde') is-invalid @enderror"
                                                                   name="precio_desde"
                                                                   value="{{ old('precio_desde')}}"
                                                                   placeholder="Precio Desde"></input>
                                                            <!--<span class="error-container" style="color: red">-->
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">.00</span>
                                                            </div>
                                                        </div>
                                                        @error('precio_desde')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div
                                                        class="form-group @error('dias_antelacion_reserva_id') has-error @enderror">
                                                        <label class="control-label" for="diasantelacion">Dias
                                                            Antelación
                                                            Reserva
                                                            <small class="required" style="color: red"> *</small>
                                                        </label>
                                                        <select
                                                            class="form-control select2bs4 @error('dias_antelacion_reserva_id') is-invalid @enderror"
                                                            name="dias_antelacion_reserva_id">
                                                            <option value="">--Seleccionar--</option>
                                                            @foreach($diasantelacionreservas as $diasantelacionreserva)
                                                                <option
                                                                    value="{{$diasantelacionreserva->id}}">{{$diasantelacionreserva->dias}}</option>
                                                            @endforeach
                                                        </select>
                                                        <!--<span class="error-container" style="color: red">-->
                                                        @error('dias_antelacion_reserva_id')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div
                                                        class="form-group @error('oferta_especial') has-error @enderror">
                                                        <label class="control-label" for="ofertaespecial">Oferta
                                                            Especial</label>
                                                        <select
                                                            class="form-control select2bs4 @error('oferta_especial') is-invalid @enderror"
                                                            name="oferta_especial">
                                                            <option value="">--Seleccionar--</option>
                                                            @foreach($ofertaespeciales as $ofertaespeciale)
                                                                <option
                                                                    value="{{$ofertaespeciale['value']}}">{{$ofertaespeciale['oferta']}}</option>
                                                            @endforeach
                                                        </select>
                                                        <!--<span class="error-container" style="color: red">-->
                                                        @error('oferta_especial')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group @error('estado') has-error @enderror">
                                                        <label class="control-label" for="estado">Estado
                                                            <small class="required" style="color: red"> *</small>
                                                        </label>
                                                        <select
                                                            class="form-control select2bs4 @error('estado') is-invalid @enderror"
                                                            name="estado">
                                                            <option value="">--Seleccionar--</option>
                                                            @foreach($estados as $estado)
                                                                <option
                                                                    value="{{$estado['value']}}">{{$estado['estado']}}</option>
                                                            @endforeach
                                                        </select>
                                                        <!--<span class="error-container" style="color: red">-->
                                                        @error('estado')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label class="control-label" for="planalojamiento">Plan
                                                            Alojamiento
                                                        </label>
                                                        <select class="form-control duallistbox"
                                                                name="plan_alojamiento_id[]"
                                                                multiple="multiple">
                                                            @foreach($planalojamientos as $planalojamiento)
                                                                <option
                                                                    value="{{$planalojamiento->id}}">{{$planalojamiento->planalojamiento}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <!--<div class="form-group">
                                                <div class="custom-control custom-checkbox">
                                                    <input class="custom-control-input" type="checkbox" id="customCheckbox1" value="option1">
                                                    <label for="customCheckbox1" class="custom-control-label">Custom Checkbox</label>
                                                </div>
                                                </div>-->
                                                <div class="col-sm-6">
                                                    <div
                                                        class="form-group @error('facilidades_ids') has-error @enderror">
                                                        <label class="control-label" for="facilidad_id">Facilidades que
                                                            brinda
                                                            el hotel
                                                            <small class="required" style="color: red"> *</small>
                                                        </label>
                                                        <select
                                                            class="form-control duallistbox @error('facilidades_ids') is-invalid @enderror"
                                                            multiple="multiple"
                                                            style="width: 100%;"
                                                            name="facilidades_ids[]">
                                                            @foreach($facilidades as $facilidade)
                                                                <option
                                                                    value="{{$facilidade->facilidad_id}}">{{$facilidade->facilidad}}</option>
                                                            @endforeach
                                                        </select>
                                                        <!--<span class="error-container" style="color: red">-->
                                                        @error('facilidades_ids')
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
                                        <button type="submit" {{--id="btn_guardar"--}} class="btn btn-app"><i class="fas fa-save"></i>Guardar
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

       /* $('#btn_guardar').on('click',function () {
            var direccion_es = document.getElementById('direccion_es');
            var direccion_en = document.getElementById('direccion_en');
            var direccion_fr = document.getElementById('direccion_fr');
            var direccion_de = document.getElementById('direccion_de');
            var direccion_it = document.getElementById('direccion_it');
            var direccion_pt = document.getElementById('direccion_pt');
            if(direccion_es.value=='' || direccion_en.value=='' || direccion_fr.value=='' || direccion_de.value==''
            && direccion_it.value=='' || direccion_pt.value==''){
                $('#campos_vacios').val(1);
            }

        })*/
        $(document).ready(function () {
            $("#form").validate({
                ignore: [],
                lang: 'es',
                onfocusout: function (element) {
                    $(element).valid();
                },
                errorPlacement: function (error, element) {
                    error.appendTo(element.parent(".form-group").find(".error-container"));
                },
                rules: {
                    /*facilidades_ids: {
                        required: true,
                    },
                    categoria_id:{
                        required:true,
                    },
                    plan_alojamiento_id:{
                        required:true,
                    },
                    dias_antelacion_reserva_id:{
                        required:true,
                    },
                    precio_desde:{
                        required:true,
                        number:true
                    },
                    estado:{
                        required:true,
                    },
                    provincia_id:{
                        required:true,
                    },
                    'facilidades_ids[]':{
                        required:true,
                    },
                    direccion_es: {
                        required: true,
                    },
                    direccion_en: {
                        required: true,
                    },
                    direccion_fr: {
                        required: true,
                    },
                    direccion_de: {
                        required: true,
                    },
                    direccion_it: {
                        required: true,
                    },
                    direccion_pt: {
                        required: true,
                    },
                    descripcion_es: {
                        required: true,
                    },
                    descripcion_en: {
                        required: true,
                    },
                    descripcion_fr: {
                        required: true,
                    },
                    descripcion_de: {
                        required: true,
                    },
                    descripcion_it: {
                        required: true,
                    },
                    descripcion_pt: {
                        required: true,
                    },
                    imagen: {
                        extension: "jpg|jpeg|png|gif",
                        checkDim: [760, 175],
                        maxsize: 200000,
                        minSize:1
                    },
                    email: {
                        required: true,
                        email: true,
                        remote: {
                            url: "/api/extra/unique/",
                            type: "get",
                            data: {
                                value: function () {
                                    return $('#form :input[name="email"]').val();
                                }
                                , id: function () {
                                    return $('#form :input[name="email"]').data('id')
                                },
                                model: function () {
                                    return $('#form :input[name="email"]').data('model')
                                }
                            }
                        }
                    },
                    telefono: {
                        required: true,
                        phone: true,
                        remote: {
                            url: "/api/extra/unique/",
                            type: "get",
                            data: {
                                value: function () {
                                    return $('#form :input[name="telefono"]').val();
                                }
                                , id: function () {
                                    return $('#form :input[name="telefono"]').data('id')
                                },
                                model: function () {
                                    return $('#form :input[name="telefono"]').data('model')
                                }
                            }
                        }

                    },*/
                },
                messages: {
                    /*nombre: {
                        required: 'El campo nombre del hotel es obligatorio'
                    },
                    categoria_id: {
                        required: 'El campo categoría es obligatorio'
                    },
                    plan_alojamiento_id: {
                        required: 'El campo plan alojamiento es obligatorio'
                    },
                    precio_desde: {
                        required: 'El campo precio desde es obligatorio',
                        number:'El campo precio desde admite dígitos o números decimales separado por un punto'
                    },
                    dias_antelacion_reserva_id: {
                        required: 'El campo días de antelacion de reserva es obligatorio',
                        digits:'El campo días de antelacion de reserva admite solo números'
                    },

                    estado: {
                        required: 'El campo estado es obligatorio'
                    },
                    provincia_id: {
                        required: 'El campo provincia es obligatorio'
                    },
                    'facilidades_ids[]': {
                        required: 'El campo facilidades es obligatorio'
                    },
                    direccion_es: {
                        required: 'El campo dirección es obligatorio',
                    },
                    direccion_en: {
                        required: 'El campo dirección es obligatorio',
                    },
                    direccion_fr: {
                        required: 'El campo dirección es obligatorio',
                    },
                    direccion_de: {
                        required: 'El campo dirección es obligatorio',
                    },
                    direccion_it: {
                        required: 'El campo dirección es obligatorio',
                    },
                    direccion_pt: {
                        required: 'El campo dirección es obligatorio',
                    },
                    descripcion_es: {
                        required: 'El campo descripción es obligatorio',
                    },
                    descripcion_en: {
                        required: 'El campo descripción es obligatorio',
                    },
                    descripcion_fr: {
                        required: 'El campo descripción  es obligatorio',
                    },
                    descripcion_de: {
                        required: 'El campo descripción  es obligatorio',
                    },
                    descripcion_it: {
                        required: 'El campo descripción  es obligatorio',
                    },
                    descripcion_pt: {
                        required: 'El campo descripción  es obligatorio',
                    },
                    email: {
                        remote: 'El campo cimagenorreo electrónico debe ser único'
                    },
                    telefono: {
                        required: 'El campo teléfono es obligatorio',
                        remote: 'El campo teléfono debe ser único',
                    },
                    imagen: {
                        extension: 'Las extensiones permitidas son jpg,jpeg,gif y png',
                        maxsize: 'El tamaño del archivo no debe exceder los 2Mb',
                        minsize: 'El tamaño del archivo no debe ser mayor que 0 byte',
                    }*/
                }
            });
        });
    </script>
@endsection
