<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modelos\DiasAntelacionReserva;
use App\Http\Requests\DiasAntelacionStoreRequest;
use App\Http\Requests\DiasAntelacionUpdateRequest;

class DiasAntelacionController extends Controller
{

    public function __construct()
    {
        $this->middleware('hasPermission:dias-antelacion-reserva.create')->only(['create','store']);
        $this->middleware('hasPermission:dias-antelacion-reserva.destroy')->only(['destroy']);
        $this->middleware('hasPermission:dias-antelacion-reserva.index')->only(['index']);
        $this->middleware('hasPermission:dias-antelacion-reserva.edit')->only(['update','edit']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $diasantelacionreservas = DiasAntelacionReserva::latest()->paginate();
        return view('admin.diasantelacionreserva.index',compact('diasantelacionreservas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.diasantelacionreserva.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DiasAntelacionStoreRequest $request)
    {
        $validateddiasantelacion = $request->validated();
        DiasAntelacionReserva::create($validateddiasantelacion);

        return redirect()->route('admin.nomenclator.dias-antelacion-reserva.index')->with('success',__('cubanacan.add-content',['contenido'=>'Días Antelación Reserva']) );
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
    public function edit(Request $request,$id)
    {
        $diasantelacionreserva = DiasAntelacionReserva::find($id);

        return view('admin.diasantelacionreserva.edit',['diasantelacionreserva'=>$diasantelacionreserva]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DiasAntelacionUpdateRequest $request, $id)
    {
        $validated = $request->validated();
        $diasantelacionreserva = DiasAntelacionReserva::find($id);
        $diasantelacionreserva->update($validated);

        return redirect()->route('admin.nomenclator.dias-antelacion-reserva.index')->with('success',__('cubanacan.edit-content',['contenido'=>'Días Antelación Reserva']));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DiasAntelacionReserva::destroy($id);
        return redirect()->route('admin.nomenclator.dias-antelacion-reserva.index')->with('success',__('cubanacan.delete-content',['contenido'=>'Días Antelación Reserva']));
    }
}
