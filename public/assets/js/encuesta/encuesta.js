/**
 * template para añadir estrellas para definir rate.
 * @author lauren.dedeu
 * @type {string}
 */
let start_solid_template = '<button class="button_start_solid" type="button" data-value="%value"><i class="fas fa-star fa-2x start_solid"></i></button>';

let start_light_template = '<button class="button_start_light" type="button" data-value="%value"><i class="far fa-star fa-2x start_light"></i></button>';

/**
 * Document.ready
 */
$(document).ready(function () {

    /**
     * Para calcular el currentdate y setearlo al
     * date de la fecha.
     * @type {string}
     */
    let today = calculeToday();
    document.getElementById("date_id").setAttribute("max", today);

    /**
     * Función ajax para buscar tipos de productos
     */
    $('.ajax_product').change(function () {
        if ($('#product_type_id').val() > 0) {

            if (parseInt($('#product_type_id').val()) === 5 || parseInt($('#product_type_id').val()) === 7) {
                $('#product_id').prop('disabled', true);
            } else {
                $('#product_id').prop('disabled', false);
                let path = $('#utils_id').data('path');
                $.ajax({
                    url: path,
                    data: {id: $('#product_type_id').val()},
                    type: 'GET',
                    dataType: 'json',
                    success: function (response) {
                        let result = response;
                        $('#product_id').empty();
                        if (result.length > 0) {
                            $(result).each(function (i, temp) {
                                if (i === 0) {
                                    let option = new Option("Seleccione", "0", false, false);
                                    $('#product_id').append(option).trigger('change');
                                }
                                let option = new Option(temp.nombre, temp.id, false, false);
                                $('#product_id').append(option).trigger('change');
                            });
                        } else {
                            let option = new Option("No existen productos creados.", "0", false, false);
                            $('#product_id').append(option).trigger('change');
                        }
                    },
                    error: function (jqXHR, status, error) {

                    },
                    complete: function (jqXHR, status) {

                    }
                });
            }

            $('#tipoProductoDivID').removeClass('input_invalid');
            $('#span_id_type_of_invalid').attr('hidden', true);
        }
    });

    /**
     * Para cuando se le da click a los botones de como la pasó. (caritas)
     */
    $('.button_how_to_pass').click(function () {
        $('.button_how_to_pass').css('border', 'none');
        $(this).css('border', 'none');
        $(this).blur();
        $('#howToPassValueId').val($(this).data('value'));
        $(this).css('border', 'solid 3px');
        $('#how_to_pass_id').removeClass('input_invalid');
        $('#span_id_passed_invalid').attr('hidden', true);
    });

    /**
     * Cuando se le da click a los radiobuttons de las encuestas.
     */
    $('.button_survey').click(function () {

        $(this).css('background-color', '#DA2513');
        $(this).css('border-color', '#DA2513');
        $(this).blur();

        let question = $(this).attr('data-question');
        let value = $(this).attr('data-value');

        $('#survey_test_' + question).val(value);

        let buttons = $(this).closest('.col-md-4').siblings('.col-md-4');
        $(buttons).each(function (b, bTemp) {
            let button = $(bTemp).find('.button_survey');
            $(button).css('background-color', '#ffffff');
            $(button).css('border-color', 'inherit');
        });
    });

    $('form[name="surveyForm"]').submit(function (e) {
        if (!validateForm()) {
            e.preventDefault();
        }
    });

    /**
     * Evento focusout para input de tipo date.
     */
    $('#date_id').focusout(function () {
        if ($(this).val() !== null && $(this).val() !== "") {
            $('#date_div_id').removeClass('input_invalid');
            $('#span_id_date_invalid').attr('hidden', true);
        }
    });

    /**
     * Evento change de select producto.
     */
    $('#product_id').change(function () {
        if ($(this).val() > 0) {
            $('#producto_div_id').removeClass('input_invalid');
            $('#span_id_product_invalid').attr('hidden', true);
        }
    });

    /**
     * Evento focusout en los radiobutton de las encuestas.
     */
    $('.button_survey').focusout(function () {
        $('#container_survey_id' + questionsArray[i].id).removeClass('input_invalid');
        $('#span_id_survey_invalid_' + questionsArray[i].id).attr('hidden', true);
    });

    /**
     * Click en botón Cancelar, para levantar modal.
     */
    $('#reset_id').click(function () {
        $('#cancel-modal').modal('toogle');
    });

});

/**
 * Función para añadir rate para la evaluación del producto.

 * @uthor lauren.dedeu
 * @param rateValueSelected valor seleccionado para la clasificación.
 */
