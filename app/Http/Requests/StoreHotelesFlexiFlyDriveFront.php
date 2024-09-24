<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreHotelesFlexiFlyDriveFront extends FormRequest
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
            'hotel_id'=> 'bail|required|numeric|gt:0',
            'cantidad_habitaciones_dobles'=> 'bail|required|numeric|gt:0',
        ];
    }

    public function attributes()
    {
        return [
            'hotel_id'=>'hotel'
        ];
    }

    public function messages()
    {
        return [
            'required' => 'El campo :attribute es obligatorio.',
            'integer' => 'El campo :attribute solo admite números enteros.',

        ];
    }
}
