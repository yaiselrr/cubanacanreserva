<?php

namespace App\Http\Controllers\Home;

use App\Modelos\CarruselTraslations;
use App\Modelos\Circuito;
use App\Modelos\Encuesta;
use App\Modelos\EncuestaCliente;
use App\Modelos\EncuestaClienteEncuestas;
use App\Modelos\EncuestasTraslation;
use App\Modelos\EnlaceRed;
use App\Modelos\Evento;
use App\Modelos\Excursiones;
use App\Modelos\Hotel;
use App\Modelos\ViajesMedida;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;
use mysql_xdevapi\Exception;


class EncuestaController extends Controller
{
    /**
     * Función para mostrar la encuesta con las preguntas relacionadas.
     * @author lauren.dedeu
     * @date 10/9/2020
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        //$preguntas = EncuestasTraslation::where('locale', '=', 'es')->get();
        $preguntas = Encuesta::join('encuesta_traslations', "encuestas.id", "=", "encuesta_traslations.encuesta_id")
            ->where('encuesta_traslations.locale', '=', 'es')
            ->select('encuestas.id', 'encuesta_traslations.pregunta')
            ->get();
        $carousel1 = CarruselTraslations::where('idioma', '=', 'es')->first();
        $enlaces = EnlaceRed::all();
        $carouseles = CarruselTraslations::where('idioma', '=', 'es')->get();
        //$today = Carbon::now()->format('Y-m-d');

        return view('home.encuesta.formulario_encuesta', compact('preguntas', 'enlaces', 'carousel1', 'carouseles'));
    }

    /**
     * Función para obtener los tipos de produtos.
     * @author lauren.dedeu
     * @date 10/9/2020
     * @param Request $request
     * @return JsonResponse
     */
    public function getTypeOfProduct(Request $request)
    {
        $id = $request->query->get('id');
        $typeOfProducts = [];


        if ($id == 1)
            $typeOfProducts = Circuito::all();
        else if ($id == 2)
            $typeOfProducts = Excursiones::all();
        else if ($id == 3)
            $typeOfProducts = Hotel::all();
        else if ($id == 4)
            $typeOfProducts = ViajesMedida::all();
        else if ($id == 6)
            $typeOfProducts = Evento::all();

        return new JsonResponse($typeOfProducts);
    }

    /**
     * Función para guardar una encuesta.
     * @author lauren.dedeu
     * @return JsonResponse
     */
    public function save(Request $request)
    {
        try {
            $travelDate = request('travelDate');
            $howToPass = request('howToPassValue');
            $productType = request('productType');
            $product = request('product');
            $rating = request('rateValue');
            $recomendation = request('recomendation');
            $today = Carbon::now()->format('Y-m-d');
            $date = date_create_from_format('Y-m-d', $travelDate);

            $preguntas = Encuesta::join('encuesta_traslations', "encuestas.id", "=", "encuesta_traslations.encuesta_id")
                ->where('encuesta_traslations.locale', '=', 'es')
                ->select('encuestas.id', 'encuesta_traslations.pregunta')
                ->get();

            $encuesta = EncuestaCliente::create([
                'travel_date' => $date,
                'recomendation' => $recomendation,
                'how_to_passed' => $howToPass,
                'product_type' => $productType,
                'product_id' => $product,
                'rating' => $rating,
                'created_at' => $today,
                'updated_at' => $today
            ]);

            foreach ($preguntas as $pregunta) {

                $value = intval(request($pregunta->getAttribute('id')));
                EncuestaClienteEncuestas::create([
                    'value' => $value,
                    'survey_id' => $encuesta->getAttribute('id'),
                    'encuestas_id' => $pregunta->getAttribute('id'),
                    'created_at' => $today,
                    'updated_at' => $today
                ]);
            }

            return redirect()->route('home.index-encuesta')->with('success', 'Gracias por participar en nuestra encuesta.');
        } catch (Exception $exception) {
        }
    }
}
