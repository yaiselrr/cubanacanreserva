@extends('layouts.admin')
@section('content')
    @include('admin.cancel', ['route'=>route('admin.content.quienes-somos.index')])
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Editar Quienes Somos</h3>
                    </div>
                    <div class="card-body">
                        <form id="form" role="form" method="post" enctype="multipart/form-data" action="{{route('admin.content.quienes-somos.update',$quienessomos->id)}}">
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
                                                        <div class="form-group @error('titulo_es') has-error @enderror">
                                                            <label for="titulo">Título<small class="required" style="color: red"> *</small></label>
                                                            <input type="text" class="form-control @error('titulo_es') is-invalid @enderror" value="{{ old('titulo',$quienessomostraslation['titulo_es']) }}" name="titulo_es" placeholder="Título">
                                                            <!--<span class="error-container" style="color: red"></span>-->
                                                            @error('titulo_es')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group @error('descripcion_es') has-error @enderror">
                                                            <label for="descripcion">Descripción<small class="required" style="color: red"> *</small></label>
                                                            <textarea name="descripcion_es" id="descripcion_es" class="textarea form-control @error('descripcion_es') is-invalid @enderror" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"
                                                                      placeholder="Descripción">{{ old('descripcion',$quienessomostraslation['descripcion_es']) }}</textarea>
                                                            <!--<span class="error-container" style="color: red"></span>-->
                                                            @error('descripcion_es')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="custom-tabs-one-en" role="tabpanel" aria-labelledby="custom-tabs-one-en-tab">
                                                    <div class="box-body">
                                                        <div class="form-group @error('titulo_en') has-error @enderror">
                                                            <label for="titulo">Título{{--<small class="required" style="color: red"> *</small>--}}</label>
                                                            <input type="text" class="form-control @error('titulo_en') is-invalid @enderror" value="{{ old('titulo',$quienessomostraslation['titulo_en']) }}" name="titulo_en"
                                                                   placeholder="Título">
                                                            <span class="error-container" style="color: red">
                                                    </span>
                                                            @error('titulo_en')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group @error('descripcion_en') has-error @enderror">
                                                            <label for="descripcion">Descripción{{--<small class="required" style="color: red"> *</small>--}}</label>
                                                            <textarea name="descripcion_en" class="textarea form-control @error('descripcion_en') is-invalid @enderror" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"
                                                                      placeholder="Descripción">{{ old('descripcion',$quienessomostraslation['descripcion_en']) }}</textarea>
                                                            <!--<span class="error-container" style="color: red"></span>-->
                                                            @error('descripcion_en')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="custom-tabs-one-fr" role="tabpanel" aria-labelledby="custom-tabs-one-fr-tab">
                                                    <div class="box-body">
                                                        <div class="form-group @error('titulo_fr') has-error @enderror">
                                                            <label for="titulo">Título{{--<small class="required" style="color: red"> *</small>--}}</label>
                                                            <input type="text" class="form-control @error('titulo_fr') is-invalid @enderror" value="{{ old('titulo',$quienessomostraslation['titulo_fr'] )}}"
                                                                   name="titulo_fr" placeholder="Título">
                                                            <!--<span class="error-container" style="color: red"></span>-->
                                                            @error('titulo_fr')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group @error('descripcion_fr') has-error @enderror">
                                                            <label for="descripcion">Descripción{{--<small class="required" style="color: red"> *</small>--}}</label>
                                                            <textarea name="descripcion_fr" class="textarea form-control @error('descripcion_fr') is-invalid @enderror" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"
                                                                      placeholder="Descripción">{{ old('descripcion',$quienessomostraslation['descripcion_fr']) }}</textarea>
                                                            <!--<span class="error-container" style="color: red"></span>-->
                                                            @error('descripcion_fr')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="custom-tabs-one-de" role="tabpanel" aria-labelledby="custom-tabs-one-de-tab">
                                                    <div class="box-body">
                                                        <div class="form-group @error('titulo_de') has-error @enderror">
                                                            <label for="titulo">Título{{--<small class="required" style="color: red"> *</small>--}}</label>
                                                            <input type="text" class="form-control @error('titulo_de') is-invalid @enderror" value="{{ old('titulo',$quienessomostraslation['titulo_de']) }}"
                                                                   name="titulo_de" placeholder="Título">
                                                            <!--<span class="error-container" style="color: red"></span>-->
                                                            @error('titulo_de')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group @error('descripcion_de') has-error @enderror">
                                                            <label for="descripcion">Descripción{{--<small class="required" style="color: red"> *</small>--}}</label>
                                                            <textarea name="descripcion_de" class="textarea form-control @error('descripcion_de') is-invalid @enderror" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"
                                                                      placeholder="Descripción">{{ old('descripcion',$quienessomostraslation['descripcion_de']) }}</textarea>
                                                            <!--<span class="error-container" style="color: red"></span>-->
                                                            @error('descripcion_de')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="custom-tabs-one-it" role="tabpanel" aria-labelledby="custom-tabs-one-it-tab">
                                                    <div class="box-body">
                                                        <div class="form-group @error('titulo_it') has-error @enderror">
                                                            <label for="titulo">Título{{--<small class="required" style="color: red"> *</small>--}}</label>
                                                            <input type="text" class="form-control @error('titulo_it') is-invalid @enderror" value="{{ old('titulo',$quienessomostraslation['titulo_it'] )}}"
                                                                   name="titulo_it" placeholder="Título">
                                                            <!--<span class="error-container" style="color: red"></span>-->
                                                            @error('titulo_it')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group @error('descripcion_it') has-error @enderror">
                                                            <label for="descripcion">Descripción{{--<small class="required" style="color: red"> *</small>--}}</label>
                                                            <textarea name="descripcion_it" class="textarea form-control @error('descripcion_it') is-invalid @enderror" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"
                                                                      placeholder="Descripción">{{ old('descripcion',$quienessomostraslation['descripcion_it']) }}</textarea>
                                                            <!--<span class="error-container" style="color: red"></span>-->
                                                            @error('descripcion_it')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="custom-tabs-one-pt" role="tabpanel" aria-labelledby="custom-tabs-one-pt-tab">
                                                    <div class="box-body">
                                                        <div class="form-group @error('titulo_pt') has-error @enderror">
                                                            <label for="titulo">Título{{--<small class="required" style="color: red"> *</small>--}}</label>
                                                            <input type="text" class="form-control @error('titulo_pt') is-invalid @enderror" value="{{ old('titulo',$quienessomostraslation['titulo_pt']) }}"
                                                                   name="titulo_pt" placeholder="Título">
                                                            <!--<span class="error-container" style="color: red"></span>-->
                                                            @error('titulo_pt')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group @error('descripcion_pt') has-error @enderror">
                                                            <label for="descripcion">Descripción{{--<small class="required" style="color: red"> *</small>--}}</label>
                                                            <textarea name="descripcion_pt" class="textarea form-control @error('descripcion_pt') is-invalid @enderror" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"
                                                                      placeholder="Descripción">{{ old('descripcion',$quienessomostraslation['descripcion_pt']) }}</textarea>
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
                                                    </div>
                                                    <div class="mt-3">
                                                        <output id="list">
                                                                <span>
                                                                    <img src="{{asset('/storage/'.$quienessomos->imagen)}}" class="thumb img-circle img-thumbnail" alt="Imagen">
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
@section('jscript')
    <script>
        $(document).ready(function() {
            $("#form").validate({
                ignore: [],
                lang: 'es',
                onfocusout: function (element) {
                    $(element).valid();
                },
                errorPlacement: function(error, element) {
                    error.appendTo(element.parent(".form-group").find(".error-container"));
                },
                rules: {
                    /*titulo_es: {
                        required: true,
                    },
                    titulo_en: {
                        required: true,
                    },
                    titulo_fr: {
                        required: true,
                    },
                    titulo_de: {
                        required: true,
                    },
                    titulo_it: {
                        required: true,
                    },
                    titulo_pt: {
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
                        extension: "jpg,jpeg,png,gif",
                        checkDim: [760, 175],
                        maxsize: 200000,
                        minSize:1
                    }*/
                },
                messages: {
                    /*titulo_es: {
                        required: 'El campo título es obligatorio'
                    },
                    titulo_en: {
                        required: 'El campo título es obligatorio'
                    },
                    titulo_fr: {
                        required: 'El campo título es obligatorio'
                    },
                    titulo_de: {
                        required: 'El campo título es obligatorio'
                    },
                    titulo_it: {
                        required: 'El campo título es obligatorio'
                    },
                    titulo_pt: {
                        required: 'El campo título es obligatorio'
                    },
                    descripcion_es: {
                        required: 'El campo descripción es obligatorio',
                    },
                    descripcion_en: {
                        required: 'El campo descripción es obligatorio',
                    },
                    descripcion_fr: {
                        required: 'El campo descripción es obligatorio',
                    },
                    descripcion_de: {
                        required: 'El campo descripción es obligatorio',
                    },
                    descripcion_it: {
                        required: 'El campo descripción es obligatorio',
                    },
                    descripcion_pt: {
                        required: 'El campo descripción es obligatorio',
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