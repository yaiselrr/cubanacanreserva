<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modelos\RutaConectandoCuba;
use App\Modelos\LugarRecogidaConectandoCuba;
use App\Modelos\Provincia;
use App\Modelos\Nacionalidad;
use App\Modelos\Carrusel;
use App\Modelos\CarruselTraslations;

class TrasladosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $rutas = RutaConectandoCuba::all();
        $provincias = Provincia::all();
        $lugares = LugarRecogidaConectandoCuba::all();
        $nacionalidades = Nacionalidad::all();
        $carousel1 = CarruselTraslations::where('idioma', '=', 'es')->first();
        $id = $carousel1->id;
        $carousel2 = CarruselTraslations::where('carrusels_id', $id+1)->first();/*latest()->take(3)->get();*/
        $carousel3 = CarruselTraslations::where('carrusels_id', $id+2)->first();
        $destinos = Provincia::all();

        return view('home.productostraslados',compact('rutas','provincias', 'lugares','nacionalidades','carousel3','carousel1','carousel2','destinos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
