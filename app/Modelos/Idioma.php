<?php

namespace App\Modelos;
use App\Auth\PostSave;

use Illuminate\Database\Eloquent\Model;

class Idioma extends Model
{
    use PostSave;
    protected $fillable = ['id','idioma'];
    protected $table = 'idiomas';
    protected $primaryKey ='id';

    function excursiones_idioma()
    {
        return $this->belongsTo('App\Modelos\Excursiones');
    }
}
