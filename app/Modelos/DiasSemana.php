<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;
use App\Auth\PostSave;

class DiasSemana extends Model
{
    use PostSave;
    protected $fillable = ['id'];
    protected $table = 'dias_semanas';
    protected $primaryKey ='id';

    function excursiones_dias_semana()
    {
        return $this->belongsTo('App\Modelos\Excursiones');
    }

    function dias_semana_traslation()
    {
        return $this->belongsTo('App\Modelos\DiasSemanaTraslation');
    }
}
