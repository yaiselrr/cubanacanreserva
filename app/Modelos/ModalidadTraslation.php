<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;
use App\Auth\PostSave;
class ModalidadTraslation extends Model
{
    use PostSave;
    protected $table = 'modalidad_traslations';

    protected $primaryKey = 'id';

    protected $fillable = [

    	'nombre'

    ];

    protected $guarded = [

    	

    ];
    public function circuitos(){
        return $this->hasMany('App\Modelos\Circuito');
    }
}
