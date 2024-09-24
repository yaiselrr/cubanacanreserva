<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;
use App\Auth\PostSave;

class Contacto extends Model
{
    use PostSave;
    protected $fillable = ['telefono','email'];
    protected $table = 'contactos';
    protected $primaryKey ='id';

    function contactos_traslations()
    {
        return $this->hasMany('App\Modelos\ContactoTraslation','contacto_id');
    }
}
