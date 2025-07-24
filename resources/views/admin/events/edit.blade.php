@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Edit Event</h2>
    <form method="POST" action="{{ route('admin.events.update', $event->id) }}">
        @method('PUT')
        @include('admin.events.form')
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
