<div id="ocultar_habitacion_datos">
    <input type="hidden" id="habitacion_check" name="habitacion_check" value="0">
        <div class="p-0 pt-1 col-md-4 offset-md-4 visiblefull">
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
                                 onClick="cambiar_tab(1)"
                                 style="position: absolute;z-index: 1;">
                            <img id="hab_activo" class="show-tab"
                                 src="{{asset('assets/img/habitaciones en productos y servicios activo.png')}}"
                                 style="position: absolute;z-index: 1;">
                        </div>
                    </a>
                </li>
                <li class="nav-item col-md-4 offset-md-4">
                    <a class="nav-link" id="custom-content-below-datos-tab"
                       data-toggle="pill"
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
        {{--toggle tab panel fullwidth--}}
        <div class="offset-md-4 visibleresponsive">
            <ul class="list-inline">
                <li class="nav-item">
                    <a class="nav-link active" id="custom-content-below-habitaciones-tab"
                       data-toggle="pill"
                       href="#custom-content-below-habitaciones" role="tab"
                       aria-controls="custom-content-below-habitaciones"
                       aria-selected="true">
                        <div class="col-md-3">
                            <img id="hab_pasivo" class="hide-tab"
                                 src="{{asset('assets/img/habitaciones-productos-servicios-pasivo.png')}}"
                                 onClick="cambiar_tab(1)"
                                 style="position: absolute;z-index: 1;">
                            <img id="hab_activo" class="show-tab"
                                 src="{{asset('assets/img/habitaciones en productos y servicios activo.png')}}"
                                 style="position: absolute;z-index: 1;">
                        </div>
                    </a>
                </li>
                <li class="nav-item col-md-4 offset-md-4">
                    <a class="nav-link" id="custom-content-below-datos-tab"
                       data-toggle="pill"
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
                    <div class="col-md-6 mb-4 ">
                        <div class="form-group">
                            <input type="hidden" id="chek_tipohab" name="chek_tipohab"
                                   value="0">
                            <label for="tipo_habitacion_excursion">Tipo de Habitación:
                                <small class="required" style="color: red"> *</small>
                            </label>
                            <select class="form-control select2bs4"
                                    id="tipo_habitacion_excursion"
                                    name="tipo_habitacion_excursion">
                                <option selected value="">--Seleccionar--</option>
                                <option value="Sencilla">Sencilla</option>
                                <option value="Doble">Doble</option>
                            </select>
                            <span class="invalid-feedback"
                                  id="error_tipo_habitacion_excursion"></span>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="form-group">
                            <label for="cantidad_adultos_excursion">Cantidad de Adultos:
                                <small class="required" style="color: red"> *</small>
                            </label>
                            <select class="form-control select2bs4"
                                    id="cantidad_adultos_excursion"
                                    name="cantidad_adultos_excursion"
                                    disabled>
                            </select>
                            <span class="invalid-feedback"
                                  id="error_cantidad_adultos_excursion"></span>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="form-group">
                            <label for="cantidad_ninnos2a12_excursion">Cantidad de niños
                                (2-12
                                años):
                                <small class="required" style="color: red"> *</small>
                            </label>
                            <input type="text" class="form-control"
                                   name="cantidad_ninnos2a12_excursion"
                                   id="cantidad_ninnos2a12_excursion"
                                   placeholder="Cantidad de niños (2-12 años)" disabled {{--pattern="[0-9]{1,9}"--}} onkeypress="return validarNumeros(event)">
                            <span class="invalid-feedback"
                                  id="error_cantidad_ninnos2a12_excursion" ></span>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="form-group">
                            <label for="cantidad_ninnos0a2_excursion">Cantidad de infante
                                (0-2
                                años):
                                <small class="required" style="color: red"> *</small>
                            </label>
                            <input type="text" class="form-control"
                                   name="cantidad_ninnos0a2_excursion"
                                   id="cantidad_ninnos0a2_excursion"
                                   placeholder="Cantidad de infante (0-2 años)" disabled {{--pattern="[0-9]{1,9}"--}} onkeypress="return validarNumeros(event)">
                            <span class="invalid-feedback"
                                  id="error_cantidad_ninnos0a2_excursion"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="custom-content-below-datos" role="tabpanel"
                 aria-labelledby="custom-content-below-datos-tab" style="margin-top: 30px">
                <div id="listado_fomulario_datos">
                    <div class="row col-md-12 ">
                        <ul class="list-inline  ml-auto">
                            <li class="list-inline-item mb-2">
                                <a id="btn_mostrar_formulario_datos" type="button"
                                   class="btn btn-light botones"
                                   style="background: #fff;color: #2A4660;border-color: #2A4660">Adicionar</a>
                            </li>
                            <li class="list-inline-item mb-2">
                                <a type="button" class="btn botones disabled"
                                   id="btn_modificar_datos_clientes"
                                   style="background: #DA2513;color: #fff;">Modificar</a>
                            </li>
                            <li class="list-inline-item mb-2">
                                <a type="button" id="btn_abrir_modal"
                                   class="btn botones disabled"
                                   style="background: #DA2513;color: #fff;">Eliminar</a>
                            </li>
                        </ul>
                        <table id="listado_datos_clientes"
                               class="table table-bordered table-hover">
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
                            </tbody>
                        </table>
                        <div class="row col-md-12">
                            <ul class="list-inline   ml-auto">
                                <li class="list-inline-item mb-2">
                                    <a type="button"
                                       id="btn_cancelar_habitacion_datos"
                                       class="btn btn-light botones"
                                       style="background: #fff;color: #2A4660;border-color: #2A4660;">Cancelar</a>
                                </li>
                                <li class="list-inline-item mb-2">
                                    <a type="button" id="btn_add_habitacion_datos"
                                       class="btn botones"
                                       style="background: #DA2513;color: #fff;">Aceptar</a>
                                </li>
                                <li class="list-inline-item mb-2">
                                    <a type="button" id="btn_modif_habitacion_datos"
                                       class="hide-tab"
                                       style="background: #DA2513;color: #fff;">Modificar</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div id="formulario_add_datos">
                    <div class="row" id="bloques1">
                        <div class="row col-md-12 ">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Nombre y Apellidos:
                                        <small class="required" style="color: red"> *
                                        </small>
                                    </label>
                                    <input type="text" required class="form-control"
                                           id="nombre_excursion"
                                           name="nombre_excursion"
                                           placeholder="Nombre y Apellidos">
                                    <span class="invalid-feedback"
                                          id="error_nombre_excursion"></span>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="form-group">
                                    <label>Nacionalidad:
                                        <small class="required" style="color: red"> *
                                        </small>
                                    </label>
                                    <select class="form-control select2bs4" required
                                            id="nacionalidad_id"
                                            name="nacionalidad_id">
                                        <option value="">--Seleccionar--</option>
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
                                        <small class="required" style="color: red"> *
                                        </small>
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
                                        <small class="required" style="color: red"> *
                                        </small>
                                    </label>
                                    <input type="date" required class="form-control"
                                           id="fecha_nacimiento"
                                           name="fecha_nacimiento">
                                    <span class="invalid-feedback"
                                          id="error_fecha_nacimiento"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row col-md-12" style="margin-top: -5px;">
                            <ul class="list-inline  ml-auto">
                                <li class="list-inline-item mb-2">
                                    <a id="btn_mostrar_vista_detalle_hotel" type="button"
                                       class="btn btn-light botones"
                                       style="background: #fff;color: #2A4660;border-color: #2A4660">Cancelar</a>
                                </li>
                                <li class="list-inline-item mb-2">
                                    <button type="button" id="btn_add_datos_clientes"
                                            class="btn botones"
                                            style="background: #DA2513;color: #fff;">
                                        Adicionar
                                    </button>
                                </li>
                                <li class="list-inline-item mb-2">
                                    <a type="button" id="btn_modif_datos_clientes"
                                       class="btn botones"
                                       style="background: #DA2513;color: #fff; ">Modificar
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>