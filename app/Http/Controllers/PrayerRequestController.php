<?php

namespace App\Http\Controllers;

use App\Http\Requests\PrayerRequestRequest;
use App\Mail\PrayerRequestReceived;
use App\Models\PrayerRequest;
use Illuminate\Support\Facades\Mail;

class PrayerRequestController extends Controller
{
    public function index()
    {
        return view('pages.prayer-request');
    }

    public function store(PrayerRequestRequest $request)
    {
        $prayer = PrayerRequest::create($request->validated());

        Mail::to('prayer@chjfoundation.org')
            ->send(new PrayerRequestReceived($prayer));

        return redirect()
            ->route('prayer-request')
            ->with('status', 'Your prayer request has been received. Our team will pray over it this week. Thank you for trusting us.');
    }
}
