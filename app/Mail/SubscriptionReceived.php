<?php

namespace App\Mail;

use App\Modelos\Subscription;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SubscriptionReceived extends Mailable
{
    use Queueable, SerializesModels;

    public $subscriptor;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Subscription $subscriptor)
    {
        $this->subscriptor = $subscriptor;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.subscription');
    }
}
