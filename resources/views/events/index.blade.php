@extends('layouts.app')

@section('title', 'Available Events')

@section('content')
    <h2>Available Events</h2>

    @foreach($events as $event)
        <div class="card mb-3">
            <div class="card-body">
                <h4>{{ $event->title }}</h4>
                <p>{{ $event->description }}</p>
                <p><strong>Location:</strong> {{ $event->location }}</p>
                <p><strong>Available Seats:</strong> {{ $event->available_seats }}</p>

                @if($event->available_seats > 0)
                    <form action="{{ route('events.book', $event->id) }}" method="POST">
                        @csrf
                        <div class="input-group" style="max-width: 200px;">
                            <input type="number" name="seats_booked" class="form-control" min="1" max="{{ $event->available_seats }}" required>
                            <button type="submit" class="btn btn-primary">Book Now</button>
                        </div>
                    </form>
                @else
                    <p class="text-danger">No seats available</p>
                @endif
            </div>
        </div>
    @endforeach
@endsection
