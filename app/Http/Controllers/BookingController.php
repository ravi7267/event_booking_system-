<?php
namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function book(Request $request, Event $event)
    {
        $request->validate([
            'seats_booked' => 'required|integer|min:1|max:' . $event->available_seats,
        ]);

         Booking::create([
            'user_id' => Auth::id(),
            'event_id' => $event->id,
            'seats_booked' => $request->seats_booked,
        ]);

         $event->available_seats -= $request->seats_booked;
        $event->save();

        return redirect()->route('events.index')->with('success', 'Event booked successfully!');
    }
}
