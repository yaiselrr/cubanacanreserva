<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    //
    protected $table = 'eventos';

    protected $primaryKey = 'id';

    protected $fillable = [

        'id',
        'imagen',
        'dias_antelacions_id',
        'lugars_id',
        'fecha_inicio',
        'fecha_fin',
        'cuota',
        'convocatoria',
        'programa',
        'provincia_id',
        'oferta_especial',
        'servicio_transporte',

    ];

    protected $guarded = [

        

    ];

    public function traslations(){
        return $this->hasMany('App\Modelos\EventoTraslations');
    }

    public function provincia()
    {
        return $this->belongsTo('App\Modelos\Provincia');
    }

    public function lugar(){
        return $this->belongsTo('App\Modelos\Hotel','lugars_id');
    }

    public function dia_antelacion()
    {
        return $this->belongsTo('App\Modelos\DiasAntelacion');
    }

    public function clase()
    {
    return $this->belongsTo('App\Class');
    }

    public function course()
    {
    return $this->clase->belongsTo('App\Course');
    }
    function productos()
    {
        return $this->hasMany('App\Modelos\Producto');
    }

    public static function image($fileName, $evento)
    {

        if (request()->hasFile($fileName)) {
            $file = request()->file($fileName);
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('evento/imagen/',$filename);
            $evento->imagen = $filename;
        }
    }

    public static function convocatoria($fileName, $evento)
    {

        if (request()->hasFile($fileName)) {
            $file = request()->file($fileName);
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('evento/convocatoria/',$filename);
            $evento->convocatoria = $filename;
        }
    }
    public static function programa($fileName, $evento)
    {

        if (request()->hasFile($fileName)) {
            $file = request()->file($fileName);
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('evento/programa/',$filename);
            $evento->programa = $filename;
        }
    }
}
