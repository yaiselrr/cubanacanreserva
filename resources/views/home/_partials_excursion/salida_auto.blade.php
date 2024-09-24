    <div class="col-md-4">
        <div class="form-group @error('hora_salida_auto') has-error @enderror">
            <label for="hora_salida_auto">Horario de salida del Auto:
                <small class="required" style="color: red"> *</small>
            </label>
            <div class="bootstrap-timepicker">
                <div class="input-group date" id="timepicker"
                     data-target-input="nearest">
                    <div class="input-group-append" data-target="#timepicker"
                         data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="far fa-clock"></i></div>
                    </div>
                    <input type="time" disabled
                           class="form-control @error('hora_salida_auto') is-invalid @enderror"
                           name="hora_salida_auto" id="hora_salida_auto"
                           placeholder="Horario de salida del Auto"/>
                </div>
            </div>
        </div>
    </div>
