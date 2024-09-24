<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;
use App\Auth\PostSave;
class CircuitoTraslations extends Model
{
    use PostSave;
    protected $table = 'circuitos_traslations';

    protected $primaryKey = 'id';

    protected $fillable = [

        'nombre',
        'modalidad',
        'itinerario',
        'descripcion',
        'idioma',
        'circuitos_id',

    ];

    protected $guarded = [



    ];
    public function circuito(){
        return $this->belongsTo('App\Modelos\Circuito','circuitos_id');
    }


}
