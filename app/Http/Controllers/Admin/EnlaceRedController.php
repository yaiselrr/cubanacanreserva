<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Input;
use Image;
use DB;

use App\Modelos\EnlaceRed;

class EnlaceRedController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('hasPermission:enlace_reds.create')->only(['create','store']);
        $this->middleware('hasPermission:enlace_reds.destroy')->only(['destroy']);
        $this->middleware('hasPermission:enlace_reds.index')->only(['index']);
        $this->middleware('hasPermission:enlace_reds.edit')->only(['update','edit']);

    }


    public function index()
    {
        //
        $ruta = '/enlace_reds/';
        $nombre = 'ENLACE RED';
        

        $enlaceredes = DB::table('enlace_reds')
        ->select('enlace_reds.id','enlace_reds.imagen', 'enlace_reds.nombre')
        ->get();
        


        return view('admin.enlaceredes.index', ['enlaceredes' => $enlaceredes], compact('nombre','ruta'));

    }

    
    public function create()
    {
        //
        $ruta = '/enlace_reds/';
        $nombre = 'ENLACE RED';
        //$oficinas = OficinaTraslations::where('oficinas_traslations.idioma', '=', 'es')->get();
        return view('admin.enlaceredes.create', compact('nombre','ruta'));
    }

    
    public function store(Request $request)
    {
    	$rules = [
    		'imagen' => 'required|mimes:jpg,png,gif,jpeg|min:1|max:512',

            //'telefono' => 'required|numeric|unique:oficinas',

            'nombre' => 'required|url|unique:enlace_reds',
            
        ];

        $messages =[
            'imagen' => 'required|mimes:jpg,png,gif,jpeg|min:1|min_width=100| max_width=200| min_height=200| max_height=400',

            'nombre_es.required' => 'El campo  url es obligatorio.',
            'nombre_es.unique' => 'El campo url es único, el valor especificado ya se encuentra en uso.',
            'nombre_es.url' => 'El campo url debe tener la siguiente estructura: http o https://servidor.',

            'imagen.mimes' => 'El archivo especificado no se pudo subir. Sólo se permiten archivos con las siguientes extensiones: png, gif, jpg, jpeg.',

            'imagen.min_width' => 'El archivo especificado no se pudo subir. La imagen es demasiado pequeña. Las dimensiones mínimas son (100x200).',
            'imagen.min_height' => 'El archivo especificado no se pudo subir. La imagen es demasiado pequeña. Las dimensiones mínimas son (100x200).',
            'imagen.max_width' => 'El archivo especificado no se pudo subir. La imagen es demasiado pequeña. Las dimensiones mínimas son (200x400).',
            'imagen.max_height' => 'El archivo especificado no se pudo subir. La imagen es demasiado pequeña. Las dimensiones mínimas son (200x400).',
            'imagen.min' => 'El archivo especificado no se pudo subir. El tamaño del archivo debe ser mayor que 0 byte.',

        ];

    	$this->validate($request, $rules, $messages);


    	$enlace = new EnlaceRed();
        $enlace->nombre = $request->get('nombre');
        $enlace->image('imagen', $enlace);

    	if ($enlace->save()) {
    		return redirect()->route('admin.content.enlace_reds.index')->with('notificacion','El contenido del enlace se ha registrado satisfactoriamente.');

    	}else{
    		return redirect()->route('admin.content.enlace_reds.index')->with('notificacionerror','El contenido del enlace no se ha podido registrar en su base de datos.');
    	}
        

    	
        
    }

    
    public function show($id)
    {
        
    }

   
    public function edit($id)
    {
        $ruta = '/enlace_reds/';
        $nombre = 'ENLACE RED';
        $enlace = EnlaceRed::findOrFail($id);
        
        //dd($data);
        return view('admin.enlaceredes.edit',["enlace"=>$enlace], compact('nombre','ruta'));
    }

    
    public function update(Request $request, $id)
    {
        //
        $rules = [
    		'imagen' => 'required|mimes:jpg,png,gif,jpeg|min:1|max:512',

            //'telefono' => 'required|numeric|unique:oficinas',

            'nombre' => 'required|url|unique:enlace_reds',
            
        ];

        $messages =[
            'imagen' => 'required|mimes:jpg,png,gif,jpeg|min:1|min_width=100| max_width=200| min_height=200| max_height=400',

            'nombre_es.required' => 'El campo  url es obligatorio.',
            'nombre_es.unique' => 'El campo url es único, el valor especificado ya se encuentra en uso.',
            'nombre_es.url' => 'El campo url debe tener la siguiente estructura: http o https://servidor.',

            'imagen.mimes' => 'El archivo especificado no se pudo subir. Sólo se permiten archivos con las siguientes extensiones: png, gif, jpg, jpeg.',

            'imagen.min_width' => 'El archivo especificado no se pudo subir. La imagen es demasiado pequeña. Las dimensiones mínimas son (100x200).',
            'imagen.min_height' => 'El archivo especificado no se pudo subir. La imagen es demasiado pequeña. Las dimensiones mínimas son (100x200).',
            'imagen.max_width' => 'El archivo especificado no se pudo subir. La imagen es demasiado pequeña. Las dimensiones mínimas son (200x400).',
            'imagen.max_height' => 'El archivo especificado no se pudo subir. La imagen es demasiado pequeña. Las dimensiones mínimas son (200x400).',
            'imagen.min' => 'El archivo especificado no se pudo subir. El tamaño del archivo debe ser mayor que 0 byte.',

        ];
        $this->validate($request, $rules, $messages);

        $enlace = EnlaceRed::findOrFail($id);
        //$empleado = Empleado::findOrFail($id);

        //Storage::delete('public/'.$empleado->foto);
        $enlace->nombre = $request->get('nombre');
        $enlace->image('imagen', $enlace);
        
        if ($enlace->update()) {
        	//$i = $i + 1;
                return redirect()->route('admin.content.enlace_reds.index')->with('notificacion','El contenido del enlace se ha editado satisfactoriamente.');
        }else{
        	return redirect()->route('admin.content.enlace_reds.index')->with('notificacion','El contenido del enlace no se ha editado satisfactoriamente.');
        }

        
    }

    
    public function destroy($id)
    {
        //
        $enlace = EnlaceRed::destroy($id);


        if ($enlace==null) {
            return redirect()->route('admin.content.enlace_reds.index')->with('notificacion','Se ha eliminado satisfactoriamente el enlace.');
        }else
        {

        return redirect()->route('admin.content.enlace_reds.index')->with('notificacionerror','No se ha podido eliminar el enlace de su base de datos.');
    	}
        
    }
}
