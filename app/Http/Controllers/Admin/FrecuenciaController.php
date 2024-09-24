<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modelos\Frecuencia;
use App\Modelos\FrecuenciaTraslation;
use App\Http\Requests\FrecuenciaUpdateRequest;
use App\Http\Requests\FrecuenciaStoreRequest;

class FrecuenciaController extends Controller
{

    public function __construct()
    {
        $this->middleware('hasPermission:frecuencia.create')->only(['create','store']);
        $this->middleware('hasPermission:frecuencia.destroy')->only(['destroy']);
        $this->middleware('hasPermission:frecuencia.index')->only(['index']);
        $this->middleware('hasPermission:frecuencia.edit')->only(['update','edit']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $frecuencias = Frecuencia::join("frecuencia_traslations","frecuencias.id","=","frecuencia_traslations.frecuencias_id")
            ->where('locale','=','es')
            ->select('frecuencias.id','frecuencia_traslations.frecuencia','frecuencias.created_by')
            ->paginate();
        return view('admin.frecuencias.index',compact('frecuencias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.frecuencias.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FrecuenciaStoreRequest $request)
    {
        $validatedfrecuencia = $request->validated();
        $fecuencias = Frecuencia::create($validatedfrecuencia);
        $locales = array('es', 'en', 'fr', 'de', 'it', 'pt');

        foreach($locales as $value)
        {
            $frecuencia= 'frecuencia_'.$value;
            FrecuenciaTraslation::create(
                [
                    'frecuencia'=>$request->$frecuencia,
                    'frecuencias_id'=>$fecuencias->id,
                    'locale'=>$value
                ]
            );
        }

        return redirect()->route('admin.nomenclator.frecuencia.index')->with('success',__('cubanacan.add-content',['contenido'=>'Frecuencia']) );
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
    public function edit($id)
    {
        $frecuencia = Frecuencia::find($id);
        $frecuenciatraslation = FrecuenciaTraslation::where('frecuencias_id', $frecuencia->id)->get();
        $data = array();
        foreach ($frecuenciatraslation as $item)
        {
            if($item['locale']=='es')
            {
                $data['frecuencia_es'] = $item['frecuencia'];
            }
            if($item['locale']=='en')
            {
                $data['frecuencia_en'] = $item['frecuencia'];
            }
            if($item['locale']=='fr')
            {
                $data['frecuencia_fr'] = $item['frecuencia'];
            }
            if($item['locale']=='de')
            {
                $data['frecuencia_de'] = $item['frecuencia'];
            }
            if($item['locale']=='it')
            {
                $data['frecuencia_it'] = $item['frecuencia'];
            }
            if($item['locale']=='pt')
            {
                $data['frecuencia_pt'] = $item['frecuencia'];
            }
        }

        return view('admin.frecuencias.edit',['frecuencia'=>$frecuencia],['frecuenciatraslation'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FrecuenciaUpdateRequest $request, $id)
    {
        $validated = $request->validated();
        $frecuencias = Frecuencia::find($id);
        $frecuencias->update($validated);
        $frecuenciastraslation = FrecuenciaTraslation::where('frecuencias_id', $frecuencias->id)->get();
        foreach ($frecuenciastraslation as $item)
        {
            $frecuencia= 'frecuencia_'.$item['locale'];
            $item->update([
                'frecuencia'=>$request->$frecuencia,
            ]);
        }

        return redirect()->route('admin.nomenclator.frecuencia.index')->with('success',__('cubanacan.edit-content',['contenido'=>'Frecuencia']));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Frecuencia::destroy($id);
        return redirect()->route('admin.nomenclator.frecuencia.index')->with('success',__('cubanacan.delete-content',['contenido'=>'Frecuencia']));

    }
}
