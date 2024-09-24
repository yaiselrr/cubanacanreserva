<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;
use App\Auth\PostSave;

class BlogTraslations extends Model
{
   use PostSave;

    protected $table = 'blogs_traslations';

    protected $primaryKey = 'id';

    protected $fillable = [

        'titulo',
        'idioma',
        'descripcion',
        'blogs_id',

    ];

    protected $guarded = [

        

    ];



    public function blog(){
        return $this->belongsTo('App\Modelos\Blog','blogs_id');
    }
}
