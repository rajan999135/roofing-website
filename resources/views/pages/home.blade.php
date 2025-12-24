@extends('layouts.app')

@section('title', 'Five Rivers Ltd | Bathroom Remodeling & Home Renovation in London')

@section('content')

{{-- ================= HERO SECTION ================= --}}
<section class="hero hero-v2 py-5">
    <div class="container py-4">
        <div class="row align-items-center g-4">

            {{-- LEFT CONTENT --}}
            <div class="col-lg-6">
                <h1 class="display-5 fw-bold mb-3 text-white">
                    Beautiful Bathrooms & Home Remodeling in London
                </h1>

                <p class="lead mb-3 hero-lead">
                    Fiive Rivers Ltd is a trusted London-based renovation company specialising in high-quality
                    bathroom remodeling, professional tiling, plastering, and full home refurbishments. We focus
                    on clean finishes, reliable timelines, and lasting results.
                </p>

                {{-- SERVICES LINE --}}
                <div class="d-flex flex-wrap gap-2 mb-4">
                    <span class="badge rounded-pill hero-chip">Bathroom Renovation</span>
                    <span class="badge rounded-pill hero-chip">Ceramic &amp; Porcelain Tiling</span>
                    <span class="badge rounded-pill hero-chip">Wet Rooms</span>
                    <span class="badge rounded-pill hero-chip">Plastering</span>
                    <span class="badge rounded-pill hero-chip">Full Home Refurbishment</span>
                </div>

                <div class="d-flex flex-wrap gap-3">
                    <a href="{{ route('contact') }}" class="btn btn-brand btn-lg px-4">
                        Request a Free Quote
                    </a>

                    <a href="{{ route('projects') }}" class="btn btn-outline-light btn-lg px-4">
                        View Our Work
                    </a>
                </div>

                <p class="mt-3 small text-white-50 mb-0">
                    <i class="bi bi-star-fill text-warning me-1"></i>
                    Rated 5.0 on Facebook &amp; Google · Fully Insured · Clean &amp; Reliable
                </p>
            </div>

            {{-- RIGHT IMAGE (AUTO SLIDER) --}}
            <div class="col-lg-6 d-none d-lg-block">
                <div class="hero-media shadow-lg">
                    <div class="hero-slider">
                        <img
                            src="{{ asset('images/hero/bathroom-ad.jpg') }}"
                            class="hero-img hero-slide is-active"
                            alt="Bathroom renovation by Five Rivers Ltd">

                        <img
                            src="{{ asset('images/hero/kitchen-slide.jpg') }}"
                            class="hero-img hero-slide"
                            alt="Kitchen renovation by Five Rivers Ltd">

                        {{-- Optional small label (looks premium) --}}
                        <div class="hero-badge">
                            <i class="bi bi-shield-check me-2"></i>Trusted Local Renovation Team
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

