<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EncuestaUpdateRequest extends FormRequest
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
            'pregunta_es'=>'required',
            /*'pregunta_en'=>'required',
            'pregunta_fr'=>'required',
            'pregunta_de'=>'required',
            'pregunta_it'=>'required',
            'pregunta_pt'=>'required',*/


        ];
    }

    public function attributes()
    {
        return [
            'pregunta_es'=> 'pregunta',
            'pregunta_en' => 'pregunta',
            'pregunta_fr' => 'pregunta',
            'pregunta_de' => 'pregunta',
            'pregunta_it' => 'pregunta',
            'pregunta_pt' => 'pregunta',

        ];
    }

    public function messages()
    {
        return [
            'required' => 'El campo :attribute es obligatorio.',
        ];
    }
}
