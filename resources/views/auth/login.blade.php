@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="row justify-content-center mt-5">
    <div class="col-md-5">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">Login</div>
            <div class="card-body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" required autofocus>
                    </div>

                    <div class="mb-3">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>

                    <div class="text-center mt-3">
                        <a href="{{ route('register') }}">Don't have an account? Register</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
