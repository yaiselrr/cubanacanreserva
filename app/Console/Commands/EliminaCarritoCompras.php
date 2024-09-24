<?php

namespace App\Console\Commands;

use App\Modelos\Excursiones;
use App\Modelos\PreciosPaxHotel;
use App\Modelos\PreciosPorViajesMedida;
use App\Modelos\ReservaExcursion;
use App\Modelos\ReservaHabitacionCircuito;
use App\Modelos\ReservaViajesMedida;
use Illuminate\Console\Command;
use DB;
use App\Modelos\CarritoCompra;
use App\Modelos\ReservaHabitacionHotel;
use Illuminate\Support\Carbon;

class EliminaCarritoCompras extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'eliminarCarritoCompra';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Eliminar un registro de la tabla Carrito de Compras despues de pasado las 6 horas y este en Estado de espera';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        /*//$fecha = DB::table('carrito_compras')->select('created_at')->get();
        $eliminar = DB::table('carrito_compras')->where('estado', 1)
            ->where('created_at', '>=', Carbon::now()->subHours(6)->toDateString())->delete()*/;

        $carritos = DB::table('carrito_compras')->where('estado', 1)
            ->where('created_at', '>=', Carbon::now()->subHours(6)->toDateString())->get();
        foreach ($carritos as $carrito) {

            if ($carrito->reserva_hab_hotel_id != '') {
                $reserva_id = $carrito->reserva_hab_hotel_id;
                $reserva_hab_hotel = ReservaHabitacionHotel::findOrFail($reserva_id);

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

            } elseif ($carrito->reserva_excursion_id != '') {
                $reserva_id = $carrito->reserva_excursion_id;
                $reserva_excursion = ReservaExcursion::findOrFail($reserva_id);
                $excursion = Excursiones::findOrFail($reserva_excursion->excursion_id);
                if ($excursion->fecha_inicio <= $reserva_excursion->fecha_entrada && $excursion->fecha_fin >= $reserva_excursion->fecha_entrada) {
                    $excursion->capacidad = $excursion->capacidad + $reserva_excursion->cantidad;
                    $excursion->update();
                    // $carrito->delete();
                    $reserva_excursion->delete();
                }
            } /* elseif ($carrito->reserva_hab_circuito_id != '') {
                 $reserva_hab_id = $carrito->reserva_hab_circuito_id;
                 $reserva = ReservaHabitacionCircuito::findOrFail($reserva_hab_id);
             } */
            elseif ($carrito->reserva_viajes_medida_id != '') {
                $reserva_hab_id = $carrito->reserva_viajes_medida_id;
                $reserva_viaje_medida = ReservaViajesMedida::findOrFail($reserva_hab_id);
                $preciospaxviajes = PreciosPorViajesMedida::where('viaje_medida_id', $reserva_viaje_medida->viaje_medida_id)->get();
                foreach ($preciospaxviajes as $preciospaxviaje) {
                    if (($reserva_viaje_medida->viaje_medida_id == $preciospaxviaje->viaje_medida_id) && ($preciospaxviaje->fecha_inicio <= $reserva_viaje_medida->fecha && $preciospaxviaje->fecha_fin >= $reserva->fecha)) {
                        $reserva_viaje_medida->delete();
                    }
                }
            }
        }
    }
}
