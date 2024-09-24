<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;
use App\Auth\PostSave;

class TarifarioColectivoPrecioUnico extends Model
{
    //
    use PostSave;
    protected $table = 'tarifario_colectivo_precio_unicos';

    protected $primaryKey = 'id';
    protected $fillable = [
        'aeropuerto',
        'guion',
        'hotel',
        'ow',
        'cantidad'
    ];
    protected $guarded = [];
}
