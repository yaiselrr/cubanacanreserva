<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class ReservaExcursion extends Model
{
    protected $fillable = ['id', 'fecha_entrada', 'cantidad_adultos', 'cantidad_ninnos2a12','cantidad_ninnos0a2', 'almuerzo', 'excursion_id', 'idioma_id', 'telefono', 'nombre', 'email', 'precio_total'
        , 'hotel_recogida_id', 'hora_salida_auto', 'hora_salida_hotel_recogida', 'lugar_salida', 'tipo_cicloturismo'
        , 'tipo_excursion_delfines', 'habitacion_excursion','status_id'];
    protected $table = 'reserva_excursiones';
    protected $primaryKey = 'id';

    function excursiones()
    {
        return $this->belongsTo('App\Modelos\Excursiones');
    }

    public $rules = [
        'nombre' => 'required',
        'idioma_id' => 'required',
        'fecha_entrada' => 'required',
        'telefono' => 'required',
        'email' => 'required|email',
        'habitaciones.*' => 'sometimes',

        'cantidad_ninnos_check' => 'sometimes',
        'cantidad_adultos' => 'required_if:c,0|integer',
        'cantidad_ninnos2a12' => 'required_if:cantidad_ninnos_check,0|integer',
        'cantidad_ninnos0a2' => 'required_if:cantidad_ninnos_check,0|integer',

        'almuerzo_check' => 'sometimes',
        'almuerzo' => 'required_if:almuerzo_check,1',

        'recog_check' => 'sometimes',
        'hotel_recogida_id' => 'required_if:recog_check,1',
        'hora_salida_hotel_recogida' => 'sometimes',

        'hora_salida_auto' => 'sometimes',

        'lugar_salida_check' => 'sometimes',
        'lugar_salida' => 'required_if:lugar_salida,1',

        'tipo_cicloturismo_check' => 'sometimes',
        'tipo_cicloturismo' => 'required_if:tipo_cicloturismo_check,1',

        'tipo_excursion_delfines_check' => 'sometimes',
        'tipo_excursion_delfines' => 'required_if:tipo_excursion_delfines_check,1',

        'precio_total' => 'sometimes',
    ];

    public $attributes =
        [
            'nombre' => 'nombre y apellidos',
            'idioma_id' => 'idioma',
            'telefono' => 'teléfono',
            'email' => 'email',

            'hotel_recogida_id' => 'hotel de recogida',
            'lugar_salida' => 'lugar de salida',
            'tipo_cicloturismo' => 'tipo de cicloturismo',
            'tipo_excursion_delfines' => 'tipo de excursión con delfines',
            'cantidad_adultos' => 'cantidad de adultos',
            'cantidad_ninnos2a12' => 'cantidad de niños (2-12 años)',
            'cantidad_ninnos0a2' => 'cantidad de infante (0-12 años)',
            'almuerzo' => 'almuerzo',
        ];

    public $messages =
        [
            'required' => 'El campo :attribute es obligatorio.',
            'required_if' => 'El campo :attribute es obligatorio.',
            'integer' => 'El campo :attribute solo admite números enteros.',
            'unique' => 'El campo :attribute debe ser único. Ya existe este tipo de email',
            'email' => 'El campo :attribute no es un email válido',
        ];
}
