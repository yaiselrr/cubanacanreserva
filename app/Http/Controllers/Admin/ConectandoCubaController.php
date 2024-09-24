<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;
use DB;
use App\Modelos\Provincia;
use App\Modelos\ColectivoPrivadoConCuba;
use App\Modelos\Traslado;
use App\Modelos\RutaConectandoCuba;

class ConectandoCubaController extends Controller
{
    public function __construct()
    {
        $this->middleware('hasPermission:conectandos.create')->only(['create','store']);
        $this->middleware('hasPermission:conectandos.destroy')->only(['destroy']);
        $this->middleware('hasPermission:conectandos.index')->only(['index']);
        $this->middleware('hasPermission:conectandos.edit')->only(['update','edit']);
    }


    public function index()
    {

        

        $conectandos = ColectivoPrivadoConCuba::all();
        


        return view('admin.conectandos.index', ['conectandos' => $conectandos]);

    }

    
    public function create()
    {
        $ruta = '/conectandocuba';
        $nombre = 'CONECTANDOCUBA';
        $provincias = Provincia::all();
        $rutas = RutaConectandoCuba::all();
        //dd($provincias);
        return view('admin.conectandos.create', ['rutas' => $rutas,'provincias' => $provincias],compact('nombre','ruta'));
    }

    
    public function store(Request $request)
    {
    	$rules = [

    		//'tipo_traslado' => 'required|in:Privado,Colectivo',
    		'provincia_origen' => 'sometimes|different:provincia_destino',
    		'provincia_destino' => 'sometimes',
    		'dias_antelacion' => 'required|in:10,20,30,50,80,100',
    		'precio_pax' => 'required|numeric|min:1',
    		'precio_ninnos' => 'required|numeric|min:1',
    		
            
    	];

        $messages =[
            //'tipo_traslado.required' => 'Es necesario seleccionar el tipo de traslado.',

            'dias_antelacion.required' => 'Es necesario ingresar el o los dias de antelación.',
            'precio_pax.required' => 'Es necesario ingresar el precio PAX.',
            'precio_ninnos.required' => 'Es necesario ingresar un precio para los niños.',
            //'tarifario.required' => 'Es necesario el tarifario.',
            //'tarifario.mimes' => 'solo se permiten archivos xlsx o xls.',
        ];

    	$this->validate($request, $rules, $messages);


        $conectando = new ColectivoPrivadoConCuba();
        $conectando->dias_antelacion_id = $request->get('dias_antelacion');
        $conectando->provincia_origen_id = $request->get('provincia_origen');
        $conectando->provincia_destino_id = $request->get('provincia_destino');
        $conectando->precio_pax = $request->get('precio_pax');
        $conectando->precio_ninnos = $request->get('precio_ninnos');
        $conectando->ruta_id = $request->get('ruta');

    	if ($conectando->save()) {
    		return redirect()->route('admin.content.conectandos.index')->with('notificacion','El contenido del traslado conectando cuba se ha registrado satisfactoriamente.');

    	}else{

            return redirect()->route('admin.content.conectandos.index')->with('notificacionerror','El contenido del traslado conectando cuba no se ha podido registrar en su base de datos.');
        }

    	
        
    }

    
    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {
        
        //$tras = Traslado::findOrFail($id);
        $provincias = Provincia::all();
        $pruebatras = ColectivoPrivadoConCuba::where('colectivos_privados_cons_cubas.traslado_id', '=', $tras->id)->get();
//        dd($pruebatras);
        $data = array();
        foreach ($pruebatras as $key => $value) {
            
            {
                $data['provincia_origen'] = $value['provincia_origen'];
                $data['provincia_destino'] = $value['provincia_destino'];
                $data['precio_pax'] = $value['precio_pax'];
                $data['precio_ninnos'] = $value['precio_ninnos'];
            }
        }
        //dd($data) ;

        return view('admin.conectandos.edit',["conectando"=>$tras, "data"=>$data, "provincias"=>$provincias]);
    }

    
    public function update(Request $request, $id)
    {
        //
        $rules = [
        	'provincia_origen' => 'sometimes',
    		'provincia_destino' => 'sometimes|different:provincia_origen',
    		'dias_antelacion' => 'required|in:10,20,30,50,80,100',
    		'precio_pax' => 'required|numeric|min:1',
    		'precio_ninnos' => 'required|numeric|min:1',
            
    	];

        $messages =[
            
            'dias_antelacion.required' => 'Es necesario ingresar el o los dias de antelación.',
            'precio_pax.required' => 'Es necesario ingresar el precio PAX.',
            'precio_ninnos.required' => 'Es necesario ingresar un precio para los niños.',
        ];
        $this->validate($request, $rules, $messages);

        
        //$traslado = new Traslado();
        $traslado = Traslado::findOrFail($id);
    	$traslado->dias_antelacion = $request->get('dias_antelacion');

    	if ($traslado->update()) {
            $data = array();

    		
    		$conectando = ColectivoPrivadoConCuba::where('traslado_id', $traslado->id)->get();
            foreach ($conectando as $key => $value) {
                $value['provincia_origen'] = $request->get('provincia_origen');
                $value['provincia_destino'] = $request->get('provincia_destino');
                $value['precio_pax'] = $request->get('precio_pax');
                $value['precio_ninnos'] = $request->get('precio_ninnos');
            }
        	if ($value->update()) {
        		return redirect()->route('admin.content.conectandos.index')->with('notificacion','El contenido del traslado conectando cuba se ha editado satisfactoriamente.');
        	}
        	return redirect()->route('admin.content.conectandos.index')->with('notificacionerror','El contenido del traslado conectando cuba no se ha podido registrar en su base de datos.');
    		

    	}
        


    }

    
    public function destroy($id)
    {
        //
        $traslado = Traslado::destroy($id);


        if ($traslado==null) {
            return redirect()->route('admin.content.conectandos.index')->with('notificacion','Se ha eliminado satisfactoriamente el traslado.');
        }

        return redirect()->route('admin.content.conectandos.index')->with('notificacionerror','No se ha podido eliminar el trslado de su base de datos.');
        
    }

}
