<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReservarViajesMedidaRequest extends FormRequest
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
            'nombre' => 'required',
            'fecha' => 'required',
            'email' => 'required|email|unique:reserva_viajes_medidas',
            'cantidad_adultos' => 'required|integer',
            'cantidad_ninnos2a12' => 'required|integer',
            'cantidad_ninnos0a2' => 'required|integer',
            'req_especiales' => 'required',
            'precio_total' => 'sometimes',
        ];
    }

    public function attributes()
    {
        return [
            'nombre' => 'nombre y apellidos',
            'email' => 'email',
            'cantidad_adultos' => 'cantidad de adultos',
            'cantidad_ninnos2a12' => 'cantidad de niños (2-12 años)',
            'cantidad_ninnos0a2' => 'cantidad de infante (0-12 años)',
            'req_especiales' => 'requerimientos especiales',

        ];
    }

    public function messages()
    {
        return [
            'required' => 'El campo :attribute es obligatorio.',
            'required_if' => 'El campo :attribute es obligatorio.',
            'integer' => 'El campo :attribute solo admite números enteros.',
            'unique' => 'El campo :attribute debe ser único. Ya existe este tipo de email',
            'email' => 'El campo :attribute no es un email válido',

        ];
    }
}
