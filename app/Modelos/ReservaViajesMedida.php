<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class ReservaViajesMedida extends Model
{
    protected $fillable = ['id','fecha', 'cantidad_adultos','cantidad_ninnos2a12'
        ,'cantidad_ninnos0a2', 'viaje_medida_id','nombre','email','precio_total','req_especiales'];
    protected $table = 'reserva_viajes_medidas';
    protected $primaryKey = 'id';

    function viajes_medidas()
    {
        return $this->belongsTo('App\Modelos\ViajesMedida');
    }
}
