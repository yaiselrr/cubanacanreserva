@extends('layouts.admin')
@section('content')
    @include('admin.cancel', ['route'=>route('admin.manager.roles.index')])
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Editar Roles</h3>
                    </div>
                    <div class="card-body">
                    <form id="form" role="form" method="post" enctype="multipart/form-data" action="{{route('admin.manager.roles.update',$role->id)}}">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-12 col-sm-6 col-lg-12">
                                <div class="card-body">
                                        <div class="form-group @error('nombre') has-error @enderror">
                                            <label class="control-label" for="nombre">Nombre del rol<small class="required" style="color: red"> *</small></label>
                                            <input type="text" class="form-control @error('nombre') is-invalid @enderror" value="{{ old('nombre',$role->nombre) }}" name="nombre" placeholder="Nombre">
                                            <!-- <span class="error-container" style="color: red"></span>-->
                                            @error('nombre')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group ">
                                            <label>Permisos<small class="required" style="color: red"> *</small></label>
                                            <select multiple="multiple" data-placeholder="--Seleccionar Multiples--" class="select2bs4"  style="width: 100%;" name="permisos[]">
                                                @foreach($permisos as $perm)
                                                    @if(in_array($perm->id,$role->permisos))
                                                        <option value="{{$perm->id}}" selected>{{$perm->nombre_accion}}</option>
                                                    @else
                                                        <option value="{{$perm->id}}">{{$perm->nombre_accion}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            <!-- <span class="error-container" style="color: red"></span>-->
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
                    </form>
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
                    /*name: {
                        required: true,
                    },
                    'permisos[]':{
                        required:true
                    }*/
                },
                messages: {
                    /*name: {
                        required: 'El campo nombre del rol es obligatorio'
                    },
                    'permisos[]':{
                        required:'El campo permisos es obligatorio'
                    }*/
                }
            });
        });
    </script>
@endsection