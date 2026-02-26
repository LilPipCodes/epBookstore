@extends('layouts.app')
@section('content')
<div class="container py-5 d-flex align-items-center justify-content-center min-vh-100">
    <div class="row w-100 justify-content-center">
        <div class="col-md-6 col-lg-5">
            <div class="card shadow rounded-4 border-0">
                <div class="card-body p-5">
                    <div class="text-center mb-4">
                        <img src="/logo.png" alt="Platform Logo" style="height:48px;">
                        <h3 class="mt-2 mb-0 fw-bold" style="letter-spacing:1px;">Sign Up</h3>
                        <p class="text-muted">Create your account</p>
                    </div>
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data" novalidate>
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Full Name</label>
                            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input id="password" type="password" class="form-control" name="password" required minlength="8">
                        </div>
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                            <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone Number <span class="text-muted small">(optional)</span></label>
                            <input id="phone" type="text" class="form-control" name="phone" value="{{ old('phone') }}">
                        </div>
                        <div class="mb-3">
                            <label for="profile_photo" class="form-label">Profile Photo <span class="text-muted small">(optional)</span></label>
                            <input id="profile_photo" type="file" class="form-control" name="profile_photo" accept="image/*">
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="terms" required>
                            <label class="form-check-label" for="terms">I agree to the <a href="#" class="text-decoration-underline">Terms & Conditions</a></label>
                        </div>
                        <button type="submit" class="btn btn-primary w-100 py-2">Register</button>
                        <div class="text-center mt-3">
                            <span class="text-muted">Already have an account?</span> <a href="{{ route('login') }}">Login</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