{{-- ================= ABOUT US ================= --}}
<section class="py-5 bg-white">
    <div class="container">
        <div class="row g-4 align-items-center">

            <div class="col-lg-6">
                <h2 class="h3 fw-bold mb-3">About Fiive Rivers Ltd</h2>

                <p class="text-muted mb-3" style="line-height:1.8;">
                    Fiive Rivers Ltd is a London-based home remodeling and renovation company specialising in
                    kitchens, bathrooms, tiling, and complete home refurbishments. We work closely with homeowners
                    to transform ideas into beautifully finished living spaces that combine style, comfort, and practicality.
                </p>

                <p class="text-muted mb-3" style="line-height:1.8;">
                    With years of hands-on experience, our skilled team manages every stage of the renovation process —
                    from planning and material selection to installation and final finishing. We focus on clear communication,
                    attention to detail, and delivering results that exceed expectations.
                </p>

                <p class="text-muted mb-0" style="line-height:1.8;">
                    Whether you are updating a single room or renovating your entire property, Five Rivers Ltd is committed
                    to delivering high-quality workmanship, transparent pricing, and reliable timelines on every project.
                </p>

                <div class="d-flex flex-wrap gap-2 mt-4">
                    <span class="badge rounded-pill about-chip"><i class="bi bi-check2-circle me-1"></i>Clear Communication</span>
                    <span class="badge rounded-pill about-chip"><i class="bi bi-check2-circle me-1"></i>Premium Finishes</span>
                    <span class="badge rounded-pill about-chip"><i class="bi bi-check2-circle me-1"></i>Reliable Timelines</span>
                    <span class="badge rounded-pill about-chip"><i class="bi bi-check2-circle me-1"></i>Transparent Pricing</span>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="about-card p-4 p-lg-5">
                    <div class="d-flex align-items-start gap-3">
                        <div class="about-icon">
                            <i class="bi bi-house-heart"></i>
                        </div>
                        <div>
                            <h3 class="h5 fw-bold mb-2">Designed for real homes</h3>
                            <p class="text-muted mb-0" style="line-height:1.8;">
                                We help you choose the right layout, materials, and finishes—then deliver professional
                                installation with attention to every detail.
                            </p>
                        </div>
                    </div>

                    <hr class="my-4">

                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="mini-stat">
                                <div class="mini-stat-title">Bathrooms</div>
                                <div class="mini-stat-text">Modern makeovers & wet rooms</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mini-stat">
                                <div class="mini-stat-title">Tiling</div>
                                <div class="mini-stat-text">Ceramic, porcelain & feature walls</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mini-stat">
                                <div class="mini-stat-title">Kitchens</div>
                                <div class="mini-stat-text">Renovations built to last</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mini-stat">
                                <div class="mini-stat-title">Refurb</div>
                                <div class="mini-stat-text">Full home updates & finishing</div>
                            </div>
                        </div>
                    </div>

                    <a href="{{ route('contact') }}" class="btn btn-brand w-100 mt-4">
                        Speak to us about your project
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>

{{-- ================= SERVICES ================= --}}
<section class="py-5 bg-light">
    <div class="container">
        <h2 class="h3 text-center mb-4">Our Best Services</h2>

        <div class="row g-4">
            @foreach($services as $service)
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm border-0 service-card">
                        <div class="card-body">
                            @if($service->icon)
                                <i class="bi {{ $service->icon }} fs-1 brand-gold mb-3"></i>
                            @endif
                            <h5 class="card-title">{{ $service->title }}</h5>
                            <p class="card-text small text-muted">
                                {{ $service->short_description }}
                            </p>
                            <a href="{{ route('services.show', $service->slug) }}"
                               class="stretched-link small fw-semibold">
                                Learn more
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ================= PROJECTS ================= --}}
<section class="py-5">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 class="h3 mb-0">Recent Projects</h2>
            <a href="{{ route('projects') }}" class="small text-decoration-none fw-semibold">
                View all projects
            </a>
        </div>

        <div class="row g-4">
            @foreach($projects as $project)
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm project-card">
                        @if($project->cover_image)
                            <img src="{{ asset('storage/'.$project->cover_image) }}"
                                 class="card-img-top project-img"
                                 alt="{{ $project->title }}">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $project->title }}</h5>
                            <p class="small text-muted mb-2">{{ $project->location }}</p>
                            <a href="{{ route('projects.show', $project->slug) }}"
                               class="stretched-link small fw-semibold">
                                See details
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ================= TRUST STATS ================= --}}
<section class="py-5 text-center bg-light">
    <div class="container">
        <h2 class="mb-4">What Our Clients Say</h2>

        <div class="row g-4">
            <div class="col-md-4">
                <h3 class="fw-bold text-brand">5★</h3>
                <p class="mb-0">Average Client Rating</p>
            </div>
            <div class="col-md-4">
                <h3 class="fw-bold text-brand">20+</h3>
                <p class="mb-0">Projects Completed</p>
            </div>
            <div class="col-md-4">
                <h3 class="fw-bold text-brand">London</h3>
                <p class="mb-0">Covering East, North, South & Central London</p>
            </div>
        </div>
    </div>
</section>

@endsection

