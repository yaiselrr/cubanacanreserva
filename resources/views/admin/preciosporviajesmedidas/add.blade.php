@extends('layouts.admin')
@section('content')
    @include('admin.cancel', ['route'=>route('admin.content.precios-por-viajes-medidas.index')])
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Crear Precios x Viajes a la Medida</h3>
                    </div>
                    <div class="card-body">
                        <form id="form" role="form" method="post" enctype="multipart/form-data"
                              action="{{route('admin.content.precios-por-viajes-medidas.store')}}">
                            @csrf
                            <div class="row">
                                <div class="col-12 col-sm-6 col-lg-12">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group @error('viaje_medida_id') has-error @enderror">
                                                    <label class="control-label" for="viajemedida">Viaje de la Medida
                                                        <small class="required" style="color: red"> *</small>
                                                    </label>
                                                    <select
                                                        class="form-control select2bs4 @error('viaje_medida_id') is-invalid @enderror"
                                                        id="viajemedida" name="viaje_medida_id">
                                                        <option value="">--Seleccionar--</option>
                                                        @foreach($viajesmedida as $viajemedida)
                                                            <option
                                                                value="{{$viajemedida->id}}">{{$viajemedida->nombre}}</option>
                                                        @endforeach
                                                    </select>
                                                    <!--<span class="error-container" style="color: red"></span>-->
                                                    @error('viaje_medida_id')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div
                                                    class="form-group @error('dias_antelacion_rese_id') has-error @enderror">
                                                    <label class="control-label" for="diasantelacion">Dias Antelación
                                                        Reserva
                                                        <small class="required" style="color: red"> *</small>
                                                    </label>
                                                    <select
                                                        class="form-control select2bs4 @error('dias_antelacion_rese_id') is-invalid @enderror"
                                                        name="dias_antelacion_rese_id" id="dias_antelacion_rese_id">
                                                        <option value="">--Seleccionar--</option>
                                                        @foreach($diasantelacionreservas as $diasantelacionreserva)
                                                            <option
                                                                value="{{$diasantelacionreserva->id}}">{{$diasantelacionreserva->dias}}</option>
                                                        @endforeach
                                                    </select>
                                                    <span class="invalid-feedback"
                                                          id="error_dias_antelacion_rese_id"></span>
                                                    @error('dias_antelacion_rese_id')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group @error('fecha_inicio') has-error @enderror">
                                                    <label class="control-label" for="fecha_inicio">Fecha Inicio
                                                        <small class="required" style="color: red"> *</small>
                                                    </label>
                                                    <input type="date" name="fecha_inicio"
                                                           class="form-control @error('fecha_inicio') is-invalid @enderror"
                                                           id="fecha_inicio" value="{{ old('fecha_inicio') }}"
                                                           placeholder="Fecha Inicio" disabled>
                                                    <span class="invalid-feedback" id="error_fecha_inicio"></span>
                                                    @error('fecha_inicio')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group @error('fecha_fin') has-error @enderror">
                                                    <label class="control-label" for="fecha_fin">Fecha Fin
                                                        <small class="required" style="color: red"> *</small>
                                                    </label>
                                                    <input type="date" name="fecha_fin"
                                                           id="fecha_fin"
                                                           class="form-control @error('fecha_fin') is-invalid @enderror"
                                                           value="{{ old('fecha_fin') }}"
                                                           placeholder="Fecha Fin" disabled>
                                                    <span class="invalid-feedback" id="error_fecha_fin"></span>
                                                    @error('fecha_fin')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group @error('precio_x_pax') has-error @enderror">
                                                    <label class="control-label" for="precio_x_pax">Precio x Pax
                                                        <small class="required" style="color: red"> *</small>
                                                    </label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">$</span>
                                                        </div>
                                                        <input type="text" name="precio_x_pax"
                                                               class="form-control @error('precio_x_pax') is-invalid @enderror"
                                                               value="{{ old('precio_x_pax') }}"
                                                               placeholder="Precio x Pax">
                                                        <!--<span class="error-container" style="color: red"></span>-->
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">.00</span>
                                                        </div>
                                                        @error('precio_x_pax')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-sm-6">
                                                <div
                                                    class="form-group @error('precio_ninnos_12annos') has-error @enderror">
                                                    <label class="control-label" for="precio_ninnos_12annos">Precio
                                                        niños (2 a 12 años)
                                                        <small class="required" style="color: red"> *</small>
                                                    </label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">$</span>
                                                        </div>
                                                        <input type="text" name="precio_ninnos_12annos"
                                                               class="form-control @error('precio_ninnos_12annos') is-invalid @enderror"
                                                               value="{{ old('precio_ninnos_12annos') }}"
                                                               placeholder="Precio niños (2 a 12 años)">
                                                        <!--<span class="error-container" style="color: red"></span>-->
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">.00</span>
                                                        </div>

                                                        @error('precio_ninnos_12annos')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group @error('capacidad') has-error @enderror">
                                                    <label class="control-label" for="capacidad">Capacidad
                                                        <small class="required" style="color: red"> *</small>
                                                    </label>
                                                    <input type="text" name="capacidad"
                                                           class="form-control @error('capacidad') is-invalid @enderror"
                                                           value="{{ old('capacidad') }}" placeholder="Capacidad">
                                                    <!--<span class="error-container" style="color: red"></span>-->
                                                    @error('capacidad')
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
@section('jscript')
    <script>

        $('#dias_antelacion_rese_id').on('change', function () {

            var dias_antelacion_rese_id = document.getElementById('dias_antelacion_rese_id');

            if (dias_antelacion_rese_id.value != '') {
                $('#fecha_inicio').prop('disabled', false);
                $('#fecha_fin').prop('disabled', false);
                $('#fecha_inicio').val('');
                $('#fecha_fin').val('');

                $('#fecha_fin').removeClass('is-invalid');
                $('#error_fecha_fin').html('');
                $('#fecha_inicio').removeClass('is-invalid');
                $('#fecha_inicio').html('');
                $('#dias_antelacion_rese_id').removeClass('is-invalid');
                $('#error_dias_antelacion_rese_id').html('');

            } else {
                $('#fecha_inicio').val('');
                $('#fecha_fin').val('');
                $('#fecha_inicio').prop('disabled', true);
                $('#fecha_fin').prop('disabled', true);
                $('#fecha_fin').removeClass('is-invalid');
                $('#error_fecha_fin').html('');
                $('#fecha_inicio').removeClass('is-invalid');
                $('#fecha_inicio').html('');
                $('#dias_antelacion_reserva_id').removeClass('is-invalid');
                $('#error_dias_antelacion_reserva_id').html('');
            }
        })

        $("#fecha_inicio").on("input", function () {

            $('#fecha_fin').removeClass('is-invalid');
            $('#error_fecha_fin').html('');
            $('#fecha_fin').val('');
            $('#fecha_inicio').removeClass('is-invalid');
            $('#fecha_inicio').html('');
        });

        $("#fecha_fin").on("input", function () {
            var fecha_total = new Date($("#fecha_inicio").val() + 'T00:00:00');
            var fecha_fin = new Date($('#fecha_fin').val());
            var diasantelacion = $('#dias_antelacion_rese_id').val();


            if ($('#fecha_inicio').val() != "") {
                fecha_total.setDate(fecha_total.getDate() + parseInt(diasantelacion));
                if (fecha_fin <= fecha_total) {
                    $('#fecha_fin').addClass('is-invalid');
                    $('#error_fecha_fin').html('');
                    $('#error_fecha_fin').append('La fecha seleccionada no cumple con los parámetros mínimos para la reserva. Mínimo ' + diasantelacion + ' días de antelación');
                    $('#fecha_inicio').removeClass('is-invalid');
                    $('#error_fecha_inicio').html('');
                    $('#fecha_fin').val('');
                } else {
                    $('#fecha_fin').removeClass('is-invalid');
                    $('#error_fecha_fin').html('');
                }
            } else {

                $('#fecha_inicio').addClass('is-invalid');
                $('#error_fecha_inicio').html('');
                $('#error_fecha_inicio').append('Debe seleccionar primero una fecha de incio.');
                $('#fecha_fin').val('');
            }
        });
    </script>
@endsection
