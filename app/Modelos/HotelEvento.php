<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;
use App\Auth\PostSave;

class HotelEvento extends Model
{
    use PostSave;

    protected $fillable = ['id', 'cantidad_habitaciones_sencillas','hotel', 'cantidad_habitaciones_dobles'
        ,'precio_habitacion_sencillas','precio_habitacion_dobles'];
    protected $table = 'hotel_eventos';
    protected $primaryKey = 'id';

    //
}
