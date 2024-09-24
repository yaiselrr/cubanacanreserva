<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;
use DB;
use App\Modelos\Oficina;
use App\Modelos\OficinaTraslations;
use App\Modelos\Buro;
use App\Modelos\BuroTraslations;

class BuroController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('hasPermission:buros.create')->only(['create','store']);
        $this->middleware('hasPermission:buros.destroy')->only(['destroy']);
        $this->middleware('hasPermission:buros.index')->only(['index']);
        $this->middleware('hasPermission:buros.edit')->only(['update','edit']);
    }


    public function index()
    {
        //
        $ruta = '/buros/';
        $nombre = 'BURO';
        

        $buros = DB::table('buros')
            ->join('buros_traslations', 'buros.id', "=", "buros_traslations.buro_id")
            ->select('buros.id', 'buros_traslations.nombre', 'buros_traslations.direccion','buros.telefono','buros.oficina_id', 'buros.created_at', 'buros.updated_at')
            ->where('buros_traslations.idioma', '=', 'es')->get();
        


        return view('admin.buros.index', ['buros' => $buros], compact('nombre','ruta'));
        /*$provincias = Provincia::all();
        return view('provincias.index', compact('provincias'));

       /* $usuarios = DB::table('users')->orderby('id','desc')->paginate(10);
        //dd($provincias);
        return view('backend.usuarios.index', ['usuarios' => $usuarios]);*/

    }

    
    public function create()
    {
        //
        $ruta = '/buros';
        $nombre = 'BURO';
        $oficinas = OficinaTraslations::where('oficinas_traslations.idioma', '=', 'es')->get();
        return view('admin.buros.create', ['oficinas' => $oficinas], compact('nombre','ruta'));
    }

    
    public function store(Request $request)
    {
    	$rules = [
    		'oficina_id' => 'required|sometimes',

    		'telefono' => 'required',

    		'nombre_es' => 'required|max:200',
            'direccion_es' => 'required|max:500',

            'nombre_en' => 'max:200',
            'direccion_en' => 'max:500',

            'nombre_dt' => 'max:200',
            'direccion_dt' => 'max:500',

            'nombre_fr' => 'max:200',
            'direccionfr' => 'max:500',

            'nombre_it' => 'max:200',
            'direccion_it' => 'max:500',

            'nombre_pt' => 'max:200',
            'direccion_pt' => 'max:500',
            
    	];

        $messages =[
            
            'oficina_id.required' => 'El campo  oficina es obligatorio.',

            'telefono.required' => 'Es necesario ingresar un teléfono para la oficina.',

            'nombre_es.required' => 'El campo  nombre es obligatorio.',

            'telefono.numeric' => 'El teléfono solo puede ser números.',

            'telefono.min' => 'Mínimo 8 caracteres.',

            'nombre_es.min' => 'El nombre debe tener mínimo 5 caracteres.',

            'telefono.max' => 'Admite hasta 8 caracteres..',

            'nombre_es.max' => 'Admite hasta 200 caracteres.',
            'nombre_en.max' => 'Admite hasta 200 caracteres. en.',
            'nombre_dt.max' => 'Admite hasta 200 caracteres. dt.',
            'nombre_fr.max' => 'Admite hasta 200 caracteres. fr.',
            'nombre_it.max' => 'Admite hasta 200 caracteres. it.',
            'nombre_pt.max' => 'Admite hasta 200 caracteres. pt.',

            'direccion_es.max' => 'Admite hasta 500 caracteres..',
            'direccion_en.max' => 'Admite hasta 500 caracteres. en.',
            'direccion_dt.max' => 'Admite hasta 500 caracteres. dt.',
            'direccion_fr.max' => 'Admite hasta 500 caracteres. fr.',
            'direccion_it.max' => 'Admite hasta 500 caracteres. it.',
            'direccion_pt.max' => 'Admite hasta 500 caracteres. pt.',

            'telefono.unique' => 'El teléfono no puede estar repetido.',
        ];

    	$this->validate($request, $rules, $messages);
    	$lang = ['es', 'en', 'dt', 'fr', 'it', 'pt' ];
    	$namef = ['nombre_es', 'nombre_en', 'nombre_dt', 'nombre_fr', 'nombre_it', 'nombre_pt' ];
    	$addre = ['direccion_es', 'direccion_en', 'direccion_dt', 'direccion_fr', 'direccion_it', 'direccion_pt' ];


    	$buro = new Buro();
    	$buro->telefono = $request->get('telefono');
    	$buro->oficina_id = $request->get('oficina_id');

    	if ($buro->save()) {
    		for ($i=0; $i < 6; $i++) { 
    			$traslations = new BuroTraslations();    			
    			$traslations->nombre = $request->get($namef[$i]);
    			$direccion = $request->get($addre[$i]);
        		if ($direccion) 
        		{
            		$traslations->direccion = $request->get($addre[$i]);
        		}
        		$traslations->idioma = $lang[$i];
        		$traslations->buro_id = $buro->id;
        		$traslations->save();

    		}
    		return redirect()->route('admin.content.buros.index')->with('notificacion','El contenido del buró se ha registrado satisfactoriamente.');

    	}
        return redirect()->route('admin.content.buros.index')->with('notificacionerror','El contenido del buró no se ha podido registrar en su base de datos.');

    	
        
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
        
        $ruta = '/buros';
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
        return view('admin.buros.edit',["buro"=>$buro, "data"=>$data, "oficinas"=>$oficinas], compact('nombre','ruta'));
    }

    
    public function update(Request $request, $id)
    {
        //
        $rules = [

            'oficina_id' => 'required|sometimes',

            'telefono' => 'required',

            'nombre_es' => 'required|max:200',
            'direccion_es' => 'required|max:500',

            'nombre_en' => 'max:200',
            'direccion_en' => 'max:500',

            'nombre_dt' => 'max:200',
            'direccion_dt' => 'max:500',

            'nombre_fr' => 'max:200',
            'direccionfr' => 'max:500',

            'nombre_it' => 'max:200',
            'direccion_it' => 'max:500',

            'nombre_pt' => 'max:200',
            'direccion_pt' => 'max:500',
            
        ];

        $messages =[
            'oficina_id.required' => 'El campo  oficina es obligatorio.',

            'telefono.required' => 'Es necesario ingresar un teléfono para la oficina.',

            'nombre_es.required' => 'El campo  nombre es obligatorio.',

            'telefono.numeric' => 'El teléfono solo puede ser números.',

            'telefono.min' => 'Mínimo 8 caracteres.',

            'nombre_es.min' => 'El nombre debe tener mínimo 5 caracteres.',

            'telefono.max' => 'Admite hasta 8 caracteres..',

            'nombre_es.max' => 'Admite hasta 200 caracteres.',
            'nombre_en.max' => 'Admite hasta 200 caracteres. en.',
            'nombre_dt.max' => 'Admite hasta 200 caracteres. dt.',
            'nombre_fr.max' => 'Admite hasta 200 caracteres. fr.',
            'nombre_it.max' => 'Admite hasta 200 caracteres. it.',
            'nombre_pt.max' => 'Admite hasta 200 caracteres. pt.',

            'direccion_es.max' => 'Admite hasta 500 caracteres..',
            'direccion_en.max' => 'Admite hasta 500 caracteres. en.',
            'direccion_dt.max' => 'Admite hasta 500 caracteres. dt.',
            'direccion_fr.max' => 'Admite hasta 500 caracteres. fr.',
            'direccion_it.max' => 'Admite hasta 500 caracteres. it.',
            'direccion_pt.max' => 'Admite hasta 500 caracteres. pt.',

            'telefono.unique' => 'El teléfono no puede estar repetido.',
        ];
        $this->validate($request, $rules, $messages);
    	$lang = ['es', 'en', 'dt', 'fr', 'it', 'pt' ];
    	$namef = ['nombre_ess', 'nombre_en', 'nombre_dt', 'nombre_fr', 'nombre_it', 'nombre_pt' ];
    	$addre = ['direccion_es', 'direccion_en', 'direccion_dt', 'direccion_fr', 'direccion_it', 'direccion_pt' ];

        $buro = Buro::findOrFail($id);
        $buro->telefono = $request->get('telefono');
        $buro->oficina_id = $request->get('oficina_id');
        $buro->update();

        
    	
    $traslations = BuroTraslations::where('buro_id', $buro->id)->get(); 
    $i= 0;
    var_dump($traslations);
    die();
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
                return redirect()->route('admin.content.buros.index')->with('notificacion','El contenido del buró se ha editado satisfactoriamente.');
            }
        }
        
        
       // return redirect()->route('oficinas.index')->with('notificacionerror','El contenido editado de la oficina no se ha podido guardar en su base de datos.');

        
    }

    }

    
    public function destroy($id)
    {
        //
        $buro = Buro::destroy($id);

        if ($buro==null) {
            return redirect()->route('admin.content.buros.index')->with('notificacion','Se ha eliminado satisfactoriamente el buró.');
        }

        return redirect()->route('admin.content.oficinas.index')->with('notificacionerror','No se ha podido eliminar el buró de su base de datos.');
        
    }


}
