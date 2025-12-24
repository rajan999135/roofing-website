@extends('layouts.app')

@section('title', 'Contact Five Rivers | Request a Free Quote')

@section('content')
<section class="py-5 bg-light">
    <div class="container">
        <div class="row g-4 align-items-start">

            {{-- LEFT: FORM CARD --}}
            <div class="col-lg-6">
                <div class="card border-0 shadow-sm rounded-4">
                    <div class="card-body p-4 p-md-5">
                        <h1 class="h3 fw-bold mb-2">Request a Free Quote</h1>
                        <p class="text-muted mb-4">
                            Share a few details about your bathroom or home project and we’ll get back to you quickly.
                        </p>

                        @if(session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        <form method="POST" action="{{ route('contact.submit') }}">
                            @csrf

                            <div class="mb-3">
                                <label class="form-label fw-semibold">Name <span class="text-danger">*</span></label>
                                <input type="text" name="name" value="{{ old('name') }}"
                                       class="form-control @error('name') is-invalid @enderror"
                                       placeholder="Your full name">
                                @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold">Email <span class="text-danger">*</span></label>
                                <input type="email" name="email" value="{{ old('email') }}"
                                       class="form-control @error('email') is-invalid @enderror"
                                       placeholder="you@example.com">
                                @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold">Phone</label>
                                <input type="text" name="phone" value="{{ old('phone') }}"
                                       class="form-control"
                                       placeholder="Optional">
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold">Service Required</label>
                                <select name="service_required" class="form-select">
                                    <option value="">Select service</option>
                                    <option {{ old('service_required')=='Bathroom Remodeling' ? 'selected' : '' }}>Bathroom Remodeling</option>
                                    <option {{ old('service_required')=='Tile Installation' ? 'selected' : '' }}>Tile Installation</option>
                                    <option {{ old('service_required')=='Kitchen Renovation' ? 'selected' : '' }}>Kitchen Renovation</option>
                                    <option {{ old('service_required')=='Full Home Refurbishment' ? 'selected' : '' }}>Full Home Refurbishment</option>
                                </select>
                            </div>

                            <div class="mb-4">
                                <label class="form-label fw-semibold">Message <span class="text-danger">*</span></label>
                                <textarea name="message" rows="4"
                                          class="form-control @error('message') is-invalid @enderror"
                                          placeholder="Tell us about your project (location, timeline, budget, etc.)">{{ old('message') }}</textarea>
                                @error('message') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            <button type="submit" class="btn btn-brand px-4">
                                <i class="bi bi-send me-2"></i>Send message
                            </button>

                            <p class="small text-muted mt-3 mb-0">
                                We usually respond within 24 hours.
                            </p>
                        </form>
                    </div>
                </div>
            </div>

            {{-- RIGHT: CONTACT + MAP --}}
            <div class="col-lg-5 offset-lg-1">

                {{-- CONTACT DETAILS CARD --}}
                <div class="card border-0 shadow-sm rounded-4 mb-4">
                    <div class="card-body p-4">
                        <h2 class="h5 fw-bold mb-3">Contact Details</h2>

                        <div class="d-flex align-items-center mb-3">
                            <div class="fr-icon-circle me-3">
                                <i class="bi bi-telephone-fill"></i>
                            </div>
                            <div>
                                <div class="small text-muted">Call us</div>
                                <a href="tel:+447449591531" class="fw-semibold text-dark text-decoration-none">
                                    0744 959 1531
                                </a>
                            </div>
                        </div>

                        <div class="d-flex align-items-center mb-3">
                            <div class="fr-icon-circle me-3">
                                <i class="bi bi-envelope-fill"></i>
                            </div>
                            <div>
                                <div class="small text-muted">Email</div>
                                <a href="mailto:fiiverivers786@gmail.com" class="fw-semibold text-dark text-decoration-none">
                                    fiiverivers786@gmail.com
                                </a>
                            </div>
                        </div>

                        <div class="d-flex align-items-center">
                            <div class="fr-icon-circle me-3">
                                <i class="bi bi-geo-alt-fill"></i>
                            </div>
                            <div>
                                <div class="small text-muted">Location</div>
                                <div class="fw-semibold">103 Orford Road Walthamstow, E17 9QU, London, United Kingdom</div>
                            </div>
                        </div>

                        <hr class="my-4">

                        <div class="d-flex gap-2">
                            <a href="tel:+447449591531" class="btn btn-outline-secondary w-50">
                                <i class="bi bi-telephone me-1"></i>Call
                            </a>
                            <a href="mailto:fiiverivers786@gmail.com" class="btn btn-outline-secondary w-50">
                                <i class="bi bi-envelope me-1"></i>Email
                            </a>
                        </div>
                    </div>
                </div>

                {{-- MAP CARD --}}
                    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
    <div class="card-body p-0">
        <div class="ratio ratio-4x3">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2479.3212344330796!2d-0.018781322939384733!3d51.58067570534724!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48761dec8ab7f265%3A0x67d65c9eaca35be2!2s103%20Orford%20Rd%2C%20London%20E17%209QU%2C%20UK!5e0!3m2!1sen!2sca!4v1765565231098!5m2!1sen!2sca"></src=>"
                style="border:0;"
                allowfullscreen
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
    </div>
</div>


                <p class="small text-muted mt-3">
    Visit us or get directions using Google Maps.
</p>
            </div>

        </div>
    </div>
</section>

{{-- Small CSS just for this page (safe + professional) --}}
<style>
    .fr-icon-circle{
        width: 44px;
        height: 44px;
        border-radius: 50%;
        background: rgba(198, 153, 71, 0.15); /* subtle gold tint */
        color: #c69947; /* gold */
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 18px;
        flex: 0 0 44px;
    }
</style>
@endsection
