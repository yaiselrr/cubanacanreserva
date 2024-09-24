<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modelos\PlanAlojamiento;
use App\Http\Requests\PlanAlojamientoStoreRequest;
use App\Http\Requests\PlanAlojamientoUpdateRequest;

class PlanAlojamientoController extends Controller
{

    public function __construct()
    {
        $this->middleware('hasPermission:plan-alojamiento.create')->only(['create','store']);
        $this->middleware('hasPermission:plan-alojamiento.destroy')->only(['destroy']);
        $this->middleware('hasPermission:plan-alojamiento.index')->only(['index']);
        $this->middleware('hasPermission:plan-alojamiento.edit')->only(['update','edit']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $planalojamientos = PlanAlojamiento::latest()->paginate();
        return view('admin.planalojamiento.index',compact('planalojamientos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.planalojamiento.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PlanAlojamientoStoreRequest $request)
    {
        $validatedplanalojamiento = $request->validated();
        PlanAlojamiento::create($validatedplanalojamiento);

        return redirect()->route('admin.content.plan-alojamiento.index')->with('success',__('cubanacan.add-content',['contenido'=>'Plan Alojamiento']) );
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
        $planalojamiento = PlanAlojamiento::find($id);

        return view('admin.planalojamiento.edit',['planalojamiento'=>$planalojamiento]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PlanAlojamientoUpdateRequest $request, $id)
    {
        $validated = $request->validated();
        $planalojamiento = PlanAlojamiento::find($id);
        $planalojamiento->update($validated);

        return redirect()->route('admin.content.plan-alojamiento.index')->with('success',__('cubanacan.edit-content',['contenido'=>'Plan Alojamiento']));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        PlanAlojamiento::destroy($id);
        return redirect()->route('admin.content.plan-alojamiento.index')->with('success',__('cubanacan.delete-content',['contenido'=>'Plan Alojamiento']));
    }
}
