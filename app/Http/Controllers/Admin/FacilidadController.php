<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modelos\Facilidad;
use App\Modelos\FacilidadTraslation;
use App\Http\Requests\FacilidadStoreRequest;
use App\Http\Requests\FacilidadUpdateRequest;

class FacilidadController extends Controller
{

    public function __construct()
    {
        $this->middleware('hasPermission:facilidades.create')->only(['create','store']);
        $this->middleware('hasPermission:facilidades.destroy')->only(['destroy']);
        $this->middleware('hasPermission:facilidades.index')->only(['index']);
        $this->middleware('hasPermission:facilidades.edit')->only(['update','edit']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $facilidades = Facilidad::join("facilidad_traslations","facilidads.id","=","facilidad_traslations.facilidad_id")
            ->where('locale','=','es')
            ->select('facilidads.id','facilidad_traslations.facilidad','facilidads.created_by')
            ->paginate();
        return view('admin.facilidades.index',compact('facilidades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.facilidades.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FacilidadStoreRequest $request)
    {
        $validatedcategoria = $request->validated();
        $facilidades = Facilidad::create($validatedcategoria);
        $locales = array('es', 'en', 'fr', 'de', 'it', 'pt');

        foreach($locales as $value)
        {
            $facilidad= 'facilidad_'.$value;
            FacilidadTraslation::create(
                [
                    'facilidad'=>$request->$facilidad,
                    'facilidad_id'=>$facilidades->id,
                    'locale'=>$value
                ]
            );
        }

        return redirect()->route('admin.nomenclator.facilidades.index')->with('success',__('cubanacan.add-content',['contenido'=>'Facilidad']) );
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
        $facilidad = Facilidad::find($id);
        $facilidadtraslation = FacilidadTraslation::where('facilidad_id', $facilidad->id)->get();
        $data = array();
        foreach ($facilidadtraslation as $item)
        {
            if($item['locale']=='es')
            {
                $data['facilidad_es'] = $item['facilidad'];
            }
            if($item['locale']=='en')
            {
                $data['facilidad_en'] = $item['facilidad'];
            }
            if($item['locale']=='fr')
            {
                $data['facilidad_fr'] = $item['facilidad'];
            }
            if($item['locale']=='de')
            {
                $data['facilidad_de'] = $item['facilidad'];
            }
            if($item['locale']=='it')
            {
                $data['facilidad_it'] = $item['facilidad'];
            }
            if($item['locale']=='pt')
            {
                $data['facilidad_pt'] = $item['facilidad'];
            }
        }

        return view('admin.facilidades.edit',['facilidad'=>$facilidad],['facilidadtraslation'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FacilidadUpdateRequest $request, $id)
    {
        $validated = $request->validated();
        $facilidades = Facilidad::find($id);
        $facilidades->update($validated);
        $facilidadtraslation = FacilidadTraslation::where('facilidad_id', $facilidades->id)->get();
        foreach ($facilidadtraslation as $item)
        {
            $facilidad = 'facilidad_'.$item['locale'];
            $item->update([
                'facilidad'=>$request->$facilidad,
            ]);
        }

        return redirect()->route('admin.nomenclator.facilidades.index')->with('success',__('cubanacan.edit-content',['contenido'=>'Facilidad']));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Facilidad::destroy($id);
        return redirect()->route('admin.nomenclator.facilidades.index')->with('success',__('cubanacan.delete-content',['contenido'=>'Facilidad']));
    }
}
