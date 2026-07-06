<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewsletterSubscriptionRequest;
use App\Mail\NewsletterWelcome;
use App\Models\NewsletterSubscription;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class NewsletterController extends Controller
{
    public function store(NewsletterSubscriptionRequest $request)
    {
        $validated = $request->validated();

        $subscription = NewsletterSubscription::firstOrCreate(
            ['email' => $validated['email']],
            $validated
        );

        if (!$subscription->wasRecentlyCreated) {
            return back()->with('status', 'You are already subscribed — thank you for standing with us!');
        }

        try {
            Mail::to($subscription->email)->send(new NewsletterWelcome($subscription));
        } catch (\Exception $e) {
            Log::error('Failed to send newsletter welcome email: ' . $e->getMessage());
        }

        return back()->with('status', 'You are subscribed! Check your inbox for a welcome email.');
    }
}
