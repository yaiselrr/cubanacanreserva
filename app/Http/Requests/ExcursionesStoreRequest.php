<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExcursionesStoreRequest extends FormRequest
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
            'imagen' => 'required|mimes:jpg,png,gif,jpeg|min:1',
            'nombre' => 'required|unique:hotels',
            'modalidads_id' => 'required',
            'dias_antelacion_reserva_id' => 'required',
            'territorio_origen_id' => 'required',
            'territorio_destino_id' => 'required',
            'idioma_id' => 'required',
            'duracion_id' => 'required|numeric',
            'paxminimo' => 'required|numeric',

            'oferta_especial' => 'sometimes',
            'estado' => 'required',
            'dias_semana_ids' => 'required',
            'capacidad' => 'required|integer',
            'fecha_inicio' => 'required',
            'fecha_fin' => 'required|after_or_equal:fecha_inicio',
            'frecuencia_id' => 'required',


            'excursion_auto_clasico' => 'sometimes',
            'precio_pax_auto' => 'required_if:excursion_auto_clasico,on|numeric|min:0',
            'hora_salida_auto' => 'required_if:excursion_auto_clasico,on',

            'excursion_alimentacion' => 'sometimes',
            'precio_pax_almuerzo' => 'required_if:excursion_alimentacion,on|numeric|min:0',
            'precio_ninnos2a12anno_almuerzo' => 'required_if:excursion_alimentacion,on|numeric|min:0',
            'precio_pax_sin_almuerzo' => 'required_if:excursion_alimentacion,on|numeric|min:0',
            'precio_ninnos2a12anno_sin_almuerzo' => 'required_if:excursion_alimentacion,on|numeric|min:0',
            'precio_pax_TI' => 'required_if:excursion_alimentacion,on|numeric|min:0',
            'precio_ninnos2a12anno_TI' => 'required_if:excursion_alimentacion,on|numeric|min:0',

            'excursion_habitacion' => 'sometimes',
            'precio_pax_hab_sencilla' => 'required_if:excursion_habitacion,on|numeric|min:0',
            'precio_ninnos2a12anno_hab_sencilla' => 'required_if:excursion_habitacion,on|numeric|min:0',
            'precio_pax_hab_dobles' => 'required_if:excursion_habitacion,on|numeric|min:0',
            'precio_ninnos2a12anno_hab_dobles' => 'required_if:excursion_habitacion,on|numeric|min:0',

            'excursion_unica' => 'sometimes',
            'precio_pax_unica' => 'required_if:excursion_unica,on|numeric|min:0',
            'precio_ninnos2a12annos_unica' => 'required_if:excursion_unica,on|numeric|min:0',

            'excursion_pinar_vinnales' => 'sometimes',
            'precio_pax_Pinar' => 'required_if:excursion_pinar_vinnales,on|numeric|min:0',
            'precio_ninnos2a12anno_Pinar' => 'required_if:excursion_pinar_vinnales,on|numeric|min:0',
            'precio_pax_Vinnales' => 'required_if:excursion_pinar_vinnales,on|numeric|min:0',
            'precio_ninnos2a12anno_Vinnales' => 'required_if:excursion_pinar_vinnales,on|numeric|min:0',

            'excursion_cicloturismo' => 'sometimes',
            'precio_pax_con_canopy' => 'required_if:excursion_clicloturismo,on|numeric|min:0',
            'precio_pax_sin_canopy' => 'required_if:excursion_clicloturismo,on|numeric|min:0',

            'excursion_delfines' => 'sometimes',
            'precio_pax_banno_delfines' => 'required_if:excursion_delfines,on|numeric|min:0',
            'precio_ninnos2a12anno_banno_delfines' => 'required_if:excursion_delfines,on|numeric|min:0',
            'precio_pax_show_delfines' => 'required_if:excursion_delfines,on|numeric|min:0',
            'precio_ninnos2a12anno_show_delfines' => 'required_if:excursion_delfines,on|numeric|min:0',

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
            'dias_antelacion_reserva_id' => 'dias antelacion reservacion',
            'territorio_origen_id' => 'territorio origen',
            'territorio_destino_id' => 'territorio destino',
            'idioma_id' => 'idioma',
            'modalidads_id' => 'modalidad',

            'hora_salida_auto' => 'hora de salida',
            'precio_pax_auto' => 'precio x pax',

            'precio_pax_almuerzo' => 'precio x pax con almuerzo',
            'precio_ninnos2a12anno_almuerzo' => 'precio con almuerzo de niños de 2 a 12 años',
            'precio_pax_sin_almuerzo' => 'precio x pax sin almuerzo',
            'precio_ninnos2a12anno_sin_almuerzo' => 'precio sin almuerzo de niños de 2 a 12 años',
            'precio_pax_TI' => 'precio x pax TI',
            'precio_ninnos2a12anno_TI' => 'precio de niños de 2 a 12 años TI',

            'precio_pax_hab_sencilla' => 'precios x pax habitacion sencilla',
            'precio_ninnos2a12anno_hab_sencilla' => 'precios de niños de 2 a 12 años habitacion sencilla',
            'precio_pax_hab_dobles' => 'precios x pax habitacion doble',
            'precio_ninnos2a12anno_hab_dobles' => 'precios de niños de 2 a 12 años habitacion doble',

            'precio_pax_unica' => 'precio x pax excursion unica',
            'precio_ninnos2a12annos_unica' => 'precio de niños de 2 a 12 años excursion unica',

            'precio_pax_Pinar' => 'precio x pax Pinar del Río',
            'precio_ninnos2a12anno_Pinar' => 'precios de niños de 2 a 12 años Pinar del Río',
            'precio_pax_Vinnales' => 'precio x pax Viñales',
            'precio_ninnos2a12anno_Vinnales' => 'precios de niños de 2 a 12 años Viñales',

            'precio_pax_con_canopy' => 'precio x pax con Canopy',
            'precio_pax_sin_canopy' => 'precio x pax sin Canopy',

            'precio_pax_banno_delfines' => 'precio x pax baño con delfines',
            'precio_ninnos2a12anno_banno_delfines' => 'precios de niños de 2 a 12 años baño con delfines',
            'precio_pax_show_delfines' => 'precio x pax show con delfines',
            'precio_ninnos2a12anno_show_delfines' => 'precios de niños de 2 a 12 años show con delfines',


            'duracion_id' => 'duracion',
            'paxminimo' => 'pax minimo',
            'dias_semana_ids' => 'dias de la semana',

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
            'dias_semana_ids.required' => 'El campo :attribute es obligatorio. Lista Vacia',
            'idioma_id.required' => 'El campo :attribute es obligatorio. Lista Vacia',
            'mimes' => 'El campo :attribute solo permite extensiones de tipo: :values.',
            'numeric' => 'El campo :attribute solo admite números enteros o números decimales separados por punto.',
            'integer' => 'El campo :attribute solo admite números enteros.',
            'after_or_equal' => 'El campo fecha fin no puede ser menor que el campo de inicio',
            'min' => 'El campo :attribute no se pudo subir. El tamaño del archivo debe ser mayor que 0 byte.',
            'required_if' => 'El campo :attribute es obligatorio',

        ];
    }
}
