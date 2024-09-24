<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuienesSomosUpdateRequest extends FormRequest
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

            'titulo_es' => 'required',
            /*'titulo_fr' => 'required',
            'titulo_en' => 'required',
            'titulo_de' => 'required',
            'titulo_it' => 'required',
            'titulo_pt' => 'required',*/

            'descripcion_es' => 'required',
            /*'descripcion_en' => 'required',
            'descripcion_fr' => 'required',
            'descripcion_de' => 'required',
            'descripcion_it' => 'required',
            'descripcion_pt' => 'required',*/
        ];
    }

    public function attributes()
    {
        return [
            'titulo_es'=> 'titulo',
            /*'titulo_en' => 'titulo',
            'titulo_fr' => 'titulo',
            'titulo_de' => 'titulo',
            'titulo_it' => 'titulo',
            'titulo_pt' => 'titulo',*/

            'descripcion_es' => 'descripcion',
            /*'descripcion_en' => 'descripcion',
            'descripcion_fr' => 'descripcion',
            'descripcion_de' => 'descripcion',
            'descripcion_it' => 'descripcion',
            'descripcion_pt' => 'descripcion',*/

        ];
    }

    public function messages()
    {
        return [
            'required' => 'El campo :attribute es obligatorio.',
            'min'=>'El campo :attribute no se pudo subir. El tamaño del archivo debe ser mayor que 0 byte.'

        ];
    }
}
