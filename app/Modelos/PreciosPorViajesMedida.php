<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;
use App\Auth\PostSave;

class PreciosPorViajesMedida extends Model
{
    use PostSave;

    protected $fillable = ['id', 'capacidad', 'fecha_inicio', 'fecha_fin', 'precio_x_pax',
        'precio_ninnos_12annos', 'dias_antelacion_rese_id', 'viaje_medida_id'];

    protected $table = 'precios_por_viajes_medidas';
    protected $primaryKey = 'id';

    function viajes_medida()
    {
        return $this->belongsTo('App\ViajesMedida');
    }
}
