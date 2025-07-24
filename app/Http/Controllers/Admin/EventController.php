<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EventRequest;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{

    
  public function index()
{
    $events = Event::where('start_time', '>=', now())->get();
    return view('events.index', compact('events'));
}


    public function create()
    {
        return view('admin.events.create');
    }

    public function store(EventRequest $request)
    {
        $validated = $request->validated();
        $validated['available_seats'] = $validated['total_seats'];
        Event::create($validated);

        return redirect()->route('admin.events.index')->with('success', 'Event created.');
    }

    public function edit(Event $event)
    {
        return view('admin.events.edit', compact('event'));
    }

    public function update(EventRequest $request, Event $event)
    {
        $validated = $request->validated();
        $diff = $validated['total_seats'] - $event->total_seats;
        $validated['available_seats'] = $event->available_seats + $diff;

        $event->update($validated);

        return redirect()->route('admin.events.index')->with('success', 'Event updated.');
    }

    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->route('admin.events.index')->with('success', 'Event deleted.');
    }
}
