<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;
use DB;
use App\Modelos\Provincia;
use App\Modelos\Lugar;
use App\Modelos\EventoTraslations;
use App\Modelos\Evento;
use App\Modelos\DiasAntelacionReserva;
use App\Modelos\Hotel;
use App\Modelos\Producto;

class eventoController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('hasPermission:eventos.create')->only(['create','store']);
        $this->middleware('hasPermission:eventos.destroy')->only(['destroy']);
        $this->middleware('hasPermission:eventos.index')->only(['index']);
        $this->middleware('hasPermission:eventos.edit')->only(['update','edit']);
    }


    public function index()
    {
        //
        $ruta = '/eventos/';
        $nombre = 'evento';


        $eventos = DB::table('eventos')->join('evento_traslations', 'eventos.id', "=", "evento_traslations.evento_id")
            ->select('eventos.id','eventos.fecha_inicio','eventos.fecha_fin','eventos.imagen', 'evento_traslations.nombre',
                'evento_traslations.descripcion','eventos.lugars_id')
            ->where('evento_traslations.idioma', '=', 'es')->get();



        return view('admin.eventos.index', ['eventos' => $eventos], compact('nombre','ruta'));

    }


    public function create()
    {
        //
        $ruta = '/eventos/';
        $nombre = 'evento';
        $provincias = Provincia::all();
        $hoteles = Hotel::all();
        $servicio_transporte = [
            ['value'=>'Activo','servico_transporte'=>'Activo'],
            ['value'=>'Inactivo','servico_transporte'=>'Inactivo'],
        ];

        // $dias_antelacion = DiasAntelacion::all();
        $lugares = DB::table('lugars')->join('lugar_traslations', 'lugars.id', "=", "lugar_traslations.lugars_id")
            ->select('lugar_traslations.nombre as nombre',
                'lugar_traslations.lugars_id')
            ->where('lugar_traslations.idioma', '=', 'es')->get();
        $dias_antelacion = DiasAntelacionReserva::all();
        //return view('admin.circuitos.create', ['provincias' => $provincias], compact('nombre','ruta','modalidades','duraciones','frecuencias','dias_semana','dias_antelacion'));
        return view('admin.eventos.create', ['provincias' => $provincias], compact('nombre','ruta','dias_antelacion','lugares','dias_antelacion','servicio_transporte','hoteles'));
    }


    public function store(Request $request)
    {
        $rules = [
            'provincia_id' => 'required|sometimes',
            'lugars_id' => 'required|sometimes',
            'servicio_transporte' => 'required',
            'dias_antelacions_id' => 'required|sometimes',
            'imagen' => 'required|mimes:jpg,png,gif,jpeg|min:1',

            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after:fecha_inicio',
            'cuota' => 'numeric|min:1',
            'convocatorias' => 'mimes: doc,docx|min:1',

            'programas' => 'mimes: doc,docx|min:1',

            //'precio_desde' => 'numeric|min:1',

            'nombre_es' => 'required|max:200',
            'itinerario_es' => 'max:200',
            //'descripcion_es' => 'max:500',

            'nombre_en' => 'max:200',
            'itinerario_en' => 'max:200',
            'descripcion_en' => 'max:500',

            'nombre_dt' => 'max:200',
            'itinerario_dt' => 'max:200',
            'descripcion_dt' => 'max:500',

            'nombre_fr' => 'max:200',
            'itinerario_fr' => 'max:200',
            'descripcion_fr' => 'max:500',

            'nombre_it' => 'max:200',
            'itinerario_it' => 'max:200',
            'descripcion_it' => 'max:500',

            'nombre_pt' => 'max:200',
            'itinerario_pt' => 'max:200',
            'descripcion_pt' => 'max:500',

        ];

        $messages =[

            'nombre_es.required' => 'El campo  nombre es obligatorio.',
            //'precio_desde.required' => 'El campo  precio desde es obligatorio.',
            'servicio_transporte.required' => 'El campo  servicio de transporte es obligatorio.',
            'nombre_es.unique' => 'Ya existe un evento con ese nombre.',
            'lugars_id.required' => 'El campo  lugar es obligatorio.',
            'cuota.required' => 'El campo  cuota es obligatorio.',
            'dias_antelacions_id.required' => 'El campo  días de antelación es obligatorio.',
            'provincias_id.required' => 'El campo  provincia es obligatorio.',
            'fecha_inicio.required' => 'El campo  fecha inicio es obligatorio.',
            'fecha_fin.required' => 'El campo  fecha fin es obligatorio.',
            'fecha_fin.after' => 'El campo fecha fin debe ser mayor o igual que el campo fecha inicio.',

            'imagen.mimes' => 'El archivo especificado no se pudo subir. Sólo se permiten archivos con las siguientes extensiones: png, gif, jpg, jpeg.',

            'imagen.min_width' => 'El archivo especificado no se pudo subir. La imagen es demasiado pequeña. Las dimensiones mínimas son (100x200).',
            'imagen.min_height' => 'El archivo especificado no se pudo subir. La imagen es demasiado pequeña. Las dimensiones mínimas son (100x200).',
            'imagen.max_width' => 'El archivo especificado no se pudo subir. La imagen es demasiado pequeña. Las dimensiones mínimas son (200x400).',
            'imagen.max_height' => 'El archivo especificado no se pudo subir. La imagen es demasiado pequeña. Las dimensiones mínimas son (200x400).',
            'imagen.min' => 'El archivo especificado no se pudo subir. El tamaño del archivo debe ser mayor que 0 byte.',

            'programas.mimes' => 'El archivo especificado no se pudo subir. Sólo se permiten archivos con las siguientes extensiones: docx, doc.',
            'programas.min' => 'El archivo especificado no se pudo subir. El tamaño del archivo debe ser mayor que 0 byte.',

            'convocatorias.mimes' => 'El archivo especificado no se pudo subir. Sólo se permiten archivos con las siguientes extensiones: docx,doc .',

            'convocatorias.min' => 'El archivo especificado no se pudo subir. El tamaño del archivo debe ser mayor que 0 byte.',


            'nombre_es.min' => 'El nombre de el circuito debe tener mínimo 5 caracteres.',

            'nombre_es.max' => 'Admite hasta 200 caracteres..',
            'nombre_en.max' => 'Admite hasta 200 caracteres. en.',
            'nombre_dt.max' => 'Admite hasta 200 caracteres. dt.',
            'nombre_fr.max' => 'Admite hasta 200 caracteres. fr.',
            'nombre_it.max' => 'Admite hasta 200 caracteres. it.',
            'nombre_pt.max' => 'Admite hasta 200 caracteres. pt.',

            'descripcion_es.max' => 'Admite hasta 500 caracteres..',
            'descripcion_en.max' => 'Admite hasta 500 caracteres. en.',
            'descripcion_dt.max' => 'Admite hasta 500 caracteres. dt.',
            'descripcion_fr.max' => 'Admite hasta 500 caracteres. fr.',
            'descripcion_it.max' => 'Admite hasta 500 caracteres. it.',
            'descripcion_pt.max' => 'Admite hasta 500 caracteres. pt.',
        ];

        $this->validate($request, $rules, $messages);
        $lang = ['es', 'en', 'dt', 'fr', 'it', 'pt' ];
        $namef = ['nombre_es', 'nombre_en', 'nombre_dt', 'nombre_fr', 'nombre_it', 'nombre_pt' ];

        $descriptionf = ['descripcion_es', 'descripcion_en', 'descripcion_dt', 'descripcion_fr', 'descripcion_it', 'descripcion_pt' ];
        $resumenf = ['resumen_es', 'resumen_en', 'resumen_dt', 'resumen_fr', 'resumen_it', 'resumen_pt' ];


        $evento = new Evento();
        $evento->image('imagen', $evento);
        $evento->fecha_inicio = $request->get('fecha_inicio');
        $evento->fecha_fin = $request->get('fecha_fin');
        $evento->cuota = $request->get('cuota');
        $evento->convocatoria('convocatorias', $evento);
        $evento->programa('programas', $evento);
        $evento->dias_antelacions_id = $request->get('dias_antelacions_id');
        $evento->lugars_id = $request->get('lugars_id');
        $evento->provincia_id = $request->get('provincia_id');
        $evento->servicio_transporte = $request->get('servicio_transporte');
        $oferta_especial = $request->get('oferta_especial');
        if ($oferta_especial)
        {
            $evento->oferta_especial = 1;
        }else{
            $evento->oferta_especial = 0;
        }

        if ($evento->save()) {
            //agregar en la tabla producto
            Producto::create([
                'producto_id' => $evento->id,
                'tipo_producto' => 'evento',
                'oferta_especial' => ($oferta_especial) ? 1 : 0,
                'provincia_id' => $evento->provincia_id
            ]);

//    		dd($evento);
            //return redirect()->route('eventos.index')->with('notificacion','El contenido del evento se ha registrado satisfactoriamente.');
            for ($i=0; $i < 6; $i++) {
                $traslations = new EventoTraslations();
                $traslations->nombre = $request->get($namef[$i]);
                $descripcion = $request->get($descriptionf[$i]);
                if ($descripcion)
                {
                    $traslations->descripcion = $request->get($descriptionf[$i]);
                }
                $resumen = $request->get($resumenf[$i]);
                if ($resumen)
                {
                    $traslations->resumen = $request->get($resumenf[$i]);
                }
                $traslations->idioma = $lang[$i];
                $traslations->evento_id = $evento->id;
                $traslations->save();

            }
            //dd($traslations);
            return redirect()->route('admin.content.eventos.index')->with('notificacion','El contenido del evento se ha registrado satisfactoriamente.');

        }
        return redirect()->route('admin.content.eventos.index')->with('notificacionerror','El contenido del evento no se ha podido registrar en su base de datos.');
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

        $ruta = '/eventos/';
        $nombre = 'evento';
        $evento = Evento::findOrFail($id);
        $provincias = Provincia::all();
        $serviciotransportes = [
            ['value'=>'Activo','servicotransporte'=>'Activo'],
            ['value'=>'Inactivo','servicotransporte'=>'Inactivo'],
        ];
        //dd($servicio_transporte);
        $dias_antelacion = DiasAntelacionReserva::all();

        $lugares = DB::table('lugars')->join('lugar_traslations', 'lugars.id', "=", "lugar_traslations.lugars_id")
            ->select('lugar_traslations.nombre as nombre',
                'lugar_traslations.lugars_id')
            ->where('lugar_traslations.idioma', '=', 'es')->get();

        $tras = EventoTraslations::where('evento_id', $evento->id)->get();
        //$oficinas = EventoTraslations::where('evento_traslations.idioma', '=', 'es')->get();
        $data = array();
        foreach ($tras as $item)
        {
            if($item['idioma']=='es')
            {
                $data['nombre_es'] = $item['nombre'];
                $data['descripcion_es'] = $item['descripcion'];
            }
            if($item['idioma']=='en')
            {
                $data['nombre_en']  = $item['nombre'];
                $data['descripcion_en'] = $item['descripcion'];
            }
            if($item['idioma']=='fr')
            {
                $data['nombre_fr'] = $item['nombre'];
                $data['descripcion_fr'] = $item['descripcion'];
            }
            if($item['idioma']=='dt')
            {
                $data ['nombre_dt']= $item['nombre'];
                $data['descripcion_dt'] = $item['descripcion'];
            }
            if($item['idioma']=='it')
            {
                $data ['nombre_it']= $item['nombre'];
                $data['descripcion_it'] = $item['descripcion'];
            }
            if($item['idioma']=='pt')
            {
                $data ['nombre_pt']= $item['nombre'];
                $data['descripcion_pt'] = $item['descripcion'];
            }

        }
        //dd($evento);
        return view('admin.eventos.edit',["evento"=>$evento, "provincias"=>$provincias], compact('nombre','ruta','lugares','dias_antelacion','data','serviciotransportes'));
    }


    public function update(Request $request, $id)
    {
        //
        $rules = [
            'provincia_id' => 'required|sometimes',
            'servicio_transporte' => 'required',
            'lugars_id' => 'required|sometimes',
            'dias_antelacions_id' => 'required|sometimes',
            'imagen' => 'mimes:jpg,png,gif,jpeg|min:1',

            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after:fecha_inicio',
            'cuota' => 'numeric|min:1',
            'convocatorias' => 'mimes: doc,docx|min:1',

            'programas' => 'mimes: doc,docx|min:1',

            //'precio_desde' => 'numeric|min:1',

            'nombre_es' => 'required|max:200',
            'itinerario_es' => 'max:200',
            'descripcion_es' => 'max:500',

            'nombre_en' => 'max:200',
            'itinerario_en' => 'max:200',
            'descripcion_en' => 'max:500',

            'nombre_dt' => 'max:200',
            'itinerario_dt' => 'max:200',
            'descripcion_dt' => 'max:500',

            'nombre_fr' => 'max:200',
            'itinerario_fr' => 'max:200',
            'descripcion_fr' => 'max:500',

            'nombre_it' => 'max:200',
            'itinerario_it' => 'max:200',
            'descripcion_it' => 'max:500',

            'nombre_pt' => 'max:200',
            'itinerario_pt' => 'max:200',
            'descripcion_pt' => 'max:500',

        ];

        $messages =[

            'nombre_es.required' => 'El campo  nombre es obligatorio.',
            //'precio_desde.required' => 'El campo  precio desde es obligatorio.',
            'servicio_transporte.required' => 'El campo  precio desde es obligatorio.',
            'nombre_es.unique' => 'Ya existe un evento con ese nombre.',
            'lugars_id.required' => 'El campo  lugar es obligatorio.',
            'cuota.required' => 'El campo  cuota es obligatorio.',
            'dias_antelacions_id.required' => 'El campo  días de antelación es obligatorio.',
            'provincias_id.required' => 'El campo  provincia es obligatorio.',
            'fecha_inicio.required' => 'El campo  fecha inicio es obligatorio.',
            'fecha_fin.required' => 'El campo  fecha fin es obligatorio.',
            'fecha_fin.after' => 'El campo fecha fin debe ser mayor o igual que el campo fecha inicio.',

            'imagen.mimes' => 'El archivo especificado no se pudo subir. Sólo se permiten archivos con las siguientes extensiones: png, gif, jpg, jpeg.',

            'imagen.min_width' => 'El archivo especificado no se pudo subir. La imagen es demasiado pequeña. Las dimensiones mínimas son (100x200).',
            'imagen.min_height' => 'El archivo especificado no se pudo subir. La imagen es demasiado pequeña. Las dimensiones mínimas son (100x200).',
            'imagen.max_width' => 'El archivo especificado no se pudo subir. La imagen es demasiado pequeña. Las dimensiones mínimas son (200x400).',
            'imagen.max_height' => 'El archivo especificado no se pudo subir. La imagen es demasiado pequeña. Las dimensiones mínimas son (200x400).',
            'imagen.min' => 'El archivo especificado no se pudo subir. El tamaño del archivo debe ser mayor que 0 byte.',

            'programas.mimes' => 'El archivo especificado no se pudo subir. Sólo se permiten archivos con las siguientes extensiones: docx, doc.',
            'programas.min' => 'El archivo especificado no se pudo subir. El tamaño del archivo debe ser mayor que 0 byte.',

            'convocatorias.mimes' => 'El archivo especificado no se pudo subir. Sólo se permiten archivos con las siguientes extensiones: docx,doc .',

            'convocatorias.min' => 'El archivo especificado no se pudo subir. El tamaño del archivo debe ser mayor que 0 byte.',


            'nombre_es.min' => 'El nombre de el circuito debe tener mínimo 5 caracteres.',

            'nombre_es.max' => 'Admite hasta 200 caracteres..',
            'nombre_en.max' => 'Admite hasta 200 caracteres. en.',
            'nombre_dt.max' => 'Admite hasta 200 caracteres. dt.',
            'nombre_fr.max' => 'Admite hasta 200 caracteres. fr.',
            'nombre_it.max' => 'Admite hasta 200 caracteres. it.',
            'nombre_pt.max' => 'Admite hasta 200 caracteres. pt.',

            'descripcion_es.max' => 'Admite hasta 500 caracteres..',
            'descripcion_en.max' => 'Admite hasta 500 caracteres. en.',
            'descripcion_dt.max' => 'Admite hasta 500 caracteres. dt.',
            'descripcion_fr.max' => 'Admite hasta 500 caracteres. fr.',
            'descripcion_it.max' => 'Admite hasta 500 caracteres. it.',
            'descripcion_pt.max' => 'Admite hasta 500 caracteres. pt.',
        ];
        $this->validate($request, $rules, $messages);
        $lang = ['es', 'en', 'dt', 'fr', 'it', 'pt' ];
        $namef = ['nombre_es', 'nombre_en', 'nombre_dt', 'nombre_fr', 'nombre_it', 'nombre_pt' ];
        $placef = ['lugar_es', 'lugar_en', 'lugar_dt', 'lugar_fr', 'lugar_it', 'lugar_pt' ];
        $itineraryf = ['itinerario_es', 'itinerario_en', 'itinerario_dt', 'itinerario_fr', 'itinerario_it', 'itinerario_pt' ];
        $descriptionf = ['descripcion_es', 'descripcion_en', 'descripcion_dt', 'descripcion_fr', 'descripcion_it', 'descripcion_pt' ];


        $evento = Evento::findOrFail($id);
        //$evento->duracion = $request->get('duracion');
        $evento->image('imagen', $evento);
        $evento->fecha_inicio = $request->get('fecha_inicio');
        $evento->fecha_fin = $request->get('fecha_fin');
        $evento->lugars_id = $request->get('lugars_id');
        //$evento->frecuencia = $request->get('frecuencia');
        //$evento->detalle('detalles', $evento);
        //$evento->mapa('mapa', $evento);
        //$evento->precio_desde = $request->get('precio_desde');
        //$evento->pax_min = $request->get('pax_min');
        $evento->dias_antelacions_id = $request->get('dias_antelacions_id');
        $evento->provincia_id = $request->get('provincia_id');
        $evento->servicio_transporte = $request->get('servicio_transporte');
        $oferta_especial = $request->get('oferta_especial');
        //dd($evento->id);
        if ($evento->update()) {
            //modificar en tabla producto
            $producto = Producto::where([['producto_id', $id],['tipo_producto','evento']])->first();
            if ($producto) {
                $producto->oferta_especial = ($oferta_especial) ? 1 : 0;
                $producto->provincia_id = $evento->provincia_id;
                $producto->save();
            } else {
                Producto::create([
                    'producto_id' => $evento->id,
                    'tipo_producto' => 'circuito',
                    'oferta_especial' => ($oferta_especial) ? 1 : 0,
                    'provincia_id' => $evento->provincia_id
                ]);
            }

            $traslations = EventoTraslations::where('evento_id', $evento->id)->get();

            foreach ($traslations as $value)
            {

                if ($value['idioma']==$lang[0])
                {

                    $value['nombre'] = $request->get($namef[0]);
                    //$value['lugar'] = $request->get($placef[0]);
                    //$value['itinerario'] = $request->get($itineraryf[0]);

                    $descripcion = $request->get($descriptionf[0]);
                    if ($descripcion)
                    {
                        $value['descripcion'] = $request->get($descriptionf[0]);
                    }
                    if ($value->update()) {
                        //$i = $i + 1;
                        //return redirect()->route('oficinas.index')->with('notificacion','El contenido de el evento se ha edi satisfactoriamente.');
                    }
                }
                if ($value['idioma']==$lang[1])
                {

                    $value['nombre'] = $request->get($namef[1]);
                    //$value['lugar'] = $request->get($placef[1]);
                    //$value['itinerario'] = $request->get($itineraryf[1]);

                    $descripcion = $request->get($descriptionf[1]);
                    if ($descripcion)
                    {
                        $value['descripcion'] = $request->get($descriptionf[1]);
                    }
                    if ($value->update()) {
                        //$i = $i + 1;
                        //return redirect()->route('oficinas.index')->with('notificacion','El contenido de el evento se ha edi satisfactoriamente.');
                    }
                    //$i = $i + 1;
                    //return redirect()->route('oficinas.index')->with('notificacion','El contenido de el evento se ha edi satisfactoriamente.');
                }
            }
            if ($value['idioma']==$lang[2])
            {

                $value['nombre'] = $request->get($namef[2]);
                // $value['lugar'] = $request->get($placef[2]);
                //$value['itinerario'] = $request->get($itineraryf[2]);

                $descripcion = $request->get($descriptionf[2]);
                if ($descripcion)
                {
                    $value['descripcion'] = $request->get($descriptionf[2]);
                }
                if ($value->update()) {
                    //$i = $i + 1;
                    //return redirect()->route('oficinas.index')->with('notificacion','El contenido de el evento se ha edi satisfactoriamente.');
                }
            }
            if ($value['idioma']==$lang[3])
            {

                $value['nombre'] = $request->get($namef[3]);
                // $value['lugar'] = $request->get($placef[3]);
                //$value['itinerario'] = $request->get($itineraryf[3]);

                $descripcion = $request->get($descriptionf[3]);
                if ($descripcion)
                {
                    $value['descripcion'] = $request->get($descriptionf[3]);
                }
                if ($value->update()) {
                    //$i = $i + 1;
                    //return redirect()->route('oficinas.index')->with('notificacion','El contenido de el evento se ha edi satisfactoriamente.');
                }
            }
            if ($value['idioma']==$lang[4])
            {

                $value['nombre'] = $request->get($namef[4]);
                //$value['lugar'] = $request->get($placef[4]);
                //$value['itinerario'] = $request->get($itineraryf[4]);

                $descripcion = $request->get($descriptionf[4]);
                if ($descripcion)
                {
                    $value['descripcion'] = $request->get($descriptionf[4]);
                }
                if ($value->update()) {
                    //$i = $i + 1;
                    //return redirect()->route('oficinas.index')->with('notificacion','El contenido de el evento se ha edi satisfactoriamente.');
                }
            }
            if ($value['idioma']==$lang[5])
            {

                $value['nombre'] = $request->get($namef[5]);
                //$value['lugar'] = $request->get($placef[5]);
                //$value['itinerario'] = $request->get($itineraryf[5]);

                $descripcion = $request->get($descriptionf[5]);
                if ($descripcion)
                {
                    $value['descripcion'] = $request->get($descriptionf[5]);
                }
                if ($value->update()) {
                    //$i = $i + 1;
                    return redirect()->route('admin.content.eventos.index')->with('notificacion','El contenido del evento se ha editado satisfactoriamente.');
                }
            }
        }
    }




    public function destroy($id)
    {
        //
        $evento = Evento::destroy($id);


        if ($evento==null) {
            return redirect()->route('admin.content.eventos.index')->with('notificacion','Se ha eliminado satisfactoriamente el evento.');
        }

        return redirect()->route('admin.content.eventos.index')->with('notificacionerror','No se ha podido eliminar el evento de su base de datos.');

    }
}
