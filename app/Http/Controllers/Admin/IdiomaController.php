<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modelos\Idioma;
use App\Http\Requests\IdiomaStoreRequest;
use App\Http\Requests\IdiomaUpdateRequest;

class IdiomaController extends Controller
{

    public function __construct()
    {
        $this->middleware('hasPermission:idiomas.create')->only(['create','store']);
        $this->middleware('hasPermission:idiomas.destroy')->only(['destroy']);
        $this->middleware('hasPermission:idiomas.index')->only(['index']);
        $this->middleware('hasPermission:idiomas.edit')->only(['update','edit']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $idiomas = Idioma::latest()->paginate();
        return view('admin.idiomas.index',compact('idiomas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.idiomas.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(IdiomaStoreRequest $request)
    {
        $validatedidiomas = $request->validated();
        Idioma::create($validatedidiomas);

        return redirect()->route('admin.nomenclator.idiomas.index')->with('success',__('cubanacan.add-content',['contenido'=>'Idioma']) );
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
        $idioma = Idioma::find($id);

        return view('admin.idiomas.edit',['idioma'=>$idioma]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(IdiomaUpdateRequest $request, $id)
    {
        $validated = $request->validated();
        $idiomas = Idioma::find($id);
        $idiomas->update($validated);

        return redirect()->route('admin.nomenclator.idiomas.index')->with('success',__('cubanacan.edit-content',['contenido'=>'Idioma']));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        Idioma::destroy($id);
        return redirect()->route('admin.nomenclator.idiomas.index')->with('success',__('cubanacan.delete-content',['contenido'=>'Idioma']));
    }
}
