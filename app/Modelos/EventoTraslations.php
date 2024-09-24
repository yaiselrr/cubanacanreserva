<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class EventoTraslations extends Model
{
    //
    protected $table = 'evento_traslations';

    protected $primaryKey = 'id';

    protected $fillable = [

        'id',
        'nombre',
        'descripcion',
        'idioma',
        'evento_id',
        'resumen',

    ];

    protected $guarded = [

        

    ];
    public function evento(){
        return $this->belongsTo('App\Modelos\Evento');
    }
}
