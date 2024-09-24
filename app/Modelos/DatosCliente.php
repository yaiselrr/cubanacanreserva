<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;
use App\Auth\PostSave;

class DatosCliente extends Model
{

   // use PostSave;

    protected $fillable = ['id', 'fecha_nacimiento','nacionalidad_id', 'numero_pasaporte', 'nombre'
        , 'reserva_hab_hotel_id', 'reserva_hab_circuito_id','numero_vuelo_arribo_cuba'];
    protected $table = 'datos_clientes';
    protected $primaryKey = 'id';

    function reserva_habitacion_hotel()
    {
        return $this->belongsTo('App\Modelos\ReservaHabitacionHotel');
    }

    function reserva_habitacion_circuitos()
    {
        return $this->belongsTo('App\Modelos\ReservaHabitacionCircuito');
    }

    public function resevar_flexi_fly_drives()
    {
        return $this->belongsToMany('App\Modelos\ReservarFlexiFlyDrive','reservar_pasajeros_flexi_drive','pasajero_id','reserva_id');
    }


}
