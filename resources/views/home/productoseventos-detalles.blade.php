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
    <div class="row col-md-12" align="center">
        <img src="{{asset('assets/img/productos,circuitos.png')}}">
    </div>
    @include('layouts.fronts.botonesproductos')

    <div class="card" style="margin-top: 30px; margin-left: 20px;padding: 20px;">
        <br style="padding: 20px;">
        <div class="col-md-4"style="margin-bottom: 20px;">
            <div style="text-transform: uppercase;"><b>{{ $data['nombre_es'] }}</b></div>

        </div>
        <div class="col-md-12" style="margin-bottom: 40px;">
            <img src="{{ asset('evento/imagen/'.$evento->imagen) }}" style=" width: 300px; height: 200px;">

        </div>
        <div class="col-md-12 " style="margin-bottom: 20px;"><p class="card-text"><i class="far fa-calendar-alt" style="color: #868686"></i> Fecha de
                inicio: {{ $evento->fecha_inicio }}</p></div>
        <div class="col-md-12"style="margin-bottom: 20px;"><p class="card-text"><i class="far fa-calendar-alt" style="color: #868686"></i> Fecha de
                fin: {{ $evento->fecha_fin }}</p></div>
        <div class="col-md-12"style="margin-bottom: 20px;"><p class="card-text"><i class="nav-icon fas fa-map-marker-alt"
                                                       style="color: #868686"></i> {{ $evento->lugar->nombre }}</p>
        </div>
        <div class="col-md-12"style="margin-bottom: 20px;">
            <p>{{ $data['descripcion_es'] }}</p>
        </div>
        <div class=" row col-md-12"style="margin-bottom: 20px;">
            <div class="col-md-2">
                <a href="{{ asset('evento/convocatoria/'.$evento->convocatoria) }}" style="color: #000000;" download="download/{{$evento->convocatoria}}"><i class="nav-icon fas fa-download"
                   style="color: #000000"></i> <b>Convocatoria</b></a>
            </div>
            <div class="col-md-2">
                <a href="{{ asset('evento/programa/'.$evento->programa) }}" style="color: #000000;"download="download/{{$evento->programa}}"><i class="nav-icon fas fa-download"
                   style="color: #000000"></i> <b>Programa del evento</b></a>
            </div>
        </div>
    </div>
    </div>

    <div class="card" style="margin-bottom: 60px; margin-left: 20px;">
        <div class="col-md-12" style="margin-bottom: 60px;">
            <div class="row mb-2" id="bloques1">
                <div class="col-md-12">
                    <h4>Introduzca la información requerida para realizar su reserva</h4>
                    <form>
                        <div class="row" style="margin-bottom: 50px;">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Hoteles:</label>
                                    <select class="form-control select2bs4" style="width: 100%;" id="hotel_id"
                                            name="hotel_id">
                                        <option value="">--Seleccione Hotel--</option>
                                        @foreach ($hoteles as $key => $c)
                                            <option value="{{ $c->id }}">{{ $c->nombre }}</option>

                                        @endforeach
                                    </select>

                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin-bottom: 10px;">
                            <div class="col-md-12">
                                <img src="{{asset('assets/img/RESERVAR HABITACIONES.png')}}">
                                <a id="mostrarhabitaciones" type="button" class="btn btn-light botones"
                                   onClick="mostrarformhabitaciones(1)"
                                   style="background: #fff;color: #2A4660;border-color: #2A4660;margin-left: 39%">Adicionar</a>
                                <a type="button" class="btn botones"
                                   style="background: #DA2513;color: #fff;">Modificar</a>
                                <a type="button" class="btn botones"
                                   style="background: #DA2513;color: #fff;">Eliminar</a>
                            </div>
                        </div>
                    </form>
                    <table class="table table-bordered table-hover">
                        <thead style="text-align: center">
                        <tr>
                            <th>Tipo de Habitación</th>
                            <th>Adultos</th>
                            <th>Precio</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td></td>
                        </tr>
                        </tbody>
                    </table>
                    <div>
                        <p>
                           <b> Transporte:</b>
                        </p>
                    </div>
                    @if($evento->servicio_transporte =='Activo')

                        <div style="margin-top: -50px;"> @include('home.formularios.fromreservartraslados.modalcolectivo') </div>
                    @endif
                    <div class="row">
                        <div class="col-md-4">
                            <a type="button" class="btn btn-light btn-block botones"
                               style="background: #DA2513;color: #fff">Total a pagar 150.00 USD</a>

                        </div>
                        <div class="col-md-4">
                            <a href="" type="button"
                               class="btn btn-light botones"
                               style="background: #fff;color: #2A4660;border-color: #2A4660;margin-left: 135%">Cancelar</a>
                        </div>
                        <div class="col-md-4">
                            <button type="submit" class="btn botones"
                                    style="background: #DA2513;color: #fff;margin-left: 66%">Reservar
                            </button>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <form id="addform" role="form" method="post" enctype="multipart/form-data"
                              action="{{ route('home.guardar-eventos-datosclientes',$evento->id)}}">
                            @csrf
                            <div class="p-0 pt-1 col-md-4 offset-md-4">
                                <ul class="nav" id="custom-tabs-one-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="custom-content-below-habitaciones-tab"
                                           data-toggle="pill"
                                           href="#custom-content-below-habitaciones" role="tab"
                                           aria-controls="custom-content-below-habitaciones"
                                           aria-selected="true">
                                            <div class="col-md-3">
                                                <img id="hab_pasivo" class="hide-tab"
                                                     src="{{asset('assets/img/habitaciones-productos-servicios-pasivo.png')}}"
                                                     onClick="cambiar_tab(1)" style="position: absolute;z-index: 1;">
                                                <img id="hab_activo" class="show-tab"
                                                     src="{{asset('assets/img/habitaciones en productos y servicios activo.png')}}"
                                                     style="position: absolute;z-index: 1;">
                                            </div>
                                        </a>
                                    </li>
                                    <li class="nav-item col-md-4 offset-md-4">
                                        <a class="nav-link" id="custom-content-below-datos-tab" data-toggle="pill"
                                           href="#custom-content-below-datos" role="tab"
                                           aria-controls="custom-content-below-datos"
                                           aria-selected="false">
                                            <div class="col-md-3">
                                                <img id="datos_pasivo" class="show-tab"
                                                     src="{{asset('assets/img/Datos en productos y servicios pasivo.png')}}"
                                                     onClick="cambiar_tab(0)">
                                                <img id="datos_activo" class="hide-tab"
                                                     src="{{asset('assets/img/Datos-en-productos-y-servicios-activo.png')}}">
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-content" id="custom-content-below-tabContent">
                                <div class="tab-pane fade show active" id="custom-content-below-habitaciones"
                                     role="tabpanel" aria-labelledby="custom-content-below-habitaciones-tab"
                                     style="margin-top: 30px">
                                    <div class="row col-md-12">
                                        @if($addReserva =="Si")
                                            @include('home.formularios.reservarhabitacioneseventos.add')
                                        @else
                                            @include('home.formularios.reservarhabitacioneseventos.edit')
                                        @endif
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="custom-content-below-datos" role="tabpanel"
                                     aria-labelledby="custom-content-below-datos-tab" style="margin-top: 30px">
                                    <div id="datos">
                                        <div class="row col-md-12">
                                            <div class="row">
                                                <div class="col-md-4 mb-2">
                                                    <a id="mostrar_datos" type="button" class="btn btn-light botones"
                                                       style="background: #fff;color: #2A4660;border-color: #2A4660">Adicionar</a>
                                                </div>
                                                <div class="col-md-4 mb-2">
                                                    <a type="button" class="btn botones disabled" id="btn_modificar"
                                                       style="background: #DA2513;color: #fff;">Modificar</a>
                                                </div>
                                                <div class="col-md-4 mb-2">
                                                    <a type="button" id="abrir-modal" class="btn botones disabled"
                                                       style="background: #DA2513;color: #fff;">Eliminar</a>
                                                </div>
                                            </div>
                                            <table id="listado_datos" class="table table-bordered table-hover">
                                                <thead style="text-align: center">
                                                <tr>
                                                    <th hidden>No.</th>
                                                    <th>Nombre y Apellidos</th>
                                                    <th>Fecha de nacimiento</th>
                                                    <th>No. Pasaporte</th>
                                                    <th>Nacionalidad</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr id="noelementos">
                                                    <td colspan="4" align="center">No existen datos de los clientes a
                                                        mostrar
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                            <div class="row col-md-12">
                                                <div class="col-md-8 mb-2">
                                                    <a class="btn btn-light botonestotalpago"
                                                       style="background: #DA2513;color: #fff;">Total a pagar 150.00
                                                        USD</a>
                                                </div>
                                                <div class="col-md-2 mb-2">
                                                    <a id="mostrarreservaciones" type="button"
                                                       class="btn btn-light botones"
                                                       style="background: #fff;color: #2A4660;border-color: #2A4660">Cancelar</a>
                                                </div>
                                                <div class="col-md-2 mb-2">
                                                    <a type="submit" id="btn_guardar" class="btn botones"
                                                       style="background: #DA2513;color: #fff;">Aceptar</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="adicionar_datos">
                                        <div class="row" id="bloques1">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Nombre y Apellidos:
                                                                <small class="required" style="color: red"> *</small>
                                                            </label>
                                                            <input type="text" required class="form-control" id="nombre"
                                                                   name="nombre"
                                                                   placeholder="Nombre y Apellidos">
                                                            <span class="invalid-feedback" id="error_nombre"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 mb-4">
                                                        <div class="form-group">
                                                            <label>Nacionalidad:
                                                                <small class="required" style="color: red"> *</small>
                                                            </label>
                                                            <select class="form-control select2bs4" required
                                                                    id="nacionalidad_id"
                                                                    name="nacionalidad_id">
                                                                <option value="">--Seleccione--</option>
                                                                <script>
                                                                    let countries = [];
                                                                    let i = '';
                                                                </script>
                                                                @foreach($nacionalidades as $nacionalidad)
                                                                    <script type="text/javascript">
                                                                        i = @json($nacionalidad->id );
                                                                        countries[i] = @json($nacionalidad->nacionalidad );
                                                                    </script>
                                                                    <option value="{{$nacionalidad->id}}">{{$nacionalidad->nacionalidad}}</option>
                                                                @endforeach
                                                            </select>
                                                            <span class="invalid-feedback"
                                                                  id="error_nacionalidad_id"></span>

                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 mb-4">
                                                        <div class="form-group">
                                                            <label>No.Pasaporte:
                                                                <small class="required" style="color: red"> *</small>
                                                            </label>
                                                            <input type="text" required class="form-control "
                                                                   id="numero_pasaporte"
                                                                   name="numero_pasaporte"
                                                                   placeholder="No.Pasaporte">
                                                            <span class="invalid-feedback"
                                                                  id="error_numero_pasaporte"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 mb-4">
                                                        <div class="form-group">
                                                            <label>Fecha de Nacimiento:
                                                                <small class="required" style="color: red"> *</small>
                                                            </label>
                                                            <input type="date" required class="form-control"
                                                                   id="fecha_nacimiento"
                                                                   name="fecha_nacimiento">
                                                            <span class="invalid-feedback"
                                                                  id="error_fecha_nacimiento"></span>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row col-md-12">
                                                    <div class="col-md-6 mb-2">
                                                        <a id="cancelar_datos" type="button"
                                                           class="btn btn-light botones"
                                                           style="background: #fff;color: #2A4660;border-color: #2A4660">Cancelar</a>
                                                    </div>
                                                    <div class="col-md-6 mb-2">
                                                        <button type="button" id="add_datos" class="btn botones"
                                                                style="background: #DA2513;color: #fff;">Adicionar
                                                        </button>
                                                    </div>
                                                    <div class="col-md-6 mb-2">
                                                        <button type="button" id="modif_datos" class="btn botones"
                                                                style="background: #DA2513;color: #fff; ">Modificar
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
@endsection
<style>
    .selected {
        cursor: pointer;
    }

    .seleccionada {
        color: #212529;
        background-color: rgba(0, 0, 0, 0.075);
    }

    .color:required {
        border: 1px solid #DA2513;
    }

    .hide-tab {
        display: none;
    }
