<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;
use App\Auth\PostSave;

class QuienesSomosTraslation extends Model
{
    use PostSave;
    protected $fillable = ['quienessomos_id', 'locale','id','titulo','descripcion'];
    protected $table = 'quienes_somos_traslations';
    protected  $primaryKey = 'id';

    function quienes_somos()
    {
        return $this->belongsTo('App\Modelos\QuienesSomos');
    }
}
