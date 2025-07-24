<?php
namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::with('event')->where('user_id', Auth::id())->latest()->get();
        return view('bookings.index', compact('bookings'));
    }


    public function create($id)
{
    $event = Event::findOrFail($id);

    if ($event->end_time < now()) {
        return redirect()->route('events.index')->with('error', 'You cannot book past events.');
    }

    return view('bookings.create', compact('event'));
}

   public function store(Request $request)
{
    $event = Event::findOrFail($request->event_id);

    // Check if the event is already past
    if ($event->end_time < now()) {
        return redirect()->back()->with('error', 'You cannot book past events.');
    }

    // Check seat availability
    if ($event->available_seats < $request->seats_booked) {
        return redirect()->back()->with('error', 'Not enough available seats.');
    }

    // Create booking
    Booking::create([
        'user_id' => auth()->id(),
        'event_id' => $event->id,
        'seats_booked' => $request->seats_booked,
    ]);

    // Update available seats
    $event->decrement('available_seats', $request->seats_booked);

    return redirect()->route('events.index')->with('success', 'Booking successful!');
}

}
