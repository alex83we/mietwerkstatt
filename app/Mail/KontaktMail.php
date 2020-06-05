<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class KontaktMail extends Mailable
{
    use Queueable, SerializesModels;

    public $kontakt;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($kontakt)
    {
        $this->kontakt = $kontakt;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        if ($this->kontakt['email'] == true) {
            $email = $this->kontakt['email'];
        } else {
            $email = 'noreplay@mietwerkstatt-rossleben.de';
        }
        return $this->from($email)->subject('Kontaktanfrage KFZ Service')
            ->view('emails.kontakt')->with('kontakt', $this->kontakt);
    }
}
