<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modelos\Contacto;
use Illuminate\Support\Facades\Storage;
use App\Modelos\ContactoTraslation;
use App\Http\Requests\ContactoStoreRequest;
use App\Http\Requests\ContactoUpdateRequest;
use App\Http\Requests\ContactoTraslationStoreRequest;
use App\Http\Requests\ContactoTraslationUpdateRequest;

class ContactoController extends Controller
{

    public function __construct()
    {
        $this->middleware('hasPermission:contactos.create')->only(['create','store']);
        $this->middleware('hasPermission:contactos.destroy')->only(['destroy']);
        $this->middleware('hasPermission:contactos.index')->only(['index']);
        $this->middleware('hasPermission:contactos.edit')->only(['update','edit']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contacto::join("contacto_traslations","contactos.id","=","contacto_traslations.contacto_id")
            ->where('locale','=','es')
            ->select('contactos.id','contactos.telefono','contactos.email','contactos.created_by','contacto_traslations.direccion')
            ->paginate();
        return view('admin.contactos.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Contacto $contactos)
    {
        return view('admin.contactos.add',compact('contactos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContactoStoreRequest $request)
    {

        $validatedcontacto = $request->validated();
        $contacto = Contacto::create($validatedcontacto);
        $locales = array('es', 'en', 'fr', 'de', 'it', 'pt');

        foreach($locales as $value)
        {
            $direccion = 'direccion_'.$value;
            ContactoTraslation::create([
                'direccion'=>$request->$direccion,
                'locale'=>$value,
                'contacto_id'=>$contacto->id
            ]);
        }

        return redirect()->route('admin.content.contactos.index')->with('success',__('cubanacan.add-content',['contenido'=>'Contacto']) );
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
        $contact = Contacto::find($id);
        $contactotraslation = ContactoTraslation::where('contacto_id', $contact->id)->get();
        $direcciones = array();
        foreach ($contactotraslation as $item)
        {
            if($item['locale']=='es')
            {
                $direcciones['direccion_es'] = $item['direccion'];
            }
            if($item['locale']=='en')
            {
                $direcciones['direccion_en']  = $item['direccion'];
            }
            if($item['locale']=='fr')
            {
                $direcciones['direccion_fr'] = $item['direccion'];
            }
            if($item['locale']=='de')
            {
                $direcciones ['direccion_de']= $item['direccion'];
            }
            if($item['locale']=='it')
            {
                $direcciones ['direccion_it']= $item['direccion'];
            }
            if($item['locale']=='pt')
            {
                $direcciones ['direccion_pt']= $item['direccion'];
            }
        }
        return view('admin.contactos.edit',['contacto'=>$contact],['contactotraslation'=>$direcciones]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ContactoUpdateRequest $request, $id)
    {
        $validated = $request->validated();
        //$contact->contactos_translations()->update();
        $contact = Contacto::find($id);
        $contact->update($validated);

        $contactotraslation = ContactoTraslation::where('contacto_id', $contact->id)->get();
        foreach ($contactotraslation as $item)
        {
            $direccion = 'direccion_'.$item['locale'];
            $item->update([
                'direccion'=>$request->$direccion
            ]);
        }
        return redirect()->route('admin.content.contactos.index')->with('success',__('cubanacan.edit-content',['contenido'=>'Contacto']));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Contacto::destroy($id);
        return redirect()->route('admin.content.contactos.index')->with('success',__('cubanacan.delete-content',['contenido'=>'Contacto']));
    }
}
