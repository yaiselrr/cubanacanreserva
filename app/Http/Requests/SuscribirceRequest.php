<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SuscribirceRequest extends FormRequest
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
            'nombre' => 'required',
            'email' => 'required|email|unique:suscribirces',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'El campo :attribute es obligatorio.',
            'email' => 'El correo electrónico debe tener el formato usuario@dominio'
        ];
    }
}
