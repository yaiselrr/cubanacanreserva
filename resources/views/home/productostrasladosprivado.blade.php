@extends('layouts.fronts.assest')
@section('header')
    @include('layouts.fronts.header')
@endsection
@section('navbar')
    @include('layouts.fronts.navbar')
@endsection
@section('content')

    @include('layouts.fronts.carousel')
    @include('layouts.fronts.buscarProductos')
    @include('layouts.fronts.botonesproductos')

    <div class="col-md-12">

        <p>En un ómnibus de turismo, acompañado y asistido por guías de turismo, todos los días, permite viajar entre
            hoteles ubicados en varias ciudades y polos turísticos del país. Durante el viaje se ofrece información
            general de las zonas por donde se transita y se harán breves paradas en instalaciones turísticas para
            estirar las piernas, ir al baño, merendar o almorzar según la Conexión. Conectando Cuba está disponible en
            todas las provincias donde opera la Agencia Viajes Cubanacán en sus Buróes de Turismo. Forma parte del
            Catálogo de Productos de TU EXCURSIÓN CONMIGO.</p>

    </div>
    <div class="row">
        <strong class="col-md-12" style="margin-left: 500px;margin-bottom: 40px;color: #DA2513;">!Reserve su
            traslado!</strong>
        @if (count($errors) > 0)
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-check"></i> Atención lea las siguientes indicaciones</h5>
                <ul>
                    @foreach($errors->all() as $error)
                        <li>
                            {{ $error }}
                        </li>
                    @endforeach
                </ul>
            </div>

        @endif
        @if (session('notificacion'))

            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-check"></i> Congratulaciones!</h5>
                {{ session('notificacion') }}
            </div>

        @endif
        @if (session('notificacionerror'))

            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-check"></i> Ha ocurrido un error</h5>
                {{ session('notificacionerror') }}
            </div>

        @endif
    </div>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-10">
            <form id="privado" name="privado" role="form" method="post"
                  enctype="multipart/form-data"
                  action="{{route('home.transferprivado.store')}}">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4 mb-4">
                            <div class="form-group">
                                <label for="fecha_inicio">Fecha incio:
                                    <small class="required" style="color: red"> *</small>
                                </label>
                                <input type="date" class="form-control" min="{{  date('Y-m-d')}}"
                                       name="fecha_inicio" id="fecha_inicio"
                                       value="{{ old('fecha_inicio') }}" placeholder="Fecha de Entrada">
                                <span class=" invalid-feedback" id="error_fecha_inicio"></span>
                            </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <div class="form-group">
                                <label for="fecha_fin">Fecha fin :
                                    <small class="required" style="color: red"> *</small>
                                </label>
                                <input type="date" class="form-control" min="{{  date('Y-m-d')}}"
                                       name="fecha_fin" id="fecha_fin"
                                       value="{{ old('fecha_fin') }}" placeholder="Fecha de Fin">
                                <span class=" invalid-feedback" id="error_fecha_fin"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-4">
                            <div class="form-group">
                                <label>Origen:
                                    <small class="required" style="color: red"> *</small>
                                </label>
                                <select class="form-control select2bs4" required id="provincia_origen"
                                        name="provincia_origen">
                                    <option value="">--Seleccione--</option>
                                    @foreach($destin_inicia as $c)
                                        <option value="{{$c->id}}">{{$c->origen}}</option>
                                    @endforeach
                                </select>
                                <span class="invalid-feedback"
                                      id="error_provincia_origen"></span>

                            </div>
                        </div>

                        <div class="col-md-4 mb-4">
                            <div class="form-group">
                                <label>Destino:
                                    <small class="required" style="color: red"> *</small>
                                </label>
                                <select class="form-control select2bs4" required id="provincia_destino"
                                        name="provincia_destino">
                                    <option value="">--Seleccione--</option>
                                    @foreach($provincias as $c)
                                        <option value="{{$c->id}}">{{$c->provincia}}</option>
                                    @endforeach
                                </select>
                                <span class="invalid-feedback"
                                      id="error_provincia_destino"></span>

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-4">
                            <div class="form-group">
                                <label for="incluir_guia">Incluir guía:
                                    <small class="required" style="color: red"> *</small>
                                </label>
                                <select class="form-control select2bs4" name="incluir_guia"
                                        id="incluir_guia">
                                    <option value="">--Seleccionar--</option>
                                    <option value="0">No</option>
                                    <option value="1">Si</option>
                                </select>
                                <span class="invalid-feedback" id="error_incluir_guia"></span>
                            </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <div class="form-group">
                                <label for="tipo_vehiculo">Tipo vehiculo:
                                    <small class="required" style="color: red"> *</small>
                                </label>
                                <select class="form-control select2bs4" name="tipo_vehiculo"
                                        id="tipo_vehiculo">
                                    <option value="">--Seleccionar tipo vehiculo--</option>
                                    <option value="2">Taxi Standar 1 - 2 PAX</option>
                                    <option value="4">Taxi Mircro 3 - 4 PAX</option>
                                    <option value="8">Microbus 5 - 8 PAX</option>
                                    <option value="12">Minibus 9 - 12 PAX</option>
                                    <option value="20">Minibus 13 - 20 PAX</option>
                                    <option value="30">Omnibus 21 - 30 PAX</option>
                                    <option value="43">Omnibus 31 - 43 PAX</option>
                                </select>
                                <span class="invalid-feedback" id="error_tipo_vehiculo"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-4">
                            <div class="form-group">
                                <label for="cantidadadultos">Cantidad de Adultos:
                                    <small class="required" style="color: red"> *</small>
                                </label>
                                <select type="text" class="form-control select2bs4" id="cantidad_adultos"
                                        name="cantidad_adultos">
                                    <option value="">--Seleccionar Cantidad--</option>
                                </select>
                                <span class="invalid-feedback" id="error_cantidad_adultos"></span>
                            </div>
                        </div>

                        <div class="col-md-4 mb-4">
                            <div class="form-group">
                                <label for="cantidad_ninnos0a2">Cantidad de infante (0-2 años):

                                </label>
                                <select class="form-control select2bs4" name="cantidad_ninnos0a2"
                                        id="cantidad_ninnos0a2">
                                    <option value="">--Seleccionar Cantidad--</option>
                                </select>

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-4">
                            <div class="form-group">
                                <label for="cantidad_ninnos2a12">Cantidad de niños (2-12 años):

                                </label>
                                <select class="form-control select2bs4" name="cantidad_ninnos2a12"
                                        id="cantidad_ninnos2a12">
                                    <option value="">--Seleccionar Cantidad--</option>
                                </select>

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-4">
                            <div class="form-group">
                                <label>Lugar de inicio del servicio:
                                    <small class="required" style="color: red"> *</small>
                                </label>
                                <input type="text" required class="form-control" id="lugari"
                                       name="lugari"
                                       placeholder="Lugar de inicio del servicio">
                                <span class="invalid-feedback" id="error_lugari"></span>
                            </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <div class="form-group">
                                <label>Hora de inicio del servicio:
                                    <small class="required" style="color: red"> *</small>
                                </label>
                                <input type="time" class="form-control" id="hora_inicio"
                                       name="hora_inicio"
                                       placeholder="">
                                <span class="invalid-feedback" id="error_hora_inicio"></span>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-4">
                            <div class="form-group">
                                <label>Lugar de fin del servicio:
                                    <small class="required" style="color: red"> *</small>
                                </label>
                                <input type="text" required class="form-control" id="lugarf"
                                       name="lugarf"
                                       placeholder="Lugar de fin del servicio">
                                <span class="invalid-feedback" id="error_nombre"></span>
                            </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <div class="form-group">
                                <label>Hora de fin del servicio:
                                    <small class="required" style="color: red"> *</small>
                                </label>
                                <input type="time" class="form-control" id="hora_fin"
                                       name="hora_fin"
                                       placeholder="">
                                <span class="invalid-feedback" id="error_hora_fin"></span>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-4">
                            <div class="form-group">
                                <label>Nombre y Apellidos del titular de la reserva:
                                    <small class="required" style="color: red"> *</small>
                                </label>
                                <input type="text" required class="form-control" id="nombre"
                                       name="nombre"
                                       placeholder="Nombre y Apellidos">
                                <span class="invalid-feedback" id="error_nombre"></span>
                            </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <div class="form-group">
                                <label>Email:
                                    <small class="required" style="color: red"> *</small>
                                </label>
                                <input type="email" required class="form-control" id="email"
                                       name="email"
                                       placeholder="Email">
                                <span class="invalid-feedback" id="error_email"></span>
                            </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <div class="form-group">
                                <label id="lblpn">Precio Ninnos:

                                </label>
                                <input type="text" required class="form-control" id="precio_ninnos"
                                       name="precio_ninnos" readonly
                                       placeholder="Precio">
                                <span class="invalid-feedback" id="error_vuelo"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-4">
                            <div class="form-group">
                                <label>Nacionalidad:
                                    <small class="required" style="color: red"> *</small>
                                </label>
                                <select class="form-control select2bs4" required id="nacionalidad_id"
                                        name="nacionalidad_id">
                                    <option value="">--Seleccione--</option>
                                    <script>
                                        let countries = [];
                                        let i = '';
                                    </script>
                                    @foreach($nacionalidades as $nacionalidad)
                                        <option value="{{$nacionalidad->id}}">{{$nacionalidad->nacionalidad}}</option>
                                    @endforeach
                                </select>
                                <span class="invalid-feedback"
                                      id="error_nacionalidad_id"></span>

                            </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <div class="form-group">
                                <label>No. Vuelo:
                                    <small class="required" style="color: red"> *</small>
                                </label>
                                <input type="text" required class="form-control" id="vuelo"
                                       name="vuelo"
                                       placeholder="No. Vuelo">
                                <span class="invalid-feedback" id="error_vuelo"></span>
                            </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <div class="form-group">
                                <label id="lblpa">Precio Ad:

                                </label>
                                <input type="text" required class="form-control" id="precio_adulto"
                                       name="precio_adulto" readonly
                                       placeholder="Precio">
                                <span class="invalid-feedback" id="error_vuelo"></span>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-4 mb-4">
                            <div class="form-group">
                                <label id="lblpf">Precio F:

                                </label>
                                <input type="text" required class="form-control" id="precio_f"
                                       name="precio_f" readonly
                                       placeholder="Precio">
                                <span class="invalid-feedback" id="error_vuelo"></span>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="req_especiales">Requerimientos especiales:</label>
                                <textarea name="req_especiales" class="form-control"
                                          style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;overflow-y: scroll"
                                          placeholder="Requerimientos especiales">{{ old('req_especiales') }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" style="float: left" id="botonp">Total a pagar: USD</button>
                    <button type="button" class="btn btn-danger" style="float: right;" data-dismiss="modal">
                        Cancelar
                    </button>
                    <button type="submit" class="btn btn-danger">Reservar</button>
                </div>
            </form>
        </div>

    </div>
@endsection
@section('jsprueba')
    <script type="text/javascript">
        $('#cantidad_adultos').prop("disabled", true);
        $('#cantidad_ninnos0a2').prop("disabled", true);
        $('#cantidad_ninnos2a12').prop("disabled", true);
        $('#incluir_guia').prop("disabled", true);
        $('#provincia_origen').val('').trigger('change');
        $('#provincia_destino').val('').trigger('change');
        $('#tipo_vehiculo').val('').trigger('change');
        $('#incluir_guia').val('').trigger('change');
        document.getElementById("precio_ninnos").hidden = false;
        document.getElementById("precio_adulto").hidden = false;
        document.getElementById("precio_f").hidden = false;
        document.getElementById("lblpa").hidden = false;
        document.getElementById("lblpn").hidden = false;
        document.getElementById("lblpf").hidden = false;

        var idFilaHab_selected = [];

        //Realizar la reservar traslado
        $('#botonp').on('click', function (event) {
            event.preventDefault();
            var form = $('#privado');
            var url = form.attr('action');
            var dataformulario = $('#privado').get(0);
            console.log(url);
            console.log(dataformulario);

            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url: url,
                method: "POST",
                data: new FormData(dataformulario),
                contentType: false,
                cache: false,
                processData: false,
                dataType: "json",
                success: function (data) {
                    if (data.success) {
                        window.location.href = data.redirect;
                        // limpiarDatos();
                    }
                },
                error: function (data) {
                    if (data.responseJSON) {
                        console.log(data.responseJSON.errors);
                        $.each(data.responseJSON.errors, function (key, value) {
                            showErrors(key, value);
                        });
                    }
                }
            });


        });

        var cod = document.getElementById("provincia_origen").value;


        $('#provincia_origen').on('change', function () {
            var id = $(this).val();
            var or = $("#provincia_origen option:selected").text();
            //alert(or)
            var inicis = [];
            @foreach ($destin_inicias as $cc )
            inicis.push(@json($cc));
            @endforeach
            $('#provincia_destino').empty();
            $('#provincia_destino').append("<option value=''>"
                + "--Seleccionar destino--" + "</option>");
            //alert(id)

            $.each(inicis, function (i, item) {
                if (item['origen'] == or) {

                    var p = item['destino']
                    //alert(item['precio_pax'])

                    $('#provincia_destino').append("<option value='" + item['id'] + "'>"
                        + p + "</option>");
                }
            });
        });

        $('#tipo_vehiculo').on('change', function () {
            var tipo_vehiculo = $(this).val();
            //var l = $("#tipo_vehiculo option:selected").text();


            //alert(l);

            $('#cantidad_adultos').empty();
            $('#cantidad_adultos').append("<option value=''>"
                + "--Seleccionar Cantidad--" + "</option>");
            for (i = 1; i <= tipo_vehiculo; i++) {
                $('#cantidad_adultos').append("<option value='" + i + "'>"
                    + i + "</option>");
            }
            $('#cantidad_adultos').prop("disabled", false);

            $('#cantidad_ninnos0a2').empty();
            $('#cantidad_ninnos0a2').append("<option value=''>"
                + "--Seleccionar Cantidad--" + "</option>");
            for (h = 0; h <= tipo_vehiculo; h++) {
                $('#cantidad_ninnos0a2').append("<option value='" + h + "'>"
                    + h + "</option>");
            }
            $('#cantidad_ninnos0a2').prop("disabled", false);

            $('#cantidad_ninnos2a12').empty();
            $('#cantidad_ninnos2a12').append("<option value=''>"
                + "--Seleccionar Cantidad--" + "</option>");
            for (j = 0; j <= tipo_vehiculo; j++) {
                $('#cantidad_ninnos2a12').append("<option value='" + j + "'>"
                    + j + "</option>");
            }
            $('#cantidad_ninnos2a12').prop("disabled", false);
            if (tipo_vehiculo > 8) {

                $('#incluir_guia').empty();
                $('#incluir_guia').append("<option value=''>--Seleccione--</option>");
                $('#incluir_guia').append("<option value='" + 1 + "' selected>Si</option>");
                $('#incluir_guia').prop("disabled", false);


            } else {
                $('#incluir_guia').empty();
                $('#incluir_guia').append("<option value=''>--Seleccione--</option>");
                $('#incluir_guia').append("<option value='" + 0 + "'>No</option>");
                $('#incluir_guia').append("<option value='" + 1 + "'>Si</option>");
                $('#incluir_guia').prop("disabled", false);
            }

        });

        $('#incluir_guia').on('change', function () {
            var codd = document.getElementById("tipo_vehiculo").value;
            //$('#cantidad_adultos').val('').trigger('change');
            $('#cantidad_adultos').empty();
            $('#cantidad_adultos').append("<option value=''>"
                + "--Seleccionar Cantidad--" + "</option>");
            for (i = 1; i <= codd; i++) {
                $('#cantidad_adultos').append("<option value='" + i + "'>"
                    + i + "</option>");
            }

            $('#cantidad_ninnos2a12').empty();
            $('#cantidad_ninnos2a12').append("<option value=''>"
                + "--Seleccionar Cantidad--" + "</option>");
            for (j = 0; j <= codd; j++) {
                $('#cantidad_ninnos2a12').append("<option value='" + j + "'>"
                    + j + "</option>");
            }

            $('#cantidad_ninnos0a2').empty();
            $('#cantidad_ninnos0a2').append("<option value=''>"
                + "--Seleccionar Cantidad--" + "</option>");
            for (h = 0; h <= codd; h++) {
                $('#cantidad_ninnos0a2').append("<option value='" + h + "'>"
                    + h + "</option>");
            }


        });
        var qqq = 0;


        $('#cantidad_adultos').on('change', function () {
            var adultos = $(this).val();
            var cod = document.getElementById("tipo_vehiculo").value;
            var gu = document.getElementById("incluir_guia").value;
            var prvincia = document.getElementById("provincia_destino").value;

            var inicisss = [];
            @foreach ($destin_inicias as $cc )
            inicisss.push(@json($cc));
            @endforeach
            //alert(prvincia)

            $.each(inicisss, function (i, item) {
                if (item['id'] == prvincia) {

                    var ss = item['taxi_standar_dos_sin']
                    var sc = item['taxi_standar_dos_con']
                    var ms = item['taxi_micro_cuatro_sin']
                    var mc = item['taxi_micro_cuatro_con']
                    var mics = item['transtur_micro_diez_sin']
                    var micc = item['transtur_micro_diez_con']
                    var minc1 = item['transtur_mini_quice_con']
                    var minc2 = item['transtur_mini_veintecuatro_con']
                    var omn1 = item['transtur_omnibus_treintacuatro_con']
                    var omn2 = item['transtur_omnibus_cuarentacuatro_con']

                    if (parseInt(cod) == 2 && parseInt(gu) == 0) {

                        //alert(parseInt(item['taxi_standar_hdos_sin']) * parseInt(adultos));
                        var precioadulto = parseInt(item['taxi_standar_dos_sin']) * parseInt(adultos);
                        $('#precio_adulto').val(precioadulto);
                    }
                    else if (parseInt(cod) == 2 && parseInt(gu) == 1) {

                        //alert(parseInt(item['taxi_standar_hdos_con']) * parseInt(adultos));
                        var precioadulto = parseInt(item['taxi_standar_dos_con']) * parseInt(adultos);
                        $('#precio_adulto').val(precioadulto);
                    }
                    else if (parseInt(cod) == 4 && parseInt(gu) == 0) {

                        //alert(parseInt(item['taxi_micro_hcuatro_sin']) * parseInt(adultos));
                        var precioadulto = parseInt(item['taxi_micro_cuatro_sin']) * parseInt(adultos);
                        $('#precio_adulto').val(precioadulto);
                    }
                    else if (parseInt(cod) == 4 && parseInt(gu) == 1) {

                        //alert(parseInt(item['taxi_micro_hcuatro_con']) * parseInt(adultos));
                        var precioadulto = parseInt(item['transtur_micro_diez_con']) * parseInt(adultos);
                        $('#precio_adulto').val(precioadulto);
                    }
                    else if (parseInt(cod) == 8 && parseInt(gu) == 0) {

                        //alert(parseInt(item['transtur_micro_hocho_sin']) * parseInt(adultos));
                        var precioadulto = parseInt(item['transtur_mini_quice_con']) * parseInt(adultos);
                        $('#precio_adulto').val(precioadulto);
                    }
                    else if (parseInt(cod) == 8 && parseInt(gu) == 1) {

                        //alert(parseInt(item['transtur_micro_hocho_con']) * parseInt(adultos));
                        var precioadulto = parseInt(item['transtur_mini_veintecuatro_con']) * parseInt(adultos);
                        $('#precio_adulto').val(precioadulto);
                    }
                    else if (parseInt(cod) == 12 && parseInt(gu) == 1) {

                        //alert(parseInt(item['transtur_micro_hocho_sin']) * parseInt(adultos));
                        var precioadulto = parseInt(item['transtur_omnibus_treintacuatro_con']) * parseInt(adultos);
                        $('#precio_adulto').val(precioadulto);
                    }
                    else if (parseInt(cod) == 20 && parseInt(gu) == 1) {

                        //alert(parseInt(item['transtur_micro_hocho_con']) * parseInt(adultos));
                        var precioadulto = parseInt(item['transtur_mini_hveinte_con']) * parseInt(adultos);
                        $('#precio_adulto').val(precioadulto);
                    }
                    else if (parseInt(cod) == 30 && parseInt(gu) == 1) {

                        //alert(parseInt(item['transtur_micro_hocho_con']) * parseInt(adultos));
                        var precioadulto = parseInt(item['transtur_omnibus_htreinta_con']) * parseInt(adultos);
                        $('#precio_adulto').val(precioadulto);
                    }
                    else if (parseInt(cod) == 43 && parseInt(gu) == 1) {

                        //alert(parseInt(item['transtur_omnibus_hcuarentatres_con']) * parseInt(adultos));
                        var precioadulto = parseInt(item['transtur_omnibus_cuarentacuatro_con']) * parseInt(adultos);
                        $('#precio_adulto').val(precioadulto);
                    }

                }


            });


            if (parseInt(adultos) == cod) {

                $('#cantidad_ninnos0a2').val('').trigger('change');
                $('#cantidad_ninnos2a12').val('').trigger('change');
                $('#cantidad_ninnos0a2').prop("disabled", true);
                $('#cantidad_ninnos2a12').prop("disabled", true);
            } else {
                $('#cantidad_ninnos0a2').prop("disabled", false);
                $('#cantidad_ninnos2a12').prop("disabled", false);
            }


        });

        $('#cantidad_ninnos0a2').on('change', function () {
            var ninnos = $(this).val();
            var cod = document.getElementById("tipo_vehiculo").value;
            var ad = document.getElementById("cantidad_adultos").value;
            var nii = document.getElementById("cantidad_ninnos2a12").value;
            var sum3 = parseInt(ad) + parseInt(ninnos);
            var sum4 = parseInt(ad) + parseInt(ninnos) + parseInt(nii);
            if (nii == '' && sum3 > cod) {
                alert("Debe seleccionar un valor menor para la cantidad de ninnos");
                $('#cantidad_ninnos0a2').val('').trigger('change');
                //$('#cantidad_ninnos2a12').prop("disabled", true);
            } else if (sum3 == cod && ni == '') {
                $('#cantidad_ninnos2a12').prop("disabled", true);
            } else if (sum4 > cod) {
                alert("Debe seleccionar un valor menor para la cantidad de ninnos");
                $('#cantidad_ninnos0a2').val('').trigger('change');
                //$('#cantidad_ninnos2a12').prop("disabled", true);
            } else {
                $('#cantidad_ninnos2a12').prop("disabled", false);
            }

        });

        $('#cantidad_ninnos2a12').on('change', function () {
            var ninnoss = $(this).val();
            var codd = document.getElementById("tipo_vehiculo").value;
            var ad = document.getElementById("cantidad_adultos").value;
            var ni = document.getElementById("cantidad_ninnos0a2").value;
            var sum = parseInt(ad) + parseInt(ninnoss) + parseInt(ni);
            var sum2 = parseInt(ad) + parseInt(ninnoss);
            var guu = document.getElementById("incluir_guia").value;
            var prvinciaa = document.getElementById("provincia_destino").value;

            var inicissss = [];
            @foreach ($destin_inicias as $cc )
            inicissss.push(@json($cc));
            @endforeach
            //alert(prvincia)

            $.each(inicissss, function (i, item) {
                if (item['id'] == prvinciaa) {

                    var ss = item['taxi_standar_dos_sin']
                    var sc = item['taxi_standar_dos_con']
                    var ms = item['taxi_micro_cuatro_sin']
                    var mc = item['taxi_micro_cuatro_con']
                    var mics = item['transtur_micro_diez_sin']
                    var micc = item['transtur_micro_diez_con']
                    var minc1 = item['transtur_mini_quice_con']
                    var minc2 = item['transtur_mini_veintecuatro_con']
                    var omn1 = item['transtur_omnibus_treintacuatro_con']
                    var omn2 = item['transtur_omnibus_cuarentacuatro_con']

                    if (parseInt(codd) == 2 && parseInt(guu) == 0) {

                        //alert(parseInt(item['taxi_standar_hdos_sin']) * parseInt(ninnoss));
                        var precioninnos= parseInt(item['taxi_standar_dos_sin']) * parseInt(ninnoss);
                        $('#precio_ninnos').val(precioninnos)
                    }
                    else if (parseInt(codd) == 2 && parseInt(guu) == 1) {

                        //alert(parseInt(item['taxi_standar_hdos_con']) * parseInt(ninnoss));
                        var precioninnos= parseInt(item['taxi_standar_dos_con']) * parseInt(ninnoss);
                        $('#precio_ninnos').val(precioninnos)
                    }
                    else if (parseInt(codd) == 4 && parseInt(guu) == 0) {

                        //alert(parseInt(item['taxi_micro_hcuatro_sin']) * parseInt(ninnoss));
                        var precioninnos= parseInt(item['taxi_micro_cuatro_sin']) * parseInt(ninnoss);
                        $('#precio_ninnos').val(precioninnos)
                    }
                    else if (parseInt(codd) == 4 && parseInt(guu) == 1) {

                        //alert(parseInt(item['taxi_micro_hcuatro_con']) * parseInt(ninnoss));
                        var precioninnos= parseInt(item['taxi_micro_cuatro_con']) * parseInt(ninnoss);
                        $('#precio_ninnos').val(precioninnos)
                    }
                    else if (parseInt(codd) == 8 && parseInt(guu) == 0) {

                        //alert(parseInt(item['transtur_micro_hocho_sin']) * parseInt(ninnoss));
                        var precioninnos= parseInt(item['transtur_micro_diez_sin']) * parseInt(ninnoss);
                        $('#precio_ninnos').val(precioninnos)
                    }
                    else if (parseInt(codd) == 8 && parseInt(guu) == 1) {

                        //alert(parseInt(item['transtur_micro_hocho_con']) * parseInt(ninnoss));
                        var precioninnos= parseInt(item['transtur_micro_diez_con']) * parseInt(ninnoss);
                        $('#precio_ninnos').val(precioninnos)
                    }
                    else if (parseInt(codd) == 12 && parseInt(guu) == 1) {

                        //alert(parseInt(item['transtur_micro_hocho_sin']) * parseInt(ninnoss));
                        var precioninnos= parseInt(item['transtur_mini_quice_con']) * parseInt(ninnoss);
                        $('#precio_ninnos').val(precioninnos)
                    }
                    else if (parseInt(codd) == 20 && parseInt(guu) == 1) {

                        //alert(parseInt(item['transtur_micro_hocho_con']) * parseInt(ninnoss));
                        var precioninnos= parseInt(item['transtur_mini_veintecuatro_con']) * parseInt(ninnoss);
                        $('#precio_ninnos').val(precioninnos)
                    }
                    else if (parseInt(codd) == 30 && parseInt(guu) == 1) {

                        //alert(parseInt(item['transtur_micro_hocho_con']) * parseInt(ninnoss));
                        var precioninnos= parseInt(item['transtur_omnibus_treintacuatro_con']) * parseInt(ninnoss);
                        $('#precio_ninnos').val(precioninnos)
                    }
                    else if (parseInt(codd) == 43 && parseInt(guu) == 1) {

                        //alert(parseInt(item['transtur_omnibus_hcuarentatres_con']) * parseInt(ninnoss));
                        var precioninnos= parseInt(item['transtur_omnibus_cuarentacuatro_con']) * parseInt(ninnoss);
                        $('#precio_ninnos').val(precioninnos)


                    }
                    $('#precio_f').val(parseInt(document.getElementById("precio_adulto").value) + parseInt(document.getElementById("precio_ninnos").value))
                    var f = parseInt(document.getElementById("precio_adulto").value) + parseInt(document.getElementById("precio_ninnos").value);
                    $('#botonp').text('Total a pagar: ' + f + ' USD');



                }


            });


            if (ni == '' && sum2 > codd) {
                alert("Debe seleccionar un valor menor para la cantidad de ninnos");
                $('#cantidad_ninnos2a12').val('').trigger('change');
                //$('#cantidad_ninnos2a12').prop("disabled", true);
            } else if (sum2 == codd && ni == '') {
                $('#cantidad_ninnos0a2').prop("disabled", true);
            } else if (sum > codd) {
                alert("Debe seleccionar un valor menor para la cantidad de ninnos");
                $('#cantidad_ninnos2a12').val('').trigger('change');

            } else {
                $('#cantidad_ninnos0a2').prop("disabled", false);
            }


        });





    </script>

@endsection