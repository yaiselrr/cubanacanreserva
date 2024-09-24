<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;
use App\Auth\PostSave;

class Excursiones extends Model
{
    use PostSave;

    protected $fillable = ['imagen', 'id', 'nombre', 'modalidads_id', 'dias_antelacion_reserva_id'
        , 'duracion_id', 'territorio_origen_id', 'territorio_destino_id', 'idioma_id', 'paxminimo', 'oferta_especial'
        , 'estado', 'dias_semana_ids', 'capacidad', 'provincia_id', 'fecha_inicio', 'fecha_fin', 'excursion_unica', 'precio_pax_unica'
        , 'precio_ninnos2a12annos_unica', 'frecuencia_id', 'excursion_auto_clasico', 'precio_pax_auto', 'hora_salida_auto'
        , 'excursion_alimentacion', 'precio_pax_almuerzo', 'precio_ninnos2a12anno_almuerzo', 'precio_pax_sin_almuerzo'
        , 'precio_ninnos2a12anno_sin_almuerzo', 'precio_pax_TI', 'precio_ninnos2a12anno_TI', 'excursion_habitacion'
        , 'precio_pax_hab_sencilla', 'precio_ninnos2a12anno_hab_sencilla', 'precio_pax_hab_dobles', 'precio_ninnos2a12anno_hab_dobles'
        , 'excursion_pinar_vinnales', 'precio_pax_Pinar', 'precio_ninnos2a12anno_Pinar', 'precio_pax_Vinnales', 'precio_ninnos2a12anno_Vinnales'
        , 'excursion_cicloturismo', 'precio_pax_con_canopy', 'precio_pax_sin_canopy', 'excursion_delfines', 'precio_pax_banno_delfines'
        , 'precio_ninnos2a12anno_banno_delfines', 'precio_pax_show_delfines', 'precio_ninnos2a12anno_show_delfines'];
    protected $table = 'excursiones';
    protected $primaryKey = 'id';

    function excursiones_traslations()
    {
        return $this->hasMany('App\Modelos\ExcursionesTraslation');
    }

    function territorio_origen()
    {
        return $this->belongsTo('App\Modelos\Provincia','territorio_origen_id');
    }

    function territorio_destino()
    {
        return $this->belongsTo('App\Modelos\Provincia','territorio_destino_id');
    }

    function provincia()
    {
        return $this->hasOne('App\Modelos\Provincia');
    }

    function duracion()
    {
        return $this->hasOne('App\Modelos\Duracion');
    }

    function frecuencia()
    {
        return $this->hasOne('App\Modelos\Frecuencia');
    }

    function idioma()
    {
        return $this->hasOne('App\Modelos\Idioma');
    }

    function dias_semana()
    {
        return $this->hasOne('App\Modelos\DiasSemana');
    }

    function hotel_recogida()
    {
        return $this->hasMany('App\HotelRecogida');
    }

    function reserva_excursiones()
    {
        return $this->hasMany('App\Modelos\ReservaExcursion');
    }

    public function modalidad()
    {
        return $this->belongsTo('App\Modelos\Modalidad','modalidads_id');
    }
}