{{-- ================= PAGE STYLES + HERO SLIDER JS ================= --}}
@push('scripts')
<script>
(function () {
    const slides = document.querySelectorAll('.hero-slide');
    if (!slides.length) return;

    // random first
    let idx = Math.floor(Math.random() * slides.length);
    slides.forEach(s => s.classList.remove('is-active'));
    slides[idx].classList.add('is-active');

    const prefersReduced = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    if (prefersReduced) return;

    setInterval(() => {
        slides[idx].classList.remove('is-active');
        idx = (idx + 1) % slides.length;
        slides[idx].classList.add('is-active');
    }, 3000);
})();
</script>
@endpush

<style>
/* HERO */
.hero.hero-v2{
    background:
        radial-gradient(1200px 600px at 20% 20%, rgba(255,255,255,.12), transparent 55%),
        linear-gradient(135deg, #2b1f52 0%, #3a2a6c 45%, #1a1336 100%);
}

.hero-lead{
    color: rgba(255,255,255,.86);
    line-height: 1.7;
    max-width: 56ch;
}

.hero-chip{
    background: rgba(255,255,255,.14);
    border: 1px solid rgba(255,255,255,.18);
    color: rgba(255,255,255,.92);
    font-weight: 600;
    padding: .55rem .9rem;
}

.hero-media{
    background: rgba(255,255,255,.06);
    border: 1px solid rgba(255,255,255,.14);
    border-radius: 18px;
    overflow: hidden;
}

.hero-slider{
    position: relative;
    height: 560px; /* big hero image */
}

.hero-img{
    width: 100%;
    height: 100%;
    object-fit: contain; /* poster-style images look better */
    background: rgba(0,0,0,.08);
    display: block;
}

.hero-slide{
    position: absolute;
    inset: 0;
    opacity: 0;
    transform: scale(1.01);
    transition: opacity .5s ease, transform .6s ease;
}
.hero-slide.is-active{
    opacity: 1;
    transform: scale(1);
}

.hero-badge{
    position: absolute;
    left: 16px;
    bottom: 16px;
    background: rgba(10, 10, 15, .55);
    color: rgba(255,255,255,.92);
    border: 1px solid rgba(255,255,255,.14);
    padding: .55rem .8rem;
    border-radius: 999px;
    font-size: .9rem;
    backdrop-filter: blur(8px);
}

ABOUT
.about-chip{
    background: #f6f7fb;
    border: 1px solid rgba(0,0,0,.06);
    color: #2b2b2b;
    font-weight: 600;
    padding: .55rem .9rem;
}

.about-card{
    border-radius: 18px;
    border: 1px solid rgba(0,0,0,.06);
    box-shadow: 0 .75rem 1.5rem rgba(0,0,0,.06);
    background: linear-gradient(180deg, #ffffff 0%, #fafafe 100%);
}

.about-icon{
    width: 44px;
    height: 44px;
    border-radius: 12px;
    display: grid;
    place-items: center;
    background: rgba(197, 148, 60, .12);
    color: #c5943c;
    font-size: 1.25rem;
}

.mini-stat{
    border: 1px solid rgba(0,0,0,.06);
    border-radius: 14px;
    padding: .9rem;
    background: #fff;
}
.mini-stat-title{
    font-weight: 800;
    letter-spacing: .2px;
}
.mini-stat-text{
    color: rgba(0,0,0,.62);
    font-size: .92rem;
    margin-top: .2rem;
}

/* CARDS */
.service-card{
    transition: transform .2s ease, box-shadow .2s ease;
}
.service-card:hover{
    transform: translateY(-4px);
    box-shadow: 0 .75rem 1.5rem rgba(0,0,0,.12);
}

.project-card{
    transition: transform .2s ease, box-shadow .2s ease;
}
.project-card:hover{
    transform: translateY(-4px);
    box-shadow: 0 .75rem 1.5rem rgba(0,0,0,.12);
}
.project-img{
    height: 220px;
    object-fit: cover;
}

/* MOBILE: hero image becomes smaller if you ever enable it */
@media (max-width: 991px){
    .hero-slider{ height: 360px; }
}
</style>
