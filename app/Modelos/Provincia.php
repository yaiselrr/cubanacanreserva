<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;
use App\Auth\PostSave;

class Provincia extends Model
{
    use PostSave;

    protected $fillable = [
        'provincia'
    ];
    function hotel_provincia()
    {
        return $this->hasMany('App\Hotel');
    }
    public function traslados_conectando(){
        return $this->hasMany('App\Modelos\ColectivoPrivadoConCuba');
    }

    public function circuitos(){
        return $this->hasMany('App\Modelos\Circuito');
    }

    function reservar_conectando_cubas()
    {
        return $this->hasMany('App\Modelos\ReservarConectandoCuba');
    }
}
