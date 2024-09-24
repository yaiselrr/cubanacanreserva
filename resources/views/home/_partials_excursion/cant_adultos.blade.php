<div class="col-md-4 ">
    <div class="form-group @error('cantidad_adultos') has-error @enderror">
        <label for="cantidad_adultos">Cantidad Adultos:
            <small class="required" style="color: red"> *</small>
        </label>
        <input type="text"
               class="form-control @error('cantidad_adultos') is-invalid @enderror"
               id="cantidad_adultos" name="cantidad_adultos" disabled
               placeholder="Cantidad de Adultos"  {{--pattern="[0-9]{1,9}"--}} onkeypress="return validarNumeros(event)">
        <span class=" invalid-feedback" id="error_cantidad_adultos"></span>
    </div>
</div>
