<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;
use App\Auth\PostSave;

class Servicio extends Model
{
    use PostSave;
    protected $fillable = ['id'];
    protected $table = 'servicios';
    protected $primaryKey ='id';

    function servicios_translations()
    {
        return $this->hasMany('App\Modelos\ServicioTraslation');
    }
}
