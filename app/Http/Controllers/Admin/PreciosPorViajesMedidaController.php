<?php

namespace App\Http\Controllers\Admin;

use App\Modelos\PreciosPorViajesMedida;
use App\Modelos\ViajesMedida;
use App\Modelos\DiasAntelacionReserva;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Http\Requests\PreciosPorViajesMedidaStoreRequest;
use App\Http\Requests\PreciosPorViajesMedidaUpdateRequest;

class PreciosPorViajesMedidaController extends Controller
{

    public function __construct()
    {
        $this->middleware('hasPermission:precios-por-viajes-medidas.create')->only(['create','store']);
        $this->middleware('hasPermission:precios-por-viajes-medidas.destroy')->only(['destroy']);
        $this->middleware('hasPermission:precios-por-viajes-medidas.index')->only(['index']);
        $this->middleware('hasPermission:precios-por-viajes-medidas.edit')->only(['update','edit']);
        $this->middleware('hasPermission:precios-por-viajes-medidas.show')->only(['show']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $preciosporviajesmedida= PreciosPorViajesMedida::join("viajes_medidas","viajes_medidas.id","=","precios_por_viajes_medidas.viaje_medida_id")
            ->select('precios_por_viajes_medidas.id as preciosId','viajes_medidas.id','precios_por_viajes_medidas.viaje_medida_id','precios_por_viajes_medidas.fecha_inicio'
                ,'precios_por_viajes_medidas.fecha_fin','viajes_medidas.created_by','precios_por_viajes_medidas.capacidad','precios_por_viajes_medidas.precio_x_pax')
            ->paginate();


        return view('admin.preciosporviajesmedidas.index', compact('preciosporviajesmedida'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $viajesmedida= ViajesMedida::all();
        $diasantelacionreservas = DiasAntelacionReserva::all();
        return view('admin.preciosporviajesmedidas.add',compact('viajesmedida','diasantelacionreservas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PreciosPorViajesMedidaStoreRequest $request)
    {
        $validated = $request->validated();
        PreciosPorViajesMedida::create($validated);

        return redirect()->route('admin.content.precios-por-viajes-medidas.index')->with('success',__('cubanacan.add-content',['contenido'=>'Precios x Temporada de Viajes a la Medida']) );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $preciosporviajesmedida = PreciosPorViajesMedida::find($id);
        return view('admin.preciosporviajesmedidas.index_detalles',['preciosporviajesmedida'=>$preciosporviajesmedida]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $preciosporviajesmedida = PreciosPorViajesMedida::find($id);
        $viajesmedida = ViajesMedida::all();
        $diasantelacionreservas = DiasAntelacionReserva::all();
        return view('admin.preciosporviajesmedidas.edit',['preciosporviajesmedida'=>$preciosporviajesmedida],compact('diasantelacionreservas','viajesmedida'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PreciosPorViajesMedidaUpdateRequest $request, $id)
    {
        $validated = $request->validated();
        $preciosporviajesmedida = PreciosPorViajesMedida::find($id);
        $preciosporviajesmedida->update($validated);
        return redirect()->route('admin.content.precios-por-viajes-medidas.index')->with('success',__('cubanacan.edit-content',['contenido'=>'Precios x Temporada de Viajes a la Medida']));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        PreciosPorViajesMedida::destroy($id);
        return redirect()->route('admin.content.precios-por-viajes-medidas.index')->with('success',__('cubanacan.delete-content',['contenido'=>'Precios x Temporada de Viajes a la Medida']));
    }
}
