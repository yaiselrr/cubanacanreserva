<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FrecuenciaUpdateRequest extends FormRequest
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
            'frecuencia_es'=>'required',
            /*'frecuencia_en'=>'required',
            'frecuencia_fr'=>'required',
            'frecuencia_de'=>'required',
            'frecuencia_it'=>'required',
            'frecuencia_pt'=>'required',*/
        ];
    }

    public function attributes()
    {
        return [
            'frecuencia_es'=>'frecuencia',
           /* 'frecuencia_en'=>'frecuencia',
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
        ];
    }
}
