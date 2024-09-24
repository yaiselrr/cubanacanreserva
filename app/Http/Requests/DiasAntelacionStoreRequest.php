<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DiasAntelacionStoreRequest extends FormRequest
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
            'dias'=>'required|integer|unique:dias_antelacion_reservas'
        ];
    }

    public function messages()
    {
        return [
            'required' => 'El campo :attribute es obligatorio.',
            'integer' => 'El campo :attribute solo admite números enteros.',
            'unique'=> 'El campo :attribute debe ser único. Ya existe este valor',
        ];
    }
}
