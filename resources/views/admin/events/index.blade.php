@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>All Events</h2>
    <a href="{{ route('admin.events.create') }}" class="btn btn-primary mb-3">Create Event</a>

    @if(session('success')) <div class="alert alert-success">{{ session('success') }}</div> @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Title</th><th>Location</th><th>Start</th><th>End</th><th>Seats</th><th>Available</th><th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($events as $event)
            <tr>
                <td>{{ $event->title }}</td>
                <td>{{ $event->location }}</td>
                <td>{{ $event->start_time }}</td>
                <td>{{ $event->end_time }}</td>
                <td>{{ $event->total_seats }}</td>
                <td>{{ $event->available_seats }}</td>
                <td>
                    <a href="{{ route('admin.events.edit', $event->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form method="POST" action="{{ route('admin.events.destroy', $event->id) }}" class="d-inline">
                        @csrf @method('DELETE')
                        <button onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $events->links() }}
</div>
@endsection
