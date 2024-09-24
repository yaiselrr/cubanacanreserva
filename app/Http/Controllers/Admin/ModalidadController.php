<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Modelos\Modalidad;
use App\Modelos\ModalidadTraslation;

use Input;
use Image;
use DB;

class ModalidadController extends Controller
{
    //
    //
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        //
        $ruta = '/modalidad/';
        $nombre = 'MODALIDAD';

        $modalidad = DB::table('modalidads')
        ->join('modalidad_traslations', 'modalidads.id', "=", "modalidad_traslations.modalidads_id")
        ->select('modalidads.id','modalidad_traslations.nombre as nombre', 'modalidad_traslations.idioma')
        ->where('modalidad_traslations.idioma', '=', 'es')->get();
        


        return view('admin.modalidad.index', ['modalidad' => $modalidad], compact('nombre','ruta'));

    }

    
    public function create()
    {
        $ruta = '/modalidad/';
        $nombre = 'MODALIDAD';
        //$oficinas = OficinaTraslations::where('oficinas_traslations.idioma', '=', 'es')->get();
        return view('admin.modalidad.create', compact('nombre','ruta'));
    }

    
    public function store(Request $request)
    {
    	$rules = [

    		'nombre_es' => 'required|string|max:120|min:5',

            'nombre_en' => 'max:120',

            'nombre_dt' => 'max:120',

            'nombre_fr' => 'max:120',

            'nombre_it' => 'max:120',

            'nombre_pt' => 'max:120',
            
    	];

        $messages =[
            //'oficina_id.required' => 'Es necesario seleccionarl blog a la cual pertencece el buro.',

            //'telefono.required' => 'Es necesario ingresar un teléfono paral blog.',
            'imagen.mimes' => 'Solo se permiten archivos con los formatos jpg,png,gif,jpeg.',

            'nombre_es.required' => 'Es necesario ingresar un título para el blog.',
            'nombre_en.required' => 'Es necesario ingresar un título para el blog en.',
            'nombre_dt.required' => 'Es necesario ingresar un título para el blog dt.',
            'nombre_fr.required' => 'Es necesario ingresar un título para el blog fr.',
            'nombre_it.required' => 'Es necesario ingresar un título para la blog it.',
            'nombre_pt.required' => 'Es necesario ingresar un título para la blog pt.',

            //'telefono.numeric' => 'El teléfono del blog solo puede ser números.',

            'nombre_es.alpha' => 'El nombre de la blog solo puede ser letras.',
            'nombre_en.alpha' => 'El nombre de la blog solo puede ser letras en.',
            'nombre_dt.alpha' => 'El nombre de la blog solo puede ser letras dt.',
            'nombre_fr.alpha' => 'El nombre de la blog solo puede ser letras fr.',
            'nombre_it.alpha' => 'El nombre de la blog solo puede ser letras it.',
            'nombre_pt.alpha' => 'El nombre de la blog solo puede ser letras pt.',

            'telefono.min' => 'El teléfono del blog debe tener mínimo 8 caracteres.',

            'nombre_es.min' => 'El nombre del blog debe tener mínimo 5 caracteres.',
            'nombre_en.min' => 'El nombre del blog debe tener mínimo 5 caracteres en.',
            'nombre_dt.min' => 'El nombre del blog debe tener mínimo 5 caracteres dt.',
            'nombre_fr.min' => 'El nombre del blog debe tener mínimo 5 caracteres fr.',
            'nombre_it.min' => 'El nombre del blog debe tener mínimo 5 caracteres it.',
            'nombre_pt.min' => 'El nombre del blog debe tener mínimo 5 caracteres pt.',
            'imagen.min' => 'El tamañi mínimo de la imagen debe ser 1 Kb.',


            'telefono.max' => 'El teléfono del blog debe tener máximo 8 caracteres.',

            'imagen.min' => 'El tamaño máximo de la imagen es hasta 512 Kb.',

            'nombre_es.max' => 'El nombre del blog debe tener máximo 200 caracteres.',
            'nombre_en.max' => 'El nombre del blog debe tener máximo 200 caracteres en.',
            'nombre_dt.max' => 'El nombre del blog debe tener máximo 200 caracteres dt.',
            'nombre_fr.max' => 'El nombre del blog debe tener máximo 200 caracteres fr.',
            'nombre_it.max' => 'El nombre del blog debe tener máximo 200 caracteres it.',
            'nombre_pt.max' => 'El nombre del blog debe tener máximo 200 caracteres pt.',

            'descripcion_es.max' => 'la dirección del blog debe tener máximo 500 caracteres.',
            'descripcion_en.max' => 'la dirección del blog debe tener máximo 500 caracteres en.',
            'descripcion_dt.max' => 'la dirección del blog debe tener máximo 500 caracteres dt.',
            'descripcion_fr.max' => 'la dirección del blog debe tener máximo 500 caracteres fr.',
            'descripcion_it.max' => 'la dirección del blog debe tener máximo 500 caracteres it.',
            'descripcion_pt.max' => 'la dirección del blog debe tener máximo 500 caracteres pt.',

            'telefono.unique' => 'El teléfono del blog no puede estar repetido.',
        ];

    	$this->validate($request, $rules, $messages);
    	$lang = ['es', 'en', 'dt', 'fr', 'it', 'pt' ];
    	$namef = ['nombre_es', 'nombre_en', 'nombre_dt', 'nombre_fr', 'nombre_it', 'nombre_pt' ];


    	$modalidad = new Modalidad();

    	if ($modalidad->save()) {
            for ($i=0; $i < 6; $i++) { 
                $traslations = new ModalidadTraslation();               
                $traslations->nombre = $request->get($namef[$i]);
                $traslations->idioma = $lang[$i];
                $traslations->modalidads_id = $modalidad->id;
                $traslations->save();

            }
            return redirect()->route('admin.nomenclator.modalidad.index')->with('notificacion','El contenido la modalidad se ha registrado satisfactoriamente.');

        }
        return redirect()->route('admin.nomenclator.modalidad.index')->with('notificacionerror','El contenido la modalidad no se ha podido registrar en su base de datos.');

    	
        
    }

    
    public function show($id)
    {
        
    }

   
    public function edit($id)
    {
        
        $ruta = '/modalidad/';
        $nombre = 'MODALIDAD';
        $modalidad = Modalidad::findOrFail($id);
        $tras = ModalidadTraslation::where('modalidads_id', $modalidad->id)->get();

        $data = array();
        foreach ($tras as $item)
        {
            if($item['idioma']=='es')
            {
                $data['nombre_es'] = $item['nombre'];
            }
            if($item['idioma']=='en')
            {
                $data['nombre_en']  = $item['nombre'];
            }
            if($item['idioma']=='fr')
            {
                $data['nombre_fr'] = $item['nombre'];
            }
            if($item['idioma']=='dt')
            {
                $data ['nombre_dt']= $item['nombre'];
            }
            if($item['idioma']=='it')
            {
                $data ['nombre_it']= $item['nombre'];
            }
            if($item['idioma']=='pt')
            {
                $data ['nombre_pt']= $item['nombre'];
            }

        }
        //dd($data);
        return view('admin.modalidad.edit',["modalidad"=>$modalidad, "data"=>$data], compact('nombre','ruta'));
    }

    
    public function update(Request $request, $id)
    {
        //
        $rules = [

    		'nombre_es' => 'required|string|max:120|min:5',

            'nombre_en' => 'max:120',

            'nombre_dt' => 'max:120',

            'nombre_fr' => 'max:120',

            'nombre_it' => 'max:120',

            'nombre_pt' => 'max:120',
            
    	];

        $messages =[
            //'oficina_id.required' => 'Es necesario seleccionarl blog a la cual pertencece el buro.',

            //'telefono.required' => 'Es necesario ingresar un teléfono paral blog.',
            'imagen.mimes' => 'Solo se permiten archivos con los formatos jpg,png,gif,jpeg.',

            'nombre_es.required' => 'Es necesario ingresar un título para el blog.',
            'nombre_en.required' => 'Es necesario ingresar un título para el blog en.',
            'nombre_dt.required' => 'Es necesario ingresar un título para el blog dt.',
            'nombre_fr.required' => 'Es necesario ingresar un título para el blog fr.',
            'nombre_it.required' => 'Es necesario ingresar un título para la blog it.',
            'nombre_pt.required' => 'Es necesario ingresar un título para la blog pt.',

            //'telefono.numeric' => 'El teléfono del blog solo puede ser números.',

            'nombre_es.alpha' => 'El nombre de la blog solo puede ser letras.',
            'nombre_en.alpha' => 'El nombre de la blog solo puede ser letras en.',
            'nombre_dt.alpha' => 'El nombre de la blog solo puede ser letras dt.',
            'nombre_fr.alpha' => 'El nombre de la blog solo puede ser letras fr.',
            'nombre_it.alpha' => 'El nombre de la blog solo puede ser letras it.',
            'nombre_pt.alpha' => 'El nombre de la blog solo puede ser letras pt.',

            'telefono.min' => 'El teléfono del blog debe tener mínimo 8 caracteres.',

            'nombre_es.min' => 'El nombre del blog debe tener mínimo 5 caracteres.',
            'nombre_en.min' => 'El nombre del blog debe tener mínimo 5 caracteres en.',
            'nombre_dt.min' => 'El nombre del blog debe tener mínimo 5 caracteres dt.',
            'nombre_fr.min' => 'El nombre del blog debe tener mínimo 5 caracteres fr.',
            'nombre_it.min' => 'El nombre del blog debe tener mínimo 5 caracteres it.',
            'nombre_pt.min' => 'El nombre del blog debe tener mínimo 5 caracteres pt.',
            'imagen.min' => 'El tamañi mínimo de la imagen debe ser 1 Kb.',


            'telefono.max' => 'El teléfono del blog debe tener máximo 8 caracteres.',

            'imagen.min' => 'El tamaño máximo de la imagen es hasta 512 Kb.',

            'nombre_es.max' => 'El nombre del blog debe tener máximo 200 caracteres.',
            'nombre_en.max' => 'El nombre del blog debe tener máximo 200 caracteres en.',
            'nombre_dt.max' => 'El nombre del blog debe tener máximo 200 caracteres dt.',
            'nombre_fr.max' => 'El nombre del blog debe tener máximo 200 caracteres fr.',
            'nombre_it.max' => 'El nombre del blog debe tener máximo 200 caracteres it.',
            'nombre_pt.max' => 'El nombre del blog debe tener máximo 200 caracteres pt.',

            'descripcion_es.max' => 'la dirección del blog debe tener máximo 500 caracteres.',
            'descripcion_en.max' => 'la dirección del blog debe tener máximo 500 caracteres en.',
            'descripcion_dt.max' => 'la dirección del blog debe tener máximo 500 caracteres dt.',
            'descripcion_fr.max' => 'la dirección del blog debe tener máximo 500 caracteres fr.',
            'descripcion_it.max' => 'la dirección del blog debe tener máximo 500 caracteres it.',
            'descripcion_pt.max' => 'la dirección del blog debe tener máximo 500 caracteres pt.',

            'telefono.unique' => 'El teléfono del blog no puede estar repetido.',
        ];
        $this->validate($request, $rules, $messages);
    	$lang = ['es', 'en', 'dt', 'fr', 'it', 'pt' ];
    	$namef = ['nombre_es', 'nombre_en', 'nombre_dt', 'nombre_fr', 'nombre_it', 'nombre_pt' ];

        $modalidad = Modalidad::findOrFail($id);
        $modalidad->update();

        
    	
    $traslations = ModalidadTraslation::where('modalidads_id', $modalidad->id)->get(); 
    $i= 0;
    foreach ($traslations as $value) 
    {
        
            if ($value['idioma']==$lang[0])
            {

            $value['nombre'] = $request->get($namef[0]);
            $value->update();
        }
        if ($value['idioma']==$lang[1])
            {

            $value['nombre'] = $request->get($namef[1]);
            $value->update();
        }
        if ($value['idioma']==$lang[2])
            {

            $value['nombre'] = $request->get($namef[2]);
            $value->update();
        }
        if ($value['idioma']==$lang[3])
            {

            $value['nombre'] = $request->get($namef[3]);
            $value->update();
        }if ($value['idioma']==$lang[4])
            {

            $value['nombre'] = $request->get($namef[4]);
            $value->update();
        }if ($value['idioma']==$lang[5])
            {

            $value['nombre'] = $request->get($namef[5]);

            if ($value->update()) {
                return redirect()->route('admin.nomenclator.modalidad.index')->with('notificacion','El contenido del modalidad se ha editado satisfactoriamente.');
            }
        }
        
        
        return redirect()->route('admin.nomenclator.modalidad.index')->with('notificacionerror','El contenido editado del modalidad no se ha podido guardar en su base de datos.');

        
    }

    }

    
    public function destroy($id)
    {
        //
        $modalidad = Modalidad::destroy($id);


        if ($modalidad==null) {
            return redirect()->route('admin.nomenclator.modalidad.index')->with('notificacion','Se ha eliminado satisfactoriamente el modalidad.');
        }

        return redirect()->route('admin.nomenclator.modalidad.index')->with('notificacionerror','No se ha podido eliminar el modalidad de su base de datos.');
        
    }
}
