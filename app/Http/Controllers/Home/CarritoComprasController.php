<?php

namespace App\Http\Controllers\Home;

use App\Modelos\CarritoCompra;
use App\Modelos\CarruselTraslations;
use App\Modelos\EnlaceRed;
use App\Modelos\Excursiones;
use App\Modelos\PreciosPorViajesMedida;
use App\Modelos\ReservaExcursion;
use App\Modelos\ReservaHabitacionHotel;
use App\Modelos\PreciosPaxHotel;
use App\Modelos\ReservaViajesMedida;
use App\Modelos\ReservarFlexiFlyDrive;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modelos\Circuito;
use App\Modelos\DatosCliente;
use App\Modelos\ReservaHabitacionCircuito;
use Illuminate\Support\Facades\DB;
use App\Modelos\PreciPax;

class CarritoComprasController extends Controller
{
    public function index(Request $request)
    {
        $message = $request->get('añadido');
        $carrito = session()->get('cart');
        //session()->flush('cart');

        $carousel1 = CarruselTraslations::where('idioma', '=', 'es')->first();
        $enlaces = EnlaceRed::all();
        if ($carousel1){
            $carouseles = CarruselTraslations::where('idioma', '=', 'es')
                ->where('id', '<>',$carousel1->id )->get();
        }else{
            $carouseles = null;
        }

        return view('home.carrito-compras', ['success' => $message], compact('carrito', 'carousel1', 'enlaces', 'carouseles'));
    }

