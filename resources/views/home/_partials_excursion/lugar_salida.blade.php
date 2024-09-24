    <div class="col-md-4">
        <input type="hidden" id="lugar_salida_check" name="lugar_salida_check"
               value="0">
        <div class="form-group @error('lugar_salida') has-error @enderror">
            <label for="lugar_salida">Lugar de Salida:
                <small class="required" style="color: red"> *</small>
            </label>
            <select class="form-control select2bs4 @error('lugar_salida') is-invalid @enderror"
                    name="lugar_salida" id="lugar_salida">
                <option value="">--Seleccionar--</option>
                <option value="Pinar del Río">Pinar del Río</option>
                <option value="Viñales">Viñales</option>
            </select>
            <span class=" invalid-feedback" id="error_lugar_salida"></span>
        </div>
    </div>
