<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;
use App\Auth\PostSave;

class Hotel extends Model
{
    use PostSave;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'imagen','nombre', 'telefono', 'email', 'plan_alojamiento_id',
        'dias_antelacion_reserva_id', 'categoria_id', 'precio_desde', 'oferta_especial',
        'estado', 'facilidades_ids', 'provincia_id'];
    protected $table = 'hotels';
    protected $primaryKey = 'id';

    function hoteles_translations()
    {
        return $this->hasMany('App\Modelos\HotelTraslation','hotel_id');
    }

    function provincia()
    {
            return $this->hasOne('App\Modelos\Provincia');
    }
        function categoria()
        {
            return $this->hasOne('App\Modelos\Categoria');
        }
        function facilidad()
        {
            return $this->hasOne('App\Modelos\Facilidad');
        }

        function planalojamiento()
        {
            return $this->hasOne('App\Modelos\PlanAlojamiento');
        }

        function hotel_precios_pax_hotel()
        {
            return $this->hasMany('App\Modelos\PreciosPaxHotel');
        }

    function flexy_drives()
    {
        return $this->hasMany('App\Modelos\HotelFlexyDrive');
    }

    function reserva_habitacion_hotel()
    {
        return $this->hasMany('App\Modelos\ReservaHabitacionHotel');
    }

    function lugares_recogida()
    {
        return $this->hasMany('App\Modelos\LugarRecogidaConectandoCuba');
    }
    function eventos()
    {
        return $this->hasMany('App\Modelos\Evento');
    }
    function productos()
    {
        return $this->hasMany('App\Modelos\Producto');
    }

}
