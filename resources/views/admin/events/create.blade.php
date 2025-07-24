@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Create Event</h2>
    <form method="POST" action="{{ route('admin.events.store') }}">
        @include('admin.events.form')
        <button type="submit" class="btn btn-success">Save</button>
    </form>
</div>
@endsection
