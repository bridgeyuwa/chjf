<?php

namespace App\Mail;

use App\Models\VolunteerApplication;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class VolunteerApplicationReceived extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public VolunteerApplication $application) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'New Volunteer Application: ' . $this->application->full_name,
            to: [config('mail.from.address')],
        );
    }

    public function content(): Content
    {
        return new Content(
            text: 'emails.volunteer-application-received',
            with: ['application' => $this->application],
        );
    }
}
