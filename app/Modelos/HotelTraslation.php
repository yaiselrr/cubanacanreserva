<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;
use App\Auth\PostSave;

class HotelTraslation extends Model
{
    use PostSave;
    protected $fillable = [
        'id','direccion','descripcion','locale','hotel_id'
    ];
    protected $table = 'hotel_traslations';
    protected $primaryKey ='id';

    function hotel()
    {
        return $this->belongsTo('App\Modelos\Hotel');
    }

    function precios_pax_hotel()
    {
        return $this->belongsTo('App\Hotel');
    }

}
