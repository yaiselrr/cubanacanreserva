<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AutosFlexiFlyDriveUpdateRequest extends FormRequest
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
            'imagen' => 'sometimes|mimes:jpg,png,gif,jpeg|min:1',
            'capacidad_pasajero' => 'required|integer',
            'aire_acondicionado' => 'required',
            'air_baqs' => 'required',
            'puertas' => 'required|integer',
            'motor' => 'required',
            'categoria' => 'required',
            'rentadora' => 'required',
            'reproductor' => 'required',
            'trasnmision' => 'required',
            'tipo' => 'required',
            'caracteristicas_es'=>'required',
            /*'caracteristicas_en'=>'required',
            'caracteristicas_fr'=>'required',
            'caracteristicas_de'=>'required',
            'caracteristicas_it'=>'required',
            'caracteristicas_pt'=>'required',*/
        ];
    }
    public function attributes()
    {
        return [
            'caracteristicas_es'=> 'caracteristicas',
            /*'caracteristicas_en' => 'caracteristicas',
            'caracteristicas_fr' => 'caracteristicas',
            'caracteristicas_de' => 'caracteristicas',
            'caracteristicas_it' => 'caracteristicas',
            'caracteristicas_pt' => 'caracteristicas',*/

        ];
    }

    public function messages()
    {
        return [
            'required' => 'El campo :attribute es obligatorio.',
            'mimes' => 'El campo :attribute solo permite extensiones de tipo: :values.',
            'integer' => 'El campo :attribute solo admite números enteros.',
            'min'=>'El campo :attribute no se pudo subir. El tamaño del archivo debe ser mayor que 0 byte.'

        ];
    }
}
