<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

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

        if($this->reservation->language == "en"){
            return $this->markdown('vendor.mail.send_reservation');
        }else{
            return $this->markdown('vendor.mail.enviar_reservacion');
        }

    }
}
