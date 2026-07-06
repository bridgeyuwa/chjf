<?php

namespace App\Http\Controllers;

use App\Http\Requests\DonationNotificationRequest;
use App\Mail\DonationNotificationReceived;
use App\Models\DonationNotification;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class DonateController extends Controller
{
    public function index()
    {
        return view('pages.get-involved.donate');
    }

    public function store(DonationNotificationRequest $request)
    {
        $notification = DonationNotification::create($request->validated());

        try {
            Mail::to(config('mail.from.address'))
                ->send(new DonationNotificationReceived($notification));
        } catch (\Exception $e) {
            Log::error('Failed to send donation notification email: ' . $e->getMessage());
        }

        return redirect()
            ->route('get-involved.donate')
            ->with('status', 'Thank you for letting us know! We will confirm receipt and send a thank-you note within 3 working days.');
    }
}
