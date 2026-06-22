<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    public function index(Request $request)
    {
        $query = Event::upcoming()->orderBy('start_date');

        if ($category = $request->get('category')) {
            $query->where('category', $category);
        }

        $events = $query->paginate(12);

        return view('pages.events', compact('events'));
    }

    public function show(Event $event)
    {
        return view('pages.events-show', compact('event'));
    }
}
