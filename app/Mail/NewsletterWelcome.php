<?php

namespace App\Mail;

use App\Models\NewsletterSubscription;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NewsletterWelcome extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public NewsletterSubscription $subscription) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Welcome to the CHJ Foundation family',
            from: config('mail.from.address'),
        );
    }

    public function content(): Content
    {
        return new Content(
            text: 'emails.newsletter-welcome',
            with: ['subscription' => $this->subscription],
        );
    }
}
