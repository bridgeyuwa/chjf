<?php

namespace App\Mail;

use App\Models\PrayerRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PrayerRequestReceived extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public PrayerRequest $prayer) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'New Prayer Request: ' . ucfirst($this->prayer->category),
            to: ['prayer@chjfoundation.org'],
        );
    }

    public function content(): Content
    {
        return new Content(
            text: 'emails.prayer-request-received',
            with: ['prayer' => $this->prayer],
        );
    }
}
