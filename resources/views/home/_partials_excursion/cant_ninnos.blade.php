<input type="hidden" id="cantidad_ninnos_check" name="cantidad_ninnos_check"
       value="0">
<div class="col-md-4 ">
    <div class="form-group @error('cantidad_ninnos2a12') has-error @enderror">
        <label for="cantidad_ninnos2a12">Cantidad de niños (2-12 años):
            <small class="required" style="color: red"> *</small>
        </label>
        <input class="form-control @error('cantidad_ninnos2a12') is-invalid @enderror"
               name="cantidad_ninnos2a12" id="cantidad_ninnos2a12" disabled
               placeholder="Cantidad de niños (2-12 años)"  {{--pattern="[0-9]{1,9}|[0-9]{1,9}"--}} onkeypress="return validarNumeros(event)">
        <span class=" invalid-feedback" id="error_cantidad_ninnos2a12"></span>
    </div>
</div>
<div class="col-md-4">
    <div class="form-group  @error('cantidad_ninnos0a2') has-error @enderror">
        <label for="cantidad_ninnos0a2">Cantidad de infante (0-2 años):
            <small class="required" style="color: red"> *</small>
        </label>
        <input class="form-control @error('cantidad_ninnos0a2') is-invalid @enderror"
               name="cantidad_ninnos0a2" id="cantidad_ninnos0a2"
               placeholder="Cantidad de infante (0-2 años)" {{-- pattern="[0-9]{1,9}"--}} onkeypress="return validarNumeros(event)">
        <span class=" invalid-feedback" id="error_cantidad_ninnos0a2"></span>
    </div>
</div>