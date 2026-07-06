<?php

namespace App\Http\Controllers;

use App\Http\Requests\VolunteerApplicationRequest;
use App\Mail\VolunteerApplicationReceived;
use App\Models\VolunteerApplication;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class VolunteerController extends Controller
{
    public function index()
    {
        return view('pages.get-involved.volunteer');
    }

    public function store(VolunteerApplicationRequest $request)
    {
        $application = VolunteerApplication::create($request->validated());

        try {
            Mail::to(config('mail.from.address'))
                ->send(new VolunteerApplicationReceived($application));
        } catch (\Exception $e) {
            Log::error('Failed to send volunteer application notification email: ' . $e->getMessage());
        }

        return redirect()
            ->route('get-involved.volunteer')
            ->with('status', 'Thank you for applying to volunteer! Our volunteer coordinator will be in touch within 5 working days.');
    }
}
