    <div class="col-md-4">
        <input type="hidden" id="tipo_cicloturismo_check" name="tipo_cicloturismo_check" value="0">
        <div class="form-group @error('tipo_cicloturismo') has-error @enderror">
            <label for="tipo_cicloturismo">Tipo de Cicloturismo:
                <small class="required" style="color: red"> *</small>
            </label>
            <select class="form-control select2bs4 @error('tipo_cicloturismo') is-invalid @enderror"
                    name="tipo_cicloturismo" id="tipo_cicloturismo">
                <option value="">--Seleccionar--</option>
                <option value="Con Canopy">Con Canopy</option>
                <option value="Sin Canopy">Sin Canopy</option>
            </select>
            <span class=" invalid-feedback" id="error_tipo_cicloturismo"></span>
        </div>
    </div>
