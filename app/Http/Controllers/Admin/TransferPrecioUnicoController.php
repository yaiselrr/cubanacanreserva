<?php

namespace App\Http\Controllers\Admin;

use App\Modelos\TarifarioColectivoPrecioUnico;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modelos\TransferPrecioUnico;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\TarifarioColectivoPrecioUnicoImport;

class TransferPrecioUnicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $transfers = TransferPrecioUnico::all();

        return view('admin.preciosunicos.index', compact('transfers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.preciosunicos.add');
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
        $rules = [


            'dias_antelacion' => 'required|in:10,20,30,50,80,100',

            'tarifario' => 'required|mimes:xls,xlsx|min:1',

        ];

        $messages =[


            'dias_antelacion.required' => 'Es necesario ingresar el o los dias de antelación.',
            'tarifario.required' => 'Es necesario el tarifario.',
            'tarifario.mimes' => 'solo se permiten archivos xlsx o xls.',
        ];

        $this->validate($request, $rules, $messages);

        Excel::import(new TarifarioColectivoPrecioUnicoImport(), request()->file('tarifario'));
        $transfer = new TransferPrecioUnico();
        $transfer->dias_antelacion = $request->get('dias_antelacion');
        $transfer->tarifario('tarifario', $transfer);


        if ($transfer->save())
        {
            return redirect()->route('admin.content.preciosunicos.index')->with('notificacion','El contenido del transfer colectivo se ha registrado satisfactoriamente.');
        }
        else{

            return redirect()->route('admin.content.preciosunicos.index')->with('notificacionerror','El contenido del transfer colectivo no se ha podido registrar en su base de datos.');
        }

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
        $transfer = TransferPrecioUnico::findOrFail($id);

        return view('admin.preciosunicos.edit',["transfer"=>$transfer]);
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
        $rules = [

            'dias_antelacion' => 'in:10,20,30,50,80,100',

            'tarifario' => 'mimes:xls,xlsx',

        ];

        $messages =[
            'tarifario.mimes' => 'solo se permiten archivos xlsx o xls.',
        ];
        $this->validate($request, $rules, $messages);



        Excel::import(new TarifarioColectivoPrecioUnicoImport(), request()->file('tarifario'));
        $transfer = TransferPrecioUnico::findOrFail($id);
        $transfer->dias_antelacion = $request->get('dias_antelacion');
        $transfer->tarifario('tarifario', $transfer);
        //TransferPrecioUnico::deleted();

        if ($transfer->update()) {


            return redirect()->route('admin.content.preciosunicos.index')->with('notificacion','El contenido del transfer colectivo se ha editado satisfactoriamente.');

        }else{

            return redirect()->route('admin.content.preciosunicos.index')->with('notificacionerror','El contenido del transfer colectivo no se ha podido registrar en su base de datos.');
        }
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
        TransferPrecioUnico::destroy($id);
        return redirect()->route('admin.content.preciosunicos.index')->with('success',__('cubanacan.delete-content',['contenido'=>'Transfer Colectivo']));
    }
}
