<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;
use App\Auth\PostSave;

class BuroTraslations extends Model
{
    use PostSave;
    protected $table = 'buros_traslations';

    protected $primaryKey = 'id';

    protected $fillable = [

        'nombre',
        'direccion',
        'idioma',
        'buro_id',

    ];

    protected $guarded = [

        

    ];

    

    public function buro(){
        return $this->belongsTo('Buro');
    }
}
