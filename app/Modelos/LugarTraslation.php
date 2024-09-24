<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;
use App\Auth\PostSave;
class LugarTraslation extends Model
{
    use PostSave;
    protected $table = 'lugar_traslations';

    protected $primaryKey = 'id';

    protected $fillable = [

    	'nombre'

    ];

    protected $guarded = [

    	

    ];
    public function lugar(){
        return $this->belongsTo('Lugar');
    }
}
