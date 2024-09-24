<?php

namespace App\Http\Controllers\Home;

use App\Http\Requests\ContactoRequest;
use App\Mail\ContactReceived;
use App\Mail\SubscriptionReceived;
use App\Modelos\CarruselTraslations;
use App\Modelos\EnlaceRed;
use App\Modelos\Provincia;
use App\Modelos\Subscription;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modelos\Contacto;
use App\Modelos\ContactoTraslation;
use Illuminate\Support\Facades\Mail;

class ContactoController extends Controller
{
    public function index()
    {
        $contacto = Contacto::firstOrfail();
        $contactotraslations = ContactoTraslation::where('contacto_id', $contacto->id)->get()->where('locale','=','es');

        $carousel1 = CarruselTraslations::where('idioma', '=', 'es')->first();
        $enlaces = EnlaceRed::all();
        if ($carousel1){
            $carouseles = CarruselTraslations::where('idioma', '=', 'es')
                ->where('id', '<>',$carousel1->id )->get();
        }else{
            $carouseles = null;
        }
        $destinos = Provincia::all();
        $success = false;

        return view('home.contactos', compact('contacto', 'contactotraslations','carousel1','enlaces','carouseles','destinos','success'));
    }

    /**
     * @param ContactoRequest $request
     */
    public function sendMessage(ContactoRequest $request){
        $validated = $request->validated();
//        dd($validated);
        $emailto = \Config::get('mail.address_to');
        Mail::to($emailto)->send(new ContactReceived($validated['nombre'],$validated['email'],$validated['mensaje']));

        $contacto = Contacto::firstOrfail();
        $contactotraslations = ContactoTraslation::where('contacto_id', $contacto->id)->get()->where('locale','=','es');

        $carousel1 = CarruselTraslations::where('idioma', '=', 'es')->first();
        $enlaces = EnlaceRed::all();
        if ($carousel1){
            $carouseles = CarruselTraslations::where('idioma', '=', 'es')
                ->where('id', '<>',$carousel1->id )->get();
        }else{
            $carouseles = null;
        }
        $destinos = Provincia::all();
        $success = true;

        return view('home.contactos', compact('contacto', 'contactotraslations','carousel1','enlaces','carouseles','destinos','success'));
    }
}
