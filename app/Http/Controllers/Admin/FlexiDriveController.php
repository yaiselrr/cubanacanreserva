<?php

namespace App\Http\Controllers\Admin;

use App\Modelos\TarifarioFFD;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modelos\FlexiDrive;
use App\Modelos\FlexiDriveTraslation;
use App\Modelos\DiasAntelacionReserva;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\FlexiDriveStoreRequest;
use App\Imports\TarifarioFFDImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\FlexiDriveUpdateRequest;

class FlexiDriveController extends Controller
{

    public function __construct()
    {
        $this->middleware('hasPermission:flexi-drive.create')->only(['create','store']);
        $this->middleware('hasPermission:flexi-drive.destroy')->only(['destroy']);
        $this->middleware('hasPermission:flexi-drive.index')->only(['index']);
        $this->middleware('hasPermission:flexi-drive.edit')->only(['update','edit']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $flexidrives = FlexiDrive::join("dias_antelacion_reservas","dias_antelacion_reservas.id","=","flexi_drives.dias_antelacion_rese_alta_id" )
            ->select('flexi_drives.id','dias_antelacion_reservas.dias','flexi_drives.imagen'
                ,'flexi_drives.dias_antelacion_rese_alta_id'
                ,'flexi_drives.dias_antelacion_rese_baja_id','flexi_drives.created_by')
            ->paginate();
        return view('admin.flexidrives.index', compact('flexidrives'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $diasantelacionreservas = DiasAntelacionReserva::all();
        return view('admin.flexidrives.add',compact('diasantelacionreservas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FlexiDriveStoreRequest $request)
    {
        $validated = $request->validated();
        //dd($validated);

        if($request->hasFile('tarifario_FFD')){
            $validated ['tarifario_FFD']= $request->tarifario_FFD->store('flexidrive', 'public');
            Excel::import(new TarifarioFFDImport, $request->file('tarifario_FFD'));
        }
        if($request->hasFile('imagen')){
            $validated ['imagen']= $request->imagen->store('flexidrive', 'public');
        }
        elseif($request->hasFile('fichero_listado_hoteles')){
            $validated ['fichero_listado_hoteles']= $request->fichero_listado_hoteles->store('flexidrive', 'public');
        }
        elseif($request->hasFile('fichero_informacion_ampliada')){
            $validated ['fichero_informacion_ampliada']= $request->fichero_informacion_ampliada->store('flexidrive', 'public');
        }
        $flexidrive = FlexiDrive::create($validated);

        $locales = array('es', 'en', 'fr', 'de', 'it', 'pt');
        foreach($locales as $value)
        {
            $descripcion_general = 'descripcion_general_'.$value;
            $descripcion_hoteles = 'descripcion_hoteles_'.$value;
            $descripcion_autos = 'descripcion_autos_'.$value;
            FlexiDriveTraslation::create(
                [
                    'descripcion_general'=>$request->$descripcion_general,
                    'descripcion_hoteles'=>$request->$descripcion_hoteles,
                    'descripcion_autos'=>$request->$descripcion_autos,
                    'flexi_drive_id'=>$flexidrive->id,
                    'locale'=>$value
                ]
            );
        }
        return redirect()->route('admin.content.flexi-drive.index')->with('success',__('cubanacan.add-content',['contenido'=>'Flexi & Drive']) );
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
        $flexidrive = FlexiDrive::find($id);
        $diasantelacionreservas = DiasAntelacionReserva::all();
        $flexidrivetraslation = FlexiDriveTraslation::where('flexi_drive_id', $flexidrive->id)->get();
        $data = array();
        foreach ($flexidrivetraslation as $item)
        {
            if($item['locale']=='es')
            {
                $data['descripcion_general_es'] = $item['descripcion_general'];
                $data['descripcion_hoteles_es'] = $item['descripcion_hoteles'];
                $data['descripcion_autos_es'] = $item['descripcion_autos'];
            }
            if($item['locale']=='en')
            {
                $data['descripcion_general_en'] = $item['descripcion_general'];
                $data['descripcion_hoteles_en'] = $item['descripcion_hoteles'];
                $data['descripcion_autos_en'] = $item['descripcion_autos'];
            }
            if($item['locale']=='fr')
            {
                $data['descripcion_general_fr'] = $item['descripcion_general'];
                $data['descripcion_hoteles_fr'] = $item['descripcion_hoteles'];
                $data['descripcion_autos_fr'] = $item['descripcion_autos'];
            }
            if($item['locale']=='de')
            {
                $data['descripcion_general_de'] = $item['descripcion_general'];
                $data['descripcion_hoteles_de'] = $item['descripcion_hoteles'];
                $data['descripcion_autos_de'] = $item['descripcion_autos'];
            }
            if($item['locale']=='it')
            {
                $data['descripcion_general_it'] = $item['descripcion_general'];
                $data['descripcion_hoteles_it'] = $item['descripcion_hoteles'];
                $data['descripcion_autos_it'] = $item['descripcion_autos'];
            }
            if($item['locale']=='pt')
            {
                $data['descripcion_general_pt'] = $item['descripcion_general'];
                $data['descripcion_hoteles_pt'] = $item['descripcion_hoteles'];
                $data['descripcion_autos_pt'] = $item['descripcion_autos'];
            }
        }

        return view('admin.flexidrives.edit',['flexidrive'=>$flexidrive],compact('diasantelacionreservas','data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FlexiDriveUpdateRequest $request, $id)
    {
        $validated = $request->validated();
        $flexidrive = FlexiDrive::find($id);

        if($request->hasFile('imagen')){
            $old_file = $flexidrive->imagen;
            $validated['imagen'] = $request->imagen->store('flexidrive', 'public');
            $flexidrive->update($validated);
            Storage::disk('public')->delete($old_file);
        }
        elseif ($request->hasFile('tarifario_FFD'))
        {
            $old_file = $flexidrive->tarifario_FFD;
            $validated['tarifario_FFD'] = $request->tarifario_FFD->store('flexidrive', 'public');
            $flexidrive->update($validated);
            Storage::disk('public')->delete($old_file);

            TarifarioFFD::where('created_by','Admin')->delete();
            Excel::import(new TarifarioFFDImport, $request->file('tarifario_FFD'));
        }
        elseif ($request->hasFile('fichero_listado_hoteles'))
        {
            $old_file = $flexidrive->fichero_listado_hoteles;
            $validated['fichero_listado_hoteles'] = $request->fichero_listado_hoteles->store('flexidrive', 'public');
            $flexidrive->update($validated);
            Storage::disk('public')->delete($old_file);
        }
        elseif ($request->hasFile('fichero_informacion_ampliada'))
        {
            $old_file = $flexidrive->fichero_informacion_ampliada;
            $validated['fichero_informacion_ampliada'] = $request->fichero_informacion_ampliada->store('flexidrive', 'public');
            $flexidrive->update($validated);
            Storage::disk('public')->delete($old_file);
        }
        else
        {
            $flexidrive->update($validated);
        }

        $flexidrivetraslation = FlexiDriveTraslation::where('flexi_drive_id', $flexidrive->id)->get();
        foreach ($flexidrivetraslation as $item)
        {
            $descripcion_general = 'descripcion_general_'.$item['locale'];
            $descripcion_hoteles = 'descripcion_hoteles_'.$item['locale'];
            $descripcion_autos = 'descripcion_autos_'.$item['locale'];
            $item->update([
                'descripcion_general'=>$request->$descripcion_general,
                'descripcion_hoteles'=>$request->$descripcion_hoteles,
                'descripcion_autos'=>$request->$descripcion_autos
            ]);
        }


        return redirect()->route('admin.content.flexi-drive.index')->with('success',__('cubanacan.edit-content',['contenido'=>'Flexi & Drive']));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $flexydrive =FlexiDrive::find($id);
        Storage::disk('public')->delete($flexydrive->imagen);
        Storage::disk('public')->delete($flexydrive->fichero_listado_hoteles);
        Storage::disk('public')->delete($flexydrive->fichero_informacion_ampliada);
        FlexiDrive::destroy($id);
       // TarifarioFFD::where('created_by','Admin')->delete();
        return redirect()->route('admin.content.flexi-drive.index')->with('success',__('cubanacan.edit-content',['contenido'=>'Flexi & Drive']));
    }
}
