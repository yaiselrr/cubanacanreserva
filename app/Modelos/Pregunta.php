<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Auth\PostSave;

class Pregunta extends Model
{

    use PostSave;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id'];
    protected $table = 'preguntas';
    protected $primaryKey ='id';

    function preguntas_traslations()
    {
        return $this->hasMany('App\Modelos\PreguntaTraslation');
    }

}
