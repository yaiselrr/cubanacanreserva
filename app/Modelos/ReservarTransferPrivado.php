<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class ReservarTransferPrivado extends Model
{
    //
    protected $table = 'reservar_transfer_privados';

    protected $primaryKey = 'id';

    protected $fillable = [


        'fecha_inicio',
        'fecha_fin',
        'provincia_origen_id',
        'provincia_destino_id',
        'incluir_guia',
        'tipo_vehiculo',
        'nombre_apellidos',
        'email',
        'cantidad_adultos',
        'cantidad_infantes',
        'cantidad_ninnos',
        'lugar_inicio',
        'lugar_fin',
        'hora_inicio',
        'hora_fin',
        'nacionalidad_id',
        'no_vuelo',
        'requerimientos_especiales',
        'en_espera',
        'total',

    ];

    protected $guarded = [


    ];


    public function provincia_origen()
    {
        return $this->belongsTo('App\Modelos\Provincia', 'provincia_origen_id');
    }

    public function provincia_destino()
    {
        return $this->belongsTo('App\Modelos\Provincia', 'provincia_destino_id');
    }

    public function nacionalidad()
    {
        return $this->belongsTo('App\Modelos\Nacionalidad', 'provincia_destino_id');
    }
}
