<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;
use App\Auth\PostSave;

class HotelRecogida extends Model
{
    use PostSave;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'hotel_recogidas';

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
    protected $fillable = ['hotel', 'hora', 'excursion_id'];

    function excursion()
    {
        return $this->hasOne('App\Modelos\Excursiones');
    }

    
}
