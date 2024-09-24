<?php

namespace App\Http\Controllers\Home;

use App\Modelos\CarruselTraslations;
use App\Modelos\EnlaceRed;
use App\Modelos\Provincia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modelos\PreguntaTraslation;
use App\Modelos\Pregunta;

class PreguntasController extends Controller
{
    public function index()
    {
        $preguntas = Pregunta::join("pregunta_traslations","preguntas.id","=","pregunta_traslations.pregunta_id")
            ->where('locale','=','es')
            ->select('preguntas.id','pregunta_traslations.pregunta','pregunta_traslations.respuesta')->paginate(20);

        $carousel1 = CarruselTraslations::where('idioma', '=', 'es')->first();
        $enlaces = EnlaceRed::all();
        if ($carousel1){
            $carouseles = CarruselTraslations::where('idioma', '=', 'es')
                ->where('id', '<>',$carousel1->id )->get();
        }else{
            $carouseles = null;
        }
        $destinos = Provincia::all();

        return view('home.preguntas', compact( 'preguntas','enlaces','carousel1','carouseles','destinos'));
    }
}
