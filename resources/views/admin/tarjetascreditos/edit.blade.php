@extends('layouts.admin')
@section('content')
    @include('admin.cancel', ['route'=>route('admin.content.tarjeta-credito.index')])
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Crear Tarjetas de Crédito</h3>
                    </div>
                    <div class="card-body">
                        <form id="form" role="form" method="post" enctype="multipart/form-data"
                              action="{{route('admin.content.tarjeta-credito.update',$tarjetacredito->id)}}">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-12 col-sm-6 col-lg-12">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group @error('nombre') has-error @enderror">
                                                    <label for="nombre">Nombre
                                                        <small class="required" style="color: red"> *</small>
                                                    </label>
                                                    <input type="text"
                                                           class="form-control @error('nombre') is-invalid @enderror"
                                                           value="{{ old('nombre',$tarjetacredito->nombre) }}"
                                                           name="nombre" placeholder="Nombre">
                                                    <!--<span class="error-container" style="color: red"></span>-->
                                                    @error('nombre')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
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
                                                    </div>
                                                    <div>
                                                        <span class="help-block">{{__('cubanacan.dimensiones', ['dim' => '200x200'])}}</span>
                                                    </div>
                                                    <span class="help-block">{{__('cubanacan.extensiones')}}</span>
                                                    <!--<span class="error-container" style="color: red"></span>-->
                                                </div>

                                                <div class="mt-3">
                                                    <output id="list">
                                                                <span>
                                                                    <img src="{{asset('/storage/'.$tarjetacredito->imagen)}}"
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
                            <div class="row">
                                <div class="col-12">
                                    <div class="pull-right float-right">
                                        <button type="submit" class="btn btn-app"><i class="fas fa-save"></i>Guardar
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
                    },
                    imagen: {
                        extension: "jpg,jpeg,png,gif",
                        checkDim: [760, 175],
                        maxsize: 200000,
                    }*/
                },
                messages: {
                    /*nombre: {
                        required: 'El campo nombre es obligatorio'
                    },
                    imagen: {
                        required: 'El campo imagen es obligatorio',
                        extension: 'Las extensiones permitidas son jpg,jpeg,gif y png',
                        maxsize: 'El tamaño del archivo no debe exceder los 2Mb',
                    }*/

                }
            });
        });
    </script>
@endsection