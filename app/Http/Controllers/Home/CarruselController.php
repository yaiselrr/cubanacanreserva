<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modelos\Carrusel;
use App\Modelos\CarruselTraslations;

class CarruselController extends Controller
{
    //
    public function index()
    {
        $carousel1 = Carrusel::all()->first();/*latest()->take(3)->get();*/
        dd($carousel1);
    	return view('home.blogs',compact('carousel1'));
    }
}
