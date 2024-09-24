<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DuracionStoreRequest extends FormRequest
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
            'duracion'=>'required|integer|unique:duracions'
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
