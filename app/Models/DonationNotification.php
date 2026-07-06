<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonationNotification extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'email', 'amount', 'date_sent', 'message',
        'status', 'responded_at',
    ];

    protected $casts = [
        'date_sent' => 'date',
        'responded_at' => 'datetime',
    ];
}
