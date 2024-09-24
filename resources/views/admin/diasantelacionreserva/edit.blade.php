@extends('layouts.admin')
@section('content')
    @include('admin.cancel', ['route'=>route('admin.nomenclator.dias-antelacion-reserva.index')])
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Editar Días Antelación Reserva</h3>
                    </div>
                    <div class="card-body">
                        <form id="addform" role="form" name="addform" method="post" enctype="multipart/form-data" action="{{route('admin.nomenclator.dias-antelacion-reserva.update',$diasantelacionreserva->id)}}">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-12 col-sm-6 col-lg-12">
                                    <div class="box-body">
                                        <div class="form-group @error('dias') has-error @enderror">
                                            <label class="control-label" for="dias">Días de Antelación<small class="required" style="color: red"> *</small></label>
                                            <input type="text" class="form-control @error('dias') is-invalid @enderror" value="{{ old('dias',$diasantelacionreserva->dias) }}" name="dias" placeholder="Días de Antelación">
                                            <!--<span class="error-container" style="color: red"></span>-->
                                            @error('dias')
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