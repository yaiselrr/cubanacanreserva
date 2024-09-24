<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;
use App\Auth\PostSave;

class Oficina extends Model
{
    use PostSave;
    protected $table = 'oficinas';

    protected $primaryKey = 'id';

    protected $fillable = [
    	'telefono'
    ];

    protected $guarded = [
    ];

    public function buros(){
        return $this->belongsTo('App\Modelos\Buro');
    }

    public function traslations(){
        return $this->hasMany('App\Modelos\OficinaTraslations');
    }
}
