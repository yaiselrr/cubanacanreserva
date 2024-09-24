<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ViajesMedidaStoreRequest;
use App\Http\Requests\ViajesMedidaUpdateRequest;
use App\Modelos\Producto;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modelos\ViajesMedida;
use App\Modelos\ViajesMedidaTraslation;
use App\Modelos\Provincia;
use Illuminate\Support\Facades\Storage;

class ViajesMedidaController extends Controller
{

    public function __construct()
    {
        $this->middleware('hasPermission:viajes-medidas.create')->only(['create','store']);
        $this->middleware('hasPermission:viajes-medidas.destroy')->only(['destroy']);
        $this->middleware('hasPermission:viajes-medidas.index')->only(['index']);
        $this->middleware('hasPermission:viajes-medidas.edit')->only(['update','edit']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $viajesmedidas =  ViajesMedida::join("viajes_medida_traslations","viajes_medidas.id","=","viajes_medida_traslations.viaje_medida_id")
            ->where('locale','=','es')
            ->join("provincias","provincias.id","=","viajes_medidas.provincia_id")
            ->select('viajes_medidas.id','provincias.provincia','viajes_medidas.provincia_id','viajes_medidas.created_by','viajes_medidas.nombre','viajes_medida_traslations.descripcion')
            ->paginate();
        return view('admin.viajesmedidas.index', compact('viajesmedidas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $provincias = Provincia::all();
        return view('admin.viajesmedidas.add',compact('provincias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ViajesMedidaStoreRequest $request)
    {
        $validated = $request->validated();
        if($request->hasFile('imagen')){
            $validated ['imagen']= $request->imagen->store('viajesmedida', 'public');
        }
        $viajesmedida = ViajesMedida::create($validated);

        Producto::create([
            'producto_id' => $viajesmedida->id,
            'tipo_producto' => 'viaje',
            'oferta_especial' => 0,
            'provincia_id' => $viajesmedida->provincia_id
        ]);
        $locales = array('es', 'en', 'fr', 'de', 'it', 'pt');
        foreach($locales as $value)
        {
            $descripcion = 'descripcion_'.$value;
            ViajesMedidaTraslation::create([
                'descripcion'=>$request->$descripcion,
                'locale'=>$value,
                'viaje_medida_id'=>$viajesmedida->id
            ]);
        }

        return redirect()->route('admin.content.viajes-medidas.index')->with('success',__('cubanacan.add-content',['contenido'=>'Viajes a la Medida']) );
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
        $viajesmedida = ViajesMedida::find($id);
        $viajesmedidatraslation = ViajesMedidaTraslation::where('viaje_medida_id', $viajesmedida->id)->get();
        $provincias = Provincia::all();
        $descripcion = array();
        foreach ($viajesmedidatraslation as $item)
        {
            if($item['locale']=='es')
            {
                $descripcion['descripcion_es'] = $item['descripcion'];
            }
            if($item['locale']=='en')
            {
                $descripcion['descripcion_en']  = $item['descripcion'];
            }
            if($item['locale']=='fr')
            {
                $descripcion['descripcion_fr'] = $item['descripcion'];
            }
            if($item['locale']=='de')
            {
                $descripcion ['descripcion_de']= $item['descripcion'];
            }
            if($item['locale']=='it')
            {
                $descripcion ['descripcion_it']= $item['descripcion'];
            }
            if($item['locale']=='pt')
            {
                $descripcion ['descripcion_pt']= $item['descripcion'];
            }
        }
        return view('admin.viajesmedidas.edit',['viajesmedida'=>$viajesmedida],compact('provincias','descripcion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ViajesMedidaUpdateRequest $request, $id)
    {
        $validated = $request->validated();
        //$contact->contactos_translations()->update();
        $viajesmedida = ViajesMedida::find($id);

        //modificar en tabla producto
        $producto = Producto::where([['producto_id', $id],['tipo_producto','hotel']])->first();
        if ($producto) {
            $producto->oferta_especial = 0;
            $producto->provincia_id = $viajesmedida->provincia_id;
            $producto->save();
        } else {
            Producto::create([
                'producto_id' => $viajesmedida->id,
                'tipo_producto' => 'hotel',
                'oferta_especial' => 0,
                'provincia_id' => $viajesmedida->provincia_id
            ]);
        }
        if($request->hasFile('imagen')){
            $old_file = $viajesmedida->imagen;
            $validated['imagen'] = $request->imagen->store('viajesmedida', 'public');
            $viajesmedida->update($validated);
            Storage::disk('public')->delete($old_file);
        }
        else
        {
            $viajesmedida->update($validated);
        }

        $viajesmedidatraslation = ViajesMedidaTraslation::where('viaje_medida_id', $viajesmedida->id)->get();
        foreach ($viajesmedidatraslation as $item)
        {
            $descripcion = 'descripcion_'.$item['locale'];
            $item->update([
                'descripcion'=>$request->$descripcion
            ]);
        }
        return redirect()->route('admin.content.viajes-medidas.index')->with('success',__('cubanacan.edit-content',['contenido'=>'Viajes a la Medida']));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $viajemedida = ViajesMedida::find($id);
        Storage::disk('public')->delete($viajemedida->imagen);
        ViajesMedida::destroy($id);
        return redirect()->route('admin.content.viajes-medidas.index')->with('success',__('cubanacan.delete-content',['contenido'=>'Viajes a la Medida']));
    }
}
