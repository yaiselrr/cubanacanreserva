<?php

namespace App\Modelos;
use App\Auth\PostSave;

use Illuminate\Database\Eloquent\Model;

class FacilidadTraslation extends Model
{
    use PostSave;

    protected $fillable = ['facilidad','id','facilidad_id','locale'];
    protected $table = 'facilidad_traslations';

    function facilidad_hotel()
    {
        return $this->belongsTo('App\Modelos\Hotel');
    }

    function facilidad()
    {
        return $this->hasMany('App\Modelos\Facilidad');
    }
}
