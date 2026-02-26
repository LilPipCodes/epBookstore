@extends('layouts.app')
@section('content')
<div class="container py-5 d-flex align-items-center justify-content-center min-vh-100">
    <div class="row w-100 justify-content-center">
        <div class="col-md-6 col-lg-5">
            <div class="card shadow rounded-4 border-0">
                <div class="card-body p-5">
                    <div class="text-center mb-4">
                        <img src="/logo.png" alt="Platform Logo" style="height:48px;">
                        <h3 class="mt-2 mb-0 fw-bold" style="letter-spacing:1px;">Reset Password</h3>
                        <p class="text-muted">Enter your new password below</p>
                    </div>
                    <form method="POST" action="{{ route('password.update') }}" novalidate>
                        @csrf
                        <input type="hidden" name="token" value="{{ $token ?? '' }}">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">New Password</label>
                            <input id="password" type="password" class="form-control" name="password" required minlength="8">
                        </div>
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                            <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100 py-2">Reset Password</button>
                        <div class="text-center mt-3">
                            <a href="{{ route('login') }}">Back to Login</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
