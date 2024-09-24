<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modelos\AutosFlexiFlyDrive;
use App\Modelos\AutosFlexiFlyDriveTraslation;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\AutosFlexiFlyDriveStoreRequest;
use App\Http\Requests\AutosFlexiFlyDriveUpdateRequest;
use App\Http\Requests\AutosFlexiFlyDriveTraslationStoreRequest;

class AutosFlexiFlyDriveController extends Controller
{

    public function __construct()
    {
        $this->middleware('hasPermission:autos-flexifly-drive.create')->only(['create','store']);
        $this->middleware('hasPermission:autos-flexifly-drive.destroy')->only(['destroy']);
        $this->middleware('hasPermission:autos-flexifly-drive.index')->only(['index']);
        $this->middleware('hasPermission:autos-flexifly-drive.edit')->only(['update','edit']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $autosflexiflydrive = AutosFlexiFlyDrive::join("autos_flexi_fly_drive_traslations","autos_flexi_fly_drives.id","=","autos_flexi_fly_drive_traslations.autosdrive_id")
            ->where('locale','=','es')
            ->select('autos_flexi_fly_drives.id','autos_flexi_fly_drives.tipo','autos_flexi_fly_drives.capacidad_pasajero','autos_flexi_fly_drives.created_by','autos_flexi_fly_drive_traslations.caracteristicas')
            ->paginate();
        return view('admin.autosflexiflydrives.index', compact('autosflexiflydrive'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(AutosFlexiFlyDrive $autosflexiflydrive)
    {
        return view('admin.autosflexiflydrives.add',compact('autosflexiflydrive'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AutosFlexiFlyDriveStoreRequest $request)
    {
        $validated = $request->validated();

        if($request->hasFile('imagen')){
            $validated ['imagen']= $request->imagen->store('autosflexifly', 'public');
        }
        $autosflexiflydrive = AutosFlexiFlyDrive::create($validated);

        $locales = array('es', 'en', 'fr', 'de', 'it', 'pt');
        foreach($locales as $value)
        {
            $caracteristicas = 'caracteristicas_'.$value;
            AutosFlexiFlyDriveTraslation::create([
                'caracteristicas'=>$request->$caracteristicas,
                'locale'=>$value,
                'autosdrive_id'=>$autosflexiflydrive->id
            ]);
        }
        return redirect()->route('admin.content.autos-flexifly-drive.index')->with('success',__('cubanacan.add-content',['contenido'=>'Autos FlexiFly & Drive']) );
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
        $autosflexiflydrive = AutosFlexiFlyDrive::find($id);
        $autosflexiflydrivetraslation = AutosFlexiFlyDriveTraslation::where('autosdrive_id', $autosflexiflydrive->id)->get();
        $caracteristicas = array();
        foreach ($autosflexiflydrivetraslation as $item)
        {
            if($item['locale']=='es')
            {
                $caracteristicas['caracteristicas_es'] = $item['caracteristicas'];
            }
            if($item['locale']=='en')
            {
                $caracteristicas['caracteristicas_en']  = $item['caracteristicas'];
            }
            if($item['locale']=='fr')
            {
                $caracteristicas['caracteristicas_fr'] = $item['caracteristicas'];
            }
            if($item['locale']=='de')
            {
                $caracteristicas ['caracteristicas_de']= $item['caracteristicas'];
            }
            if($item['locale']=='it')
            {
                $caracteristicas ['caracteristicas_it']= $item['caracteristicas'];
            }
            if($item['locale']=='pt')
            {
                $caracteristicas ['caracteristicas_pt']= $item['caracteristicas'];
            }
        }
        return view('admin.autosflexiflydrives.edit',['autoflexiflydrive'=>$autosflexiflydrive],['autoflexiflydrivetraslation'=>$caracteristicas]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AutosFlexiFlyDriveUpdateRequest $request, $id)
    {
        $validated = $request->validated();
        //$contact->contactos_translations()->update();
        $autosflexiflydrive = AutosFlexiFlyDrive::find($id);
        if($request->hasFile('imagen')){
            $old_file = $autosflexiflydrive->imagen;
            $validated['imagen'] = $request->imagen->store('autosflexifly', 'public');
            $autosflexiflydrive->update($validated);
            Storage::disk('public')->delete($old_file);
        }
        else
        {
            $autosflexiflydrive->update($validated);

        }
        $autosflexiflydrivetraslation = AutosFlexiFlyDriveTraslation::where('autosdrive_id', $autosflexiflydrive->id)->get();
        foreach ($autosflexiflydrivetraslation as $item)
        {
            $caracteristicas = 'caracteristicas_'.$item['locale'];
            $item->update([
                'caracteristicas'=>$request->$caracteristicas
            ]);
        }
        return redirect()->route('admin.content.autos-flexifly-drive.index')->with('success',__('cubanacan.edit-content',['contenido'=>'Autos FlexiFly & Drive']));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $autoflexy =AutosFlexiFlyDrive::find($id);
        Storage::disk('public')->delete($autoflexy->imagen);
        AutosFlexiFlyDrive::destroy($id);

        return redirect()->route('admin.content.autos-flexifly-drive.index')->with('success',__('cubanacan.delete-content',['contenido'=>'Autos FlexiFly & Drive']));
    }
}
