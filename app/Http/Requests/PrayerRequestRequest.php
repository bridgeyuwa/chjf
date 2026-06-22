<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PrayerRequestRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'       => ['nullable', 'string', 'max:100'],
            'email'      => ['nullable', 'email', 'max:255'],
            'category'   => ['required', 'in:health,family,provision,grief,guidance,protection,thanksgiving,other'],
            'request'    => ['required', 'string', 'max:5000'],
            'visibility' => ['required', 'in:private,staff,public'],
            'follow_up'  => ['boolean'],
        ];
    }
}
