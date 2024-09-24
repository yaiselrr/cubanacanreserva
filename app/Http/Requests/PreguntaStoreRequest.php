<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PreguntaStoreRequest extends FormRequest
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
            'pregunta_es' => 'required',
            /*'pregunta_en' => 'required',
            'pregunta_fr' => 'required',
            'pregunta_de' => 'required',
            'pregunta_it' => 'required',
            'pregunta_pt' => 'required',*/

            'respuesta_es' => 'required',
            /*'respuesta_en' => 'required',
            'respuesta_fr' => 'required',
            'respuesta_de' => 'required',
            'respuesta_it' => 'required',
            'respuesta_pt' => 'required',*/

        ];
    }

    public function attributes()
    {
        return [
            'pregunta_es'=> 'pregunta',
           /* 'pregunta_en' => 'pregunta',
            'pregunta_fr' => 'pregunta',
            'pregunta_de' => 'pregunta',
            'pregunta_it' => 'pregunta',
            'pregunta_pt' => 'pregunta',*/

            'respuesta_es'=> 'respuesta',
            /*'respuesta_en' => 'respuesta',
            'respuesta_fr' => 'respuesta',
            'respuesta_de' => 'respuesta',
            'respuesta_it' => 'respuesta',
            'respuesta_pt' => 'respuesta',*/

        ];
    }

    public function messages()
    {
        return [
            'required' => 'El campo :attribute es obligatorio.',

        ];
    }
}
