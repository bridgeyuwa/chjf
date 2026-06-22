<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrayerRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'email', 'category', 'request',
        'visibility', 'follow_up', 'prayed_at',
    ];

    protected $casts = [
        'follow_up' => 'boolean',
        'prayed_at' => 'datetime',
    ];
}
