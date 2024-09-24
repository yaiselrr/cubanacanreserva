<?php

namespace App\Http\Controllers\Home;

use App\Http\Requests\ReservarHotelRequest;
use App\Modelos\Nacionalidad;
use App\Modelos\Provincia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modelos\PlanAlojamiento;
use App\Modelos\Facilidad;
use App\Modelos\FacilidadTraslation;
use App\Modelos\Hotel;
use App\Modelos\HotelTraslation;
use App\Modelos\PreciosPaxHotel;
use App\Modelos\ReservaHabitacionHotel;
use App\Modelos\DiasAntelacionReserva;
use App\Modelos\DatosCliente;
use Illuminate\Support\Facades\Config;
use App\Modelos\CarritoCompra;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Carbon;
use App\Modelos\Carrusel;
use App\Modelos\CarruselTraslations;
use DB;
use App\Modelos\EnlaceRed;

class HotelController extends Controller
{
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
            ->orderBy('hotels.precio_desde', 'desc')
            ->distinct()
            ->paginate(8);
        $carousel1 = CarruselTraslations::where('idioma', '=', 'es')->first();
        $enlaces = EnlaceRed::all();
        if ($carousel1){
            $carouseles = CarruselTraslations::where('idioma', '=', 'es')
                ->where('id', '<>',$carousel1->id )->get();
        }else{
            $carouseles = null;
        }
        $destinos = Provincia::all();

