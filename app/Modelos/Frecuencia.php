<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;
use App\Auth\PostSave;

class Frecuencia extends Model
{
    use PostSave;
    protected $fillable = ['id'];
    protected $table = 'frecuencias';
    protected $primaryKey ='id';

    function excursiones_frecuencia()
    {
        return $this->belongsTo('App\Modelos\Excursiones');
    }

    public function circuitos(){
        return $this->hasMany('App\Modelos\Circuito');
    }


    public function traslation(){
        return $this->belongsTo('App\Modelos\FrecuenciaTraslation');
    }
}
