<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HotelRecogidaUpdateRequest extends FormRequest
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
            'excursion_id'=>'required',
            'hotel'=>'required',
            'hora'=>'required',
        ];
    }

    public function attributes()
    {
        return [
            'excursion_id'=>'excursiones',

        ];
    }
    public function messages()
    {
        return [
            'required' => 'El campo :attribute es obligatorio.',

        ];
    }
}
