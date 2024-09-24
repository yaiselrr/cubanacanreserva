<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServicioTraslationStoreRequest extends FormRequest
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
            'descripcion_es'=> 'descripcion',
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
        ];
    }
}
