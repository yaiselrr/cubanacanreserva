<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;
use App\Auth\PostSave;

class Duracion extends Model
{
    use PostSave;
    protected $fillable = ['id','duracion'];
    protected $table = 'duracions';
    protected $primaryKey ='id';

    function excursiones_duracion()
    {
        return $this->belongsTo('App\Excursiones');
    }
}
