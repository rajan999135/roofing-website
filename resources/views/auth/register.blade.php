{{-- resources/views/auth/register.blade.php --}}
@extends('layouts.app')

@section('title', 'Create Account | Fiive Rivers Ltd')

@section('content')
<section class="py-5" style="background:#f3f6fb;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card shadow-sm border-0 rounded-3">
                    <div class="card-body p-4 p-md-5">

                        <h1 class="h4 mb-2">Create your account</h1>
                        <p class="text-muted mb-4">
                            Sign up to save your details and leave reviews for completed work.
                        </p>

                        {{-- Flash messages --}}
                        @if(session('status'))
                            <div class="alert alert-success small mb-3">
                                {{ session('status') }}
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger small mb-3">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('register') }}" class="mt-2">
                            @csrf

                            {{-- Name --}}
                            <div class="mb-3">
                                <label for="name" class="form-label fw-semibold">Full name</label>
                                <input id="name" type="text"
                                       name="name"
                                       value="{{ old('name') }}"
                                       required autofocus
                                       class="form-control">
                            </div>

                            {{-- Email --}}
                            <div class="mb-3">
                                <label for="email" class="form-label fw-semibold">Email address</label>
                                <input id="email" type="email"
                                       name="email"
                                       value="{{ old('email') }}"
                                       required
                                       class="form-control">
                            </div>

                            {{-- Password --}}
                            <div class="mb-3">
                                <label for="password" class="form-label fw-semibold">Password</label>
                                <input id="password" type="password"
                                       name="password"
                                       required
                                       class="form-control">
                                <div class="form-text small">
                                    Must be at least <strong>8 characters</strong> and include:
                                    an uppercase letter, a lowercase letter and a number.
                                </div>
                            </div>

                            {{-- Confirm password --}}
                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label fw-semibold">
                                    Confirm password
                                </label>
                                <input id="password_confirmation" type="password"
                                       name="password_confirmation"
                                       required
                                       class="form-control">
                            </div>

                            <button type="submit" class="btn btn-brand w-100">
                                Create account
                            </button>

                            <div class="mt-3 text-center">
                                <span class="text-muted small">Already registered?</span>
                                <a href="{{ route('login') }}" class="small ms-1">
                                    Log in
                                </a>
                            </div>
                        </form>

                        <hr class="my-4">

                        <div class="text-center mb-2 small text-muted">
                            or continue with
                        </div>

                        {{-- Google login --}}
                        <a href="{{ route('google.login') }}"
                           class="btn btn-outline-primary w-100 d-flex align-items-center justify-content-center gap-2">
                            <img src="https://developers.google.com/identity/images/g-logo.png"
                                 width="18" alt="Google">
                            Continue with Google
                        </a>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
