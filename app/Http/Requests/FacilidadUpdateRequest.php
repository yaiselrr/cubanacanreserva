<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FacilidadUpdateRequest extends FormRequest
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
            'facilidad_es'=>'required',
            /*'facilidad_en'=>'required',
            'facilidad_fr'=>'required',
            'facilidad_de'=>'required',
            'facilidad_it'=>'required',
            'facilidad_pt'=>'required',*/
        ];
    }

    public function attributes()
    {
        return [
            'facilidad_es'=> 'facilidad',
           /* 'facilidad_en' => 'facilidad',
            'facilidad_fr' => 'facilidad',
            'facilidad_de' => 'facilidad',
            'facilidad_it' => 'facilidad',
            'facilidad_pt' => 'facilidad',*/


        ];
    }

    public function messages()
    {
        return [
            'required' => 'El campo :attribute es obligatorio.',
        ];
    }
}
