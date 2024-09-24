<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;
use App\Auth\PostSave;

class Categoria extends Model
{
    use PostSave;
    protected $fillable = ['id'];
    protected $table = 'categorias';
    protected $primaryKey ='id';

    function hotel_categoria()
    {
        return $this->belongsTo('App\Modelos\Hotel');
    }

    function categoria_traslation()
    {
        return $this->belongsTo('App\Modelos\CategoriaTraslation');
    }
}
