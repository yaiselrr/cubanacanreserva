<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FlexiDriveStoreRequest extends FormRequest
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
            'fichero_listado_hoteles' => 'required|mimes:doc,docx,pdf|min:1',
            'fichero_informacion_ampliada' => 'required|mimes:doc,docx,pdf|min:1',
            'imagen' => 'required|mimes:jpg,png,gif,jpeg|min:1',
            'tarifario_FFD'=>'required|mimes:xls,xlsx|min:1',
            'dias_antelacion_rese_alta_id' => 'required',
            'dias_antelacion_rese_baja_id' => 'required',

            'descripcion_general_es' => 'required',
            /*'descripcion_general_en' => 'required',
            'descripcion_general_fr' => 'required',
            'descripcion_general_de' => 'required',
            'descripcion_general_it' => 'required',
            'descripcion_general_pt' => 'required',*/

            'descripcion_hoteles_es' => 'required',
           /* 'descripcion_hoteles_en' => 'required',
            'descripcion_hoteles_fr' => 'required',
            'descripcion_hoteles_de' => 'required',
            'descripcion_hoteles_it' => 'required',
            'descripcion_hoteles_pt' => 'required',*/

            'descripcion_autos_es' => 'required',
           /* 'descripcion_autos_en' => 'required',
            'descripcion_autos_fr' => 'required',
            'descripcion_autos_de' => 'required',
            'descripcion_autos_it' => 'required',
            'descripcion_autos_pt' => 'required',*/
        ];
    }

    public function attributes()
    {
        return [
            'fichero_listado_hoteles'=> 'listado de hoteles',
            'fichero_informacion_ampliada' => 'informacion ampliada',
            'tarifario_FFD' => 'tarifario FFD',
            'dias_antelacion_rese_alta_id' => 'dias antelacion reservacion alta',
            'dias_antelacion_rese_baja_id' => 'dias antelacion reservacion baja',

            'descripcion_general_es' => 'descripcion general',
            /*'descripcion_general_en' => 'descripcion general',
            'descripcion_general_fr' => 'descripcion general',
            'descripcion_general_de' => 'descripcion general',
            'descripcion_general_it' => 'descripcion general',
            'descripcion_general_pt' => 'descripcion general',*/

            'descripcion_hoteles_es' => 'descripcion hoteles',
            /*'descripcion_hoteles_en' => 'descripcion hoteles',
            'descripcion_hoteles_fr' => 'descripcion hoteles',
            'descripcion_hoteles_de' => 'descripcion hoteles',
            'descripcion_hoteles_it' => 'descripcion hoteles',
            'descripcion_hoteles_pt' => 'descripcion hoteles',*/

            'descripcion_autos_es' => 'descripcion autos',
           /* 'descripcion_autos_en' => 'descripcion autos',
            'descripcion_autos_fr' => 'descripcion autos',
            'descripcion_autos_de' => 'descripcion autos',
            'descripcion_autos_it' => 'descripcion autos',
            'descripcion_autos_pt' => 'descripcion autos',*/


        ];
    }

    public function messages()
    {
        return [
            'required' => 'El campo :attribute es obligatorio.',
            'mimes' => 'El campo :attribute solo permite extensiones de tipo: :values.',
            'uploaded' => 'El campo :attribute no se pudo cargar. Fichero dañado',
            'min'=>'El campo :attribute no se pudo subir. El tamaño del archivo debe ser mayor que 0 byte.'
        ];
    }
}
