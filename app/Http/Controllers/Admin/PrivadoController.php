<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;
use DB;
use App\Modelos\Provincia;
use App\Modelos\Traslado;

use Maatwebsite\Excel\Facades\Excel;
use App\Modelos\ColectivoPrivado;
use App\Modelos\TarifarioPrivado;
use App\Imports\TarifarioPrivadoImport;
use App\Modelos\TarifarioColectivo;
use App\Imports\TarifarioColectivoImport;


class PrivadoController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('hasPermission:privados.create')->only(['create','store']);
        $this->middleware('hasPermission:privados.destroy')->only(['destroy']);
        $this->middleware('hasPermission:privados.index')->only(['index']);
        $this->middleware('hasPermission:privados.edit')->only(['update','edit']);
    }


    public function index()
    {
        $ruta = '/privados/';
        $nombre = 'PRIVADO';

        $privados = DB::table('colectivos_privados')->select('colectivos_privados.id', 'colectivos_privados.dias_antelacion', 'colectivos_privados.tipo_traslado','colectivos_privados.created_at', 'colectivos_privados.updated_at')->get();
        


        return view('admin.privados.index', ['privados' => $privados],compact('nombre','ruta'));

    }

    
    public function create()
    {
        $ruta = '/privados/';
        $nombre = 'PRIVADO';
        return view('admin.privados.create',compact('nombre','ruta')/*, ['privados' => $oficinas]*/);
    }

    
    public function store(Request $request)
    {
    	$rules = [

    		'tipo_traslado' => 'required|in:Privado,Colectivo',
    		'dias_antelacion' => 'required|in:10,20,30,50,80,100',

    		'tarifario' => 'required|mimes:xls,xlsx|min:1',
            
    	];

        $messages =[
            'tipo_traslado.required' => 'Es necesario seleccionar el tipo de traslado.',

            'dias_antelacion.required' => 'Es necesario ingresar el o los dias de antelación.',
            'tarifario.required' => 'Es necesario el tarifario.',
            'tarifario.mimes' => 'solo se permiten archivos xlsx o xls.',
        ];

    	$this->validate($request, $rules, $messages);

        

            

    	/*$traslado = new Traslado();
    	$traslado->tipo_traslado = $request->get('tipo_traslado');
    	$traslado->dias_antelacion = $request->get('dias_antelacion'); */    

        $privado = new ColectivoPrivado();
        $privado->tipo_traslado = $request->get('tipo_traslado');
        if (($request->get('tipo_traslado') == 'Privado')) 
        {
            Excel::import(new TarifarioPrivadoImport, request()->file('tarifario'));
            $privado->tarifario('tarifario', $privado);  
        }
        elseif (($request->get('tipo_traslado') == 'Colectivo')) {
            Excel::import(new TarifarioColectivoImport, request()->file('tarifario'));
            $privado->tarifariocolectivo('tarifario', $privado);

        }
        $privado->dias_antelacion = $request->get('dias_antelacion'); 

        if ($privado->save()) 
        {
    	   return redirect()->route('admin.content.privados.index')->with('notificacion','El contenido del traslado privado se ha registrado satisfactoriamente.');
        }
        else{

            return redirect()->route('admin.content.privados.index')->with('notificacionerror','El contenido del traslado privado no se ha podido registrar en su base de datos.');
        }

    	
        
    }

    
    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {
        
        $tras = Traslado::findOrFail($id);

        return view('admin.privados.edit',["privado"=>$tras/* "data"=>$data, "oficinas"=>$oficinas*/]);
    }

    
    public function update(Request $request, $id)
    {
        //
        $rules = [
        	//'tipo_traslado' => 'in:Privado,Colectivo',
    		'dias_antelacion' => 'in:10,20,30,50,80,100',

    		'tarifario' => 'mimes:xls,xlsx',
            
    	];

        $messages =[
            'tarifario.mimes' => 'solo se permiten archivos xlsx o xls.',
        ];
        $this->validate($request, $rules, $messages);

        
        //$traslado = new Traslado();
        $traslado = Traslado::findOrFail($id);
    	$traslado->dias_antelacion = $request->get('dias_antelacion');

    	if ($traslado->update()) {

    		//}
    		return redirect()->route('admin.content.privados.index')->with('notificacion','El contenido del traslado privado se ha editado satisfactoriamente.');

    	}
        return redirect()->route('admin.content.privados.index')->with('notificacionerror','El contenido del traslado privado no se ha podido registrar en su base de datos.');


    }

    
    public function destroy($id)
    {
        //
        $traslado = Traslado::destroy($id);


        if ($traslado==null) {
            return redirect()->route('admin.content.privados.index')->with('notificacion','Se ha eliminado satisfactoriamente el traslado.');
        }

        return redirect()->route('admin.content.oficinas.index')->with('notificacionerror','No se ha podido eliminar el trslado de su base de datos.');
        
    }
}
