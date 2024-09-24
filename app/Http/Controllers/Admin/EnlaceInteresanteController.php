<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Input;
use Image;
use DB;

use App\Modelos\EnlaceInteresante;

class EnlaceInteresanteController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('hasPermission:enlace_interesantes.create')->only(['create','store']);
        $this->middleware('hasPermission:enlace_interesantes.destroy')->only(['destroy']);
        $this->middleware('hasPermission:enlace_interesantes.index')->only(['index']);
        $this->middleware('hasPermission:enlace_interesantes.edit')->only(['update','edit']);
    }


    public function index()
    {
        //
        $ruta = '/enlace_interesantes/';
        $nombre = 'ENLACE INTERESANTE';
        

        $enlaceinteresantes = DB::table('enlace_interesantes')
        ->select('enlace_interesantes.id','enlace_interesantes.imagen', 'enlace_interesantes.nombre')
        ->get();
        


        return view('admin.enlaceinteresantes.index', ['enlaceinteresantes' => $enlaceinteresantes], compact('nombre','ruta'));

    }

    
    public function create()
    {
        //
        $ruta = '/enlace_interesantes/';
        $nombre = 'ENLACE INTERESANTE';
        //$oficinas = OficinaTraslations::where('oficinas_traslations.idioma', '=', 'es')->get();
        return view('admin.enlaceinteresantes.create', compact('nombre','ruta'));
    }

    
    public function store(Request $request)
    {
    	$rules = [
    		'imagen' => 'required|mimes:jpg,png,gif,jpeg|min:1|max:512|dimensions:width>10,height>10',

    		//'telefono' => 'required|numeric|unique:oficinas',

    		'nombre' => 'required|url|unique:enlace_interesantes',
            
    	];

        $messages =[
            'imagen' => 'la imagen es obligatoria',

            'nombre_es.required' => 'El campo  url es obligatorio.',
            'nombre_es.unique' => 'El campo url es único, el valor especificado ya se encuentra en uso.',
            'nombre_es.url' => 'El campo url debe tener la siguiente estructura: http o https://servidor.',

            'imagen.mimes' => 'El archivo especificado no se pudo subir. Sólo se permiten archivos con las siguientes extensiones: png, gif, jpg, jpeg.',
            'imagen.min' => 'El archivo especificado no se pudo subir. El tamaño del archivo debe ser mayor que 0 byte.',
            'imagen.min' => 'El archivo especificado no se pudo subir. El tamaño del archivo debe ser menor que 512 Kbyte.',


        ];

    	$this->validate($request, $rules, $messages);


    	$enlace = new EnlaceInteresante();
        $enlace->nombre = $request->get('nombre');
        $enlace->image('imagen', $enlace);

    	if ($enlace->save()) {
    		return redirect()->route('admin.content.enlace_interesantes.index')->with('notificacion','El contenido del enlace se ha registrado satisfactoriamente.');

    	}else{
    		return redirect()->route('admin.content.enlace_interesantes.index')->with('notificacionerror','El contenido del enlace no se ha podido registrar en su base de datos.');
    	}
        

    	
        
    }

    
    public function show($id)
    {
        
    }

   
    public function edit($id)
    {
        $ruta = '/enlace_interesantes/';
        $nombre = 'ENLACE INTERESANTE';
        $enlace = EnlaceInteresante::findOrFail($id);
        
        //dd($data);
        return view('admin.enlaceinteresantes.edit',["enlace"=>$enlace], compact('nombre','ruta'));
    }

    
    public function update(Request $request, $id)
    {
        //
        $rules = [
            'imagen' => 'required|mimes:jpg,png,gif,jpeg|min:1|max:512|dimensions:width>10,height>10',

            //'telefono' => 'required|numeric|unique:oficinas',

            'nombre' => 'required|url|unique:enlace_interesantes',

        ];

        $messages =[
            'imagen' => 'la imagen es obligatoria',

            'nombre_es.required' => 'El campo  url es obligatorio.',
            'nombre_es.unique' => 'El campo url es único, el valor especificado ya se encuentra en uso.',
            'nombre_es.url' => 'El campo url debe tener la siguiente estructura: http o https://servidor.',

            'imagen.mimes' => 'El archivo especificado no se pudo subir. Sólo se permiten archivos con las siguientes extensiones: png, gif, jpg, jpeg.',
            'imagen.min' => 'El archivo especificado no se pudo subir. El tamaño del archivo debe ser mayor que 0 byte.',
            'imagen.min' => 'El archivo especificado no se pudo subir. El tamaño del archivo debe ser menor que 512 Kbyte.',


        ];
        $this->validate($request, $rules, $messages);

        $enlace = EnlaceInteresante::findOrFail($id);
        //$empleado = Empleado::findOrFail($id);

        //Storage::delete('public/'.$empleado->foto);
        $enlace->nombre = $request->get('nombre');
        $enlace->image('imagen', $enlace);
        
        if ($enlace->update()) {
        	//$i = $i + 1;
                return redirect()->route('admin.content.enlace_interesantes.index')->with('notificacion','El contenido del enlace se ha editado satisfactoriamente.');
        }else{
        	return redirect()->route('admin.content.enlace_interesantes.index')->with('notificacion','El contenido del enlace no se ha editado satisfactoriamente.');
        }

        
    }

    
    public function destroy($id)
    {
        //
        $enlace = EnlaceInteresante::destroy($id);


        if ($enlace==null) {
            return redirect()->route('admin.content.enlace_interesantes.index')->with('notificacion','Se ha eliminado satisfactoriamente el enlace.');
        }else
        {

        return redirect()->route('admin.content.enlace_interesantes.index')->with('notificacionerror','No se ha podido eliminar el enlace de su base de datos.');
    	}
        
    }
}
