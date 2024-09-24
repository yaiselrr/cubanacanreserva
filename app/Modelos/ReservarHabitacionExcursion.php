<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class ReservarHabitacionExcursion extends Model
{
    protected $fillable = ['id','tipo_habitacion', 'cantidad_adultos','cantidad_ninnos2a12', 'cantidad_ninnos0a2','precio_total'];
    protected $table = 'reservar_habitacion_excursiones';
    protected $primaryKey = 'id';

}
