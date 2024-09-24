<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;
use App\Auth\PostSave;
class PreciPax extends Model
{
    use PostSave;
    protected $table = 'preciopaxs';

    protected $primaryKey = 'id';

    protected $fillable = [

    	'fecha_inicio',
    	'fecha_fin',
    	'precio_habitacions',
    	'precio_habitaciond',
    	'precio_ninnos',
    	'capacidad_habitacions',
    	'capacidad_habitaciond',
        'circuitos_id',

    ];

    protected $guarded = [

    	

    ];

    public function circuito()
    {
        return $this->belongsTo('App\Modelos\Circuito','circuitos_id');
    }
}
