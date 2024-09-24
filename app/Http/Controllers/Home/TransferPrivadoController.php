<?php

namespace App\Http\Controllers\Home;

//use App\Home\ReservarTransferPrivado;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


use App\Modelos\RutaConectandoCuba;
use App\Modelos\LugarRecogidaConectandoCuba;
use App\Modelos\Provincia;
use App\Modelos\Nacionalidad;
use App\Modelos\Carrusel;
use App\Modelos\CarruselTraslations;
use App\Modelos\EnlaceRed;
use App\Modelos\ReservarTransferColectivo;
use App\Modelos\ReservarTransferPrivado;
use App\Modelos\TarifarioColectivo;
use App\Modelos\TarifarioPrivado;

use App\Modelos\CarritoCompra;
use App\Modelos\DiasAntelacionReserva;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Carbon;

class TransferPrivadoController extends Controller
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
        $provincias = Provincia::all();
        $lugares = LugarRecogidaConectandoCuba::all();
        $nacionalidades = Nacionalidad::all();
        $carousel1 = CarruselTraslations::where('idioma', '=', 'es')->first();
        $enlaces = EnlaceRed::all();
        if ($carousel1){
            $carouseles = CarruselTraslations::where('idioma', '=', 'es')
                ->where('id', '<>',$carousel1->id )->get();
        }else{
            $carouseles = null;
        }
        $destin_inicias = TarifarioPrivado::all();
        $destin_inicia = TarifarioPrivado::where("id", ">", 0)-> select("id", "origen")->get();
        $destinos = Provincia::all();        //dd($destin_inicia);

        return view('home.productostrasladosprivado', compact('rutas', 'provincias', 'lugares', 'nacionalidades', 'carouseles', 'carousel1', 'enlaces','destin_inicia','destin_inicias','destinos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //
        $rules = [
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date',
            'provincia_origen' => 'required|sometimes',
            'provincia_destino' => 'required|sometimes',
            'guia' => 'required|sometimes',
            'tipo_vehiculo' => 'required|sometimes',
            'cantidad_adultos' => 'required|sometimes',
            'cantidad_ninnos0a2' => 'sometimes',
            'cantidad_ninnos2a12' => 'sometimes',
            'lugari' => 'required|sometimes',
            'lugarf' => 'required|sometimes',
            'nacionalidad_id' => 'required|sometimes',
            'hora_inicio' => 'required',
            'hora_fin' => 'required',
            'nombre' => 'required|max:200',
            'vuelo' => 'required|max:10',
            'email' => 'required|max:500',
            'req_especiales' => 'max:500',

        ];

        $messages = [
            'fecha_inicio.required' => 'Es necesario ingresar una fecha para el traslado.',
            'fecha_fin.required' => 'Es necesario ingresar una fecha para el traslado.',
            'provincia_origen.required' => 'Es necesario ingresar un origen para el traslado.',
            'provincia_destino.required' => 'Es necesario ingresar un destino para el traslado.',
            'guia.required' => 'Es necesario ingresar si desea guia para el traslado.',
            'tipo_vehiculo.required' => 'Es necesario ingresar un tipo_vehiculo para el traslado.',
            'cantidad_adultos.required' => 'Es necesario ingresar una cantidad de adultos para el traslado.',
            'lugari.required' => 'Es necesario ingresar un lugar inicio de recogida para el traslado.',
            'lugarf.required' => 'Es necesario ingresar un lugar fin de recogida para el traslado.',
            'nombre.required' => 'Es necesario ingresar un nombre con los apellidos del titular para el traslado.',
            'hora_inicio.required' => 'Es necesario ingresar una hora de inicio para el traslado.',
            'hora_fin.required' => 'Es necesario ingresar una hora de fin para el traslado.',
            'email.required' => 'Es necesario ingresar un email para el traslado.',
            'nacionalidad_id.required' => 'Es necesario ingresar una nacionalidad para el traslado.',
            'vuelo.required' => 'Es necesario ingresar un No de vuelo para el traslado.',

            'nombre.max' => 'El nombre con los apellidos del titular de el traslado debe tener máximo 200 caracteres.',
            'email.max' => 'el email del traslado debe tener máximo 500 caracteres.',
            'req_especiales.max' => 'los requerimientos especiales del traslado deben tener máximo 500 caracteres.',
        ];
        $this->validate($request, $rules, $messages);

        $traslado = new ReservarTransferPrivado();
        $traslado->fecha_inicio = $request->get('fecha_inicio');
        $traslado->fecha_fin = $request->get('fecha_fin');
        $traslado->provincia_origen_id = $request->get('provincia_origen');
        $traslado->provincia_destino_id = $request->get('provincia_destino');
        $traslado->incluir_guia = $request->get('incluir_guia');
        $traslado->tipo_vehiculo = $request->get('tipo_vehiculo');
        $traslado->nombre_apellidos = $request->get('nombre');
        $traslado->email = $request->get('email');
        $traslado->cantidad_adultos = $request->get('cantidad_adultos');
        $traslado->cantidad_infantes = $request->get('cantidad_ninnos0a2');
        $traslado->cantidad_ninnos = $request->get('cantidad_ninnos2a12');
        $traslado->lugar_inicio = $request->get('lugari');
        $traslado->lugar_fin = $request->get('lugarf');
        $traslado->hora_inicio = $request->get('hora_inicio');
        $traslado->hora_fin = $request->get('hora_fin');
        $traslado->requerimientos_especiales = $request->get('req_especiales');
        $traslado->nacionalidad_id = $request->get('nacionalidad_id');
        $traslado->no_vuelo = $request->get('vuelo');
        $traslado->en_espera = 1;
        $traslado->total = $request->get('precio_f');
        $traslado->save();

        $carrito = CarritoCompra::create([
            'total_precio' => $traslado->total,
            'nombre_producto' => 'Privado',
            'tipo_producto' => 'Transfer',
            'estado' => Config::get('constants.estados.espera'),
            'reserva_conectando_id' => $traslado->id,
        ]);

        $cart = [

            "idCarrito" => $carrito->id,
            "cantAdultos" => $request->cantidad_adultos,
            "cantN212" => $request->cantidad_ninnos2a12,
            "cantN02" => $request->cantidad_ninnos0a2,
            "nombre_producto" => 'Privado',
            "tipo_producto" => 'Transfer',
            "fecha" => $traslado->fecha_inicio,
            "reserva_colectivo_id" => $traslado->id,
            "total_precio" => $traslado->total,
            "estado" => Config::get('constants.estados.espera')

        ];
        // dd($carrito,$cart);
        //dd($cart);
        session()->push('cart', $cart);
        $redirect = route('home.carrito-compras', ['añadido' => 1 . ' ' . 'producto']);

        return response()->json(array('success' => 'Los datos del transfer privado se han adicionado satisfactoriamente.', 'redirect' => $redirect));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $rutas = RutaConectandoCuba::all();
        $provincias = Provincia::all();
        $lugares = LugarRecogidaConectandoCuba::all();
        $nacionalidades = Nacionalidad::all();
        $carousel1 = CarruselTraslations::where('idioma', '=', 'es')->first();
        $enlaces = EnlaceRed::all();
        $carouseles = CarruselTraslations::where('idioma', '=', 'es')->get();
        $destinos = Provincia::all();

        return view('home.productostrasladoscolectivo', compact('rutas', 'provincias', 'lugares', 'nacionalidades', 'carouseles', 'carousel1', 'enlaces','destinos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
