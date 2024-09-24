<?php

namespace App\Http\Controllers\Home;

use App\Http\Requests\ReservarExcursionRequest;
use App\Modelos\DatosCliente;
use App\Modelos\DiasAntelacionReserva;
use App\Modelos\CarritoCompra;
use App\Modelos\Nacionalidad;
use App\Modelos\DiasSemana;
use App\Modelos\Duracion;
use App\Modelos\Frecuencia;
use App\Modelos\HotelRecogida;
use App\Modelos\Idioma;
use App\Modelos\Provincia;
use App\Modelos\ReservaExcursion;
use App\Modelos\ReservarHabitacionExcursion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modelos\Excursiones;
use App\Modelos\ExcursionesTraslation;
use App\Modelos\Modalidad;
use App\Modelos\ModalidadTraslation;
use Illuminate\Support\Carbon;
use Illuminate\Validation\Validator;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Illuminate\Support\Facades\Config;
use App\Modelos\Carrusel;
use App\Modelos\CarruselTraslations;
use DB;
use App\Modelos\EnlaceRed;

class ExcursionesController extends Controller
{
    public function index()
    {
        $fechaHoy = Carbon::now()->format('Y-m-d');
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
            ->orderBy('excursiones.fecha_inicio', 'desc')
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
        //dd($excursiones);

        return view('home.productosexcursiones', compact('excursiones', 'carouseles', 'carousel1', 'enlaces','destinos'));
    }

    public function detallesExcursion($id)
    {
        $excursion = Excursiones::findOrFail($id);
        $dias_antelacion = DiasAntelacionReserva::findOrFail($excursion->dias_antelacion_reserva_id);
        $cant_reservas = count(ReservaExcursion::where('excursion_id', $excursion->id)->get());

        //$preciopaxhotel = PreciosPaxHotel::where('hotel_id', $hotel->id)->get();
        $hotelesrecogidas = HotelRecogida::where('excursion_id', $excursion->id)->get();
        $duracion = Duracion::findOrFail($excursion->duracion_id);
        $territorioorigen = Provincia::findOrFail($excursion->territorio_origen_id);
        $territoriodestino = Provincia::findOrFail($excursion->territorio_destino_id);

        $idiomas = Idioma::all();
        $nacionalidades = Nacionalidad::all();
        $idiomas_ids = explode(',', $excursion->idioma_id);
        $listadoidiomas = array();
        $idiomasexcursion = null;
        foreach ($idiomas as $idioma) {
            foreach ($idiomas_ids as $item) {
                if ($idioma->id == $item) {
                    $listadoidiomas[] = $idioma->idioma;
                    $idiomasexcursion [] = $idioma;
                }
            }
        }
        $resulidiomas = implode(', ', $listadoidiomas);

        $frecuencias = Frecuencia::join("frecuencia_traslations", "frecuencias.id", "=", "frecuencia_traslations.frecuencias_id")
            ->where('locale', '=', 'es')
            ->select('frecuencias.id', 'frecuencia_traslations.frecuencia', 'frecuencia_traslations.frecuencias_id')->get();
        $modalidades = Modalidad::join("modalidad_traslations", "modalidads.id", "=", "modalidad_traslations.modalidads_id")
            ->where('idioma', '=', 'es')
            ->select('modalidads.id', 'modalidad_traslations.nombre as modalidad', 'modalidad_traslations.modalidads_id')->get();

        $excursionestraslations = ExcursionesTraslation::where('excursiones_id', $excursion->id)->get()->where('locale', '=', 'es');
        $data = array();
        foreach ($excursionestraslations as $item) {
            $data['descripcion'] = $item['descripcion'];
        }
        $carousel1 = CarruselTraslations::where('idioma', '=', 'es')->first();
        $enlaces = EnlaceRed::all();
        $carouseles = CarruselTraslations::where('idioma', '=', 'es')->get();
        $destinos = Provincia::all();
        //$totalapagar = $excursion->precio_pax + $excursion->precio_ninnos2a12annos;

        return view('home.productosexcursion-detalles', ['excursion' => $excursion], compact('data', 'duracion'
            , 'territorioorigen', 'territoriodestino', 'resulidiomas', 'frecuencias', 'modalidades', 'idiomas', 'hotelesrecogidas'
            , 'idiomasexcursion', 'dias_antelacion', 'nacionalidades', 'carouseles', 'enlaces', 'carousel1', 'cant_reservas','destinos'));
    }

