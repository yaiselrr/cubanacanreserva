<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;
//use Illuminate\Support\Facades\Input;
//use Illuminate\Support\Facades\File;
use Input;
use Image;
use DB;

use App\Modelos\Carrusel;
use App\Modelos\CarruselTraslations;

class CarruselController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('hasPermission:carruseles.create')->only(['create','store']);
        $this->middleware('hasPermission:carruseles.destroy')->only(['destroy']);
        $this->middleware('hasPermission:carruseles.index')->only(['index']);
        $this->middleware('hasPermission:carruseles.edit')->only(['update','edit']);
    }


    public function index()
    {
        //
        $ruta = '/carruseles/';
        $nombre = 'CARRUSEL';
        

        $carruseles = DB::table('carrusels')
        ->join('carrusels_traslations', 'carrusels.id', "=", "carrusels_traslations.carrusels_id")
        ->select('carrusels.id','carrusels.imagen', 'carrusels_traslations.titulo', 'carrusels_traslations.idioma','carrusels_traslations.carrusels_id', 'carrusels.created_at', 'carrusels.updated_at')
        ->where('carrusels_traslations.idioma', '=', 'es')->get();
        


        return view('admin.carruseles.index', ['carruseles' => $carruseles], compact('nombre','ruta'));

    }

    
    public function create()
    {
        //
        $ruta = '/carruseles';
        $nombre = 'CARRUSEL';
        //$oficinas = OficinaTraslations::where('oficinas_traslations.idioma', '=', 'es')->get();
        return view('admin.carruseles.create', compact('nombre','ruta'));
    }

    
    public function store(Request $request)
    {
    	$rules = [
    		

            'imagen' => 'required|mimes:jpg,png,gif,jpeg|min:1|max:512|dimensions:min_width=1349,min_height=480',

            'nombre_es' => 'required|max:200|min:5',

            'nombre_en' => 'max:200',

            'nombre_dt' => 'max:200',

            'nombre_fr' => 'max:200',

            'nombre_it' => 'max:200',

            'nombre_pt' => 'max:200',
            
    	];

        $messages =[
            
            'imagen.mimes' => 'El archivo especificado no se pudo subir. Sólo se permiten archivos con las siguientes extensiones: png, gif, jpg, jpeg.',

            'imagen.min_width' => 'El archivo especificado no se pudo subir. La imagen es demasiado pequeña. Las dimensiones mínimas son (1349x480).',
            'imagen.min_height' => 'El archivo especificado no se pudo subir. La imagen es demasiado pequeña. Las dimensiones mínimas son (1349x480).',
            'imagen.min' => 'El archivo especificado no se pudo subir. El tamaño del archivo debe ser mayor que 0 byte.',
            'imagen.max' => 'El archivo especificado no se pudo subir. El tamaño del archivo debe ser menor que 512 Kbyte.',


            'nombre_es.required' => 'El campo  título es obligatorio.',

            'nombre_es.max' => 'Admite hasta 200 caracteres.',
            'nombre_en.max' => 'Admite hasta 200 caracteres en.',
            'nombre_dt.max' => 'Admite hasta 200 caracteres dt.',
            'nombre_fr.max' => 'Admite hasta 200 caracteres fr.',
            'nombre_it.max' => 'Admite hasta 200 caracteres it.',
            'nombre_pt.max' => 'Admite hasta 200 caracteres pt.',
        ];

    	$this->validate($request, $rules, $messages);
    	$lang = ['es', 'en', 'dt', 'fr', 'it', 'pt' ];
    	$namef = ['nombre_es', 'nombre_en', 'nombre_dt', 'nombre_fr', 'nombre_it', 'nombre_pt' ];
    	//$addre = ['direccion_es', 'direccion_en', 'direccion_dt', 'direccion_fr', 'direccion_it', 'direccion_pt' ];


    	$carrusel = new Carrusel();
        $carrusel->image('imagen', $carrusel);
        $carrusel->image2('imagen2', $carrusel);
        $carrusel->image3('imagen3', $carrusel);
        $carrusel->save();


    	if ($carrusel->save()) {
    		for ($i=0; $i < 6; $i++) { 
    			$traslations = new CarruselTraslations();    			
    			$traslations->titulo = $request->get($namef[$i]);
    			/*$direccion = $request->get($addre[$i]);
        		if ($direccion) 
        		{
            		$traslations->direccion = $request->get($addre[$i]);
        		}*/
        		$traslations->idioma = $lang[$i];
        		$traslations->carrusels_id = $carrusel->id;
        		$traslations->save();

    		}
    		return redirect()->route('admin.content.carruseles.index')->with('notificacion','El contenido del carrusel se ha registrado satisfactoriamente.');

    	}
        return redirect()->route('admin.content.carruseles.index')->with('notificacionerror','El contenido del carrusel no se ha podido registrar en su base de datos.');

    	
        
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
        $ruta = '/carruseles';
        $nombre = 'CARRUSEL';
        $carrusel = Carrusel::findOrFail($id);
        $tras = CarruselTraslations::where('carrusels_id', $carrusel->id)->get();
        //$oficinas = OficinaTraslations::where('oficinas_traslations.idioma', '=', 'es')->get();
        $data = array();
        foreach ($tras as $item)
        {
            if($item['idioma']=='es')
            {
                $data['nombre_es'] = $item['titulo'];
                //$data['direccion_es'] = $item['direccion'];
            }
            if($item['idioma']=='en')
            {
                $data['nombre_en']  = $item['titulo'];
               // $data['direccion_en'] = $item['direccion'];
            }
            if($item['idioma']=='fr')
            {
                $data['nombre_fr'] = $item['titulo'];
                //$data['direccion_fr'] = $item['direccion'];
            }
            if($item['idioma']=='dt')
            {
                $data ['nombre_dt']= $item['titulo'];
               // $data['direccion_dt'] = $item['direccion'];
            }
            if($item['idioma']=='it')
            {
                $data ['nombre_it']= $item['titulo'];
                //$data['direccion_it'] = $item['direccion'];
            }
            if($item['idioma']=='pt')
            {
                $data ['nombre_pt']= $item['titulo'];
                //$data['direccion_pt'] = $item['direccion'];
            }

        }
        //dd($data);
        return view('admin.carruseles.edit',["carrusel"=>$carrusel, "data"=>$data], compact('nombre','ruta'));
    }

    
    public function update(Request $request, $id)
    {
        //
        $rules = [
            'imagen' => 'required|mimes:jpg,png,gif,jpeg|min:1|max:512|dimensions:min_width=1349,min_height=480',

            'nombre_es' => 'required|max:200|min:5',

            'nombre_en' => 'max:200',

            'nombre_dt' => 'max:200',

            'nombre_fr' => 'max:200',

            'nombre_it' => 'max:200',

            'nombre_pt' => 'max:200',
            
        ];

        $messages =[
            
            'imagen.mimes' => 'El archivo especificado no se pudo subir. Sólo se permiten archivos con las siguientes extensiones: png, gif, jpg, jpeg.',

            'imagen.min_width' => 'El archivo especificado no se pudo subir. La imagen es demasiado pequeña. Las dimensiones mínimas son (1349x480).',
            'imagen.min_height' => 'El archivo especificado no se pudo subir. La imagen es demasiado pequeña. Las dimensiones mínimas son (1349x480).',
            'imagen.min' => 'El archivo especificado no se pudo subir. El tamaño del archivo debe ser mayor que 0 byte.',
            'imagen.max' => 'El archivo especificado no se pudo subir. El tamaño del archivo debe ser menor que 512 Kbyte.',


            'nombre_es.required' => 'El campo  título es obligatorio.',

            'nombre_es.max' => 'Admite hasta 200 caracteres.',
            'nombre_en.max' => 'Admite hasta 200 caracteres en.',
            'nombre_dt.max' => 'Admite hasta 200 caracteres dt.',
            'nombre_fr.max' => 'Admite hasta 200 caracteres fr.',
            'nombre_it.max' => 'Admite hasta 200 caracteres it.',
            'nombre_pt.max' => 'Admite hasta 200 caracteres pt.',
        ];
        $this->validate($request, $rules, $messages);
    	$lang = ['es', 'en', 'dt', 'fr', 'it', 'pt' ];
    	$namef = ['nombre_es', 'nombre_en', 'nombre_dt', 'nombre_fr', 'nombre_it', 'nombre_pt' ];
    	$addre = ['direccion_es', 'direccion_en', 'direccion_dt', 'direccion_fr', 'direccion_it', 'direccion_pt' ];

        $carrusel = Carrusel::findOrFail($id);
        //$empleado = Empleado::findOrFail($id);

        //Storage::delete('public/'.$empleado->foto);
        $carrusel->image('imagen', $carrusel);
        $carrusel->update();

        
    	
    $traslations = CarruselTraslations::where('carrusels_id', $carrusel->id)->get(); 
    $i= 0;
    foreach ($traslations as $value) 
    {
        
            if ($value['idioma']==$lang[0])
            {

            $value['titulo'] = $request->get($namef[0]);

            
            if ($value->update()) {
                //$i = $i + 1;
                //return redirect()->route('oficinas.index')->with('notificacion','El contenido de la oficina se ha edi satisfactoriamente.');
            }
        }
        if ($value['idioma']==$lang[1])
            {

            $value['titulo'] = $request->get($namef[1]);

            
            if ($value->update()) {
                //$i = $i + 1;
                //return redirect()->route('oficinas.index')->with('notificacion','El contenido de la oficina se ha edi satisfactoriamente.');
            }
        }
        if ($value['idioma']==$lang[2])
            {

            $value['titulo'] = $request->get($namef[2]);

            
            if ($value->update()) {
                //$i = $i + 1;
                //return redirect()->route('oficinas.index')->with('notificacion','El contenido de la oficina se ha edi satisfactoriamente.');
            }
        }
        if ($value['idioma']==$lang[3])
            {

            $value['titulo'] = $request->get($namef[3]);

            
            if ($value->update()) {
                //$i = $i + 1;
                //return redirect()->route('oficinas.index')->with('notificacion','El contenido de la oficina se ha edi satisfactoriamente.');
            }
        }if ($value['idioma']==$lang[4])
            {

            $value['titulo'] = $request->get($namef[4]);

            
            if ($value->update()) {
                //$i = $i + 1;
                //return redirect()->route('oficinas.index')->with('notificacion','El contenido de la oficina se ha edi satisfactoriamente.');
            }
        }if ($value['idioma']==$lang[5])
            {

            $value['titulo'] = $request->get($namef[5]);

            
            if ($value->update()) {
                //$i = $i + 1;
                return redirect()->route('admin.content.carruseles.index')->with('notificacion','El contenido del carrusel se ha editado satisfactoriamente.');
            }
        }
        
        
       // return redirect()->route('oficinas.index')->with('notificacionerror','El contenido editado de la oficina no se ha podido guardar en su base de datos.');

        
    }

    }

    
    public function destroy($id)
    {
        //
        $carrusel = Carrusel::destroy($id);


        if ($carrusel==null) {
            return redirect()->route('admin.content.carruseles.index')->with('notificacion','Se ha eliminado satisfactoriamente el carrusel.');
        }

        return redirect()->route('admin.content.carruseles.index')->with('notificacionerror','No se ha podido eliminar el carrusel de su base de datos.');
        
    }

}
