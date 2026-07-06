<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DonationNotificationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'      => ['required', 'string', 'max:100'],
            'email'     => ['required', 'email', 'max:255'],
            'amount'    => ['nullable', 'string', 'max:100'],
            'date_sent' => ['nullable', 'date'],
            'message'   => ['nullable', 'string', 'max:5000'],
            'consent'   => ['accepted'],
        ];
    }

    public function messages(): array
    {
        return [
            'consent.accepted' => 'Please consent to data storage so we can respond.',
        ];
    }
}
