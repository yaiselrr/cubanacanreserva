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
use App\Modelos\EnlaceRed;
use App\Modelos\TarifarioColectivoPrecioUnico;

class TransferColectivoPrecioController extends Controller
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
        $destinos = Provincia::all();
        $destin_inicia = TarifarioColectivoPrecioUnico::all();
        $destin_inicias = TarifarioColectivoPrecioUnico::all();

        return view('home.productostrasladoscolectivoprecio',compact('rutas','provincias', 'lugares','nacionalidades','carouseles','carousel1','enlaces','destinos','destin_inicia','destin_inicias'));
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
