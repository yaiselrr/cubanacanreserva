<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HotelFlexyDriveUpdateRequest extends FormRequest
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
            'hotel_id'=>'required',
            'provincia_id'=>'required',
            'cantidad_habitaciones_dobles'=>'required|integer',
        ];
    }

    public function attributes()
    {
        return [
            'provincia_id'=>'provincia',
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
