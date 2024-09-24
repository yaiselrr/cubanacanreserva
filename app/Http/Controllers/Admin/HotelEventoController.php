<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modelos\Hotel;
use App\Modelos\HotelEvento;
use App\Http\Requests\HotelEventoStoreRequest;
use App\Http\Requests\HotelEventoUpdateRequest;
use DB;

class HotelEventoController extends Controller
{

    public function __construct()
    {
        $this->middleware('hasPermission:hoteles-eventos.create')->only(['create','store']);
        $this->middleware('hasPermission:hoteles-eventos.destroy')->only(['destroy']);
        $this->middleware('hasPermission:hoteles-eventos.index')->only(['index']);
        $this->middleware('hasPermission:hoteles-eventos.edit')->only(['update','edit']);
        $this->middleware('hasPermission:hoteles-eventos.index')->only(['index']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hoteleventos = HotelEvento::paginate();
        return view('admin.hoteleventos.index', compact('hoteleventos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.hoteleventos.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HotelEventoStoreRequest $request)
    {
        $validated = $request->validated();
     /*   $hoteles = $request->input('hotel_ids');
        $hoteles = implode(',', $hoteles);
        $validated['facilidades_ids'] = $hoteles;*/

        HotelEvento::create($validated);

        return redirect()->route('admin.content.hoteles-eventos.index')->with('success',__('cubanacan.add-content',['contenido'=>'Hoteles de un Evento']) );

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $hotelevento = HotelEvento::find($id);
        return view('admin.hoteleventos.edit',['hotelevento'=>$hotelevento]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(HotelEventoUpdateRequest $request, $id)
    {
        $validated = $request->validated();
        $hotelevento = HotelEvento::find($id);
        $hotelevento->update($validated);
        return redirect()->route('admin.content.hoteles-eventos.index')->with('success',__('cubanacan.edit-content',['contenido'=>'Hoteles de un Evento']));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        HotelEvento::destroy($id);

        return redirect()->route('admin.content.hoteles-eventos.index')->with('success',__('cubanacan.delete-content',['contenido'=>'Hoteles de un Evento']));
    }
}
