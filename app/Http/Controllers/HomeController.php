<?php

namespace App\Http\Controllers;

use App\Modelos\Provincia;
use Illuminate\Http\Request;
use DB;
use App\Modelos\Excursiones;
use App\Modelos\Hotel;
use App\Modelos\HotelTraslation;

use Illuminate\Support\Carbon;
use App\Modelos\Carrusel;
use App\Modelos\CarruselTraslations;
use App\Modelos\EnlaceRed;
use App\Modelos\EnlaceInteresante;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $fechaHoy = Carbon::now()->format('Y-m-d');

        $hoteles = Hotel::join("hotel_traslations", "hotels.id", "=", "hotel_traslations.hotel_id")
            ->where('hotel_traslations.locale', '=', 'es')
            ->where('hotels.estado', '=', 'Activo')
            ->join("precios_pax_hotels", "hotels.id", "=", "precios_pax_hotels.hotel_id")
            ->whereDate('precios_pax_hotels.fecha_fin', '>=', $fechaHoy)
            ->join("categorias", "categorias.id", "=", "hotels.categoria_id")
            ->join("categoria_traslations", "categoria_traslations.categoria_id", "=", "hotels.categoria_id")
            ->where('categoria_traslations.locale', '=', 'es')
            ->select('hotels.id', 'hotels.categoria_id', 'categoria_traslations.categoria', 'hotels.precio_desde'
                , 'hotel_traslations.direccion', 'hotels.nombre', 'hotels.imagen')
            ->distinct()

            ->paginate(4);

        $circuitos = DB::table('circuitos')->join('circuitos_traslations', 'circuitos.id', "=", "circuitos_traslations.circuitos_id")
            ->select('circuitos.imagen', 'circuitos.id', 'circuitos.precio_desde', 'circuitos_traslations.nombre as nombre',
                'circuitos.modalidads_id', 'circuitos_traslations.itinerario', 'circuitos.duracions_id')
            ->where('circuitos_traslations.idioma', '=', 'es')->paginate(4);

        $excursiones = Excursiones::join("excursiones_traslations", "excursiones.id", "=", "excursiones_traslations.excursiones_id")
            ->where('excursiones_traslations.locale', '=', 'es')
            ->where('excursiones.estado', '=', 'Activo')
            ->whereDate('excursiones.fecha_fin', '>=', $fechaHoy)
            ->join("modalidads", "modalidads.id", "=", "excursiones.modalidads_id")
            ->join("provincias as provorigen", "provorigen.id", "=", "excursiones.territorio_origen_id")
            ->join("provincias as provdestino", "provdestino.id", "=", "excursiones.territorio_destino_id")
            ->join("modalidad_traslations", "modalidad_traslations.modalidads_id", "=", "excursiones.modalidads_id")
            ->join("duracions", "duracions.id", "=", "excursiones.duracion_id")
            ->where('modalidad_traslations.idioma', '=', 'es')
            ->select('excursiones.id', 'modalidad_traslations.nombre as modalidad'
                , 'excursiones.modalidads_id', 'excursiones.nombre',
                'provorigen.provincia as origen', 'provdestino.provincia as destino'
                , 'excursiones.territorio_origen_id', 'excursiones.territorio_destino_id'
                , 'excursiones.imagen', 'excursiones.paxminimo', 'excursiones.excursion_auto_clasico', 'excursiones.precio_pax_auto'
                , 'excursiones.hora_salida_auto', 'excursiones.excursion_unica', 'excursiones.precio_pax_unica', 'excursiones.precio_ninnos2a12annos_unica'
                , 'excursiones.excursion_alimentacion', 'excursiones.precio_pax_almuerzo', 'excursiones.precio_ninnos2a12anno_almuerzo'
                , 'excursiones.precio_pax_sin_almuerzo', 'excursiones.precio_ninnos2a12anno_sin_almuerzo'
                , 'excursiones.precio_pax_TI', 'excursiones.precio_ninnos2a12anno_TI', 'excursiones.excursion_habitacion'
                , 'excursiones.precio_pax_hab_sencilla', 'excursiones.precio_ninnos2a12anno_hab_sencilla'
                , 'excursiones.precio_pax_hab_dobles', 'excursiones.precio_ninnos2a12anno_hab_dobles'
                , 'excursiones.excursion_pinar_vinnales', 'excursiones.precio_pax_Pinar', 'excursiones.precio_ninnos2a12anno_Pinar'
                , 'excursiones.precio_pax_Vinnales', 'excursiones.precio_ninnos2a12anno_Vinnales', 'excursiones.excursion_cicloturismo'
                , 'excursiones.precio_pax_con_canopy', 'excursiones.precio_pax_sin_canopy', 'excursiones.excursion_delfines'
                , 'excursiones.precio_pax_banno_delfines', 'excursiones.precio_ninnos2a12anno_banno_delfines'
                , 'excursiones.precio_pax_show_delfines', 'excursiones.precio_ninnos2a12anno_show_delfines', 'duracions.duracion')

            ->paginate(4);

        $carousel1 = CarruselTraslations::where('idioma', '=', 'es')->first();

        if ($carousel1){
            $carouseles = CarruselTraslations::where('idioma', '=', 'es')
                ->where('id', '<>',$carousel1->id )->get();
        }else{
            $carouseles = null;
        }


        $enlaces = EnlaceRed::all();
        $destinos = Provincia::all();
        $enlacesi = EnlaceInteresante::all();

        return view('home', compact('hoteles', 'circuitos', 'excursiones', 'carouseles', 'carousel1', 'enlaces','destinos','enlacesi'));
    }
}
