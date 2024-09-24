<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;
use DB;
use App\Modelos\Nacionalidad;
use App\Modelos\Cliente;
use App\Modelos\CircuitoCliente;

class ClienteController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('hasPermission:clientes.create')->only(['create','store']);
        $this->middleware('hasPermission:clientes.destroy')->only(['destroy']);
        $this->middleware('hasPermission:clientes.index')->only(['index']);
        $this->middleware('hasPermission:clientes.edit')->only(['update','edit']);
    }


    public function index()
    {
        //
        $ruta = '/clientes/';
        $nombre = 'CLIENTE';
        //$nacionalidades = Nacionalidad::all();

        

        $clientes = DB::table('clientes')->orderby('id','desc')->paginate();
        


        return view('admin.clientes.index', ['clientes' => $clientes], compact('nombre','ruta'));
        /*$provincias = Provincia::all();
        return view('provincias.index', compact('provincias'));

       /* $usuarios = DB::table('users')->orderby('id','desc')->paginate(10);
        //dd($provincias);
        return view('backend.usuarios.index', ['usuarios' => $usuarios]);*/

    }

    
    public function create()
    {
        //
        $ruta = '/clientes';
        $nombre = 'CLIENTE';
        $circuitos = DB::table('circuitos')->join('circuitos_traslations', 'circuitos.id', "=", "circuitos_traslations.circuitos_id")
            ->select('circuitos_traslations.nombre as nombre','circuitos_traslations.circuitos_id')
            ->where('circuitos_traslations.idioma', '=', 'es')->get();
        $nacionalidades = DB::table('nacionalidads')
            //->join('carousels_traslations', 'carousels.id', "=", "carousels_traslations.carousels_id")
            ->select('nacionalidads.id', 'nacionalidads.nacionalidad', 'nacionalidads.created_at', 'nacionalidads.updated_at')->get();
        //dd($nacionalidades);
        return view('admin.clientes.create', ['nacionalidades' => $nacionalidades], compact('nombre','ruta','circuitos'));
    }

    
    public function store(Request $request)
    {
    	$rules = [
    		'circuitos_id' => 'required|sometimes',

            'nacionalidad_id' => 'required|sometimes',

    		'pasaporte' => 'required|unique:clientes|max:10',

    		'nombre' => 'required|max:200',

            'apaterno' => 'required|max:200',

            'amaterno' => 'required|max:200',

            'fecha' => 'required|date|before_or_equal:now',
            
    	];

        $messages =[
            
            'nacionalidad_id.required' => 'El campo  nacionalidad es obligatorio.',
            'circuitos_id.required' => 'El campo  circuito es obligatorio.',
            'pasaporte.required' => 'El campo  pasaporte es obligatorio.',
            'nombre.required' => 'El campo  nombre es obligatorio.',
            'apaterno.required' => 'El campo  1er apellido es obligatorio.',
            'amaterno.required' => 'El campo  2do  apellido es obligatorio.',
            'fecha.required' => 'El campo  fecha de nacimiento es obligatorio.',


            'fecha.before_or_equal' => 'La fecha de publicación debe ser menor o igual que la fecha actual.',

            'nombre_es.required' => 'Es necesario ingresar un nombre para la oficina.',
            'nombre_en.required' => 'Es necesario ingresar un nombre para la oficina en.',
            'nombre_dt.required' => 'Es necesario ingresar un nombre para la oficina dt.',
            'nombre_fr.required' => 'Es necesario ingresar un nombre para la oficina fr.',
            'nombre_it.required' => 'Es necesario ingresar un nombre para la oficina it.',
            'nombre_pt.required' => 'Es necesario ingresar un nombre para la oficina pt.',

            'nombre_es.min' => 'El nombre de la oficina debe tener mínimo 5 caracteres.',

            'nombre_es.max' => 'Admite hasta 200 caracteres.',
            'apaterno.max' => 'Admite hasta 200 caracteres.',
            'amaterno.max' => 'Admite hasta 200 caracteres.',
        ];

    	$this->validate($request, $rules, $messages);


    	$cliente = new Cliente();
    	$cliente->nombre = $request->get('nombre');
        $cliente->apaterno = $request->get('apaterno');
        $cliente->amaterno = $request->get('amaterno');
        $cliente->pasaporte = $request->get('pasaporte');
        $cliente->nacionalidad_id = $request->get('nacionalidad_id');
        $cliente->fecha = $request->get('fecha');

        
        

    	if ($cliente->save()) {
            $circuito_cliente = new CircuitoCliente();
            $circuito_cliente->circuitos_id = $request->get('circuitos_id');
            $circuito_cliente->clientes_id = $cliente->id;
            $circuito_cliente->save();
    		return redirect()->route('admin.content.clientes.index')->with('notificacion','El contenido del cliente se ha registrado satisfactoriamente.');

    	}
        return redirect()->route('admin.content.clientes.index')->with('notificacionerror','El contenido del cliente no se ha podido registrar en su base de datos.');

    	
        
    }

    
    public function show($id)
    {
        //
        $tras = DB::table('clientes')
            ->join('nacionalidades', 'clientes.id', "=", "nacionalidades.buro_id")
            ->select('clientes.id', 'nacionalidades.nombre', 'nacionalidades.direccion','clientes.telefono','clientes.oficina_id', 'clientes.created_at', 'clientes.updated_at')
            ->where('nacionalidades.idioma', '=', 'es')->get();
        foreach ($tras as $key) {
        	return $key['nombre'];
        }
        //dd($key);
        //return view("backend.clientes.show",["buro"=>OficinaTraslations::findOrFail($id),'tras'=>$tras]);
    }

   
    public function edit($id)
    {
        
        $ruta = '/clientes';
        $nombre = 'BURO';
        $buro = Buro::findOrFail($id);
        $tras = BuroTraslations::where('buro_id', $buro->id)->get();
        $oficinas = OficinaTraslations::where('oficinas_traslations.idioma', '=', 'es')->get();
        $data = array();
        foreach ($tras as $item)
        {
            if($item['idioma']=='es')
            {
                $data['nombre_es'] = $item['nombre'];
                $data['direccion_es'] = $item['direccion'];
            }
            if($item['idioma']=='en')
            {
                $data['nombre_en']  = $item['nombre'];
                $data['direccion_en'] = $item['direccion'];
            }
            if($item['idioma']=='fr')
            {
                $data['nombre_fr'] = $item['nombre'];
                $data['direccion_fr'] = $item['direccion'];
            }
            if($item['idioma']=='dt')
            {
                $data ['nombre_dt']= $item['nombre'];
                $data['direccion_dt'] = $item['direccion'];
            }
            if($item['idioma']=='it')
            {
                $data ['nombre_it']= $item['nombre'];
                $data['direccion_it'] = $item['direccion'];
            }
            if($item['idioma']=='pt')
            {
                $data ['nombre_pt']= $item['nombre'];
                $data['direccion_pt'] = $item['direccion'];
            }

        }
        //dd($data);
        return view('backend.clientes.edit',["buro"=>$buro, "data"=>$data, "oficinas"=>$oficinas], compact('nombre','ruta'));
    }

    
    public function update(Request $request, $id)
    {
        //
        $rules = [
            'circuitos_id' => 'required|sometimes',

            'nacionalidad_id' => 'required|sometimes',

            'pasaporte' => 'required|unique:clientes|max:10',

            'nombre' => 'required|max:200',

            'apaterno' => 'required|max:200',

            'amaterno' => 'required|max:200',

            'fecha' => 'required|date|before_or_equal:now',
            
        ];

        $messages =[
            
            'nacionalidad_id.required' => 'El campo  nacionalidad es obligatorio.',
            'circuitos_id.required' => 'El campo  circuito es obligatorio.',
            'pasaporte.required' => 'El campo  pasaporte es obligatorio.',
            'nombre.required' => 'El campo  nombre es obligatorio.',
            'apaterno.required' => 'El campo  1er apellido es obligatorio.',
            'amaterno.required' => 'El campo  2do  apellido es obligatorio.',
            'fecha.required' => 'El campo  fecha de nacimiento es obligatorio.',


            'fecha.before_or_equal' => 'La fecha de publicación debe ser menor o igual que la fecha actual.',

            'nombre_es.required' => 'Es necesario ingresar un nombre para la oficina.',
            'nombre_en.required' => 'Es necesario ingresar un nombre para la oficina en.',
            'nombre_dt.required' => 'Es necesario ingresar un nombre para la oficina dt.',
            'nombre_fr.required' => 'Es necesario ingresar un nombre para la oficina fr.',
            'nombre_it.required' => 'Es necesario ingresar un nombre para la oficina it.',
            'nombre_pt.required' => 'Es necesario ingresar un nombre para la oficina pt.',

            'nombre_es.min' => 'El nombre de la oficina debe tener mínimo 5 caracteres.',

            'nombre_es.max' => 'Admite hasta 200 caracteres.',
            'apaterno.max' => 'Admite hasta 200 caracteres.',
            'amaterno.max' => 'Admite hasta 200 caracteres.',
        ];
        $this->validate($request, $rules, $messages);
    	$lang = ['es', 'en', 'dt', 'fr', 'it', 'pt' ];
    	$namef = ['nombre_es', 'nombre_en', 'nombre_dt', 'nombre_fr', 'nombre_it', 'nombre_pt' ];
    	$addre = ['direccion_es', 'direccion_en', 'direccion_dt', 'direccion_fr', 'direccion_it', 'direccion_pt' ];

        $buro = Buro::findOrFail($id);
        $buro->telefono = $request->get('telefono');
        $buro->oficina_id = $request->get('oficina_id');
        $buro->update();

        
    	
    $traslations = BuroTraslations::where('buro_id', $buro->id)->get(); 
    $i= 0;
    foreach ($traslations as $value) 
    {
        
            if ($value['idioma']==$lang[0])
            {

            $value['nombre'] = $request->get($namef[0]);

            $direccion = $request->get($addre[0]);
            if ($direccion) 
            {
                $value['direccion'] = $request->get($addre[0]);
            }
            if ($value->update()) {
                //$i = $i + 1;
                //return redirect()->route('oficinas.index')->with('notificacion','El contenido de la oficina se ha edi satisfactoriamente.');
            }
        }
        if ($value['idioma']==$lang[1])
            {

            $value['nombre'] = $request->get($namef[1]);

            $direccion = $request->get($addre[1]);
            if ($direccion) 
            {
                $value['direccion'] = $request->get($addre[1]);
            }
            if ($value->update()) {
                //$i = $i + 1;
                //return redirect()->route('oficinas.index')->with('notificacion','El contenido de la oficina se ha edi satisfactoriamente.');
            }
        }
        if ($value['idioma']==$lang[2])
            {

            $value['nombre'] = $request->get($namef[2]);

            $direccion = $request->get($addre[2]);
            if ($direccion) 
            {
                $value['direccion'] = $request->get($addre[2]);
            }
            if ($value->update()) {
                //$i = $i + 1;
                //return redirect()->route('oficinas.index')->with('notificacion','El contenido de la oficina se ha edi satisfactoriamente.');
            }
        }
        if ($value['idioma']==$lang[3])
            {

            $value['nombre'] = $request->get($namef[3]);

            $direccion = $request->get($addre[3]);
            if ($direccion) 
            {
                $value['direccion'] = $request->get($addre[3]);
            }
            if ($value->update()) {
                //$i = $i + 1;
                //return redirect()->route('oficinas.index')->with('notificacion','El contenido de la oficina se ha edi satisfactoriamente.');
            }
        }if ($value['idioma']==$lang[4])
            {

            $value['nombre'] = $request->get($namef[4]);

            $direccion = $request->get($addre[4]);
            if ($direccion) 
            {
                $value['direccion'] = $request->get($addre[4]);
            }
            if ($value->update()) {
                //$i = $i + 1;
                //return redirect()->route('oficinas.index')->with('notificacion','El contenido de la oficina se ha edi satisfactoriamente.');
            }
        }if ($value['idioma']==$lang[5])
            {

            $value['nombre'] = $request->get($namef[5]);

            $direccion = $request->get($addre[5]);
            if ($direccion) 
            {
                $value['direccion'] = $request->get($addre[5]);
            }
            if ($value->update()) {
                //$i = $i + 1;
                return redirect()->route('admin.content.clientes.index')->with('notificacion','El contenido del cliente se ha editado satisfactoriamente.');
            }
        }
        
        
       // return redirect()->route('oficinas.index')->with('notificacionerror','El contenido editado de la oficina no se ha podido guardar en su base de datos.');

        
    }

    }

    
    public function destroy($id)
    {
        //
        $cliente = Cliente::destroy($id);


        if ($cliente==null) {
            return redirect()->route('admin.content.clientes.index')->with('notificacion','Se ha eliminado satisfactoriamente el cliente.');
        }

        return redirect()->route('admin.content.clientes.index')->with('notificacionerror','No se ha podido eliminar el cliente de su base de datos.');
        
    }
}
