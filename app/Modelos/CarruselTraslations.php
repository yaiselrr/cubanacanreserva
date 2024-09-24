<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;
use App\Auth\PostSave;

class CarruselTraslations extends Model
{
    use PostSave;
    protected $table = 'carrusels_traslations';

    protected $primaryKey = 'id';

    protected $fillable = [

        'titulo',
        'idioma',
        'carrusels_id',

    ];

    protected $guarded = [

        

    ];

    public function carrusel(){
        return $this->belongsTo('App\Modelos\Carrusel','carrusels_id');
    }
}
