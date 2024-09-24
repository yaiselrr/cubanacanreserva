<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PreciosPaxHotelUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'cantidad_hab_sencillas' => 'required|integer',
            'fecha_inicio' => 'required',
            'fecha_fin' => 'required|after_or_equal:fecha_inicio',
            'cantidad_hab_dobles' => 'required|integer',
            'cantidad_hab_triples' => 'required|integer',

            'variante2adultos_hasta2ninnos_2a12annos' => 'sometimes',
            'precio_adulto_variante2adultos' => 'required_if:variante2adultos_hasta2ninnos_2a12annos,on|numeric|min:0',
            'precio_1er_ninno_variante2adultos' => 'required_if:variante2adultos_hasta2ninnos_2a12annos,on|numeric|min:0',
            'precio_2do_ninno_variante2adultos' => 'required_if:variante2adultos_hasta2ninnos_2a12annos,on|numeric|min:0',

            'variante1adulto_hasta3ninnos_2a12annos' => 'sometimes',
            'precio_adulto_variante1adulto' => 'required_if:variante1adulto_hasta3ninnos_2a12annos,on|numeric|min:0',
            'precio_1er_ninno_variante1adulto' => 'required_if:variante1adulto_hasta3ninnos_2a12annos,on|numeric|min:0',
            'precio_2do_ninno_variante1adulto' => 'required_if:variante1adulto_hasta3ninnos_2a12annos,on|numeric|min:0',
            'precio_3er_ninno_variante1adulto' => 'required_if:variante1adulto_hasta3ninnos_2a12annos,on|numeric|min:0',

            'variante2adultos_2hasta3ninnos_2a12annos' => 'sometimes',
            'precio_adulto_variante2adultos_2hasta3ninnos' => 'required_if:variante2adultos_2hasta3ninnos_2a12annos,on|numeric|min:0',
            'precio_1er_ninno_variante1adultos_variante2adultos_2hasta3ninnos' => 'required_if:variante2adultos_2hasta3ninnos_2a12annos,on|numeric|min:0',
            'precio_2do_ninno_variante1adultos_variante2adultos_2hasta3ninnos' => 'required_if:variante2adultos_2hasta3ninnos_2a12annos,on|numeric|min:0',
            'precio_3er_ninno_variante1adultos_variante2adultos_2hasta3ninnos' => 'required_if:variante2adultos_2hasta3ninnos_2a12annos,on|numeric|min:0',

            'variante3adultos_mismahabitacion' => 'sometimes',
            'precio_adulto_variante3adultos_mismahabitacion' => 'required_if:variante3adultos_mismahabitacion,on|numeric|min:0',

            'variante1adulto_mismahabitacion' => 'sometimes',
            'precio_adulto_variante1adulto_mismahabitacion' => 'required_if:variante1adulto_mismahabitacion,on|numeric|min:0',
            'hotel_id' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'precio_adulto_variante2adultos'=> 'precio adulto',
            'precio_1er_ninno_variante2adultos' => 'precio 1er niño',
            'precio_2do_ninno_variante2adultos' => 'precio 2do niño',

            'precio_adulto_variante1adulto' => 'precio adulto',
            'precio_1er_ninno_variante1adulto' => 'precio 1er niño',
            'precio_2do_ninno_variante1adulto' => 'precio 2do niño',
            'precio_3er_ninno_variante1adulto' => 'precio 3er niño',

            'precio_adulto_variante2adultos_2hasta3ninnos' => 'precio adulto',
            'precio_1er_ninno_variante1adultos_variante2adultos_2hasta3ninnos' => 'precio 1er niño',
            'precio_2do_ninno_variante1adultos_variante2adultos_2hasta3ninnos' => 'precio 2do niño',
            'precio_3er_ninno_variante1adultos_variante2adultos_2hasta3ninnos' => 'precio 3er niño',

            'precio_adulto_variante3adultos_mismahabitacion' => 'precio adulto',

            'precio_adulto_variante1adulto_mismahabitacion' => 'precio adulto',

            'hotel_id'=>'hotel'

        ];
    }

    public function messages()
    {
        return [
            'fecha_fin.after_or_equal' => 'El campo fecha fin no puede ser menor que el campo de inicio',
            'required' => 'El campo :attribute es obligatorio.',
            'required_if' => 'El campo :attribute es obligatorio',
            'numeric' => 'El campo :attribute solo admite números enteros o números decimales separados por punto.',
            'integer' => 'El campo :attribute solo admite números enteros.',
        ];
    }
}
