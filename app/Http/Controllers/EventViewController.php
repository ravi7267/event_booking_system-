<?php

namespace App\Http\Controllers;

use App\Models\Event;

class EventViewController extends Controller
{
    public function index()
    {
        $events = Event::where('start_time', '>=', now())->orderBy('start_time')->get();
        return view('events.index', compact('events')); // Blade for public users
    }
}

