<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AnkaufMail extends Mailable
{
    use Queueable, SerializesModels;

    public $ankauf;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($ankauf)
    {
        $this->ankauf = $ankauf;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        if ($this->ankauf['email'] == true) {
            $email = $this->ankauf['email'];
        } else {
            $email = 'noreplay@mietwerkstatt-rossleben.de';
        }
        return $this->from($email)->subject('Neue Ankaufanfrage')
            ->view('emails.ankauf')->with('ankauf', $this->ankauf);
    }
}
