<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modelos\EnlaceRed;
use App\Modelos\Carrusel;
use App\Modelos\CarruselTraslations;
use App\Modelos\Provincia;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()    {

        if(!session()->has('cart'))
        {
            return redirect()->route('home.circuitos');;
        }
        else
        {
            $reservas = session()->get('cart');
            $totalTopay=0.00;
            $tarjetas=DB::table('tarjeta_creditos')
            ->select('id','imagen','nombre')
            ->get();
            foreach($reservas as $reserva)
            {
                $totalTopay+=$reserva['total_precio'];
            }
            $enlaces = EnlaceRed::all();
            return view('home.payment', compact('enlaces','reservas','totalTopay','tarjetas'));
        }
    }
}
