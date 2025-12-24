<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Five Rivers Ltd | Home Remodeling & Tiling')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Bootstrap 5 --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    {{-- Bootstrap Icons --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body { font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif; }
        .brand-gold { color: #c89b3c; }
        .bg-brand { background: #2a2141; }
        .btn-brand { background: #c89b3c; border-color:#c89b3c; color:#fff; }
        .btn-brand:hover { background:#a37d27; border-color:#a37d27; }
        .hero {
            background: linear-gradient(115deg, #2a2141 0%, #3f2c77 50%, #000 100%),
                        url('{{ asset('images/logo.jpg') }}') center/cover no-repeat;
            color: #fff;
        }
        .service-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 15px 30px rgba(0,0,0,.12);
        }
    </style>

    @stack('head')
</head>
<body>
<header class="bg-white shadow-sm sticky-top">
    <nav class="navbar navbar-expand-lg navbar-light container py-2">
        <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}">
            <img src="{{ asset('images/logo.jpg') }}" alt="Five Rivers" height="64" class="me-2">
            <div class="d-none d-md-block">
                <div class="fw-bold text-uppercase small">Fiive Rivers Ltd</div>
                <div class="small text-muted">Home Remodeling & Tiling</div>
            </div>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div id="mainNav" class="collapse navbar-collapse">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-lg-center">
                <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('services') }}">Services</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('projects') }}">Our Work</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('reviews') }}">Reviews</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('contactT') }}">Contact</a></li>

                {{-- ✅ Show when NOT logged in --}}
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">
                            <i class="bi bi-person-lock me-1"></i>  Login
                        </a>
                    </li>
                @endguest

                {{-- ✅ Show when logged in --}}
                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button"
                           data-bs-toggle="dropdown">
                            <i class="bi bi-person-gear me-1"></i> Admin
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <a class="dropdown-item" href="{{ route('admin.projects.index') }}">
                                    Manage Projects
                                </a>
                            </li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item">
                                        Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @endauth
            </ul>

            <a href="{{ route('contact') }}" class="btn btn-brand ms-lg-3">
                <i class="bi bi-telephone-outbound me-1"></i> Free Quote
            </a>
        </div>
    </nav>
</header>


<main>
    @yield('content')
</main>

<footer class="bg-dark text-light mt-auto pt-5 pb-3">
    <div class="container">

        <div class="row g-4 gy-5">

            {{-- Column 1: Brand + contact --}}
            <div class="col-md-4">
                <h5 class="text-uppercase fw-bold mb-3">Fiive Rivers Ltd</h5>

                <p class="small text-light-50 mb-3" style="max-width: 320px;">
                    Bathroom remodeling, tiling, plastering and full home renovation across London.
                </p>

                <ul class="list-unstyled small mb-0 footer-list">
                    <li class="d-flex align-items-start gap-2 mb-2">
                        <i class="bi bi-geo-alt"></i>
                        <span>103 Orford Road Walthamstow, E17 9QU, London, United Kingdom</span>
                    </li>

                    <li class="d-flex align-items-center gap-2 mb-2">
                        <i class="bi bi-telephone"></i>
                        <a href="tel:+447449591531" class="footer-link">0744 959 1531</a>
                    </li>

                    <li class="d-flex align-items-center gap-2">
                        <i class="bi bi-envelope"></i>
                        <a href="mailto:fiiverivers786@gmail.com" class="footer-link">fiiverivers786@gmail.com</a>
                    </li>
                </ul>
            </div>

            {{-- Column 2: Quick links --}}
            <div class="col-md-4">
                <h6 class="text-uppercase fw-bold mb-3">Quick Links</h6>

                <ul class="list-unstyled small footer-links">
                    <li class="mb-2">
                        <a href="{{ route('services') }}" class="footer-link">Services</a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ route('projects') }}" class="footer-link">Our Work</a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ route('reviews') }}" class="footer-link">Reviews</a>
                    </li>
                    <li>
                        <a href="{{ route('contact') }}" class="footer-link">Get a Quote</a>
                    </li>
                </ul>
            </div>

            {{-- Column 3: Social + badges --}}
            <div class="col-md-4">
                <h6 class="text-uppercase fw-bold mb-3">Find us online</h6>

                <div class="d-flex gap-2 mb-3">
                    <a href="https://www.facebook.com/fiiverivers" target="_blank" class="footer-social" aria-label="Facebook">
                        <i class="bi bi-facebook"></i>
                    </a>
                    <a href="https://www.instagram.com/yourhandle" target="_blank" class="footer-social" aria-label="Instagram">
                        <i class="bi bi-instagram"></i>
                    </a>
                    <a href="https://maps.app.goo.gl/sRbFEjJ4ULwv6Xh66" target="_blank" class="footer-social" aria-label="Google Maps">
                        <i class="bi bi-geo-alt-fill"></i>
                    </a>
                </div>

                <p class="small text-light-50 mt-3 mb-0">
                    Trusted by homeowners across London.
                </p>
            </div>
        </div>

        <hr class="border-secondary my-4">

        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center small">
            <span class="text-light-50">© {{ date('Y') }} Five Rivers Ltd. All rights reserved.</span>
            <span class="mt-2 mt-md-0">
                <a href="#" class="footer-link me-3">Privacy Policy</a>
                <a href="#" class="footer-link">Terms & Conditions</a>
            </span>
        </div>
    </div>
</footer>

{{-- Footer styles (move to app.css ideally) --}}
<style>
    .text-light-50 { color: rgba(255,255,255,.65) !important; }

    .footer-list i {
        color: rgba(255,255,255,.75);
        font-size: 1.05rem;
        margin-top: 2px;
    }

    .footer-link {
        color: rgba(255,255,255,.85);
        text-decoration: none;
    }
    .footer-link:hover {
        color: #fff;
        text-decoration: underline;
    }

    .footer-social {
        width: 42px;
        height: 42px;
        border-radius: 12px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        background: rgba(255,255,255,.08);
        color: #fff;
        text-decoration: none;
        font-size: 1.1rem;
    }
    .footer-social:hover {
        background: rgba(255,255,255,.14);
    }

    .footer-badge {
        max-width: 140px;
        opacity: .95;
        border-radius: 10px;
        background: rgba(255,255,255,.06);
        padding: 6px 10px;
    }
</style>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@stack('scripts')
</body>
</html>
