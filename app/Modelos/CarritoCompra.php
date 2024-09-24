<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class CarritoCompra extends Model
{
    protected $fillable = ['id', 'total_precio', 'nombre_producto', 'estado','tipo_producto'
        ,'reserva_hab_hotel_id', 'reserva_hab_circuito_id', 'reserva_viajes_medida_id','reserva_excursion_id','reservar_flexi_drives_id'];
    protected $table = 'carrito_compras';
    protected $primaryKey = 'id';

    function circuito()
    {
        return $this->belongsTo('App\Modelos\Circuito');
    }

    function hotel()
    {
        return $this->belongsTo('App\Modelos\Hotel');
    }

    function viajes_medida()
    {
        return $this->belongsTo('App\Modelos\ViajesMedida');
    }

    function excursiones()
    {
        return $this->belongsTo('App\Modelos\Excursiones');
    }
}
