<?php

namespace App\Modelos;
use App\Auth\PostSave;

use Illuminate\Database\Eloquent\Model;

class PreguntaTraslation extends Model
{
    use PostSave;
    protected $fillable = ['pregunta_id', 'locale','id','pregunta','respuesta'];
    protected $table = 'pregunta_traslations';
    protected  $primaryKey = 'id';

    function preguntas()
    {
        return $this->belongsTo('App\Modelos\Pregunta');
    }
}
