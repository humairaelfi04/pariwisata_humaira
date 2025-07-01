<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Sistem Rekomendasi Wisata</title>

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Font Poppins --}}
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

    {{-- Font Awesome --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />

    <style>
        :root {
            --primary: #d2955c;
            --text-dark: #3a2f2f;
            --bg-soft: #fffaf3;
            --footer-bg: #f3e7dc;
        }

        * {
            font-family: 'Poppins', sans-serif;
        }

        body {
            background-color: var(--bg-soft);
            color: var(--text-dark);
        }

        /* Navbar */
        .navbar {
            background-color: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            box-shadow: 0 4px 16px rgba(0,0,0,0.04);
        }

        .navbar-brand {
            font-weight: 700;
            color: var(--text-dark) !important;
        }

        .nav-link {
            color: var(--text-dark) !important;
            font-weight: 500;
            margin-left: 1rem;
            transition: 0.3s ease;
        }

        .nav-link:hover {
            color: var(--primary) !important;
        }

        .dropdown-menu {
            border-radius: 10px;
        }

        .dropdown-item:hover {
            background-color: #fbe6d2;
            color: var(--text-dark);
        }

        main {
            padding-top: 100px;
            padding-bottom: 60px;
        }

        /* Hero */
        .hero-section {
            background: url('{{ asset('images/hero.jpg') }}') center center/cover no-repeat;
            height: 80vh;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        .hero-overlay {
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            width: 100%;
            background: rgba(0, 0, 0, 0.4);
            z-index: 0;
        }

        .hero-content {
            z-index: 1;
            color: white;
        }

        .hero-content h1 {
            font-size: 3rem;
            font-weight: 700;
        }

        .hero-content p {
            font-size: 1.25rem;
        }

        /* Footer */
        footer {
            background-color: var(--footer-bg);
            padding: 3rem 0 2rem;
            color: var(--text-dark);
        }

        footer a {
            color: var(--text-dark);
            text-decoration: none;
        }

        footer a:hover {
            color: var(--primary);
        }

        .footer-bottom {
            font-size: 0.875rem;
            color: #7a6e65;
        }

        .btn-primary,
        .btn-outline-primary {
            background-color: var(--primary);
            border-color: var(--primary);
        }

        .btn-outline-primary {
            background-color: transparent;
            color: var(--primary);
        }

        .btn-outline-primary:hover {
            background-color: var(--primary);
            color: white;
        }

        .btn-primary:hover {
            background-color: #bd8652;
        }

        @media (max-width: 768px) {
            .navbar-brand {
                font-size: 1.1rem;
            }

            .nav-link {
                font-size: 0.95rem;
            }

            .hero-content h1 {
                font-size: 2.1rem;
            }

            .hero-content p {
                font-size: 1rem;
            }

        }

        /* Pagination Styling */
/* Custom Pagination (Bootstrap 5) */
        .pagination {
            gap: 0.5rem;
            justify-content: center;
            flex-wrap: wrap;
        }

        .page-item .page-link {
            border-radius: 999px;
            padding: 0.45rem 1rem;
            font-weight: 500;
            color: var(--text-dark);
            background-color: #fffefc;
            border: 1px solid #f5dbc4;
            box-shadow: 0 2px 4px rgba(0,0,0,0.04);
            transition: all 0.2s ease-in-out;
        }

        .page-item .page-link:hover {
            background-color: #fbe6d2;
            color: var(--text-dark);
            border-color: #f5dbc4;
        }

        .page-item.active .page-link {
            background-color: var(--primary);
            border-color: var(--primary);
            color: #fff;
            font-weight: 600;
        }

        .page-item.disabled .page-link {
            background-color: #f0f0f0;
            color: #bcbcbc;
            border-color: #e0e0e0;
            pointer-events: none;
            opacity: 0.65;
        }

    </style>
</head>
<body>

    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center gap-2" href="{{ url('/') }}">
                <img src="{{ asset('images/logo.jpg') }}" alt="Logo" width="36" height="36" class="rounded-circle">
                <span>MalalaWak</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mainNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Destinasi</a></li>
                    <li class="nav-item"><a class="nav-link" href="/umkm">UMKM</a></li>
                    <li class="nav-item"><a class="nav-link" href="/event">Acara</a></li>
                    <li class="nav-item"><a class="nav-link" href="/tentang">Tentang</a></li>

                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                    @else
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                                {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end shadow-sm">
                                <li><a class="dropdown-item" href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                                <li>
                                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                        @csrf
                                        <button class="dropdown-item" type="submit">Logout</button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    {{-- Hero (optional) --}}
    {{--
    <div class="hero-section">
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <h1>Temukan Destinasi Impianmu</h1>
            <p>Eksplorasi wisata, UMKM lokal, dan acara menarik hanya di HumairaTour</p>
        </div>
    </div>
    --}}

    {{-- Content --}}
    <main class="container">
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer>
        <div class="container">
            <div class="row mb-4">
                <div class="col-md-6">
                    <h5>Hubungi Kami</h5>
                    <p>Email: info@humairatour.com</p>
                    <p>Telepon: +62 812 3456 7890</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <h5>Ikuti Kami</h5>
                    <a href="#"><i class="fab fa-facebook fa-lg me-3"></i></a>
                    <a href="#"><i class="fab fa-instagram fa-lg me-3"></i></a>
                    <a href="#"><i class="fab fa-twitter fa-lg"></i></a>
                </div>
            </div>
            <div class="footer-bottom text-center pt-3">
                © {{ date('Y') }} Sistem Informasi Pariwisata Humaira. All rights reserved.
            </div>
        </div>
    </footer>

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>
