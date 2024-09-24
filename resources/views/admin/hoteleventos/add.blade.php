@extends('layouts.admin')
@section('content')
    @include('admin.cancel', ['route'=>route('admin.content.hoteles-eventos.index')])
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Crear Hoteles de Eventos</h3>
                    </div>
                    <div class="card-body">
                        <form id="form" role="form" method="post" enctype="multipart/form-data"
                              action="{{route('admin.content.hoteles-eventos.store')}}">
                            @csrf
                            <div class="row">
                                <div class="col-12 col-sm-6 col-lg-12">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group @error('hotel') has-error @enderror">
                                                    <label class="control-label" for="hotel">Nombre de Hoteles
                                                        <small class="required" style="color: red"> *</small>
                                                    </label>
                                                    <input class="form-control @error('hotel') is-invalid @enderror" id="hotel"
                                                            name="hotel" value="{{ old('hotel') }}" placeholder="Nombre de Hotel">
                                                    <!--<span class="error-container" style="color: red"></span>-->
                                                    @error('hotel')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group @error('cantidad_habitaciones_sencillas') has-error @enderror">
                                                    <label class="control-label" for="cantidad_habitaciones_sencillas">Cantidad Habitaciones Sencillas
                                                        <small class="required" style="color: red"> *</small>
                                                    </label>
                                                    <input type="text" name="cantidad_habitaciones_sencillas" class="form-control @error('cantidad_habitaciones_sencillas') is-invalid @enderror"
                                                           value="{{ old('cantidad_habitaciones_sencillas') }}" placeholder="Cantidad Habitaciones Sencillas">
                                                    <!--<span class="error-container" style="color: red"></span>-->
                                                    @error('cantidad_habitaciones_sencillas')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group @error('precio_habitacion_sencillas') has-error @enderror">
                                                    <label class="control-label" for="precio_habitacion_sencillas">Precio Habitaciones Sencillas
                                                        <small class="required" style="color: red"> *</small>
                                                    </label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">$</span>
                                                        </div>
                                                        <input type="text" class="form-control @error('precio_habitacion_sencillas') is-invalid @enderror" name="precio_habitacion_sencillas"
                                                               value="{{ old('precio_habitacion_sencillas')}}" placeholder="Precio Habitaciones Sencillas"></input>
                                                        <!--<span class="error-container" style="color: red">-->
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">.00</span>
                                                        </div>
                                                        @error('precio_habitacion_sencillas')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group @error('cantidad_habitaciones_dobles') has-error @enderror">
                                                    <label class="control-label" for="cantidad_habitaciones_dobles">Cantidad Habitaciones Dobles
                                                        <small class="required" style="color: red"> *</small>
                                                    </label>
                                                    <input type="text" name="cantidad_habitaciones_dobles" class="form-control @error('cantidad_habitaciones_dobles') is-invalid @enderror"
                                                           value="{{ old('cantidad_habitaciones_dobles') }}" placeholder="Cantidad Habitaciones Dobles">
                                                    <!--<span class="error-container" style="color: red"></span>-->
                                                    @error('cantidad_habitaciones_dobles')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group @error('precio_habitacion_dobles') has-error @enderror">
                                                    <label class="control-label" for="precio_habitacion_dobles">Precio Habitaciones Dobles
                                                        <small class="required" style="color: red"> *</small>
                                                    </label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">$</span>
                                                        </div>
                                                        <input type="text" class="form-control @error('precio_habitacion_dobles') is-invalid @enderror" name="precio_habitacion_dobles"
                                                               value="{{ old('precio_habitacion_dobles')}}" placeholder="Precio Habitaciones Dobles"></input>
                                                        <!--<span class="error-container" style="color: red">-->
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">.00</span>
                                                        </div>
                                                        @error('precio_habitacion_dobles')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
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