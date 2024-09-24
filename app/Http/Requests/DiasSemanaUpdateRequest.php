<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DiasSemanaUpdateRequest extends FormRequest
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
            'diassemana_es'=>'required|alpha',
            /*'diassemana_en'=>'required|alpha',
            'diassemana_de'=>'required|alpha',
            'diassemana_fr'=>'required|alpha',
            'diassemana_it'=>'required|alpha',
            'diassemana_pt'=>'required|alpha_dash',*/

        ];
    }

    public function attributes()
    {
        return [
            'diassemana_es'=>'dias de la semana',
            /*'diassemana_en'=>'dias de la semana',
            'diassemana_fr'=>'dias de la semana',
            'diassemana_de'=>'dias de la semana',
            'diassemana_it'=>'dias de la semana',
            'diassemana_pt'=>'dias de la semana',*/

        ];
    }

    public function messages()
    {
        return [
            'required' => 'El campo :attribute es obligatorio.',
            'alpha_dash' => 'El campo :attribute solo puede contener letras, numeros, dashes y underscores.',
        ];
    }
}
