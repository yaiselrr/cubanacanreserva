@extends('layouts.admin')
@section('content')
    @include('admin.cancel', ['route'=>route('admin.nomenclator.plan-alojamiento.index')])
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Crear Plan de Alojamiento</h3>
                    </div>
                    <div class="card-body">
                        <form id="addform" role="form" name="addform" method="post" enctype="multipart/form-data" action="{{route('admin.nomenclator.plan-alojamiento.store')}}">
                            @csrf
                            <div class="row">
                                <div class="col-12 col-sm-6 col-lg-12">
                                    <div class="box-body">
                                        <div class="form-group @error('planalojamiento') has-error @enderror">
                                            <label class="control-label" for="planalojamiento">Plan Alojamiento<small class="required" style="color: red"> *</small></label>
                                            <input type="text" class="form-control @error('planalojamiento') is-invalid @enderror" value="{{ old('planalojamiento') }}" name="planalojamiento" placeholder="Plan Alojamiento">
                                            <!--<span class="error-container" style="color: red"></span>-->
                                            @error('planalojamiento')
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