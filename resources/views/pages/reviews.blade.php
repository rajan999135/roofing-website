@extends('layouts.app')

@section('title', 'Reviews | Five Rivers Ltd')

@section('content')
<section class="py-5">
    <div class="container">

        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-end gap-3 mb-4">
            <div>
                <h1 class="display-6 fw-bold mb-2">Customer Reviews</h1>
                <p class="text-muted mb-0">
                    Genuine feedback from homeowners we’ve worked with across London.
                </p>
            </div>

            {{-- Removed the small "View on Google" button from header --}}
        </div>

        {{-- Flash messages --}}
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-warning">{{ session('error') }}</div>
        @endif

        <div class="row g-4 align-items-start">

            {{-- LEFT: Review list --}}
            <div class="col-lg-7">
                <div class="row g-3">
                    @forelse($testimonials as $review)
                        @php
                            $name      = $review->user->name ?? 'Customer';
                            $letter    = strtoupper(substr($name, 0, 1));
                            $date      = $review->created_at->format('d M Y');
                            $text      = trim($review->content ?? '');
                            $short     = \Illuminate\Support\Str::limit($text, 120);
                            $needsMore = strlen($text) > 120;
                        @endphp

                        <div class="col-12">
                            <div class="review-card p-4 bg-white border rounded-4 shadow-sm h-100">

                                <div class="d-flex justify-content-between align-items-start mb-2">
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="review-avatar bg-brand text-white d-flex align-items-center justify-content-center">
                                            {{ $letter }}
                                        </div>

                                        <div>
                                            <div class="fw-semibold">{{ $name }}</div>
                                            <div class="small text-muted">{{ $date }}</div>
                                        </div>
                                    </div>

                                    
                                </div>

                                <div class="mb-2">
                                    @for($i = 1; $i <= 5; $i++)
                                        <i class="bi bi-star{{ $i <= $review->rating ? '-fill text-warning' : '' }}"></i>
                                    @endfor
                                </div>

                                <p class="mb-0 small text-dark" style="line-height: 1.6;">
                                    “{{ $short }}”
                                    @if($needsMore)
                                        <button
                                            class="btn btn-link p-0 ms-1 small text-decoration-none"
                                            data-bs-toggle="modal"
                                            data-bs-target="#reviewModal{{ $review->id }}">
                                            Read more
                                        </button>
                                    @endif
                                </p>
                            </div>
                        </div>

                        {{-- Modal for full review --}}
                        @if($needsMore)
                            <div class="modal fade" id="reviewModal{{ $review->id }}" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content rounded-4">
                                        <div class="modal-header">
                                            <h5 class="modal-title fw-bold">Review by {{ $name }}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mb-2">
                                                @for($i = 1; $i <= 5; $i++)
                                                    <i class="bi bi-star{{ $i <= $review->rating ? '-fill text-warning' : '' }}"></i>
                                                @endfor
                                                <div class="small text-muted mt-1">{{ $date }}</div>
                                            </div>

                                            <p class="mb-0" style="line-height: 1.7;">
                                                “{{ $text }}”
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @empty
                        <p class="text-muted">No reviews yet. Be the first to leave one.</p>
                    @endforelse
                </div>

                <div class="mt-4">
                    {{ $testimonials->links() }}
                </div>
            </div>

            {{-- RIGHT: Review form + Google box --}}
            <div class="col-lg-5">
                @auth
                    @if(!$userReview)
                        <div class="card border-0 shadow-sm rounded-4">
                            <div class="card-body p-4">
                                <h2 class="h5 fw-bold mb-2">Leave a review</h2>
                                <p class="small text-muted mb-3">
                                    Rate your experience with Five Rivers Ltd. Max 100 characters, one review per account.
                                </p>

                                <form method="POST" action="{{ route('reviews.store') }}">
                                    @csrf

                                    <div class="mb-3">
                                        <label class="form-label fw-semibold">Rating</label>
                                        <div class="d-flex flex-wrap gap-2">
                                            @for($i = 5; $i >= 1; $i--)
                                                <div class="form-check form-check-inline m-0">
                                                    <input class="form-check-input"
                                                           type="radio"
                                                           name="rating"
                                                           id="rating{{ $i }}"
                                                           value="{{ $i }}"
                                                           {{ old('rating') == $i ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="rating{{ $i }}">
                                                        {{ $i }} ★
                                                    </label>
                                                </div>
                                            @endfor
                                        </div>
                                        @error('rating')
                                            <div class="text-danger small mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label fw-semibold">Your review</label>
                                        <textarea
                                            name="content"
                                            rows="3"
                                            maxlength="100"
                                            class="form-control @error('content') is-invalid @enderror"
                                            placeholder="Short and honest, max 100 characters.">{{ old('content') }}</textarea>
                                        <div class="form-text">Max 100 characters.</div>
                                        @error('content')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <button type="submit" class="btn btn-brand w-100">
                                        Submit review
                                    </button>
                                </form>

                                <hr class="my-4">

                                <a href="{{ route('contact') }}" class="btn btn-outline-secondary w-100">
                                    Request a Free Quote
                                </a>
                            </div>
                        </div>
                    @else
                        <div class="card border-0 shadow-sm rounded-4">
                            <div class="card-body p-4">
                                <h2 class="h5 fw-bold mb-2">Your review</h2>
                                <p class="small text-muted mb-2">You can only leave one review. Thank you!</p>

                                <div class="mb-2">
                                    @for($i = 1; $i <= 5; $i++)
                                        <i class="bi bi-star{{ $i <= $userReview->rating ? '-fill text-warning' : '' }}"></i>
                                    @endfor
                                </div>
                                <p class="mb-0 small">“{{ $userReview->content }}”</p>
                            </div>
                        </div>
                    @endif

                    {{-- Google Reviews card under the form (logged-in users too) --}}
                    <div class="card border-0 shadow-sm rounded-4 mt-3">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <h3 class="h6 fw-bold mb-0">Google Reviews</h3>
                                <i class="bi bi-google text-muted"></i>
                            </div>
                            <p class="small text-muted mb-3">
                                Check our latest ratings and feedback directly on Google.
                            </p>
                            <a href="https://maps.google.com/?q=52+Bloxhall+Rd+London" target="_blank" class="btn btn-google w-100">
                                <i class="bi bi-google me-2"></i> View Google Reviews
                            </a>
                        </div>
                    </div>

                @else
                    {{-- Guest: Login card --}}
                    <div class="card border-0 shadow-sm rounded-4">
                        <div class="card-body p-4">
                            <h2 class="h5 fw-bold mb-2">Want to leave a review?</h2>
                            <p class="small mb-3">
                                Please <a href="{{ route('login') }}">log in</a> to leave a review.
                                Visitors can read all reviews but only logged-in users can submit one.
                            </p>
                            <a href="{{ route('login') }}" class="btn btn-brand w-100">Login to write a review</a>
                        </div>
                    </div>

                    {{-- Guest: Google Reviews card under login --}}
                    <div class="card border-0 shadow-sm rounded-4 mt-3">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <h3 class="h6 fw-bold mb-0">Google Reviews</h3>
                                <i class="bi bi-google text-muted"></i>
                            </div>
                            <p class="small text-muted mb-3">
                                Prefer Google reviews? View our latest reviews and ratings directly on Google.
                            </p>
                            <a href="https://maps.app.goo.gl/sRbFEjJ4ULwv6Xh66"
   target="_blank"
   rel="noopener"
   class="btn btn-google w-100">
    <i class="bi bi-google me-2"></i>
    View Google Reviews
</a>

                        </div>
                    </div>
                @endauth
            </div>

        </div>
    </div>
</section>

{{-- Page-only CSS (move to app.css later) --}}
<style>
    .review-card{
        transition: transform .18s ease, box-shadow .18s ease;
    }
    .review-card:hover{
        transform: translateY(-4px);
        box-shadow: 0 .75rem 1.75rem rgba(0,0,0,.10) !important;
    }
    .review-avatar{
        width: 44px;
        height: 44px;
        border-radius: 999px;
        font-weight: 700;
        letter-spacing: .5px;
    }
    .review-google{
        opacity: .85;
    }

    /* Google-style button (OAuth look) */
    .btn-google{
        background: #ffffff;
        color: #111827;
        border: 1px solid #e5e7eb;
        font-weight: 600;
        padding: .65rem 1rem;
        border-radius: 12px;
        box-shadow: 0 .25rem .75rem rgba(0,0,0,.06);
        transition: transform .15s ease, box-shadow .15s ease;
    }
    .btn-google:hover{
        transform: translateY(-2px);
        box-shadow: 0 .75rem 1.5rem rgba(0,0,0,.10);
        color: #111827;
        background: #fff;
    }
</style>
@endsection
