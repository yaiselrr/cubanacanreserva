@extends('layouts.admin')
@section('content')
    @include('admin.cancel', ['route'=>route('admin.manager.users.index')])
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Editar Usuario</h3>
                    </div>
                    <div class="card-body">
                        <form id="form" role="form" method="post" enctype="multipart/form-data" action="{{route('admin.manager.users.update', $user->id)}}">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-12 col-sm-6 col-lg-12">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group @error('email') has-error @enderror">
                                                    <label class="control-label" for="email">Correo electrónico<small class="required" style="color: red"> *</small></label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                                        </div>
                                                        <input type="text" class="form-control @error('email') is-invalid @enderror" value="{{ old('email',$user->email) }}" name="email" placeholder="Correo electrónico">
                                                        @error('email')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div><span class="help-block">{{__('cubanacan.email')}}</span></div>
                                                   <!-- <span class="error-container" style="color: red"></span>-->

                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group @error('name') has-error @enderror">
                                                    <label class="control-label" for="name">Nombre y apellidos<small class="required" style="color: red"> *</small></label>
                                                    <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name',$user->name) }}" name="name" placeholder="Nombre y apellidos">
                                                    <!-- <span class="error-container" style="color: red"></span>-->
                                                    @error('name')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group @error('avatar') has-error @enderror">
                                                    <label for="avatar">Avatar</label>
                                                    <div class="input-group">
                                                            <input id="files" type="file" name="avatar" accept="image/*" class="custom-file-input @error('avatar') is-invalid @enderror">
                                                            <label class="custom-file-label" for="exampleInputFile">Seleccionar archivo</label>
                                                            @error('avatar')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                    </div>
                                                    <div><span class="help-block">{{__('cubanacan.dimensiones', ['dim' => '200x200'])}}</span></div>
                                                    <div><span class="help-block">{{__('cubanacan.extensiones')}}</span></div>
                                                    <!-- <span class="error-container" style="color: red"></span>-->
                                                </div>
                                                <div class="mt-3">
                                                    <output id="list">
                                                                <span>
                                                                    <img src="{{asset('/storage/'.$user->avatar)}}" class="thumb img-circle img-thumbnail" alt="Imagen">
                                                                </span>
                                                    </output>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group @error('role_id') has-error @enderror">
                                                    <label>Rol<small class="required" style="color: red"> *</small></label>
                                                    <select class="form-control select2bs4 @error('role_id') is-invalid @enderror" name="role_id">
                                                        <option value="">--Seleccionar--</option>
                                                        @foreach($roles as $rol)
                                                            @if($user->rol->id  == $rol->id)
                                                                <option value="{{$rol->id}}" selected>{{$rol->nombre}}</option>
                                                            @else
                                                                <option value="{{$rol->id}}">{{$rol->nombre}}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                    <!-- <span class="error-container" style="color: red"></span>-->
                                                    @error('role_id')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="pull-right float-right">
                                                    <button type="submit" class="btn btn-app"><i class="fas fa-save"></i>Guardar</button>
                                                    <a type="button" class="btn btn-app" data-toggle="modal" data-target="#modal-cancel"><i class="fas fa-times-circle"></i>Cancelar</a>
                                            </div>
                                        </div>
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
                    nombre: {
                        required: true,
                    },
                    email: {
                        required: true,
                        email: true,
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
                    confirm:{
                        required: true,
                        equalTo: '#password'
                    },
                    password:{
                        required: true,
                    },
                    role_id: {
                        required: true,
                    },
                    avatar:{
                        extension: 'jpg|jpeg|png|gif',
                        checkDim: [200, 200],
                        maxsize: 200000
                    }
                },
                messages: {
                    nombre: {
                        required: 'El campo nombre y apellidos es obligatorio'
                    },
                    password: {
                        required: 'El campo contraseña es obligatorio'
                    },
                    confirm: {
                        required: 'El campo confirmar contraseña es obligatorio'
                    }
                    ,email: {
                        required: 'El campo correo electrónico es obligatorio',
                        remote: 'El campo correo electrónico debe ser único'
                    },
                    role_id: {
                        required: 'El campo rol es obligatorio',
                    },
                    avatar:{
                        extension: 'Las extensiones permitidas son jpg, jpeg, gif y png',
                        maxsize: 'El tamaño del archivo no debe exceder los 2Mb',
                    }
                }
            });
        });
    </script>
@endsection