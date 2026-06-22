<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VolunteerApplication extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name', 'last_name', 'email', 'phone', 'city', 'age_range',
        'program', 'availability', 'commitment', 'referral',
        'skills', 'motivation', 'experience',
        'consent_background_check', 'consent_data',
        'status',
    ];

    protected $casts = [
        'consent_background_check' => 'boolean',
        'consent_data' => 'boolean',
    ];

    public function getFullNameAttribute(): string
    {
        return "{$this->first_name} {$this->last_name}";
    }
}
