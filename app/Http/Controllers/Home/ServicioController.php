<?php

namespace App\Http\Controllers\Home;

use App\Modelos\CarruselTraslations;
use App\Modelos\EnlaceRed;
use App\Modelos\Provincia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modelos\Servicio;
use App\Modelos\ServicioTraslation;

class ServicioController extends Controller
{
    public function index()
    {
        $servicios = Servicio::join("servicio_traslations","servicios.id","=","servicio_traslations.servicio_id")
            ->where('locale','=','es')
            ->select('servicios.id','servicios.created_by','servicio_traslations.descripcion')->get();

        $carousel1 = CarruselTraslations::where('idioma', '=', 'es')->first();
        $enlaces = EnlaceRed::all();
        if ($carousel1){
            $carouseles = CarruselTraslations::where('idioma', '=', 'es')
                ->where('id', '<>',$carousel1->id )->get();
        }else{
            $carouseles = null;
        }
        $destinos = Provincia::all();

        return view('home.servicios', compact( 'servicios','carousel1','enlaces','carouseles','destinos'));
    }
}
