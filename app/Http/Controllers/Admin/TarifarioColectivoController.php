<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Modelos\TarifarioColectivo;
use Illuminate\Http\Request;

use Maatwebsite\Excel\Facades\Excel;
use DB;
use App\Imports\TarifarioColectivoImport;

class TarifarioColectivoController extends Controller
{

    public function __construct()
    {
        $this->middleware('hasPermission:colectivosimport.create')->only(['create','store']);
        $this->middleware('hasPermission:colectivosimport.destroy')->only(['destroy']);
        $this->middleware('hasPermission:colectivosimport.index')->only(['index']);
        $this->middleware('hasPermission:colectivosimport.edit')->only(['update','edit']);
    }

    public function index()
    {
        //
        $colectivos = DB::table('tarifarios_colectivos')->orderby('id', 'desc')->paginate();


        return view('admin.colectivosimport.index', ['colectivos' => $colectivos]);

    }

    public function create()
    {

        return view('admin.colectivosimport.import'/*, ['privados' => $oficinas]*/);
    }

    public function import(Request $request)
    {
        $request->validate(['tarifario' => 'required']);

        Excel::import(new TarifarioColectivoImport, request()->file('tarifario'));
        return redirect()->route('admin.content.colectivosimport.index')->with('notificacion', 'El archivo se ha importado satisfactoriamente.');
    }
}
