<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

use App\Auth\PostSave;

class ContactoTraslation extends Model
{
    use PostSave;
    protected $fillable = ['contacto_id', 'locale','id','direccion'];
    protected $table = 'contacto_traslations';
    protected  $primaryKey = 'id';

    function contactos()
    {
        return $this->belongsTo('App\Modelos\Contacto');
    }
}
