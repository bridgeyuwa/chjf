<?php

use Illuminate\Support\Facades\Artisan;

// Laravel 13: scheduled commands go here (replaces the old app/Console/Kernel.php)
// Schedule::command('inspire')->hourly();

Artisan::command('chjf:prayer-count', function () {
    $count = \App\Models\PrayerRequest::whereNull('prayed_at')->count();
    $this->info("Unprayed prayer requests: {$count}");
})->purpose('Show the count of unprayed prayer requests');
