<script type="text/javascript">

    $("#tipo_habitacion").val('').trigger('change');


    //const variables
    let personas = [];
    let habitaciones = [];

    /*let habitacion = {
    'personas': [],
    'id': '0',
    'fechaEntrada': '2020-06-26',
    'tipoHabitacion': 'Doble',
    'cantNoches': '2',
    'cantAdultos': '2',
    'cantN212': '2',
    'cantN02': '2',
    'requerimientos': '2',
    'precio': '50'
    };
    let habitacion1 = {
    'personas': [],
    'id': '1',
    'fechaEntrada': '2021-06-26',
    'tipoHabitacion': 'Sencilla',
    'cantNoches': '2',
    'cantAdultos': '2',
    'cantN212': '2',
    'cantN02': '2',
    'requerimientos': '2',
    'precio': '50'
    };
    habitaciones[0] = habitacion;
    habitaciones[1] = habitacion1;*/
    var cont = 0;
    var contHab = 0;

    var idFila_selected = [];
    var idFilaHab_selected = [];

    /*$(document).ready(
    // console.log(pax),
    listarTablaHabitaciones(),
    calcularPrecioHabitaciones(0)
    );*/
    $(document).ready(
        mostrarOfertasDisponibles(),
        listarTablaHabitaciones(),
    );

    /*buttons events*/

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
                    $('#vista_habitacion_datos_clientes').hide();
                    $('#vista_detalle_hotel').show();
                    agregarDatosHabitaciones();
                    limpiarCamposDatos();
                    limpiarCamposHabitacion();

                    restablecerTabs();
