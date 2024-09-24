<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoriaStoreRequest extends FormRequest
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
            'categoria_es'=>'required|unique:categoria_traslations,categoria',
            /*'categoria_en'=>'required|unique:categoria_traslations,categoria',
            'categoria_fr'=>'required|unique:categoria_traslations,categoria',
            'categoria_de'=>'required|unique:categoria_traslations,categoria',
            'categoria_it'=>'required|unique:categoria_traslations,categoria',
            'categoria_pt'=>'required|unique:categoria_traslations,categoria'*/

        ];
    }

    public function attributes()
    {
        return [
            'categoria_es'=> 'categoria',
            /*'categoria_en' => 'categoria',
            'categoria_fr' => 'categoria',
            'categoria_de' => 'categoria',
            'categoria_it' => 'categoria',
            'categoria_pt' => 'categoria',*/


        ];
    }

    public function messages()
    {
        return [
            'required' => 'El campo :attribute es obligatorio.',
            'unique'=> 'El campo :attribute debe ser único. Ya existe este tipo de categoria',
        ];
    }
}
