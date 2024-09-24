<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;
use DB;
use App\Modelos\Oficina;
use App\Modelos\OficinaTraslations;
use App\Modelos\Buro;

class OficinaController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('hasPermission:oficinas.create')->only(['create','store']);
        $this->middleware('hasPermission:oficinas.destroy')->only(['destroy']);
        $this->middleware('hasPermission:oficinas.index')->only(['index']);
        $this->middleware('hasPermission:oficinas.edit')->only(['update','edit']);
    }


    public function index()
    {
        //
        $ruta = '/oficinas/';
        $nombre = 'OFICINA';

        $oficinas = DB::table('oficinas')
            ->join('oficinas_traslations', 'oficinas.id', "=", "oficinas_traslations.oficina_id")
            ->select('oficinas.id', 'oficinas_traslations.nombre', 'oficinas_traslations.direccion','oficinas.telefono', 'oficinas.created_at', 'oficinas.updated_at')
            ->where('oficinas_traslations.idioma', '=', 'es')->get();
        


        return view('admin.oficinas.index', ['oficinas' => $oficinas],compact('ruta','nombre'));
        /*$provincias = Provincia::all();
        return view('provincias.index', compact('provincias'));

       /* $usuarios = DB::table('users')->orderby('id','desc')->paginate(10);
        //dd($provincias);
        return view('backend.usuarios.index', ['usuarios' => $usuarios]);*/

    }

    
    public function create()
    {
        //
        $ruta = '/oficinas/';
        $nombre = 'OFICINA';
        return view('admin.oficinas.create',compact('ruta','nombre'));
    }

    
    public function store(Request $request)
    {
    	$rules = [
    		'telefono' => 'required',

    		'oficina_nombre_es' => 'required|string|max:200|min:5|unique:oficinas',
            'direccion_es' => 'required|max:500',

            'oficina_nombre_en' => 'max:200',
            'direccion_en' => 'max:500',

            'oficina_nombre_dt' => 'max:200',
            'direccion_dt' => 'max:500',

            'oficina_nombre_fr' => 'max:200',
            'direccionfr' => 'max:500',

            'oficina_nombre_it' => 'max:200',
            'direccion_it' => 'max:500',

            'oficina_nombre_pt' => 'max:200',
            'direccion_pt' => 'max:500',
            
    	];

        $messages =[
            'telefono.required' => 'El campo  teléfono es obligatorio.',

            'oficina_nombre_es.required' => 'El campo  nombre es obligatorio.',
            'oficina_nombre_en.required' => 'El campo  nombre es obligatorio en.',
            'oficina_nombre_dt.required' => 'El campo  nombre es obligatorio dt.',
            'oficina_nombre_fr.required' => 'El campo  nombre es obligatorio fr.',
            'oficina_nombre_it.required' => 'El campo  nombre es obligatorio it.',
            'oficina_nombre_pt.required' => 'El campo  nombre es obligatorio pt.',

            'telefono.numeric' => 'El teléfono de la oficina solo puede ser números.',

            'telefono.min' => 'El teléfono de la oficina debe tener mínimo 8 caracteres.',

            'oficina_nombre_es.min' => 'El nombre de la oficina debe tener mínimo 5 caracteres.',

            'telefono.max' => 'El teléfono de la oficina debe tener máximo 8 caracteres.',

            'oficina_nombre_es.max' => 'Admite hasta 200 caracteres..',
            'oficina_nombre_en.max' => 'Admite hasta 200 caracteres. en.',
            'oficina_nombre_dt.max' => 'Admite hasta 200 caracteres. dt.',
            'oficina_nombre_fr.max' => 'Admite hasta 200 caracteres. fr.',
            'oficina_nombre_it.max' => 'Admite hasta 200 caracteres. it.',
            'oficina_nombre_pt.max' => 'Admite hasta 200 caracteres. pt.',

            'direccion_es.max' => 'Admite hasta 500 caracteres..',
            'direccion_en.max' => 'Admite hasta 500 caracteres. en.',
            'direccion_dt.max' => 'Admite hasta 500 caracteres. dt.',
            'direccion_fr.max' => 'Admite hasta 500 caracteres. fr.',
            'direccion_it.max' => 'Admite hasta 500 caracteres. it.',
            'direccion_pt.max' => 'Admite hasta 500 caracteres. pt.',

            'telefono.unique' => 'El teléfono de la oficina no puede estar repetido.',
        ];

    	$this->validate($request, $rules, $messages);
    	$lang = ['es', 'en', 'dt', 'fr', 'it', 'pt' ];
    	$namef = ['oficina_nombre_es', 'oficina_nombre_en', 'oficina_nombre_dt', 'oficina_nombre_fr', 'oficina_nombre_it', 'oficina_nombre_pt' ];
    	$addre = ['direccion_es', 'direccion_en', 'direccion_dt', 'direccion_fr', 'direccion_it', 'direccion_pt' ];


    	$oficina = new Oficina();
    	$oficina->telefono = $request->get('telefono');

    	if ($oficina->save()) {
    		for ($i=0; $i < 6; $i++) { 
    			$traslations = new OficinaTraslations();    			
    			$traslations->nombre = $request->get($namef[$i]);
    			$direccion = $request->get($addre[$i]);
        		if ($direccion) 
        		{
            		$traslations->direccion = $request->get($addre[$i]);
        		}
        		$traslations->idioma = $lang[$i];
        		$traslations->oficina_id = $oficina->id;
        		$traslations->save();

    		}
    		return redirect()->route('admin.content.oficinas.index')->with('notificacion','El contenido de la oficina se ha registrado satisfactoriamente.');

    	}
        return redirect()->route('admin.content.oficinas.index')->with('notificacionerror','El contenido de la oficina no se ha podido registrar en su base de datos.');

    	
        
    }

    
    public function show($id)
    {
        //
        $oficina_tras = OficinaTraslations::where('oficina_id',$id)->where('oficinas_traslations.idioma', '=', 'es')->get();
        //dd($tras_es);
        return view("admin.oficinas.show",["oficina"=>Oficina::findOrFail($id),'oficina_tras'=>$oficina_tras]);
    }

   
    public function edit($id)
    {
        
        $ruta = '/oficinas/';
        $oficina = Oficina::findOrFail($id);
        $tras = OficinaTraslations::where('oficina_id', $oficina->id)->get();
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
        //$nombre = $data['nombre_es'];
        //dd($nombre);
        return view('admin.oficinas.edit',["oficina"=>$oficina, "data"=>$data], compact('ruta'));
    }

    
    public function update(Request $request, $id)
    {
        //
        $rules = [
            'telefono' => 'required',

            'oficina_nombre_es' => 'required|string|max:200|min:5|unique:oficinas',
            'direccion_es' => 'required|max:500',

            'oficina_nombre_en' => 'max:200',
            'direccion_en' => 'max:500',

            'oficina_nombre_dt' => 'max:200',
            'direccion_dt' => 'max:500',

            'oficina_nombre_fr' => 'max:200',
            'direccionfr' => 'max:500',

            'oficina_nombre_it' => 'max:200',
            'direccion_it' => 'max:500',

            'oficina_nombre_pt' => 'max:200',
            'direccion_pt' => 'max:500',
            
        ];

        $messages =[
            'telefono.required' => 'El campo  teléfono es obligatorio.',

            'oficina_nombre_es.required' => 'El campo  nombre es obligatorio.',
            'oficina_nombre_en.required' => 'El campo  nombre es obligatorio en.',
            'oficina_nombre_dt.required' => 'El campo  nombre es obligatorio dt.',
            'oficina_nombre_fr.required' => 'El campo  nombre es obligatorio fr.',
            'oficina_nombre_it.required' => 'El campo  nombre es obligatorio it.',
            'oficina_nombre_pt.required' => 'El campo  nombre es obligatorio pt.',

            'telefono.numeric' => 'El teléfono de la oficina solo puede ser números.',

            'telefono.min' => 'El teléfono de la oficina debe tener mínimo 8 caracteres.',

            'oficina_nombre_es.min' => 'El nombre de la oficina debe tener mínimo 5 caracteres.',

            'telefono.max' => 'El teléfono de la oficina debe tener máximo 8 caracteres.',

            'oficina_nombre_es.max' => 'Admite hasta 200 caracteres..',
            'oficina_nombre_en.max' => 'Admite hasta 200 caracteres. en.',
            'oficina_nombre_dt.max' => 'Admite hasta 200 caracteres. dt.',
            'oficina_nombre_fr.max' => 'Admite hasta 200 caracteres. fr.',
            'oficina_nombre_it.max' => 'Admite hasta 200 caracteres. it.',
            'oficina_nombre_pt.max' => 'Admite hasta 200 caracteres. pt.',

            'direccion_es.max' => 'Admite hasta 500 caracteres..',
            'direccion_en.max' => 'Admite hasta 500 caracteres. en.',
            'direccion_dt.max' => 'Admite hasta 500 caracteres. dt.',
            'direccion_fr.max' => 'Admite hasta 500 caracteres. fr.',
            'direccion_it.max' => 'Admite hasta 500 caracteres. it.',
            'direccion_pt.max' => 'Admite hasta 500 caracteres. pt.',

            'telefono.unique' => 'El teléfono de la oficina no puede estar repetido.',
            'nombre_es.unique' => 'Ya existe una Oficina Comercial con ese nombre.',
        ];
        $this->validate($request, $rules, $messages);

    	$lang = ['es', 'en', 'dt', 'fr', 'it', 'pt' ];

        //dd($lang[0]);
    	$namef = ['oficina_nombre_es', 'oficina_nombre_en', 'oficina_nombre_dt', 'oficina_nombre_fr', 'oficina_nombre_it', 'oficina_nombre_pt' ];
    	$addre = ['direccion_es', 'direccion_en', 'direccion_dt', 'direccion_fr', 'direccion_it', 'direccion_pt' ];

        $oficina = Oficina::findOrFail($id);
        $oficina->telefono = $request->get('telefono');
        $oficina->update();

        
    	
    $traslations = OficinaTraslations::where('oficina_id', $oficina->id)->get(); 
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
                return redirect()->route('admin.content.oficinas.index')->with('notificacion','El contenido de la oficina se ha edi satisfactoriamente.');
            }
        }
        
        
       // return redirect()->route('oficinas.index')->with('notificacionerror','El contenido editado de la oficina no se ha podido guardar en su base de datos.');

        
    }

    }

    
    public function destroy($id)
    {
        //
//
        $buro = Buro::where('oficina_id',$id)->get();

        if ($buro){
            return redirect()->route('admin.content.oficinas.index')->with('notificacionerror','No se ha podido eliminar la oficina de su base de datos esta asociada a algun buro');
        }else{
            $oficina = Oficina::destroy($id);
            if ($oficina==null) {
                return redirect()->route('admin.content.oficinas.index')->with('notificacion','Se ha eliminado satisfactoriamente la oficina.');
            }
        }

        return redirect()->route('admin.content.oficinas.index')->with('notificacionerror','No se ha podido eliminar la oficina de su base de datos.');
        
    }


}
