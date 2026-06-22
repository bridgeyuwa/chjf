<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VolunteerApplicationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'first_name' => ['required', 'string', 'max:100'],
            'last_name'  => ['required', 'string', 'max:100'],
            'email'      => ['required', 'email', 'max:255'],
            'phone'      => ['required', 'string', 'max:30'],
            'city'       => ['required', 'string', 'max:100'],
            'age_range'  => ['required', 'in:18-25,26-35,36-50,51+'],
            'program'    => ['required', 'in:hope-kitchen,safe-harbor,pathways,healing-hands,bright-futures,any'],
            'availability' => ['required', 'in:weekdays-day,weekdays-eve,weekends,flexible'],
            'commitment' => ['required', 'in:2-4-hrs-month,weekly,fortnightly,monthly,event-based'],
            'referral'   => ['nullable', 'in:friend,church,social,event,press,other'],
            'skills'     => ['nullable', 'string', 'max:500'],
            'motivation' => ['nullable', 'string', 'max:2000'],
            'experience' => ['nullable', 'string', 'max:2000'],
            'consent_background_check' => ['accepted'],
            'consent_data' => ['accepted'],
        ];
    }

    public function messages(): array
    {
        return [
            'consent_background_check.accepted' => 'You must consent to a background check to proceed.',
            'consent_data.accepted' => 'You must consent to data storage to proceed.',
        ];
    }
}
