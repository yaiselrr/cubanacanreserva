<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class ReservarFlexiFlyDrive extends Model
{
    protected $fillable = ['id', 'fecha','autos_flexi_fly_drives_id','lugar_entrega','hora_entrega','lugar_recogida',
    'hora_recogida','cantidad_noches','cantidad_adultos','cantidad_ninnos','precio_total'];
    protected $table = 'reservar_flexi_drives';
    protected $primaryKey = 'id';

    function auto()
    {
        return $this->belongsTo('App\Modelos\AutosFlexiFlyDrive');
    }

    public function hoteles()
    {
        return $this->belongsToMany('App\Modelos\HotelFlexyDrive','reservar_hoteles_flexi_fly_drive','hotel_id','reserva_id')
                    ->withPivot('cantidad_habitaciones_dobles')
                    ->withTimestamps();
    }

    public function datoscliente()
    {
        return $this->belongsToMany('App\Modelos\DatosCliente','reservar_pasajeros_flexi_drive','pasajero_id','reserva_id');
    }

}
