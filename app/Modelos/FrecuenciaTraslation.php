<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;
use App\Auth\PostSave;
class FrecuenciaTraslation extends Model
{
    use PostSave;
    protected $table = 'frecuencia_traslations';

    protected $primaryKey = 'id';

    protected $fillable = ['frecuencia', 'id','frecuencias_id','locale'];

    protected $guarded = [];

    public function circuitos(){
        return $this->hasMany('App\Modelos\Circuito');
    }
    public function frecuencia()
    {
        return $this->belongsTo('App\Modelos\Frecuencia');
    }
}