</style>
@section('jscript')
    <script type="text/javascript">
        //$("#listado_reserva").hide();
        $("#addform").hide();
        $('#mostrarreservaciones').on('click', function () {
            $("#addform").hide();
            limpiarCamposDatos();
            $("#listado_reserva").show();

        })

        function mostrarformhabitaciones(p) {
            if (p) {
                $("#addform").show();
                $("#listado_reserva").hide();
            } else {
                $("#listado_reserva").show();
            }
        }

        function cambiar_tab(a) {

            if (a) {
                $('#hab_pasivo').addClass('hide-tab');
                $('#hab_activo').removeClass('hide-tab');
                $('#datos_pasivo').removeClass('hide-tab');
                $('#datos_activo').addClass('hide-tab');
            } else {
                $('#hab_pasivo').removeClass('hide-tab');
                $('#hab_activo').addClass('hide-tab');
                $('#datos_pasivo').addClass('hide-tab');
                $('#datos_activo').removeClass('hide-tab');
            }
        }

        function limpiarCamposDatos() {
            $("#nombre").val('');
            $("#fecha_salida").val('');
            $("#fecha_arribo").val('');
            $("#nacionalidad_id").val('').trigger('change');
            $("#vuelo_arribo").val('');
            $("#novuelo_salida").val('');
        }

        function limpiarCamposHabitacion() {
            $('#addform')[0].reset();
            $("#tipo_habitacion").val('').trigger('change');
            $("#cantidad_adultos").val('').trigger('change');
            $("#cantidad_noche").val('').trigger('change');
            //$("#cantidad_noches").val('').trigger('change');
            //$("#cantidad_ninnos0a2").val('').trigger('change');
            $("#fecha_entrada").val('').trigger('change');
        }

        //Ocultar formularios
        $("#adicionar_datos").hide();
        $('#mostrar_datos').on('click', function () {

            $("#adicionar_datos").show();
            $("#datos").hide();
            $('#add_datos').attr('class', '');
            $('#add_datos').addClass('btn botones');
            $('#modif_datos').attr('class', '');
            $('#modif_datos').addClass('hide-tab');

        });
        $('#cancelar_datos').on('click', function () {
            $("#adicionar_datos").hide();
            limpiarCamposDatos();
            $("#datos").show();

        })
        $('#btn_guardar').on('click', function (event) {
            event.preventDefault();
            var form = $(this).parents('form');
            var url = form.attr('action');
            var dataformulario = new FormData($('form').get(0));
            var tabledata = getTableData();
            var auxarray = [];
            $.each(tabledata, function (i, item) {
                dataformulario.append('table[' + i + ']', JSON.stringify(item));
                // console.log(item.nacionalidad)
            });
            console.log(dataformulario);
            var valid = validateAll();
            if (valid['status']) {
                $.ajax({
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    url: url,
                    method: "POST",
                    data: dataformulario,
                    contentType: false,
                    cache: false,
                    processData: false,
                    dataType: "json",
                    success: function (data) {
                        if (data.success) {
                            console.log(data);
                            limpiarCamposHabitacion();
                        }
                    },
                    error: function (data) {
                        if (data.responseJSON) {
                            swal.fire({
                                toast: true,
                                class: 'bg-danger',
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 4000,
                                type: 'error',
                                title: 'Hay campos incorrectos en la pestaña de habitaciones',
                            });
                            console.log(data.responseJSON.errors);
                            $.each(data.responseJSON.errors, function (key, value) {
                                showErrors(key, value);

                            });
                        }
                    }
                });
            }
            else {
                swal.fire({
                    toast: true,
                    class: 'bg-danger',
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 4000,
                    type: 'error',
                    title: valid['message'],
                });
            }

        });

        //Obtener los Datos de la tabla de Datos de los Clientes
        function getTableData() {
            var array = [];
            var header = [];
            $('#listado_datos th').each(function (index, item) {
                header[index] = $(item).html();
            })

            $('#listado_datos tr').has('td').each(function () {
                var arrayItem = {};
                $('td', $(this)).each(function (index, item) {
                    arrayItem[header[index]] = $(item).html();
                    arrayItem['nacionalidad'] = item.id;
                });

                array.push(arrayItem);
            });
            return array;
        }

        function showErrors(key, value) {
            // console.log(key+":"+value)
            $('#' + key).addClass('is-invalid');
            $('#error_' + key).html('');
            $('#error_' + key).append(value);
        }

        $('#btn_modificar').on('click', function () {

            $('#add_datos').attr('class', '');
            $('#add_datos').addClass('hide-tab');
            $('#modif_datos').attr('class', '');
            $('#modif_datos').addClass('btn botones');

            let nac = "";
            var array = getTableData();
            var data = array[parseInt(idFila_selected[0].substr(4))];
            nac = data['nacionalidad'];
            console.log(nac);

            $('#nombre').val(data['Nombre y Apellidos']);
            $('#nacionalidad_id').select2('val', $('#nacionalidad_id option:eq(' + nac + ')').val());
            //$('#numero_pasaporte').val(data['No. Pasaporte']);
            //$('#fecha_nacimiento').val(data['Fecha de nacimiento']);


            $("#adicionar_datos").show()
            $("#datos").hide();
        });

        $('#modif_datos').on('click', function () {

            eliminarDatos(idFila_selected);
            modificarDatos(parseInt((idFila_selected[0].substr(4))));
            reordenar();
            $("#adicionar_datos").hide()
            $("#datos").show();
            idFila_selected = [];
            $('#abrir-modal').addClass('disabled');
            $('#btn_modificar').addClass('disabled');

            swal.fire({
                toast: true,
                class: 'bg-success',
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                type: 'success',
                title: 'El contenido de Datos del Cliente se ha modificado satisfactoriamente',
            });

        });
        $('#tipo_habitacion').on('change', function () {
            if ($('#tipo_habitacion').val() != '') {
                var loookup = {
                    'Sencilla': ['1'],
                    'Doble': ['1', '2'],
                    'Triple': ['1', '2', '3'],

                };
                $('#chek_tipohab').val('1');
                //alert($('#tipohabitacion').val());
                var selectValues = $(this).val();
                $('#cantidad_adultos').empty();
                $('#cantidad_adultos').append("<option value=''>"
                    + "--Seleccionar--" + "</option>");
                for (i = 0; i < loookup[selectValues].length; i++) {
                    $('#cantidad_adultos').append("<option value='" + loookup[selectValues][i] + "'>"
                        + loookup[selectValues][i] + "</option>");
                }
                $('#cantidad_adultos').prop("disabled", false);
            }
            else {
                $('#chek_tipohab').val('0');
                $('#cantidad_adultos').empty();
                $('#cantidad_adultos').append("<option value=''>"
                    + "--Seleccionar--" + "</option>");
                $('#cantidad_adultos').prop("disabled", true);
            }
        });

        var cont = 0;
        var idFila_selected = [];

        //Metodo auxiliar para Agregar datos a la tabla dinamicamente
        function agregarDatos() {
            cont++;
            var value = $('#nacionalidad_id').val();
            var nombre = $('#nombre').val();
            var nacionalidad = $('#nacionalidad_id').find('option[value=' + value + ']').val();
            var pasaporte = $('#numero_pasaporte').val();
            var fecha_nacimiento = $('#fecha_nacimiento').val();
            var fila = '<tr class="selected" id="fila' + cont + '" onclick="seleccionar(this.id); ">' +
                '<td hidden >' + cont + '</td><td>' + nombre + '</td><td>' + fecha_nacimiento + '</td><td>' + pasaporte + '</td><td id="' + nacionalidad + '" >' + countries[nacionalidad] + '</td></tr>';
            $('#listado_datos').append(fila);
            reordenar();
        }

        function modificarDatos(val) {

            //Obtener los valores nuevos
            var value = $('#nacionalidad_id').val();
            var nombre = $('#nombre').val();
            var nacionalidad = $('#nacionalidad_id').find('option[value=' + value + ']').text();
            var pasaporte = $('#numero_pasaporte').val();
            var fecha_nacimiento = $('#fecha_nacimiento').val();

            var fila = '<tr class="selected" id="fila' + val + '" onclick="seleccionar(this.id); ">' +
                '<td hidden >' + val + '</td><td>' + nombre + '</td><td>' + fecha_nacimiento + '</td><td>' + pasaporte + '</td><td>' + nacionalidad + '</td></tr>';
            $('#listado_datos').append(fila);
        }

        //Metodo seleccionar elementos de la tabla
        function seleccionar(idFila) {
            $('#abrir-modal').removeClass('disabled');
            $('#btn_modificar').removeClass('disabled');
            if ($('#' + idFila).hasClass('seleccionada')) {
                $('#' + idFila).removeClass('seleccionada');
                idFila_selected = idFila_selected.filter(function (value, index, arr) {
                    return value != idFila
                });
            } else {
                $('#' + idFila).addClass('seleccionada');
                idFila_selected.push(idFila);
            }

            console.log(idFila_selected);
            if (idFila_selected == undefined || idFila_selected.length == 0)
                $('#abrir-modal').addClass('disabled');

            if (idFila_selected.length > 1 || idFila_selected.length == 0)
                $('#btn_modificar').addClass('disabled');

        }

        //Metodo eliminar elementos de la tabla dinamicamente
        function eliminarDatos(idFila) {
            $('#' + idFila).remove();
        }

        function reordenar() {
            var num = 0;
            $('#listado_datos tbody tr').each(function () {
                if (num > 0) {
                    $(this).attr('id', 'fila' + num);
                    $(this).find('td').eq(0).text(num);
                }
                num++;
            });
            cont = num;
        }

        function getNumRows() {
            var num = 0;
            $('#listado_datos tbody tr').each(function () {
                num++;
            });
            return num;
        }

        //Llamada del metodo agregar datos dinamicamente a la tabla
        $('#add_datos').on('click', function () {
            if (validate()) {
                agregarDatos();
                limpiarCamposDatos();
                $('#noelementos').addClass('hide-tab');
                swal.fire({
                    toast: true,
                    class: 'bg-success',
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    type: 'success',
                    title: 'El contenido de Datos del Cliente se ha adicionado satisfactoriamente',
                });
            }

        });

        //Metodo de Abrir Modal de confirmacion para eliminar datos de la tabla
        $('#abrir-modal').on('click', function () {
            if (idFila_selected == "") {
                limpiarCamposDatos();
            }
            else {
                $('#modal-delete').modal('show');
            }
        });

        function validateAll() {
            let result = [];
            result['status'] = true;
            result['message'] = 'OK';

            let rows = getNumRows();
            if (rows == 1) {
                result ['status'] = false;
                result ['message'] = 'Debe adicionar los datos relacionados a los clientes';
            }
            return result;
        }

        function validate() {
            var a = 1;
            if ($('#nombre').val() == "") {
                $('#nombre').addClass('is-invalid');
                $('#error_nombre').html('');
                $('#error_nombre').append('El campo nombre y apellidos es obligatorio');
                a = 0;
            }
            else {
                $('#nombre').removeClass('is-invalid');
                $('#error_nombre').html('');
            }
            if ($('#nacionalidad_id').val() == "") {
                $('#nacionalidad_id').addClass('is-invalid');

                $('#error_nacionalidad_id').html('');
                $('#error_nacionalidad_id').append('El campo nacionalidad es obligatorio');
                a = 0;
            }
            else {
                $('#nacionalidad_id').removeClass('is-invalid');
                $('#error_nacionalidad_id').html('');
            }
            if ($('#numero_pasaporte').val() == "") {
                $('#numero_pasaporte').addClass('is-invalid');

                $('#error_numero_pasaporte').html('');
                $('#error_numero_pasaporte').append('El campo número de pasaporte es obligatorio');
                a = 0;
            }
            else {
                $('#numero_pasaporte').removeClass('is-invalid');
                $('#error_numero_pasaporte').html('');
            }
            if ($('#fecha_nacimiento').val() == "") {
                $('#fecha_nacimiento').addClass('is-invalid');

                $('#error_fecha_nacimiento').html('');
                $('#error_fecha_nacimiento').append('El campo fecha de nacimiento es obligatorio');
                a = 0;
            }
            else {
                $('#fecha_nacimiento').removeClass('is-invalid');
                $('#error_fecha_nacimiento').html('');
            }
            if (a)
                return true;
        }

        //Llamada del metodo eliminar datos dinamicamente a la tabla
        $('#remove_datos').on('click', function () {
            $.each(idFila_selected, function (i, item) {
                eliminarDatos(item);
            });
            reordenar();
            idFila_selected = [];
            $('#abrir-modal').addClass('disabled');
            $('#btn_modificar').addClass('disabled');

            var rows = getNumRows();
            if (rows == 1) {
                $('#noelementos').removeClass('hide-tab');
            }
            $('#modal-delete').modal('hide');
            limpiarCamposDatos();
            swal.fire({
                toast: true,
                class: 'bg-success',
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                type: 'success',
                title: 'El contenido de Datos del Cliente se ha eliminado satisfactoriamente',
            });
        });
    </script>
@endsection