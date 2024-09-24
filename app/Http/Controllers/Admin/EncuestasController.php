<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Modelos\Encuesta;
use App\Modelos\EncuestasTraslation;
use App\Http\Requests\EncuestaStoreRequest;
use App\Http\Requests\EncuestaUpdateRequest;
use Illuminate\Http\Request;

class EncuestasController extends Controller
{
    public function __construct()
    {
        $this->middleware('hasPermission:encuestas.create')->only(['create','store']);
        $this->middleware('hasPermission:encuestas.destroy')->only(['destroy']);
        $this->middleware('hasPermission:encuestas.index')->only(['index']);
        $this->middleware('hasPermission:encuestas.edit')->only(['update','edit']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $encuestas = Encuesta::join("encuesta_traslations","encuestas.id","=","encuesta_traslations.encuesta_id")
            ->where('locale','=','es')
            ->select('encuestas.id','encuesta_traslations.pregunta','encuestas.created_by')
            ->paginate();

        return view('admin.encuestas.index', compact('encuestas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.encuestas.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(EncuestaStoreRequest $request)
    {

        $validated = $request->validated();
        $preguntava = Encuesta::create();
        //dd($preguntava);
        $locales = array('es', 'en', 'fr', 'de', 'it', 'pt');

        foreach($locales as $value)
        {
            $pregunta = 'pregunta_'.$value;
            EncuestasTraslation::create(
                [
                    'pregunta'=>$request->$pregunta,
                    'encuesta_id'=>$preguntava->id,
                    'locale'=>$value
                ]
            );
        }

        return redirect()->route('admin.content.encuestas.index')->with('success',__('cubanacan.add-content',['contenido'=>'Encuestas']) );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $encuesta = Encuesta::findOrFail($id);

        return view('admin.encuestas.show', compact('encuesta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $encuesta = Encuesta::findOrFail($id);
        $encuestatraslation = EncuestasTraslation::where('encuesta_id', $encuesta->id)->get();
        $data = array();
        foreach ($encuestatraslation as $item)
        {
            if($item['locale']=='es')
            {
                $data['pregunta_es'] = $item['pregunta'];
            }
            if($item['locale']=='en')
            {
                $data['pregunta_en'] = $item['pregunta'];
            }
            if($item['locale']=='fr')
            {
                $data['pregunta_fr'] = $item['pregunta'];
            }
            if($item['locale']=='de')
            {
                $data['pregunta_de'] = $item['pregunta'];
            }
            if($item['locale']=='it')
            {
                $data['pregunta_it'] = $item['pregunta'];
            }
            if($item['locale']=='pt')
            {
                $data['pregunta_pt'] = $item['pregunta'];
            }
        }

        return view('admin.encuestas.edit', compact('encuesta','data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(EncuestaUpdateRequest $request, $id)
    {

        $validated = $request->validated();
        
        $encuesta = Encuesta::findOrFail($id);
        $encuesta->update();
        $encuestatraslation = EncuestasTraslation::where('encuesta_id', $encuesta->id)->get();
        foreach ($encuestatraslation as $item)
        {
            $preguntaes = 'pregunta_'.$item['locale'];
            $item->update([
                'pregunta'=>$request->$preguntaes,
            ]);
        }

        return redirect()->route('admin.content.encuestas.index')->with('success',__('cubanacan.edit-content',['contenido'=>'Encuestas']));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Encuesta::destroy($id);

        return redirect()->route('admin.content.encuestas.index')->with('success',__('cubanacan.delete-content',['contenido'=>'Encuestas']));
    }
}
