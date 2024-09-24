<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;
use App\Auth\PostSave;

class RutaConectandoCuba extends Model
{
    //
    use PostSave;

    protected $fillable = [
        'ruta'
    ];
    function traslados_conectando()
    {
        return $this->hasMany('App\Modelos\ColectivoPrivadoConCuba');
    }

    function lugares_recogida()
    {
        return $this->hasMany('App\Modelos\LugarRecogidaConectandoCuba');
    }

    function flexi_drive_translations()
    {
        return $this->hasMany('App\Modelos\FlexiDriveTraslation');
    }

    function tarifario_FFD()
    {
        return $this->hasOne('App\Modelos\FlexiDrive');
    }

    function reservar_conectando_cubas()
    {
        return $this->hasMany('App\Modelos\ReservarConectandoCuba');
    }
}
