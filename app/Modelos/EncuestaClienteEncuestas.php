<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;
use App\Auth\PostSave;

class EncuestaClienteEncuestas extends Model
{
    use PostSave;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'encuesta_cliente_encuestas';

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
    protected $fillable = ['survey_id', 'encuestas_id', 'value'];

}
