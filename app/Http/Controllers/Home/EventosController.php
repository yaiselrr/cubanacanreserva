<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modelos\EventoTraslations;
use App\Modelos\Evento;
use App\Modelos\Provincia;
use App\Modelos\Lugar;
use App\Modelos\DiasAntelacionReserva;
use App\Modelos\Hotel;
use App\Modelos\HotelTraslation;
use App\Modelos\Nacionalidad;
use DB;
use App\Modelos\Carrusel;
use App\Modelos\CarruselTraslations;
use App\Modelos\RutaConectandoCuba;
use App\Modelos\LugarRecogidaConectandoCuba;
use App\Modelos\EnlaceRed;



class EventosController extends Controller
{
    //
    public function index()
    {
        /*$eventos = DB::table('eventos')->join('evento_traslations', 'eventos.id', "=", "evento_traslations.evento_id")
            ->select('eventos.id','eventos.fecha_inicio','eventos.fecha_fin','eventos.imagen', 'evento_traslations.nombre as nombre',
             'evento_traslations.descripcion as descripcion','eventos.lugars_id as lugar')
            ->where('evento_traslations.idioma', '=', 'es')->paginate(4);*/

        //dd($circuitos);
        $rutas = RutaConectandoCuba::all();
        $provincias = Provincia::all();
        $lugares = LugarRecogidaConectandoCuba::all();
        $nacionalidades = Nacionalidad::all();
        $eventos = EventoTraslations::where('idioma', '=', 'es')->paginate(4);
        $carousel1 = CarruselTraslations::where('idioma', '=', 'es')->first();
        if ($carousel1){
            $carouseles = CarruselTraslations::where('idioma', '=', 'es')
                ->where('id', '<>',$carousel1->id )->get();
        }else{
            $carouseles = null;
        }
        $enlaces = EnlaceRed::all();
        //dd($eventos);
        //$user = User::where("estado","=",1)->find(10);
        $destinos = Provincia::all();

        return view('home.productoseventos', compact('eventos','rutas','provincias', 'lugares','nacionalidades','carouseles','carousel1','enlaces','destinos'));
    }

    public function eventoshabitaciones($id)
    {

        $evento = Evento::findOrFail($id);
        $addReserva = "Si";
        $nacionalidades = Nacionalidad::all();
        //$precios_pax_hotel = PreciosPaxHotel::where('hotel_id', $circuito->id)->get();
        $tipohabitaciones = [
            ['value' => 'Secilla', 'tipohabitacion' => 'Secilla'],
            ['value' => 'Doble', 'tipohabitacion' => 'Doble'],
            ['value' => 'Triple', 'tipohabitacion' => 'Triple'],
        ];

        $carousel1 = CarruselTraslations::where('idioma', '=', 'es')->first();
        $id = $carousel1->id;
        $carousel2 = CarruselTraslations::where('carrusels_id', $id+1)->first();/*latest()->take(3)->get();*/
        $carousel3 = CarruselTraslations::where('carrusels_id', $id+2)->first();
        $carouseles = CarruselTraslations::where('idioma', '=', 'es')->get();
        $diasantelacionreservas = DiasAntelacionReserva::all();
        $hoteles = Hotel::join("hotel_traslations", "hotels.id", "=", "hotel_traslations.hotel_id")
            ->where('hotel_traslations.locale', '=', 'es')
            ->select('hotels.id', 'hotels.nombre')->get();
        //dd($hoteles);
        $enlaces = EnlaceRed::all();
        $destinos = Provincia::all();

        return view('home.productoseventos-habitaciones', ['evento' => $evento]
            , compact('tipohabitaciones', 'diasantelacionreservas', 'precios_pax_hotel', 'addReserva', 'nacionalidades','rutas','provincias', 'lugares','carouseles','carousel1','carousel2','enlaces','destinos'));
    }

    public function detalleseventos($id)
    {
        $ruta = '/circuitos/';
        $nombre = 'CIRCUITO';
        $addReserva = "Si";
        $rutas = RutaConectandoCuba::all();
        $provincias = Provincia::all();
        $lugares = LugarRecogidaConectandoCuba::all();
        $nacionalidades = Nacionalidad::all();
        $evento = Evento::findOrFail($id);
        $dias_antelacion = DiasAntelacionReserva::all();
        $destinos = Provincia::all();
        $hoteles = Hotel::all();
        $tras = EventoTraslations::where('evento_id', $evento->id)->get();
        $carousel1 = CarruselTraslations::where('idioma', '=', 'es')->first();
        $carouseles = CarruselTraslations::where('idioma', '=', 'es')->get();
        $tipohabitaciones = [
            ['value' => 'Secilla', 'tipohabitacion' => 'Secilla'],
            ['value' => 'Doble', 'tipohabitacion' => 'Doble'],
            ['value' => 'Triple', 'tipohabitacion' => 'Triple'],
        ];
        $data = array();
        foreach ($tras as $item) {
            if ($item['idioma'] == 'es') {
                $data['nombre_es'] = $item['nombre'];
                $data['descripcion_es'] = $item['descripcion'];
                $data['resumen_es'] = $item['resumen'];
            }
            if ($item['idioma'] == 'en') {
                $data['nombre_en'] = $item['nombre'];
                $data['descripcion_en'] = $item['descripcion'];
                $data['resumen_en'] = $item['resumen'];
            }
            if ($item['idioma'] == 'fr') {
                $data['nombre_fr'] = $item['nombre'];
                $data['descripcion_fr'] = $item['descripcion'];
                $data['resumen_fr'] = $item['resumen'];
            }
            if ($item['idioma'] == 'dt') {
                $data ['nombre_dt'] = $item['nombre'];
                $data['descripcion_dt'] = $item['descripcion'];
                $data['resumen_dt'] = $item['resumen'];
            }
            if ($item['idioma'] == 'it') {
                $data ['nombre_it'] = $item['nombre'];
                $data['descripcion_it'] = $item['descripcion'];
                $data['resumen_it'] = $item['resumen'];
            }
            if ($item['idioma'] == 'pt') {
                $data ['nombre_pt'] = $item['nombre'];
                $data['descripcion_pt'] = $item['descripcion'];
                $data['resumen_pt'] = $item['resumen'];
            }
            $enlaces = EnlaceRed::all();

        }
        return view('home.productoseventos-detalles', ["evento" => $evento, 'provincias' => $provincias], compact('nombre', 'ruta', 'dias_antelacion', 'data', 'addReserva', 'tipohabitaciones', 'nacionalidades', 'hoteles','rutas','provincias', 'lugares','tras','carouseles','carousel1','enlaces','destinos'));

    }
}
