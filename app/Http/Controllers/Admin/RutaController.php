<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modelos\RutaConectandoCuba;
use DB;

class RutaController extends Controller
{
    //

    public function index()
    {
        //
        $ruta = '/rutas/';
        $nombre = 'ruta';

        $rutas = DB::table('ruta_conectando_cubas')->select('ruta_conectando_cubas.id'
            ,'ruta_conectando_cubas.ruta', 'ruta_conectando_cubas.created_at', 'ruta_conectando_cubas.updated_at')->get();



        return view('admin.rutas.index', ['rutas' => $rutas], compact('nombre','ruta'));

    }
    public function create()
    {
        $ruta = '/rutas/';
        $nombre = 'ruta';

        return view('admin.rutas.add', compact('nombre','ruta'));
    }


    public function store(Request $request)
    {
        $rules = [
            'ruta' => 'required|max:120|min:5|unique:ruta_conectando_cubas',
            
        ];

        $messages =[
            'ruta.required' => 'Es necesario una ruta.',

            
        ];

        $this->validate($request, $rules, $messages);
        


        $ruta = new RutaConectandoCuba();
        $ruta->ruta = $request->get('ruta');

        if ($ruta->save()) {
            return redirect()->route('admin.content.rutas.index')->with('notificacion','El contenido de la ruta se ha registrado satisfactoriamente.');

        }else{
            return redirect()->route('admin.content.rutas.index')->with('notificacionerror','El contenido de la ruta no se ha podido registrar en su base de datos.');
        }




    }

}
