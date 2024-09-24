<?php

namespace App\Http\Controllers\Admin;

use App\Modelos\Duracion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\DuracionStoreRequest;
use App\Http\Requests\DuracionUpdateRequest;

class DuracionController extends Controller
{

    public function __construct()
    {
        $this->middleware('hasPermission:duracion.create')->only(['create','store']);
        $this->middleware('hasPermission:duracion.destroy')->only(['destroy']);
        $this->middleware('hasPermission:duracion.index')->only(['index']);
        $this->middleware('hasPermission:duracion.edit')->only(['update','edit']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $duracion = Duracion::latest()->paginate();
        return view('admin.duracion.index',compact('duracion'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.duracion.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DuracionStoreRequest $request)
    {
        $validatedduracion = $request->validated();
        Duracion::create($validatedduracion);

        return redirect()->route('admin.nomenclator.duracion.index')->with('success',__('cubanacan.add-content',['contenido'=>'Duracion']) );

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
        $duracion = Duracion::find($id);

        return view('admin.duracion.edit',['duracion'=>$duracion]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DuracionUpdateRequest $request, $id)
    {
        $validated = $request->validated();
        $duracion = Duracion::find($id);
        $duracion->update($validated);

        return redirect()->route('admin.nomenclator.duracion.index')->with('success',__('cubanacan.edit-content',['contenido'=>'Duracion']));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        Duracion::destroy($id);
        return redirect()->route('admin.nomenclator.duracion.index')->with('success',__('cubanacan.delete-content',['contenido'=>'Duracion']));
    }
}
