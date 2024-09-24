<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class Lugar extends Model
{
    //
    protected $table = 'lugars';

    protected $primaryKey = 'id';

    protected $fillable = [

    ];

    protected $guarded = [

    	

    ];
    public function eventos(){
        return $this->hasMany('Evento');
    }
    public function traslations(){
        return $this->hasMany('LugarTraslation');
    }
}
