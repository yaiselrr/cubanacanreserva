<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DiasSemanaStoreRequest extends FormRequest
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
            'diassemana_es'=>'required|alpha|unique:dias_semana_traslations,diassemana',
            /*'diassemana_en'=>'required|alpha|unique:dias_semana_traslations,diassemana',
            'diassemana_de'=>'required|alpha|unique:dias_semana_traslations,diassemana',
            'diassemana_fr'=>'required|alpha|unique:dias_semana_traslations,diassemana',
            'diassemana_it'=>'required|alpha|unique:dias_semana_traslations,diassemana',
            'diassemana_pt'=>'required|alpha_dash|unique:dias_semana_traslations,diassemana',*/

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
            'unique'=> 'El campo :attribute debe ser único. Ya existe este valor',
            'alpha'=> 'El campo :attribute solo admite letras',
        ];
    }
}
