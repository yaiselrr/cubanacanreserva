<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;
use App\Auth\PostSave;

class EncuestaCliente extends Model
{
    use PostSave;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'encuesta_cliente';

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
    protected $fillable = ['id', 'travel_date', 'how_to_passed', 'rating', 'product_type', 'product_id', 'recomendation'];

    public function productos()
    {
        return $this->hasOne('App\Modelos\Producto');
    }

}
