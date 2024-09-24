<?php

namespace App\Http\Controllers\Home;

use App\Http\Requests\ReservarViajesMedidaRequest;
use App\Modelos\CarritoCompra;
use App\Modelos\DiasAntelacionReserva;
use App\Modelos\PreciosPorViajesMedida;
use App\Modelos\Provincia;
use App\Modelos\ReservaViajesMedida;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modelos\ViajesMedida;
use App\Modelos\ViajesMedidaTraslation;
use Illuminate\Support\Facades\Config;
use App\Modelos\Carrusel;
use App\Modelos\CarruselTraslations;
use Illuminate\Support\Carbon;
use DB;
use App\Modelos\EnlaceRed;

class ViajesMedidaController extends Controller
{
    public function index()
    {
        $fechaHoy = Carbon::now()->format('Y-m-d');
        $viajesmedidas = ViajesMedida::join("viajes_medida_traslations", "viajes_medidas.id", "=", "viajes_medida_traslations.viaje_medida_id")
            ->where('viajes_medida_traslations.locale', '=', 'es')
            ->join("precios_por_viajes_medidas", "viajes_medidas.id", "=", "precios_por_viajes_medidas.viaje_medida_id")
            ->whereDate('precios_por_viajes_medidas.fecha_fin', '>=', $fechaHoy)
            ->join("provincias", "provincias.id", "=", "viajes_medidas.provincia_id")
            ->select('viajes_medidas.id', 'viajes_medidas.provincia_id', 'provincias.provincia', 'viajes_medida_traslations.descripcion'
                , 'viajes_medidas.nombre', 'viajes_medidas.imagen')
            ->orderBy('provincias.provincia', 'desc')
            ->distinct()
            ->paginate(6);
        $carousel1 = CarruselTraslations::where('idioma', '=', 'es')->first();
        $enlaces = EnlaceRed::all();
        if ($carousel1){
            $carouseles = CarruselTraslations::where('idioma', '=', 'es')
                ->where('id', '<>',$carousel1->id )->get();
        }else{
            $carouseles = null;
        }
        $destinos = Provincia::all();

        return view('home.productosviajesmedida', compact('viajesmedidas','carouseles','carousel1','enlaces','destinos'));
    }

    public function detalleViajeMedida($id)
    {
        $viajesmedida = ViajesMedida::findOrFail($id);
        $preciopaxviajesmedida = PreciosPorViajesMedida::where('viaje_medida_id', $viajesmedida->id)->get();

        $diasantelacionreservas = DiasAntelacionReserva::all();
        $carousel1 = CarruselTraslations::where('idioma', '=', 'es')->first();
        $enlaces = EnlaceRed::all();
        $carouseles = CarruselTraslations::where('idioma', '=', 'es')->get();


        $viajesmedidatraslation = ViajesMedidaTraslation::where('viaje_medida_id', $viajesmedida->id)->get()->where('locale', '=', 'es');
        $data = array();
        foreach ($viajesmedidatraslation as $item) {
            $data['descripcion'] = $item['descripcion'];
        }
        $destinos = Provincia::all();

        return view('home.productosviajesmedida-detalles', ['viajesmedida' => $viajesmedida],
            compact('data','preciopaxviajesmedida','diasantelacionreservas','carouseles','carousel1','enlaces','destinos'));
    }

    public function reservarViajeMedida(ReservarViajesMedidaRequest $request, $id)
    {
        $validated = $request->validated();
        $viajemedida = ViajesMedida::findOrFail($id);

        $resvacionviajemedida = ReservaViajesMedida::create([
            'fecha'=>$request->fecha,
            'cantidad_adultos'=>$request->cantidad_adultos,
            'cantidad_noche'=>$request->cantidad_noche,
            'cantidad_ninnos2a12'=>$request->cantidad_ninnos2a12,
            'cantidad_ninnos0a2'=>$request->cantidad_ninnos0a2,
            'req_especiales'=>$request->req_especiales,
            'viaje_medida_id'=>$viajemedida->id,
            'email'=>$request->email,
            'nombre'=>$request->nombre,
            'precio_total'=>$request->precio_total,
            'status_id' => 1
        ]);

        $carrito = CarritoCompra::create([
            'total_precio'=>$resvacionviajemedida->precio_total,
            'nombre_producto' => $viajemedida->nombre,
            'tipo_producto'=>'Viaje a la Medida',
            'estado'=>Config::get('constants.estados.espera'),
            'reserva_viajes_medida_id'=>$resvacionviajemedida->id,
        ]);

        $cart = [

            "idCarrito" => $carrito->id,
            "cantAdultos" => $request->cantidad_adultos,
            "cantN212" => $request->cantidad_ninnos2a12,
            "cantN02" => $request->cantidad_ninnos0a2,
            "nombre_producto" => $resvacionviajemedida->nombre,
            "tipo_producto" => 'Viaje a la Medida',
            "fecha" => $resvacionviajemedida->fecha_entrada,
            "tipo_habitacion" => $resvacionviajemedida->tipo_habitacion,
            "reserva_viajes_medida_id" => $resvacionviajemedida->id,
            "total_precio" => $resvacionviajemedida->precio_total,
            "estado" => Config::get('constants.estados.espera')

        ];
        session()->push('cart', $cart);
        $redirect = route('home.carrito-compras',['añadido'=>1 . ' ' . 'producto']);

        return response()->json(array('success' => 'Los datos del viaje a la medida se han adicionado satisfactoriamente.','redirect'=>$redirect));
    }
}
