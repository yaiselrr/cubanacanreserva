<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modelos\Nacionalidad;
use App\Http\Requests\NacionalidadStoreRequest;
use App\Http\Requests\NacionalidadUpdateRequest;

class NacionalidadController extends Controller
{
    public function __construct()
    {
        $this->middleware('hasPermission:nacionalidades.create')->only(['create','store']);
        $this->middleware('hasPermission:nacionalidades.destroy')->only(['destroy']);
        $this->middleware('hasPermission:nacionalidades.index')->only(['index']);
        $this->middleware('hasPermission:nacionalidades.edit')->only(['update','edit']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nacionalidades = Nacionalidad::latest()->paginate();
        return view('admin.nacionalidades.index',compact('nacionalidades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.nacionalidades.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NacionalidadStoreRequest $request)
    {
        $validatednacionalidad = $request->validated();
        Nacionalidad::create($validatednacionalidad);

        return redirect()->route('admin.nomenclator.nacionalidades.index')->with('success',__('cubanacan.add-content',['contenido'=>'Nacionalidad']) );

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
        $nacionalidad = Nacionalidad::find($id);

        return view('admin.nacionalidades.edit',['nacionalidad'=>$nacionalidad]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NacionalidadUpdateRequest $request, $id)
    {
        $validated = $request->validated();
        $nacionalidades = Nacionalidad::find($id);
        $nacionalidades->update($validated);

        return redirect()->route('admin.nomenclator.nacionalidades.index')->with('success',__('cubanacan.edit-content',['contenido'=>'Nacionalidad']));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Nacionalidad::destroy($id);
        return redirect()->route('admin.nomenclator.nacionalidades.index')->with('success',__('cubanacan.delete-content',['contenido'=>'Nacionalidad']));

    }
}
