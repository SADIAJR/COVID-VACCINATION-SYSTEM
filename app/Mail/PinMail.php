<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PinMail extends Mailable
{
    use Queueable, SerializesModels;

    public string $pin;

    public function __construct(string $pin)
    {
        $this->pin = $pin;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Your Verification PIN - Covid Vaccination Portal',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.pin',
        );
    }
}
