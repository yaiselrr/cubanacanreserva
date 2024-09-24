<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;
use App\Auth\PostSave;

class Facilidad extends Model
{

    use PostSave;

    protected $fillable = ['id'];
    protected $table = 'facilidads';

    function facilidad_hotel()
    {
        return $this->belongsTo('App\Modelos\Hotel');
    }

    function facilidad_traslation()
    {
        return $this->belongsTo('App\Modelos\FacilidadTraslation');
    }
}
