<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;
use App\Auth\PostSave;
class CircuitoPrecio extends Model
{
    use PostSave;
    protected $table = 'circuito_precios';

    protected $primaryKey = 'id';

    protected $fillable = [

        'circuitos_id',
        'precio_paxs_id',

    ];

    protected $guarded = [

        

    ];


    public function circuito()
    {
        //return $this->belongsTo('Circuito');
        return $this->belongsTo('App\Modelos\Circuito','circuitos_id');
    }

    public function precio()
    {
        return $this->belongsTo('PreciPax');
        return $this->belongsTo('App\Modelos\PreciPax','precio_paxs_id');
    }
}
