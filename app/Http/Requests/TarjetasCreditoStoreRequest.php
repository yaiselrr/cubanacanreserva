<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TarjetasCreditoStoreRequest extends FormRequest
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
            'imagen'=> 'required|mimes:jpg,png,gif,jpeg|min:1',
            'nombre'=>'required|unique:tarjeta_creditos'
        ];
    }

    public function messages()
    {
        return [
            'required' => 'El campo :attribute es obligatorio.',
            'unique'=> 'El campo :attribute debe ser único. Ya existe este tipo de nombre',
            'min'=>'El campo :attribute no se pudo subir. El tamaño del archivo debe ser mayor que 0 byte.'
        ];
    }
}