    public function eliminarCarritoCompra($id)
    {
        $carrito = CarritoCompra::find($id);
        $carritosession = session('cart');
        if ($carritosession) {
            foreach ($carritosession as $key => $value) {
                if ($value['idCarrito'] == $id) {
                    unset($carritosession [$key]);
                }
            }
            session()->put('cart', $carritosession);
        }

        if ($carrito->reserva_hab_circuito_id != '') {
            $reserva_hab_circuito = ReservaHabitacionCircuito::findOrFail($carrito->reserva_hab_circuito_id);

//            $preciospaxhoteles = PreciosPaxHotel::where('hotel_id', $reserva_hab_hotel->hotels_id)->get();
            $preciopaxcircuito = PreciPax::where('circuitos_id', $reserva_hab_circuito->circuito_id)->get();
//            foreach ($preciopaxcircuito as $precioscircuitos) {
//                switch ($reserva_hab_circuito->tipo_habitacion) {
//                    case 'Sencilla':
//                        if ($precioscircuitos->fecha_inicio <= $reserva_hab_circuito->fecha_entrada && $preciospaxhotel->fecha_fin >= $reserva_hab_hotel->fecha_entrada) {
//                            $preciospaxhotel->cantidad_hab_sencillas = $preciospaxhotel->cantidad_hab_sencillas + 1;
//                            $preciospaxhotel->update();
//                        }
//                        break;
//                    case 'Doble':
//                        if ($preciospaxhotel->fecha_inicio <= $reserva_hab_hotel->fecha_entrada && $preciospaxhotel->fecha_fin >= $reserva_hab_hotel->fecha_entrada) {
//                            $preciospaxhotel->cantidad_hab_dobles = $preciospaxhotel->cantidad_hab_dobles + 1;
//                            $preciospaxhotel->update();
//                        }
//                        break;
//                    case 'Triple':
//                        if ($preciospaxhotel->fecha_inicio <= $reserva_hab_hotel->fecha_entrada && $preciospaxhotel->fecha_fin >= $reserva_hab_hotel->fecha_entrada) {
//                            $preciospaxhotel->cantidad_hab_triples = $preciospaxhotel->cantidad_hab_triples + 1;
//                            $preciospaxhotel->update();
//                        }
//                        break;
//                }
//            }
            $carrito->delete();
            $reserva_hab_circuito->delete();
        } elseif ($carrito->reserva_viajes_medida_id != '') {

            $reserva_id = $carrito->reserva_viajes_medida_id;
            $reserva_viaje_medida = ReservaViajesMedida::findOrFail($reserva_id);
            $preciospaxviajes = PreciosPorViajesMedida::where('viaje_medida_id', $reserva_viaje_medida->viaje_medida_id)->get();
            foreach ($preciospaxviajes as $preciospaxviaje) {
                if ($preciospaxviaje->fecha_inicio <= $reserva_viaje_medida->fecha && $preciospaxviaje->fecha_fin >= $reserva_viaje_medida->fecha) {
                    $carrito->delete();
                    $reserva_viaje_medida->delete();
                }
            }
        } elseif ($carrito->reserva_excursion_id != '') {

            $reserva_id = $carrito->reserva_excursion_id;
            $reserva_excursion = ReservaExcursion::findOrFail($reserva_id);
            $excursion = Excursiones::findOrFail($reserva_excursion->excursion_id);

            if ($excursion->fecha_inicio <= $reserva_excursion->fecha_entrada && $excursion->fecha_fin >= $reserva_excursion->fecha_entrada) {
                $excursion->capacidad = $excursion->capacidad + $reserva_excursion->cantidad;
                $excursion->update();
                $carrito->delete();
                $reserva_excursion->delete();
            }
        } elseif ($carrito->reserva_hab_hotel_id != '') {
            $reserva_hab_hotel = ReservaHabitacionHotel::findOrFail($carrito->reserva_hab_hotel_id);

            $preciospaxhoteles = PreciosPaxHotel::where('hotel_id', $reserva_hab_hotel->hotels_id)->get();
            foreach ($preciospaxhoteles as $preciospaxhotel) {
                switch ($reserva_hab_hotel->tipo_habitacion) {
                    case 'Sencilla':
                        if ($preciospaxhotel->fecha_inicio <= $reserva_hab_hotel->fecha_entrada && $preciospaxhotel->fecha_fin >= $reserva_hab_hotel->fecha_entrada) {
                            $preciospaxhotel->cantidad_hab_sencillas = $preciospaxhotel->cantidad_hab_sencillas + 1;
                            $preciospaxhotel->update();
                        }
                        break;
                    case 'Doble':
                        if ($preciospaxhotel->fecha_inicio <= $reserva_hab_hotel->fecha_entrada && $preciospaxhotel->fecha_fin >= $reserva_hab_hotel->fecha_entrada) {
                            $preciospaxhotel->cantidad_hab_dobles = $preciospaxhotel->cantidad_hab_dobles + 1;
                            $preciospaxhotel->update();
                        }
                        break;
                    case 'Triple':
                        if ($preciospaxhotel->fecha_inicio <= $reserva_hab_hotel->fecha_entrada && $preciospaxhotel->fecha_fin >= $reserva_hab_hotel->fecha_entrada) {
                            $preciospaxhotel->cantidad_hab_triples = $preciospaxhotel->cantidad_hab_triples + 1;
                            $preciospaxhotel->update();
                        }
                        break;
                }
            }
            //$carrito->delete();
            $reserva_hab_hotel->delete();
        }
        elseif($carrito->reservar_flexi_drives_id != '' || $carrito->reservar_flexi_drives_id !=null)
        {
            $reserva_ffd = ReservarFlexiFlyDrive::findOrFail($carrito->reservar_flexi_drives_id);
            $clientesIntermedia=DB::table('reservar_pasajeros_flexi_drive')
            ->where('reserva_id','=',$carrito->reservar_flexi_drives_id)
            ->select('pasajero_id')
            ->get();
            $reserva_ffd->datoscliente()->sync([]);
            $reserva_ffd->hoteles()->sync([]);
            foreach($clientesIntermedia as $cliente)
            {
                $datoscliente=DatosCliente::where('id',"=",$cliente->pasajero_id)->first();
                $datoscliente->delete();
            }
            $reserva_ffd->delete();
            $carrito->delete();
        }

        return response()->json(array('success' => 'El contenido del Carrito de Compra se ha eliminado satisfactoriamente.'));
    }
}
