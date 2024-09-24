@extends('layouts.admin')
@section('content')
    @include('admin.cancel', ['route'=>route('admin.content.viajes-medidas.index')])
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Crear Viajes a la Medida</h3>
                    </div>
                    <div class="card-body">
                        <form id="form" role="form" method="post" enctype="multipart/form-data"
                              action="{{route('admin.content.viajes-medidas.update',$viajesmedida->id)}}">
                            @csrf
                            @method('PUT')
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
                                                        <div
                                                            class="form-group @error('descripcion_es') has-error @enderror">
                                                            <label for="descripcion">Descripción
                                                                <small class="required" style="color: red"> *</small>
                                                            </label>
                                                            <textarea name="descripcion_es"
                                                                      class="textarea form-control @error('descripcion_es') is-invalid @enderror"
                                                                      style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"
                                                                      placeholder="Descripción">{{ old('descripcion',$descripcion['descripcion_es']) }}</textarea>
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
                                                        <div
                                                            class="form-group @error('descripcion_en') has-error @enderror">
                                                            <label for="descripcion">Description
                                                                {{--<small class="required" style="color: red"> *</small>--}}
                                                            </label>
                                                            <textarea name="descripcion_en"
                                                                      class="textarea form-control @error('descripcion_en') is-invalid @enderror"
                                                                      style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"
                                                                      placeholder="Description">{{ old('descripcion',$descripcion['descripcion_en']) }}</textarea>
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
                                                        <div
                                                            class="form-group @error('descripcion_fr') has-error @enderror">
                                                            <label for="descripcion">Description
                                                                {{--<small class="required" style="color: red"> *</small>--}}
                                                            </label>
                                                            <textarea name="descripcion_fr"
                                                                      class="textarea form-control @error('descripcion_fr') is-invalid @enderror"
                                                                      style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"
                                                                      placeholder="Description">{{ old('descripcion',$descripcion['descripcion_fr']) }}</textarea>
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
                                                        <div
                                                            class="form-group @error('descripcion_de') has-error @enderror">
                                                            <label for="descripcion">Beschreibung
                                                                {{--<small class="required" style="color: red"> *</small>--}}
                                                            </label>
                                                            <textarea name="descripcion_de"
                                                                      class="textarea form-control @error('descripcion_de') is-invalid @enderror"
                                                                      style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"
                                                                      placeholder="Beschreibung">{{ old('descripcion',$descripcion['descripcion_de']) }}</textarea>
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
                                                        <div
                                                            class="form-group @error('descripcion_it') has-error @enderror">
                                                            <label for="descripcion">Descrizione
                                                                {{--<small class="required" style="color: red"> *</small>--}}
                                                            </label>
                                                            <textarea name="descripcion_it"
                                                                      class="textarea form-control @error('descripcion_it') is-invalid @enderror"
                                                                      style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"
                                                                      placeholder="Descrizione">{{ old('descripcion',$descripcion['descripcion_it']) }}</textarea>
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
                                                        <div
                                                            class="form-group @error('descripcion_pt') has-error @enderror">
                                                            <label for="descripcion">Descripcao
                                                                {{--<small class="required" style="color: red"> *</small>--}}
                                                            </label>
                                                            <textarea name="descripcion_pt"
                                                                      class="textarea form-control @error('descripcion_pt') is-invalid @enderror"
                                                                      style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"
                                                                      placeholder="Descripcao">{{ old('descripcion',$descripcion['descripcion_pt']) }}</textarea>
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
                                                    <div class="form-group @error('nombre') has-error @enderror">
                                                        <label for="nombre">Nombre de Viaje a la Medida
                                                            <small class="required" style="color: red"> *</small>
                                                        </label>
                                                        <input type="text"
                                                               class="form-control @error('nombre') is-invalid @enderror"
                                                               value="{{ old('nombre',$viajesmedida->nombre) }}"
                                                               name="nombre"
                                                               placeholder="Nombre de Viaje a la Medida">
                                                        <!--<span class="error-container" style="color: red"></span>-->
                                                        @error('nombre')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
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
                                                                @if($viajesmedida->provincia_id == $provincia->id)
                                                                    <option value="{{$provincia->id}}"
                                                                            selected>{{$provincia->provincia}}</option>
                                                                @else
                                                                    <option
                                                                        value="{{$provincia->id}}">{{$provincia->provincia}}</option>
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                        <!--<span class="error-container" style="color: red"></span>-->
                                                        @error('provincia_id')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
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
                                                            <span> class="input-group-text" id="">Cargar</span>
                                                        </div>
                                                    </div>
                                                    <div><span
                                                            class="help-block">{{__('cubanacan.dimensiones', ['dim' => '200x200'])}}</span>
                                                    </div>
                                                    <span class="help-block">{{__('cubanacan.extensiones')}}</span>
                                                    <!--<span class="error-container" style="color: red"></span>-->
                                                    <div class="mt-3">
                                                        <output id="list">
                                                                <span>
                                                                    <img
                                                                        src="{{asset('/storage/'.$viajesmedida->imagen)}}"
                                                                        class="thumb img-circle img-thumbnail"
                                                                        alt="Imagen">
                                                                </span>
                                                        </output>
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
                                        <a type="submit" class="btn btn-app"><i class="fas fa-save"></i>Guardar</a>
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
                    /*nombre: {
                        required: true,
                        remote:{
                            url:"/api/extra/unique/",
                            type:"get",
                            data: {
                                value: function () {
                                    return $('#form :input[name="nombre"]').val();
                                }
                                , id: function () {
                                    return $('#form :input[name="nombre"]').data('id')
                                },
                                model: function () {
                                    return $('#form :input[name="nombre"]').data('model')
                                }
                            }
                        }
                    },
                    provincia_id:{
                        required:true,
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
                        extension: "jpg,jpeg,png,gif",
                        checkDim: [760, 175],
                        maxsize: 200000,
                        minSize:1
                    }*/
                },
                messages: {
                    /*nombre: {
                        required: 'El campo nombre de viaje a la medida es obligatorio'
                        remote: 'El campo nombre debe ser único'
                    },
                    provincia_id: {
                        required: 'El campo provincia es obligatorio'
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
