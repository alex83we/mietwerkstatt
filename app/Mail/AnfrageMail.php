<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AnfrageMail extends Mailable
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
        return $this->markdown('emails.anfrage')
            ->subject('Ihre Anfrage zu einem Fahrzeug auf www.mietwerkstatt-rossleben.de wurde weitergeleitet.');
    }
}
