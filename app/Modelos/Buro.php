<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;
use App\Auth\PostSave;

class Buro extends Model
{
    use PostSave;
    protected $table = 'buros';

    protected $primaryKey = 'id';

    protected $fillable = [

        'telefono',
        'oficina_id',

    ];

    protected $guarded = [

        

    ];

    public function oficina(){
        return $this->hasMany('App\Modelos\Oficina');
    }

    public function traslations(){
        return $this->hasMany('App\Modelos\BuroTraslations');
    }
}
