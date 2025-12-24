@extends('layouts.app')

@section('title', 'Verify Email | Five Rivers Ltd')

@section('content')
<section class="py-5" style="background:#f3f6fb;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="card shadow-sm border-0 rounded-3">
                    <div class="card-body p-4 p-md-5">

                        <h1 class="h4 mb-2">Verify your email</h1>
                        <p class="text-muted mb-3">
                            We’ve sent a 6-digit code to your email address. Please enter it below
                            within <strong>1 minute</strong> to complete your registration.
                        </p>

                        @if(session('status'))
                            <div class="alert alert-info small mb-3">
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

                        <form method="POST" action="{{ route('otp.verify') }}">
                            @csrf

                            <div class="mb-3">
                                <label for="code" class="form-label fw-semibold">Verification code</label>
                                <input id="code"
                                       type="text"
                                       name="code"
                                       maxlength="6"
                                       pattern="[0-9]*"
                                       inputmode="numeric"
                                       class="form-control text-center fs-4"
                                       autofocus
                                       required>
                            </div>

                            <button type="submit" class="btn btn-brand w-100">
                                Verify & continue
                            </button>

                            <div class="mt-3 text-center">
                                <span class="small text-muted">
                                    Didn’t get the email? Check your spam folder or try registering again.
                                </span>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
