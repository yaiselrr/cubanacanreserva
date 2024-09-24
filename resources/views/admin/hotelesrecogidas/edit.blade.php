@extends('layouts.admin')
@section('content')
    @include('admin.cancel', ['route'=>route('admin.content.hotel-recogida.index')])
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Crear Hotel de Recogida</h3>
                    </div>
                    <div class="card-body">
                        <form id="form" role="form" method="post" enctype="multipart/form-data"
                              action="{{route('admin.content.hotel-recogida.update',$hotelrecogida->id)}}">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-12 col-sm-6 col-lg-12">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group @error('hotel') has-error @enderror">
                                                    <label for="nombre">Hotel<small class="required" style="color: red">
                                                            *</small></label>
                                                    <input type="text"
                                                           class="form-control @error('hotel') is-invalid @enderror"
                                                           value="{{ old('hotel',$hotelrecogida->hotel) }}" name="hotel"
                                                           placeholder="Hotel">
                                                    <!--<span class="error-container" style="color: red"></span>-->
                                                    @error('hotel')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group @error('hora') has-error @enderror">
                                                    <label for="hora">Hora<small class="required" style="color: red">
                                                            *</small></label>
                                                    <div class="bootstrap-timepicker">
                                                        <div class="input-group date"
                                                             data-target-input="nearest">
                                                            <div class="input-group-append" data-target="#timepicker"
                                                                 data-toggle="datetimepicker">
                                                                <div class="input-group-text"><i
                                                                        class="far fa-clock"></i></div>
                                                            </div>
                                                            <input type="time"
                                                                   class="form-control datetimepicker-input @error('hora') is-invalid @enderror"
                                                                   name="hora" placeholder="Hora"
                                                                   value="{{ old('hora',$hotelrecogida->hora) }}"
                                                                   data-target="#timepicker"/>
                                                            @error('hora')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <!--<span class="error-container" style="color: red"></span>-->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group @error('excursion_id') has-error @enderror">
                                                    <label class="control-label" for="excursion_id">Excursión
                                                        <small class="required" style="color: red"> *</small>
                                                    </label>
                                                    <select
                                                        class="form-control select2bs4 @error('excursion_id') is-invalid @enderror"
                                                        id="excursion_id"
                                                        name="excursion_id">
                                                        <option value="">--Seleccionar--</option>
                                                        @foreach($excursiones as $excursion)
                                                            @if($hotelrecogida->excursion_id == $excursion->id)
                                                                <option value="{{$excursion->id}}"
                                                                        selected>{{$excursion->nombre}}</option>
                                                            @else
                                                                <option
                                                                    value="{{$excursion->id}}">{{$excursion->nombre}}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                    <!--<span class="error-container" style="color: red"></span>-->
                                                    @error('excursion_id')
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
