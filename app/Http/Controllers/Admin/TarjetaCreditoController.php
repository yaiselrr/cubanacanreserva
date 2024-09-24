<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Modelos\TarjetaCredito;
use App\Http\Requests\TarjetasCreditoStoreRequest;
use App\Http\Requests\TarjetasCreditoUpdateRequest;

class TarjetaCreditoController extends Controller
{

    public function __construct()
    {
        $this->middleware('hasPermission:tarjeta-credito.create')->only(['create','store']);
        $this->middleware('hasPermission:tarjeta-credito.destroy')->only(['destroy']);
        $this->middleware('hasPermission:tarjeta-credito.index')->only(['index']);
        $this->middleware('hasPermission:tarjeta-credito.edit')->only(['update','edit']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tarjetacreditos = TarjetaCredito::select('id','imagen','created_by','nombre')
            ->paginate();
        return view('admin.tarjetascreditos.index', compact('tarjetacreditos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tarjetascreditos.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TarjetasCreditoStoreRequest $request)
    {
        $validated = $request->validated();
        if($request->hasFile('imagen')){
            $validated['imagen'] = $request->imagen->store('tarjetascreditos', 'public');
        }
        TarjetaCredito::create($validated);
        return redirect()->route('admin.content.tarjeta-credito.index')->with('success',__('cubanacan.add-content',['contenido'=>'Tarjetas de Créditos']) );
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
        $tarjetacredito = TarjetaCredito::find($id);

        return view('admin.tarjetascreditos.edit',['tarjetacredito'=>$tarjetacredito]);//
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TarjetasCreditoUpdateRequest $request, $id)
    {
        $validated = $request->validated();
        $tarjetacredito = TarjetaCredito::find($id);
        if($request->hasFile('imagen')){
            $old_file = $tarjetacredito->imagen;
            $validated['imagen'] = $request->imagen->store('tarjetascreditos', 'public');
            $tarjetacredito->update($validated);
            Storage::disk('public')->delete($old_file);

        }
        else
        {
            $tarjetacredito->update($validated);
        }
        return redirect()->route('admin.content.tarjeta-credito.index')->with('success',__('cubanacan.edit-content',['contenido'=>'Tarjeta de Crédito']));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tarjetacredito =TarjetaCredito::find($id);
        Storage::disk('public')->delete($tarjetacredito->imagen);
        TarjetaCredito::destroy($id);
        return redirect()->route('admin.content.tarjeta-credito.index')->with('success',__('cubanacan.delete-content',['contenido'=>'Tarjetas de Créditos']));
    }
}
