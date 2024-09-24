<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;
use App\Auth\PostSave;
class Mapa extends Model
{
    use PostSave;
    public static function imag($fileName, $circuito)
    {

        if (request()->hasFile($fileName)) {
            $file = request()->file($fileName);
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('imagen/circuitos/',$filename);
            $circuito->imagen = $filename;
        }
    }
}
