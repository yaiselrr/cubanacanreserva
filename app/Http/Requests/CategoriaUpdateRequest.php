<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoriaUpdateRequest extends FormRequest
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
            'categoria_es'=>'required',
            /*'categoria_en'=>'required',
            'categoria_fr'=>'required',
            'categoria_de'=>'required',
            'categoria_it'=>'required',
            'categoria_pt'=>'required'*/

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
        ];
    }
}
