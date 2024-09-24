<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;
use App\Auth\PostSave;

class DiasAntelacionReserva extends Model
{
    use PostSave;

    protected $fillable = [
        'dias','id'
    ];
    protected $table = 'dias_antelacion_reservas';

    function dias_antelacion_rese_flexi_drive()
    {
        return $this->belongsTo('App\FlexiDrive');
    }

    function traslados_conectando()
    {
        return $this->hasMany('App\Modelos\ColectivoPrivadoConCuba');
    }
}
