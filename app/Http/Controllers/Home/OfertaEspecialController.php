<?php

namespace App\Http\Controllers\Home;

use App\Modelos\Evento;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modelos\Hotel;
use App\Modelos\HotelTraslation;
use App\Modelos\Excursiones;
use App\Modelos\ExcursionesTraslation;
use App\Modelos\Circuito;
use App\Modelos\CircuitoTraslations;
use App\Modelos\PaginationMerger;


class OfertaEspecialController extends Controller
{
    public function index()
    {
        $count = count(Hotel::all());
        $hoteles = Hotel::join("hotel_traslations","hotels.id","=","hotel_traslations.hotel_id")
            ->where('hotel_traslations.locale','=','es')
            ->where('hotels.estado','=','Activo')
            ->where('hotels.oferta_especial','=','Activo')
            ->join("categorias","categorias.id","=","hotels.categoria_id")
            ->join("categoria_traslations","categoria_traslations.categoria_id","=","hotels.categoria_id")
            ->where('categoria_traslations.locale','=','es')
            ->select('hotels.id','hotels.categoria_id','categoria_traslations.categoria','hotels.precio_desde'
                ,'hotel_traslations.direccion','hotels.nombre','hotels.imagen')
           // ->orderBy('hotels.precio_desde','desc')
            ->paginate(2);


        $circuitos= Circuito::join("circuitos_traslations","circuitos.id","=","circuitos_traslations.circuitos_id")
            ->where('circuitos_traslations.idioma','=','es')
            ->where('circuitos.esta_activo','=',1)
            ->where('circuitos.oferta_especial','=',1)
            ->join("modalidads","modalidads.id","=","circuitos.modalidads_id")
            ->join("modalidad_traslations","modalidad_traslations.modalidads_id","=","circuitos.modalidads_id")
            ->where('modalidad_traslations.idioma','=','es')
            ->select('circuitos.imagen','circuitos.id', 'circuitos.fecha_inicio','circuitos.precio_desde', 'circuitos_traslations.nombre as nombre',
                'modalidad_traslations.nombre as modalidad','circuitos_traslations.itinerario','circuitos.duracions_id')
            ->orderBy('circuitos.fecha_inicio','desc')
            ->paginate(2);

        $excursiones = Excursiones::join("excursiones_traslations","excursiones.id","=","excursiones_traslations.excursiones_id")
            ->where('excursiones_traslations.locale','=','es')
            ->where('excursiones.estado','=','Activo')
            ->where('excursiones.oferta_especial','=','Activo')
            ->join("modalidads","modalidads.id","=","excursiones.modalidads_id")
            ->join("provincias as provorigen","provorigen.id","=","excursiones.territorio_origen_id")
            ->join("provincias as provdestino","provdestino.id","=","excursiones.territorio_destino_id")
            ->join("modalidad_traslations","modalidad_traslations.modalidads_id","=","excursiones.modalidads_id")
            ->join("duracions","duracions.id","=","excursiones.duracion_id")
            ->where('modalidad_traslations.idioma','=','es')
            ->select('excursiones.id','modalidad_traslations.nombre as modalidad'
                ,'excursiones.modalidads_id','excursiones.nombre',
                'provorigen.provincia as origen','provdestino.provincia as destino'
                ,'excursiones.territorio_origen_id','excursiones.territorio_destino_id'
                ,'excursiones.imagen' ,'excursiones.paxminimo' ,'excursiones.excursion_auto_clasico','excursiones.precio_pax_auto'
                ,'excursiones.hora_salida_auto','excursiones.excursion_unica','excursiones.precio_pax_unica','excursiones.precio_ninnos2a12annos_unica'
                ,'excursiones.excursion_alimentacion','excursiones.precio_pax_almuerzo','excursiones.precio_ninnos2a12anno_almuerzo'
                ,'excursiones.precio_pax_sin_almuerzo','excursiones.precio_ninnos2a12anno_sin_almuerzo'
                ,'excursiones.precio_pax_TI','excursiones.precio_ninnos2a12anno_TI','excursiones.excursion_habitacion'
                ,'excursiones.precio_pax_hab_sencilla','excursiones.precio_ninnos2a12anno_hab_sencilla'
                ,'excursiones.precio_pax_hab_dobles','excursiones.precio_ninnos2a12anno_hab_dobles'
                ,'excursiones.excursion_pinar_vinnales','excursiones.precio_pax_Pinar','excursiones.precio_ninnos2a12anno_Pinar'
                ,'excursiones.precio_pax_Vinnales','excursiones.precio_ninnos2a12anno_Vinnales','excursiones.excursion_cicloturismo'
                ,'excursiones.precio_pax_con_canopy','excursiones.precio_pax_sin_canopy','excursiones.excursion_delfines'
                ,'excursiones.precio_pax_banno_delfines','excursiones.precio_ninnos2a12anno_banno_delfines'
                ,'excursiones.precio_pax_show_delfines','excursiones.precio_ninnos2a12anno_show_delfines','duracions.duracion')
            ->orderBy('excursiones.fecha_inicio','desc')
            ->paginate(2);

        $eventos= Evento::join("evento_traslations","eventos.id","=","evento_traslations.evento_id")
            ->where('evento_traslations.idioma','=','es')
            //->where('circuitos.esta_activo','=',1)
            ->where('eventos.oferta_especial','=',1)
            ->join("lugars","lugars.id","=","eventos.lugars_id")
            ->join("lugar_traslations","lugar_traslations.lugars_id","=","eventos.lugars_id")
            ->where('lugar_traslations.idioma','=','es')
            ->select('eventos.id','eventos.fecha_inicio','eventos.fecha_fin','eventos.imagen', 'evento_traslations.nombre',
                'evento_traslations.descripcion','lugar_traslations.nombre as lugar')
            ->orderBy('eventos.fecha_inicio','desc')
            ->paginate(2);

        $paginator = PaginationMerger::merge($hoteles,$excursiones,$circuitos,$eventos);

        return view('home.ofertasespeciales', compact('hoteles','circuitos','excursiones','eventos','paginator'));
    }
}
