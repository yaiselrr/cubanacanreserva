<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;
use App\Auth\PostSave;

class ViajesMedidaTraslation extends Model
{
    use PostSave;
    protected $fillable = [
        'id','descripcion','locale','viaje_medida_id'
    ];
    protected $table = 'viajes_medida_traslations';
    protected $primaryKey ='id';

    function viajes_medida()
    {
        return $this->belongsTo('App\ViajesMedida');
    }

}
