<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Modelos\QuienesSomos;
use App\Modelos\QuienesSomosTraslation;
use App\Http\Requests\QuienesSomosStoreRequest;
use App\Http\Requests\QuienesSomosUpdateRequest;

class QuienesSomosController extends Controller
{
    public function __construct()
    {
        $this->middleware('hasPermission:quienes-somos.create')->only(['create','store']);
        $this->middleware('hasPermission:quienes-somos.destroy')->only(['destroy']);
        $this->middleware('hasPermission:quienes-somos.index')->only(['index']);
        $this->middleware('hasPermission:quienes-somos.edit')->only(['update','edit']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quienessomos = QuienesSomos::join("quienes_somos_traslations","quienes_somos.id","=","quienes_somos_traslations.quienessomos_id")
            ->where('locale','=','es')
            ->select('quienes_somos.id','quienes_somos.imagen','quienes_somos.created_by','quienes_somos_traslations.titulo','quienes_somos_traslations.descripcion')
            ->paginate();
        return view('admin.quienessomos.index', compact('quienessomos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.quienessomos.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuienesSomosStoreRequest $request)
    {
        $validated = $request->validated();
        if($request->hasFile('imagen')){
            $validated['imagen'] = $request->imagen->store('quienessomos', 'public');
        }
        $quienessomos = QuienesSomos::create($validated);

        $locales = array('es', 'en', 'fr', 'de', 'it', 'pt');
        foreach($locales as $value)
        {
            $titulo = 'titulo_'.$value;
            $descripcion = 'descripcion_'.$value;
            QuienesSomosTraslation::create(
                [
                    'titulo'=>$request->$titulo,
                    'descripcion'=>$request->$descripcion,
                    'quienessomos_id'=>$quienessomos->id,
                    'locale'=>$value
                ]
            );
        }

        return redirect()->route('admin.content.quienes-somos.index')->with('success',__('cubanacan.add-content',['contenido'=>'Quienes Somos']));
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
        $quienessomos = QuienesSomos::find($id);
        $quienessomostraslation = QuienesSomosTraslation::where('quienessomos_id', $quienessomos->id)->get();
        $data = array();
        foreach ($quienessomostraslation as $item)
        {
            if($item['locale']=='es')
            {
                $data['titulo_es'] = $item['titulo'];
                $data['descripcion_es'] = $item['descripcion'];
            }
            if($item['locale']=='en')
            {
                $data['titulo_en']  = $item['titulo'];
                $data['descripcion_en'] = $item['descripcion'];
            }
            if($item['locale']=='fr')
            {
                $data['titulo_fr'] = $item['titulo'];
                $data['descripcion_fr'] = $item['descripcion'];
            }
            if($item['locale']=='de')
            {
                $data ['titulo_de']= $item['titulo'];
                $data['descripcion_de'] = $item['descripcion'];
            }
            if($item['locale']=='it')
            {
                $data ['titulo_it']= $item['titulo'];
                $data['descripcion_it'] = $item['descripcion'];
            }
            if($item['locale']=='pt')
            {
                $data ['titulo_pt']= $item['titulo'];
                $data['descripcion_pt'] = $item['descripcion'];
            }
        }

        return view('admin.quienessomos.edit',['quienessomos'=>$quienessomos],['quienessomostraslation'=>$data]);//
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(QuienesSomosUpdateRequest $request,$id)
    {
        $validated = $request->validated();
        $quienessomos = QuienesSomos::find($id);
        if($request->hasFile('imagen')){
            $old_file = $quienessomos->imagen;
            $validated['imagen'] = $request->imagen->store('quienessomos', 'public');
            $quienessomos->update($validated);
            Storage::disk('public')->delete($old_file);
        }
        else
        {
            $quienessomos->update();
        }
        $quienessomostraslation = QuienesSomosTraslation::where('quienessomos_id', $quienessomos->id)->get();
        foreach ($quienessomostraslation as $item)
        {
            $titulo = 'titulo_'.$item['locale'];
            $descripcion = 'descripcion_'.$item['locale'];
            $item->update([
                'titulo'=>$request->$titulo,
                'descripcion'=>$request->$descripcion
            ]);
        }
        //Input::flash();

        return redirect()->route('admin.content.quienes-somos.index')->with('success',__('cubanacan.edit-content',['contenido'=>'Quienes Somos']));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $quienessomos =QuienesSomos::find($id);
        Storage::disk('public')->delete($quienessomos->imagen);
        QuienesSomos::destroy($id);
        return redirect()->route('admin.content.quienes-somos.index')->with('success',__('cubanacan.delete-content',['contenido'=>'Quienes Somos']));
    }
}
