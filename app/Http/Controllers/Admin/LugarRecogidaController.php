<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modelos\Hotel;
use App\Modelos\RutaConectandoCuba;
use App\Modelos\LugarRecogidaConectandoCuba;

class LugarRecogidaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $lugares = LugarRecogidaConectandoCuba::all();
        //dd($lugares);

        return view('admin.lugaresrecogidas.index', ['lugares' => $lugares]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $hoteles = Hotel::all();
        $rutas = RutaConectandoCuba::all();

        return view('admin.lugaresrecogidas.create', ['hoteles' => $hoteles, 'rutas' => $rutas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        //$this->validate($request, $rules, $messages);

        $lugar = new LugarRecogidaConectandoCuba();
        $lugar->hotel_id = $request->get('hotel');
        $lugar->ruta_id = $request->get('ruta');
        $lugar->area = $request->get('area');
        $lugar->hora_recogida = $request->get('hora');

        if ($lugar->save()) {
            return redirect()->route('admin.content.lugaresrecogida.index')->with('notificacion','El contenido del lugar conectando cuba se ha registrado satisfactoriamente.');

        }
        else{
            return redirect()->route('admin.content.lugaresrecogida.index')->with('notificacionerror','El contenido del lugar conectando cuba no se ha podido registrar en su base de datos.');
        }

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
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
    }
}
