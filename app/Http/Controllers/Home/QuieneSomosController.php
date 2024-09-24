<?php

namespace App\Http\Controllers\Home;

use App\Modelos\CarruselTraslations;
use App\Modelos\EnlaceRed;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modelos\QuienesSomos;
use App\Modelos\QuienesSomosTraslation;
use App\Modelos\Oficina;
use App\Modelos\OficinaTraslations;
use App\Modelos\Buro;
use App\Modelos\BuroTraslations;

class QuieneSomosController extends Controller
{
    public function index()
    {
       // $count = count(Oficina::all());
        $quienessomos = QuienesSomos::join("quienes_somos_traslations","quienes_somos.id","=","quienes_somos_traslations.quienessomos_id")
            ->where('locale','=','es')
            ->select('quienes_somos.id','quienes_somos.imagen','quienes_somos.created_by','quienes_somos_traslations.titulo','quienes_somos_traslations.descripcion')->get();


        $oficinas = Oficina::join("oficinas_traslations", "oficinas.id", "=", "oficinas_traslations.oficina_id")
            ->where('oficinas_traslations.idioma', '=', 'es')
            ->select('oficinas.id', 'oficinas.telefono', 'oficinas_traslations.nombre',
                'oficinas_traslations.direccion')->paginate();

        $buros = Buro::join("buros_traslations", "buros.id", "=", "buros_traslations.buro_id")
            ->where('buros_traslations.idioma', '=', 'es')
            ->select('buros.id', 'buros.oficina_id', 'buros.telefono'
                , 'buros_traslations.nombre', 'buros_traslations.direccion')->get();

        $carousel1 = CarruselTraslations::where('idioma', '=', 'es')->first();
        $enlaces = EnlaceRed::all();
        if ($carousel1){
            $carouseles = CarruselTraslations::where('idioma', '=', 'es')
                ->where('id', '<>',$carousel1->id )->get();
        }else{
            $carouseles = null;
        }

        return view('home.quienessomos', compact('quienessomos'
            , 'oficinas','buros','carousel1','enlaces','carouseles'));
    }
}
