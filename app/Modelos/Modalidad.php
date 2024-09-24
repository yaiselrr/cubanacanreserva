<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;
use App\Auth\PostSave;
class Modalidad extends Model
{
    use PostSave;
    protected $table = 'modalidads';

    protected $primaryKey = 'id';

    protected $fillable = [

    ];

    protected $guarded = [



    ];
    public function circuitos(){
        return $this->hasMany('Circuito');
    }
    public function traslations(){
        return $this->hasMany('App\Modelos\ModalidadTraslation','modalidads_id');
    }
    public function excursiones(){
        return $this->hasMany('Excursiones');
    }
}
