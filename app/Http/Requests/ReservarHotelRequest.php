<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReservarHotelRequest extends FormRequest
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
            'fecha_entrada' => 'required',
            'tipo_habitacion' => 'required',
            'cantidad_noche' => 'required|integer',
            'chek_tipohab' => 'sometimes',
            'cantidad_adultos' => 'required_if:chek_tipohab,1|integer',
            'cantidad_ninnos2a12' => 'required|integer',
            'cantidad_ninnos0a2' => 'required|integer',
            'req_especiales' => 'sometimes',
            'precio_total' => 'sometimes',
        ];
    }

    public function attributes()
    {
        return [
            'fecha_entrada' => 'fecha de entrada',
            'tipo_habitacion' => 'tipo de habitación',
            'cantidad_noche' => 'cantidad de noches',
            'cantidad_adultos' => 'cantidad de adultos',
            'cantidad_ninnos2a12' => 'cantidad de niños (2-12 años)',
            'cantidad_ninnos0a2' => 'cantidad de infante (0-12 años)',

        ];
    }

    public function messages()
    {
        return [
            'required' => 'El campo :attribute es obligatorio.',
            'required_if'=> 'El campo :attribute es obligatorio.',
            'integer' => 'El campo :attribute solo admite números enteros.',
        ];
    }
}
