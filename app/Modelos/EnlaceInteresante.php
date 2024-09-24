<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class EnlaceInteresante extends Model
{
    //
    protected $table = 'enlace_interesantes';

    protected $primaryKey = 'id';

    protected $fillable = [

    	'nombre',
    	'imagen',

    ];

    protected $guarded = [

    	

    ];
    public static function image($fileName, $enlace)
    {

        if (request()->hasFile($fileName)) {
            $file = request()->file($fileName);
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('imagen/enlaceinteresante/',$filename);
            $enlace->imagen = $filename;
        }
    }
}
