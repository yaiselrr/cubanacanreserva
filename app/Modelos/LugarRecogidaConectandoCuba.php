<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;
use App\Auth\PostSave;

class LugarRecogidaConectandoCuba extends Model
{
    //
    use  PostSave;
    protected $table = 'lugar_recogida_conectando_cubas';

    protected $primaryKey = 'id';

    protected $fillable = [


        'hotel_id',
        'hora_recogida',
        'area',
        'ruta_id',
        'created_by'

    ];

    protected $guarded = [



    ];
    public function hotel(){
        return $this->belongsTo('App\Modelos\Hotel','hotel_id');
    }

    public function ruta(){
        return $this->belongsTo('App\Modelos\RutaConectandoCuba','ruta_id');
    }

    function reservar_conectando_cubas()
    {
        return $this->hasMany('App\Modelos\ReservarConectandoCuba');
    }
}
