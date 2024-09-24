<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;
use App\Auth\PostSave;

class PreciosPaxHotel extends Model
{
    use PostSave;

    protected $fillable = ['id', 'cantidad_hab_sencillas', 'fecha_inicio', 'fecha_fin', 'cantidad_hab_dobles',
        'cantidad_hab_triples', 'variante2adultos_hasta2ninnos_2a12annos', 'precio_adulto_variante2adultos',
        'precio_1er_ninno_variante2adultos','precio_2do_ninno_variante2adultos','variante1adulto_hasta3ninnos_2a12annos',
        'precio_adulto_variante1adulto','precio_1er_ninno_variante1adulto','precio_2do_ninno_variante1adulto','precio_3er_ninno_variante1adulto',
        'variante2adultos_2hasta3ninnos_2a12annos','precio_adulto_variante2adultos_2hasta3ninnos','precio_1er_ninno_variante1adultos_variante2adultos_2hasta3ninnos',
        'precio_2do_ninno_variante1adultos_variante2adultos_2hasta3ninnos','precio_3er_ninno_variante1adultos_variante2adultos_2hasta3ninnos',
        'variante3adultos_mismahabitacion','precio_adulto_variante3adultos_mismahabitacion','variante1adulto_mismahabitacion',
        'precio_adulto_variante1adulto_mismahabitacion','hotel_id'];

    protected $table = 'precios_pax_hotels';
    protected $primaryKey = 'id';

    function hotel()
    {
        return $this->belongsTo('App\Hotel');
    }
}
