@extends('layouts.admin')
@section('content')
    @include('admin.cancel', ['route'=>route('admin.content.contactos.index')])
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Editar Información de Contacto</h3>
                    </div>
                    <div class="card-body">
                        <form id="form" role="form" method="post" enctype="multipart/form-data" action="{{route('admin.content.contactos.update',$contacto->id)}}">
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
                                                        <div class="form-group @error('direccion_es') has-error @enderror">
                                                            <label for="direccion">Dirección<small class="required" style="color: red"> *</small></label>
                                                            <input type="text" name="direccion_es" class="form-control @error('direccion_es') is-invalid @enderror"
                                                                   placeholder="Dirección" value="{{old('direccion',$contactotraslation['direccion_es'])}}"></input>
                                                            <!--<span class="error-container" style="color: red"></span>-->
                                                            @error('direccion_es')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="custom-tabs-one-en" role="tabpanel" aria-labelledby="custom-tabs-one-en-tab">
                                                    <div class="box-body">
                                                        <div class="form-group @error('direccion_en') has-error @enderror">
                                                            <label for="direccion">Dirección{{--<small class="required" style="color: red"> *</small>--}}</label>
                                                            <input name="direccion_en" class="form-control @error('direccion_en') is-invalid @enderror"
                                                                   placeholder="Dirección" value="{{old('direccion',$contactotraslation['direccion_en'])}}"></input>
                                                            <!--<span class="error-container" style="color: red">-->
                                                            @error('direccion_en')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="custom-tabs-one-fr" role="tabpanel" aria-labelledby="custom-tabs-one-fr-tab">
                                                    <div class="box-body">
                                                        <div class="form-group @error('direccion_fr') has-error @enderror">
                                                            <label for="direccion">Dirección{{--<small class="required" style="color: red"> *</small>--}}</label>
                                                            <input name="direccion_fr" class="form-control @error('direccion_fr') is-invalid @enderror"
                                                                   placeholder="Dirección" value="{{old('direccion',$contactotraslation['direccion_fr'])}}"></input>
                                                            <!--<span class="error-container" style="color: red"></span>-->
                                                            @error('direccion_fr')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="custom-tabs-one-de" role="tabpanel" aria-labelledby="custom-tabs-one-de-tab">
                                                    <div class="box-body">
                                                        <div class="form-group @error('direccion_de') has-error @enderror">
                                                            <label for="direccion">Dirección{{--<small class="required" style="color: red"> *</small>--}}</label>
                                                            <input name="direccion_de" class="form-control @error('direccion_de') is-invalid @enderror"
                                                                   placeholder="Dirección" value="{{old('direccion',$contactotraslation['direccion_de'])}}"></input>
                                                            <!--<span class="error-container" style="color: red"></span>-->
                                                            @error('direccion_de')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="custom-tabs-one-it" role="tabpanel" aria-labelledby="custom-tabs-one-it-tab">
                                                    <div class="box-body">
                                                        <div class="form-group @error('direccion_it') has-error @enderror">
                                                            <label for="direccion">Dirección{{--<small class="required" style="color: red"> *</small>--}}</label>
                                                            <input name="direccion_it" class="form-control @error('direccion_it') is-invalid @enderror"
                                                                   placeholder="Dirección" value="{{old('direccion',$contactotraslation['direccion_it'])}}"></input>
                                                            <!--<span class="error-container" style="color: red"></span>-->
                                                            @error('direccion_it')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="custom-tabs-one-pt" role="tabpanel" aria-labelledby="custom-tabs-one-pt-tab">
                                                    <div class="box-body">
                                                        <div class="form-group @error('direccion_pt') has-error @enderror">
                                                            <label for="direccion">Dirección{{--<small class="required" style="color: red"> *</small>--}}</label>
                                                            <input name="direccion_pt" class="form-control @error('direccion_pt') is-invalid @enderror"
                                                                   placeholder="Dirección" value="{{old('direccion',$contactotraslation['direccion_pt'])}}"></input>
                                                            <!--<span class="error-container" style="color: red"></span>-->
                                                            @error('direccion_pt')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.card -->
                                    </div>
                                    <div class="box-body">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group @error('telefono') has-error @enderror">
                                                    <label class="control-label" for="telefono">Teléfono<small class="required" style="color: red"> *</small></label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                                        </div>
                                                        <input type="text" class="form-control @error('telefono') is-invalid @enderror" data-inputmask='"mask": "(+53) 9999-9999"' data-mask value="{{ old('telefono',$contacto->telefono) }}" name="telefono" placeholder="Teléfono">
                                                        @error('telefono')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div> <span class="help-block">{{__('cubanacan.phoneformato')}}</span></div>
                                                    <!--<span class="error-container" style="color: red"></span>-->
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group @error('email') has-error @enderror">
                                                    <label class="control-label" for="email">Correo electrónico<small class="required" style="color: red"> *</small></label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                                        </div>
                                                    <input type="text" class="form-control @error('email') is-invalid @enderror" value="{{ old('email',$contacto->email) }}" name="email" placeholder="Correo electrónico">
                                                        @error('email')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                        <div><span class="help-block">{{__('cubanacan.email')}}</span></div>
                                                    <!--<span class="error-container" style="color: red"></span>-->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.box-body -->
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
                    /*telefono: {
                        required: true,
                        phone: true,
                        remote:{
                            url:"/api/extra/unique/",
                            type:"get",
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

                    },
                    email: {
                        required: true,
                        email:true,
                        remote:{
                            url:"/api/extra/unique/",
                            type:"get",
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
                    },*/

                },
                messages: {
                    /*telefono: {
                        required: 'El campo teléfono es obligatorio',
                        remote: 'El campo teléfono debe ser único',
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
                    /*email: {
                        required: 'El campo correo electrónico es obligatorio',
                        remote: 'El campo correo electrónico debe ser único'
                    }*/
                }
            });
        });
    </script>
@endsection