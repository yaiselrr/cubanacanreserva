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
                        <label>No.Pasaporte:
                            <small class="required" style="color: red"> *</small>
                        </label>
                        <input type="text" required class="form-control " id="numero_pasaporte"
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
                        <input type="date" required class="form-control" id="fecha_nacimiento"
                               name="fecha_nacimiento">
                        <span class="invalid-feedback"
                              id="error_fecha_nacimiento"></span>

                    </div>
                </div>
            </div>
            <div class="row col-md-12">
                <div class="col-md-6 mb-2">
                    <a id="cancelar_datos" type="button" class="btn btn-light botones"
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