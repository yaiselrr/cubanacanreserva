<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HotelEventoStoreRequest extends FormRequest
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
            'hotel'=>'required||unique:hotel_eventos',
            'cantidad_habitaciones_sencillas'=>'required|integer',
            'cantidad_habitaciones_dobles'=>'required|integer',
            'precio_habitacion_sencillas'=>'required|numeric|min:0',
            'precio_habitacion_dobles'=>'required|numeric|min:0',
        ];
    }

    public function attributes()
    {
        return [
            'hotel'=>'Nombre del Hotel'

        ];
    }
    public function messages()
    {
        return [
            'required' => 'El campo :attribute es obligatorio.',
            'hotel_ids.required' => 'El campo :attribute es obligatorio. Lista Vacia',
            'integer' => 'El campo :attribute solo admite números enteros.',
            'unique'=> 'El campo :attribute debe ser único. Ya existe este tipo de nombre',
            'numeric' => 'El campo :attribute solo admite números enteros o números decimales separados por punto.',

        ];
    }
}
