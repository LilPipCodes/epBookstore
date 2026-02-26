@extends('layouts.app')
@section('content')
<div class="container py-5 d-flex align-items-center justify-content-center min-vh-100">
    <div class="row w-100 justify-content-center">
        <div class="col-md-6 col-lg-5">
            <div class="card shadow rounded-4 border-0">
                <div class="card-body p-5">
                    <div class="text-center mb-4">
                        <img src="/logo.png" alt="Platform Logo" style="height:48px;">
                        <h3 class="mt-2 mb-0 fw-bold" style="letter-spacing:1px;">Login</h3>
                        <p class="text-muted">Sign in to your account</p>
                    </div>
                    <form method="POST" action="{{ route('login') }}" novalidate>
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input id="password" type="password" class="form-control" name="password" required>
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="remember" name="remember">
                            <label class="form-check-label" for="remember">Remember Me</label>
                        </div>
                        <button type="submit" class="btn btn-primary w-100 py-2">Login</button>
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <a href="#" class="text-decoration-underline">Forgot Password?</a>
                            <span class="text-muted small">Don’t have an account? <a href="{{ route('register') }}">Sign Up</a></span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
