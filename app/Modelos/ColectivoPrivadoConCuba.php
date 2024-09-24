<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;
use App\Auth\PostSave;
class ColectivoPrivadoConCuba extends Model
{
    use  PostSave;
    protected $table = 'colectivos_privados_cons_cubas';

    protected $primaryKey = 'id';

    protected $fillable = [


        'provincia_origen_id',
        'provincia_destino_id',
        'precio_pax',
        'precio_ninnos',
        'dias_antelacion_id',
        'ruta_id',
        'created_by'

    ];

    protected $guarded = [

        

    ];
    public function ruta(){
        return $this->belongsTo('App\Modelos\RutaConectandoCuba','ruta_id');
    }

    public function provincia_origen(){
        return $this->belongsTo('App\Modelos\Provincia','provincia_origen_id');
    }

    public function provincia_destino(){
        return $this->belongsTo('App\Modelos\Provincia','provincia_destino_id');
    }

    public function dias_antelacion(){
        return $this->belongsTo('App\Modelos\DiasAntelacionReserva','dias_antelacion_id');
    }
}
