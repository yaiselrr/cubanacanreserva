<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
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
            'name' => 'required|unique:users',
            'avatar' => 'sometimes|mimes:jpg,png,gif,jpeg|min:1',
            'role_id' => 'required',
            'email' => 'required|email|unique:users',
            'password'=>'required',
            'confirm'=>'required'
        ];
}
    public function attributes()
    {
        return [
            'name'=> 'nombre y apellidos',
            'email' => 'correo electronico',

        ];
    }

    public function messages()
    {
        return [
            'required' => 'El campo :attribute es obligatorio.',
            'email' => 'El campo :attribute no es válido',
            'unique'=> 'El campo :attribute debe ser único. Ya existe este tipo de :attribute',
            'min'=>'El campo :attribute no se pudo subir. El tamaño del archivo debe ser mayor que 0 byte.'

        ];
    }
}
