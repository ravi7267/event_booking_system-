@extends('layouts.app')

@section('content')
    <h2>Book Event: {{ $event->title }}</h2>

    <form action="{{ route('bookings.store') }}" method="POST">
        @csrf
        <input type="hidden" name="event_id" value="{{ $event->id }}">

        <label for="seats_booked">Number of Seats:</label>
        <input type="number" name="seats_booked" min="1" max="{{ $event->available_seats }}" required>

        <button type="submit">Book Now</button>
    </form>
@endsection
