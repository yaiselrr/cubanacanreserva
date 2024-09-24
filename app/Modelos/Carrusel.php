<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;
use App\Auth\PostSave;

class Carrusel extends Model
{
    use PostSave;
    protected $table = 'carrusels';

    protected $primaryKey = 'id';

    protected $fillable = [

        'imagen',

    ];

    protected $guarded = [

        

    ];

    public function traslations(){
        return $this->hasMany('App\Modelos\CarruselTraslations');
    }

    public static function image($fileName, $carrusel)
    {

        if (request()->hasFile($fileName)) {
            $file = request()->file($fileName);
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('imagen/carruseles/',$filename);
            $carrusel->imagen = $filename;
        }
    }

    public static function image2($fileName, $carrusel)
    {

        if (request()->hasFile($fileName)) {
            $file = request()->file($fileName);
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('imagen/carruseles/',$filename);
            $carrusel->imagen2 = $filename;
        }
    }

    public static function image3($fileName, $carrusel)
    {

        if (request()->hasFile($fileName)) {
            $file = request()->file($fileName);
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('imagen/carruseles/',$filename);
            $carrusel->imagen3 = $filename;
        }
    }
}
