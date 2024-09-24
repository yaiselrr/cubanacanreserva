<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;
use App\Auth\PostSave;
class Circuito extends Model
{
    use PostSave;
    protected $table = 'circuitos';

    protected $primaryKey = 'id';

    protected $fillable = [


        'es',
        'en',
        'dt',
        'fr',
        'it',
        'pt',
        'oferta_especial',
        'imagen',
        'fecha_inicio',
        'fecha_fin',
        'frecuencias_id',
        'modalidads_id',
        'dias_semanas_id',
        'duracions_id',
        'detalles',
        'mapa',
        'precio_desde',
        'pax_min',
        'dias_antelacions_id',
        'provincias_id',
        'esta_activo',
        //'km',

    ];

    protected $guarded = [



    ];
    public function circuitostras(){
        return $this->hasMany('App\Modelos\CircuitoTraslations','circuitos_id');
    }


    public function provincia()
    {
        return $this->belongsTo('App\Modelos\Provincia','provincias_id');
    }
    public function modalidad()
    {
        return $this->belongsTo('App\Modelos\Modalidad','modalidads_id');
    }
    public function dias_semana()
    {
        return $this->belongsTo('App\Modelos\DiasSemana');
    }
    public function duracion()
    {
        return $this->belongsTo('App\Modelos\Duracion');
    }
    public function precio()
    {
        return $this->hasMany('App\Modelos\PreciPax');
    }
    public function frecuencia()
    {
        return $this->belongsTo('App\Modelos\FrecuenciaTraslation','frecuencias_id');
    }
    public function dias_antelacion()
    {
        return $this->belongsTo('App\Modelos\DiasAntelacion');
    }

    function reserva_habitacion_circuitos()
    {
        return $this->hasMany('App\Modelos\ReservaHabitacionCircuito');
    }

    function productos()
    {
        return $this->hasMany('App\Modelos\Producto');
    }

    public static function image($fileName, $circuito)
    {

        if (request()->hasFile($fileName)) {
            $file = request()->file($fileName);
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('imagen/circuitos/',$filename);
            $circuito->imagen = $filename;
        }
    }

    public static function detalle($fileName, $circuito)
    {

        if (request()->hasFile($fileName)) {
            $file = request()->file($fileName);
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('detalle/circuitos/',$filename);
            $circuito->detalles = $filename;
        }
    }

    public static function map($fileName, $circuito)
    {

        if (request()->hasFile($fileName)) {
            $file = request()->file($fileName);
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('mapa/circuitos/',$filename);
            $circuito->mapa = $filename;
        }
    }

}
