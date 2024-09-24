<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;
use App\Auth\PostSave;

class Encuesta extends Model
{
    use PostSave;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'encuestas';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id'];

    public function encuesta_traslations()
    {
        return $this->hasMany('App\Modelos\EncuestasTraslation');
    }
    
}
