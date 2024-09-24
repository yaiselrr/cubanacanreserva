<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use DB;
use App\Modelos\Blog;
use App\Modelos\BlogTraslations;

class BlogController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('hasPermission:blogs.create')->only(['create', 'store']);
        $this->middleware('hasPermission:blogs.destroy')->only(['destroy']);
        $this->middleware('hasPermission:blogs.index')->only(['index']);
        $this->middleware('hasPermission:blogs.edit')->only(['update', 'edit']);
    }


    public function index()
    {
        //
        $ruta = '/blogs/';
        $nombre = 'BLOG';

        $blogs = DB::table('blogs')
            ->join('blogs_traslations', 'blogs.id', "=", "blogs_traslations.blogs_id")
            ->select('blogs.id', 'blogs.imagen', 'blogs.fecha_publicacion', 'blogs_traslations.titulo',
                'blogs_traslations.idioma', 'blogs_traslations.descripcion', 'blogs.created_at', 'blogs.updated_at')
            ->where('blogs_traslations.idioma', '=', 'es')->get();


        return view('admin.blogs.index', ['blogs' => $blogs], compact('nombre', 'ruta'));

    }


    public function create()
    {
        $ruta = '/blogs/';
        $nombre = 'BLOG';
        //$oficinas = OficinaTraslations::where('oficinas_traslations.idioma', '=', 'es')->get();
        return view('admin.blogs.create', compact('nombre', 'ruta'));
    }


    public function store(Request $request)
    {
        $rules = [

            'imagen' => 'required|mimes:jpg,png,gif,jpeg|min:1',

            'fecha_publicacion' => 'required|date|after_or_equal:now',

            'nombre_es' => 'required|max:120|min:5',
            'descripcion_es' => 'required|max:500',

            'nombre_en' => 'max:120',
            'descripcion_en' => 'max:500',

            'nombre_dt' => 'max:120',
            'descripcion_dt' => 'max:500',

            'nombre_fr' => 'max:120',
            'descripcion_fr' => 'max:500',

            'nombre_it' => 'max:120',
            'descripcion_it' => 'max:500',

            'nombre_pt' => 'max:120',
            'descripcion_pt' => 'max:500',

        ];

        $messages = [
            //'oficina_id.required' => 'Es necesario seleccionarl blog a la cual pertencece el buro.',

            'fecha_publicacion.required' => 'El campo  fecha publicacion es obligatorio.',
            'fecha_publicacion.after_or_equal' => 'La fecha de publicación debe ser mayor o igual que la fecha actual.',

            'imagen.mimes' => 'El archivo especificado no se pudo subir. Sólo se permiten archivos con las siguientes extensiones: png, gif, jpg, jpeg.',

            'imagen.min_width' => 'El archivo especificado no se pudo subir. La imagen es demasiado pequeña. Las dimensiones mínimas son (100x200).',
            'imagen.min_height' => 'El archivo especificado no se pudo subir. La imagen es demasiado pequeña. Las dimensiones mínimas son (100x200).',
            'imagen.max_width' => 'El archivo especificado no se pudo subir. La imagen es demasiado pequeña. Las dimensiones mínimas son (200x400).',
            'imagen.max_height' => 'El archivo especificado no se pudo subir. La imagen es demasiado pequeña. Las dimensiones mínimas son (200x400).',
            'imagen.min' => 'El archivo especificado no se pudo subir. El tamaño del archivo debe ser mayor que 0 byte.',


            'nombre_es.required' => 'El campo  título es obligatorio.',

            //'telefono.numeric' => 'El teléfono del blog solo puede ser números.',

            'telefono.min' => 'El teléfono Admite hasta 8 caracteres.',

            'nombre_es.min' => 'El nombre del blog debe tener mínimo 5 caracteres.',

            //'imagen.min' => 'El archivo especificado no se pudo subir. El tamaño del archivo debe ser mayor que 0 byte.',


            'telefono.max' => 'El teléfono del blog debe tener máximo 8 caracteres.',

            'imagen.min' => 'El tamaño máximo de la imagen es hasta 512 Kb.',

            'nombre_es.max' => 'Admite hasta 120 caracteres.',
            'nombre_en.max' => 'Admite hasta 120 caracteres en.',
            'nombre_dt.max' => 'Admite hasta 120 caracteres dt.',
            'nombre_fr.max' => 'Admite hasta 120 caracteres fr.',
            'nombre_it.max' => 'Admite hasta 120 caracteres it.',
            'nombre_pt.max' => 'Admite hasta 120 caracteres pt.',

            'descripcion_es.max' => 'Admite hasta 500 caracteres..',
            'descripcion_en.max' => 'Admite hasta 500 caracteres. en.',
            'descripcion_dt.max' => 'Admite hasta 500 caracteres. dt.',
            'descripcion_fr.max' => 'Admite hasta 500 caracteres. fr.',
            'descripcion_it.max' => 'Admite hasta 500 caracteres. it.',
            'descripcion_pt.max' => 'Admite hasta 500 caracteres. pt.',

            'telefono.unique' => 'El teléfono del blog no puede estar repetido.',
        ];

        $this->validate($request, $rules, $messages);
        $lang = ['es', 'en', 'dt', 'fr', 'it', 'pt'];
        $namef = ['nombre_es', 'nombre_en', 'nombre_dt', 'nombre_fr', 'nombre_it', 'nombre_pt'];
        $descriptionf = ['descripcion_es', 'descripcion_en', 'descripcion_dt', 'descripcion_fr', 'descripcion_it', 'descripcion_pt'];


        $blog = new Blog();
        $blog->image('imagen', $blog);
        $blog->fecha_publicacion = $request->get('fecha_publicacion');

        if ($blog->save()) {
            for ($i=0; $i < 6; $i++) {
                $traslations = new BlogTraslations();               
                $traslations->titulo = $request->get($namef[$i]);
                $descripcion = $request->get($descriptionf[$i]);
                if ($descripcion) 
                {
                    $traslations->descripcion = $request->get($descriptionf[$i]);
                }
                $traslations->idioma = $lang[$i];
                $traslations->blogs_id = $blog->id;
                $traslations->save();

            }
            return redirect()->route('admin.content.blogs.index')->with('notificacion', 'El contenido del blog se ha registrado satisfactoriamente.');

        }else{

            return redirect()->route('admin.content.blogs.index')->with('notificacionerror', 'El contenido del blog no se ha podido registrar en su base de datos.');
        }


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

        $ruta = '/blogs/';
        $nombre = 'BLOG';
        $blog = Blog::findOrFail($id);
        $tras = BlogTraslations::where('blogs_id', $blog->id)->get();
        //$oficinas = OficinaTraslations::where('oficinas_traslations.idioma', '=', 'es')->get();
        $data = array();
        foreach ($tras as $item) {
            if ($item['idioma'] == 'es') {
                $data['nombre_es'] = $item['titulo'];
                $data['descripcion_es'] = $item['descripcion'];
            }
            if ($item['idioma'] == 'en') {
                $data['nombre_en'] = $item['titulo'];
                $data['descripcion_en'] = $item['descripcion'];
            }
            if ($item['idioma'] == 'fr') {
                $data['nombre_fr'] = $item['titulo'];
                $data['descripcion_fr'] = $item['descripcion'];
            }
            if ($item['idioma'] == 'dt') {
                $data ['nombre_dt'] = $item['titulo'];
                $data['descripcion_dt'] = $item['descripcion'];
            }
            if ($item['idioma'] == 'it') {
                $data ['nombre_it'] = $item['titulo'];
                $data['descripcion_it'] = $item['descripcion'];
            }
            if ($item['idioma'] == 'pt') {
                $data ['nombre_pt'] = $item['titulo'];
                $data['descripcion_pt'] = $item['descripcion'];
            }

        }
        //dd($data);
        return view('admin.blogs.edit', ["blog" => $blog, "data" => $data], compact('nombre', 'ruta'));
    }


    public function update(Request $request, $id)
    {
        //
        $rules = [
            //'oficina_id' => 'required',

            'imagen' => 'mimes:jpg,png,gif,jpeg|min:1',
            'fecha_publicacion' => 'required|date|after_or_equal:now',

            'nombre_es' => 'required|string|max:120|min:5',
            'descripcion_es' => 'required|max:500',

            'nombre_en' => 'max:120',
            'descripcion_en' => 'max:500',

            'nombre_dt' => 'max:120',
            'descripcion_dt' => 'max:500',

            'nombre_fr' => 'max:120',
            'descripcion_it' => 'max:500',

            'nombre_it' => 'max:120',
            'descripcion_it' => 'max:500',

            'nombre_pt' => 'max:120',
            'descripcion_pt' => 'max:500',

        ];

        $messages = [
            //'oficina_id.required' => 'Es necesario seleccionarl blog a la cual pertencece el buro.',

            //'telefono.required' => 'El campo  teléfono paral blog.',
            'imagen.mimes' => 'Solo se permiten archivos con los formatos jpg,png,gif,jpeg.',

            'nombre_es.required' => 'El campo  título es obligatorio.',
            'nombre_en.required' => 'El campo  título es obligatorio en.',
            'nombre_dt.required' => 'El campo  título es obligatorio dt.',
            'nombre_fr.required' => 'El campo  título es obligatorio fr.',
            'nombre_it.required' => 'El campo  título es obligatorio it.',
            'nombre_pt.required' => 'El campo  título es obligatorio pt.',

            //'telefono.numeric' => 'El teléfono del blog solo puede ser números.',

            'nombre_es.alpha' => 'El titulo de la blog solo puede ser letras.',
            'nombre_en.alpha' => 'El titulo de la blog solo puede ser letras en.',
            'nombre_dt.alpha' => 'El titulo de la blog solo puede ser letras dt.',
            'nombre_fr.alpha' => 'El titulo de la blog solo puede ser letras fr.',
            'nombre_it.alpha' => 'El titulo de la blog solo puede ser letras it.',
            'nombre_pt.alpha' => 'El titulo de la blog solo puede ser letras pt.',

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

            'nombre_es.max' => 'Admite hasta 120 caracteres.',
            'nombre_en.max' => 'Admite hasta 120 caracteres en.',
            'nombre_dt.max' => 'Admite hasta 120 caracteres dt.',
            'nombre_fr.max' => 'Admite hasta 120 caracteres fr.',
            'nombre_it.max' => 'Admite hasta 120 caracteres it.',
            'nombre_pt.max' => 'Admite hasta 120 caracteres pt.',

            'descripcion_es.max' => 'Admite hasta 500 caracteres..',
            'descripcion_en.max' => 'Admite hasta 500 caracteres. en.',
            'descripcion_dt.max' => 'Admite hasta 500 caracteres. dt.',
            'descripcion_fr.max' => 'Admite hasta 500 caracteres. fr.',
            'descripcion_it.max' => 'Admite hasta 500 caracteres. it.',
            'descripcion_pt.max' => 'Admite hasta 500 caracteres. pt.',

            'telefono.unique' => 'El teléfono del blog no puede estar repetido.',
        ];
        //$this->validate($request, $rules, $messages);
        $lang = ['es', 'en', 'dt', 'fr', 'it', 'pt'];
        $namef = ['nombre_es', 'nombre_en', 'nombre_dt', 'nombre_fr', 'nombre_it', 'nombre_pt'];
        $descriptionf = ['descripcion_es', 'descripcion_en', 'descripcion_dt', 'descripcion_fr', 'descripcion_it', 'descripcion_pt'];

        $blog = Blog::findOrFail($id);
        $blog->image('imagen', $blog);
        $blog->fecha_publicacion = $request->get('fecha_publicacion');
        $blog->save();


        $traslations = BlogTraslations::where('blogs_id', $blog->id)->get();
        $i = 0;
        foreach ($traslations as $value) {

            if ($value['idioma'] == $lang[0]) {

                $value['titulo'] = $request->get($namef[0]);
                $value['descripcion'] = $request->get($descriptionf[0]);
                $value->update();
            }
            if ($value['idioma'] == $lang[1]) {

                $value['titulo'] = $request->get($namef[1]);
                $value['descripcion'] = $request->get($descriptionf[1]);
                $value->update();
            }
            if ($value['idioma'] == $lang[2]) {

                $value['titulo'] = $request->get($namef[2]);
                $value['descripcion'] = $request->get($descriptionf[2]);
                $value->update();
            }
            if ($value['idioma'] == $lang[3]) {

                $value['titulo'] = $request->get($namef[3]);
                $value['descripcion'] = $request->get($descriptionf[3]);
                $value->update();
            }
            if ($value['idioma'] == $lang[4]) {

                $value['titulo'] = $request->get($namef[4]);
                $value['descripcion'] = $request->get($descriptionf[4]);
                $value->update();
            }
            if ($value['idioma'] == $lang[5]) {

                $value['titulo'] = $request->get($namef[5]);
                $value['descripcion'] = $request->get($descriptionf[5]);

                if ($value->update()) {
                    return redirect()->route('admin.content.blogs.index')->with('notificacion', 'El contenido del blog se ha editado satisfactoriamente.');
                }
            }


            return redirect()->route('admin.content.blogs.index')->with('notificacionerror', 'El contenido editado del blog no se ha podido guardar en su base de datos.');


        }

    }


    public function destroy($id)
    {
        //
        $blog = Blog::destroy($id);

        if ($blog == null) {
            return redirect()->route('admin.content.blogs.index')->with('notificacion', 'Se ha eliminado satisfactoriamente el blog.');
        }

        return redirect()->route('admin.content.blogs.index')->with('notificacionerror', 'No se ha podido eliminar el blog de su base de datos.');

    }

}
