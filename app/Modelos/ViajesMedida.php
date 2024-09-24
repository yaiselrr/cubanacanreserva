<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;
use App\Auth\PostSave;

class ViajesMedida extends Model
{
    use PostSave;
    protected $fillable = ['id','imagen','nombre', 'provincia_id'];
    protected $table = 'viajes_medidas';
    protected $primaryKey ='id';

    function viajes_medidas_translations()
    {
        return $this->hasMany('App\Modelos\ViajesMedidaTraslation','viaje_medida_id');
    }

    function precios_por_viajes_medida()
    {
        return $this->hasMany('App\Modelos\PreciosPorViajesMedida');
    }

    function provincia()
    {
        return $this->hasOne('App\Modelos\Provincia');
    }
}
