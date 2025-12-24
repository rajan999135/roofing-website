@extends('layouts.app')

@section('title', $project->title . ' | Our Work')

@section('content')
<section class="py-5 project-page">
  <div class="container">

    <a href="{{ route('projects') }}" class="back-link d-inline-flex align-items-center mb-4">
      <i class="bi bi-arrow-left me-2"></i>Back to all projects
    </a>

    {{-- WHOLE PAGE BOX --}}
    <div class="project-shell border border-dark">

      <div class="row g-5 align-items-start">

        {{-- LEFT: content --}}
        <div class="col-lg-7 p-4">
          <div class="project-head mb-3 p-3">
            <h1 class="display-6 fw-bold mb-2 p-3">{{ $project->title }}</h1>

            <div class="d-flex flex-wrap gap-2 p-3">
              @if($project->location)
                <span class="meta-pill">
                  <i class="bi bi-geo-alt me-1"></i>{{ $project->location }}
                </span>
              @endif

              <span class="meta-pill meta-pill-dark">
                <i class="bi bi-shield-check me-1"></i>Completed project
              </span>
            </div>
          </div>

          <div class="project-description p-3">
            {!! nl2br(e($project->description)) !!}
          </div>

          <div class="mt-4 d-flex flex-wrap gap-3 p-4">
            <a href="{{ route('contact') }}" class="btn btn-brand px-4">
              <i class="bi bi-chat-dots me-2"></i>Request a Free Quote
            </a>

            <a href="{{ route('projects') }}" class="btn btn-outline-secondary px-4">
              View more projects
            </a>
          </div>
        </div>

        {{-- RIGHT: image --}}
        <div class="col-lg-5">
          <div class="project-hero-wrap">
            @php
              // ✅ Safe: supports both "projects/cover/x.jpg" and "storage/projects/cover/x.jpg"
              $cover = ltrim($project->cover_image ?? '', '/');
              $src = $cover
                ? (str_starts_with($cover, 'storage/') ? asset($cover) : asset('storage/' . $cover))
                : null;
            @endphp

            @if($src)
              <div class="project-hero-media">
                <img
                  src="{{ $src }}"
                  alt="{{ $project->title }}"
                  class="project-hero-img">

                <div class="project-hero-badge">
                  <i class="bi bi-star-fill me-2"></i>Premium finish
                </div>
              </div>
            @else
              <div class="project-hero-empty">
                <i class="bi bi-image"></i>
                <div class="mt-2 fw-semibold">No cover image</div>
                <div class="text-muted small">Upload one from admin.</div>
              </div>
            @endif
          </div>
        </div>

      </div>
    </div>

  </div>
</section>
@endsection

@push('styles')
<style>
/* page bg */
.project-page{
  background: #fff;
}

/* back link */
.back-link{
  color: rgba(0,0,0,.55);
  text-decoration: none;
  font-weight: 700;
}
.back-link:hover{ color: rgba(0,0,0,.8); }

/* ✅ WHOLE CONTENT BOX (black attractive border) */
.project-shell{
  background: #fff;
  border: 5px solid #121212;
  border-radius: 18px;
  padding: 28px;
  box-shadow: 0 18px 45px rgba(0,0,0,.10);
  position: relative;
}
.project-shell:before{
  content:"";
  position:absolute;
  inset: 10px;
  border-radius: 14px;
  border: 1px solid rgba(0,0,0,.10);
  pointer-events:none;
}

/* pills */
.meta-pill{
  display:inline-flex;
  align-items:center;
  gap:.35rem;
  border-radius:999px;
  padding:.5rem .85rem;
  font-weight:800;
  font-size:.92rem;
  background: #f6f7fb;
  border:1px solid rgba(0,0,0,.08);
  color:#2b2b2b;
}
.meta-pill-dark{
  background:#121212;
  border-color:#121212;
  color:#fff;
}

/* description */
.project-description{
  margin-top: 12px;
  line-height: 1.9;
  font-size: 1.05rem;
  color: #2e2f33;
}

/* ✅ right column padding */
.project-hero-wrap{
  padding: 28px 28px 28px 0;
}

/* ✅ image card */
.project-hero-media{
  position: sticky;
  top: 90px;
  border-radius: 18px;
  overflow: hidden;
  background: #fff;
  border: 1px solid rgba(0,0,0,.14);
  box-shadow: 0 .9rem 1.8rem rgba(0,0,0,.12);

  /* nice fixed visual height across screens */
  height: clamp(360px, 55vh, 640px);
}

/* ✅ image fills the card (FIXES tiny/broken look) */
.project-hero-img{
  width: 100%;
  height: 100%;
  object-fit: cover;
  object-position: center;
  display: block;
}

.project-hero-badge{
  position:absolute;
  left:16px;
  bottom:16px;
  background: rgba(10, 10, 15, .60);
  color: rgba(255,255,255,.95);
  border: 1px solid rgba(255,255,255,.16);
  padding: .55rem .8rem;
  border-radius: 999px;
  font-size: .92rem;
  backdrop-filter: blur(8px);
}

/* empty state */
.project-hero-empty{
  border-radius: 18px;
  border: 1px dashed rgba(0,0,0,.25);
  height: 360px;
  display:flex;
  align-items:center;
  justify-content:center;
  flex-direction:column;
  background: #fafafa;
  color: #111;
  text-align:center;
}
.project-hero-empty i{ font-size: 2rem; opacity: .8; }

/* Mobile */
@media (max-width: 991px){
  .project-shell{ padding: 18px; }
  .project-hero-wrap{ padding: 0; margin-top: 16px; }
  .project-hero-media{ position: relative; top:auto; height: 360px; }
  .project-hero-empty{ height: 280px; }
}
</style>
@endpush
