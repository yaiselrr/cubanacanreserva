<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use DB;
use App\Imports\TarifarioPrivadoImport;

class TarifarioPrivadoController extends Controller
{
    public function __construct()
    {
        $this->middleware('hasPermission:privadosimport.create')->only(['create','store']);
        $this->middleware('hasPermission:privadosimport.destroy')->only(['destroy']);
        $this->middleware('hasPermission:privadosimport.index')->only(['index']);
        $this->middleware('hasPermission:privadosimport.edit')->only(['update','edit']);
    }

    public function index()
    {
        //
        $privados = DB::table('tarifarios_privados')->orderby('id', 'desc')->paginate();


        return view('admin.privadosimport.index', ['privados' => $privados]);

    }

    public function create()
    {

        return view('admin.privadosimport.import'/*, ['privados' => $oficinas]*/);
    }

    public function import(Request $request)
    {
        $request->validate(['tarifario' => 'required']);

        Excel::import(new TarifarioPrivadoImport, request()->file('tarifario'));
        return redirect()->route('admin.content.privadosimport.index')->with('notificacion', 'El archivo se ha importado satisfactoriamente.');
    }
}
