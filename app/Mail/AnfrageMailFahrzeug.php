<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AnfrageMailFahrzeug extends Mailable
{
    use Queueable, SerializesModels;

    public $anfrage;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($anfrage)
    {
        $this->anfrage = $anfrage;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.anfragefahrzeug')
            ->subject('Anfrage zu ihrem Fahrzeug auf www.mietwerkstatt-rossleben.de');
    }
}
