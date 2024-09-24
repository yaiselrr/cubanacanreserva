<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;
//use App\Auth\PostSave;

class Blog extends Model
{
    //use PostSave;
    //
    protected $table = 'blogs';

    protected $primaryKey = 'id';

    protected $fillable = [

        'imagen',
        'fecha_publicacion',

    ];

    protected $guarded = [

        

    ];
    public function traslations(){
        return $this->hasMany('App\Modelos\BlogTraslations');
    }

    public static function image($fileName, $blog)
    {

        if (request()->hasFile($fileName)) {
            $file = request()->file($fileName);
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('imagen/blogs/',$filename);
            $blog->imagen = $filename;
        }
    }
}