//contHab = 0;
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
                        timer: 4500,
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
                    timer: 4500,
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
                timer: 4500,
                type: 'error',
                title: valid['message'],
            });
        }
    });
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
                    $("#vista_habitacion_datos_clientes").hide();
                    $("#formulario_add_datos").hide();
                    $("#listado_fomulario_datos").show();
                    $("#vista_detalle_hotel").show();

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
                        timer: 4500,
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
                    timer: 4500,
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
                timer: 4500,
                type: 'error',
                title: valid['message'],
            });
        }
    });

    //Realizar la reservar habitaciones
    $('#btn_reservar_habitacion').on('click', function (event) {
        event.preventDefault();
        var form = $(this).parents('form');
        var url = form.attr('action');
        var dataformulario = [];

        $.each(habitaciones, function (i, item) {
            dataformulario.push(item);

        });
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
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: url,
            method: "POST",
            data: {
                habitaciones: dataformulario
            },
//contentType: false,
//cache: false,
//processData: false,
            dataType: "json",
            success: function (data) {
                if (data.success) {
                    window.location.href = data.redirect;
                }
            },
            error: function (data) {
                if (data.responseJSON) {
                    /*cleanErrors();
                    $.each(data.responseJSON.errors, function (key, value) {
                    showErrors(key, value);
                    });*/
                }
            }
        });
    });

    //Mostrar vista de Adicion de Habitacion y Datos de los Clientes
    $('#btn_vista_habitacion_datos_clientes').on('click', function () {

        $('#btn_add_habitacion_datos').attr('class', '');
        $('#btn_add_habitacion_datos').addClass('btn botones');
        $('#btn_modif_habitacion_datos').attr('class', '');
        $('#btn_modif_habitacion_datos').addClass('hide-tab');

        $("#vista_habitacion_datos_clientes").show();
        $("#ocultar_listado_habitaciones").hide();
        personas = [];
        listarTablaDatos();
        mostrarOfertasDisponibles();
    });

    //Cargar datos en el formulario de las habitaciones y datos de los clientes
    $('#btn_modificar_habitacion').on('click', function () {

        $('#btn_add_habitacion_datos').attr('class', '');
        $('#btn_add_habitacion_datos').addClass('hide-tab');
        $('#btn_modif_habitacion_datos').attr('class', '');
        $('#btn_modif_habitacion_datos').addClass('btn botones');

        $('#tipo_habitacion').prop('disabled', false);
        $('#cantidad_adultos').prop('disabled', false);
        $('#cantidad_ninnos2a12').prop('disabled', false);
        $('#cantidad_ninnos0a2').prop('disabled', false);

        var idFila = parseInt(idFilaHab_selected[0].substr(7));
        cont = habitaciones[idFila].personas[0].length;
        $('#fecha_entrada').val(habitaciones[idFila].fechaEntrada);
        var oferta = getOferta(habitaciones[idFila].fechaEntrada);
        setDatos(oferta);

        $('#tipo_habitacion').val(habitaciones[idFila].tipoHabitacion);
        llenarComboModificar(oferta);

        $('#cantidad_noche').select2('val', $('#cantidad_noche option:eq(' + parseInt(habitaciones[idFila].cantNoches) + ')').val());
// $('#cantidad_noche').val(parseInt(habitaciones[idFila].cantNoches));
        $('#cantidad_adultos').val(parseInt(habitaciones[idFila].cantAdultos));
        $('#cantidad_ninnos2a12').val(parseInt(habitaciones[idFila].cantN212));
        $('#cantidad_ninnos0a2').val(parseInt(habitaciones[idFila].cantN02));
        $('#req_especiales').val(habitaciones[idFila].requerimientos);
        $('#total_pago_habitacion_datos').html('Total a pagar ' + habitaciones[idFila].precio + ' USD');

        personas = habitaciones[idFila].personas[0];
        listarTablaDatos();
        console.log(habitaciones);


        $("#vista_habitacion_datos_clientes").show();
        $("#vista_detalle_hotel").hide();
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

        $("#vista_habitacion_datos_clientes").hide();
        $("#formulario_add_datos").hide();

        $("#ocultar_listado_habitaciones").show();

        $('#btn_modificar_habitacion').addClass('disabled');
        $('#btn_abrir_modal_habitaciones').addClass('disabled');
        listarTablaHabitaciones();
        $('#btn_total_pago_hab').html('Total a pagar 0 USD');

    })

    //Ocultar Vista de adicion de habitacion y datos de los clientes
    $('#btn_cancelar_eliminar_habitacion').on('click', function () {
        $('#btn_modificar_habitacion').addClass('disabled');
        $('#btn_abrir_modal_habitaciones').addClass('disabled');
        $('#modal-delete-hab').modal('hide');
        listarTablaHabitaciones();
        $('#btn_total_pago_hab').html('Total a pagar 0 USD');

    })

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

    //Cargar datos en el formulario de los datos de los clientes
    $('#btn_modificar_datos_clientes').on('click', function () {

        $('#btn_add_datos_clientes').attr('class', '');
        $('#btn_add_datos_clientes').addClass('hide-tab');
        $('#btn_modif_datos_clientes').attr('class', '');
        $('#btn_modif_datos_clientes').addClass('btn botones');

        let person = personas[parseInt(idFila_selected[0].substr(4))];

        $('#nombre').val(person.nombre);
        $('#nacionalidad_id').select2('val', $('#nacionalidad_id option:eq(' + person.nacionalidad + ')').val());
        $('#numero_pasaporte').val(person.pasaporte);
        $('#fecha_nacimiento').val(person.fecha);


        $("#formulario_add_datos").show()
        $("#listado_fomulario_datos").hide();
    });

    //Evento para la validacion de las ofertas de reservacion en dependencia de la fecha de entrada
    $('#fecha_entrada').on('input', function () {
        var fecha = $('#fecha_entrada').val();
        if (validarOfertas(fecha)) {
            var oferta = getOferta(fecha);
            if (validarFechas(oferta)) {
                setDatos(oferta);
                $('#tipo_habitacion').prop("disabled", false);
            }

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
        }
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

    //Metodo para validar que campos obligatorio del formulario de datos del cliente para modificar
    function validateDatosClientesModificar() {
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

    //Metodo para limpiar los campos del formulario Datos de los clientes
    function limpiarMensajesErroresHabitaciones() {
        $('#cantidad_adultos').removeClass('is-invalid');
        $('#error_cantidad_adultos').html('');
        $('#cantidad_ninnos2a12').removeClass('is-invalid');
        $('#error_cantidad_ninnos2a12').html('');
        $('#cantidad_ninnos0a2').removeClass('is-invalid');
        $('#error_cantidad_ninnos0a2').html('');
        $('#tipo_habitacion').removeClass('is-invalid');
        $('#error_tipo_habitacion').html('');
    }

    //Metodo para modificar los datos del cliente de la tabla dinamicamente
    function modificarDatosHab(val) {

//Obtener los valores nuevos
// console.log('aquii',val);

        let oferta = getOferta($('#fecha_entrada').val());
        let precio = totalPago(oferta);
// console.log(personas);
        habitaciones[val].fechaEntrada = $('#fecha_entrada').val();
        habitaciones[val].tipoHabitacion = $('#tipo_habitacion').val();
        habitaciones[val].cantNoches = $('#cantidad_noche').val();
        habitaciones[val].cantAdultos = $('#cantidad_adultos').val();
        habitaciones[val].cantN212 = $('#cantidad_ninnos2a12').val();
        habitaciones[val].cantN02 = $('#cantidad_ninnos0a2').val();
        habitaciones[val].requerimientos = $('#req_especiales').val();
        habitaciones[val].precio = precio;
        habitaciones[val].personas = [];
        habitaciones[val].personas.push(personas);
        listarTablaHabitaciones();
        idFilaHab_selected = [];
    }

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
//$('#remove_datos_hab').prop('hidden',false);
        }
    });

    //Evento para calculo de pago total en dependencia de la cantidad de adultos
    $('#cantidad_adultos').on('change', function () {
        var fecha = $('#fecha_entrada').val()
        var oferta = getOferta(fecha);
        totalPago(oferta);
    })

    //Evento para calculo de pago total en dependencia de la cantidad de niños
    $('#cantidad_ninnos2a12').on('change', function () {
        var fecha = $('#fecha_entrada').val();
        var oferta = getOferta(fecha);
        totalPago(oferta);
// console.log($('#cantidad_ninnos2a12').val())
    })

    //Ocultar vista de adicion de habitacion y datos de los clientes
    $("#vista_habitacion_datos_clientes").hide();

    //Ocultar Formulario Adicion de Datos de los Clientes
    $("#formulario_add_datos").hide();

    /*Metodos auxiliares*/

    //Metodo para adicionar los datos del cliente de la tabla dinamicamente
    function agregarDatosPersona() {
// console.log(cont);
        let persona = {
            'id': '',
            'nombre': '',
            'nacionalidad': '',
            'pasaporte': '',
            'fecha': ''
        };
        persona.id = cont;
        persona.nombre = $('#nombre').val();
        persona.nacionalidad = $('#nacionalidad_id').val();
        persona.pasaporte = $('#numero_pasaporte').val();
        persona.fecha = $('#fecha_nacimiento').val();
        personas[cont] = persona;
        listarTablaDatos();
// console.log(cont);
// console.log(persona, personas);
        cont++;
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

    //Metodo para adicionar los datos de las habitaciones
    function agregarDatosHabitaciones() {

//totalpago
        console.log('before', habitaciones);
        let oferta = getOferta($('#fecha_entrada').val());
// console.log(oferta);
        let precio = totalPago(oferta);
        let habitacion = {
            'personas': [],
            'id': '',
            'fechaEntrada': '',
            'tipoHabitacion': '',
            'cantNoches': '',
            'cantAdultos': '',
            'cantN212': '',
            'cantN02': '',
            'requerimientos': '',
            'precio': ''
        };
        habitacion.personas.push(personas);
        habitacion.fechaEntrada = $('#fecha_entrada').val();
        habitacion.id = contHab;
        habitacion.tipoHabitacion = $('#tipo_habitacion').val();
        habitacion.cantNoches = $('#cantidad_noche').val();
        habitacion.cantAdultos = $('#cantidad_adultos').val();
        habitacion.cantN212 = $('#cantidad_ninnos2a12').val();
        habitacion.cantN02 = $('#cantidad_ninnos0a2').val();
        habitacion.requerimientos = $('#req_especiales').val();
        habitacion.precio = precio;

        habitaciones[contHab] = habitacion;
        console.log('after', habitaciones, contHab);

        contHab++;
    }

    //Metodo para listar los datos de la habitaciones en la tabla dinamicamente
    function listarTablaHabitaciones() {
        $('#listado_habitaciones tbody').html('');
// console.log(habitaciones, habitaciones.length);

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

                let tdcont = document.createElement('td', {'hidden': true});
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

    //Metodo para limpiar los campos del formulario Datos de los clientes
    function limpiarMensajesErroresDatos() {
        $('#numero_pasaporte').removeClass('is-invalid');
        $('#error_numero_pasaporte').html('');
        $('#fecha_nacimiento').removeClass('is-invalid');
        $('#error_fecha_nacimiento').html('');
        $('#nombre').removeClass('is-invalid');
        $('#error_nombre').html('');
        $('#nacionalidad_id').removeClass('is-invalid');
        $('#error_nacionalidad_id').html('');
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

                $('#btn_total_pago_hab').html('Total a pagar ' + precio + ' USD');
            }
            else {
                $('#btn_total_pago_hab').html('Total a pagar 0 USD');
            }
        }
        else
            $('#btn_total_pago_hab').html('Total a pagar 0 USD');
    }

    //Metodo para modificar los datos del cliente de la tabla dinamicamente
    function modificarDatos(val) {

//Obtener los valores nuevos
        personas[val].nombre = $('#nombre').val();
        personas[val].nacionalidad = $('#nacionalidad_id').val();
        personas[val].pasaporte = $('#numero_pasaporte').val();
        personas[val].fecha = $('#fecha_nacimiento').val();
        listarTablaDatos();
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

// console.log(idFila_selected);
// console.log(personas);

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

    //Metodo para eliminar datos de los clientes de la tabla dinamicamente
    function eliminarDatos() {

        $.each(idFila_selected, function (i, item) {

            personas = personas.filter(function (persona) {
                let a = persona.id != parseInt((item.substr(4)))
// console.log(a);
                return a;
            });
        });

        personas.forEach(function (person, i) {
            person.id = i;
        })
// console.log(personas);
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

    //Validar que la fecha de entrada se corresponda con el rango de fechas de la oferta
    function validarOfertas(fecha) {
        var result = false;

        $.each(pax, function (i, item) {

            if (item['fecha_inicio'] <= fecha && item['fecha_fin'] >= fecha) {
                result = true;
            }

        });

        return result;
    }

    // //Actualizar pax
    // function actualizarPax() {
    //         pax.forEach(function (px) {
    //             habitaciones.forEach(function (hab) {
    //             if (px.fecha_inicio <= hab.fechaEntrada && px.fecha_fin >= hab.fechaEntrada) {
    //                 switch (hab.tipoHabitacion) {
    //                     case 'Doble':
    //                         if (px.cantidad_hab_dobles > 0)
    //                             px.cantidad_hab_dobles = px.cantidad_hab_dobles - 1;
    //                         console.log(px.cantidad_hab_dobles, 'resto');
    //                         break;
    //                     case 'Sencilla':
    //                         if (px.cantidad_hab_sencillas > 0)
    //                             px.cantidad_hab_sencillas = parseInt(px.cantidad_hab_sencillas) - 1;
    //                         break;
    //                     case 'Triples':
    //                         if (px.cantidad_hab_triples > 0)
    //                         px.cantidad_hab_triples = parseInt(px.cantidad_hab_triples) - 1;
    //                         break;
    //                 }
    //             }
    //         });
    //     })
    //     console.log(pax);
    // }

    //Metodo para obtener las ofertas que esten en el rango de la temporada por una fecha de entrada definida por el usuario
    function getOferta(fecha) {
        var oferta = [];
        $.each(pax, function (i, item) {
            if ((item['fecha_inicio'] <= fecha) && (item['fecha_fin'] >= fecha)) {
                oferta.push(item);
            }
        });
        return oferta;
    }

    //Obtener la oferta en vigencia depeniendo de la fecha de entrada
    function invalidarDatos() {
        $('#tipo_habitacion').html('');
        $('#cantidad_ninnos2a12').html('');
        $('#cantidad_adultos').prop("disabled", true);
    }


    //Llenar los combos en dependencia de la variante de la oferta
    function setDatos(datos) {
        var tipohabitaciones = [];
        var oferta = datos[0];
        if (oferta['variante2adultos_hasta2ninnos_2a12annos'] || oferta['variante2adultos_2hasta3ninnos_2a12annos']) {

            tipohabitaciones.push('Doble');

        }

        if (oferta['variante1adulto_mismahabitacion'] || oferta['variante1adulto_hasta3ninnos_2a12annos']) {

            tipohabitaciones.push('Sencilla');
        }

        if (oferta['variante3adultos_mismahabitacion']) {

            tipohabitaciones.push('Triple');
        }
        llenarCombo(tipohabitaciones)
    }

    //Llenar el combo tipo de habitacion
    function llenarCombo(tipo_hab) {

//llenar tipo habitacion
        $('#tipo_habitacion').html('');
        $('#tipo_habitacion').append("<option value=''>"
            + "--Seleccionar--" + "</option>");
        tipo_hab.forEach(function (item) {
            $('#tipo_habitacion').append('<option value="' + item + '">' + item + '</option>');
        })

    }

    //Metodo modificar llenar combo
    function llenarComboModificar(oferta) {

        var tipo_habitacion = document.getElementById('tipo_habitacion');
// console.log(tipo_habitacion.value);

        if (tipo_habitacion.value != '') {

            switch ($('#tipo_habitacion').val()) {
                case 'Sencilla':
//llenar combo cantidad de adultos
                    $('#cantidad_adultos').html('');
                    $('#cantidad_adultos').append("<option value=''>"
                        + "--Seleccionar--" + "</option>");
                    $('#cantidad_adultos').append("<option value='1'>"
                        + "1" + "</option>");

// llenar combo cantidad de niños de 2 a 12
                    $('#cantidad_ninnos2a12').html('');

                    if (oferta['variante1adulto_mismahabitacion']) {
                        $('#cantidad_ninnos2a12').append("<option value='0'>0</option>");
                        $('#cantidad_ninnos0a2').append("<option value='0'>0</option>");
                    }
                    else {

                        $('#cantidad_ninnos2a12').html('');
                        $('#cantidad_ninnos0a2').html('');
                        $('#cantidad_ninnos2a12').append("<option value=''>"
                            + "--Seleccionar--" + "</option>");
                        for (i = 0; i <= 3; i++) {
                            $('#cantidad_ninnos2a12').append("<option value='" + i + "'>"
                                + i + "</option>");
                        }
                        $('#cantidad_ninnos0a2').append("<option value=''>"
                            + "--Seleccionar--" + "</option>");
                        for (i = 0; i <= 2; i++) {
                            $('#cantidad_ninnos0a2').append("<option value='" + i + "'>"
                                + i + "</option>");
                        }
                    }
                    break;
                case 'Doble':
//llenar combo cantidad de adultos
                    $('#cantidad_adultos').html('');
                    $('#cantidad_adultos').append("<option value=''>"
                        + "--Seleccionar--" + "</option>");
                    for (i = 1; i <= 2; i++) {
                        $('#cantidad_adultos').append("<option value='" + i + "'>"
                            + i + "</option>");
                    }


                    $('#cantidad_ninnos0a2').html('');
                    $('#cantidad_ninnos0a2').append("<option value=''>"
                        + "--Seleccionar--" + "</option>");
                    for (i = 0; i <= 2; i++) {
                        $('#cantidad_ninnos0a2').append("<option value='" + i + "'>"
                            + i + "</option>");
                    }
                    $('#cantidad_ninnos2a12').html('');
                    $('#cantidad_ninnos2a12').append("<option value=''>"
                        + "--Seleccionar--" + "</option>");
                    if (oferta['variante2adultos_2hasta3ninnos_2a12annos']) {

                        for (i = 0; i <= 3; i++) {
                            $('#cantidad_ninnos2a12').append("<option value='" + i + "'>"
                                + i + "</option>");
                        }
                    }
                    else {
                        for (i = 0; i <= 2; i++) {
                            $('#cantidad_ninnos2a12').append("<option value='" + i + "'>"
                                + i + "</option>");
                        }
                    }
                    break;

                case 'Triple':
//llenar combo cantidad de adultos
                    $('#cantidad_adultos').html('');
                    $('#cantidad_adultos').append("<option value=''>"
                        + "--Seleccionar--" + "</option>");
                    for (i = 1; i <= 3; i++) {
                        $('#cantidad_adultos').append("<option value='" + i + "'>"
                            + i + "</option>");
                    }
// llenar combo cantidad de niños de 2 a 12
                    $('#cantidad_ninnos2a12').html('');
                    $('#cantidad_ninnos2a12').append("<option value='0'>0</option>");
                    $('#cantidad_ninnos0a2').append("<option value='0'>0</option>");
                    break;
            }
            $('#cantidad_adultos').prop('disabled', false);
            $('#cantidad_ninnos2a12').prop('disabled', false);
            $('#cantidad_ninnos0a2').prop('disabled', false);
        }
        else {

            $('#cantidad_adultos').html('');
            $('#cantidad_ninnos2a12').html('');
            $('#cantidad_ninnos0a2').html('');
            $('#cantidad_adultos').prop('disabled', true);
            $('#cantidad_ninnos2a12').prop('disabled', true);
            $('#cantidad_ninnos0a2').prop('disabled', true);
        }

    }

    $('#tipo_habitacion').on('change', function () {
        var fecha = $('#fecha_entrada').val();
        let oferta = getOferta(fecha)[0];

        var tipo_habitacion = document.getElementById('tipo_habitacion');
        if (tipo_habitacion.value != '') {

            switch ($('#tipo_habitacion').val()) {
                case 'Sencilla':
//llenar combo cantidad de adultos
                    $('#cantidad_adultos').html('');
                    $('#cantidad_adultos').append("<option value=''>"
                        + "--Seleccionar--" + "</option>");
                    $('#cantidad_adultos').append("<option value='1'>"
                        + "1" + "</option>");

// llenar combo cantidad de niños de 2 a 12
                    $('#cantidad_ninnos2a12').html('');

                    if (oferta['variante1adulto_mismahabitacion']) {
                        $('#cantidad_ninnos2a12').append("<option value='0'>0</option>");
                        $('#cantidad_ninnos0a2').append("<option value='0'>0</option>");
                    }
                    else {

                        $('#cantidad_ninnos2a12').html('');
                        $('#cantidad_ninnos0a2').html('');
                        $('#cantidad_ninnos2a12').append("<option value=''>"
                            + "--Seleccionar--" + "</option>");
                        for (i = 0; i <= 3; i++) {
                            $('#cantidad_ninnos2a12').append("<option value='" + i + "'>"
                                + i + "</option>");
                        }
                        $('#cantidad_ninnos0a2').append("<option value=''>"
                            + "--Seleccionar--" + "</option>");
                        for (i = 0; i <= 2; i++) {
                            $('#cantidad_ninnos0a2').append("<option value='" + i + "'>"
                                + i + "</option>");
                        }
                    }
                    break;
                case 'Doble':
//llenar combo cantidad de adultos
                    $('#cantidad_adultos').html('');
                    $('#cantidad_adultos').append("<option value=''>"
                        + "--Seleccionar--" + "</option>");
                    for (i = 1; i <= 2; i++) {
                        $('#cantidad_adultos').append("<option value='" + i + "'>"
                            + i + "</option>");
                    }


                    $('#cantidad_ninnos0a2').html('');
                    $('#cantidad_ninnos0a2').append("<option value=''>"
                        + "--Seleccionar--" + "</option>");
                    for (i = 0; i <= 2; i++) {
                        $('#cantidad_ninnos0a2').append("<option value='" + i + "'>"
                            + i + "</option>");
                    }
                    $('#cantidad_ninnos2a12').html('');
                    $('#cantidad_ninnos2a12').append("<option value=''>"
                        + "--Seleccionar--" + "</option>");
                    if (oferta['variante2adultos_2hasta3ninnos_2a12annos']) {

                        for (i = 0; i <= 3; i++) {
                            $('#cantidad_ninnos2a12').append("<option value='" + i + "'>"
                                + i + "</option>");
                        }
                    }
                    else {
                        for (i = 0; i <= 2; i++) {
                            $('#cantidad_ninnos2a12').append("<option value='" + i + "'>"
                                + i + "</option>");
                        }
                    }
                    break;

                case 'Triple':
//llenar combo cantidad de adultos
                    $('#cantidad_adultos').html('');
                    $('#cantidad_adultos').append("<option value=''>"
                        + "--Seleccionar--" + "</option>");
                    for (i = 1; i <= 3; i++) {
                        $('#cantidad_adultos').append("<option value='" + i + "'>"
                            + i + "</option>");
                    }
// llenar combo cantidad de niños de 2 a 12
                    $('#cantidad_ninnos2a12').html('');
                    $('#cantidad_ninnos2a12').append("<option value='0'>0</option>");
                    $('#cantidad_ninnos0a2').append("<option value='0'>0</option>");
                    break;
            }
            $('#cantidad_adultos').prop('disabled', false);
            $('#cantidad_ninnos2a12').prop('disabled', false);
            $('#cantidad_ninnos0a2').prop('disabled', false);
        }
        else {

            $('#cantidad_adultos').html('');
            $('#cantidad_ninnos2a12').html('');
            $('#cantidad_ninnos0a2').html('');
            $('#cantidad_adultos').prop('disabled', true);
            $('#cantidad_ninnos2a12').prop('disabled', true);
            $('#cantidad_ninnos0a2').prop('disabled', true);
        }
    });

    //Metodo para calculo de total de pago
    function totalPago(oferta) {

        let total_precio = 0;
        let tipo_hab = $('#tipo_habitacion').val();
        var cant_adultos = $('#cantidad_adultos').val();
        var precio_ninnos_2a12 = $('#cantidad_ninnos2a12').val();
        if ($('#cantidad_adultos').val() == "") {
            cant_adultos = 0;
        }

        if ((oferta[0]['variante2adultos_hasta2ninnos_2a12annos'] || oferta[0]['variante2adultos_2hasta3ninnos_2a12annos']) && tipo_hab == "Doble") {

            if (precio_ninnos_2a12 == 3) {
                total_precio = parseInt(oferta[0]['precio_adulto_variante2adultos_2hasta3ninnos']) * cant_adultos;
            }
            else {
                total_precio = parseInt(oferta[0]['precio_adulto_variante2adultos']) * cant_adultos;
            }

            if (precio_ninnos_2a12 == 1) {

                total_precio += parseInt(oferta[0]['precio_1er_ninno_variante2adultos']);

            }
            if (precio_ninnos_2a12 == 2) {
                total_precio += parseInt(oferta[0]['precio_2do_ninno_variante2adultos']);
            }
            if (precio_ninnos_2a12 == 3) {
                total_precio += parseInt(oferta[0]['precio_2do_ninno_variante2adultos']);
            }
        }
        if ((oferta[0]['variante1adulto_hasta3ninnos_2a12annos'] || oferta[0]['variante1adulto_mismahabitacion']) && tipo_hab == "Sencilla") {

            if (precio_ninnos_2a12 == 0 && oferta[0]['variante1adulto_mismahabitacion']) {
                total_precio = parseInt(oferta[0]['precio_adulto_variante1adulto_mismahabitacion']) * cant_adultos;
            }
            else {
                total_precio = parseInt(oferta[0]['precio_adulto_variante1adulto']) * cant_adultos;
            }


            if (precio_ninnos_2a12 == 1) {
                total_precio += parseInt(oferta[0]['precio_1er_ninno_variante1adulto']);
            }
            if (precio_ninnos_2a12 == 2) {
                total_precio += parseInt(oferta[0]['precio_2do_ninno_variante1adulto']);
            }
            if (precio_ninnos_2a12 == 3) {
                total_precio += parseInt(oferta[0]['precio_3er_ninno_variante1adulto']);
            }

        }

        if (oferta[0]['variante3adultos_mismahabitacion'] && tipo_hab == "Triple") {
            total_precio = parseInt(oferta[0]['precio_adulto_variante3adultos_mismahabitacion']) * cant_adultos;
        }


        $('#total_pago_habitacion_datos').html('Total a pagar ' + total_precio + ' USD');
        return total_precio;
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

    //Metodo para validar las fechas de la oferta
    function validarFechas(oferta) {

        var dias_antelacion_reserva = $('#dias_antelacion').val();
        var fecha_inicio = new Date(oferta[0]['fecha_inicio'] + 'T00:00:00');
        var fecha_fin = new Date(oferta[0]['fecha_fin'] + 'T00:00:00');
        var fecha_entrada = new Date($('#fecha_entrada').val() + 'T00:00:00');
        var result = true;


        let fecha_fin_dias_antelacion = fecha_fin.setDate(fecha_fin.getDate() - dias_antelacion_reserva);

        if ((fecha_inicio <= fecha_entrada) && (fecha_entrada <= fecha_fin_dias_antelacion)) {
            $('#fecha_entrada').removeClass('is-invalid');

// var fecha_actual = new Date();
//
//   fecha_entrada = new Date(fecha_entrada + 'T00:00:00');
//
//  var diferencia = fecha_entrada - fecha_actual;
//  var resultado = Math.round(diferencia / (1000 * 60 * 60 * 24));
//  console.log(dias_antelacion_reserva)
//  console.log(resultado)

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

    //Metodo para limpiar los campos del formulario Datos de los clientes
    function limpiarCamposDatos() {
        $("#nombre").val('');
        $("#numero_pasaporte").val('');
        $("#fecha_nacimiento").val('');
        $("#nacionalidad_id").val('').trigger('change');
    }

    //Metodo para limpiar los campos del formulario habitaciones
    function limpiarCamposHabitacion() {
// $('#addform1')[0].reset();
        $("#fecha_entrada").val('');
        $("#req_especiales").val('');
        $("#tipo_habitacion").html('');
        $("#tipo_habitacion").prop('disabled', true);
        $("#cantidad_adultos").html('');
        $("#cantidad_adultos").prop('disabled', true);
        $("#cantidad_noche").val('').trigger('change');
        $("#cantidad_ninnos2a12").html('');
        $("#cantidad_ninnos2a12").prop('disabled', true);
        $("#cantidad_ninnos0a2").html('');
        $("#cantidad_ninnos0a2").prop('disabled', true);
        $('#total_pago_habitacion_datos').html('Total a pagar 0 USD');
    }

    //Metodo para obtener los Datos de la tabla de Datos de los Clientes
    function getTableDatos() {
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

    //Metodo para obtener los Datos de la tabla de habitaciones
    function getTableHabitaciones() {
        var array = [];
        var header = [];
        $('#listado_habitaciones th').each(function (index, item) {
            header[index] = $(item).html();
        })

        $('#listado_habitaciones tr').has('td').each(function () {
            var arrayItem = {};
            $('td', $(this)).each(function (index, item) {
                arrayItem[header[index]] = $(item).html();
            });

            array.push(arrayItem);
        });
        return array;
    }

    //Metodo para Mostrar los errores en pantalla cuando vienen del FormRequest del Controlador
    function showErrors(key, value) {
// console.log(key+":"+value)
        $('#' + key).addClass('is-invalid');
        $('#error_' + key).html('');
        $('#error_' + key).append(value);
    }

    //Metodo para limpiar los rrrores en pantalla cuando vienen del FormRequest del Controlador
    function cleanErrors() {
        $('#fecha_entrada').removeClass('is-invalid');
        $('#error_fecha_entrada').html('');
        $('#tipo_habitacion').removeClass('is-invalid');
        $('#error_tipo_habitacion').html('');
        $('#cantidad_noche').removeClass('is-invalid');
        $('#error_cantidad_noche').html('');
        $('#cantidad_adultos').removeClass('is-invalid');
        $('#error_cantidad_adultos').html('');
        $('#cantidad_ninnos2a12').removeClass('is-invalid');
        $('#error_cantidad_ninnos2a12').html('');
        $('#cantidad_ninnos0a2').removeClass('is-invalid');
        $('#error_cantidad_ninnos0a2').html('');
        $('#req_especiales').removeClass('is-invalid');
        $('#error_req_especiales').removeClass('is-invalid');
    }

    //Metodo para llenar la tabla de datos al modificar
    function llenarTablaDatos(personas) {
        personas.forEach(function (persona, i) {
// console.log(persona);
            var fila = '<tr class="selected" id="fila' + i + '" onclick="seleccionar(this.id); ">' +
                '<td hidden >' + i + '</td><td>' + persona.nombre + '</td><td>' + persona.fecha + '</td><td id="fila_pasaporte">' + persona.pasaporte + '</td><td id="' + persona.nacionalidad + '" >' + countries[persona.nacionalidad] + '</td></tr>';
            $('#listado_datos_clientes ').append(fila);
        });
    }

    //Metodo para mostrar la ofertas disponibles
    function mostrarOfertasDisponibles() {
        var a = '';
        $.each(pax, function (i, item) {

            a += '<li>Desde ' + item['fecha_inicio'] + ' Hasta ' + item['fecha_fin'] + ' </li>';

        })
        $('#ofertas_disponibles').html('');
        $('#ofertas_disponibles').append(
            '<div class="alert alert-info alert-dismissible">' +
            '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' +
            '<h5><i class="icon fas fa-check"></i> Para este hotel hay ofertas disponibles:</h5>' +
            '<ul>' + a + '</ul><br><p>NOTA: Para estas ofertas solo puede reservar con ' + $('#dias_antelacion').val() + ' días de antelación</p></div>'
        );
    }

    //Metodo para reordenar elementos de la tabla de los datos de los clientes
    function reordenar() {
        var num = 0;
        $('#listado_datos_clientes tbody tr').each(function () {
            if (personas.length > 0) {
// console.log(getNumRows());
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

    //Metodo para valida que el numero de pasaporte sea unico
    function valid_passport() {
        var pasaporte = $('#numero_pasaporte').val();
        var result = true;
        var data = getTableDatos();
        $.each(data, function (i, item) {
            if (item['No. Pasaporte'] === pasaporte)
                result = false;
        });
        return result;
    }

    //Obtener id de la fila de la tabla de los datos de los clientes
    function getNumRows() {
        var num = 0;
        $('#listado_datos_clientes tbody tr').each(function () {
            num++;
        });
        return num;
    }

    //Metodo para validar que haya elementos en la tabla de los datos de los clientes
    function validateAll() {
        var fecha = $('#fecha_entrada').val();
        var tipoHabitacion = $('#tipo_habitacion').val();
        let result = [];

        if (fecha) {
            var oferta = getOferta(fecha);

            result['status'] = true;
            result['message'] = 'OK';

            if (personas.length < 1) {
                result ['status'] = false;
                result ['message'] = '   Debe adicionar los datos relacionados a los clientes';
            }
            else if (!validarFechas(oferta)) {
                result ['status'] = false;
                result ['message'] = '   Para la fecha seleccionada no se puede reservar';
            }
            else if (!validarCapacidad(fecha, tipoHabitacion)) {
                result ['status'] = false;
                result ['message'] = '   Se exedió la capacidad de este tipo de habitación para esta oferta.';
            }
        } else {
            result ['status'] = false;
            result ['message'] = '   Debe seleccionar al menos una fecha en la pestaña habitaciones';
            $('#fecha_entrada').addClass('is-invalid');
        }

        return result;
    }

    //Metodo para validar que campos obligatorio del formulario de datos del cliente
    function validateDatosClientes() {
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
    function validateDatosClientes() {
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

    //Metodo para validar que haya elementos en la tabla de los datos de los clientes
    function validarCantidadPersonas() {
        var adultos = $('#cantidad_adultos').val();
        var ninos212 = $('#cantidad_ninnos2a12').val();
        var ninos02 = $('#cantidad_ninnos0a2').val();
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

    //Metodo para validar capacidad disponibles por tipo de habitacion
    function validarCapacidad(fecha, tipoHab) {
        let result = true;
        pax.forEach(function (px) {
            if (px.fecha_inicio <= fecha && px.fecha_fin >= fecha) {
                switch (tipoHab) {
                    case 'Doble':
                        let capacidadDobles = px.cantidad_hab_dobles;
                        let cantidadDoblesReservadas = habitaciones.filter(hab => hab.tipoHabitacion == 'Doble');
                        if (capacidadDobles <= cantidadDoblesReservadas) {
                            result = false;
                        }
                        else result = true;
                        break;
                    case 'Sencilla':
                        let capacidadSencillas = px.cantidad_hab_sencillas;
                        let cantidadSencillasReservadas = habitaciones.filter(hab => hab.tipoHabitacion == 'Sencilla');
                        if (capacidadSencillas <= cantidadSencillasReservadas) {
                            result = false;
                        }
                        else result = true;
                        break;
                    case 'Triple':
                        let capacidadTriples = px.cantidad_hab_sencillas;
                        let cantidadTriplesReservadas = habitaciones.filter(hab => hab.tipoHabitacion == 'Triple');
                        if (capacidadTriples <= cantidadTriplesReservadas) {
                            result = false;
                        }
                        else result = true;
                        break;
                }
            }
        });
        return result;
    }

    //Metodo para validar que campos obligatorio del formulario de Habitacion
    function validateDatosHabitacion() {
        var a = 1;
        var cantida_adultos = document.getElementById('cantidad_adultos');
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
        if ($('#tipo_habitacion').val() == "") {
            $('#tipo_habitacion').addClass('is-invalid');

            $('#error_tipo_habitacion').html('');
            $('#error_tipo_habitacion').append('El campo tipo de habitación es obligatorio');
            a = 0;
        }
        else {
            $('#tipo_habitacion').removeClass('is-invalid');
            $('#error_tipo_habitacion').html('');
        }
        if ($('#cantidad_noche').val() == "") {
            $('#cantidad_noche').addClass('is-invalid');

            $('#error_cantidad_noche').html('');
            $('#error_cantidad_noche').append('El campo cantidad de noches es obligatorio');
            a = 0;
        }
        else {
            $('#cantidad_noche').removeClass('is-invalid');
            $('#error_cantidad_noche').html('');
        }
        if ($('#cantidad_ninnos2a12').val() == "") {
            $('#cantidad_ninnos2a12').addClass('is-invalid');

            $('#error_cantidad_ninnos2a12').html('');
            $('#error_cantidad_ninnos2a12').append('El campo cantidad de niños (2-12 años) es obligatorio');
            a = 0;
        }
        else {
            $('#cantidad_ninnos2a12').removeClass('is-invalid');
            $('#error_cantidad_ninnos2a12').html('');
        }
        if ($('#req_especiales').val() == "") {
            $('#req_especiales').addClass('is-invalid');

            $('#req_especiales').html('');
            $('#req_especiales').append('El campo requerimientos especiales es obligatorio');
            a = 0;
        }
        else {
            $('#req_especiales').removeClass('is-invalid');
            $('#error_req_especiales').html('');
        }
        if ($('#cantidad_ninnos0a2').val() == "") {
            $('#cantidad_ninnos0a2').addClass('is-invalid');

            $('#error_cantidad_ninnos0a2').html('');
            $('#error_cantidad_ninnos0a2').append('El campo cantidad de niños (0-2 años) es obligatorio');
            a = 0;
        }
        else {
            $('#cantidad_ninnos0a2').removeClass('is-invalid');
            $('#error_cantidad_ninnos0a2').html('');
        }
        if ($('#cantidad_adultos').val() == "" && document.getElementById("cantidad_adultos").disabled == false) {
            $('#cantidad_adultos').addClass('is-invalid');

            $('#error_cantidad_adultos').html('');
            $('#error_cantidad_adultos').append('El campo cantidad de niños (0-2 años) es obligatorio');
            a = 0;
        }
        else {
            $('#cantidad_adultos').removeClass('is-invalid');
            $('#error_cantidad_adultos').html('');
        }

        if (a)
            return true;
    }
</script>