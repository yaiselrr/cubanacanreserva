<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;
use DB;
use App\Modelos\Provincia;
use App\Modelos\ColectivoPrivado;
use App\Modelos\Traslado;

class ColectivoController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('hasPermission:colectivos.create')->only(['create','store']);
        $this->middleware('hasPermission:colectivos.destroy')->only(['destroy']);
        $this->middleware('hasPermission:colectivos.index')->only(['index']);
        $this->middleware('hasPermission:colectivos.edit')->only(['update','edit']);
    }


    public function index()
    {
        //
        $ruta = '/colectivos';
        $nombre = 'COLECTIVO';

        $colectivos = DB::table('traslados')
            ->join('colectivos_privados', 'traslados.id', "=", "colectivos_privados.traslado_id")
            ->select('traslados.id', 'traslados.dias_antelacion', 'traslados.tipo_traslado','colectivos_privados.tarifario', 'traslados.created_at', 'traslados.updated_at')
            ->where('traslados.tipo_traslado', '=', 'Colectivo')->get();
        


        return view('admin.colectivos.index', ['colectivos' => $colectivos],compact('nombre','ruta'));

    }

    
    public function create()
    {
        $ruta = '/colectivos';
        $nombre = 'COLECTIVO';
        return view('admin.colectivos.create',compact('nombre','ruta')/*, ['privados' => $oficinas]*/);
    }

    
    public function store(Request $request)
    {
    	$rules = [

    		//'tipo_traslado' => 'required|in:Privado,Colectivo',
    		'dias_antelacion' => 'required|in:10,20,30,50,80,100',

    		'tarifario' => 'required|mimes:xls,xlsx|min:1',
            
    	];

        $messages =[
            //'tipo_traslado.required' => 'Es necesario seleccionar el tipo de traslado.',

            'dias_antelacion.required' => 'Es necesario ingresar el o los dias de antelación.',
            'tarifario.required' => 'Es necesario el tarifario.',
            'tarifario.mimes' => 'solo se permiten archivos xlsx o xls.',
        ];

    	$this->validate($request, $rules, $messages);


    	$traslado = new Traslado();
    	$traslado->tipo_traslado = 'Colectivo';
    	$traslado->dias_antelacion = $request->get('dias_antelacion');

    	if ($traslado->save()) {
    		$privado = new ColectivoPrivado();
        	$privado->tarifariocolectivo('tarifario', $privado);
        	$privado->traslado_id = $traslado->id;
        	$privado->save();

    		//}
    		return redirect()->route('admin.content.colectivos.index')->with('notificacion','El contenido del traslado colectivo se ha registrado satisfactoriamente.');

    	}
        return redirect()->route('admin.content.colectivos.index')->with('notificacionerror','El contenido del traslado colectivo no se ha podido registrar en su base de datos.');

    	
        
    }

    
    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {
        
        $tras = Traslado::findOrFail($id);
        $ruta = '/clientes';
        $nombre = 'BURO';
        

        return view('admin.colectivos.edit',["colectivo"=>$tras/* "data"=>$data*/],compact('nombre','ruta'));
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
    		return redirect()->route('admin.content.colectivos.index')->with('notificacion','El contenido del traslado colectivo se ha editado satisfactoriamente.');

    	}
        return redirect()->route('admin.content.colectivo.index')->with('notificacionerror','El contenido del traslado colectivo no se ha podido registrar en su base de datos.');


    }

    
    public function destroy($id)
    {
        //
        $traslado = Traslado::destroy($id);


        if ($traslado==null) {
            return redirect()->route('admin.content.colectivos.index')->with('notificacion','Se ha eliminado satisfactoriamente el traslado.');
        }

        return redirect()->route('admin.content.colectivos.index')->with('notificacionerror','No se ha podido eliminar el trslado de su base de datos.');
        
    }

}
