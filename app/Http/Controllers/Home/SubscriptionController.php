<?php

namespace App\Http\Controllers\Home;

use App\Http\Requests\SuscribirceRequest;
use App\Mail\SubscriptionReceived;
use App\Modelos\CarruselTraslations;
use App\Modelos\EnlaceRed;
use App\Modelos\Subscription;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modelos\Suscribirce;
use Illuminate\Support\Facades\Mail;

class SubscriptionController extends Controller
{

    public function showSubscriptionForm()
    {
        $enlaces = EnlaceRed::all();
        $success = false;
        return view('home.suscribirce', compact('enlaces', 'success'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param SuscribirceRequest $request
     * @return \Illuminate\Http\Response
     */
    public function subscription(SuscribirceRequest $request)
    {
        $validated = $request->validated();

        $subscription = Subscription::create($validated);
        $emailto = \Config::get('mail.address_to');

        Mail::to($emailto)->send(new SubscriptionReceived($subscription));

        $enlaces = EnlaceRed::all();
        $success = true;

        return view('home.suscribirce', compact('enlaces', 'success'));
    }
}