        return view('home.productoshoteles', compact('hoteles', 'carousel1', 'enlaces', 'carouseles','destinos'));
    }

    public function detallesHotel($id)
    {
        $hotel = Hotel::findOrFail($id);
        $habitaciones = ReservaHabitacionHotel::where('hotels_id', $hotel->id)->select('id', 'fecha_entrada', 'tipo_habitacion',
            'cantidad_noche', 'cantidad_adultos', 'cantidad_ninnos2a12', 'cantidad_ninnos0a2', 'req_especiales', 'hotels_id', 'precio_total')->get();

        $preciopaxhotel = PreciosPaxHotel::where('hotel_id', $hotel->id)->get();

        $dias_antelacion = DiasAntelacionReserva::findOrFail($hotel->dias_antelacion_reserva_id);

        $diasantelacionreservas = DiasAntelacionReserva::all();
        $nacionalidades = Nacionalidad::all();
        $planalojamientos = PlanAlojamiento::all();
        $plan_alojamiento_id = explode(',', $hotel->plan_alojamiento_id);
        $listado = array();

        foreach ($planalojamientos as $planalojamiento) {
            foreach ($plan_alojamiento_id as $item) {
                if ($planalojamiento->id == $item) {
                    $listado[] = $planalojamiento->planalojamiento;
                }
            }
        }
        $resul = implode(', ', $listado);
        $facilidades = Facilidad::join("facilidad_traslations", "facilidads.id", "=", "facilidad_traslations.facilidad_id")
            ->where('locale', '=', 'es')
            ->select('facilidads.id', 'facilidad_traslations.facilidad', 'facilidad_traslations.facilidad_id')->get();
        $hoteltraslation = HotelTraslation::where('hotel_id', $hotel->id)->get()->where('locale', '=', 'es');
        $data = array();
        foreach ($hoteltraslation as $item) {
            $data['direccion'] = $item['direccion'];
            $data['descripcion'] = $item['descripcion'];
        }
        $carousel1 = CarruselTraslations::where('idioma', '=', 'es')->first();
        $enlaces = EnlaceRed::all();
        $carouseles = CarruselTraslations::where('idioma', '=', 'es')->get();
        $destinos = Provincia::all();
        return view('home.productoshotel-detalles', ['hotel' => $hotel],
            compact('data', 'facilidades', 'planalojamientos', 'resul', 'habitaciones'
                , 'preciopaxhotel', 'diasantelacionreservas', 'nacionalidades', 'dias_antelacion', 'carousel1', 'enlaces', 'carouseles','destinos'));
    }

    public function reservarHabHotel(Request $request, $id)
    {
        //dd($request->habitaciones);
        $hotel = Hotel::findOrFail($id);
        $preciopaxhotel = PreciosPaxHotel::where('hotel_id', $hotel->id)->get();
        $redirect = '';

        for ($i = 0, $iMax = count($request->habitaciones); $i < $iMax; $i++) {
            $reservacioneshotel = ReservaHabitacionHotel::create([
                'fecha_entrada' => $request->habitaciones[$i]['fechaEntrada'],
                'cantidad_adultos' => $request->habitaciones[$i]['cantAdultos'],
                'cantidad_noche' => $request->habitaciones[$i]['cantNoches'],
                'cantidad_ninnos2a12' => $request->habitaciones[$i]['cantN212'],
                'cantidad_ninnos0a2' => $request->habitaciones[$i]['cantN02'],
                'req_especiales' => $request->habitaciones[$i]['requerimientos'],
                'hotels_id' => $hotel->id,
                'tipo_habitacion' => $request->habitaciones[$i]['tipoHabitacion'],
                'precio_total' => $request->habitaciones[$i]['precio'],
                'status_id' => 1
            ]);

            for ($j = 0, $jMax = count($request->habitaciones[$i]['personas'][0]); $j < $jMax; $j++) {

                DatosCliente::create([
                    'fecha_nacimiento' => $request->habitaciones[$i]['personas'][0][$j]['fecha'],
                    'nacionalidad_id' => $request->habitaciones[$i]['personas'][0][$j]['nacionalidad'],
                    'numero_pasaporte' => $request->habitaciones[$i]['personas'][0][$j]['pasaporte'],
                    'nombre' => $request->habitaciones[$i]['personas'][0][$j]['nombre'],
                    'reserva_hab_hotel_id' => $reservacioneshotel->id,
                ]);
            }

            $carrito = CarritoCompra::create([
                'total_precio' => $reservacioneshotel->precio_total,
                'nombre_producto' => $hotel->nombre,
                'tipo_producto' => 'Hotel',
                'estado' => Config::get('constants.estados.espera'),
                'reserva_hab_hotel_id' => $reservacioneshotel->id,
            ]);

            $cart = [

                "idCarrito" => $carrito->id,
                "cantAdultos" => $request->habitaciones[$i]['cantAdultos'],
                "cantN212" => $request->habitaciones[$i]['cantN212'],
                "cantN02" => $request->habitaciones[$i]['cantN02'],
                "nombre_producto" => $hotel->nombre,
                "tipo_producto" => 'Hotel',
                "fecha" => $reservacioneshotel->fecha_entrada,
                "tipo_habitacion" => $reservacioneshotel->tipo_habitacion,
                "reserva_hab_hotel_id" => $reservacioneshotel->id,
                "total_precio" => $reservacioneshotel->precio_total,
                "estado" => Config::get('constants.estados.espera')

            ];
            //session()->flush('cart');
            session()->push('cart', $cart);

            switch ($request->habitaciones[$i]['tipoHabitacion']) {
                case 'Sencilla':
                    foreach ($preciopaxhotel as $preciopax) {
                        if ($preciopax->fecha_inicio <= $request->habitaciones[$i]['fechaEntrada'] && $preciopax->fecha_fin >= $request->habitaciones[$i]['fechaEntrada']) {
                            $preciopax->cantidad_hab_sencillas = $preciopax->cantidad_hab_sencillas - 1;
                            $preciopax->update();
                        }
                    }
                    break;
                case 'Doble':

                    foreach ($preciopaxhotel as $preciopax) {
                        if ($preciopax->fecha_inicio <= $request->habitaciones[$i]['fechaEntrada'] && $preciopax->fecha_fin >= $request->habitaciones[$i]['fechaEntrada']) {
                            $preciopax->cantidad_hab_dobles = $preciopax->cantidad_hab_dobles - 1;
                            $preciopax->update();
                        }
                    };

                    break;

                case 'Triple':

                    foreach ($preciopaxhotel as $preciopax) {
                        if ($preciopax->fecha_inicio <= $request->habitaciones[$i]['fechaEntrada'] && $preciopax->fecha_fin >= $request->habitaciones[$i]['fechaEntrada']) {
                            $preciopax->cantidad_hab_triples = $preciopax->cantidad_hab_triples - 1;
                            $preciopax->update();
                        }
                    };
                    break;
                default:
                    break;
            }
            $redirect = route('home.carrito-compras', ['añadido' => count($request->habitaciones) . ' ' . 'productos']);
        }
        return response()->json(array('success' => 'Los datos de Habitaciones se ha adicionado satisfactoriamente.', 'redirect' => $redirect));
    }
}
