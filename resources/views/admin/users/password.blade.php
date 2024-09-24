@extends('layouts.admin')
@section('content')
    @include('admin.cancel', ['route'=>route('admin.manager.users.index')])
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Editar Contraseña</h3>
                    </div>
                    <div class="card-body">
                        <form role="form" method="post" enctype="multipart/form-data" action="{{route('admin.manager.users.password-update', $user->id)}}">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-12 col-sm-6 col-lg-12">
                                    <div class="card-body">
                                        <div class="form-group @error('password') has-error @enderror">
                                            <label class="control-label" for="password">Contraseña</label>
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                                                   value="{{ old('password') }}" name="password" placeholder="Contraseña">
                                            @error('password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group @error('password_confirmation') has-error @enderror">
                                            <label class="control-label" for="confirm">Confirmar contraseña</label>
                                            <input  type="password" class="form-control @error('password_confirmation') is-invalid @enderror"
                                                    value="{{ old('password_confirmation') }}" name="confirm" placeholder="Confirmar contraseña">
                                            @error('password_confirmation')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
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
                    confirm:{
                        required: true,
                        equalTo: '#password'
                    },
                    password:{
                        required: true,
                    },
                },
                messages: {
                    confirm:{
                        required: 'El campo confirmar contraseña es obligatorio',
                    },
                    password:{
                        required: 'El campo contraseña es obligatorio',
                    },
                }
            });
        });
    </script>
@endsection