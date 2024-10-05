<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;

class SendNotificationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $changes;

    /**
     * Create a new message instance.
     *
     * @param string $changes
     */
    public function __construct($changes)
    {
        // Pasamos los cambios al constructor
        $this->changes = $changes;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Alerta de seguridad! los archivos del portal cabodrivers.com fueron modificados!!!',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.notification',  // Aquí especificamos la vista que hemos creado
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
