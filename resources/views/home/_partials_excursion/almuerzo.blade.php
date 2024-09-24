<input type="hidden" id="almuerzo_check" name="almuerzo_check" value="0">
<div class="col-md-4 ">
        <div class="form-group @error('almuerzo') has-error @enderror">
            <label for="almuerzo">Almuerzo:
                <small class="required" style="color: red"> *</small>
            </label>
            <select class="form-control select2bs4 @error('almuerzo') is-invalid @enderror"
                    name="almuerzo" id="almuerzo" disabled>
                <option value="">--Seleccionar--</option>
                <option value="Si">Si</option>
                <option value="No">No</option>
            </select>
            <span class=" invalid-feedback" id="error_almuerzo"></span>
        </div>
</div>