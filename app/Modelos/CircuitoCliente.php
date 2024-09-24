<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;
use App\Auth\PostSave;

class CircuitoCliente extends Model
{
    use PostSave;
    protected $table = 'circuito_clientes';

    protected $primaryKey = 'id';

    protected $fillable = [

        'circuitos_id',
        'clientes_id',

    ];

    protected $guarded = [

        

    ];

    public function circuito()
    {
        return $this->belongsTo('Circuito');
    }

    public function cliente()
    {
        return $this->belongsTo('Cliente');
    }
}
