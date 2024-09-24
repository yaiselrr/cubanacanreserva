<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;
use DB;
use App\Modelos\Provincia;
use App\Modelos\Modalidad;
use App\Modelos\ModalidadTraslation;
use App\Modelos\Frecuencia;
use App\Modelos\Duracion;
use App\Modelos\DiasSemana;
use App\Modelos\DiasAntelacionReserva;
use App\Modelos\Mapa;
use App\Modelos\CircuitoTraslations;
use App\Modelos\Circuito;
use App\Modelos\Producto;


class CircuitoController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('hasPermission:circuitos.create')->only(['create', 'store']);
        $this->middleware('hasPermission:circuitos.destroy')->only(['destroy']);
        $this->middleware('hasPermission:circuitos.index')->only(['index']);
        $this->middleware('hasPermission:circuitos.edit')->only(['update', 'edit']);
    }


    public function index()
    {
        //
        $ruta = '/circuitos/';
        $nombre = 'CIRCUITO';


        $circuitos = DB::table('circuitos')->join('circuitos_traslations', 'circuitos.id', "=", "circuitos_traslations.circuitos_id")
            ->select('circuitos.imagen', 'circuitos.id', 'circuitos.precio_desde', 'circuitos_traslations.nombre as nombre',
                'circuitos.modalidads_id', 'circuitos_traslations.itinerario', 'circuitos.duracions_id')
            ->where('circuitos_traslations.idioma', '=', 'es')->get();
        $modalidades = ModalidadTraslation::all();


        return view('admin.circuitos.index', ['circuitos' => $circuitos], compact('nombre', 'ruta','modalidades'));
        /*$provincias = Provincia::all();
        return view('provincias.index', compact('provincias'));

       /* $usuarios = DB::table('users')->orderby('id','desc')->paginate(10);
        //dd($provincias);
        return view('backend.usuarios.index', ['usuarios' => $usuarios]);*/

    }


    public function create()
    {
        //
        $ruta = '/circuitos/';
        $nombre = 'CIRCUITO';
        $provincias = Provincia::all();
        $modalidades = DB::table('modalidads')->join('modalidad_traslations', 'modalidads.id', "=", "modalidad_traslations.modalidads_id")
            ->select('modalidad_traslations.nombre as nombre',
                'modalidad_traslations.modalidads_id')
            ->where('modalidad_traslations.idioma', '=', 'es')->get();
        $duraciones = Duracion::all();
        $dias_semana = DB::table('dias_semanas')->join('dias_semana_traslations', 'dias_semanas.id', "=", "dias_semana_traslations.dias_semanas_id")
            ->select('dias_semana_traslations.diassemana as nombre',
                'dias_semana_traslations.dias_semanas_id')
            ->where('dias_semana_traslations.locale', '=', 'es')->get();

        $frecuencias = DB::table('frecuencias')->join('frecuencia_traslations', 'frecuencias.id', "=", "frecuencia_traslations.frecuencias_id")
            ->select('frecuencia_traslations.frecuencia as nombre',
                'frecuencia_traslations.frecuencias_id')
            ->where('frecuencia_traslations.locale', '=', 'es')->get();
        //dd($frecuencias);
        $dias_antelacion = DiasAntelacionReserva::all();
        return view('admin.circuitos.create', ['provincias' => $provincias], compact('nombre', 'ruta', 'modalidades', 'duraciones', 'frecuencias', 'dias_semana', 'dias_antelacion'));
    }


    public function store(Request $request)
    {
        $rules = [
            'provincias_id' => 'required|sometimes',
            'duracions_id' => 'required|sometimes',
            'frecuencias_id' => 'required|sometimes',
            'modalidads_id' => 'required|sometimes',
            'dias_semanas_id' => 'required|sometimes',
            'dias_antelacions_id' => 'required|sometimes',
            'imagen' => 'mimes:jpg,png,gif,jpeg|min:1',

            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after:fecha_inicio',
            'detalles' => 'mimes:doc,docx|min:1',
            'mapa' => 'mimes:jpg,png,gif,jpeg|min:1',
            'precio_desde' => 'required|numeric|min:1',
            'pax_min' => 'required|numeric|min:1',
            'esta_activo' => 'in:0,1',

            'nombre_es' => 'required|max:200',
            'itinerario_es' => 'required|max:200',
            'descripcion_es' => 'required|max:500',

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

        $messages = [


            'nombre_es.required' => 'Es necesario ingresar un nombre para el circuito.',
            'nombre_en.required' => 'Es necesario ingresar un nombre para el circuito en.',
            'nombre_dt.required' => 'Es necesario ingresar un nombre para el circuito dt.',
            'nombre_fr.required' => 'Es necesario ingresar un nombre para el circuito fr.',
            'nombre_it.required' => 'Es necesario ingresar un nombre para el circuito it.',
            'nombre_pt.required' => 'Es necesario ingresar un nombre para el circuito pt.',


            'nombre_es.string' => 'El nombre de el circuito solo puede ser letras.',
            'nombre_en.string' => 'El nombre de el circuito solo puede ser letras en.',
            'nombre_dt.string' => 'El nombre de el circuito solo puede ser letras dt.',
            'nombre_fr.string' => 'El nombre de el circuito solo puede ser letras fr.',
            'nombre_it.string' => 'El nombre de el circuito solo puede ser letras it.',
            'nombre_pt.string' => 'El nombre de el circuito solo puede ser letras pt.',


            'nombre_es.min' => 'El nombre de el circuito debe tener mínimo 5 caracteres.',
            'nombre_en.min' => 'El nombre de el circuito debe tener mínimo 5 caracteres en.',
            'nombre_dt.min' => 'El nombre de el circuito debe tener mínimo 5 caracteres dt.',
            'nombre_fr.min' => 'El nombre de el circuito debe tener mínimo 5 caracteres fr.',
            'nombre_it.min' => 'El nombre de el circuito debe tener mínimo 5 caracteres it.',
            'nombre_pt.min' => 'El nombre de el circuito debe tener mínimo 5 caracteres pt.',

            'telefono.max' => 'El teléfono de el circuito debe tener máximo 8 caracteres.',

            'nombre_es.max' => 'El nombre de el circuito debe tener máximo 200 caracteres.',
            'nombre_en.max' => 'El nombre de el circuito debe tener máximo 200 caracteres en.',
            'nombre_dt.max' => 'El nombre de el circuito debe tener máximo 200 caracteres dt.',
            'nombre_fr.max' => 'El nombre de el circuito debe tener máximo 200 caracteres fr.',
            'nombre_it.max' => 'El nombre de el circuito debe tener máximo 200 caracteres it.',
            'nombre_pt.max' => 'El nombre de el circuito debe tener máximo 200 caracteres pt.',

            'descripcion_es.max' => 'la descripcion de el circuito debe tener máximo 500 caracteres.',
            'descripcion_en.max' => 'la descripcion de el circuito debe tener máximo 500 caracteres en.',
            'descripcion_dt.max' => 'la descripcion de el circuito debe tener máximo 500 caracteres dt.',
            'descripcion_fr.max' => 'la descripcion de el circuito debe tener máximo 500 caracteres fr.',
            'descripcion_it.max' => 'la descripcion de el circuito debe tener máximo 500 caracteres it.',
            'descripcion_pt.max' => 'la descripcion de el circuito debe tener máximo 500 caracteres pt.',
        ];

        // $this->validate($request, $rules, $messages);
        $lang = ['es', 'en', 'dt', 'fr', 'it', 'pt'];
        $namef = ['nombre_es', 'nombre_en', 'nombre_dt', 'nombre_fr', 'nombre_it', 'nombre_pt'];
        $itineraryf = ['itinerario_es', 'itinerario_en', 'itinerario_dt', 'itinerario_fr', 'itinerario_it', 'itinerario_pt'];
        $descriptionf = ['descripcion_es', 'descripcion_en', 'descripcion_dt', 'descripcion_fr', 'descripcion_it', 'descripcion_pt'];


        $circuito = new Circuito();
        $circuito->duracions_id = $request->get('duracions_id');
        $circuito->frecuencias_id = $request->get('frecuencias_id');
        $circuito->dias_semanas_id = $request->get('dias_semanas_id');
        $circuito->dias_antelacions_id = $request->get('dias_antelacions_id');
        $circuito->modalidads_id = $request->get('modalidads_id');
        $circuito->provincias_id = $request->get('provincias_id');

        $circuito->image('imagen', $circuito);
        $circuito->detalle('detalles', $circuito);
        $circuito->map('mapa', $circuito);

        $circuito->fecha_inicio = $request->get('fecha_inicio');
        $circuito->fecha_fin = $request->get('fecha_fin');

        $circuito->precio_desde = $request->get('precio_desde');
        $circuito->pax_min = $request->get('pax_min');

        $oferta_especial = $request->get('oferta_especial');
        if ($oferta_especial) {
            $circuito->oferta_especial = 1;
        } else {
            $circuito->oferta_especial = 0;
        }
        $es = $request->get('es');
        if ($es) {
            $circuito->es = 1;
        } else {
            $circuito->es = 0;
        }
        $en = $request->get('en');
        if ($en) {
            $circuito->en = 1;
        } else {
            $circuito->en = 0;
        }
        $dt = $request->get('dt');
        if ($dt) {
            $circuito->dt = 1;
        } else {
            $circuito->dt = 0;
        }
        $fr = $request->get('fr');
        if ($fr) {
            $circuito->fr = 1;
        } else {
            $circuito->fr = 0;
        }
        $it = $request->get('it');
        if ($it) {
            $circuito->it = 1;
        } else {
            $circuito->it = 0;
        }
        $pt = $request->get('pt');
        if ($pt) {
            $circuito->pt = 1;
        } else {
            $circuito->pt = 0;
        }
        $circuito->esta_activo = $request->get('esta_activo');
        //$circuito->km = $request->get('km');
        //dd($circuito);

        if ($circuito->save()) {

            //return redirect()->route('circuitos.index')->with('notificacion','El contenido del circuito se ha registrado satisfactoriamente.');
            for ($i = 0; $i < 6; $i++) {
                $traslations = new CircuitoTraslations();
                $traslations->nombre = $request->get($namef[$i]);
                $traslations->itinerario = $request->get($itineraryf[$i]);
                $descripcion = $request->get($descriptionf[$i]);
                if ($descripcion) {
                    $traslations->descripcion = $request->get($descriptionf[$i]);
                }
                $traslations->idioma = $lang[$i];
                $traslations->circuitos_id = $circuito->id;
                $traslations->save();

            }
            //agregar en la tabla producto
            Producto::create([
                'producto_id' => $circuito->id,
                'tipo_producto' => 'circuito',
                'oferta_especial' => ($oferta_especial) ? 1 : 0,
                'provincia_id' => $circuito->provincias_id
            ]);

            return redirect()->route('admin.content.circuitos.index')->with('notificacion', 'El contenido del circuito se ha registrado satisfactoriamente.');

        }
        return redirect()->route('admin.content.circuitos.index')->with('notificacionerror', 'El contenido del circuito no se ha podido registrar en su base de datos.');


    }


    public function show($id)
    {
        //
        $tras = DB::table('buros')
            ->join('buros_traslations', 'buros.id', "=", "buros_traslations.buro_id")
            ->select('buros.id', 'buros_traslations.nombre', 'buros_traslations.direccion', 'buros.telefono', 'buros.oficina_id', 'buros.created_at', 'buros.updated_at')
            ->where('buros_traslations.idioma', '=', 'es')->get();
        foreach ($tras as $key) {
            return $key['nombre'];
        }
        //dd($key);
        //return view("backend.buros.show",["buro"=>OficinaTraslations::findOrFail($id),'tras'=>$tras]);
    }


    public function edit($id)
    {

        $ruta = '/circuitos/';
        $nombre = 'CIRCUITO';
        $circuito = Circuito::findOrFail($id);
        $provincias = Provincia::all();
        $modalidades = DB::table('modalidads')->join('modalidad_traslations', 'modalidads.id', "=", "modalidad_traslations.modalidads_id")
            ->select('modalidad_traslations.nombre as nombre',
                'modalidad_traslations.modalidads_id')
            ->where('modalidad_traslations.idioma', '=', 'es')->get();
        $duraciones = Duracion::all();
        $dias_semana = DB::table('dias_semanas')->join('dias_semana_traslations', 'dias_semanas.id', "=", "dias_semana_traslations.dias_semanas_id")
            ->select('dias_semana_traslations.diassemana as nombre',
                'dias_semana_traslations.dias_semanas_id')
            ->where('dias_semana_traslations.locale', '=', 'es')->get();
        //dd($frecuencias);
        $frecuencias = DB::table('frecuencias')->join('frecuencia_traslations', 'frecuencias.id', "=", "frecuencia_traslations.frecuencias_id")
            ->select('frecuencia_traslations.frecuencia as nombre',
                'frecuencia_traslations.frecuencias_id')
            ->where('frecuencia_traslations.locale', '=', 'es')->get();
        $dias_antelacion = DiasAntelacionReserva::all();

        $tras = CircuitoTraslations::where('circuitos_id', $circuito->id)->get();
        //$oficinas = OficinaTraslations::where('oficinas_traslations.idioma', '=', 'es')->get();
        $data = array();
        foreach ($tras as $item) {
            if ($item['idioma'] == 'es') {
                $data['nombre_es'] = $item['nombre'];
                $data['modalidad_es'] = $item['modalidad'];
                $data['itinerario_es'] = $item['itinerario'];
                $data['descripcion_es'] = $item['descripcion'];
            }
            if ($item['idioma'] == 'en') {
                $data['nombre_en'] = $item['nombre'];
                $data['descripcion_en'] = $item['direccion'];
            }
            if ($item['idioma'] == 'fr') {
                $data['nombre_fr'] = $item['nombre'];
                $data['descripcion_fr'] = $item['direccion'];
            }
            if ($item['idioma'] == 'dt') {
                $data ['nombre_dt'] = $item['nombre'];
                $data['descripcion_dt'] = $item['direccion'];
            }
            if ($item['idioma'] == 'it') {
                $data ['nombre_it'] = $item['nombre'];
                $data['descripcion_it'] = $item['direccion'];
            }
            if ($item['idioma'] == 'pt') {
                $data ['nombre_pt'] = $item['nombre'];
                $data['descripcion_pt'] = $item['direccion'];
            }

        }
        //dd($circuito);
        return view('admin.circuitos.edit', ["circuito" => $circuito, 'provincias' => $provincias], compact('nombre', 'ruta', 'modalidades', 'duraciones', 'frecuencias', 'dias_semana', 'dias_antelacion', 'data'));
    }


    public function update(Request $request, $id)
    {
        //
        $rules = [
            'provincia_id' => 'required|sometimes',
            'duracions_id' => 'required|in:1,2,3,4',
            'imagen' => 'mimes:jpg,png,gif,jpeg|min:1',

            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after:fecha_inicio',
            'frecuencias_id' => 'required|in:Diaria,Semanal,Quicenal,Mensual',
            'dias_semanas_id' => 'required|in:lunes,martes,miercoles,jueves,viernes,sabado,domingo',
            'detalles' => 'mimes:pdf|min:1',
            'mapa' => 'mimes:jpg,png,gif,jpeg|min:1',
            'precio_desde' => 'numeric|min:1',
            'pax_min' => 'numeric|min:1',
            'dias_antelacion' => 'numeric|min:1',
            'esta_activo' => 'in:activo,inactivo',

            'nombre_es' => 'required|max:200',
            'modalidad_es' => 'required|max:200',
            'itinerario_es' => 'required|max:200',
            'descripcion_es' => 'required|max:500',

            'nombre_en' => 'max:200',
            'modalidad_en' => 'max:200',
            'itinerario_en' => 'max:200',
            'descripcion_en' => 'max:500',

            'nombre_dt' => 'max:200',
            'modalidad_dt' => 'max:200',
            'itinerario_dt' => 'max:200',
            'descripcion_dt' => 'max:500',

            'nombre_fr' => 'max:200',
            'modalidad_fr' => 'max:200',
            'itinerario_fr' => 'max:200',
            'descripcion_fr' => 'max:500',

            'nombre_it' => 'max:200',
            'modalidad_it' => 'max:200',
            'itinerario_it' => 'max:200',
            'descripcion_it' => 'max:500',

            'nombre_pt' => 'max:200',
            'modalidad_pt' => 'max:200',
            'itinerario_pt' => 'max:200',
            'descripcion_pt' => 'max:500',

        ];

        $messages = [
            /*'oficina_id.required' => 'Es necesario seleccionar el circuito a la cual pertencece el buro.',

            'telefono.required' => 'Es necesario ingresar un teléfono para el circuito.',

            'nombre_es.required' => 'Es necesario ingresar un nombre para el circuito.',
            'nombre_en.required' => 'Es necesario ingresar un nombre para el circuito en.',
            'nombre_dt.required' => 'Es necesario ingresar un nombre para el circuito dt.',
            'nombre_fr.required' => 'Es necesario ingresar un nombre para el circuito fr.',
            'nombre_it.required' => 'Es necesario ingresar un nombre para el circuito it.',
            'nombre_pt.required' => 'Es necesario ingresar un nombre para el circuito pt.',

            'telefono.numeric' => 'El teléfono de el circuito solo puede ser números.',

            'nombre_es.string' => 'El nombre de el circuito solo puede ser letras.',
            'nombre_en.string' => 'El nombre de el circuito solo puede ser letras en.',
            'nombre_dt.string' => 'El nombre de el circuito solo puede ser letras dt.',
            'nombre_fr.string' => 'El nombre de el circuito solo puede ser letras fr.',
            'nombre_it.string' => 'El nombre de el circuito solo puede ser letras it.',
            'nombre_pt.string' => 'El nombre de el circuito solo puede ser letras pt.',

            'telefono.min' => 'El teléfono de el circuito debe tener mínimo 8 caracteres.',

            'nombre_es.min' => 'El nombre de el circuito debe tener mínimo 5 caracteres.',
            'nombre_en.min' => 'El nombre de el circuito debe tener mínimo 5 caracteres en.',
            'nombre_dt.min' => 'El nombre de el circuito debe tener mínimo 5 caracteres dt.',
            'nombre_fr.min' => 'El nombre de el circuito debe tener mínimo 5 caracteres fr.',
            'nombre_it.min' => 'El nombre de el circuito debe tener mínimo 5 caracteres it.',
            'nombre_pt.min' => 'El nombre de el circuito debe tener mínimo 5 caracteres pt.',

            'telefono.max' => 'El teléfono de el circuito debe tener máximo 8 caracteres.',

            'nombre_es.max' => 'El nombre de el circuito debe tener máximo 200 caracteres.',
            'nombre_en.max' => 'El nombre de el circuito debe tener máximo 200 caracteres en.',
            'nombre_dt.max' => 'El nombre de el circuito debe tener máximo 200 caracteres dt.',
            'nombre_fr.max' => 'El nombre de el circuito debe tener máximo 200 caracteres fr.',
            'nombre_it.max' => 'El nombre de el circuito debe tener máximo 200 caracteres it.',
            'nombre_pt.max' => 'El nombre de el circuito debe tener máximo 200 caracteres pt.',

            'descripcion_es.max' => 'la descripcion de el circuito debe tener máximo 500 caracteres.',
            'descripcion_en.max' => 'la descripcion de el circuito debe tener máximo 500 caracteres en.',
            'descripcion_dt.max' => 'la descripcion de el circuito debe tener máximo 500 caracteres dt.',
            'descripcion_fr.max' => 'la descripcion de el circuito debe tener máximo 500 caracteres fr.',
            'descripcion_it.max' => 'la descripcion de el circuito debe tener máximo 500 caracteres it.',
            'descripcion_pt.max' => 'la descripcion de el circuito debe tener máximo 500 caracteres pt.',

            'telefono.unique' => 'El teléfono de el circuito no puede estar repetido.',*/
        ];
        $this->validate($request, $rules, $messages);
        $lang = ['es', 'en', 'dt', 'fr', 'it', 'pt'];
        $namef = ['nombre_es', 'nombre_en', 'nombre_dt', 'nombre_fr', 'nombre_it', 'nombre_pt'];
        $modalityf = ['modalidad_es', 'modalidad_en', 'modalidad_dt', 'modalidad_fr', 'modalidad_it', 'modalidad_pt'];
        $itineraryf = ['itinerario_es', 'itinerario_en', 'itinerario_dt', 'itinerario_fr', 'itinerario_it', 'itinerario_pt'];
        $descriptionf = ['descripcion_es', 'descripcion_en', 'descripcion_dt', 'descripcion_fr', 'descripcion_it', 'descripcion_pt'];


        $circuito = Circuito::findOrFail($id);
        $circuito->duracions_id = $request->get('duracions_id');
        $circuito->image('imagen', $circuito);
        $circuito->fecha_inicio = $request->get('fecha_inicio');
        $circuito->fecha_fin = $request->get('fecha_fin');
        $circuito->frecuencias_id = $request->get('frecuencias_id');
        $circuito->dias_semanas_id = $request->get('dias_semanas_id');
        $circuito->detalle('detalles', $circuito);

        $circuito->map('mapa', $circuito);
        $circuito->precio_desde = $request->get('precio_desde');
        $circuito->pax_min = $request->get('pax_min');
        $circuito->dias_antelacion = $request->get('dias_antelacion');
        $circuito->provincia_id = $request->get('provincia_id');
        $oferta_especial = $request->get('oferta_especial');
        if ($oferta_especial) {
            $circuito->oferta_especial = 1;
        } else {
            $circuito->oferta_especial = 0;
        }
        $es = $request->get('es');
        if ($es) {
            $circuito->es = 1;
        } else {
            $circuito->es = 0;
        }
        $en = $request->get('en');
        if ($en) {
            $circuito->en = 1;
        } else {
            $circuito->en = 0;
        }
        $dt = $request->get('dt');
        if ($dt) {
            $circuito->dt = 1;
        } else {
            $circuito->dt = 0;
        }
        $fr = $request->get('fr');
        if ($fr) {
            $circuito->fr = 1;
        } else {
            $circuito->fr = 0;
        }
        $it = $request->get('it');
        if ($it) {
            $circuito->it = 1;
        } else {
            $circuito->it = 0;
        }
        $pt = $request->get('pt');
        if ($pt) {
            $circuito->pt = 1;
        } else {
            $circuito->pt = 0;
        }
        $circuito->esta_activo = $request->get('esta_activo');
        if ($circuito->update()) {

            //modificar en tabla producto
            $producto = Producto::where([['producto_id', $id],['tipo_producto','circuito']])->first();
            if ($producto) {
                $producto->oferta_especial = ($oferta_especial) ? 1 : 0;
                $producto->provincia_id = $circuito->provincias_id;
                $producto->save();
            } else {
                Producto::create([
                    'producto_id' => $circuito->id,
                    'tipo_producto' => 'circuito',
                    'oferta_especial' => ($oferta_especial) ? 1 : 0,
                    'provincia_id' => $circuito->provincias_id
                ]);
            }

            $traslations = CircuitoTraslations::where([['producto_id', $id],['tipo_producto','circuito']])->get();


            foreach ($traslations as $value) {

                if ($value['idioma'] == $lang[0]) {

                    $value['nombre'] = $request->get($namef[0]);
                    $value['modalidad'] = $request->get($modalityf[0]);
                    $value['itinerario'] = $request->get($itineraryf[0]);

                    $descripcion = $request->get($descriptionf[0]);
                    if ($descripcion) {
                        $value['descripcion'] = $request->get($descriptionf[0]);
                    }
                    if ($value->update()) {
                        //$i = $i + 1;
                        //return redirect()->route('oficinas.index')->with('notificacion','El contenido de el circuito se ha edi satisfactoriamente.');
                    }
                }
                if ($value['idioma'] == $lang[1]) {

                    $value['nombre'] = $request->get($namef[1]);
                    $value['modalidad'] = $request->get($modalityf[1]);
                    $value['itinerario'] = $request->get($itineraryf[1]);

                    $descripcion = $request->get($descriptionf[1]);
                    if ($descripcion) {
                        $value['descripcion'] = $request->get($descriptionf[1]);
                    }
                    if ($value->update()) {
                        //$i = $i + 1;
                        //return redirect()->route('oficinas.index')->with('notificacion','El contenido de el circuito se ha edi satisfactoriamente.');
                    }
                    //$i = $i + 1;
                    //return redirect()->route('oficinas.index')->with('notificacion','El contenido de el circuito se ha edi satisfactoriamente.');
                }
            }
            if ($value['idioma'] == $lang[2]) {

                $value['nombre'] = $request->get($namef[2]);
                $value['modalidad'] = $request->get($modalityf[2]);
                $value['itinerario'] = $request->get($itineraryf[2]);

                $descripcion = $request->get($descriptionf[2]);
                if ($descripcion) {
                    $value['descripcion'] = $request->get($descriptionf[2]);
                }
                if ($value->update()) {
                    //$i = $i + 1;
                    //return redirect()->route('oficinas.index')->with('notificacion','El contenido de el circuito se ha edi satisfactoriamente.');
                }
            }
            if ($value['idioma'] == $lang[3]) {

                $value['nombre'] = $request->get($namef[3]);
                $value['modalidad'] = $request->get($modalityf[3]);
                $value['itinerario'] = $request->get($itineraryf[3]);

                $descripcion = $request->get($descriptionf[3]);
                if ($descripcion) {
                    $value['descripcion'] = $request->get($descriptionf[3]);
                }
                if ($value->update()) {
                    //$i = $i + 1;
                    //return redirect()->route('oficinas.index')->with('notificacion','El contenido de el circuito se ha edi satisfactoriamente.');
                }
            }
            if ($value['idioma'] == $lang[4]) {

                $value['nombre'] = $request->get($namef[4]);
                $value['modalidad'] = $request->get($modalityf[4]);
                $value['itinerario'] = $request->get($itineraryf[4]);

                $descripcion = $request->get($descriptionf[4]);
                if ($descripcion) {
                    $value['descripcion'] = $request->get($descriptionf[4]);
                }
                if ($value->update()) {
                    //$i = $i + 1;
                    //return redirect()->route('oficinas.index')->with('notificacion','El contenido de el circuito se ha edi satisfactoriamente.');
                }
            }
            if ($value['idioma'] == $lang[5]) {

                $value['nombre'] = $request->get($namef[5]);
                $value['modalidad'] = $request->get($modalityf[5]);
                $value['itinerario'] = $request->get($itineraryf[5]);

                $descripcion = $request->get($descriptionf[5]);
                if ($descripcion) {
                    $value['descripcion'] = $request->get($descriptionf[5]);
                }
                if ($value->update()) {
                    //$i = $i + 1;
                    return redirect()->route('admin.content.circuitos.index')->with('notificacion', 'El contenido del circuito se ha editado satisfactoriamente.');
                }
            }
        }
    }


    public function destroy($id)
    {
        //
        $circuito = Circuito::destroy($id);
        $producto = Producto::destroy($id);


        if ($circuito == null && $producto == null) {
            return redirect()->route('admin.content.circuitos.index')->with('notificacion', 'Se ha eliminado satisfactoriamente el circuito.');
        } else {
            return redirect()->route('admin.content.circuitos.index')->with('notificacionerror', 'No se ha podido eliminar el circuito de su base de datos.');
        }


    }

}
