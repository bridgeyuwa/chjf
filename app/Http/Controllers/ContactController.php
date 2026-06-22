<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Mail\ContactMessageReceived;
use App\Models\ContactMessage;
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

        Mail::to(config('mail.from.address'))
            ->send(new ContactMessageReceived($message));

        return redirect()
            ->route('contact')
            ->with('status', 'Thank you for reaching out. We will respond within 2 working days.');
    }
}
