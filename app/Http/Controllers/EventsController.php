<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    public function index(Request $request)
    {
        $query = Event::upcoming()->orderBy('start_date');

        $category = $request->get('category');
        if ($category && $category !== 'all') {
            $query->whereRaw('LOWER(category) = ?', [strtolower($category)]);
        }

        $events = $query->paginate(12);

        return view('pages.events', compact('events'));
    }

    public function show(Event $event)
    {
        if (!$event->is_published) {
            abort(404);
        }

        return view('pages.events-show', compact('event'));
    }
}
