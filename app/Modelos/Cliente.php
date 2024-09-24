<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;
use App\Auth\PostSave;

class Cliente extends Model
{
    use PostSave;
    protected $table = 'clientes';

    protected $primaryKey = 'id';

    protected $fillable = [

        'nombre',
        'apaterno',
        'amaterno',
        'pasaporte',
        'nacionalidad_id',
        'fecha',

    ];

    protected $guarded = [

        

    ];

    

    
}
