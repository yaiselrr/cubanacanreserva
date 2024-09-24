<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FrecuenciaStoreRequest extends FormRequest
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
            'frecuencia_es'=>'required|unique:frecuencia_traslations,frecuencia',
           /* 'frecuencia_en'=>'required|unique:frecuencia_traslations,frecuencia',
            'frecuencia_fr'=>'required|unique:frecuencia_traslations,frecuencia',
            'frecuencia_de'=>'required|unique:frecuencia_traslations,frecuencia',
            'frecuencia_it'=>'required|unique:frecuencia_traslations,frecuencia',
            'frecuencia_pt'=>'required|unique:frecuencia_traslations,frecuencia',*/
        ];
    }

    public function attributes()
    {
        return [
            'frecuencia_es'=>'frecuencia',
            /*'frecuencia_en'=>'frecuencia',
            'frecuencia_fr'=>'frecuencia',
            'frecuencia_de'=>'frecuencia',
            'frecuencia_it'=>'frecuencia',
            'frecuencia_pt'=>'frecuencia',*/

        ];
    }

    public function messages()
    {
        return [
            'required' => 'El campo :attribute es obligatorio.',
            'unique'=> 'El campo :attribute debe ser único. Ya existe este tipo de frecuencia',
        ];
    }
}
