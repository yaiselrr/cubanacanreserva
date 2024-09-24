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
    @inject('rutass','App\Services\Rutas')

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
            <form id="conectando_cuba" name="conectando_cuba" role="form" method="post"
                  enctype="multipart/form-data"
                  action="{{route('home.trasladosconectandocuba.store')}}">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4 mb-4">
                            <div class="form-group">
                                <label for="fecha_inicio" id="lblfecha_inicio">Fecha incio:
                                    <small class="required" style="color: red"> *</small>
                                </label>
                                <input type="date" class="form-control" min="{{ date('Y-m-d') }}"
                                       name="fecha_inicio" id="fecha_inicio" value="{{ old('fecha_inicio') }}"
                                       placeholder="Fecha de Entrada">
                                <span class=" invalid-feedback" id="error_fecha_inicio"></span>
                            </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <div class="form-group">
                                <label>Ruta Conectando Cuba:
                                    <small class="required" style="color: red"> *</small>
                                </label>
                                <select class="form-control select2bs4" id="ruta"
                                        name="ruta">

                                    @foreach($rutass->get() as $c => $ruta)
                                        <option value="{{$c}}" {{ old('ruta_id') == $c ? 'selected': '' }}>{{ $ruta }}</option>
                                    @endforeach
                                </select>
                                <script>


                                    var conectandospre = [];
                                    @foreach ($conectandos as $cc )
                                    conectandospre.push(@json($cc));
                                    @endforeach

                                </script>
                                <span class="invalid-feedback"
                                      id="error_ruta"></span>

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-4">
                            <div class="form-group">
                                <label>Origen:
                                    <small class="required" style="color: red"> *</small>
                                </label>
                                <select class="form-control select2bs4" id="provincia_origen"
                                        name="provincia_origen">
                                    <option value="">--Seleccione--</option>
                                    @foreach($provincias as $c)
                                        <option value="{{$c->id}}">{{$c->provincia}}</option>
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
                                <select class="form-control select2bs4" id="provincia_destino"
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
                                <label for="cantidadadultos">Cantidad de Adultos:
                                    <small class="required" style="color: red"> *</small>
                                </label>
                                <select type="text" class="form-control select2bs4" id="cantidad_adultos"
                                        name="cantidad_adultos">
                                    <option value="">--Seleccione--</option>
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
                                    <option value="">--Seleccione--</option>
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
                                    <option value="">--Seleccione--</option>
                                </select>

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-4">
                            <div class="form-group">
                                <label>Lugar de recogida:
                                    <small class="required" style="color: red"> *</small>
                                </label>
                                <select class="form-control select2bs4" id="lugar"
                                        name="lugar">
                                    <option value="">--Seleccione--</option>


                                </select>
                                <script>

                                    var lugaresrecogida = [];
                                    var conectandos = [];
                                    @foreach ($lugares as $l )
                                    lugaresrecogida.push(@json($l));
                                    @endforeach

                                </script>
                                <span class="invalid-feedback"
                                      id="error_lugar"></span>

                            </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <div class="form-group">
                                <label id="lblhorarecogida">Hora de recogida:
                                    <small class="required" style="color: red"> *</small>
                                </label>
                                <input type="text" class="form-control" id="hora_recogida"
                                       name="hora_recogida"
                                       placeholder="Hora">
                                <span class="invalid-feedback" id="error_hora_recogida"></span>

                            </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <div class="form-group">
                                <label id="lblpn">Precio Niños:
                                    <small class="required" style="color: red"> *</small>
                                </label>
                                <input type="text" class="form-control" disabled id="precion"
                                       name="precion"
                                       placeholder="">
                                <span class="invalid-feedback" id="error_email"></span>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-4">
                            <div class="form-group">
                                <label>Nombre y Apellidos del titular de la reserva:
                                    <small class="required" style="color: red"> *</small>
                                </label>
                                <input type="text" class="form-control" id="nombre"
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
                                <input type="email" class="form-control" id="email"
                                       name="email"
                                       placeholder="Email">
                                <span class="invalid-feedback" id="error_email"></span>
                            </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <div class="form-group">
                                <label id="lblpa">Precio Adulto:
                                    <small class="required" style="color: red"> *</small>
                                </label>
                                <input type="text" class="form-control" disabled id="precio"
                                       name="precio"
                                       placeholder="">
                                <span class="invalid-feedback" id="error_email"></span>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-4 mb-4">
                            <div class="form-group">
                                <label id="lblpf">Precio Final:
                                    <small class="required" style="color: red"> *</small>
                                </label>
                                <input type="text" class="form-control" id="preciof"
                                       name="preciof"
                                       placeholder="">
                                <span class="invalid-feedback" id="error_email"></span>
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
                    <button id="botonp" type="button" class="btn btn-danger" style="float: left">

                    </button>
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
        // alert("funciona")
        //document.getElementById("tagfecha_inicio").style.color = "orange";
        //document.getElementById("fecha_inicio").disabled = true;
        $("#fecha_inicio").val('');
        $("#hora_recogida").val('');
        $("#ruta").val('').trigger('change');
        $("#provincia_origen").val('').trigger('change');
        $("#provincia_destino").val('').trigger('change');
        // $('#provincia_origen').prop("disabled", true);
        // $('#provincia_destino').prop("disabled", true);
        // $('#cantidad_adultos').prop("disabled", true);
        // $('#cantidad_ninnos2a12').prop("disabled", true);
        // $('#cantidad_ninnos0a2').prop("disabled", true);
        //document.getElementById("fecha_inicio").disabled = true;
        document.getElementById("precio").hidden = true;
        document.getElementById("precion").hidden = true;
        document.getElementById("preciof").hidden = true;
        document.getElementById("lblpa").hidden = true;
        document.getElementById("lblpn").hidden = true;
        document.getElementById("lblpf").hidden = true;
        document.getElementById("fecha_inicio").hidden = true;
        document.getElementById("lblfecha_inicio").hidden = true;
        document.getElementById("hora_recogida").readOnly = true;


        var idFilaHab_selected = [];

        //Realizar la reservar traslado
        $('#botonp').on('click', function (event) {
            event.preventDefault();
            var form = $('#conectando_cuba');
            var url = form.attr('action');
            var dataformulario = $('#conectando_cuba').get(0);
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

        //$("#botonp").hide();
        $('#botonp').text('Total a pagar: USD');
        $(document).ready(function () {
            $('#ruta').on('change', function () {
                var ruta_id = $(this).val();
                $('#hora_recogida').val('');
                let precio = '';
                let precion = '';
                let dias = '';
                $('#cantidad_adultos').empty();
                $('#cantidad_adultos').append("<option value=''>--Seleccione--</option>");
                $('#cantidad_adultos').append("<option value='" + 0 + "'>" + 0 + "</option>");
                $('#cantidad_adultos').append("<option value='" + 1 + "'>" + 1 + "</option>");
                $('#cantidad_adultos').append("<option value='" + 2 + "'>" + 2 + "</option>");
                $('#cantidad_adultos').append("<option value='" + 3 + "'>" + 3 + "</option>");
                $('#cantidad_adultos').append("<option value='" + 4 + "'>" + 4 + "</option>");
                $('#cantidad_adultos').append("<option value='" + 5 + "'>" + 5 + "</option>");
                $('#cantidad_adultos').append("<option value='" + 6 + "'>" + 6 + "</option>");
                $('#cantidad_adultos').append("<option value='" + 7 + "'>" + 7 + "</option>");
                $('#cantidad_adultos').append("<option value='" + 8 + "'>" + 8 + "</option>");
                $('#cantidad_adultos').append("<option value='" + 9 + "'>" + 9 + "</option>");
                $('#cantidad_adultos').append("<option value='" + 10 + "'>" + 10 + "</option>");


                $('#cantidad_ninnos2a12').empty();
                $('#cantidad_ninnos2a12').append("<option value=''>--Seleccione--</option>");
                $('#cantidad_ninnos2a12').append("<option value='" + 0 + "'>" + 0 + "</option>");
                $('#cantidad_ninnos2a12').append("<option value='" + 1 + "'>" + 1 + "</option>");
                $('#cantidad_ninnos2a12').append("<option value='" + 2 + "'>" + 2 + "</option>");
                $('#cantidad_ninnos2a12').append("<option value='" + 3 + "'>" + 3 + "</option>");
                $('#cantidad_ninnos2a12').append("<option value='" + 4 + "'>" + 4 + "</option>");
                $('#cantidad_ninnos2a12').append("<option value='" + 5 + "'>" + 5 + "</option>");
                $('#cantidad_ninnos2a12').append("<option value='" + 6 + "'>" + 6 + "</option>");
                $('#cantidad_ninnos2a12').append("<option value='" + 7 + "'>" + 7 + "</option>");
                $('#cantidad_ninnos2a12').append("<option value='" + 8 + "'>" + 8 + "</option>");
                $('#cantidad_ninnos2a12').append("<option value='" + 9 + "'>" + 9 + "</option>");
                $('#cantidad_ninnos2a12').append("<option value='" + 10 + "'>" + 10 + "</option>");

                $('#cantidad_ninnos0a2').empty();
                $('#cantidad_ninnos0a2').append("<option value=''>--Seleccione--</option>");
                $('#cantidad_ninnos0a2').append("<option value='" + 0 + "'>" + 0 + "</option>");
                $('#cantidad_ninnos0a2').append("<option value='" + 1 + "'>" + 1 + "</option>");
                $('#cantidad_ninnos0a2').append("<option value='" + 2 + "'>" + 2 + "</option>");
                $('#cantidad_ninnos0a2').append("<option value='" + 3 + "'>" + 3 + "</option>");
                $('#cantidad_ninnos0a2').append("<option value='" + 4 + "'>" + 4 + "</option>");
                $('#cantidad_ninnos0a2').append("<option value='" + 5 + "'>" + 5 + "</option>");
                $('#cantidad_ninnos0a2').append("<option value='" + 6 + "'>" + 6 + "</option>");
                $('#cantidad_ninnos0a2').append("<option value='" + 7 + "'>" + 7 + "</option>");
                $('#cantidad_ninnos0a2').append("<option value='" + 8 + "'>" + 8 + "</option>");
                $('#cantidad_ninnos0a2').append("<option value='" + 9 + "'>" + 9 + "</option>");
                $('#cantidad_ninnos0a2').append("<option value='" + 10 + "'>" + 10 + "</option>");


                if ($.trim(ruta_id) != '') {
                    $.get('lugarescon', {ruta_id: ruta_id}, function (lugares) {
                        $('#lugar').empty();
                        $('#lugar').append("<option value=''>Seleccione un Lugar</option>");
                        $.each(lugares, function (index, value) {
                            $('#lugar').append("<option value='" + index + "'>" + value + "</option>");

                        });
                        $.each(conectandospre, function (i, item) {
                            if (item['ruta_id'] == ruta_id) {
                                precio = item['precio_pax'];
                                precion = item['precio_ninnos'];
                                dias = item['dias_antelacion_id'];

                                document.getElementById("lblfecha_inicio").hidden = false;
                                document.getElementById("fecha_inicio").hidden = false;
                                // const date = new Date();
                                // date.setDate(date.getDate() + dias);
                                // const dateStr = `${date.getFullYear()}-${String(date.getMonth() + 1).padStart(2, '0')}-${String(date.getDay()).padStart(2, '0')}`;
                                // document.querySelector('#fecha_inicio').setAttribute('max', dateStr);
                            }
                        });

                        $('#precio').val('');
                        $('#precion').val('');


                        $('#cantidad_adultos').on('change', function () {
                            var num1 = $(this).val();
                            $('#precio').val(precio * parseInt(num1));
                            var precioad = precio * parseInt(num1);
                            $('#cantidad_ninnos2a12').on('change', function () {
                                var num2 = $(this).val();
                                $('#precion').val(precion * parseInt(num2));
                                var precioni = precion * parseInt(num2);
                                $('#preciof').val(precioad + precion * parseInt(num2));
                                var fin = precioad + precion * parseInt(num2);
                                //$('#botonp').show('true');
                                $('#botonp').text('Total a pagar: ' + fin + ' USD');


                            })
                        })


                    });
                }
            });

        });

        // $(document).ready(function () {
        //     $('#fecha_inicio').on('change', function () {
        //         alert("hola");
        //         $('#provincia_origen').prop("disabled", false);
        //         $('#provincia_origen').on('change', function () {
        //
        //             $("#provincia_destino").val('').trigger('change');
        //             $('#provincia_destino').prop("disabled", false);
        //         });
        //
        //     });
        //
        // })


        $(document).ready(function () {
            $('#lugar').on('change', function () {
                alert("hola");
                var lugar_id = $(this).val();

                let hora_recogida = '';
                if ($.trim(lugar_id) != '') {
                    $('#hora_recogida').val('');
                    $.each(lugaresrecogida, function (i, item) {
                        if (item['id'] == lugar_id) {
                            hora_recogida = item['hora_recogida'];
                        }
                    });
                    $('#hora_recogida').val(hora_recogida);

                }
            });

        })


    </script>

@endsection