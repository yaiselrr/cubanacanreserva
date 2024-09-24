@extends('layouts.admin')
@section('content')
    @include('admin.cancel', ['route'=>route('admin.nomenclator.nacionalidades.index')])
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Crear Nacionalidad</h3>
                    </div>
                    <div class="card-body">
                        <form id="addform" role="form" name="addform" method="post" enctype="multipart/form-data" action="{{route('admin.nomenclator.nacionalidades.store')}}">
                            @csrf
                            <div class="row">
                                <div class="col-12 col-sm-6 col-lg-12">
                                    <div class="box-body">
                                        <div class="form-group @error('nacionalidad') has-error @enderror">
                                            <label class="control-label" for="nacionalidad">Nacionalidad<small class="required" style="color: red"> *</small></label>
                                            <input type="text" class="form-control @error('nacionalidad') is-invalid @enderror" value="{{ old('nacionalidad') }}" name="nacionalidad" placeholder="Nacionalidad">
                                            <!--<span class="error-container" style="color: red"></span>-->
                                            @error('nacionalidad')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="pull-right float-right">
                                        <a type="submit" class="btn btn-app"><i class="fas fa-save"></i>Guardar</a>
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