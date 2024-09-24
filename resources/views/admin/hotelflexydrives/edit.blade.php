@extends('layouts.admin')
@section('content')
    @include('admin.cancel', ['route'=>route('admin.content.hotel-flexy-drive.index')])
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Editar Hotel de Flexy & Drive</h3>
                    </div>
                    <div class="card-body">
                        <form id="form" role="form" method="post" enctype="multipart/form-data"
                              action="{{route('admin.content.hotel-flexy-drive.update',$hotelflexydrive->id)}}">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-12 col-sm-6 col-lg-12">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group @error('hotel_id') has-error @enderror">
                                                    <label class="control-label" for="hotel_id">Nombre Hotel
                                                        <small class="required" style="color: red"> *</small>
                                                    </label>
                                                    <select
                                                        class="form-control select2bs4 @error('hotel_id') is-invalid @enderror"
                                                        id="hotel_id" name="hotel_id">
                                                        <option value="">--Seleccionar--</option>
                                                        @foreach($hoteles as $hotele)
                                                            @if($hotele->id == $hotelflexydrive->hotel_id)
                                                                <option value="{{$hotele->id}}"
                                                                        selected>{{$hotele->nombre}}</option>
                                                            @else
                                                                <option
                                                                    value="{{$hotele->id}}">{{$hotele->nombre}}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                    <!--<span class="error-container" style="color: red"></span>-->
                                                    @error('hotel_id')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group @error('provincia_id') has-error @enderror">
                                                    <label class="control-label" for="provincia_id">Provincia
                                                        <small class="required" style="color: red"> *</small>
                                                    </label>
                                                    <select
                                                        class="form-control select2bs4 @error('provincia_id') is-invalid @enderror"
                                                        id="provincia_id" name="provincia_id">
                                                        <option value="">--Seleccionar--</option>
                                                        @foreach($provincias as $provincia)
                                                            @if($provincia->id == $hotelflexydrive->provincia_id)
                                                                <option value="{{$provincia->id}}"
                                                                        selected>{{$provincia->provincia}}</option>
                                                            @else
                                                                <option
                                                                    value="{{$provincia->id}}">{{$provincia->provincia}}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                    <!--<span class="error-container" style="color: red"></span>-->
                                                    @error('provincia_id')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div
                                                    class="form-group @error('cantidad_habitaciones_dobles') has-error @enderror">
                                                    <label class="control-label" for="cantidad_habitaciones_dobles">Cantidad
                                                        Habitaciones Dobles
                                                        <small class="required" style="color: red"> *</small>
                                                    </label>
                                                    <input type="text" name="cantidad_habitaciones_dobles"
                                                           class="form-control @error('cantidad_habitaciones_dobles') is-invalid @enderror"
                                                           value="{{ old('cantidad_habitaciones_dobles',$hotelflexydrive->cantidad_habitaciones_dobles) }}"
                                                           placeholder="Cantidad Habitaciones Dobles">
                                                    <!--<span class="error-container" style="color: red"></span>-->
                                                    @error('cantidad_habitaciones_dobles')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
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
