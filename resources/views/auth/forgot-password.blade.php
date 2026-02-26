@extends('layouts.app')
@section('content')
<div class="container py-5 d-flex align-items-center justify-content-center min-vh-100">
    <div class="row w-100 justify-content-center">
        <div class="col-md-6 col-lg-5">
            <div class="card shadow rounded-4 border-0">
                <div class="card-body p-5">
                    <div class="text-center mb-4">
                        <img src="/logo.png" alt="Platform Logo" style="height:48px;">
                        <h3 class="mt-2 mb-0 fw-bold" style="letter-spacing:1px;">Forgot Password</h3>
                        <p class="text-muted">Enter your email to receive a reset link</p>
                    </div>
                    <form method="POST" action="{{ route('password.email') }}" novalidate>
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                        </div>
                        <button type="submit" class="btn btn-primary w-100 py-2">Send Reset Link</button>
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
