<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modelos\Servicio;
use App\Modelos\ServicioTraslation;
use App\Http\Requests\ServicioTraslationUpdateRequest;
use App\Http\Requests\ServicioTraslationStoreRequest;

class ServicioController extends Controller
{

    public function __construct()
    {
        $this->middleware('hasPermission:contactos.create')->only(['create','store']);
        $this->middleware('hasPermission:servicios.destroy')->only(['destroy']);
        $this->middleware('hasPermission:servicios.index')->only(['index']);
        $this->middleware('hasPermission:servicios.edit')->only(['update','edit']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $servicios = Servicio::join("servicio_traslations","servicios.id","=","servicio_traslations.servicio_id")
            ->where('locale','=','es')
            ->select('servicios.id','servicios.created_by','servicio_traslations.descripcion')
            ->paginate();
        return view('admin.servicios.index', compact('servicios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Servicio $servicios)
    {
        return view('admin.servicios.add',compact('servicios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ServicioTraslationStoreRequest $request)
    {
        $validatedcontacto = $request->validated();
        $servicio = Servicio::create($validatedcontacto);
        $locales = array('es', 'en', 'fr', 'de', 'it', 'pt');

        foreach($locales as $value)
        {
            $descripcion = 'descripcion_'.$value;
            ServicioTraslation::create([
                'descripcion'=>$request->$descripcion,
                'locale'=>$value,
                'servicio_id'=>$servicio->id
            ]);
        }

        return redirect()->route('admin.content.servicios.index')->with('success',__('cubanacan.add-content',['contenido'=>'Servicio']) );
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
        $servicio = Servicio::find($id);
        $serviciostraslation = ServicioTraslation::where('servicio_id', $servicio->id)->get();
        $descripciones = array();
        foreach ($serviciostraslation as $item)
        {
            if($item['locale']=='es')
            {
                $descripciones['descripcion_es'] = $item['descripcion'];
            }
            if($item['locale']=='en')
            {
                $descripciones['descripcion_en']  = $item['descripcion'];
            }
            if($item['locale']=='fr')
            {
                $descripciones['descripcion_fr'] = $item['descripcion'];
            }
            if($item['locale']=='de')
            {
                $descripciones ['descripcion_de']= $item['descripcion'];
            }
            if($item['locale']=='it')
            {
                $descripciones ['descripcion_it']= $item['descripcion'];
            }
            if($item['locale']=='pt')
            {
                $descripciones ['descripcion_pt']= $item['descripcion'];
            }
        }
        return view('admin.servicios.edit',['servicio'=>$servicio],['serviciotraslation'=>$descripciones]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ServicioTraslationUpdateRequest $request, $id)
    {
        $validatedcontacto = $request->validated();
        $servicio = Servicio::find($id);
        $servicio->update();
        $serviciostraslation = ServicioTraslation::where('servicio_id', $servicio->id)->get();
        foreach ($serviciostraslation as $item)
        {
            $descripcion = 'descripcion_'.$item['locale'];
            $item->update([
                'descripcion'=>$request->$descripcion
            ]);
        }
        return redirect()->route('admin.content.servicios.index')->with('success',__('cubanacan.edit-content',['contenido'=>'Servicio']));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Servicio::destroy($id);
//        event(new UpdatedSite());
        return redirect()->route('admin.content.servicios.index')->with('success',__('cubanacan.delete-content',['contenido'=>'Servicio']));
    }
}