    public function reservarExcursion(ReservarExcursionRequest $request, $id)
    {

        $validated = $request->validated();
       // dd($validated);
        //$reservarules = new ReservaExcursion();
        //$this->validate($request, $reservarules->rules, $reservarules->messages, $reservarules->attributes);
        $habitaciones = json_decode($request->habitaciones);
        $excursion = Excursiones::findOrFail($id);

        $cantida_adultos = null;
        $cantida_ninnos2a12 = null;
        $cantida_ninnos0a12 = null;
        if ($request->cantidad_adultos != '') {
            $cantida_adultos = $request->cantidad_adultos;
        }/* elseif ($request->cantidad_adultos_excursion) {
            $cantida_adultos = $request->cantidad_adultos_excursion;
        }*/

        if ($request->cantidad_ninnos2a12 != '') {
            $cantida_ninnos2a12 = $request->cantidad_ninnos2a12;
        } /*elseif ($request->cantidad_ninnos2a12_excursion) {
            $cantida_ninnos2a12 = $request->cantidad_ninnos2a12_excursion;
        }*/

        if ($request->cantidad_ninnos0a2 != '') {
            $cantida_ninnos0a12 = $request->cantidad_ninnos0a2;
        } /*elseif ($request->cantidad_ninnos0a2_excursion) {
            $cantida_ninnos0a12 = $request->cantidad_ninnos0a2_excursion;
        }*/

        $habitacion_excursion = $request->filled(0);
        if ($excursion->excursion_habitacion) {
            $habitacion_excursion = $request->filled(1) ;
        }

        $reservacionexcursion = ReservaExcursion::create([
            'fecha_entrada' => $request->fecha_entrada,
            'cantidad_adultos' => $cantida_adultos,
            'cantidad_ninnos2a12' => $cantida_ninnos2a12,
            'cantidad_ninnos0a2' => $cantida_ninnos0a12,
            'almuerzo' => $request->almuerzo,
            'habitacion_excursion' => $habitacion_excursion,
            'hora_salida_hotel_recogida' => $request->hora_salida_hotel_recogida,
            'hora_salida_auto' => $request->hora_salida_auto,
            'lugar_salida' => $request->lugar_salida,
            'tipo_cicloturismo' => $request->tipo_cicloturismo,
            'tipo_excursion_delfines' => $request->tipo_excursion_delfines,
            'excursion_id' => $excursion->id,
            'telefono' => $request->telefono,
            'idioma_id' => $request->idioma_id,
            'nombre' => $request->nombre,
            'email' => $request->email,
            'hotel_recogida_id' => $request->hotel_recogida_id,
            'precio_total' => $request->precio_total,
            'status_id' => 1
        ]);

        $tipo_habitaciones = null;
        //$habitaciones='No tiene habitaciones';
        /*if ($habitaciones) {
            for ($i = 0, $iMax = count($habitaciones); $i < $iMax; $i++) {
                $reservacionhabitacionexcursion = ReservarHabitacionExcursion::create([
                    'cantidad_adultos' => $habitaciones[$i]->cantAdultos,
                    'cantidad_ninnos2a12' => $habitaciones[$i]->cantN212,
                    'cantidad_ninnos0a2' => $habitaciones[$i]->cantN02,
                    'reserva_excursion_id' => $reservacionexcursion->id,
                    'tipo_habitacion' => $habitaciones[$i]->tipoHabitacion,
                    'precio_total' => $habitaciones[$i]->precio,
                ]);
                $tipo_habitaciones [] = $habitaciones[$i]->tipoHabitacion;

                for ($j = 0, $jMax = count($habitaciones[$i]->personas[0]); $j < $jMax; $j++) {

                    DatosCliente::create([
                        'fecha_nacimiento' => $habitaciones[$i]->personas[0][$j]->fecha,
                        'nacionalidad_id' => $habitaciones[$i]->personas[0][$j]->nacionalidad,
                        'numero_pasaporte' => $habitaciones[$i]->personas[0][$j]->pasaporte,
                        'nombre' => $habitaciones[$i]->personas[0][$j]->nombre,
                        'reserva_hab_excursion_id' => $reservacionhabitacionexcursion->id,
                    ]);
                }
            }
            $habitaciones = implode(', ', $tipo_habitaciones);
        }*/
        $carrito = CarritoCompra::create([
            'total_precio' => $reservacionexcursion->precio_total,
            'nombre_producto' => $excursion->nombre,
            'tipo_producto' => 'Excursion',
            'estado' => Config::get('constants.estados.espera'),
            'reserva_excursion_id' => $reservacionexcursion->id,
        ]);

        $cart = [
            "idCarrito" => $carrito->id,
            "cantAdultos" => $cantida_adultos,
            "cantN212" => $cantida_ninnos2a12,
            "cantN02" => $cantida_ninnos0a12,
            "nombre_producto" => $excursion->nombre,
            "tipo_producto" => 'Excursion',
            "fecha" => $reservacionexcursion->fecha_entrada,
            "reserva_excursion_id" => $reservacionexcursion->id,
            "total_precio" => $reservacionexcursion->precio_total,
            "estado" => Config::get('constants.estados.espera')

        ];
        session()->flush('cart');
        session()->push('cart', $cart);

        $redirect = route('home.carrito-compras', ['añadido' => 1 . ' ' . 'producto']);

        return response()->json(array('success' => 'El producto se ha añadido al Carrito de compras.', 'redirect' => $redirect));
    }


}
