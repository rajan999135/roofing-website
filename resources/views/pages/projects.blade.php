@php
    use Illuminate\Support\Str;
@endphp

@extends('layouts.app')

@section('title', 'Our Work | Five Rivers Ltd')

@section('content')

{{-- ===== Compact Header (no big empty space) ===== --}}
<section class="work-top py-4">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
            <div>
                <div class="work-kicker mb-1">
                    <i class="bi bi-stars me-2"></i>Our Work
                </div>
                <h1 class="work-heading mb-1">
                    Projects completed across London
                </h1>
                <p class="work-sub mb-0">
                    Bathrooms, kitchens, tiling & refurbishments — clean finishes and premium results.
                </p>
            </div>

            <div class="work-count">
                <i class="bi bi-grid me-1"></i>
                {{ $projects->count() }} project{{ $projects->count() === 1 ? '' : 's' }}
            </div>
        </div>
    </div>
</section>

{{-- ===== Content ===== --}}
<section class="py-5 bg-soft">
    <div class="container">

        @if($projects->count())

            <div class="d-grid gap-4 border border-dark p-4 shadow-lg">

                @foreach($projects as $project)
                    <article class="project-card border border-dark margin: 20px 20px 20px 20px;">
                        <div class="row g-0 align-items-stretch" >

                            {{-- LEFT: text --}}
                            <div class="col-lg-7 padding: 30px;">
                                <div class="project-body p-4">

                                    @if($project->location)
                                        <div class="project-loc mb-3">
                                            <i class="bi bi-geo-alt me-1"></i>{{ $project->location }}
                                        </div>
                                    @endif

                                    <h2 class="project-title mb-2">
                                        {{ $project->title }}
                                    </h2>

                                    <p class="project-desc mb-4">
                                        {{ $project->short_description ?: Str::limit($project->description, 170) }}
                                    </p>

                                    <div class="d-flex flex-wrap gap-2">
                                        <a href="{{ route('projects.show', $project->slug) }}" class="btn btn-dark px-4">
                                            View project <i class="bi bi-arrow-right-short ms-1"></i>
                                        </a>
                                    </div>

                                    <div class="project-meta mt-4">
                                        <span class="meta-chip">
                                            <i class="bi bi-shield-check me-2"></i>Completed project
                                        </span>
                                    </div>

                                </div>
                            </div>

                            {{-- RIGHT: big image --}}
                            <div class="col-lg-5 padding: 30px;">
                                <a href="{{ route('projects.show', $project->slug) }}" class="project-media-link">
                                    <div class="project-media p-4">
                                        @if($project->cover_image)
                                            <img
                                                src="{{ asset('storage/' . $project->cover_image) }}"
                                                alt="{{ $project->title }}"
                                                class="project-img">
                                        @else
                                            <div class="project-img project-fallback d-flex align-items-center justify-content-center">
                                                <span class="text-muted">No image</span>
                                            </div>
                                        @endif

                                        <div class="project-overlay"></div>

                                        <div class="project-corner">
                                            <i class="bi bi-arrow-up-right"></i>
                                        </div>
                                    </div>
                                </a>
                            </div>

                        </div>
                    </article>
                @endforeach

            </div>

        @else
            <div class="alert alert-info mb-0">
                No projects added yet. Please check back soon.
            </div>
        @endif

    </div>
</section>

@endsection


@push('styles')
<style>

/* ===== Compact Header ===== */
.work-top{
    background:
        radial-gradient(900px 420px at 20% 10%, rgba(255,255,255,.12), transparent 55%),
        linear-gradient(135deg, #2b1f52 0%, #3a2a6c 45%, #1a1336 100%);
}
.work-kicker{
    color: rgba(255,255,255,.80);
    font-weight: 800;
    letter-spacing: .2px;
}
.work-heading{
    color: #fff;
    font-weight: 900;
    letter-spacing: -.4px;
    font-size: clamp(1.4rem, 2.4vw, 2.1rem);
}
.work-sub{
    color: rgba(255,255,255,.70);
    max-width: 72ch;
    line-height: 1.6;
}
.work-count{
    color: rgba(255,255,255,.85);
    font-weight: 800;
    padding: .6rem .9rem;
    border-radius: 999px;
    background: rgba(255,255,255,.10);
    border: 1px solid rgba(255,255,255,.14);
}

/* ===== Page background ===== */
.bg-soft{ background: #f6f7fb; }

/* ===== Project Card ===== */
.project-card{
    width: 100%;
    background: #ffffff;
    border-radius: 22px;
    overflow: hidden;

    /* CLEAR visible border */
    border: 2px solid rgba(0,0,0,0.12);

    /* Premium shadow + subtle gold ring */
    box-shadow:
        0 14px 35px rgba(0,0,0,0.10),
        0 0 0 1px rgba(197,148,60,0.16);

    transition: transform .2s ease, box-shadow .2s ease, border-color .2s ease;
    
}
.project-card:hover{
    transform: translateY(-4px);
    border-color: rgba(197,148,60,0.55);
    box-shadow:
        0 20px 45px rgba(0,0,0,0.16),
        0 0 0 3px rgba(197,148,60,0.22);
}

/* LEFT */
.project-body{
    padding: 40px;
}
.project-loc{
    display:inline-flex;
    align-items:center;
    gap:.35rem;
    padding: .45rem .75rem;
    border-radius: 999px;
    background: #f6f7fb;
    border: 1px solid rgba(0,0,0,.06);
    color: rgba(0,0,0,.70);
    font-weight: 800;
    font-size: .92rem;
}
.project-title{
    font-weight: 950;
    letter-spacing: -.25px;
    line-height: 1.15;
}
.project-desc{
    color: rgba(0,0,0,.66);
    line-height: 1.75;
    max-width: 70ch;
    font-size: 1.02rem;
}
.meta-chip{
    display:inline-flex;
    align-items:center;
    padding: .55rem .8rem;
    border-radius: 999px;
    background: rgba(197,148,60,.10);
    border: 1px solid rgba(197,148,60,.25);
    color: rgba(0,0,0,.78);
    font-weight: 800;
    font-size: .92rem;
}

/* RIGHT image */
.project-media-link{ display:block; height:100%; text-decoration:none; }
.project-media{
    position: relative;
    height: 100%;
    min-height: 440px; /* BIG like hero */
    background: #fff;
}
.project-img{
    width: 100%;
    height: 100%;
    min-height: 440px;
    object-fit: cover;
    display:block;
    transform: scale(1.02);
    transition: transform .45s ease;
}
.project-card:hover .project-img{
    transform: scale(1.07);
}
.project-fallback{
    min-height: 440px;
    background: #f6f7fb;
}
.project-overlay{
    position:absolute;
    inset:0;
    background: linear-gradient(90deg, rgba(255,255,255,0) 0%, rgba(0,0,0,.10) 55%, rgba(0,0,0,.18) 100%);
}
.project-corner{
    position:absolute;
    top:14px;
    right:14px;
    width:40px;
    height:40px;
    border-radius: 14px;
    display:grid;
    place-items:center;
    background: rgba(10,10,15,.55);
    color: rgba(255,255,255,.92);
    border: 1px solid rgba(255,255,255,.16);
    backdrop-filter: blur(10px);
}

/* Mobile */
@media (max-width: 991px){
    .project-body{ padding: 22px; }
    .project-media{ min-height: 270px; }
    .project-img, .project-fallback{ min-height: 270px; }
}
</style>
@endpush
