<?php

namespace App\Http\Controllers\Home;

use App\Modelos\CarruselTraslations;
use App\Modelos\EnlaceRed;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modelos\Suscribirce;

class SuscribirceController extends Controller
{

    public function mostraFormSuscribirce()
    {
        $enlaces = EnlaceRed::all();
        return view('home.suscribirce',compact('enlaces'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function suscribirce(Request $request)
    {
        //
    }
}
