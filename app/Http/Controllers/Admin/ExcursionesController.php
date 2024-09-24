<?php

namespace App\Http\Controllers\Admin;

use App\Modelos\Modalidad;
use App\Modelos\Producto;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modelos\Excursiones;
use App\Modelos\ExcursionesTraslation;
use App\Modelos\Frecuencia;
use App\Modelos\Provincia;
use App\Modelos\Idioma;
use App\Modelos\DiasAntelacionReserva;
use App\Modelos\Duracion;
use App\Modelos\DiasSemana;

use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ExcursionesStoreRequest;
use App\Http\Requests\ExcursionesUpdateRequest;

class ExcursionesController extends Controller
{

    public function __construct()
    {
        $this->middleware('hasPermission:excursiones.create')->only(['create','store']);
        $this->middleware('hasPermission:excursiones.destroy')->only(['destroy']);
        $this->middleware('hasPermission:excursiones.index')->only(['index']);
        $this->middleware('hasPermission:excursiones.edit')->only(['update','edit']);
        $this->middleware('hasPermission:excursiones.index')->only(['index']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $excursiones = Excursiones::join("excursiones_traslations","excursiones.id","=","excursiones_traslations.excursiones_id")
            ->where('excursiones_traslations.locale','=','es')
            ->join("modalidads","modalidads.id","=","excursiones.modalidads_id")
            ->join("provincias as provorigen","provorigen.id","=","excursiones.territorio_origen_id")
            ->join("provincias as provdestino","provdestino.id","=","excursiones.territorio_destino_id")
            ->join("modalidad_traslations","modalidad_traslations.modalidads_id","=","excursiones.modalidads_id")
            ->where('modalidad_traslations.idioma','=','es')
            ->select('excursiones.id','modalidad_traslations.nombre as modalidad','excursiones.modalidads_id','excursiones.nombre',
                'provorigen.provincia as origen','provdestino.provincia as destino','excursiones.territorio_origen_id','excursiones.territorio_destino_id'
                ,'excursiones.created_by')
            ->paginate();
        return view('admin.excursiones.index', compact('excursiones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ofertaespeciales = [
            ['value'=>'Activo','oferta'=>'Activo'],
            ['value'=>'Inactivo','oferta'=>'Inactivo'],
        ];

        $estados = [
            ['value'=>'Activo','estado'=>'Activo'],
            ['value'=>'Inactivo','estado'=>'Inactivo'],
        ];
        $diassemanas = DiasSemana::join("dias_semana_traslations","dias_semanas.id","=","dias_semana_traslations.dias_semanas_id")
            ->where('locale','=','es')
            ->select('dias_semanas.id','dias_semana_traslations.diassemana','dias_semana_traslations.dias_semanas_id')->get();
        $provincias = Provincia::all();
        $duracion = Duracion::all();
        $frecuencia = Frecuencia::join("frecuencia_traslations","frecuencias.id","=","frecuencia_traslations.frecuencias_id")
            ->where('locale','=','es')
            ->select('frecuencias.id','frecuencia_traslations.frecuencia','frecuencia_traslations.frecuencias_id')->get();
        $modalidades = Modalidad::join("modalidad_traslations","modalidads.id","=","modalidad_traslations.modalidads_id")
            ->where('idioma','=','es')
            ->select('modalidads.id','modalidad_traslations.nombre','modalidad_traslations.modalidads_id')->get();
        $diasantelacionreservas = DiasAntelacionReserva::all();
        $idiomas = Idioma::all();
        return view('admin.excursiones.add',compact('ofertaespeciales','provincias'
            ,'duracion','frecuencia','idiomas','estados','diasantelacionreservas','diassemanas','modalidades'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ExcursionesStoreRequest $request)
    {
        $validated = $request->validated();
        $idiomas = implode(',', $request->input('idioma_id'));
        $diassemana = implode(',', $request->input('dias_semana_ids'));
        $validated['idioma_id'] = $idiomas;
        $validated['dias_semana_ids'] = $diassemana;


        $validated['excursion_auto_clasico'] = $request->filled('excursion_auto_clasico');
        $validated['excursion_unica'] = $request->filled('excursion_unica');
        $validated['excursion_alimentacion'] = $request->filled('excursion_alimentacion');
        $validated['excursion_habitacion'] = $request->filled('excursion_habitacion');
        $validated['excursion_pinar_vinnales'] = $request->filled('excursion_pinar_vinnales');
        $validated['excursion_cicloturismo'] = $request->filled('excursion_cicloturismo');
        $validated['excursion_delfines'] = $request->filled('excursion_delfines');

        if($request->hasFile('imagen')){
            $validated ['imagen']= $request->imagen->store('excursiones', 'public');
        }
        $excursiones = Excursiones::create($validated);

        //guardar en tabla producto
        Producto::create([
            'producto_id' => $excursiones->id,
            'tipo_producto' => 'excursion',
            'oferta_especial' => ($validated['oferta_especial'] == 'Activo') ? 1 : 0,
            'provincia_id' => $excursiones->territorio_destino_id
        ]);

        $locales = array('es', 'en', 'fr', 'de', 'it', 'pt');
        foreach($locales as $value)
        {
            $descripcion = 'descripcion_'.$value;

            ExcursionesTraslation::create(
                [
                    'descripcion'=>$request->$descripcion,
                    'excursiones_id'=>$excursiones->id,
                    'locale'=>$value
                ]
            );
        }
        return redirect()->route('admin.content.excursiones.index')->with('success',__('cubanacan.add-content',['contenido'=>'Excursiones']) );
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
        $ofertaespeciales = [
            ['value'=>'Activo','oferta'=>'Activo'],
            ['value'=>'Inactivo','oferta'=>'Inactivo'],
        ];

        $estados = [
            ['value'=>'Activo','estado'=>'Activo'],
            ['value'=>'Inactivo','estado'=>'Inactivo'],
        ];


        $diassemanas = DiasSemana::join("dias_semana_traslations","dias_semanas.id","=","dias_semana_traslations.dias_semanas_id")
            ->where('locale','=','es')
            ->select('dias_semanas.id','dias_semana_traslations.diassemana','dias_semana_traslations.dias_semanas_id')->get();
        $provincias = Provincia::all();
        $duracion = Duracion::all();
        $modalidades = Modalidad::join("modalidad_traslations","modalidads.id","=","modalidad_traslations.modalidads_id")
            ->where('idioma','=','es')
            ->select('modalidads.id','modalidad_traslations.nombre','modalidad_traslations.modalidads_id')->get();
        $frecuencia = Frecuencia::join("frecuencia_traslations","frecuencias.id","=","frecuencia_traslations.frecuencias_id")
            ->where('locale','=','es')
            ->select('frecuencias.id','frecuencia_traslations.frecuencia','frecuencia_traslations.frecuencias_id')->get();
        $diasantelacionreservas = DiasAntelacionReserva::all();
        $idiomas = Idioma::all();

        $excursion = Excursiones::find($id);

        $excursionestraslation = ExcursionesTraslation::where('excursiones_id', $excursion->id)->get();
        $data = array();
        foreach ($excursionestraslation as $item)
        {
            if($item['locale']=='es')
            {
                $data['descripcion_es'] = $item['descripcion'];
            }
            if($item['locale']=='en')
            {
                $data['descripcion_en'] = $item['descripcion'];
            }
            if($item['locale']=='fr')
            {
                $data['descripcion_fr'] = $item['descripcion'];
            }
            if($item['locale']=='de')
            {
                $data['descripcion_de'] = $item['descripcion'];
            }
            if($item['locale']=='it')
            {
                $data['descripcion_it'] = $item['descripcion'];
            }
            if($item['locale']=='pt')
            {
                $data['descripcion_pt'] = $item['descripcion'];
            }
        }

        return view('admin.excursiones.edit',['excursion'=>$excursion],compact('ofertaespeciales','provincias'
            ,'duracion','frecuencia','idiomas','estados','diasantelacionreservas','diassemanas','modalidades','data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ExcursionesUpdateRequest $request, $id)
    {
        $validated = $request->validated();
        $idiomas = implode(',', $request->input('idioma_id'));
        $diassemana = implode(',', $request->input('dias_semana_ids'));

        $validated['idioma_id'] = $idiomas;
        $validated['dias_semana_ids'] = $diassemana;

        $validated['excursion_auto_clasico'] = $request->filled('excursion_auto_clasico');
        $validated['excursion_unica'] = $request->filled('excursion_unica');
        $validated['excursion_alimentacion'] = $request->filled('excursion_alimentacion');
        $validated['excursion_habitacion'] = $request->filled('excursion_habitacion');

        if($request->filled('excursion_auto_clasico')) {
            $validated['excursion_auto_clasico'] = $request->filled('excursion_auto_clasico');
        }
        else{
            $validated['precio_pax_auto'] = $request->get('precio_pax_auto');
            $validated['hora_salida_auto'] = $request->get('hora_salida_auto');
            $validated['excursion_auto_clasico'] = $request->filled('excursion_auto_clasico');
        }
        if($request->filled('excursion_unica')) {
            $validated['excursion_unica'] = $request->filled('excursion_unica');
        }
        else{
            $validated['precio_ninnos2a12annos_unica'] = $request->get('precio_ninnos2a12annos_unica');
            $validated['precio_pax_unica'] = $request->get('precio_pax_unica');
            $validated['excursion_unica'] = $request->filled('excursion_unica');
        }
        if($request->filled('excursion_alimentacion')) {
            $validated['excursion_alimentacion'] = $request->filled('excursion_alimentacion');
        }
        else{
            $validated['precio_pax_almuerzo'] = $request->get('precio_pax_almuerzo');
            $validated['precio_ninnos2a12anno_almuerzo'] = $request->get('precio_ninnos2a12anno_almuerzo');
            $validated['precio_pax_sin_almuerzo'] = $request->get('precio_pax_auto');
            $validated['precio_ninnos2a12anno_sin_almuerzo'] = $request->get('precio_ninnos2a12anno_sin_almuerzo');
            $validated['precio_pax_TI'] = $request->get('precio_pax_TI');
            $validated['precio_ninnos2a12anno_TI'] = $request->get('precio_ninnos2a12anno_TI');
            $validated['excursion_alimentacion'] = $request->filled('excursion_alimentacion');
        }
        if($request->filled('excursion_habitacion')) {
            $validated['excursion_habitacion'] = $request->filled('excursion_habitacion');
        }
        else{
            $validated['precio_pax_almuerzo'] = $request->get('precio_pax_almuerzo');
            $validated['precio_pax_hab_sencilla'] = $request->get('precio_pax_hab_sencilla');
            $validated['precio_ninnos2a12anno_hab_sencilla'] = $request->get('precio_ninnos2a12anno_hab_sencilla');
            $validated['precio_pax_hab_dobles'] = $request->get('precio_pax_hab_dobles');
            $validated['precio_ninnos2a12anno_hab_dobles'] = $request->get('precio_ninnos2a12anno_hab_dobles');
            $validated['excursion_habitacion'] = $request->filled('excursion_habitacion');
        }
        if($request->filled('excursion_pinar_vinnales')) {
            $validated['excursion_pinar_vinnales'] = $request->filled('excursion_pinar_vinnales');
        }
        else{
            $validated['precio_pax_Pinar'] = $request->get('precio_pax_Pinar');
            $validated['precio_ninnos2a12anno_Pinar'] = $request->get('precio_ninnos2a12anno_Pinar');
            $validated['precio_pax_Vinnales'] = $request->get('precio_pax_Vinnales');
            $validated['precio_ninnos2a12anno_Vinnales'] = $request->get('precio_ninnos2a12anno_Vinnales');
            $validated['excursion_pinar_vinnales'] = $request->filled('excursion_pinar_vinnales');
        }
        if($request->filled('excursion_cicloturismo')) {
            $validated['excursion_cicloturismo'] = $request->filled('excursion_cicloturismo');
        }
        else{
            $validated['precio_pax_con_canopy'] = $request->get('precio_pax_con_canopy');
            $validated['precio_pax_sin_canopy'] = $request->get('precio_pax_sin_canopy');
            $validated['excursion_cicloturismo'] = $request->filled('excursion_cicloturismo');
        }
        if($request->filled('excursion_delfines')) {
            $validated['excursion_delfines'] = $request->filled('excursion_delfines');
        }
        else{
            $validated['precio_pax_banno_delfines'] = $request->get('precio_pax_banno_delfines');
            $validated['precio_ninnos2a12anno_banno_delfines'] = $request->get('precio_ninnos2a12anno_banno_delfines');
            $validated['precio_pax_show_delfines'] = $request->get('precio_pax_show_delfines');
            $validated['precio_ninnos2a12anno_show_delfines'] = $request->get('precio_ninnos2a12anno_show_delfines');
            $validated['excursion_delfines'] = $request->filled('excursion_delfines');
        }
        $excursion= Excursiones::find($id);

        //modificar en tabla producto
        $producto = Producto::where([['producto_id', $id],['tipo_producto','excursion']])->first();
        if ($producto) {
            $producto->oferta_especial = ($validated['oferta_especial'] == 'Activo') ? 1 : 0;
            $producto->provincia_id = $excursion->territorio_destino_id;
            $producto->save();
        } else {
            Producto::create([
                'producto_id' => $excursion->id,
                'tipo_producto' => 'excursion',
                'oferta_especial' => ($validated['oferta_especial'] == 'Activo') ? 1 : 0,
                'provincia_id' => $excursion->territorio_destino_id
            ]);
        }

        if($request->hasFile('imagen')){
            $old_file = $excursion->imagen;
            $validated['imagen'] = $request->imagen->store('excursiones', 'public');
            Storage::disk('public')->delete($old_file);
            //dd($validated);
            $excursion->update($validated);
        }
        else
        {
            $excursion->update($validated);
        }

        $excursionestraslation = ExcursionesTraslation::where('excursiones_id', $excursion->id)->get();
        foreach ($excursionestraslation as $item)
        {
            $descripcion = 'descripcion_'.$item['locale'];
            $item->update([
                'descripcion'=>$request->$descripcion
            ]);
        }
        return redirect()->route('admin.content.excursiones.index')->with('success',__('cubanacan.edit-content',['contenido'=>'Excursiones']));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $excursiones =Excursiones::find($id);
        Storage::disk('public')->delete($excursiones->imagen);
        Excursiones::destroy($id);
        return redirect()->route('admin.content.excursiones.index')->with('success',__('cubanacan.delete-content',['contenido'=>'Excursiones']));
    }
}
