@extends('layouts.app') {{-- use your main layout file --}}

@section('title', 'Admin Login | Fiive Rivers Ltd')

@section('content')
<section class="py-5 bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="card shadow-sm border-0">
                    <div class="card-body p-4">
                        <h1 class="h4 mb-4 text-center"> Login</h1>

                        {{-- Session status --}}
                        @if (session('status'))
                            <div class="alert alert-success mb-3">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            {{-- Email --}}
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input
                                    id="email"
                                    type="email"
                                    name="email"
                                    value="{{ old('email') }}"
                                    class="form-control @error('email') is-invalid @enderror"
                                    required
                                    autofocus
                                    autocomplete="username"
                                >
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Password --}}
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input
                                    id="password"
                                    type="password"
                                    name="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    required
                                    autocomplete="current-password"
                                >
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Remember me --}}
                            <div class="mb-3 form-check">
                                <input
                                    id="remember_me"
                                    type="checkbox"
                                    name="remember"
                                    class="form-check-input"
                                >
                                <label class="form-check-label" for="remember_me">
                                    Remember me
                                </label>
                            </div>

                            <div class="d-flex justify-content-between align-items-center">
                                @if (Route::has('password.request'))
                                    <a class="small" href="{{ route('password.request') }}">
                                        Forgot your password?
                                    </a>
                                @endif

                                <button type="submit" class="btn btn-brand">
                                    Log in
                                </button>
                            </div>
                            <div class="mt-3 text-center">
    <span class="text-muted small">Don’t have an account?</span>
    <a href="{{ route('register') }}" class="small ms-1">
        Create account
    </a>
</div>




                            <div class="mt-4 text-center">
    <a href="{{ route('google.login') }}"
       class="btn btn-outline-primary w-100 d-flex align-items-center justify-content-center gap-2">
        <img src="https://developers.google.com/identity/images/g-logo.png"
             width="18" alt="Google">
        Continue with Google
    </a>
</div>

                        </form>
                    </div>
                </div>

                {{-- Optional: small link back to site --}}
                <div class="text-center mt-3">
                    <a href="{{ route('home') }}" class="small text-muted">
                        ← Back to website
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
