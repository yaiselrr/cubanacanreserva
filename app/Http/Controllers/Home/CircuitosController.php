<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modelos\CircuitoTraslations;
use App\Modelos\Circuito;
use App\Modelos\Provincia;
use App\Modelos\Duracion;
use App\Modelos\DiasAntelacionReserva;
use App\Modelos\PreciosPaxHotel;
use App\Modelos\Nacionalidad;
use App\Modelos\Carrusel;
use App\Modelos\CarruselTraslations;
use DB;
use App\Modelos\EnlaceRed;
use App\Modelos\ReservaHabitacionCircuito;
use App\Modelos\PreciPax;
use App\Modelos\DatosCliente;
use Illuminate\Support\Facades\Config;
use App\Modelos\CarritoCompra;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Carbon;


class CircuitosController extends Controller
{
    public function index()
    {
        $circuitos = DB::table('circuitos')->join('circuitos_traslations', 'circuitos.id', "=", "circuitos_traslations.circuitos_id")
            ->select('circuitos.imagen', 'circuitos.id', 'circuitos.precio_desde', 'circuitos_traslations.nombre as nombre',
                'circuitos.modalidads_id', 'circuitos_traslations.itinerario', 'circuitos.duracions_id')
            ->where('circuitos_traslations.idioma', '=', 'es')->paginate(4);
        $carousel1 = CarruselTraslations::where('idioma', '=', 'es')->first();
        $enlaces = EnlaceRed::all();
        if ($carousel1){
            $carouseles = CarruselTraslations::where('idioma', '=', 'es')
                ->where('id', '<>',$carousel1->id )->get();
        }else{
            $carouseles = null;
        }
        $destinos = Provincia::all();
        //dd($circuitos);

        return view('home.productoscircuitos', compact('circuitos', 'carouseles', 'carousel1', 'enlaces','destinos'));
    }


    public function detallescircuitos($id)
    {
        $ruta = '/circuitos/';
        $nombre = 'CIRCUITO';
        $nacionalidades = Nacionalidad::all();
        $addReserva = "Si";
        $tipohabitaciones = [
            ['value' => 'Secilla', 'tipohabitacion' => 'Secilla'],
            ['value' => 'Doble', 'tipohabitacion' => 'Doble'],
            ['value' => 'Triple', 'tipohabitacion' => 'Triple'],
        ];

        $carousel1 = CarruselTraslations::where('idioma', '=', 'es')->first();

        $carouseles = CarruselTraslations::where('idioma', '=', 'es')->get();
        $circuito = Circuito::findOrFail($id);
        $provincias = Provincia::all();
        $modalidades = DB::table('modalidads')->join('modalidad_traslations', 'modalidads.id', "=", "modalidad_traslations.modalidads_id")
            ->select('modalidad_traslations.nombre as nombre',
                'modalidad_traslations.modalidads_id')
            ->where('modalidad_traslations.idioma', '=', 'es')->get();
        $duraciones = Duracion::all();
        $dias_semana = DB::table('dias_semanas')->join('dias_semana_traslations', 'dias_semanas.id', "=", "dias_semana_traslations.dias_semanas_id")
            ->select('dias_semana_traslations.diassemana as nombre',
                'dias_semana_traslations.dias_semanas_id')
            ->where('dias_semana_traslations.locale', '=', 'es')->get();
        //dd($frecuencias);
        $frecuencias = DB::table('frecuencias')->join('frecuencia_traslations', 'frecuencias.id', "=", "frecuencia_traslations.frecuencias_id")
            ->select('frecuencia_traslations.frecuencia as nombre',
                'frecuencia_traslations.frecuencias_id')
            ->where('frecuencia_traslations.locale', '=', 'es')->get();

        $dias_antelacion = DiasAntelacionReserva::findOrFail($circuito->dias_antelacions_id);

        $diasantelacionreservas = DiasAntelacionReserva::all();

        $tras = CircuitoTraslations::where('circuitos_id', $circuito->id)
            ->where('circuitos_traslations.idioma', '=', 'es')->get();
        //$oficinas = OficinaTraslations::where('oficinas_traslations.idioma', '=', 'es')->get();
        $data = array();
        foreach ($tras as $item) {
            if ($item['idioma'] == 'es') {
                $data['nombre_es'] = $item['nombre'];
                $data['modalidad_es'] = $item['modalidad'];
                $data['itinerario_es'] = $item['itinerario'];
                $data['descripcion_es'] = $item['descripcion'];
            }
            if ($item['idioma'] == 'en') {
                $data['nombre_en'] = $item['nombre'];
                $data['descripcion_en'] = $item['direccion'];
            }
            if ($item['idioma'] == 'fr') {
                $data['nombre_fr'] = $item['nombre'];
                $data['descripcion_fr'] = $item['direccion'];
            }
            if ($item['idioma'] == 'dt') {
                $data ['nombre_dt'] = $item['nombre'];
                $data['descripcion_dt'] = $item['direccion'];
            }
            if ($item['idioma'] == 'it') {
                $data ['nombre_it'] = $item['nombre'];
                $data['descripcion_it'] = $item['direccion'];
            }
            if ($item['idioma'] == 'pt') {
                $data ['nombre_pt'] = $item['nombre'];
                $data['descripcion_pt'] = $item['direccion'];
            }
            $carousel1 = CarruselTraslations::where('idioma', '=', 'es')->first();
            $enlaces = EnlaceRed::all();
            $carouseles = CarruselTraslations::where('idioma', '=', 'es')->get();

        }
        $habitaciones = ReservaHabitacionCircuito::where('circuito_id', $circuito->id)->select('id', 'tipo_habitacion',
            'cantidad_adultos', 'cantidad_ninnos2a12', 'cantidad_ninnos0a2', 'req_especiales', 'circuito_id', 'precio')->get();
        $preciopaxcircuito = PreciPax::where('circuitos_id', $circuito->id)
            ->where('fecha_inicio', 'es')->get();
        //dd($circuito);
        $destinos = Provincia::all();
        //return view('admin.circuitos.edit',["circuito"=>$circuito,'provincias' => $provincias], compact('nombre','ruta','modalidades','duraciones','frecuencias','dias_semana','dias_antelacion','data'));
        return view('home.productoscircuitos-detalles', ["circuito" => $circuito, 'provincias' => $provincias], compact('nombre', 'ruta', 'modalidades', 'duraciones', 'frecuencias', 'dias_semana', 'diasantelacionreservas', 'data', 'addReserva', 'tipohabitaciones', 'tras', 'nacionalidades', 'carouseles', 'carousel1', 'enlaces', 'habitaciones', 'dias_antelacion', 'preciopaxcircuito','destinos'));

    }

