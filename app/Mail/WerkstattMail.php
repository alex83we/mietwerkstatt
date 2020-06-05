<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WerkstattMail extends Mailable
{
    use Queueable, SerializesModels;

    public $werkstatt;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($werkstatt)
    {
        $this->werkstatt = $werkstatt;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        if ($this->werkstatt['email'] == true) {
            $email = $this->werkstatt['email'];
        } else {
            $email = 'noreplay@mietwerkstatt-rossleben.de';
        }
        return $this->from($email, $this->werkstatt['vorname'] . ' ' . $this->werkstatt['nachname'])->subject('Service & Werkstattanfrage von ' . $this->werkstatt['vorname'] . ' ' . $this->werkstatt['nachname'])
            ->view('emails.werkstatt')->with('werkstatt', $this->werkstatt);
    }
}
