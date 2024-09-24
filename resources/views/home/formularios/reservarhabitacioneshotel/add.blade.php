<input type="hidden" name="formulario" value="addreserva">
<div class="col-md-6 mb-4">
    <div class="form-group">
        <label for="fecha_entrada">Fecha de Entrada:
            <small class="required" style="color: red"> *</small>
        </label>
        <input type="date" class="form-control" min="{{  date('Y-m-d')}}" name="fecha_entrada" id="fecha_entrada"
               value="{{ old('fecha_entrada') }}" placeholder="Fecha de Entrada">
        <span class=" invalid-feedback" id="error_fecha_entrada"></span>
    </div>
</div>
<div class="col-md-6 mb-4 ">
    <div class="form-group">
        <input type="hidden" id="chek_tipohab" name="chek_tipohab" value="0">
        <label for="tipo_habitacion">Tipo de Habitación:
            <small class="required" style="color: red"> *</small>
        </label>
        <select class="form-control select2bs4" id="tipo_habitacion" name="tipo_habitacion">
            <option value="">--Seleccionar--</option>
            @foreach($tipohabitaciones as $tipohabitacion)
                <option value="{{$tipohabitacion['value']}}">{{$tipohabitacion['tipohabitacion']}}</option>
            @endforeach
        </select>
        <span class="invalid-feedback" id="error_tipo_habitacion"></span>
    </div>
</div>
<div class="col-md-6 mb-4">
    <div class="form-group">
        <label for="cantidadnoche">Cantidad de noches:
            <small class="required" style="color: red"> *</small>
        </label>
        <select class="form-control select2bs4" name="cantidad_noche" id="cantidad_noche">
            <option value="">--Seleccionar--</option>
            @foreach($diasantelacionreservas as $diasantelacionreserva)
                <option value="{{$diasantelacionreserva->id}}">{{$diasantelacionreserva->dias}}</option>
            @endforeach
        </select>
        <span class="invalid-feedback" id="error_cantidad_noche"></span>
    </div>
</div>
<div class="col-md-6 mb-4">
    <div class="form-group">
        <label for="cantidadadultos">Cantidad de Adultos:
            <small class="required" style="color: red"> *</small>
        </label>
        <select type="text" class="form-control select2bs4" id="cantidad_adultos" name="cantidad_adultos"
                disabled="true">
            <option value="">--Seleccionar--</option>
        </select>
        <span class="invalid-feedback" id="error_cantidad_adultos"></span>
    </div>
</div>
<div class="col-md-6 mb-4">
    <div class="form-group">
        <label for="cantidad_ninnos2a12">Cantidad de niños (2-12 años):
            <small class="required" style="color: red"> *</small>
        </label>
        <select class="form-control select2bs4" name="cantidad_ninnos2a12" id="cantidad_ninnos2a12">
            <option value="">--Seleccionar--</option>
            <option value="0">0</option>
            <option value="1">1</option>
            <option value="2">2</option>
        </select>
        <span class="invalid-feedback" id="error_cantidad_ninnos2a12"></span>
    </div>
</div>
<div class="col-md-6 mb-4">
    <div class="form-group">
        <label for="cantidad_ninnos0a2">Cantidad de infante (0-2 años):
            <small class="required" style="color: red"> *</small>
        </label>
        <select class="form-control select2bs4" name="cantidad_ninnos0a2" id="cantidad_ninnos0a2">
            <option value="">--Seleccionar--</option>
            <option value="0">0</option>
            <option value="1">1</option>
            <option value="2">2</option>
        </select>
        <span class="invalid-feedback" id="error_cantidad_ninnos0a2"></span>
    </div>
</div>
<div class="col-md-12">
    <div class="form-group">
        <label for="req_especiales">Requerimientos especiales:</label>
        <textarea name="req_especiales" class="form-control" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;overflow-y: scroll"
                  placeholder="Requerimientos especiales">{{ old('req_especiales') }}</textarea>
    </div>
</div>


