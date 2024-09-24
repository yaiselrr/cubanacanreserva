<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;
use DB;
use App\Modelos\PreciPax;
use App\Modelos\CircuitoTraslations;
use App\Modelos\CircuitoPrecio;

class PreciPaxController extends Controller
{
    //
     //
    public function __construct()
    {
        $this->middleware('hasPermission:precipaxs.create')->only(['create','store']);
        $this->middleware('hasPermission:precipaxs.destroy')->only(['destroy']);
        $this->middleware('hasPermission:precipaxs.index')->only(['index']);
        $this->middleware('hasPermission:precipaxs.edit')->only(['update','edit']);
    }


    public function index()
    {
        //
        $ruta = '/precipaxs/';
        $nombre = 'PRECIO PAX';
        

        $preciopaxs = DB::table('preciopaxs')->orderby('id','desc')->paginate();
        


        return view('admin.precipaxs.index', ['preciopaxs' => $preciopaxs], compact('nombre','ruta'));
        /*$provincias = Provincia::all();
        return view('provincias.index', compact('provincias'));

       /* $usuarios = DB::table('users')->orderby('id','desc')->paginate(10);
        //dd($provincias);
        return view('backend.usuarios.index', ['usuarios' => $usuarios]);*/

    }

    
    public function create()
    {
        //
        $ruta = '/preciospaxs/';
        $nombre = 'PRECIO PAX';
        
        $circuitos = DB::table('circuitos')->join('circuitos_traslations', 'circuitos.id', "=", "circuitos_traslations.circuitos_id")
            ->select('circuitos_traslations.nombre as nombre','circuitos_traslations.circuitos_id')
            ->where('circuitos_traslations.idioma', '=', 'es')->get();
        //dd($circuitos);
        return view('admin.precipaxs.create', compact('nombre','ruta','circuitos'));
        
    }

    
    public function store(Request $request)
    {
    	$rules = [

    		'fecha_inicio' => 'required|date',
    		'fecha_fin' => 'required|date|after:fecha_inicio',
    		'precio_habitacions' => 'numeric|min:1',
    		'precio_habitaciond' => 'numeric|min:1',
    		'precio_ninnos' => 'numeric|min:1',
    		'capacidad_habitacions' => 'numeric|min:1',
    		'capacidad_habitaciond' => 'numeric|min:1',
    		'circuitos_id' => 'required',
            
    	];

        $messages =[
            

            'precio_habitacions.required' => 'El campo  precio habitación sencilla es obligatorio.',
            'precio_habitaciond.required' => 'El campo  precio habitación doble es obligatorio.',
            'capacidad_habitaciond.required' => 'El campo  capacidad habitación doble es obligatorio.',
            'capacidad_habitacions.required' => 'El campo  capacidad habitación sencilla es obligatorio.',
            'circuitos_id.required' => 'El campo  circuito es obligatorio.',
            'precio_ninnos.required' => 'El campo  precio niños es obligatorio.',
            'fecha_inicio.required' => 'El campo  fecha inicio es obligatorio.',
            'fecha_fin.required' => 'El campo  fecha fin es obligatorio.',
            'fecha_fin.after' => 'El campo fecha fin debe ser mayor o igual que el campo fecha inicio.',

            
        ];

    	$this->validate($request, $rules, $messages);
    	$lang = ['es', 'en', 'dt', 'fr', 'it', 'pt' ];
    	$namef = ['nombre_es', 'nombre_en', 'nombre_dt', 'nombre_fr', 'nombre_it', 'nombre_pt' ];
    	$modalityf = ['modalidad_es', 'modalidad_en', 'modalidad_dt', 'modalidad_fr', 'modalidad_it', 'modalidad_pt' ];
    	$itineraryf = ['itinerario_es', 'itinerario_en', 'itinerario_dt', 'itinerario_fr', 'itinerario_it', 'itinerario_pt' ];
    	$descriptionf = ['descripcion_es', 'descripcion_en', 'descripcion_dt', 'descripcion_fr', 'descripcion_it', 'descripcion_pt' ];


    	$rcircuito = new PreciPax();
    	$rcircuito->fecha_inicio = $request->get('fecha_inicio');
    	$rcircuito->fecha_fin = $request->get('fecha_fin');
    	$rcircuito->precio_habitacions = $request->get('precio_habitacions');
    	$rcircuito->precio_habitaciond = $request->get('precio_habitaciond');
    	$rcircuito->precio_ninnos = $request->get('precio_ninnos');
    	$rcircuito->capacidad_habitacions = $request->get('capacidad_habitacions');
    	$rcircuito->capacidad_habitaciond = $request->get('capacidad_habitaciond');
    	$rcircuito->circuitos_id = $request->get('circuitos_id');


    	
    	//$circuito->oferta_especial = $request->get('oferta_especial');
    	//$circuito->esta_activo = $request->get('esta_activo');

    	if ($rcircuito->save()) {
            $circuito_precio = new CircuitoPrecio();
            $circuito_precio->circuitos_id = $request->get('circuitos_id');
            $circuito_precio->precio_paxs_id = $rcircuito->id;
            $circuito_precio->save();
            return redirect()->route('admin.content.precipaxs.index')->with('notificacion','El contenido de la precio circuito se ha registrado satisfactoriamente.');

        }
        return redirect()->route('admin.content.precipaxs.index')->with('notificacionerror','El contenido del precio circuito no se ha podido registrar en su base de datos.');

        
            
        
    }

    
    public function show($id)
    {
        //
        $tras = DB::table('buros')
            ->join('buros_traslations', 'buros.id', "=", "buros_traslations.buro_id")
            ->select('buros.id', 'buros_traslations.nombre', 'buros_traslations.direccion','buros.telefono','buros.oficina_id', 'buros.created_at', 'buros.updated_at')
            ->where('buros_traslations.idioma', '=', 'es')->get();
        foreach ($tras as $key) {
        	return $key['nombre'];
        }
        //dd($key);
        //return view("backend.buros.show",["buro"=>OficinaTraslations::findOrFail($id),'tras'=>$tras]);
    }

   
    public function edit($id)
    {
        
        $ruta = '/preciospaxs/';
        $nombre = 'PRECIO PAX';
        $rcircuito = PreciPax::findOrFail($id);
        $circuitos = DB::table('circuitos')->join('circuitos_traslations', 'circuitos.id', "=", "circuitos_traslations.circuitos_id")
            ->select('circuitos_traslations.nombre as nombre','circuitos_traslations.circuitos_id')
            ->where('circuitos_traslations.idioma', '=', 'es')->get();

        return view('admin.precipaxs.edit',["rcircuito"=>$rcircuito], compact('nombre','ruta','circuitos'));
    }

    
    public function update(Request $request, $id)
    {
        //
        $rules = [

            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after:fecha_inicio',
            'precio_habitacions' => 'numeric|min:1',
            'precio_habitaciond' => 'numeric|min:1',
            'precio_ninnos' => 'numeric|min:1',
            'capacidad_habitacions' => 'numeric|min:1',
            'capacidad_habitaciond' => 'numeric|min:1',
            'circuitos_id' => 'required',
            
        ];

        $messages =[
            

            'precio_habitacions.required' => 'El campo  precio habitación sencilla es obligatorio.',
            'precio_habitaciond.required' => 'El campo  precio habitación doble es obligatorio.',
            'capacidad_habitaciond.required' => 'El campo  capacidad habitación doble es obligatorio.',
            'capacidad_habitacions.required' => 'El campo  capacidad habitación sencilla es obligatorio.',
            'circuitos_id.required' => 'El campo  circuito es obligatorio.',
            'precio_ninnos.required' => 'El campo  precio niños es obligatorio.',
            'fecha_inicio.required' => 'El campo  fecha inicio es obligatorio.',
            'fecha_fin.required' => 'El campo  fecha fin es obligatorio.',
            'fecha_fin.after' => 'El campo fecha fin debe ser mayor o igual que el campo fecha inicio.',

            
        ];
        $this->validate($request, $rules, $messages);
    	$lang = ['es', 'en', 'dt', 'fr', 'it', 'pt' ];
    	$namef = ['nombre_es', 'nombre_en', 'nombre_dt', 'nombre_fr', 'nombre_it', 'nombre_pt' ];
    	$modalityf = ['modalidad_es', 'modalidad_en', 'modalidad_dt', 'modalidad_fr', 'modalidad_it', 'modalidad_pt' ];
    	$itineraryf = ['itinerario_es', 'itinerario_en', 'itinerario_dt', 'itinerario_fr', 'itinerario_it', 'itinerario_pt' ];
    	$descriptionf = ['descripcion_es', 'descripcion_en', 'descripcion_dt', 'descripcion_fr', 'descripcion_it', 'descripcion_pt' ];


    	$rcircuito = PreciPax::findOrFail($id);
    	$rcircuito->fecha_inicio = $request->get('fecha_inicio');
    	$rcircuito->fecha_fin = $request->get('fecha_fin');
    	$rcircuito->precio_habitacions = $request->get('precio_habitacions');
    	$rcircuito->precio_habitaciond = $request->get('precio_habitaciond');
    	$rcircuito->precio_ninnos = $request->get('precio_ninnos');
    	$rcircuito->capacidad_habitacions = $request->get('capacidad_habitacions');
    	$rcircuito->capacidad_habitaciond = $request->get('capacidad_habitaciond');
        $rcircuito->circuitos_id = $request->get('circuitos_id');

    	if ($rcircuito->update()) {
            $circuito_precio = CircuitoPrecio::findOrFail($id);
            $circuito_precio->circuitos_id = $request->get('circuitos_id');
            $circuito_precio->precio_paxs_id = $rcircuito->id;
            $circuito_precio->update();
    		return redirect()->route('admin.content.precipaxs.index')->with('notificacion','El contenido de la reservación circuito se ha editado satisfactoriamente.');
    }

	}

    

    
    public function destroy($id)
    {
        //
        $rcircuito = PreciPax::destroy($id);


        if ($rcircuito==null) {
            return redirect()->route('admin.content.precipaxs.index')->with('notificacion','Se ha eliminado satisfactoriamente el precio pax circuito.');
        }

        return redirect()->route('admin.content.precipaxs.index')->with('notificacionerror','No se ha podido eliminar el circuito de su base de datos.');
        
    }
}
