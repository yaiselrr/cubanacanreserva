@extends('layouts.admin')
@section('content')
    @include('admin.cancel', ['route'=>route('admin.content.preguntas.index')])
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Editar Pregunta</h3>
                    </div>
                    <div class="card-body">
                        <form id="addForm" name="addForm" role="form" method="post" enctype="multipart/form-data" action="{{route('admin.content.preguntas.update',$pregunta->id)}}">
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
                                                        <div class="form-group @error('pregunta_es') has-error @enderror">
                                                            <label class="control-label" for="pregunta">Pregunta<small class="required" style="color: red"> *</small></label>
                                                            <input type="text" class="form-control @error('pregunta_es') is-invalid @enderror" value="{{ old('pregunta',$preguntatraslation['pregunta_es']) }}" name="pregunta_es" placeholder="Pregunta">
                                                            <!--<span class="error-container" style="color: red">-->
                                                    
                                                            @error('pregunta_es')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group @error('respuesta_es') has-error @enderror">
                                                            <label for="respuesta">Respuesta<small class="required" style="color: red"> *</small></label>
                                                            <textarea name="respuesta_es" class="textarea form-control @error('respuesta_es') is-invalid @enderror" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"
                                                                      placeholder="Respuesta">{{ old('respuesta',$preguntatraslation['respuesta_es']) }}</textarea>
                                                            <!--<span class="error-container" style="color: red">-->
                                                    
                                                            @error('respuesta_es')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="custom-tabs-one-en" role="tabpanel" aria-labelledby="custom-tabs-one-en-tab">
                                                    <div class="box-body">
                                                        <div class="form-group @error('pregunta_en') has-error @enderror">
                                                            <label class="control-label" for="pregunta">Pregunta{{--<small class="required" style="color: red"> *</small>--}}</label>
                                                            <input type="text" class="form-control @error('pregunta_en') is-invalid @enderror" value="{{ old('pregunta',$preguntatraslation['pregunta_en']) }}"
                                                                   name="pregunta_en" placeholder="Pregunta">
                                                            <!--<span class="error-container" style="color: red">-->
                                                    
                                                            @error('pregunta_en')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                     
                                                            @enderror
                                                        </div>
                                                        <div class="form-group @error('respuesta_en') has-error @enderror">
                                                            <label for="respuesta">Respuesta{{--<small class="required" style="color: red"> *</small>--}}</label>
                                                            <textarea name="respuesta_en" class="textarea form-control @error('respuesta_en') is-invalid @enderror" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"
                                                                      placeholder="Respuesta">{{ old('respuesta',$preguntatraslation['respuesta_en']) }}</textarea>
                                                            <!--<span class="error-container" style="color: red">-->
                                                    
                                                            @error('respuesta_en')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                    
                                                            @enderror
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="custom-tabs-one-fr" role="tabpanel" aria-labelledby="custom-tabs-one-fr-tab">
                                                    <div class="box-body">
                                                        <div class="form-group @error('pregunta_fr') has-error @enderror">
                                                            <label class="control-label" for="pregunta">Pregunta{{--<small class="required" style="color: red"> *</small>--}}</label>
                                                            <input type="text" class="form-control @error('pregunta_fr') is-invalid @enderror" value="{{ old('pregunta',$preguntatraslation['pregunta_fr']) }}"
                                                                   name="pregunta_fr" placeholder="Pregunta">
                                                            <!--<span class="error-container" style="color: red">-->
                                                    
                                                            @error('pregunta_fr')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                     
                                                            @enderror
                                                        </div>
                                                        <div class="form-group @error('respuesta_fr') has-error @enderror">
                                                            <label for="respuesta">Respuesta{{--<small class="required" style="color: red"> *</small>--}}</label>
                                                            <textarea name="respuesta_fr" class="textarea form-control @error('respuesta_fr') is-invalid @enderror" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"
                                                                      placeholder="Respuesta">{{ old('respuesta',$preguntatraslation['respuesta_fr']) }}</textarea>
                                                            <!--<span class="error-container" style="color: red">-->
                                                    
                                                            @error('respuesta_fr')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                    
                                                            @enderror
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="custom-tabs-one-de" role="tabpanel" aria-labelledby="custom-tabs-one-de-tab">
                                                    <div class="box-body">
                                                        <div class="form-group @error('pregunta_de') has-error @enderror">
                                                            <label class="control-label" for="pregunta">Pregunta{{--<small class="required" style="color: red"> *</small>--}}</label>
                                                            <input type="text" class="form-control @error('pregunta_de') is-invalid @enderror" value="{{ old('pregunta',$preguntatraslation['pregunta_de']) }}"
                                                                   name="pregunta_de" placeholder="Pregunta">
                                                            <!--<span class="error-container" style="color: red">-->
                                                    
                                                            @error('pregunta_de')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                     
                                                            @enderror
                                                        </div>
                                                        <div class="form-group @error('respuesta_de') has-error @enderror">
                                                            <label for="respuesta">Respuesta{{--<small class="required" style="color: red"> *</small>--}}</label>
                                                            <textarea name="respuesta_de" class="textarea form-control @error('respuesta_de') is-invalid @enderror" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"
                                                                      placeholder="Respuesta">{{ old('respuesta',$preguntatraslation['respuesta_de']) }}</textarea>
                                                            <!--<span class="error-container" style="color: red">-->
                                                    
                                                            @error('respuesta_de')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                    
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="custom-tabs-one-it" role="tabpanel" aria-labelledby="custom-tabs-one-it-tab">
                                                    <div class="box-body">
                                                        <div class="form-group @error('pregunta_it') has-error @enderror">
                                                            <label class="control-label" for="pregunta">Pregunta{{--<small class="required" style="color: red"> *</small>--}}</label>
                                                            <input type="text" class="form-control @error('pregunta_it') is-invalid @enderror" value="{{ old('pregunta',$preguntatraslation['pregunta_it']) }}"
                                                                   name="pregunta_it" placeholder="Pregunta">
                                                            <!--<span class="error-container" style="color: red">-->
                                                    
                                                            @error('pregunta_it')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                     
                                                            @enderror
                                                        </div>
                                                        <div class="form-group @error('respuesta_it') has-error @enderror">
                                                            <label for="respuesta">Respuesta{{--<small class="required" style="color: red"> *</small>--}}</label>
                                                            <textarea name="respuesta_it" class="textarea form-control @error('respuesta_it') is-invalid @enderror" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"
                                                                      placeholder="Respuesta">{{ old('respuesta',$preguntatraslation['respuesta_it']) }}</textarea>
                                                            <!--<span class="error-container" style="color: red">-->
                                                    
                                                            @error('respuesta_it')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                    
                                                            @enderror
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="custom-tabs-one-pt" role="tabpanel" aria-labelledby="custom-tabs-one-pt-tab">
                                                    <div class="box-body">
                                                        <div class="form-group @error('pregunta_pt') has-error @enderror">
                                                            <label class="control-label" for="pregunta">Pregunta{{--<small class="required" style="color: red"> *</small>--}}</label>
                                                            <input type="text" class="form-control @error('pregunta_pt') is-invalid @enderror" value="{{ old('pregunta',$preguntatraslation['pregunta_pt']) }}"
                                                                   name="pregunta_pt" placeholder="Pregunta">
                                                            <!--<span class="error-container" style="color: red">-->
                                                    
                                                            @error('pregunta_pt')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                     
                                                            @enderror
                                                        </div>
                                                        <div class="form-group @error('respuesta_pt') has-error @enderror">
                                                            <label for="respuesta">Respuesta{{--<small class="required" style="color: red"> *</small>--}}</label>
                                                            <textarea name="respuesta_pt" class="textarea form-control @error('respuesta_pt') is-invalid @enderror" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"
                                                                      placeholder="Respuesta">{{ old('respuesta',$preguntatraslation['respuesta_pt']) }}</textarea>
                                                            <!--<span class="error-container" style="color: red">-->
                                                    
                                                            @error('respuesta_pt')
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
            $("#addForm").validate({
                ignore: [],
                lang:'es',
                onfocusout: function (element) {
                    $(element).valid();
                },
                errorPlacement: function(error, element) {
                    error.appendTo(element.parent(".form-group").find(".error-container"));
                },
                rules: {
                   /* pregunta_es: {
                        required: true,
                    },
                    pregunta_en: {
                        required: true,
                    },
                    pregunta_fr: {
                        required: true,
                    },
                    pregunta_de: {
                        required: true,
                    },
                    pregunta_it: {
                        required: true,
                    },
                    pregunta_pt: {
                        required: true,
                    },
                    respuesta_es: {
                        required: true,
                    },
                    respuesta_en: {
                        required: true,
                    },
                    respuesta_fr: {
                        required: true,
                    },
                    respuesta_de: {
                        required: true,
                    },
                    respuesta_it: {
                        required: true,
                    },
                    respuesta_pt: {
                        required: true,
                    },*/
                },
                messages: {
                    /*pregunta_es: {
                        required: 'El campo pregunta es obligatorio'
                    },
                    pregunta_en: {
                        required: 'El campo pregunta es obligatorio'
                    },
                    pregunta_fr: {
                        required: 'El campo pregunta es obligatorio'
                    },
                    pregunta_de: {
                        required: 'El campo pregunta es obligatorio'
                    },
                    pregunta_it: {
                        required: 'El campo pregunta es obligatorio'
                    },
                    pregunta_pt: {
                        required: 'El campo pregunta es obligatorio'
                    },
                    respuesta_es: {
                        required: 'El campo respuesta es obligatorio'
                    },
                    respuesta_en: {
                        required: 'El campo respuesta es obligatorio'
                    },
                    respuesta_fr: {
                        required: 'El campo respuesta es obligatorio'
                    },
                    respuesta_de: {
                        required: 'El campo respuesta es obligatorio'
                    },
                    respuesta_it: {
                        required: 'El campo respuesta  es obligatorio'
                    },
                    respuesta_pt: {
                        required: 'El campo respuesta es obligatorio'
                    },*/
                }
            });
        });
    </script>
@endsection