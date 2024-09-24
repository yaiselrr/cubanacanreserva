<?php

namespace App\Http\Controllers\Admin;

use App\Modelos\ReservaExcursion;
use App\Modelos\ReservaHabitacionCircuito;
use App\Modelos\ReservaHabitacionHotel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modelos\Servicio;
use App\Modelos\ServicioTraslation;
use App\Http\Requests\ServicioTraslationUpdateRequest;
use App\Http\Requests\ServicioTraslationStoreRequest;

class ReservasController extends Controller
{

    public function __construct()
    {
        $this->middleware('hasPermission:reservas.index')->only(['index']);
        $this->middleware('hasPermission:reservas.show')->only(['show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $reservasExcursiones = ReservaExcursion::join("excursiones", "reserva_excursiones.excursion_id", "=", "excursiones.id")
            ->join("status_reservas_translations", "reserva_excursiones.status_id", "=", "status_reservas_translations.status_reservas_id")
            ->where('status_reservas_translations.locale', '=', 'es')
            ->select('reserva_excursiones.id', 'excursiones.nombre as nombre', 'fecha_entrada as fecha', 'status_reservas_translations.status as estado')->get();

        $reservasHoteles = ReservaHabitacionHotel::join("hotels", "reserva_habitacion_hotels.hotels_id", "=", "hotels.id")
            ->join("status_reservas_translations", "reserva_habitacion_hotels.status_id", "=", "status_reservas_translations.status_reservas_id")
            ->where('status_reservas_translations.locale', '=', 'es')
            ->select('reserva_habitacion_hotels.id', 'hotels.nombre as nombre', 'fecha_entrada as fecha', 'status_reservas_translations.status as estado')->get();

        $reservasCircuitos = ReservaHabitacionCircuito::join("circuitos", "reserva_habitacion_circuitos.circuito_id", "=", "circuitos.id")
            ->join("circuitos_traslations", "circuitos.id", "=", "circuitos_traslations.circuitos_id")
            ->join("status_reservas_translations", "reserva_habitacion_circuitos.status_id", "=", "status_reservas_translations.status_reservas_id")
            ->where('status_reservas_translations.locale', '=', 'es')
            ->where('circuitos_traslations.idioma', '=', 'es')
            ->select('reserva_habitacion_circuitos.id', 'circuitos_traslations.nombre as nombre', 'circuitos.fecha_inicio as fecha', 'status_reservas_translations.status as estado')->get();

        $reservas = array_merge($this->addType($reservasExcursiones->toArray(), 'excursion'), $this->addType($reservasHoteles->toArray(), 'hotel'), $this->addType($reservasCircuitos->toArray(), 'circuito'));

        //TODO: hacer lo mismo para los otros productos
        return view('admin.reservas.index', compact('reservas'));
    }

    private function addType($array, $type)
    {
        $resArray = [];
        foreach ($array as $item) {
            $resArray[] = [
                'id' => $item['id'],
                'nombre' => $item['nombre'],
                'fecha' => $item['fecha'],
                'estado' => $item['estado'],
                'type' => $type
            ];
        }
        return $resArray;
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @param $type
     * @return void
     */
    public function show($id, $type)
    {
        if ($type == 'hotel') {
            $reservaHotel = ReservaHabitacionHotel::join("hotels", "reserva_habitacion_hotels.hotels_id", "=", "hotels.id")
                ->join("status_reservas_translations", "reserva_habitacion_hotels.status_id", "=", "status_reservas_translations.status_reservas_id")
                ->where('status_reservas_translations.locale', '=', 'es')
                ->where('reserva_habitacion_hotels.id', '=', $id)
                ->select('reserva_habitacion_hotels.id', 'hotels.nombre as nombre', 'fecha_entrada as fecha', 'status_reservas_translations.status as estado',
                'reserva_habitacion_hotels.tipo_habitacion as habitacion','reserva_habitacion_hotels.cantidad_adultos as adultos', 'reserva_habitacion_hotels.cantidad_ninnos2a12 as ninnos',
                    'reserva_habitacion_hotels.cantidad_ninnos0a2 as infantes','reserva_habitacion_hotels.cantidad_noche as noches')->first();
            $reserva = $reservaHotel;
            $reserva['type'] = 'hotel';
        }else if($type == 'circuito'){
            $reservaCircuito = ReservaHabitacionCircuito::join("circuitos", "reserva_habitacion_circuitos.circuito_id", "=", "circuitos.id")
                ->join("circuitos_traslations", "circuitos.id", "=", "circuitos_traslations.circuitos_id")
                ->join("status_reservas_translations", "reserva_habitacion_circuitos.status_id", "=", "status_reservas_translations.status_reservas_id")
                ->where('status_reservas_translations.locale', '=', 'es')
                ->where('circuitos_traslations.idioma', '=', 'es')
                ->select('reserva_habitacion_circuitos.id', 'circuitos_traslations.nombre as nombre', 'circuitos.fecha_inicio as fecha', 'status_reservas_translations.status as estado',
                'reserva_habitacion_circuitos.tipo_habitacion as habitacion','reserva_habitacion_circuitos.cantidad_adultos as adultos','reserva_habitacion_circuitos.cantidad_ninnos0a2 as infantes','reserva_habitacion_circuitos.cantidad_ninnos2a12 as ninnos')->first();
            $reserva = $reservaCircuito;
            $reserva['type'] = 'circuito';
        }else if($type == 'excursion'){
            $reservaExcursion = ReservaExcursion::join("excursiones", "reserva_excursiones.excursion_id", "=", "excursiones.id")
                ->join("status_reservas_translations", "reserva_excursiones.status_id", "=", "status_reservas_translations.status_reservas_id")
                ->where('status_reservas_translations.locale', '=', 'es')
                ->select('reserva_excursiones.id', 'excursiones.nombre as nombre', 'fecha_entrada as fecha', 'status_reservas_translations.status as estado',
                'reserva_excursiones.cantidad_adultos as adultos','reserva_excursiones.cantidad_ninnos0a2 as infantes','reserva_excursiones.cantidad_ninnos2a12 as ninnos')->first();
            $reserva = $reservaExcursion;
            $reserva['type'] = 'excursion';
        }

        return view('admin.reservas.show', compact('reserva'));
    }
}
