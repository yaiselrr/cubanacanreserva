<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;
use App\Auth\PostSave;

class ExcursionesTraslation extends Model
{
    use PostSave;
    protected $fillable = ['excursiones_id', 'locale','id','descripcion'];
    protected $table = 'excursiones_traslations';
    protected  $primaryKey = 'id';

    function excursiones()
    {
        return $this->belongsTo('App\Modelos\Excursiones');
    }
}
