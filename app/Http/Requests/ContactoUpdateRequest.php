<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactoUpdateRequest extends FormRequest
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
            'telefono' => 'required',
            'email' => 'required|email',
            'direccion_es' => 'required',
            /*'direccion_en' => 'required',
            'direccion_fr' => 'required',
            'direccion_de' => 'required',
            'direccion_it' => 'required',
            'direccion_pt' => 'required',*/
        ];
    }

    public function attributes()
    {
        return [
            'direccion_es'=> 'direccion',
           /* 'direccion_en' => 'direccion',
            'direccion_fr' => 'direccion',
            'direccion_de' => 'direccion',
            'direccion_it' => 'direccion',
            'direccion_pt' => 'direccion',*/

        ];
    }

    public function messages()
    {
        return [
            'required' => 'El campo :attribute es obligatorio.',
            'email' => 'El campo :attribute no es válido',

        ];
    }
}
