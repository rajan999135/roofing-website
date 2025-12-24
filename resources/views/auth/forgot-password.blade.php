{{-- resources/views/auth/forgot-password.blade.php --}}
@extends('layouts.app')

@section('title', 'Forgot Password | Fiive Rivers Ltd')

@section('content')
    <section class="py-5" style="background:#f3f6fb;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="card shadow-sm border-0 rounded-3">
                        <div class="card-body p-4 p-md-5">

                            <h1 class="h4 mb-2">Forgot your password?</h1>
                            <p class="text-muted mb-4">
                                Enter the email address you used when creating your account.
                                We’ll send you a secure link to reset your password.
                            </p>

                            {{-- ✅ Success message after link is sent --}}
                            @if (session('status'))
                                <div class="alert alert-success mb-3">
                                    {{ session('status') }}
                                </div>
                            @endif

                            {{-- Validation errors --}}
                            @if ($errors->any())
                                <div class="alert alert-danger mb-3">
                                    <ul class="mb-0 small">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form method="POST" action="{{ route('password.email') }}" class="mt-2">
                                @csrf

                                <div class="mb-3">
                                    <label for="email" class="form-label fw-semibold">
                                        Email address
                                    </label>
                                    <input
                                        id="email"
                                        type="email"
                                        name="email"
                                        value="{{ old('email') }}"
                                        required
                                        autofocus
                                        class="form-control @error('email') is-invalid @enderror"
                                    >
                                </div>

                                <button type="submit" class="btn btn-brand w-100">
                                    Send password reset link
                                </button>

                                <div class="text-center mt-3">
                                    <a href="{{ route('login') }}" class="small text-muted">
                                        ← Back to login
                                    </a>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
