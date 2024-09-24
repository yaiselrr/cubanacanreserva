<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;
use App\Auth\PostSave;

class ReservaHabitacionCircuito extends Model
{
    use PostSave;

    protected $fillable = ['id','tipo_habitacion', 'cantidad_adultos','cantidad_ninnos2a12'
        , 'cantidad_ninnos0a2', 'req_especiales', 'circuito_id','status_id'];
    protected $table = 'reserva_habitacion_circuitos';
    protected $primaryKey = 'id';

    function circuito()
    {
        return $this->belongsTo('App\Modelos\Circuito');
    }

    function datos_clientes_circuito()
    {
        return $this->belongsTo('App\Modelos\DatosCliente');
    }
}
