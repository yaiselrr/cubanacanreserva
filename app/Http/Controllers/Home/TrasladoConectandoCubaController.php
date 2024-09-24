<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Modelos\RutaConectandoCuba;
use App\Modelos\LugarRecogidaConectandoCuba;
use App\Modelos\Provincia;
use App\Modelos\Nacionalidad;
use App\Modelos\Carrusel;
use App\Modelos\CarruselTraslations;
use App\Modelos\EnlaceRed;
use App\Modelos\ColectivoPrivadoConCuba;
use App\Modelos\ReservarConectandoCuba;
use App\Modelos\CarritoCompra;
use App\Modelos\DiasAntelacionReserva;
use App\Modelos\ViajesMedida;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Carbon;
use DB;


class TrasladoConectandoCubaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $rutas = RutaConectandoCuba::all();
        $conectandos = ColectivoPrivadoConCuba::all();
        $provincias = Provincia::all();
        $lugares = LugarRecogidaConectandoCuba::all();
        $nacionalidades = Nacionalidad::all();
        $carousel1 = CarruselTraslations::where('idioma', '=', 'es')->first();
        $enlaces = EnlaceRed::all();
        if ($carousel1) {
            $carouseles = CarruselTraslations::where('idioma', '=', 'es')
                ->where('id', '<>', $carousel1->id)->get();
        } else {
            $carouseles = null;
        }
        $destinos = Provincia::all();

        return view('home.productostraslados', compact('rutas', 'provincias', 'conectandos', 'lugares', 'nacionalidades', 'carouseles', 'carousel1', 'enlaces', 'destinos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
//        session()->flush('cart');
//        dd($request);
        $rules = [
            'fecha_inicio' => 'required|date',
            'ruta' => 'required|sometimes',
            'provincia_origen' => 'required|sometimes',
            'provincia_destino' => 'required|sometimes',
            'cantidad_adultos' => 'required|sometimes',
            'cantidad_ninnos0a2' => 'sometimes',
            'cantidad_ninnos2a12' => 'sometimes',
            'lugar' => 'required|sometimes',
            'hora_recogida' => 'required',
            'nombre' => 'required|max:200',
            'email' => 'required|max:500',
            'req_especiales' => 'max:500',

        ];

        $messages = [
            'fecha_inicio.required' => 'Es necesario ingresar una fecha para el traslado.',
            'ruta.required' => 'Es necesario ingresar una ruta para el traslado.',
            'provincia_origen.required' => 'Es necesario ingresar un origen para el traslado.',
            'provincia_destino.required' => 'Es necesario ingresar un destino para el traslado.',
            'cantidad_adultos.required' => 'Es necesario ingresar una cantidad de adultos para el traslado.',
            'lugar.required' => 'Es necesario ingresar un lugar de recogida para el traslado.',
            'nombre.required' => 'Es necesario ingresar un nombre con los apellidos del titular para el traslado.',
            'hora_recogida.required' => 'Es necesario ingresar una hora de recogida para el traslado.',
            'email.required' => 'Es necesario ingresar un email para el traslado.',

            'nombre.max' => 'El nombre con los apellidos del titular de el traslado debe tener máximo 200 caracteres.',
            'email.max' => 'el email del traslado debe tener máximo 500 caracteres.',
            'req_especiales.max' => 'los requerimientos especiales del traslado deben tener máximo 500 caracteres.',
        ];
        $this->validate($request, $rules, $messages);

        $traslado = new ReservarConectandoCuba();
        $traslado->fecha = $request->get('fecha_inicio');
        $traslado->ruta_id = $request->get('ruta');
        $traslado->provincia_origen_id = $request->get('provincia_origen');
        $traslado->provincia_destino_id = $request->get('provincia_destino');
        $traslado->nombre_apellidos = $request->get('nombre');
        $traslado->email = $request->get('email');
        $traslado->cantidad_adultos = $request->get('cantidad_adultos');
        $traslado->cantidad_infantes = $request->get('cantidad_ninnos0a2');
        $traslado->cantidad_ninnos = $request->get('cantidad_ninnos2a12');
        $traslado->lugar_recogida_id = $request->get('lugar');
        $traslado->hora_recogida = $request->get('hora_recogida');
        $traslado->requerimientos_especiales = $request->get('req_especiales');
        $traslado->en_espera = 1;
        $traslado->total = $request->get('preciof');
        $traslado->save();

        $rutas = RutaConectandoCuba::where('id', $request->get('ruta'))->get();

//        dd($rutas);

        $name = "";
        foreach ($rutas as $tra){
            $name = $tra->ruta;
        }
        //dd($traslado->id);

        $carrito = CarritoCompra::create([
            'total_precio' => $traslado->total,
            'nombre_producto' => 'Conectando Cuba',
            'tipo_producto' => 'Transfer',
            'estado' => Config::get('constants.estados.espera'),
            'reserva_conectando_id' => $traslado->id,
        ]);

        $cart = [

            "idCarrito" => $carrito->id,
            "cantAdultos" => $request->cantidad_adultos,
            "cantN212" => $request->cantidad_ninnos2a12,
            "cantN02" => $request->cantidad_ninnos0a2,
            "nombre_producto" => 'Conectando Cuba',
            "tipo_producto" => 'Transfer',
            "fecha" => $traslado->fecha,
            "reserva_conectando_id" => $traslado->id,
            "total_precio" => $traslado->total,
            "estado" => Config::get('constants.estados.espera')

        ];
       // dd($carrito,$cart);
        //dd($cart);
        session()->push('cart', $cart);
        $redirect = route('home.carrito-compras', ['añadido' => 1 . ' ' . 'producto']);

        return response()->json(array('success' => 'Los datos del transfer conectando cuba se han adicionado satisfactoriamente.', 'redirect' => $redirect));


    }

    public function getLugares(Request $request)
    {
        if ($request->ajax()) {
            $lugares = LugarRecogidaConectandoCuba::where('ruta_id', $request->ruta_id)->get();
            foreach ($lugares as $lugar) {
                $lugaresArray[$lugar->id] = $lugar->hotel->nombre;
            }
            //dd($lugaresArray);
            return response()->json($lugaresArray);
        }
        /*$lugares = LugarRecogidaConectandoCuba::all();
        return response()->json($lugares);*/


    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $rutas = RutaConectandoCuba::all();
        $conectandos = ColectivoPrivadoConCuba::all();
        $provincias = Provincia::all();
        $lugares = LugarRecogidaConectandoCuba::all();
        //dd($conectandos);
        $nacionalidades = Nacionalidad::all();
        $carousel1 = CarruselTraslations::where('idioma', '=', 'es')->first();
        $enlaces = EnlaceRed::all();
        $carouseles = CarruselTraslations::where('idioma', '=', 'es')->get();
        $traslado = ReservarConectandoCuba::findOrFail($id);
        $destinos = Provincia::all();
        //dd($traslado);

        return view('home.productostrasladosedit', compact('rutas', 'provincias', 'conectandos', 'lugares', 'nacionalidades', 'carouseles', 'carousel1', 'enlaces', 'traslado', 'destinos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, $id)
    {
        //
        $rules = [
            'fecha_inicio' => 'required|date',
            'ruta' => 'required|sometimes',
            'provincia_origen' => 'required|sometimes',
            'provincia_destino' => 'required|sometimes',
            'cantidad_adultos' => 'required|sometimes',
            'cantidad_ninnos0a2' => 'sometimes',
            'cantidad_ninnos2a12' => 'sometimes',
            'lugar' => 'required|sometimes',
            'hora_recogida' => 'required',
            'nombre' => 'required|max:200',
            'email' => 'required|max:500',
            'req_especiales' => 'max:500',

        ];

        $messages = [
            'fecha_inicio.required' => 'Es necesario ingresar una fecha para el traslado.',
            'ruta.required' => 'Es necesario ingresar una ruta para el traslado.',
            'provincia_origen.required' => 'Es necesario ingresar un origen para el traslado.',
            'provincia_destino.required' => 'Es necesario ingresar un destino para el traslado.',
            'cantidad_adultos.required' => 'Es necesario ingresar una cantidad de adultos para el traslado.',
            'lugar.required' => 'Es necesario ingresar un lugar de recogida para el traslado.',
            'nombre.required' => 'Es necesario ingresar un nombre con los apellidos del titular para el traslado.',
            'hora_recogida.required' => 'Es necesario ingresar una hora de recogida para el traslado.',
            'email.required' => 'Es necesario ingresar un email para el traslado.',

            'nombre.max' => 'El nombre con los apellidos del titular de el traslado debe tener máximo 200 caracteres.',
            'email.max' => 'el email del traslado debe tener máximo 500 caracteres.',
            'req_especiales.max' => 'los requerimientos especiales del traslado deben tener máximo 500 caracteres.',
        ];
        $this->validate($request, $rules, $messages);

        $traslado = ReservarConectandoCuba::findOrFail($id);
        $traslado->fecha = $request->get('fecha_inicio');
        $traslado->ruta_id = $request->get('ruta');
        $traslado->provincia_origen_id = $request->get('provincia_origen');
        $traslado->provincia_destino_id = $request->get('provincia_destino');
        $traslado->nombre_apellidos = $request->get('nombre');
        $traslado->email = $request->get('email');
        $traslado->cantidad_adultos = $request->get('cantidad_adultos');
        $traslado->cantidad_infantes = $request->get('cantidad_ninnos0a2');
        $traslado->cantidad_ninnos = $request->get('cantidad_ninnos2a12');
        $traslado->lugar_recogida_id = $request->get('lugar');
        $traslado->hora_recogida = $request->get('hora_recogida');
        $traslado->requerimientos_especiales = $request->get('req_especiales');
        $traslado->en_espera = 1;
        $traslado->total = $request->get('preciof');

        if ($traslado->update()) {
            return redirect()->route('home.trasladosconectandocubat')->with('notificacion', 'El contenido del traslado se ha editado satisfactoriamente.');
        } else {
            return redirect()->route('home.trasladosconectandocubat')->with('notificacion', 'El contenido del traslado no se ha editado satisfactoriamente.');

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $traslado = ReservarConectandoCuba::destroy($id);


        if ($traslado != null) {
            return redirect()->route('home.trasladosconectandocubat')->with('notificacion', 'Se ha eliminado satisfactoriamente el traslado.');
        }

        return redirect()->route('home.trasladosconectandocubat')->with('notificacionerror', 'No se ha podido eliminar el traslado    de su base de datos.');
    }

    public function reservarTrasladoConectandoCuba(Request $request, $id)
    {
        $rules = [
            'fecha_inicio' => 'required|date',
            'ruta' => 'required|sometimes',
            'provincia_origen' => 'required|sometimes',
            'provincia_destino' => 'required|sometimes',
            'cantidad_adultos' => 'required|sometimes',
            'cantidad_ninnos0a2' => 'sometimes',
            'cantidad_ninnos2a12' => 'sometimes',
            'lugar' => 'required|sometimes',
            'hora_recogida' => 'required',
            'nombre' => 'required|max:200',
            'email' => 'required|max:500',
            'req_especiales' => 'max:500',

        ];

        $messages = [
            'fecha_inicio.required' => 'Es necesario ingresar una fecha para el traslado.',
            'ruta.required' => 'Es necesario ingresar una ruta para el traslado.',
            'provincia_origen.required' => 'Es necesario ingresar un origen para el traslado.',
            'provincia_destino.required' => 'Es necesario ingresar un destino para el traslado.',
            'cantidad_adultos.required' => 'Es necesario ingresar una cantidad de adultos para el traslado.',
            'lugar.required' => 'Es necesario ingresar un lugar de recogida para el traslado.',
            'nombre.required' => 'Es necesario ingresar un nombre con los apellidos del titular para el traslado.',
            'hora_recogida.required' => 'Es necesario ingresar una hora de recogida para el traslado.',
            'email.required' => 'Es necesario ingresar un email para el traslado.',

            'nombre.max' => 'El nombre con los apellidos del titular de el traslado debe tener máximo 200 caracteres.',
            'email.max' => 'el email del traslado debe tener máximo 500 caracteres.',
            'req_especiales.max' => 'los requerimientos especiales del traslado deben tener máximo 500 caracteres.',
        ];
        $this->validate($request, $rules, $messages);

        $traslado = new ReservarConectandoCuba();

        $traslado->fecha = $request->get('fecha_inicio');
        $traslado->ruta_id = $request->get('ruta');
        $traslado->provincia_origen_id = $request->get('provincia_origen');
        $traslado->provincia_destino_id = $request->get('provincia_destino');
        $traslado->nombre_apellidos = $request->get('nombre');
        $traslado->email = $request->get('email');
        $traslado->cantidad_adultos = $request->get('cantidad_adultos');
        $traslado->cantidad_infantes = $request->get('cantidad_ninnos0a2');
        $traslado->cantidad_ninnos = $request->get('cantidad_ninnos2a12');
        $traslado->lugar_recogida_id = $request->get('lugar');
        $traslado->hora_recogida = $request->get('hora_recogida');
        $traslado->requerimientos_especiales = $request->get('req_especiales');
        $traslado->en_espera = 1;
        $traslado->total = $request->get('preciof');
        $traslado->save();

        $ruta = RutaConectandoCuba::findOrFail($traslado->ruta_id);

        $carrito = CarritoCompra::create([
            'total_precio' => $traslado->total,
            'nombre_producto' => $ruta->ruta,
            'tipo_producto' => 'Transfer Conectando Cuba',
            'estado' => Config::get('constants.estados.espera'),
            'reserva_viajes_medida_id' => $traslado->id,
        ]);

        $cart = [

            "idCarrito" => $carrito->id,
            "cantAdultos" => $request->cantidad_adultos,
            "cantN212" => $request->cantidad_ninnos2a12,
            "cantN02" => $request->cantidad_ninnos0a2,
            "ruta" => $ruta->ruta,
            "tipo_producto" => 'Transfer Conectando Cuba',
            "fecha" => $traslado->fecha,
//            "tipo_habitacion" => $resvacionviajemedida->tipo_habitacion,
            "reserva_cc_id" => $traslado->id,
            "total_precio" => $traslado->total,
            "estado" => Config::get('constants.estados.espera')

        ];
        session()->push('cart', $cart);
        $redirect = route('home.carrito-compras', ['añadido' => 1 . ' ' . 'producto']);

        return response()->json(array('success' => 'Los datos del transfer conectando cuba se han adicionado satisfactoriamente.', 'redirect' => $redirect));
    }
}
