@extends('layouts.app')

@section('title', 'Contact | Fiive Rivers Ltd')

@section('content')
<section class="py-5" style="background: #f5f7fb;">
    <div class="container">
        <div class="row justify-content-center mb-4">
            <div class="col-lg-8 text-center">
                <h1 class="fw-bold mb-2" style="color:#1e3758;">Contact Support</h1>
                <p class="text-muted mb-0">
                    We’re here to help with any questions about your bathroom, tiling or home renovation project.
                </p>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card border-0 shadow-lg rounded-4"
                     style="background: linear-gradient(135deg,#1e3758,#274a7a);">
                    <div class="card-body p-4 p-lg-5 text-center text-white">

                        {{-- Avatar circle --}}
                        <div class="d-inline-flex align-items-center justify-content-center rounded-circle mb-3"
                             style="width:80px;height:80px;background:#f5f7fb; color:#1e3758; font-size:2rem;">
                            FR
                        </div>

                        <h4 class="fw-semibold mb-1">Five Rivers Ltd.</h4>
                        <p class="mb-4 text-light-50">Home Remodeling &amp; Tiling</p>

                        {{-- Phone --}}
                        <a href="tel:+447449591531"
                           class="btn btn-light w-100 mb-3 d-flex align-items-center justify-content-center gap-2 rounded-3">
                            <i class="bi bi-telephone-fill"></i>
                            <span>Call: 0744 959 1531</span>
                        </a>

                        {{-- Email --}}
                        <a href="mailto:fiverivers786@gmail.com"
                           class="btn btn-outline-light w-100 mb-3 d-flex align-items-center justify-content-center gap-2 rounded-3">
                            <i class="bi bi-envelope-fill"></i>
                            <span>Email: fiiverivers786@gmail.com</span>
                        </a>

                        {{-- WhatsApp --}}
                        <a href="https://wa.me/447449591531"
                           target="_blank"
                           class="btn btn-success w-100 mb-4 d-flex align-items-center justify-content-center gap-2 rounded-3">
                            <i class="bi bi-whatsapp"></i>
                            <span>WhatsApp: Chat now</span>
                        </a>

                        <p class="small text-white-50 mb-0">
                            We usually respond within 1 hour during business hours.<br>
                            <span class="d-block mt-2">
                                Location: London, United Kingdom
                            </span>
                        </p>
                    </div>
                </div>

                <p class="text-center text-muted small mt-3 mb-0">
                    Prefer a detailed quote?  
                    <a href="{{ route('contact') }}" class="text-decoration-none" style="color:#1e3758;">
                        Use the Free Quote form
                    </a>
                    and we’ll get back to you.
                </p>
            </div>
        </div>
    </div>
</section>
@endsection
