<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PreciosPorViajesMedidaUpdateRequest extends FormRequest
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
            'capacidad' => 'required|integer',
            'fecha_inicio' => 'required',
            'fecha_fin' => 'required|after_or_equal:fecha_inicio',
            'precio_x_pax' => 'required|numeric',
            'precio_ninnos_12annos' => 'required|numeric',
            'dias_antelacion_rese_id' => 'required',
            'viaje_medida_id' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'precio_ninnos_12annos'=> 'precio niños',
            'dias_antelacion_rese_id' => 'dias antelacion reservacion',
            'viaje_medida_id' => 'viaje medida',

        ];
    }

    public function messages()
    {
        return [
            'after_or_equal' => 'El campo fecha fin no puede ser menor que el campo de inicio',
            'required' => 'El campo :attribute es obligatorio.',
            'numeric' => 'El campo :attribute solo admite números enteros o números decimales separados por punto.',
            'integer' => 'El campo :attribute solo admite números enteros.',
        ];
    }
}
