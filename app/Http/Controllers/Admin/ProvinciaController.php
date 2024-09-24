<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modelos\Provincia;
use App\Http\Requests\ProvinciaStoreRequest;
use App\Http\Requests\ProvinciaUpdateRequest;

class ProvinciaController extends Controller
{

    public function __construct()
    {
        $this->middleware('hasPermission:provincias.create')->only(['create','store']);
        $this->middleware('hasPermission:provincias.destroy')->only(['destroy']);
        $this->middleware('hasPermission:provincias.index')->only(['index']);
        $this->middleware('hasPermission:provincias.edit')->only(['update','edit']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $provincias = Provincia::latest()->paginate();
        return view('admin.provincias.index',compact('provincias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.provincias.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProvinciaStoreRequest $request)
    {
        $validatedprovincia = $request->validated();
        Provincia::create($validatedprovincia);

        return redirect()->route('admin.nomenclator.provincias.index')->with('success',__('cubanacan.add-content',['contenido'=>'Provincia']) );

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
        $provincia = Provincia::find($id);

        return view('admin.provincias.edit',['provincia'=>$provincia]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProvinciaUpdateRequest $request, $id)
    {
        $validated = $request->validated();
        $provincias = Provincia::find($id);
        $provincias->update($validated);

        return redirect()->route('admin.nomenclator.provincias.index')->with('success',__('cubanacan.edit-content',['contenido'=>'Provincia']));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Provincia::destroy($id);
        return redirect()->route('admin.nomenclator.provincias.index')->with('success',__('cubanacan.delete-content',['contenido'=>'Provincia']));

    }
}
