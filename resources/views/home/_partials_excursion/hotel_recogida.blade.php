<div class="col-md-4 ">
    <input type="hidden" id="recog_check" name="recog_check" value="0">
    <div class="form-group @error('hotel_recogida_id') has-error @enderror">
        <label for="hotel_recogida_id">Hotel de Recogida:
            <small class="required" style="color: red"> *</small>
        </label>
        <select class="form-control select2bs4 @error('hotel_recogida_id') is-invalid @enderror"
                disabled
                id="hotel_recogida_id" name="hotel_recogida_id">
            <option value="">--Seleccionar--</option>
            @foreach($hotelesrecogidas as $hotelesrecogida)
                <option value="{{$hotelesrecogida->id}}">{{$hotelesrecogida->hotel}}</option>
            @endforeach
        </select>
        <span class=" invalid-feedback" id="error_hotel_recogida_id"></span>
    </div>
</div>

<div class="col-md-4 mb-5">
    <div class="form-group @error('hora_salida_hotel_recogida') has-error @enderror">
        <label for="hora_salida_hotel_recogida">Horario de recogida en el Hotel:
            <small class="required" style="color: red"> *</small>
        </label>
        <div class="bootstrap-timepicker">
            <div class="input-group date"
                 data-target-input="nearest">
                <div class="input-group-append" data-target="#timepicker"
                     data-toggle="datetimepicker">
                    <div class="input-group-text"><i class="far fa-clock"></i></div>
                </div>
                <input type="time" disabled
                       class="form-control @error('hora_salida_hotel_recogida') is-invalid @enderror"
                       name="hora_salida_hotel_recogida"
                       id="hora_salida_hotel_recogida"
                       placeholder="Horario de recogida en el Hotel"/>
            </div>
        </div>
    </div>
</div>