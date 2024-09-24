<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-danger card-outline">
                    <div class="card-body">


                        <div class="row col-md-12">
                            <div class="col-md-3">
                                <button type="button" class="btn bg-danger btn-lg" data-toggle="modal"
                                        data-target="#modal-xl">
                                    TRASLADO CONECTANDO CUBA
                                </button>
                            </div>
                            <div class="col-md-3">
                                <button type="button" class="btn bg-danger btn-lg" data-toggle="modal"
                                        data-target="#modal-x2">
                                    Transfer Colectivo por rango de pasajeros
                                </button>
                            </div>
                            <div class="col-md-3">


                                <button type="button" class="btn bg-danger btn-lg" data-toggle="modal"
                                        data-target="#modal-x3">
                                    Transfer Privado por rango de pasajeros
                                </button>
                            </div>
                            <div class="col-md-3">
                                <button type="button" class="btn bg-danger btn-lg" data-toggle="modal"
                                        data-target="#modal-x4">
                                    Transfer Colectivo precio único In-Out
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>


            </div>
            <!-- /.col -->
        </div>
        <!-- ./row -->
    </div><!-- /.container-fluid -->
    <!-- /.modal -->

    <div class="modal fade" id="modal-xl">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" style="color: red;">¡ Reservar Traslado !</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="conectando_cuba" name="conectando_cuba" role="form" method="post"
                      enctype="multipart/form-data"
                      action="">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <div class="form-group">
                                    <label for="fecha_entrada">Fecha de Entrada:
                                        <small class="required" style="color: red"> *</small>
                                    </label>
                                    <input type="date" class="form-control" min="{{  date('Y-m-d')}}"
                                           name="fecha_entrada" id="fecha_entrada"
                                           value="{{ old('fecha_entrada') }}" placeholder="Fecha de Entrada">
                                    <span class=" invalid-feedback" id="error_fecha_entrada"></span>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="form-group">
                                    <label for="ruta">Ruta</label>
                                    <select class="form-control" name="ruta" id="ruta">

                                        <option value="">--Seleccionar--</option>
                                        @foreach ($rutas as $key => $c)
                                            <option value="{{ $c->id }}">{{ $c->ruta }}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <div class="form-group">
                                    <label for="provincia_origen">Provincia Salida</label>
                                    <select class="form-control" name="provincia_origen" id="provincia_origen">

                                        <option value="">--Seleccionar--</option>
                                        @foreach ($provincias as $key => $c)
                                            <option value="{{ $c->id }}">{{ $c->provincia }}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>

                            <div class="col-md-6 mb-4">
                                <div class="form-group">
                                    <label for="provincia_destino">Provincia Destino</label>
                                    <select class="form-control" name="provincia_destino" id="provincia_destino">

                                        <option value="">--Seleccionar--</option>
                                        @foreach ($provincias as $key => $c)
                                            <option value="{{ $c->id }}">{{ $c->provincia }}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-4">
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
                                    <label>Email:
                                        <small class="required" style="color: red"> *</small>
                                    </label>
                                    <input type="email" required class="form-control" id="email"
                                           name="email"
                                           placeholder="Email">
                                    <span class="invalid-feedback" id="error_nombre"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <div class="form-group">
                                    <label for="cantidadadultos">Cantidad de Adultos:
                                        <small class="required" style="color: red"> *</small>
                                    </label>
                                    <select type="text" class="form-control select2bs4" id="cantidad_adultos"
                                            name="cantidad_adultos">
                                        <option value="">--Seleccionar--</option>
                                    </select>
                                    <span class="invalid-feedback" id="error_cantidad_adultos"></span>
                                </div>
                            </div>

                            <div class="col-md-6 mb-4">
                                <div class="form-group">
                                    <label for="cantidad_ninnos0a2">Cantidad de infante (0-2 años):
                                        <small class="required" style="color: red"> *</small>
                                    </label>
                                    <select class="form-control select2bs4" name="cantidad_ninnos0a2"
                                            id="cantidad_ninnos0a2">
                                        <option value="">--Seleccionar--</option>
                                        <option value="0">0</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                    </select>
                                    <span class="invalid-feedback" id="error_cantidad_ninnos0a2"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <div class="form-group">
                                    <label for="cantidad_ninnos2a12">Cantidad de niños (2-12 años):
                                        <small class="required" style="color: red"> *</small>
                                    </label>
                                    <select class="form-control select2bs4" name="cantidad_ninnos2a12"
                                            id="cantidad_ninnos2a12">
                                        <option value="">--Seleccionar--</option>
                                        <option value="0">0</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                    </select>
                                    <span class="invalid-feedback" id="error_cantidad_ninnos2a12"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <div class="form-group">
                                    <label for="lugar">Lugar de recogida</label>
                                    <select class="form-control" name="lugar" id="lugar">

                                        <option value="">--Seleccionar--</option>
                                        @foreach ($lugares as $key => $c)
                                            <option value="{{ $c->id }}">{{ $c->hotel->nombre }}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="form-group">
                                    <label>Hora de recogida:
                                        <small class="required" style="color: red"> *</small>
                                    </label>
                                    <input type="text" disabled class="form-control" id="hora"
                                           name="hora"
                                           placeholder="">
                                    <span class="invalid-feedback" id="error_hora"></span>
                                </div>
                            </div>

                        </div>
                        <div class="row">
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
                        <button type="button" class="btn btn-danger" style="float: left">Total a pagar: USD</button>
                        <button type="button" class="btn btn-danger" style="float: right;" data-dismiss="modal">
                            Cancelar
                        </button>
                        <button type="button" class="btn btn-danger">Reservar</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
    <div class="modal fade" id="modal-x2">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" style="color: red;">¡ Reservar Traslado !</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="conectando_cuba" name="conectando_cuba" role="form" method="post"
                      enctype="multipart/form-data"
                      action="">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6 mb-4">
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
                            <div class="col-md-6 mb-4">
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
                            <div class="col-md-6 mb-4">
                                <div class="form-group">
                                    <label for="provincia_origen">Origen</label>
                                    <select class="form-control" name="provincia_origen" id="provincia_origen">

                                        <option value="">--Seleccionar--</option>
                                        @foreach ($provincias as $key => $c)
                                            <option value="{{ $c->id }}">{{ $c->provincia }}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>

                            <div class="col-md-6 mb-4">
                                <div class="form-group">
                                    <label for="provincia_destino">Destino</label>
                                    <select class="form-control" name="provincia_destino" id="provincia_destino">

                                        <option value="">--Seleccionar--</option>
                                        @foreach ($provincias as $key => $c)
                                            <option value="{{ $c->id }}">{{ $c->provincia }}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-4">
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
                            <div class="col-md-6 mb-4">
                                <div class="form-group">
                                    <label for="tipo_vehiculo">Tipo vehiculo:
                                        <small class="required" style="color: red"> *</small>
                                    </label>
                                    <select class="form-control select2bs4" name="tipo_vehiculo"
                                            id="tipo_vehiculo">
                                        <option value="">--Seleccionar--</option>
                                        <option value="0">No</option>
                                        <option value="1">Si</option>
                                    </select>
                                    <span class="invalid-feedback" id="error_tipo_vehiculo"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <div class="form-group">
                                    <label for="cantidadadultos">Cantidad de Adultos:
                                        <small class="required" style="color: red"> *</small>
                                    </label>
                                    <select type="text" class="form-control select2bs4" id="cantidad_adultos"
                                            name="cantidad_adultos">
                                        <option value="">--Seleccionar--</option>
                                    </select>
                                    <span class="invalid-feedback" id="error_cantidad_adultos"></span>
                                </div>
                            </div>

                            <div class="col-md-6 mb-4">
                                <div class="form-group">
                                    <label for="cantidad_ninnos0a2">Cantidad de infante (0-2 años):
                                        <small class="required" style="color: red"> *</small>
                                    </label>
                                    <select class="form-control select2bs4" name="cantidad_ninnos0a2"
                                            id="cantidad_ninnos0a2">
                                        <option value="">--Seleccionar--</option>
                                        <option value="0">0</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                    </select>
                                    <span class="invalid-feedback" id="error_cantidad_ninnos0a2"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <div class="form-group">
                                    <label for="cantidad_ninnos2a12">Cantidad de niños (2-12 años):
                                        <small class="required" style="color: red"> *</small>
                                    </label>
                                    <select class="form-control select2bs4" name="cantidad_ninnos2a12"
                                            id="cantidad_ninnos2a12">
                                        <option value="">--Seleccionar--</option>
                                        <option value="0">0</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                    </select>
                                    <span class="invalid-feedback" id="error_cantidad_ninnos2a12"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <div class="form-group">
                                    <label for="lugar">Lugar de inicio del servicio</label>
                                    <select class="form-control" name="lugar" id="lugar">

                                        <option value="">--Seleccionar--</option>
                                        @foreach ($lugares as $key => $c)
                                            <option value="{{ $c->id }}">{{ $c->hotel->nombre }}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="form-group">
                                    <label>Hora de inicio del servicio:
                                        <small class="required" style="color: red"> *</small>
                                    </label>
                                    <input type="time" class="form-control" id="hora_inicio"
                                           name="hora_inicio"
                                           placeholder="">
                                    <span class="invalid-feedback" id="error_hora"></span>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <div class="form-group">
                                    <label for="lugar">Lugar de fin del servicio</label>
                                    <select class="form-control" name="lugar" id="lugar">

                                        <option value="">--Seleccionar--</option>
                                        @foreach ($lugares as $key => $c)
                                            <option value="{{ $c->id }}">{{ $c->hotel->nombre }}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="form-group">
                                    <label>Hora de fin del servicio:
                                        <small class="required" style="color: red"> *</small>
                                    </label>
                                    <input type="time" class="form-control" id="hora_fin"
                                           name="hora_fin"
                                           placeholder="">
                                    <span class="invalid-feedback" id="error_hora"></span>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-4">
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
                            <div class="col-md-6 mb-4">
                                <div class="form-group">
                                    <label>Email:
                                        <small class="required" style="color: red"> *</small>
                                    </label>
                                    <input type="email" required class="form-control" id="email"
                                           name="email"
                                           placeholder="Email">
                                    <span class="invalid-feedback" id="error_nombre"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-4">
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
                                    <label>No. Vuelo:
                                        <small class="required" style="color: red"> *</small>
                                    </label>
                                    <input type="text" required class="form-control" id="vuelo"
                                           name="vuelo"
                                           placeholder="Vuelo">
                                    <span class="invalid-feedback" id="error_vuelo"></span>
                                </div>
                            </div>
                        </div>


                        <div class="row">
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
                        <button type="button" class="btn btn-danger" style="float: left">Total a pagar: USD</button>
                        <button type="button" class="btn btn-danger" style="float: right;" data-dismiss="modal">
                            Cancelar
                        </button>
                        <button type="button" class="btn btn-danger">Reservar</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <div class="modal fade" id="modal-x3">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" style="color: red;">¡ Reservar Traslado !</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="conectando_cuba" name="conectando_cuba" role="form" method="post"
                      enctype="multipart/form-data"
                      action="">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6 mb-4">
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
                            <div class="col-md-6 mb-4">
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
                            <div class="col-md-6 mb-4">
                                <div class="form-group">
                                    <label for="provincia_origen">Origen</label>
                                    <select class="form-control" name="provincia_origen" id="provincia_origen">

                                        <option value="">--Seleccionar--</option>
                                        @foreach ($provincias as $key => $c)
                                            <option value="{{ $c->id }}">{{ $c->provincia }}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>

                            <div class="col-md-6 mb-4">
                                <div class="form-group">
                                    <label for="provincia_destino">Destino</label>
                                    <select class="form-control" name="provincia_destino" id="provincia_destino">

                                        <option value="">--Seleccionar--</option>
                                        @foreach ($provincias as $key => $c)
                                            <option value="{{ $c->id }}">{{ $c->provincia }}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-4">
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
                            <div class="col-md-6 mb-4">
                                <div class="form-group">
                                    <label for="tipo_vehiculo">Tipo vehiculo:
                                        <small class="required" style="color: red"> *</small>
                                    </label>
                                    <select class="form-control select2bs4" name="tipo_vehiculo"
                                            id="tipo_vehiculo">
                                        <option value="">--Seleccionar--</option>
                                        <option value="0">No</option>
                                        <option value="1">Si</option>
                                    </select>
                                    <span class="invalid-feedback" id="error_tipo_vehiculo"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <div class="form-group">
                                    <label for="cantidadadultos">Cantidad de Adultos:
                                        <small class="required" style="color: red"> *</small>
                                    </label>
                                    <select type="text" class="form-control select2bs4" id="cantidad_adultos"
                                            name="cantidad_adultos">
                                        <option value="">--Seleccionar--</option>
                                    </select>
                                    <span class="invalid-feedback" id="error_cantidad_adultos"></span>
                                </div>
                            </div>

                            <div class="col-md-6 mb-4">
                                <div class="form-group">
                                    <label for="cantidad_ninnos0a2">Cantidad de infante (0-2 años):
                                        <small class="required" style="color: red"> *</small>
                                    </label>
                                    <select class="form-control select2bs4" name="cantidad_ninnos0a2"
                                            id="cantidad_ninnos0a2">
                                        <option value="">--Seleccionar--</option>
                                        <option value="0">0</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                    </select>
                                    <span class="invalid-feedback" id="error_cantidad_ninnos0a2"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <div class="form-group">
                                    <label for="cantidad_ninnos2a12">Cantidad de niños (2-12 años):
                                        <small class="required" style="color: red"> *</small>
                                    </label>
                                    <select class="form-control select2bs4" name="cantidad_ninnos2a12"
                                            id="cantidad_ninnos2a12">
                                        <option value="">--Seleccionar--</option>
                                        <option value="0">0</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                    </select>
                                    <span class="invalid-feedback" id="error_cantidad_ninnos2a12"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <div class="form-group">
                                    <label for="lugar">Lugar de inicio del servicio</label>
                                    <select class="form-control" name="lugar" id="lugar">

                                        <option value="">--Seleccionar--</option>
                                        @foreach ($lugares as $key => $c)
                                            <option value="{{ $c->id }}">{{ $c->hotel->nombre }}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="form-group">
                                    <label>Hora de inicio del servicio:
                                        <small class="required" style="color: red"> *</small>
                                    </label>
                                    <input type="time" class="form-control" id="hora_inicio"
                                           name="hora_inicio"
                                           placeholder="">
                                    <span class="invalid-feedback" id="error_hora"></span>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <div class="form-group">
                                    <label for="lugar">Lugar de fin del servicio</label>
                                    <select class="form-control" name="lugar" id="lugar">

                                        <option value="">--Seleccionar--</option>
                                        @foreach ($lugares as $key => $c)
                                            <option value="{{ $c->id }}">{{ $c->hotel->nombre }}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="form-group">
                                    <label>Hora de fin del servicio:
                                        <small class="required" style="color: red"> *</small>
                                    </label>
                                    <input type="time" class="form-control" id="hora_fin"
                                           name="hora_fin"
                                           placeholder="">
                                    <span class="invalid-feedback" id="error_hora"></span>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-4">
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
                            <div class="col-md-6 mb-4">
                                <div class="form-group">
                                    <label>Email:
                                        <small class="required" style="color: red"> *</small>
                                    </label>
                                    <input type="email" required class="form-control" id="email"
                                           name="email"
                                           placeholder="Email">
                                    <span class="invalid-feedback" id="error_nombre"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-4">
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
                                    <label>No. Vuelo:
                                        <small class="required" style="color: red"> *</small>
                                    </label>
                                    <input type="text" required class="form-control" id="vuelo"
                                           name="vuelo"
                                           placeholder="Vuelo">
                                    <span class="invalid-feedback" id="error_vuelo"></span>
                                </div>
                            </div>
                        </div>


                        <div class="row">
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
                        <button type="button" class="btn btn-danger" style="float: left">Total a pagar: USD</button>
                        <button type="button" class="btn btn-danger" style="float: right;" data-dismiss="modal">
                            Cancelar
                        </button>
                        <button type="button" class="btn btn-danger">Reservar</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->


    <div class="modal fade" id="modal-x4">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" style="color: red;">¡ Reservar Traslado !</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="precio_unico" name="precio_unico" role="form" method="post"
                      enctype="multipart/form-data"
                      action="">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6 mb-4">
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
                            <div class="col-md-6 mb-4">
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
                            <div class="col-md-6 mb-4">
                                <div class="form-group">
                                    <label for="provincia_origen">Origen</label>
                                    <select class="form-control" name="provincia_origen" id="provincia_origen">

                                        <option value="">--Seleccionar--</option>
                                        @foreach ($provincias as $key => $c)
                                            <option value="{{ $c->id }}">{{ $c->provincia }}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>

                            <div class="col-md-6 mb-4">
                                <div class="form-group">
                                    <label for="provincia_destino">Destino</label>
                                    <select class="form-control" name="provincia_destino" id="provincia_destino">

                                        <option value="">--Seleccionar--</option>
                                        @foreach ($provincias as $key => $c)
                                            <option value="{{ $c->id }}">{{ $c->provincia }}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <div class="form-group">
                                    <label for="cantidad_personas">Cantidad de personas:
                                        <small class="required" style="color: red"> *</small>
                                    </label>
                                    <select class="form-control select2bs4" name="cantidad_personas"
                                            id="cantidad_personas">
                                        <option value="">--Seleccionar--</option>
                                        <option value="0">No</option>
                                        <option value="1">Si</option>
                                    </select>
                                    <span class="invalid-feedback" id="error_cantidad_personas"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-4">
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
                            <div class="col-md-6 mb-4">
                                <div class="form-group">
                                    <label>Email:
                                        <small class="required" style="color: red"> *</small>
                                    </label>
                                    <input type="email" required class="form-control" id="email"
                                           name="email"
                                           placeholder="Email">
                                    <span class="invalid-feedback" id="error_nombre"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-4">
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
                                    <label>No. Vuelo:
                                        <small class="required" style="color: red"> *</small>
                                    </label>
                                    <input type="text" required class="form-control" id="vuelo"
                                           name="vuelo"
                                           placeholder="Vuelo">
                                    <span class="invalid-feedback" id="error_vuelo"></span>
                                </div>
                            </div>
                        </div>


                        <div class="row">
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
                        <button type="button" class="btn btn-danger" style="float: left">Total a pagar: USD</button>
                        <button type="button" class="btn btn-danger" style="float: right;" data-dismiss="modal">
                            Cancelar
                        </button>
                        <button type="button" class="btn btn-danger">Reservar</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
</section>
