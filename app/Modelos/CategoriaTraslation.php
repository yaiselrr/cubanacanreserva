<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;
use App\Auth\PostSave;

class CategoriaTraslation extends Model
{
    use PostSave;
    protected $fillable = ['id','categoria','categoria_id','locale'];
    protected $table = 'categoria_traslations';
    protected $primaryKey ='id';

    function categoria()
    {
        return $this->hasMany('App\Modelos\Categoria');
    }
}