    public function reservarHabCircuito(Request $request, $id)
    {
        $circuito = Circuito::findOrFail($id);
        $listPreciospax = PreciPax::all();
        $preciopaxcircuito = PreciPax::where('circuitos_id', $circuito->id)->get();
        $name = "";
        $tras = CircuitoTraslations::where('circuitos_id', $circuito->id)
            ->where('circuitos_traslations.idioma', '=', 'es')->get();
        foreach ($tras as $tra){
            $name = $tra->nombre;
        }
        $redirect = '';

        for ($i = 0, $iMax = count($request->habitaciones); $i < $iMax; $i++) {
            $reservacionescircuito = ReservaHabitacionCircuito::create([
                'fecha_entrada' => $request->habitaciones[$i]['fechaEntrada'],
                'cantidad_adultos' => $request->habitaciones[$i]['cantAdultos'],
//                'cantidad_noche' => $request->habitaciones[$i]['cantNoches'],
                'cantidad_ninnos2a12' => $request->habitaciones[$i]['cantN212'],
                'cantidad_ninnos0a2' => $request->habitaciones[$i]['cantN02'],
                'req_especiales' => $request->habitaciones[$i]['requerimientos'],
                'circuito_id' => $circuito->id,
                'tipo_habitacion' => $request->habitaciones[$i]['tipoHabitacion'],
                'precio' => 1000,
                'precio_total' => $request->habitaciones[$i]['precio'],
                'status_id' => 1
            ]);

            for ($j = 0, $jMax = count($request->habitaciones[$i]['personas'][0]); $j < $jMax; $j++) {

                DatosCliente::create([
                    'fecha_nacimiento' => $request->habitaciones[$i]['personas'][0][$j]['fecha'],
                    'nacionalidad_id' => $request->habitaciones[$i]['personas'][0][$j]['nacionalidad'],
                    'numero_pasaporte' => $request->habitaciones[$i]['personas'][0][$j]['pasaporte'],
                    'nombre' => $request->habitaciones[$i]['personas'][0][$j]['nombre'],
                    'reserva_hab_circuito_id' => $circuito->id,
                ]);
            }

            $carrito = CarritoCompra::create([
                'total_precio' => 1000,
                'nombre_producto' => $name,
                'tipo_producto' => 'Circuito',
                'estado' => Config::get('constants.estados.espera'),
                'reserva_hab_circuito_id' => $reservacionescircuito->id,
            ]);

            $cart = [

                "idCarrito" => $carrito->id,
                "cantAdultos" => $request->habitaciones[$i]['cantAdultos'],
                "cantN212" => $request->habitaciones[$i]['cantN212'],
                "cantN02" => $request->habitaciones[$i]['cantN02'],
                "nombre_producto" => $name,
                "tipo_producto" => 'Circuito',
                "fecha" => Carbon::now(),
                "tipo_habitacion" => $reservacionescircuito->tipo_habitacion,
                "reserva_hab_circuito_id" => $reservacionescircuito->id,
                "total_precio" => 1000,
                "estado" => Config::get('constants.estados.espera')

            ];
            //session()->flush('cart');
            session()->push('cart', $cart);
            $redirect = route('home.carrito-compras', ['añadido' => count($request->habitaciones) . ' ' . 'productos']);
        }
        return response()->json(array('success' => 'Los datos de Habitaciones se ha adicionado satisfactoriamente.', 'redirect' => $redirect));

    }
}
