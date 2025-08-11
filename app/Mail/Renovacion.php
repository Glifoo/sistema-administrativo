<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class Renovacion extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $suscripcion;
    public $paquete;
    public $meses;
    /**
     * Create a new message instance.
     */
    public function __construct($user, $paquete, $meses)
    {
        $this->user = $user;
        $this->paquete = $paquete;
        $this->meses = $meses;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Servicio GlifooAdministrativo Renovacion',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mails.renovacion',
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
