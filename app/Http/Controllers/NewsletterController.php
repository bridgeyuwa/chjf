<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewsletterSubscriptionRequest;
use App\Mail\NewsletterWelcome;
use App\Models\NewsletterSubscription;
use Illuminate\Support\Facades\Mail;

class NewsletterController extends Controller
{
    public function store(NewsletterSubscriptionRequest $request)
    {
        $subscription = NewsletterSubscription::firstOrCreate(
            ['email' => $request->validated()['email']],
            $request->validated()
        );

        if (!$subscription->wasRecentlyCreated) {
            return back()->with('status', 'You are already subscribed — thank you for standing with us!');
        }

        Mail::to($subscription->email)->send(new NewsletterWelcome($subscription));

        return back()->with('status', 'You are subscribed! Check your inbox for a welcome email.');
    }
}
