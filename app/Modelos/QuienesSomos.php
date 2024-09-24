<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;
use App\Auth\PostSave;

class QuienesSomos extends Model
{

    use PostSave;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id','imagen'];
    protected $table = 'quienes_somos';
    protected $primaryKey ='id';

    function quienes_somos_translations()
    {
        return $this->hasMany('App\Modelos\QuienesSomosTraslation','quienessomos_id');
    }
}
