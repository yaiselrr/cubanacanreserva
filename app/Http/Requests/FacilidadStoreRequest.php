<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FacilidadStoreRequest extends FormRequest
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
            'facilidad_es'=>'required|unique:facilidad_traslations,facilidad',
            /*'facilidad_en'=>'required|unique:facilidad_traslations,facilidad',
            'facilidad_fr'=>'required|unique:facilidad_traslations,facilidad',
            'facilidad_de'=>'required|unique:facilidad_traslations,facilidad',
            'facilidad_it'=>'required|unique:facilidad_traslations,facilidad',
            'facilidad_pt'=>'required|unique:facilidad_traslations,facilidad',*/
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
            'unique'=> 'El campo :attribute debe ser único. Ya existe este tipo de facilidad',
        ];
    }
}
