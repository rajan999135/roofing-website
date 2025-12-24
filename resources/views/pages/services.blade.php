@php use Illuminate\Support\Str; @endphp

@extends('layouts.app')

@section('title', 'Our Services | Fiive Rivers Ltd')

@section('content')
    {{-- Top banner with offer --}}
    <section class="py-5 bg-light border-bottom">
        <div class="container text-center">
            <h1 class="mb-3">Our Best Services</h1>
            <p class="text-muted mb-2">
                We provide high-quality bathroom remodeling, tiling and full home renovation across London.
            </p>
            <p class="fw-semibold text-warning mb-3">
                ⭐ Special Offer for New Customers: ask about our discounted labour rates on your first full project.
            </p>
            <a href="{{ url('/contact') }}" class="btn btn-primary btn-lg">
                Request a Free Quote
            </a>
        </div>
    </section>

    {{-- Services grid --}}
    <section class="py-5">
        <div class="container">
            <div class="row g-4">
                @forelse ($services as $service)
                    <div class="col-md-6 col-lg-3">
                        <div class="card h-100 shadow-sm border-0">
                            @if ($service->icon)
                                <img src="{{ asset('images/' . $service->icon) }}"
                                     class="card-img-top"
                                     alt="{{ $service->title }}">
                            @endif

                            <div class="card-body d-flex flex-column">
                                <h2 class="h5 mb-2">{{ $service->title }}</h2>

                                @if ($service->short_description)
                                    <p class="text-muted small mb-3">
                                        {{ $service->short_description }}
                                    </p>
                                @endif

                                <p class="small text-muted flex-grow-1">
                                    {!! nl2br(e(Str::limit($service->description, 220))) !!}
                                </p>

                                <!-- <a href="{{ url('/services/' . $service->slug) }}"
                                   class="btn btn-outline-primary btn-sm mt-2 align-self-start">
                                    View Service Details
                                </a> -->
                                <a href="{{ route('services.show', $service->slug) }}" class="btn btn-outline-primary w-100">
    View Service Details
</a>

                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-center text-muted">
                        No services added yet. Please run the database seeder or add services from the admin side.
                    </p>
                @endforelse
            </div>
        </div>
    </section>
@endsection
