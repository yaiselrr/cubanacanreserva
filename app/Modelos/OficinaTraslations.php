<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;
use App\Auth\PostSave;
class OficinaTraslations extends Model
{
    use PostSave;
    protected $table = 'oficinas_traslations';

    protected $primaryKey = 'id';

    protected $fillable = [

    	'nombre',
    	'direccion',
    	'idioma',
    	'oficina_id',

    ];

    protected $guarded = [

    ];
    public function oficina(){
        return $this->belongsTo('Oficina');
    }
}