function addRate(rateValueSelected) {

    let rateValue = $('#id_rate_container').attr('data-value');

    $('#id_rate_container').empty();

    if (parseInt(rateValueSelected) === 1 && parseInt(rateValueSelected) === parseInt(rateValue)) {

        for (let j = 1; j < 6; j++) {
            $('#id_rate_container').append(start_light_template.substring(-1).replace("%value", j));
        }

        $('#id_rate_container').removeAttr('data-value');
        $('#id_rate_container').attr('data-value', 0);
        $('#rateValueId').val(0);
    } else {
        for (let i = 1; i <= parseInt(rateValueSelected); i++) {
            $('#id_rate_container').append(start_solid_template.substring(-1).replace("%value", i));
        }

        if (parseInt(rateValueSelected) < 5) {
            for (let j = parseInt(rateValueSelected) + 1; j < 6; j++) {
                $('#id_rate_container').append(start_light_template.substring(-1).replace("%value", j));
            }
        }
        $('#id_rate_container').removeAttr('data-value');
        $('#id_rate_container').attr('data-value', parseInt(rateValueSelected));
        $('#rateValueId').val(parseInt(rateValueSelected));
    }

    /**
     * Al seleccionar una estrella hay que identificar el valor que tiene el radiobutton
     * para seleccionar o deseleccionar estrellas.
     *
     * Seleccionar es mostrar las estrellas solidas.
     * Deseleccionar es mostrar las estrellas light.
     *
     */
    $('.button_start_light').click(function () {
        let rateValueSelected = $(this).attr('data-value');
        addRate(rateValueSelected);
        if (parseInt($('#rateValueId').val()) !== 1 && rateValueSelected !== 1) {
            $('#id_rate_container').removeClass('input_invalid');
            $('#span_id_rating_invalid').attr('hidden', true);
        }
    });

    $('.button_start_solid').click(function () {
        let rateValueSelected = $(this).attr('data-value');
        addRate(rateValueSelected);
        if (parseInt($('#rateValueId').val()) !== 1 && rateValueSelected !== 1) {
            $('#id_rate_container').removeClass('input_invalid');
            $('#span_id_rating_invalid').attr('hidden', true);
        }
    });
}

/**
 * Función para calcular el
 * current date.
 * @author lauren.dedeu
 *  @returns {string}
 */
function calculeToday() {
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth() + 1;
    var yyyy = today.getFullYear();
    if (dd < 10) {
        dd = '0' + dd
    }
    if (mm < 10) {
        mm = '0' + mm
    }

    return today = yyyy + '-' + mm + '-' + dd;
}

/**
 * Función para validar formulario.
 * @author lauren.dedeu
 */
function validateForm() {

    let valid = true;

    //CAMPO FECHA
    if ($('#date_id').val() === null || $('#date_id').val() === "") {
        $('#date_div_id').addClass('input_invalid');
        $('#span_id_date_invalid').removeAttr('hidden');
        $('#date_id').focus();
        return false;
    } else {
        $('#date_div_id').removeClass('input_invalid');
        $('#span_id_date_invalid').attr('hidden', true);
    }

    //CAMPO COMO LA PASO
    if ($('#howToPassValueId').val() === null || $('#howToPassValueId').val() === "") {
        $('#how_to_pass_id').addClass('input_invalid');
        $('#span_id_passed_invalid').removeAttr('hidden');
        $('#date_id').focus();
        return false;
    } else {
        $('#how_to_pass_id').removeClass('input_invalid');
        $('#span_id_passed_invalid').attr('hidden', true);
    }

    //CAMPO TIPO DE PRODUCTO
    if ($('#product_type_id').val() === null || $('#product_type_id').val() === ""
        || $('#product_type_id').val() === "0") {
        $('#tipoProductoDivID').addClass('input_invalid');
        $('#span_id_type_of_invalid').removeAttr('hidden');
        $('#product_type_id').focus();
        return false;
    } else {
        $('#tipoProductoDivID').removeClass('input_invalid');
        $('#span_id_type_of_invalid').attr('hidden', true);
    }

    //CAMPO PRODUCTO
    if ($('#product_type_id').val() !== "5" && $('#product_type_id').val() !== "7") {
        if ($('#product_id').val() === null || $('#product_id').val() === ""
            || $('#product_id').val() === "0") {
            $('#producto_div_id').addClass('input_invalid');
            $('#span_id_product_invalid').removeAttr('hidden');
            $('#product_id').focus();
            return false;
        } else {
            $('#producto_div_id').removeClass('input_invalid');
            $('#span_id_product_invalid').attr('hidden', true);
        }
    }

    //CAMPO EVALUACION
    if (parseInt($('#rateValueId').val()) === 0) {
        $('#id_rate_container').addClass('input_invalid');
        $('#span_id_rating_invalid').removeAttr('hidden');
        $('#product_id').focus();
        return false;
    } else {
        $('#id_rate_container').removeClass('input_invalid');
        $('#span_id_rating_invalid').attr('hidden', true);
    }

    //VALIDACION DE LAS PREGUNTAS
    let questionsArray = $('#utils_id').data('json_questions');
    if (questionsArray.length > 0) {

        for (let i = 0; i <= questionsArray.length; i++) {

            if ($('#survey_test_' + questionsArray[i].id).val() === null ||
                $('#survey_test_' + questionsArray[i].id).val() === "") {
                $('#container_survey_id_' + questionsArray[i].id).addClass('input_invalid');
                $('#span_id_survey_invalid__' + questionsArray[i].id).removeAttr('hidden');
                $('.button_survey').focus();
                return false;
            }
        }
    }

    return valid;
}

/**
 * Ejecutar clasificación por primera vez.
 */
addRate(0);

// window.location = $('.selected-product').data('all')

