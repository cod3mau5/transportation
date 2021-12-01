<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendReservation extends Mailable
{
    use Queueable, SerializesModels;

    public $reservation;
    
    public function __construct($reservation)
    {
        $this->reservation= $reservation;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('vendor.mail.send_reservation');
    }
}
