<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlanAlojamientoStoreRequest extends FormRequest
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
            'planalojamiento'=>'required|unique:plan_alojamientos'
        ];
    }

    public function attributes()
    {
        return [
            'planalojamiento'=>'plan alojamiento',

        ];
    }

    public function messages()
    {
        return [
            'required' => 'El campo :attribute es obligatorio.',
            'unique'=> 'El campo :attribute debe ser único. Ya existe este tipo de plan de alojamiento',
        ];
    }
}
