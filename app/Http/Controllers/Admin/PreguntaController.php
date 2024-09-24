<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modelos\Pregunta;
use App\Modelos\PreguntaTraslation;
use App\Http\Requests\PreguntaStoreRequest;
use App\Http\Requests\PreguntaUpdateRequest;
use Illuminate\Support\Facades\DB;

class PreguntaController extends Controller
{

    public function __construct()
    {
        $this->middleware('hasPermission:preguntas.create')->only(['create','store']);
        $this->middleware('hasPermission:preguntas.destroy')->only(['destroy']);
        $this->middleware('hasPermission:preguntas.index')->only(['index']);
        $this->middleware('hasPermission:preguntas.edit')->only(['update','edit']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $preguntas = Pregunta::join("pregunta_traslations","preguntas.id","=","pregunta_traslations.pregunta_id")
            ->where('locale','=','es')
            ->select('preguntas.id','pregunta_traslations.pregunta','preguntas.created_by','pregunta_traslations.respuesta')
            ->paginate();

        return view('admin.preguntas.index', ['preguntas'=>$preguntas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.preguntas.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PreguntaStoreRequest $request)
    {
        $validated = $request->validated();
        $preguntava = Pregunta::create();
        $locales = array('es', 'en', 'fr', 'de', 'it', 'pt');

        foreach($locales as $value)
        {
            $pregunta = 'pregunta_'.$value;
            $respuesta = 'respuesta_'.$value;
           PreguntaTraslation::create(
                [
                    'pregunta'=>$request->$pregunta,
                    'respuesta'=>$request->$respuesta,
                    'pregunta_id'=>$preguntava->id,
                    'locale'=>$value
                ]
            );
        }
        return redirect()->route('admin.content.preguntas.index')->with('success',__('cubanacan.add-content',['contenido'=>'Preguntas']) );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        $pregunta = Pregunta::find($id);
        $preguntatraslation = PreguntaTraslation::where('pregunta_id', $pregunta->id)->get();
        $data = array();
        foreach ($preguntatraslation as $item)
        {
            if($item['locale']=='es')
            {
                $data['pregunta_es'] = $item['pregunta'];
                $data['respuesta_es'] = $item['respuesta'];
            }
            if($item['locale']=='en')
            {
                $data['pregunta_en'] = $item['pregunta'];
                $data['respuesta_en'] = $item['respuesta'];
            }
            if($item['locale']=='fr')
            {
                $data['pregunta_fr'] = $item['pregunta'];
                $data['respuesta_fr'] = $item['respuesta'];
            }
            if($item['locale']=='de')
            {
                $data['pregunta_de'] = $item['pregunta'];
                $data['respuesta_de'] = $item['respuesta'];
            }
            if($item['locale']=='it')
            {
                $data['pregunta_it'] = $item['pregunta'];
                $data['respuesta_it'] = $item['respuesta'];
            }
            if($item['locale']=='pt')
            {
                $data['pregunta_pt'] = $item['pregunta'];
                $data['respuesta_pt'] = $item['respuesta'];
            }
        }
        return view('admin.preguntas.edit',['pregunta'=>$pregunta],['preguntatraslation'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PreguntaUpdateRequest $request, $id)
    {
        $validated = $request->validated();
        //$contact->contactos_translations()->update();
        $pregunta= Pregunta::find($id);
        $pregunta->update();
        $preguntatraslation = PreguntaTraslation::where('pregunta_id', $pregunta->id)->get();
        foreach ($preguntatraslation as $item)
        {
            $preguntaes = 'pregunta_'.$item['locale'];
            $respuesta = 'respuesta_'.$item['locale'];
            $item->update([
                'pregunta'=>$request->$preguntaes,
                 'respuesta'=>$request->$respuesta
            ]);
        }

        return redirect()->route('admin.content.preguntas.index')->with('success',__('cubanacan.edit-content',['contenido'=>'Pregunta']));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pregunta::destroy($id);
        return redirect()->route('admin.content.preguntas.index')->with('success',__('cubanacan.delete-content',['contenido'=>'Pregunta']));
    }
}
