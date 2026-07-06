<?php

namespace App\Http\Controllers;

use App\Models\Event;

class HomeController extends Controller
{
    public function index()
    {
        $upcomingEvents = Event::upcoming()
            ->orderBy('start_date')
            ->limit(3)
            ->get();

        return view('pages.home', compact('upcomingEvents'));
    }
}
