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
        <img src="{{asset('assets/img/productos, viaje a la medida.png')}}">
    </div>
    @include('layouts.fronts.botonesproductos')
    <div class="row col-md-12 mb-2" id="bloques1">
        <div class="col-md-12">
            <h4 class="mb-3" align="center" style="color: #DA2513">!Registre los datos para su reserva!</h4>
        </div>
        <div class="no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-230 position-relative"
             style="margin-top: 20px;margin: auto">
            <div class="col p-4 d-flex flex-column position-static ">
                <form id="addform" role="form" method="post" enctype="multipart/form-data"
                      action="{{ route('home.reserva-viajes-medida',$viajesmedida->id)}}">
                    @csrf
                    <div class="row mb-2 " id="bloques1">
                        <div class="col-md-12">
                            <script>
                                var pax = [];
                                var dias_antelacion = [];
                                @foreach ($preciopaxviajesmedida as $p )
                                pax.push(@json($p));
                                @endforeach

                                @foreach ($diasantelacionreservas as $dias )
                                dias_antelacion.push(@json($dias));
                                @endforeach
                            </script>
                            <div class="row" style="margin-bottom: 50px;">
                                <div class="col-md-12 mb-4">
                                    <div name="ofertas_disponibles" id="ofertas_disponibles">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="form-group @error('fecha') has-error @enderror">
                                        <label>Fecha Entrada:
                                            <small class="required" style="color: red"> *</small>
                                        </label>
                                        {{--  <input type="hidden" value="{{$dias_antelacion->dias}}" name="dias_antelacion"
                                                 id="dias_antelacion">--}}
                                        <input type="date" class="form-control @error('fecha') is-invalid @enderror"
                                               name="fecha" min="{{  date('Y-m-d')}}" id="fecha" placeholder="Fecha Entrada">
                                        <span class=" invalid-feedback" id="error_fecha"></span>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="form-group @error('nombre') has-error @enderror">
                                        <label>Nombre y Apellidos:
                                            <small class="required" style="color: red"> *</small>
                                        </label>
                                        <input type="text" class="form-control @error('nombre') is-invalid @enderror"
                                               name="nombre" id="nombre" placeholder="Nombre y Apellidos">
                                        <span class=" invalid-feedback" id="error_nombre"></span>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="form-group @error('email') has-error @enderror">
                                        <label>Email:
                                            <small class="required" style="color: red"> *</small>
                                        </label>
                                        <input type="text" class="form-control @error('email') is-invalid @enderror"
                                               name="email" id="email" placeholder="Email">
                                        <span class=" invalid-feedback" id="error_email"></span>

                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="form-group @error('cantidad_adultos') has-error @enderror">
                                        <label for="cantidad_adultos">Cantidad de Adultos:
                                            <small class="required" style="color: red"> *</small>
                                        </label>
                                        <input type="text"
                                               class="form-control @error('cantidad_adultos') is-invalid @enderror"
                                               id="cantidad_adultos" name="cantidad_adultos"
                                               placeholder="Cantidad de Adultos" disabled onkeypress="return validarNumeros(event)">
                                        <span class=" invalid-feedback" id="error_cantidad_adultos"></span>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="form-group @error('cantidad_ninnos2a12') has-error @enderror">
                                        <label for="cantidad_ninnos2a12">Cantidad de niños (2-12 años):
                                            <small class="required" style="color: red"> *</small>
                                        </label>
                                        <input class="form-control @error('cantidad_ninnos2a12') is-invalid @enderror"
                                               name="cantidad_ninnos2a12" id="cantidad_ninnos2a12"
                                               placeholder="Cantidad de niños (2-12 años)" disabled onkeypress="return validarNumeros(event)">
                                        <span class=" invalid-feedback" id="error_cantidad_ninnos2a12"></span>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="form-group  @error('cantidad_ninnos0a2') has-error @enderror">
                                        <label for="cantidad_ninnos0a2">Cantidad de infante (0-2 años):
                                            <small class="required" style="color: red"> *</small>
                                        </label>
                                        <input class="form-control @error('cantidad_ninnos0a2') is-invalid @enderror"
                                               name="cantidad_ninnos0a2" id="cantidad_ninnos0a2"
                                               placeholder="Cantidad de infante (0-2 años)" disabled onkeypress="return validarNumeros(event)">
                                        <span class=" invalid-feedback" id="error_cantidad_ninnos0a2"></span>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="req_especiales">Requerimientos especiales:</label>
                                        <textarea name="req_especiales" class="form-control @error('req_especiales') is-invalid @enderror" id="req_especiales"
                                                  style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;overflow-y: scroll"
                                                  placeholder="Requerimientos especiales">{{ old('req_especiales') }}</textarea>
                                        <span class=" invalid-feedback" id="error_req_especiales"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row col-md-12">
                                <input type="hidden" id="precio_total" name="precio_total" value="0">
                                <a class="btn btn-light botonestotalpago" id="btn_total_pago_viaje_medida"
                                   name="btn_total_pago_viaje_medida"
                                   style="background: #DA2513;color: #fff;">Total a pagar
                                    0
                                    USD</a>
                                <ul class="list-inline   ml-auto">
                                    <li class="list-inline-item mb-2">
                                        <a href="{{ route('home.detalle-viajes-medida',$viajesmedida->id)}}"
                                           type="button" class="btn btn-light botones"
                                           style="background: #fff;color: #2A4660;border-color: #2A4660">Cancelar</a>
                                    </li>
                                    <li class="list-inline-item mb-2">
                                        <a type="submit" id="btn_reservar_viaje_medida" class="btn botones"
                                           style="background: #DA2513;color: #fff;">Reservar</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('jscript')
    <script type="text/javascript">

        $(document).ready(
            mostrarOfertasDisponibles(),
        );

        //Evento para la validacion de las ofertas de reservacion en dependencia de la fecha de entrada
        $('#fecha').on('input', function () {
            var fecha = $('#fecha').val();
            if (validarOfertasViajesMedida(fecha)) {
                var oferta = getOfertaViajesMedida(fecha);
                if (validarFechasViajesMedida(oferta)) {
                    $('#cantidad_ninnos2a12').prop('disabled', false);
                    $('#cantidad_ninnos0a2').prop('disabled', false);
                    $('#cantidad_adultos').prop('disabled', false);
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
                $('#fecha').val('');
            }
        })

        $('#btn_reservar_viaje_medida').on('click', function (event) {
            event.preventDefault();
            var form = $(this).parents('form');
            var url = form.attr('action');
            var dataformulario = $('form').get(0);

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
                        limpiarDatos();
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

        //Metodo para validar solo numeros en campos de tipo texto
        function validarNumeros(event) {
            if (event.charCode>=48 && event.charCode<=57) {
                return true;
            }
            return false;
        }

        //Validar que la fecha de entrada se corresponda con el rango de fechas de la oferta
        function validarOfertasViajesMedida(fecha) {
            var result = false;
            $.each(pax, function (i, item) {

                if (item['fecha_inicio'] <= fecha && item['fecha_fin'] >= fecha) {
                    result = true;
                }

            });

            return result;
        }

        //Metodo para obtener las ofertas que esten en el rango de la temporada por una fecha de entrada definida por el usuario
        function getOfertaViajesMedida(fecha) {
            var oferta = [];
            $.each(pax, function (i, item) {
                if ((item['fecha_inicio'] <= fecha) && (item['fecha_fin'] >= fecha)) {
                    oferta.push(item);
                }
            });
            console.log(oferta);
            return oferta;
        }

        //Metodo para validar las fechas de la oferta
        function validarFechasViajesMedida(oferta) {

            var dias_antelacion_reserva = 0;
            $.each(oferta, function (i, item) {
                $.each(dias_antelacion, function (j, item1) {
                    if (item['dias_antelacion_rese_id'] == item1['id']) {
                        dias_antelacion_reserva = item1['dias'];
                    }
                })
            });

            var fecha_inicio = new Date(oferta[0]['fecha_inicio'] + 'T00:00:00');
            var fecha_fin = new Date(oferta[0]['fecha_fin'] + 'T00:00:00');
            var fecha_entrada = new Date($('#fecha').val() + 'T00:00:00');
            var result = true;

            let fecha_fin_dias_antelacion = fecha_fin.setDate(fecha_fin.getDate() - dias_antelacion_reserva);


            if ((fecha_inicio <= fecha_entrada) && (fecha_entrada <= fecha_fin_dias_antelacion)) {
                $('#fecha').removeClass('is-invalid');

            }
            else {
                swal.fire({
                    toast: true,
                    class: 'bg-danger',
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 4500,
                    type: 'error',
                    title: 'Para la fecha seleccionada las reservas del viaje a la medida están acabadas no cumple con los días de antelacion definadas para la reserva.',
                });

                $('#fecha').val('');
                $('#fecha').addClass('is-invalid');
                result = false;
            }
            return result;
        }

        $('#cantidad_adultos').on('input', function () {
            var fecha = $('#fecha').val()
            var oferta = getOfertaViajesMedida(fecha);
             totalPago(oferta);

        });

        $('#cantidad_ninnos2a12').on('input', function () {
            var fecha = $('#fecha').val()
            var oferta = getOfertaViajesMedida(fecha);
            totalPago(oferta);
        });

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

        //Metodo para calculo de total de pago
        function totalPago(oferta) {

            var cant_adultos = $('#cantidad_adultos').val();
            var cant_ninnos = $('#cantidad_ninnos2a12').val();

            if ($('#cantidad_adultos').val() == "") {
                cant_adultos = 0;
            }
            if ($('#cantidad_ninnos2a12').val() == "") {
                cant_ninnos = 0;
            }
            ;
            var valueinput = (cant_adultos * parseInt(oferta[0]['precio_x_pax'])) + (cant_ninnos * parseInt(oferta[0]['precio_ninnos_12annos']));
            $('#btn_total_pago_viaje_medida').text('Total a pagar ' + valueinput + ' USD');
            $('#precio_total').val(valueinput);
        }

        function limpiarDatos() {
            $('#addform')[0].reset();
        }

        //Metodo para mostrar la ofertas disponibles
        function mostrarOfertasDisponibles() {
            var a = '';

            $.each(pax, function (i, item) {

                $.each(dias_antelacion, function (j, item1) {
                    if (item['dias_antelacion_rese_id'] == item1['id']) {
                        a += '<li>Desde ' + item['fecha_inicio'] + ' Hasta ' + item['fecha_fin'] + ' -----> NOTA: Para esta oferta solo puede reservar con ' + item1['dias']+ ' días de antelación</li>';
                    }
                })
            })
            $('#ofertas_disponibles').html('');
            $('#ofertas_disponibles').append(
                '<div class="alert alert-info alert-dismissible">' +
                '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' +
                '<h5><i class="icon fas fa-check"></i> Para este viaje a la medida hay ofertas disponibles:</h5>' +
                '<ul>' + a + '</ul></div>'
            );

            //<ul>' + a + '</ul><br><p>NOTA: Para estas ofertas solo puede reservar con ' + $('#dias_antelacion').val() + ' días de antelación</p>
        }

        //Metodo para mostrar la errores
        function showErrors(key, value) {
            // console.log(key+":"+value)
            $('#' + key).addClass('is-invalid');
            $('#error_' + key).html('');
            $('#error_' + key).append(value);
        }

        //Metodo para validar que haya elementos
        function validateAll() {
            var fecha = $('#fecha_entrada').val();
            let result = [];

            var oferta = getOfertaViajesMedida(fecha);

            result['status'] = true;
            result['message'] = 'OK';

            if (!validarFechasViajesMedida(oferta)) {
                result ['status'] = false;
                result ['message'] = '   Para la fecha seleccionada las reservas del viaje a la medida están acabadas no cumple con los días de antelacion definadas para la reserva.';
            }

            return result;
        }

    </script>
@endsection