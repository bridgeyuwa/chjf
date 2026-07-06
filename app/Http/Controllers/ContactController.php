<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Mail\ContactMessageReceived;
use App\Models\ContactMessage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        return view('pages.contact');
    }

    public function store(ContactRequest $request)
    {
        $message = ContactMessage::create($request->validated());

        try {
            Mail::to(config('mail.from.address'))
                ->send(new ContactMessageReceived($message));
        } catch (\Exception $e) {
            Log::error('Failed to send contact notification email: ' . $e->getMessage());
        }

        return redirect()
            ->route('contact')
            ->with('status', 'Thank you for reaching out. We will respond within 2 working days.');
    }
}
