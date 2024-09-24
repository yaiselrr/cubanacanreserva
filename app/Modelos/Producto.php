<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;
use App\Auth\PostSave;

class Producto extends Model
{
    //
    use PostSave;

    protected $fillable = [
        'producto_id',
        'tipo_producto',
        'oferta_especial',
        'provincia_id'
    ];

    function circuitos()
    {
        return $this->belongsTo('App\Modelos\Circuito','producto_id');
    }
    function eventos()
    {
        return $this->belongsTo('App\Modelos\Evento','producto_id');
    }
    function hoteles()
    {
        return $this->belongsTo('App\Modelos\Hotel','producto_id');
    }
    function excursiones()
    {
        return $this->belongsTo('App\Modelos\Excursiones','producto_id');
    }
    function viajesmedida()
    {
        return $this->belongsTo('App\Modelos\ViajesMedida','producto_id');
    }
    function provincia()
    {
        return $this->belongsTo('App\Modelos\Provincia','provincia_id');
    }
}
