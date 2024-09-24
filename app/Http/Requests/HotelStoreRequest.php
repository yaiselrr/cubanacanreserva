<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HotelStoreRequest extends FormRequest
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
            'imagen'=>'required|array',
            'imagen.*'=>'mimes:jpg,png,gif,jpeg|min:1',
            'nombre'=>'required|unique:hotels',
            'telefono'=>'required',
            'dias_antelacion_reserva_id'=>'required',
            'precio_desde'=>'required|numeric',
            'oferta_especial'=>'sometimes',
            'estado'=>'required',
            'provincia_id'=>'required',
            'plan_alojamiento_id'=>'sometimes',
            'categoria_id'=>'required',
            'email'=>'nullable|email|unique:hotels',
            'facilidades_ids'=>'required',

            /*'campos_vacios' =>'sometimes',
            'direccion_es' => 'required_if:campos_vacios,1',*/

            'direccion_es' => 'required',
            /*'direccion_en' => 'required',
            'direccion_fr' => 'required',
            'direccion_de' => 'required',
            'direccion_it' => 'required',
            'direccion_pt' => 'required',*/

            'descripcion_es' => 'required',
            /*'descripcion_en' => 'required',
            'descripcion_fr' => 'required',
            'descripcion_de' => 'required',
            'descripcion_it' => 'required',
            'descripcion_pt' => 'required',*/
        ];
    }

    public function attributes()
    {
        return [
            'dias_antelacion_reserva_id'=>'dias antelacion reservacion',
            'provincia_id'=>'provincia',
            'categoria_id'=>'categoria',
            'facilidades_ids'=>'facilidades',
            'nombre'=>'nombre de Hotel',

            'direccion_es'=> 'direccion',
            /*'direccion_en' => 'direccion',
            'direccion_fr' => 'direccion',
            'direccion_de' => 'direccion',
            'direccion_it' => 'direccion',
            'direccion_pt' => 'direccion',*/

            'descripcion_es' => 'descripcion',
            /*'descripcion_en' => 'descripcion',
            'descripcion_fr' => 'descripcion',
            'descripcion_de' => 'descripcion',
            'descripcion_it' => 'descripcion',
            'descripcion_pt' => 'descripcion',*/

        ];
    }

    public function messages()
    {
        return [
            'required' => 'El campo :attribute es obligatorio.',
            'facilidades_ids.required' => 'El campo :attribute es obligatorio. Lista Vacia',
            'imagen.*.mimes' => 'El campo :attribute solo permite extensiones de tipo: :values.',
            'numeric' => 'El campo :attribute solo admite números enteros o números decimales separados por punto.',
            'unique'=> 'El campo :attribute debe ser único. Ya existe este tipo de nombre',
            'email' => 'El campo :attribute no es un email válido',
            'min'=>'El campo :attribute no se pudo subir. El tamaño del archivo debe ser mayor que 0 byte.',
            'required_if' => 'El campo :attribute es obligatorio',

        ];
    }
}
