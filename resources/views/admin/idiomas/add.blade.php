@extends('layouts.admin')
@section('content')
    @include('admin.cancel', ['route'=>route('admin.nomenclator.idiomas.index')])
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Crear Idioma</h3>
                    </div>
                    <div class="card-body">
                        <form id="addform" role="form" name="addform" method="post" enctype="multipart/form-data" action="{{route('admin.nomenclator.idiomas.store')}}">
                            @csrf
                            <div class="row">
                                <div class="col-12 col-sm-6 col-lg-12">
                                    <div class="box-body">
                                        <div class="form-group @error('idioma') has-error @enderror">
                                            <label class="control-label" for="dias">Idioma<small class="required" style="color: red"> *</small></label>
                                            <input type="text" class="form-control @error('idioma') is-invalid @enderror" value="{{ old('idioma') }}" name="idioma" placeholder="Idioma">
                                            <!--<span class="error-container" style="color: red"></span>-->
                                            @error('idioma')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
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