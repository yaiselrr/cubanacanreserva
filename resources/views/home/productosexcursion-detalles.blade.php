@extends('layouts.fronts.assest')
@section('header')
    @include('layouts.fronts.header')
@endsection
@section('navbar')
    @include('layouts.fronts.navbar')
@endsection
@section('content')
    @include('layouts.fronts.delete_datos_cliente')
    @include('layouts.fronts.delete_habitaciones')
    @include('layouts.fronts.carousel')
    {{--@include('layouts.fronts.buscarProductos')--}}
    <div class="row col-md-12" align="center">
        <img src="{{asset('assets/img/productos, excursiones.png')}}">
    </div>
    @include('layouts.fronts.botonesproductos')
    <div class="row mb-2" id="bloques1">
        <div class="col-md-12">
            <div class="row no-gutters border-0 rounded overflow-hidden flex-md-row mb-4 h-md-250 position-relative">
                <div class="col-auto d-lg-block">
                    <div class="col-md-10 ">
                        <img class="img-responsive bloquethumb" src="{{asset('/storage/'.$excursion->imagen)}}">
                    </div>
                    <div class="col-md-12">
                        <a type="button" class="btn btn-light btn-block botonestotalpago"
                           style="background: #DA2513;color: #fff">Precio Desde {{$excursion->paxminimo}} USD</a>
                    </div>
                </div>
                <div class="col-md-4 p-4 d-flex flex-column position-static">
                    <strong class="d-inline-block mb-2" style="color: #DA2513">{{$excursion->nombre}}</strong>
                    <div class="mb-1">
                        <i class="nav-icon detalleproductos">Modalidad:</i> @foreach($modalidades as $modalidad) @if($modalidad->modalidads_id ==$excursion->modalidads_id) {{$modalidad->modalidad}} @endif @endforeach
                    </div>
                    <div class="mb-1">
                        <i class="nav-icon detalleproductos">Duración:</i> {{$duracion->duracion}} hora(s)
                    </div>
                    <div class="mb-1">
                        <i class="nav-icon detalleproductos">Territorio Origen:</i> {{$territorioorigen->provincia}}
                    </div>
                    <div class="mb-1">
                        <i class="nav-icon detalleproductos">Territorio Destino: </i>{{$territoriodestino->provincia}}
                    </div>
                    <div class="mb-1">
                        <i class="nav-icon detalleproductos">Frecuencia:</i> @foreach($frecuencias as $frecuencia) @if($frecuencia->frecuencias_id ==$excursion->frecuencia_id) {{$frecuencia->frecuencia}} @endif @endforeach
                    </div>
                    <div class="mb-1">
                        <i class="nav-icon detalleproductos">Idioma: </i>{{$resulidiomas}}
                    </div>
                    <div class="mb-1">
                        <i class="nav-icon detalleproductos">Mínimo de Pax:</i> {{$excursion->paxminimo}}
                    </div>
                </div>
                <div class="col-md-5 p-4 d-flex flex-column position-static" style="height: 200px">
                    <i class="nav-icon detalleproductos">Descripción: </i>
                    <p> {!! nl2br(html_entity_decode( $data['descripcion'])) !!}</p>

                </div>
            </div>
            <hr>
            <form id="addform" role="form" method="post" enctype="multipart/form-data"
                  action="{{ route('home.reserva-excursion',$excursion->id)}}">
                @csrf
                <div class="col-md-12 mb-4">
                    <div name="ofertas_disponibles" id="ofertas_disponibles">
                    </div>
                </div>
                <div class="row mb-2" id="bloques1">
                    <strong style="color: #2A4660">Introdusca los datos personales del titular de la reserva:</strong>
                </div>
                <div class="row mb-2" id="bloques1">
                    <div class="col-md-12">
                        <div class="row" style="margin-bottom: 50px;">
                            <div class="col-md-4 mb-4">
                                <div class="form-group @error('nombre') has-error @enderror">
                                    <label>Nombre y Apellidos:
                                        <small class="required" style="color: red"> *</small>
                                    </label>
                                    <input type="text" class="form-control "
                                           name="nombre" id="nombre" placeholder="Nombre y Apellidos">
                                    <span class=" invalid-feedback" id="error_nombre"></span>
                                </div>
                            </div>
                            <div class="col-md-4 mb-4">
                                <div class="form-group @error('telefono') has-error @enderror">
                                    <label>Teléfono:
                                        <small class="required" style="color: red"> *</small>
                                    </label>
                                    <input type="text" class="form-control @error('telefono') is-invalid @enderror"
                                           name="telefono" id="telefono" placeholder="Teléfono">
                                    <span class=" invalid-feedback" id="error_telefono"></span>

                                </div>
                            </div>
                            <div class="col-md-4 mb-4">
                                <div class="form-group @error('email') has-error @enderror">
                                    <label>Email:
                                        <small class="required" style="color: red"> *</small>
                                    </label>
                                    <input type="text" class="form-control @error('email') is-invalid @enderror  "
                                           name="email" id='email' placeholder="Email">
                                    <span class=" invalid-feedback" id="error_email"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-2" id="bloques1" style="margin-top: -25px">
                    <strong style="color: #2A4660">Introdusca la información requerida para realizar su
                        reserva:</strong>
                </div>
                <div class="row  mb-2" id="bloques1">
                    <div class="col-md-12">
                        <div class="row" style="margin-bottom: 10px;">
                            <div class="col-md-4 mb-4">
                                <div class="form-group @error('fecha_entrada') has-error @enderror">
                                    <label>Fecha de Entrada:
                                        <small class="required" style="color: red"> *</small>
                                    </label>
                                    <input type="hidden" value="{{$dias_antelacion->dias}}" name="dias_antelacion"
                                           id="dias_antelacion">
                                    <input type="date" class="form-control @error('fecha_entrada') is-invalid @enderror"
                                           name="fecha_entrada" id="fecha_entrada" min="{{  date('Y-m-d')}}">
                                    <span class=" invalid-feedback" id="error_fecha_entrada"></span>

                                </div>
                            </div>
                            <div class="col-md-4 mb-4">
                                <div class="form-group @error('idioma_id') has-error @enderror">
                                    <label>Idioma:
                                        <small class="required" style="color: red"> *</small>
                                    </label>
                                    <select class="form-control select2bs4 @error('idioma_id') is-invalid @enderror"
                                            name="idioma_id" id="idioma_id">
                                        <option selected value="">--Seleccionar--</option>
                                        @foreach($idiomasexcursion as $idioma)
                                            <option value="{{$idioma->id}}">{{$idioma->idioma}}</option>
                                        @endforeach
                                    </select>
                                    <span class=" invalid-feedback" id="error_idioma_id"></span>
                                </div>
                            </div>
                            @php
                                $hay_recogida = false;
                            @endphp


                            @foreach ($hotelesrecogidas as $p )

                                @if($p->excursion_id == $excursion->id)
                                    @php
                                        $hay_recogida = true;
                                    @endphp
                                @endif
                            @endforeach
                            @if($hay_recogida)
                                @include('home._partials_excursion.hotel_recogida')
                            @endif

                            @if ($excursion->excursion_alimentacion)
                                @include("home._partials_excursion.almuerzo")
                                @include("home._partials_excursion.cant_adultos")
                                @include("home._partials_excursion.cant_ninnos")

                            @endif

                            @if ($excursion->excursion_unica)
                                @include("home._partials_excursion.cant_adultos")
                                @include("home._partials_excursion.cant_ninnos")
                            @endif

                            @if ($excursion->excursion_auto_clasico)
                                @include("home._partials_excursion.cant_adultos")
                                @include("home._partials_excursion.salida_auto")
                            @endif

                            @if ($excursion->excursion_pinar_vinnales)
                                @include("home._partials_excursion.lugar_salida")
                                @include("home._partials_excursion.cant_adultos")
                                @include("home._partials_excursion.cant_ninnos")
                            @endif
                            @if ($excursion->excursion_cicloturismo)
                                @include("home._partials_excursion.ciclo_turismo")
                                @include("home._partials_excursion.cant_adultos")
                            @endif
                            @if ($excursion->excursion_delfines)
                                @include("home._partials_excursion.delfines")
                                @include("home._partials_excursion.cant_adultos")
                                @include("home._partials_excursion.cant_ninnos")
                            @endif
                            @if ($excursion->excursion_habitacion)
                                @include("home._partials_excursion.listado_habitaciones")
                                @include("home._partials_excursion.tab_datos_habitaciones")
                            @endif

                            <input type="hidden" id="precio_pax_auto"
                                   value="{{$excursion->precio_pax_auto}}">

                            <script>
                                var hotelesrecojida = [];
                                var cant_reservas = @json($cant_reservas);
                                let excursion = @json($excursion);
                                let dias_antelacion = @json($dias_antelacion);
                                @foreach ($hotelesrecogidas as $p )
                                @if($p->excursion_id==$excursion->id)
                                hotelesrecojida.push(@json($p));
                                @endif
                                @endforeach
                            </script>
                        </div>
                    </div>
                    <div class="row col-md-12">{{--
                            <input type="hidden" id="total_inicial_pagar" value="{{$totalapagar}}">--}}
                        <input type="hidden" id="precio_total" name="precio_total" value="0">
                        <a class="btn btn-light botonestotalpago  mb-2" id="total_pago"
                           style="background: #DA2513;color: #fff;">Total a pagar 0
                            USD</a>
                        <ul class="list-inline   ml-auto">
                            <li class="list-inline-item mb-2">
                                <a type="button" href="" id="btn_cancelar_detalle_excursion"
                                   class="btn btn-light botones"
                                   style="background: #fff;color: #2A4660;border-color: #2A4660;">Cancelar</a>
                            </li>
                            <li class="list-inline-item mb-2">
                                <a type="submit" class="btn botones" value="Add" id="btn_reservar_excursion"
                                   style="background: #DA2513;color: #fff">Reservar
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </form>
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

        let personas = [];
        let habitaciones = [];

        var cont = 0;
        var contHab = 0;

        var idFila_selected = [];
        var idFilaHab_selected = [];

        $(document).ready(
            mostrarOfertasDisponibles(),
            listarTablaHabitaciones(),
            desabilitarCampos(),
        );

        $('#hotel_recogida_id').on('change', function () {
            var hotel_recogida_id = document.getElementById('hotel_recogida_id');
            let hora_salida_hotel = '';
            $.each(hotelesrecojida, function (i, item) {
                if (item['id'] == hotel_recogida_id.value) {
                    hora_salida_hotel = item['hora'];
                }
            });
            if (hotel_recogida_id.value != '') {
                $('#hora_salida_hotel_recogida').val(hora_salida_hotel);
            }
            else {
                $('#hora_salida_hotel_recogida').prop('disabled', false);
                $('#hora_salida_hotel_recogida').val('');
                $('#hora_salida_hotel_recogida').prop('disabled', true);
            }


        })

        if (hotelesrecojida.length > 0) {
            $('#hotel_recogida_id').prop("disabled", false);
            $('#recog_check').val('1');
        }
        else {
            $('#hotel_recogida_id').prop("disabled", true);
        }

        if (excursion.excursion_auto_clasico) {
            $('#hora_salida_auto').val(excursion.hora_salida_auto);
            $('#cantidad_ninnos_check').val('1');
        }

        if (excursion.excursion_habitacion) {
            $('#ocultar_otros_campos').hide();
            $('#ocultar_habitacion_datos').hide();
            $('#ocultar_listado_habitaciones').show();
            $('#habitacion_check').val('1');

            //Ocultar Formulario Adicion de Datos de los Clientes
            $("#formulario_add_datos").hide();
        }
        else {
            $('#ocultar_habitacion_datos').hide();
            $('#ocultar_listado_habitaciones').hide();
            $("#formulario_add_datos").hide();
        }

        if (excursion.excursion_alimentacion) {
            $('#almuerzo').prop("disabled", false);
            $('#almuerzo_check').val('1');
        }
        else {
            $('#almuerzo').prop("disabled", true);
        }

        if (excursion.excursion_pinar_vinnales) {
            $('#lugar_salida').prop("disabled", false);
            $('#lugar_salida_check').val('1');
        }
        else {
            $('#lugar_salida').prop("disabled", true);
        }

        if (excursion.excursion_cicloturismo) {
            $('#tipo_cicloturismo').prop("disabled", false);
            $('#tipo_cicloturismo_check').val('1');
            $('#cantidad_ninnos_check').val('1')
        }
        else {
            $('#tipo_cicloturismo').prop("disabled", true);
        }

        if (excursion.excursion_delfines) {
            $('#tipo_excursion_delfines').prop("disabled", false);
            $('#tipo_excursion_delfines_check').val('1');
        }
        else {
            $('#tipo_excursion_delfines').prop("disabled", true);
        }

        //Calculo de pago por cantidad de adultos
        $('#cantidad_adultos').on('input', function () {
            totalPago(excursion);
        });

        //Calculo de pago por cantidad de ninos de 2 a 12
        $('#cantidad_ninnos2a12').on('input', function () {
            totalPago(excursion);
        });

        //Calculo de pago por cantidad de adultos con habitacion
        $('#cantidad_adultos_excursion').on('change', function () {
            totalPago(excursion);
        });

        //Calculo de pago por cantidad de ninos de 2 a 12 con habitacion
        $('#cantidad_ninnos2a12_excursion').on('input', function () {
            totalPago(excursion);
        });

        //Evento para la validacion de las ofertas de reservacion en dependencia de la fecha de entrada
        $('#fecha_entrada').on('input', function () {
            var fecha = $('#fecha_entrada').val();
            if (excursion.fecha_inicio <= fecha && excursion.fecha_fin >= fecha) {
                validarFechas(excursion);
            }
            else {
                swal.fire({
                    toast: true,
                    class: 'bg-danger',
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 4500,
                    type: 'error',
                    title: 'Para la fecha seleccionada no se puede reservar, no hay ofertas disponibles.',
                });
                $('#fecha_entrada').val('');
                $('#fecha_entrada').html('');
                $('#fecha_entrada').addClass('is-invalid');
            }
        })
        //Modificar los datos del formulario datos de la habitacion
        $('#btn_modif_habitacion_datos').on('click', function () {
            var valid = validateAll();
            var validPerson = validarCantidadPersonas();
            if (valid['status']) {
                if (validateDatosHabitacion()) {
                    if (validPerson['status']) {
                        modificarDatosHab(parseInt((idFilaHab_selected[0].substr(7))));
                        restablecerTabs();
                        limpiarCamposDatos();
                        limpiarCamposHabitacion();
                        personas = [];
                        cont = 0;
                        idFila_selected = [];
                        $('#ocultar_habitacion_datos').hide();
                        $('#ocultar_listado_habitaciones').show();
                        $("#formulario_add_datos").hide();
                        $('#btn_cancelar_detalle_excursion').show();
                        $('#btn_reservar_excursion').show();
                        $('#btn_modificar_habitacion').addClass('disabled');
                        $('#btn_abrir_modal_habitaciones').addClass('disabled');

                        swal.fire({
                            toast: true,
                            class: 'bg-success',
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000,
                            type: 'success',
                            title: 'El contenido de los Datos de los Cliente se han modificado satisfactoriamente',
                        });
                    } else {
                        swal.fire({
                            toast: true,
                            class: 'bg-danger',
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 4000,
                            type: 'error',
                            title: validPerson['message'],
                        });
                    }


                }
                else {
                    swal.fire({
                        toast: true,
                        class: 'bg-danger',
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 4000,
                        type: 'error',
                        title: 'Hay campos incorrectos en la pestaña de habitaciones',
                    });
                }
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


        //Llamada del metodo eliminar elementos de la tabla datos de los clientes dinamicamente
        $('#remove_datos_hab').on('click', function () {
            eliminarDatosHab();
            listarTablaHabitaciones();
            reordenarHab();
            idFilaHab_selected = [];

            $('#btn_abrir_modal_habitaciones').addClass('disabled');
            $('#btn_modificar_habitacion').addClass('disabled');


            $('#modal-delete-hab').modal('hide');
            limpiarCamposHabitacion();
            swal.fire({
                toast: true,
                class: 'bg-success',
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                type: 'success',
                title: 'El contenido de la Habitación y los Datos de los Clientes han sido eliminados satisfactoriamente',
            });
        });
        //Mostrar vista de Adicion de Habitacion y Datos de los Clientes
        $('#btn_vista_habitacion_datos_clientes').on('click', function () {

            $('#btn_add_habitacion_datos').attr('class', '');
            $('#btn_add_habitacion_datos').addClass('btn botones');
            $('#btn_modif_habitacion_datos').attr('class', '');
            $('#btn_modif_habitacion_datos').addClass('hide-tab');

            $('#btn_cancelar_detalle_excursion').hide();
            $('#btn_reservar_excursion').hide();

            $("#ocultar_listado_habitaciones").hide();
            $("#ocultar_habitacion_datos").show();

            personas = [];
            listarTablaDatos();
        });

        //Mostrar formulario de adicion de los datos de los clientes
        $('#btn_mostrar_formulario_datos').on('click', function () {

            $("#formulario_add_datos").show();
            $("#listado_fomulario_datos").hide();
            $('#btn_add_datos_clientes').attr('class', '');
            $('#btn_add_datos_clientes').addClass('btn botones');
            $('#btn_modif_datos_clientes').attr('class', '');
            $('#btn_modif_datos_clientes').addClass('hide-tab');

        });

        //Ocultar formulario de adicion de habitacion y datos de los clientes
        $('#btn_mostrar_vista_detalle_hotel').on('click', function () {
            $("#formulario_add_datos").hide();
            limpiarCamposDatos();
            limpiarMensajesErroresDatos();
            $("#listado_fomulario_datos").show();
            $('#btn_modificar_datos_clientes').addClass('disabled');
            $('#btn_abrir_modal').addClass('disabled');
            idFila_selected = [];
            listarTablaDatos();

        })

        //Cancelar opracion en el modal
        $('#btn_cancelar_eliminar').on('click', function () {
            $('#btn_modificar_datos_clientes').addClass('disabled');
            $('#btn_abrir_modal').addClass('disabled');
            $('#modal-delete').modal('hide');
            idFila_selected = [];
            listarTablaDatos();

        })

        //Modificar los datos del formulario datos de los clientes
        $('#btn_modif_datos_clientes').on('click', function () {
            if (validateDatosClientesModificar()) {

                modificarDatos(parseInt((idFila_selected[0].substr(4))));
                $("#formulario_add_datos").hide()
                $("#listado_fomulario_datos").show();
                $('#btn_abrir_modal').addClass('disabled');
                $('#btn_modificar_datos_clientes').addClass('disabled');

                swal.fire({
                    toast: true,
                    class: 'bg-success',
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    type: 'success',
                    title: 'El contenido de los Datos de los Clientes se han modificado satisfactoriamente',
                });
            }
        });

        //Llamada del metodo adicionar datos de los clientes dinamicamente a la tabla
        $('#btn_add_datos_clientes').on('click', function () {
            if (validateDatosClientes()) {
                agregarDatosPersona();
                limpiarCamposDatos();
                $('#noelementos_datos').addClass('hide-tab');
                swal.fire({
                    toast: true,
                    class: 'bg-success',
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    type: 'success',
                    title: 'El contenido de Datos del Cliente se han adicionado satisfactoriamente',
                });
            }

        });

        //Cargar datos en el formulario de las habitaciones y datos de los clientes
        $('#btn_modificar_habitacion').on('click', function () {

            $('#btn_add_habitacion_datos').attr('class', '');
            $('#btn_add_habitacion_datos').addClass('hide-tab');
            $('#btn_modif_habitacion_datos').attr('class', '');
            $('#btn_modif_habitacion_datos').addClass('btn botones');

            var idFila = parseInt(idFilaHab_selected[0].substr(7));
            cont = habitaciones[idFila].personas[0].length;
            if (habitaciones[idFila].tipoHabitacion != '') {
                if (habitaciones[idFila].tipoHabitacion == 'Sencilla') {
                    llenarCombos(habitaciones[idFila].tipoHabitacion, 1);
                }
                else if (habitaciones[idFila].tipoHabitacion == 'Doble') {
                    llenarCombos(habitaciones[idFila].tipoHabitacion, 2);
                }
                $("#cantidad_ninnos2a12_excursion").prop('disabled', false);
                $("#cantidad_ninnos0a2_excursion").prop('disabled', false);
                $("#cantidad_adultos_excursion").prop('disabled', false);
            }

            $('#tipo_habitacion_excursion').val(habitaciones[idFila].tipoHabitacion);
            $('#cantidad_adultos_excursion').val(parseInt(habitaciones[idFila].cantAdultos));
            $('#cantidad_ninnos2a12_excursion').val(parseInt(habitaciones[idFila].cantN212));
            $('#cantidad_ninnos0a2_excursion').val(parseInt(habitaciones[idFila].cantN02));
            $('#total_pago').html('Total a pagar ' + habitaciones[idFila].precio + ' USD');

            personas = habitaciones[idFila].personas[0];
            listarTablaDatos();

            $("#ocultar_habitacion_datos").show();
            $("#ocultar_listado_habitaciones").hide();
            $('#btn_cancelar_detalle_excursion').hide();
            $('#btn_reservar_excursion').hide();
        });

        //Llamada del metodo eliminar elementos de la tabla datos de los clientes dinamicamente
        $('#remove_datos_hab').on('click', function () {
            eliminarDatosHab();
            listarTablaHabitaciones();
            reordenarHab();
            idFilaHab_selected = [];

            $('#btn_abrir_modal_habitaciones').addClass('disabled');
            $('#btn_modificar_habitacion').addClass('disabled');


            $('#modal-delete-hab').modal('hide');
            limpiarCamposHabitacion();
            swal.fire({
                toast: true,
                class: 'bg-success',
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                type: 'success',
                title: 'El contenido de la Habitación y los Datos de los Clientes han sido eliminados satisfactoriamente',
            });
        });

        $('#remove_datos').on('click', function () {
            eliminarDatos();
            listarTablaDatos();
            reordenar();
            idFila_selected = [];

            $('#btn_abrir_modal').addClass('disabled');
            $('#btn_modificar_datos_clientes').addClass('disabled');

            $('#modal-delete').modal('hide');
            limpiarCamposDatos();
            swal.fire({
                toast: true,
                class: 'bg-success',
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                type: 'success',
                title: 'El contenido de los Datos de los Clientes se han eliminado satisfactoriamente',
            });
        });

        //Evento para abrir modal de confirmacion para eliminar datos de la tabla de los datos de los clienes
        $('#btn_abrir_modal').on('click', function () {
            if (idFila_selected == "") {
                limpiarCamposDatos();
            }
            else {
                $('#modal-delete').modal('show');

            }
        });

        //Evento para abrir modal de confirmacion para eliminar datos de la tabla de las habitaciones
        $('#btn_abrir_modal_habitaciones').on('click', function () {
            if (idFilaHab_selected == "") {
                limpiarCamposDatos();
            }
            else {
                $('#modal-delete-hab').modal('show');
            }
        });

        $('#tipo_habitacion_excursion').on('change', function () {
            let tipo_habitacion_excursion = $('#tipo_habitacion_excursion').val();
            if (tipo_habitacion_excursion != '') {
                if (tipo_habitacion_excursion == 'Sencilla') {
                    llenarCombos(tipo_habitacion_excursion, 1);
                }
                else if (tipo_habitacion_excursion == 'Doble') {
                    llenarCombos(tipo_habitacion_excursion, 2);
                }
                $('#cantidad_ninnos2a12_excursion').val('');
                $('#total_pago').html('Total a pagar 0 USD');
                $("#cantidad_ninnos2a12_excursion").val('');
                $("#cantidad_ninnos2a12_excursion").prop('disabled', false);
                $("#cantidad_ninnos0a2_excursion").val('');
                $("#cantidad_ninnos0a2_excursion").prop('disabled', false);

            }
            else {
                $('#cantidad_adultos_excursion').html('');
                $('#cantidad_adultos_excursion').prop('disabled', true);
                $("#cantidad_ninnos2a12_excursion").val('');
                $("#cantidad_ninnos2a12_excursion").prop('disabled', true);
                $("#cantidad_ninnos0a2_excursion").val('');
                $("#cantidad_ninnos0a2_excursion").prop('disabled', true);
                $('#cantidad_ninnos2a12_excursion').val('');
                $('#total_pago').html('Total a pagar 0 USD');

            }
            //totalPago(excursion)
        });

        $('#almuerzo').on('change', function () {
            var almuerzo = document.getElementById('almuerzo');
            if (almuerzo.value == '') {
                $('#cantidad_adultos').val('');
                $('#cantidad_ninnos2a12').val('');
                $('#cantidad_adultos').prop('disabled', true);
                $('#cantidad_ninnos2a12').prop('disabled', true);
            }
            else {
                $('#cantidad_adultos').val('');
                $('#cantidad_ninnos2a12').val('');
                $('#cantidad_adultos').prop('disabled', false);
                $('#cantidad_ninnos2a12').prop('disabled', false);
                $('#total_pago').html('Total a pagar 0 USD');
            }
        });

        $('#lugar_salida').on('change', function () {
            var lugar_salida = document.getElementById('lugar_salida');
            if (lugar_salida.value == '') {
                $('#cantidad_adultos').val('');
                $('#cantidad_ninnos2a12').val('');
                $('#cantidad_adultos').prop('disabled', true);
                $('#cantidad_ninnos2a12').prop('disabled', true);
            }
            else {
                $('#cantidad_adultos').val('');
                $('#cantidad_ninnos2a12').val('');
                $('#cantidad_adultos').prop('disabled', false);
                $('#cantidad_ninnos2a12').prop('disabled', false);
                $('#total_pago').html('Total a pagar 0 USD');
            }
        });

        $('#tipo_excursion_delfines').on('change', function () {
            var tipo_excursion_delfines = document.getElementById('tipo_excursion_delfines');
            if (tipo_excursion_delfines.value == '') {
                $('#cantidad_adultos').val('');
                $('#cantidad_ninnos2a12').val('');
                $('#cantidad_adultos').prop('disabled', true);
                $('#cantidad_ninnos2a12').prop('disabled', true);
            }
            else {
                $('#cantidad_adultos').val('');
                $('#cantidad_ninnos2a12').val('');
                $('#cantidad_adultos').prop('disabled', false);
                $('#cantidad_ninnos2a12').prop('disabled', false);
                $('#total_pago').html('Total a pagar 0 USD');
            }
        });

        $('#tipo_cicloturismo').on('change', function () {
            var tipo_cicloturismo = document.getElementById('tipo_cicloturismo');
            if (tipo_cicloturismo.value == '') {
                $('#cantidad_adultos').val('');
                $('#cantidad_adultos').prop('disabled', true);
            }
            else {
                $('#cantidad_adultos').val('');
                $('#cantidad_adultos').prop('disabled', false);
                $('#total_pago').html('Total a pagar 0 USD');
            }
        });

        //Cargar datos en el formulario de los datos de los clientes
        $('#btn_modificar_datos_clientes').on('click', function () {

            $('#btn_add_datos_clientes').attr('class', '');
            $('#btn_add_datos_clientes').addClass('hide-tab');
            $('#btn_modif_datos_clientes').attr('class', '');
            $('#btn_modif_datos_clientes').addClass('btn botones');

            let person = personas[parseInt(idFila_selected[0].substr(4))];

            $('#nombre_excursion').val(person.nombre);
            $('#nacionalidad_id').select2('val', $('#nacionalidad_id option:eq(' + person.nacionalidad + ')').val());
            $('#numero_pasaporte').val(person.pasaporte);
            $('#fecha_nacimiento').val(person.fecha);


            $("#formulario_add_datos").show()
            $("#listado_fomulario_datos").hide();
        });

        /*================
          Habitaciones
        * ================*/
        //Adicionar datos de las habitaciones
        $('#btn_add_habitacion_datos').on('click', function (event) {
            var valid = validateAll();
            var validPerson = validarCantidadPersonas();
            if (valid['status']) {
                if (validateDatosHabitacion()) {
                    if (validPerson['status']) {
                        $('#ocultar_habitacion_datos').hide();
                        $('#ocultar_listado_habitaciones').show();
                        $('#btn_cancelar_detalle_excursion').show();
                        $('#btn_reservar_excursion').show();
                        agregarDatosHabitaciones();
                        limpiarCamposDatos();
                        limpiarCamposHabitacion();
                        restablecerTabs();
                        // contHab = 0;
                        idFila_selected = [];
                        idFilaHab_selected = [];
                        personas = [];
                        cont = 0;
                        swal.fire({
                            toast: true,
                            class: 'bg-success',
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000,
                            type: 'success',
                            title: 'El contenido de la Habitación y los Datos de los Clientes se han adicionado satisfactoriamente',
                        });
                        listarTablaHabitaciones();
                    }
                    else {
                        swal.fire({
                            toast: true,
                            class: 'bg-danger',
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 4000,
                            type: 'error',
                            title: validPerson['message'],
                        });
                    }
                }
                else {
                    swal.fire({
                        toast: true,
                        class: 'bg-danger',
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 4000,
                        type: 'error',
                        title: 'Hay campos incorrectos en la pestaña de habitaciones',
                    });
                }
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

        /*================
          Datos de los Clientes
        * ================*/
        //Ocultar Vista de adicion de habitacion y datos de los clientes
        $('#btn_cancelar_habitacion_datos').on('click', function () {
            restablecerTabs();
            limpiarCamposDatos();
            limpiarCamposHabitacion();
            limpiarMensajesErroresHabitaciones();

            personas = [];
            cont = 0;
            idFila_selected = [];


            $("#ocultar_habitacion_datos").hide();
            $("#formulario_add_datos").hide();

            $("#listado_fomulario_datos").show();
            $("#ocultar_listado_habitaciones").show();

            $('#btn_modificar_habitacion').addClass('disabled');
            $('#btn_abrir_modal_habitaciones').addClass('disabled');

            $('#btn_cancelar_detalle_excursion').show();
            $('#btn_reservar_excursion').show();

            listarTablaHabitaciones();
        })

        //Ocultar Vista de adicion de habitacion y datos de los clientes
        $('#btn_cancelar_eliminar_habitacion').on('click', function () {
            $('#btn_modificar_habitacion').addClass('disabled');
            $('#btn_abrir_modal_habitaciones').addClass('disabled');
            $('#modal-delete-hab').modal('hide');
            $('#total_pago').html('Total a pagar 0 USD');
            listarTablaHabitaciones();

        })

        /*Metodos auxiliares*/

        //Metodo para validar solo numeros en campos de tipo texto
        function validarNumeros(event) {
            if (event.charCode >= 48 && event.charCode <= 57) {
                return true;
            }
            return false;
        }

        //Metodo para habitalr y desabilitar campos
        function desabilitarCampos() {
            if (excursion.excursion_unica) {
                $('#cantidad_ninnos2a12').prop("disabled", false);
                $('#cantidad_adultos').prop("disabled", false);
            }
            if (excursion.excursion_auto_clasico) {
                $('#cantidad_adultos').prop("disabled", false);
            }
        }

        //Metodo para modificar los datos del cliente de la tabla dinamicamente
        function modificarDatosHab(val) {

            //Obtener los valores nuevos

            // let oferta = getOferta($('#fecha_entrada').val());
            let precio = totalPago(excursion);
            console.log(personas);
            habitaciones[val].fechaEntrada = $('#fecha_entrada').val();
            habitaciones[val].tipoHabitacion = $('#tipo_habitacion_excursion').val();
            habitaciones[val].cantAdultos = $('#cantidad_adultos_excursion').val();
            habitaciones[val].cantN212 = $('#cantidad_ninnos2a12_excursion').val();
            habitaciones[val].cantN02 = $('#cantidad_ninnos0a2_excursion').val();
            habitaciones[val].precio = precio;
            habitaciones[val].personas = [];
            habitaciones[val].personas.push(personas);
            listarTablaHabitaciones();
            idFilaHab_selected = [];
        }

        //Metodo para eliminar datos de los clientes de la tabla dinamicamente
        function eliminarDatos() {

            $.each(idFila_selected, function (i, item) {

                personas = personas.filter(function (persona) {
                    let a = persona.id != parseInt((item.substr(4)))
                    return a;
                });
            });
            personas.forEach(function (person, i) {
                person.id = i;
            })
        }

        //Metodo para eliminar datos de las habitaciones
        function eliminarDatosHab() {

            $.each(idFilaHab_selected, function (i, item) {

                habitaciones = habitaciones.filter(function (habitacion) {
                    let a = habitacion.id != parseInt((item.substr(7)))
                    return a;
                });
            });
            habitaciones.forEach(function (hab, i) {
                hab.id = i;
            })
        }

        //Obtener id de la fila de la tabla de los datos de los clientes
        function getNumRows() {
            var num = 0;
            $('#listado_datos_clientes tbody tr').each(function () {
                num++;
            });
            return num;
        }

        //Metodo para reordenar elementos de la tabla de los datos de los clientes
        function reordenar() {
            var num = 0;
            $('#listado_datos_clientes tbody tr').each(function () {
                if (personas.length > 0) {
                    $(this).attr('id', 'fila' + num);
                    $(this).find('td').eq(0).text(num);
                }
                num++;
            });
            cont = num - 1;
        }

        //Metodo para reordenar elementos de la tabla de las habitaciones
        function reordenarHab() {
            var num = 0;
            $('#listado_habitaciones tbody tr').each(function () {
                if (num > 0) {
                    $(this).attr('id', 'fila' + num);
                    $(this).find('td').eq(0).text(num);
                }
                num++;
            });
            contHab = num - 1;
        }

        //Metodo para reordenar elementos de la tabla de los datos de los clientes
        function reordenar() {
            var num = 0;
            $('#listado_datos_clientes tbody tr').each(function () {
                if (personas.length > 0) {
                    $(this).attr('id', 'fila' + num);
                    $(this).find('td').eq(0).text(num);
                }
                num++;
            });
            cont = num - 1;
        }

        //Metodo para reordenar elementos de la tabla de las habitaciones
        function reordenarHab() {
            var num = 0;
            $('#listado_habitaciones tbody tr').each(function () {
                if (num > 0) {
                    $(this).attr('id', 'fila' + num);
                    $(this).find('td').eq(0).text(num);
                }
                num++;
            });
            contHab = num - 1;
        }

        //Llenar el campo cantidad de adultos en dependencia del tipo de habitacion
        function llenarCombos(tipo_hab, cant_ad) {
            //llenar adultos
            $('#cantidad_adultos_excursion').html('');
            $('#cantidad_adultos_excursion').append("<option value=''>"
                + "--Seleccionar--" + "</option>");
            for (i = 1; i <= cant_ad; i++) {
                $('#cantidad_adultos_excursion').append("<option value='" + i + "'>"
                    + i + "</option>");
            }
            $('#cantidad_adultos_excursion').prop("disabled", false);
        }

        //Metodo para validar que campos obligatorio del formulario de Habitacion
        function validateDatosHabitacion() {
            var a = 1;
            var cantidad_adultos_excursion = document.getElementById('cantidad_adultos_excursion');

            if ($('#fecha_entrada').val() == "") {
                $('#fecha_entrada').addClass('is-invalid');
                $('#error_fecha_entrada').html('');
                $('#error_fecha_entrada').append('El campo fecha de entrada es obligatorio');
                a = 0;
            }
            else {
                $('#fecha_entrada').removeClass('is-invalid');
                $('#error_fecha_entrada').html('');
            }
            if ($('#tipo_habitacion_excursion').val() == "") {
                $('#tipo_habitacion_excursion').addClass('is-invalid');

                $('#error_tipo_habitacion_excursion').html('');
                $('#error_tipo_habitacion_excursion').append('El campo tipo de habitación es obligatorio');
                a = 0;
            }
            else {
                $('#tipo_habitacion_excursion').removeClass('is-invalid');
                $('#error_tipo_habitacion_excursion').html('');
            }
            if ($('#cantidad_ninnos2a12_excursion').val() == "" && cantidad_adultos_excursion.disabled == false) {
                $('#cantidad_ninnos2a12_excursion').addClass('is-invalid');

                $('#error_cantidad_ninnos2a12_excursion').html('');
                $('#error_cantidad_ninnos2a12_excursion').append('El campo cantidad de niños (2-12 años) es obligatorio');
                a = 0;
            }
            else {
                $('#cantidad_ninnos2a12_excursion').removeClass('is-invalid');
                $('#error_cantidad_ninnos2a12_excursion').html('');
            }
            if ($('#cantidad_ninnos0a2_excursion').val() == "" && cantidad_adultos_excursion.disabled == false) {
                $('#cantidad_ninnos0a2_excursion').addClass('is-invalid');

                $('#error_cantidad_ninnos0a2_excursion').html('');
                $('#error_cantidad_ninnos0a2_excursion').append('El campo cantidad de niños (0-2 años) es obligatorio');
                a = 0;
            }
            else {
                $('#cantidad_ninnos0a2_excursion').removeClass('is-invalid');
                $('#error_cantidad_ninnos0a2_excursion').html('');
            }
            if ($('#cantidad_adultos_excursion').val() == "" && cantidad_adultos_excursion.disabled == false) {
                $('#cantidad_adultos_excursion').addClass('is-invalid');

                $('#error_cantidad_adultos_excursion').html('');
                $('#error_cantidad_adultos_excursion').append('El campo cantidad de niños (0-2 años) es obligatorio');
                a = 0;
            }
            else {
                $('#cantidad_adultos_excursion').removeClass('is-invalid');
                $('#error_cantidad_adultos_excursion').html('');
            }
            if (a)
                return true;
        }

        //Metodo para validar que haya elementos en la tabla de los datos de los clientes
        function validarCantidadPersonas() {
            var adultos = $('#cantidad_adultos_excursion').val();
            var ninos212 = $('#cantidad_ninnos2a12_excursion').val();
            var ninos02 = $('#cantidad_ninnos0a2_excursion').val();
            var personasSel = parseInt(adultos) + parseInt(ninos212) + parseInt(ninos02);
            var cantPersonas = personas.length;
            let result = [];
            result['status'] = true;
            result['message'] = 'OK';
            if (personasSel != cantPersonas) {
                result ['status'] = false;
                result ['message'] = '   La cantidad de personas adicionadas no se corresponde con la reserva';
            }
            return result;
        }

        //Metodo para validar que haya elementos en la tabla de los datos de los clientes
        function validarCapacidad(fecha) {
            let result = true;
            let capacidadexcursion = excursion.capacidad;
            if (excursion.fecha_inicio <= fecha && excursion.fecha_fin >= fecha) {
                if (capacidadexcursion <= cant_reservas) {
                    result = false;
                }
                else
                    result = true;
            }
            return result;
        }

        //Metodo para validar que haya elementos en la tabla de los datos de los clientes
        function validateAll() {
            var fecha = $('#fecha_entrada').val();
            var tipoHabitacion = $('#tipo_habitacion_excursion').val();
            let result = [];

            if (fecha) {
                //var oferta = getOferta(fecha);
                result['status'] = true;
                result['message'] = 'OK';

                if (personas.length < 1) {
                    result ['status'] = false;
                    result ['message'] = '   Debe adicionar los datos relacionados a los clientes';
                }
                else if (!validarFechas(excursion)) {
                    result ['status'] = false;
                    result ['message'] = '   Para la fecha seleccionada no se puede reservar';
                }
                /*else if (!validarCapacidad(fecha)) {
                    result ['status'] = false;
                    result ['message'] = '   Se exedió la capacidad de la cantidad para esta oferta.';
                }*/
            }
            else {
                result ['status'] = false;
                result ['message'] = '   Debe seleccionar al menos una fecha de entrada';
                $('#fecha_entrada').addClass('is-invalid');
            }

            return result;
        }

        //Metodo para validar las fechas de la oferta
        function validarFechas(oferta) {

            var dias_antelacion_reserva = $('#dias_antelacion').val();
            var fecha_inicio = new Date(oferta.fecha_inicio + 'T00:00:00');
            var fecha_fin = new Date(oferta.fecha_fin + 'T00:00:00');
            var fecha_entrada = new Date($('#fecha_entrada').val() + 'T00:00:00');
            var result = true;

            let fecha_fin_dias_antelacion = fecha_fin.setDate(fecha_fin.getDate() - dias_antelacion_reserva);

            if ((fecha_inicio <= fecha_entrada) && (fecha_entrada <= fecha_fin_dias_antelacion)) {
                $('#fecha_entrada').removeClass('is-invalid');
            }
            else {
                swal.fire({
                    toast: true,
                    class: 'bg-danger',
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 4500,
                    type: 'error',
                    title: 'Para la fecha seleccionada las reservas del hotel están acabadas no cumple con los días de antelacion definadas para la reserva ',
                });

                $('#fecha_entrada').val('');
                $('#fecha_entrada').addClass('is-invalid');
                result = false;
            }
            return result;

        }

        //Metodo para modificar los datos del cliente de la tabla dinamicamente
        function modificarDatos(val) {

            //Obtener los valores nuevos
            personas[val].nombre = $('#nombre_excursion').val();
            personas[val].nacionalidad = $('#nacionalidad_id').val();
            personas[val].pasaporte = $('#numero_pasaporte').val();
            personas[val].fecha = $('#fecha_nacimiento').val();
            listarTablaDatos();
        }

        //Metodo para adicionar los datos del cliente de la tabla dinamicamente
        function agregarDatosPersona() {
            let persona = {
                'id': '',
                'nombre': '',
                'nacionalidad': '',
                'pasaporte': '',
                'fecha': ''
            };
            persona.id = cont;
            persona.nombre = $('#nombre_excursion').val();
            persona.nacionalidad = $('#nacionalidad_id').val();
            persona.pasaporte = $('#numero_pasaporte').val();
            persona.fecha = $('#fecha_nacimiento').val();
            personas[cont] = persona;
            listarTablaDatos();
            cont++;
        }

        //Metodo para adicionar los datos de las habitaciones
        function agregarDatosHabitaciones() {

            //totalpago
            //let oferta = getOferta($('#fecha_entrada').val());
            let precio = totalPago(excursion);
            let habitacion = {
                'personas': [],
                'id': '',
                'fechaEntrada': '',
                'tipoHabitacion': '',
                'cantAdultos': '',
                'cantN212': '',
                'cantN02': '',
                'precio': ''
            };
            habitacion.personas.push(personas);
            habitacion.fechaEntrada = $('#fecha_entrada').val();
            habitacion.id = contHab;
            habitacion.tipoHabitacion = $('#tipo_habitacion_excursion').val();
            // habitacion.cantNoches = $('#cantidad_noche').val();
            habitacion.cantAdultos = $('#cantidad_adultos_excursion').val();
            habitacion.cantN212 = $('#cantidad_ninnos2a12_excursion').val();
            habitacion.cantN02 = $('#cantidad_ninnos0a2_excursion').val();
            // habitacion.requerimientos = $('#req_especiales').val();
            habitacion.precio = precio;

            habitaciones[contHab] = habitacion;
            contHab++;
        }

        //Metodo para validar que campos obligatorio del formulario de datos del cliente
        function validateDatosClientes() {
            var a = 1;
            if ($('#nombre_excursion').val() == "") {
                $('#nombre_excursion').addClass('is-invalid');
                $('#error_nombre_excursion').html('');
                $('#error_nombre_excursion').append('El campo nombre y apellidos es obligatorio');
                a = 0;
            }
            else {
                $('#nombre_excursion').removeClass('is-invalid');
                $('#error_nombre_excursion').html('');
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
            if (!valid_passport()) {

                $('#numero_pasaporte').addClass('is-invalid');
                $('#error_numero_pasaporte').html('');
                $('#error_numero_pasaporte').append('El número de pasaporte ya existe');
                a = 0;
            }
            if (a)
                return true;
        }

        //Metodo para validar que campos obligatorio del formulario de datos del cliente para modificar
        function validateDatosClientesModificar() {
            var a = 1;
            if ($('#nombre_excursion').val() == "") {
                $('#nombre_excursion').addClass('is-invalid');
                $('#error_nombre_excursion').html('');
                $('#error_nombre_excursion').append('El campo nombre y apellidos es obligatorio');
                a = 0;
            }
            else {
                $('#nombre_excursion').removeClass('is-invalid');
                $('#error_nombre_excursion').html('');
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

        //Metodo para validar numero de pasaporte sea unico
        function valid_passport() {
            var pasaporte = $('#numero_pasaporte').val();
            var result = true;
            var data = getTableData();
            $.each(data, function (i, item) {
                if (item['No. Pasaporte'] === pasaporte)
                    result = false;
            });
            return result;

        }

        //Obtener los Datos de la tabla de Datos de los Clientes
        function getTableData() {
            var array = [];
            var header = [];
            $('#listado_datos_clientes th').each(function (index, item) {
                header[index] = $(item).html();
            })

            $('#listado_datos_clientes tr').has('td').each(function () {
                var arrayItem = {};
                $('td', $(this)).each(function (index, item) {
                    arrayItem[header[index]] = $(item).html();
                    arrayItem['nacionalidad'] = item.id;
                });

                array.push(arrayItem);
            });
            return array;
        }

        //Metodo para listar los datos de la habitaciones en la tabla dinamicamente
        function listarTablaHabitaciones() {
            $('#listado_habitaciones tbody').html('');

            if (habitaciones.length == 0) {
                let tr = document.createElement('tr');
                let td = document.createElement('td');
                td.colSpan = 5;
                td.align = 'center';
                td.appendChild(document.createTextNode('No hay habitaciones a mostrar'));
                tr.appendChild(td);
                $('#listado_habitaciones tbody').append(tr);

            }
            else {

                for (var i = 0; i <= habitaciones.length - 1; i++) {

                    let tr = document.createElement('tr');
                    tr.className = 'selected';
                    tr.id = 'filaHab' + habitaciones[i].id;
                    tr.addEventListener('click', function () {
                        seleccionarHab(tr.id);
                    }, false);

                    let tdcont = document.createElement('td');
                    tdcont.appendChild(document.createTextNode(i));
                    tdcont.setAttribute('hidden', 'true');

                    let tdtipoHabitacion = document.createElement('td');
                    tdtipoHabitacion.appendChild(document.createTextNode(habitaciones[i].tipoHabitacion));

                    let tdcantAdultos = document.createElement('td');
                    tdcantAdultos.appendChild(document.createTextNode(habitaciones[i].cantAdultos));

                    let tdcantN212 = document.createElement('td');
                    tdcantN212.appendChild(document.createTextNode(habitaciones[i].cantN212));

                    let tdcantN02 = document.createElement('td');
                    tdcantN02.appendChild(document.createTextNode(habitaciones[i].cantN02));

                    let tdprecio = document.createElement('td');
                    tdprecio.appendChild(document.createTextNode(habitaciones[i].precio));
                    tdprecio.setAttribute('hidden', 'true');
                    tr.appendChild(tdcont);
                    tr.appendChild(tdtipoHabitacion);
                    tr.appendChild(tdcantAdultos);
                    tr.appendChild(tdcantN212);
                    tr.appendChild(tdcantN02);
                    tr.appendChild(tdprecio);

                    $('#listado_habitaciones tbody').append(tr);

                }
            }
            idFilaHab_selected = [];
        }

        //Metodo seleccionar elementos de la tabla datos de los clientes
        function seleccionar(idFila) {

            $('#btn_modificar_datos_clientes').removeClass('disabled');
            $('#btn_abrir_modal').removeClass('disabled');


            if ($('#' + idFila).hasClass('seleccionada')) {
                $('#' + idFila).removeClass('seleccionada');
                idFila_selected = idFila_selected.filter(function (value, index, arr) {
                    return value != idFila
                });
            } else {
                $('#' + idFila).addClass('seleccionada');
                idFila_selected.push(idFila);
            }

            if (idFila_selected == undefined || idFila_selected.length == 0)
                $('#btn_abrir_modal').addClass('disabled');

            if (idFila_selected.length > 1 || idFila_selected.length == 0)
                $('#btn_modificar_datos_clientes').addClass('disabled');

        }

        //Metodo seleccionar elementos de la tabla Habitaciones
        function seleccionarHab(idFila) {
            $('#btn_abrir_modal_habitaciones').removeClass('disabled');
            $('#btn_modificar_habitacion').removeClass('disabled');
            if ($('#' + idFila).hasClass('seleccionada')) {
                $('#' + idFila).removeClass('seleccionada');
                idFilaHab_selected = idFilaHab_selected.filter(function (value, index, arr) {
                    return value != idFila
                });
                calcularPrecioHabitaciones(idFilaHab_selected);
            } else {
                $('#' + idFila).addClass('seleccionada');
                idFilaHab_selected.push(idFila);
                calcularPrecioHabitaciones(idFilaHab_selected);
            }

            if (idFilaHab_selected == undefined || idFilaHab_selected.length == 0)
                $('#btn_abrir_modal_habitaciones').addClass('disabled');

            if (idFilaHab_selected.length > 1 || idFilaHab_selected.length == 0)
                $('#btn_modificar_habitacion').addClass('disabled');

        }

        //Metodo para calcular el precio total por cada habitacion seleccionada por el usuario
        function calcularPrecioHabitaciones(filas) {
            if (filas != 0) {
                let habitSelec = [];
                $.each(filas, function (i, item) {
                    habitSelec.push(habitaciones.filter(hab => hab.id === parseInt(item.substr(7))))
                });

                if (habitSelec.length > 0) {
                    let precio = 0;
                    habitSelec.forEach(function (hab) {
                        precio += parseInt(hab[0].precio);
                    })

                    $('#total_pago').html('Total a pagar ' + precio + ' USD');
                }
                else {
                    $('#total_pago').html('Total a pagar 0 USD');
                }
            }
            else
                $('#total_pago').html('Total a pagar 0 USD');
        }

        //Metodo para obtener las ofertas que esten en el rango de la temporada por una fecha de entrada definida por el usuario
        function getOferta(fecha) {
            var oferta = [];
            /*$.each(pax, function (i, item) {
                if ((item['fecha_inicio'] <= fecha) && (item['fecha_fin'] >= fecha)) {
                    oferta.push(item);
                }
            });*/
            if ((excursion.fecha_inicio <= fecha) && (excursion.fecha_fin >= fecha)) {
                oferta.push(excursion);
            }
            return oferta;
        }

        //Metodo para limpiar los campos del formulario Datos de los clientes
        function limpiarMensajesErroresDatos() {
            $('#numero_pasaporte').removeClass('is-invalid');
            $('#error_numero_pasaporte').html('');
            $('#fecha_nacimiento').removeClass('is-invalid');
            $('#error_fecha_nacimiento').html('');
            $('#nombre_excursion').removeClass('is-invalid');
            $('#error_nombre_excursion').html('');
            $('#nacionalidad_id').removeClass('is-invalid');
            $('#error_nacionalidad_id').html('');
        }


        //Metodo para limpiar los campos del formulario Datos de los clientes
        function limpiarMensajesErroresHabitaciones() {
            $('#cantidad_adultos_excursion').removeClass('is-invalid');
            $('#error_cantidad_adultos_excursion').html('');
            $('#cantidad_ninnos2a12_excursion').removeClass('is-invalid');
            $('#error_cantidad_ninnos2a12_excursion').html('');
            $('#cantidad_ninnos0a2_excursion').removeClass('is-invalid');
            $('#error_cantidad_ninnos0a2_excursion').html('');
            $('#tipo_habitacion').removeClass('is-invalid');
            $('#error_tipo_habitacion').html('');
        }

        //Metodo para limpiar los campos del formulario Datos de los clientes
        function limpiarCamposDatos() {
            $("#nombre_excursion").val('');
            $("#numero_pasaporte").val('');
            $("#fecha_nacimiento").val('');
            $("#nacionalidad_id").val('').trigger('change');
        }

        //Metodo para limpiar los campos del formulario habitaciones
        function limpiarCamposHabitacion() {
            $("#cantidad_adultos_excursion").html('');
            $("#cantidad_adultos_excursion").prop('disabled', true);
            $("#cantidad_ninnos2a12_excursion").val('');
            $("#cantidad_ninnos2a12_excursion").prop('disabled', true);
            $("#cantidad_ninnos0a2_excursion").val('');
            $("#cantidad_ninnos0a2_excursion").prop('disabled', true);
            $("#tipo_habitacion_excursion").val('').trigger('change');
            $('#total_pago').html('Total a pagar 0 USD');
        }

        //Metodo para restablecer las tabs
        function restablecerTabs() {
            cambiar_tab(1);
            $("#custom-content-below-habitaciones-tab").addClass('active');
            $("#custom-content-below-habitaciones").addClass('active');
            $("#custom-content-below-habitaciones").addClass('show');
            $("#custom-content-below-datos-tab").removeClass('active');
            $("#custom-content-below-datos").removeClass('show');
            $("#custom-content-below-datos").removeClass('active');
        }

        //Metodo para listar los datos de los clientes en la tabla dinamicamente
        function listarTablaDatos() {

            $('#listado_datos_clientes tbody').html('');
            for (var i = 0; i <= personas.length - 1; i++) {

                var nacionalidad = $('#nacionalidad_id').find('option[value=' + personas[i].nacionalidad + ']').val();

                let tr = document.createElement('tr');
                tr.className = 'selected';
                tr.id = 'fila' + personas[i].id;
                tr.addEventListener('click', function () {
                    seleccionar(tr.id);
                }, false);

                let tdcont = document.createElement('td', {'hidden': true});
                tdcont.appendChild(document.createTextNode(i));
                tdcont.setAttribute('hidden', 'true');

                let tdname = document.createElement('td');
                tdname.appendChild(document.createTextNode(personas[i].nombre));

                let tdfecha = document.createElement('td');
                tdfecha.appendChild(document.createTextNode(personas[i].fecha));

                let tdpassport = document.createElement('td');
                tdpassport.id = 'fila_pasaporte';
                tdpassport.appendChild(document.createTextNode(personas[i].pasaporte));

                let tdnac = document.createElement('td');
                tdnac.id = nacionalidad;
                tdnac.appendChild(document.createTextNode(countries[nacionalidad]));

                tr.appendChild(tdcont);
                tr.appendChild(tdname);
                tr.appendChild(tdfecha);
                tr.appendChild(tdpassport);
                tr.appendChild(tdnac);

                $('#listado_datos_clientes tbody').append(tr);

            }
            if (personas.length < 1) {
                let tr = document.createElement('tr');
                let td = document.createElement('td');
                td.colSpan = 4;
                td.align = 'center';
                td.appendChild(document.createTextNode('No hay datos de los clientes a mostrar'));
                tr.appendChild(td);
                $('#listado_datos_clientes tbody').append(tr);
            }
            idFila_selected = [];
        }

        //Metodo para cambiar imagenes de pestañas de la vista habitacion y datos del clientes
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

        //Metodo para mostrar la ofertas disponibles
        function mostrarOfertasDisponibles() {
            var a = '';
            a = '<li>Desde ' + excursion.fecha_inicio + ' Hasta ' + excursion.fecha_fin + '</li>';

            $('#ofertas_disponibles').html('');
            $('#ofertas_disponibles').append(
                '<div class="alert alert-info alert-dismissible">' +
                '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' +
                '<h5><i class="icon fas fa-check"></i> Para esta excursión la oferta está disponible:</h5>' +
                '<ul>' + a + '</ul><br><p>NOTA: Para esta oferta solo se puede reservar con ' + dias_antelacion.dias + ' días de antelación</p></div>'
            );
        }

        function totalPago(oferta) {
            let total_precio = 0;
            var cant_adultos = $('#cantidad_adultos').val();
            var cant_ninnos_2a12 = $('#cantidad_ninnos2a12').val();
            var almuerzo = $('#almuerzo').val();
            var lugar_salida = $('#lugar_salida').val();

            var tipo_cicloturismo = $('#tipo_cicloturismo').val();
            var tipo_excursion_delfines = $('#tipo_excursion_delfines').val();

            var cantidad_adultos_excursion = $('#cantidad_adultos_excursion').val();
            var cantidad_ninnos2a12_excursion = $('#cantidad_ninnos2a12_excursion').val();
            var tipo_habitacion_excursion = $('#tipo_habitacion_excursion').val();

            if ($('#cantidad_adultos').val() == "") {
                cant_adultos = 0;
            }

            if ($('#cantidad_adultos_excursion').val() == "") {
                cantidad_adultos_excursion = 0;
            }

            if ($('#cantidad_ninnos2a12').val() == "") {
                cant_ninnos_2a12 = 0;
            }

            if ($('#cantidad_ninnos2a12_excursion').val() == "") {
                cantidad_ninnos2a12_excursion = 0;
            }

            if (oferta.excursion_auto_clasico) {
                total_precio = parseInt(cant_adultos) * oferta.precio_pax_auto;
            }
            if (oferta.excursion_alimentacion && almuerzo == 'Si') {
                total_precio += (parseInt(cant_adultos) * oferta.precio_pax_almuerzo) + (parseInt(cant_ninnos_2a12) * oferta.precio_ninnos2a12anno_almuerzo);
            }
            else if (oferta.excursion_alimentacion && almuerzo == 'No') {

                total_precio += (parseInt(cant_adultos) * oferta.precio_pax_sin_almuerzo) + (parseInt(cant_ninnos_2a12) * oferta.precio_ninnos2a12anno_sin_almuerzo);
            }
            if (oferta.excursion_pinar_vinnales && lugar_salida == 'Pinar del Río') {
                total_precio = (parseInt(cant_adultos) * oferta.precio_pax_Pinar) + (parseInt(cant_ninnos_2a12) * oferta.precio_ninnos2a12anno_Pinar);
            }
            else if (oferta.excursion_pinar_vinnales && lugar_salida == 'Viñales') {
                total_precio += (parseInt(cant_adultos) * oferta.precio_pax_Vinnales) + (parseInt(cant_ninnos_2a12) * oferta.precio_ninnos2a12anno_Vinnales);
            }
            if (oferta.excursion_cicloturismo && tipo_cicloturismo == 'Con Canopy') {
                total_precio += parseInt(cant_adultos) * oferta.precio_pax_con_canopy;
            }
            else if (oferta.excursion_cicloturismo && tipo_cicloturismo == 'Sin Canopy') {
                total_precio += parseInt(cant_adultos) * oferta.precio_pax_sin_canopy;
            }
            if (oferta.excursion_delfines && tipo_excursion_delfines == 'Show con delfines') {
                total_precio += (parseInt(cant_adultos) * oferta.precio_pax_show_delfines) + (parseInt(cant_ninnos_2a12) * oferta.precio_ninnos2a12anno_show_delfines);
            }
            else if (oferta.excursion_delfines && tipo_excursion_delfines == 'Baño con delfines') {
                total_precio += (parseInt(cant_adultos) * oferta.precio_pax_banno_delfines) + (parseInt(cant_ninnos_2a12) * oferta.precio_ninnos2a12anno_banno_delfines);
            }
            if (oferta.excursion_habitacion && tipo_habitacion_excursion == 'Sencilla') {

                total_precio += (parseInt(cantidad_adultos_excursion) * oferta.precio_pax_hab_sencilla) + (parseInt(cantidad_ninnos2a12_excursion) * oferta.precio_ninnos2a12anno_hab_sencilla);
            }
            else if (oferta.excursion_habitacion && tipo_habitacion_excursion == 'Doble') {
                total_precio += (parseInt(cantidad_adultos_excursion) * oferta.precio_pax_hab_dobles) + (parseInt(cantidad_ninnos2a12_excursion) * oferta.precio_ninnos2a12anno_hab_dobles);
            }
            if (oferta.excursion_unica) {
                total_precio += (parseInt(cant_adultos) * oferta.precio_pax_unica) + (parseInt(cant_ninnos_2a12) * oferta.precio_ninnos2a12annos_unica);
            }

            $('#total_pago').html('Total a pagar ' + total_precio + ' USD');
            $('#precio_total').val(total_precio);
            return total_precio;

        }

        function limpiarDatos() {
            $('#addform')[0].reset();
            $("#idioma_id").val('').trigger('change');
            $("#almuerzo").val('').trigger('change');
            $("#lugar_salida").val('').trigger('change');
            $("#tipo_cicloturismo").val('').trigger('change');
            $("#tipo_excursion_delfines").val('').trigger('change');
            $("#hotel_recogida_id").val('').trigger('change');
        }

        $('#btn_reservar_excursion').on('click', function (event) {
            event.preventDefault();
            var datos = [];
            if (habitaciones.length > 0) {
                $.each(habitaciones, function (i, item) {
                    $.each(idFilaHab_selected, function (j, filaHab) {
                        if (item['id'] == parseInt(idFilaHab_selected[j].substr(7))) {
                            datos.push(item);
                        }
                    })
                });

            }
            else {
                datos.push(habitaciones.length);
            }
            $("#habitaciones").val(JSON.stringify(datos));

            var form = $(this).parents('form');
            var url = form.attr('action');
            var dataformulario = $('form').get(0);
            var fecha = $('#fecha_entrada').val();
            var habitacion_check = $('#habitacion_check').val();


            if (habitacion_check == 1) {
                if (idFilaHab_selected.length == 0) {
                    swal.fire({
                        toast: true,
                        class: 'bg-danger',
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 4500,
                        type: 'error',
                        title: 'Para poder reservar debe al menos haber seleccionado una habitación',
                    });
                    return;

                }
            }
            if (!validarCapacidad(fecha)) {
                swal.fire({
                    toast: true,
                    class: 'bg-danger',
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 4500,
                    type: 'error',
                    title: 'Se exedió la capacidad de la cantidad para esta oferta.',
                });
                return;
            }
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
                    }
                },
                error: function (data) {
                    if (data.responseJSON) {
                        $.each(data.responseJSON.errors, function (key, value) {
                            showErrors(key, value);
                        });
                    }
                }
            });

        });

        function showErrors(key, value) {
            // console.log(key+":"+value)
            $('#' + key).addClass('is-invalid');
            $('#error_' + key).html('');
            $('#error_' + key).append(value);
        }
    </script>
@endsection