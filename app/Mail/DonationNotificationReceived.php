<?php

namespace App\Mail;

use App\Models\DonationNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class DonationNotificationReceived extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public DonationNotification $notification) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'New Donation Notification: ' . $this->notification->name,
            to: [config('mail.from.address')],
        );
    }

    public function content(): Content
    {
        return new Content(
            text: 'emails.donation-notification-received',
            with: ['notification' => $this->notification],
        );
    }
}
