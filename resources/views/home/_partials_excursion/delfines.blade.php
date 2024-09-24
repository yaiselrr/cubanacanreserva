    <div class="col-md-4">

        <input type="hidden" id="tipo_excursion_delfines_check"
               name="tipo_excursion_delfines_check" value="0">
        <div class="form-group @error('tipo_excursion_delfines') has-error @enderror">
            <label for="tipo_excursion_delfines">Tipo de excursión con Delfines:
                <small class="required" style="color: red"> *</small>
            </label>
            <select class="form-control select2bs4 @error('tipo_excursion_delfines') is-invalid @enderror"
                    name="tipo_excursion_delfines" id="tipo_excursion_delfines">
                <option value="">--Seleccionar--</option>
                <option value="Show con delfines">Show con delfines</option>
                <option value="Baño con delfines">Baño con delfines</option>
            </select>
            <span class=" invalid-feedback" id="error_tipo_excursion_delfines"></span>
        </div>
    </div>
