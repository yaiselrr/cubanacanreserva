<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;
//use App\Auth\PostSave;

class ReservarConectandoCuba extends Model
{
    //
    //use PostSave;
    protected $table = 'reservar_transfer_conectando_cubas';

    protected $primaryKey = 'id';

    protected $fillable = [


        'fecha',
        'ruta_id',
        'provincia_origen_id',
        'provincia_destino_id',
        'nombre_apellidos',
        'email',
        'cantidad_adultos',
        'cantidad_infantes',
        'cantidad_ninnos',
        'lugar_recogida_id',
        'hora_recogida',
        'requerimientos_especiales',
        'en_espera',
        'total',

    ];

    protected $guarded = [


    ];

    public function ruta()
    {
        return $this->belongsTo('App\Modelos\RutaConectandoCuba', 'ruta_id');
    }

    public function provincia_origen()
    {
        return $this->belongsTo('App\Modelos\Provincia', 'provincia_origen_id');
    }

    public function provincia_destino()
    {
        return $this->belongsTo('App\Modelos\Provincia', 'provincia_destino_id');
    }

    public function lugar_recogida()
    {
        return $this->belongsTo('App\Modelos\LugarRecogidaConectandoCuba', 'lugar_recogida_id');
    }

}
