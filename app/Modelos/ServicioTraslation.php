<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;
use App\Auth\PostSave;

class ServicioTraslation extends Model
{
    use PostSave;
    protected $fillable = ['servicio_id', 'locale','id','descripcion'];
    protected $table = 'servicio_traslations';
    protected  $primaryKey = 'id';

    function servicios()
    {
        return $this->belongsTo('App\Modelos\Servicio');
    }
}
