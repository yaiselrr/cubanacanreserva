<?php

namespace App\Http\Controllers\Admin;

use App\Modelos\DiasAntelacionReserva;
use App\Modelos\Hotel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modelos\PreciosPaxHotel;
use Carbon\Carbon;
use App\Http\Requests\PreciosPaxHotelStoreRequest;
use App\Http\Requests\PreciosPaxHotelUpdateRequest;

class PreciosPaxHotelController extends Controller
{

    public function __construct()
    {
        $this->middleware('hasPermission:precios-pax-hotels.create')->only(['create','store']);
        $this->middleware('hasPermission:precios-pax-hotels.destroy')->only(['destroy']);
        $this->middleware('hasPermission:precios-pax-hotels.index')->only(['index']);
        $this->middleware('hasPermission:precios-pax-hotels.edit')->only(['update','edit']);
        $this->middleware('hasPermission:precios-pax-hotels.show')->only(['show']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $preciospaxhoteles = PreciosPaxHotel::join("hotels","hotels.id","=","precios_pax_hotels.hotel_id")
            ->select('precios_pax_hotels.id as preciosId','hotels.id','precios_pax_hotels.hotel_id','precios_pax_hotels.fecha_inicio'
                ,'precios_pax_hotels.fecha_fin','hotels.created_by')
            ->paginate();


        return view('admin.preciospaxhoteles.index', compact('preciospaxhoteles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $hoteles = Hotel::all();
        $dias_antelacion = DiasAntelacionReserva::all();
        return view('admin.preciospaxhoteles.add',compact('hoteles','dias_antelacion'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PreciosPaxHotelStoreRequest $request)
    {
        $validated = $request->validated();
        $validated['variante2adultos_hasta2ninnos_2a12annos'] = $request->filled('variante2adultos_hasta2ninnos_2a12annos');
        $validated['variante1adulto_hasta3ninnos_2a12annos'] = $request->filled('variante1adulto_hasta3ninnos_2a12annos');
        $validated['variante2adultos_2hasta3ninnos_2a12annos'] = $request->filled('variante2adultos_2hasta3ninnos_2a12annos');
        $validated['variante3adultos_mismahabitacion'] = $request->filled('variante3adultos_mismahabitacion');
        $validated['variante1adulto_mismahabitacion'] = $request->filled('variante1adulto_mismahabitacion');
        PreciosPaxHotel::create($validated);

        return redirect()->route('admin.content.precios-pax-hotel.index')->with('success',__('cubanacan.add-content',['contenido'=>'Precios x Pax del Hotel']) );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $hotel = PreciosPaxHotel::find($id);
        return view('admin.preciospaxhoteles.index_detalles',['hotel'=>$hotel]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        $preciopaxhotel = PreciosPaxHotel::find($id);
        $hoteles = Hotel::all();
        $dias_antelacion = DiasAntelacionReserva::all();
        // dd($dias_antelacion);
        return view('admin.preciospaxhoteles.edit',compact('preciopaxhotel','hoteles','dias_antelacion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PreciosPaxHotelUpdateRequest $request, $id)
    {
        $validated = $request->validated();
        $preciospax = PreciosPaxHotel::find($id);
        if($request->filled('variante2adultos_hasta2ninnos_2a12annos') ||
            $request->filled('variante1adulto_hasta3ninnos_2a12annos') ||
            $request->filled('variante2adultos_2hasta3ninnos_2a12annos') ||
            $request->filled('variante3adultos_mismahabitacion')||
            $request->filled('variante1adulto_mismahabitacion'))
        {
            $validated['variante2adultos_hasta2ninnos_2a12annos'] = $request->filled('variante2adultos_hasta2ninnos_2a12annos');
            $validated['variante1adulto_hasta3ninnos_2a12annos'] = $request->filled('variante1adulto_hasta3ninnos_2a12annos');
            $validated['variante2adultos_2hasta3ninnos_2a12annos'] = $request->filled('variante2adultos_2hasta3ninnos_2a12annos');
            $validated['variante3adultos_mismahabitacion'] = $request->filled('variante3adultos_mismahabitacion');
            $validated['variante1adulto_mismahabitacion'] = $request->filled('variante1adulto_mismahabitacion');
        }
        else{
            $validated['precio_adulto_variante2adultos'] = $request->get('precio_adulto_variante2adultos');
            $validated['precio_1er_ninno_variante2adultos'] = $request->get('precio_1er_ninno_variante2adultos');
            $validated['precio_2do_ninno_variante2adultos'] = $request->get('precio_2do_ninno_variante2adultos');
            $validated['precio_adulto_variante1adulto'] = $request->get('precio_adulto_variante1adulto');
            $validated['precio_1er_ninno_variante1adulto'] = $request->get('precio_1er_ninno_variante1adulto');
            $validated['precio_2do_ninno_variante1adulto'] = $request->get('precio_2do_ninno_variante1adulto');
            $validated['precio_3er_ninno_variante1adulto'] = $request->get('precio_3er_ninno_variante1adulto');
            $validated['precio_adulto_variante2adultos_2hasta3ninnos'] = $request->get('precio_adulto_variante2adultos_2hasta3ninnos');
            $validated['precio_1er_ninno_variante1adultos_variante2adultos_2hasta3ninnos'] = $request->get('precio_1er_ninno_variante1adultos_variante2adultos_2hasta3ninnos');
            $validated['precio_2do_ninno_variante1adultos_variante2adultos_2hasta3ninnos'] = $request->get('precio_2do_ninno_variante1adultos_variante2adultos_2hasta3ninnos');
            $validated['precio_3er_ninno_variante1adultos_variante2adultos_2hasta3ninnos'] = $request->get('precio_3er_ninno_variante1adultos_variante2adultos_2hasta3ninnos');
            $validated['precio_adulto_variante3adultos_mismahabitacion'] = $request->get('precio_adulto_variante3adultos_mismahabitacion');
            $validated['precio_adulto_variante1adulto_mismahabitacion'] = $request->get('precio_adulto_variante1adulto_mismahabitacion');

            $validated['variante2adultos_hasta2ninnos_2a12annos'] = $request->filled('variante2adultos_hasta2ninnos_2a12annos');
            $validated['variante1adulto_hasta3ninnos_2a12annos'] = $request->filled('variante1adulto_hasta3ninnos_2a12annos');
            $validated['variante2adultos_2hasta3ninnos_2a12annos'] = $request->filled('variante2adultos_2hasta3ninnos_2a12annos');
            $validated['variante3adultos_mismahabitacion'] = $request->filled('variante3adultos_mismahabitacion');
            $validated['variante1adulto_mismahabitacion'] = $request->filled('variante1adulto_mismahabitacion');
        }

        $preciospax->update($validated);
        return redirect()->route('admin.content.precios-pax-hotel.index')->with('success',__('cubanacan.edit-content',['contenido'=>'Precios Pax del Hotel']));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        PreciosPaxHotel::destroy($id);
        return redirect()->route('admin.content.precios-pax-hotel.index')->with('success',__('cubanacan.delete-content',['contenido'=>'Precios x Pax del Hotel']));
    }
}
