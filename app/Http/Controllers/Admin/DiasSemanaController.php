<?php

namespace App\Http\Controllers\Admin;

use App\Modelos\DiasSemanaTraslation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Modelos\DiasSemana;
use App\Http\Requests\DiasSemanaStoreRequest;
use App\Http\Requests\DiasSemanaUpdateRequest;

class DiasSemanaController extends Controller
{

    public function __construct()
    {
        $this->middleware('hasPermission:dias-semana.create')->only(['create','store']);
        $this->middleware('hasPermission:dias-semana.destroy')->only(['destroy']);
        $this->middleware('hasPermission:dias-semana.index')->only(['index']);
        $this->middleware('hasPermission:dias-semana.edit')->only(['update','edit']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $diassemana = DiasSemana::join("dias_semana_traslations","dias_semanas.id","=","dias_semana_traslations.dias_semanas_id")
            ->where('locale','=','es')
            ->select('dias_semanas.id','dias_semana_traslations.diassemana','dias_semanas.created_by')
            ->paginate();
        return view('admin.diassemana.index',compact('diassemana'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.diassemana.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DiasSemanaStoreRequest $request)
    {
        $validateddiassemana = $request->validated();
       $diassemanas =  DiasSemana::create($validateddiassemana);
        $locales = array('es', 'en', 'fr', 'de', 'it', 'pt');

        foreach($locales as $value)
        {
            $diassemana= 'diassemana_'.$value;
            DiasSemanaTraslation::create(
                [
                    'diassemana'=>$request->$diassemana,
                    'dias_semanas_id'=>$diassemanas->id,
                    'locale'=>$value
                ]
            );
        }

        return redirect()->route('admin.nomenclator.dias-semana.index')->with('success',__('cubanacan.add-content',['contenido'=>'Días de la Semana']) );

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
        $diassemana = DiasSemana::find($id);
        $diassemanatraslation = DiasSemanaTraslation::where('dias_semanas_id', $diassemana->id)->get();
        $data = array();
        foreach ($diassemanatraslation as $item)
        {
            if($item['locale']=='es')
            {
                $data['diassemana_es'] = $item['diassemana'];
            }
            if($item['locale']=='en')
            {
                $data['diassemana_en'] = $item['diassemana'];
            }
            if($item['locale']=='fr')
            {
                $data['diassemana_fr'] = $item['diassemana'];
            }
            if($item['locale']=='de')
            {
                $data['diassemana_de'] = $item['diassemana'];
            }
            if($item['locale']=='it')
            {
                $data['diassemana_it'] = $item['diassemana'];
            }
            if($item['locale']=='pt')
            {
                $data['diassemana_pt'] = $item['diassemana'];
            }
        }

        return view('admin.diassemana.edit',['diassemana'=>$diassemana],['diassemanatraslation'=>$data]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DiasSemanaUpdateRequest $request, $id)
    {
        $validated = $request->validated();
        $diassemana = DiasSemana::find($id);
        $diassemana->update($validated);
        $diassemanatraslation = DiasSemanaTraslation::where('dias_semanas_id', $diassemana->id)->get();
        foreach ($diassemanatraslation as $item)
        {
            $dias = 'diassemana_'.$item['locale'];
            $item->update([
                'diassemana'=>$request->$dias,
            ]);
        }

        return redirect()->route('admin.nomenclator.dias-semana.index')->with('success',__('cubanacan.edit-content',['contenido'=>'Días de la Semana']));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DiasSemana::destroy($id);
        return redirect()->route('admin.nomenclator.dias-semana.index')->with('success',__('cubanacan.delete-content',['contenido'=>'Días de la Semana']));

    }
}
