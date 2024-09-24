<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;
use App\Auth\PostSave;

class EncuestasTraslation extends Model
{
    use PostSave;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'encuesta_traslations';

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
    protected $fillable = ['id', 'pregunta','locale','encuesta_id'];

    public function encuestas()
    {
        return $this->belongsTo('App\Modelos\Encuesta');
    }
    
}
