<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;
use App\Auth\PostSave;

class ReservaHabitacionHotel extends Model
{
    //use PostSave;

    protected $fillable = ['id', 'fecha_entrada','tipo_habitacion', 'cantidad_noche', 'cantidad_adultos'
        , 'cantidad_ninnos2a12', 'cantidad_ninnos0a2', 'req_especiales', 'hotels_id','precio_total','status_id'];
    protected $table = 'reserva_habitacion_hotels';
    protected $primaryKey = 'id';

    function hotel()
    {
        return $this->belongsTo('App\Modelos\Hotel');
    }

    function datos_clientes_hotel()
    {
        return $this->belongsTo('App\Modelos\DatosCliente');
    }
}
