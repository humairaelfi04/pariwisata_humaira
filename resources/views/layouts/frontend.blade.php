<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Sistem Rekomendasi Wisata</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    {{-- font inter --}}
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    {{-- font awesome --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />
    {{-- AOS animasi --}}
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
        :root {
            --primary: #8B4513;
            --primary-light: #A0522D;
            --primary-dark: #654321;
            --primary-ultra: #3E2723;
            --secondary: #D2691E;
            --accent: #CD853F;
            --success: #228B22;
            --warning: #FF8C00;
            --danger: #DC143C;
            --info: #20B2AA;
            --text-dark: #2F1B14;
            --text-light: #5D4037;
            --bg-light: #FDF5E6;
            --bg-white: #FFFAF0;
            --bg-cream-50: #FFF8DC;
            --bg-cream-100: #F5F5DC;
            --border-light: #DEB887;
            --border-brown: #D2B48C;
            --shadow-sm: 0 1px 2px 0 rgb(0 0 0 / 0.05);
            --shadow-md: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
            --shadow-lg: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1);
            --shadow-xl: 0 20px 25px -5px rgb(0 0 0 / 0.1), 0 8px 10px -6px rgb(0 0 0 / 0.1);
            --shadow-brown: 0 10px 15px -3px rgb(139 69 19 / 0.1), 0 4px 6px -4px rgb(139 69 19 / 0.1);
        }

        * {
            font-family: 'Inter', sans-serif;
        }

        body {
            background: linear-gradient(135deg, #F5DEB3 0%, #DEB887 100%);
            color: var(--text-dark);
            line-height: 1.6;
            min-height: 100vh;
            overflow-x: hidden;
        }

        /* scrollbar */
        ::-webkit-scrollbar {
            width: 10px;
        }

        ::-webkit-scrollbar-track {
            background: var(--bg-cream-50);
        }

        ::-webkit-scrollbar-thumb {
            background: linear-gradient(180deg, var(--primary), var(--primary-dark));
            border-radius: 5px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(180deg, var(--primary-dark), var(--primary-ultra));
        }

        /*  navbar */
        .navbar {
            background: rgba(255, 250, 240, 0.95);
            backdrop-filter: blur(20px);
            box-shadow: var(--shadow-brown);
            border-bottom: 1px solid rgba(139, 69, 19, 0.1);
            transition: all 0.3s ease;
        }

        .navbar-brand {
            font-weight: 900;
            font-size: 1.6rem;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .navbar-brand img {
            transition: all 0.3s ease;
            border: 3px solid var(--primary);
            box-shadow: var(--shadow-md);
        }

        .navbar-brand:hover img {
            transform: scale(1.1) rotate(5deg);
            box-shadow: var(--shadow-lg);
        }

        .nav-link {
            color: var(--text-dark) !important;
            font-weight: 600;
            margin: 0 0.5rem;
            padding: 0.75rem 1.25rem !important;
            border-radius: 12px;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .nav-link::before {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            width: 0;
            height: 3px;
            background: linear-gradient(90deg, var(--primary), var(--secondary));
            transition: all 0.3s ease;
            transform: translateX(-50%);
            border-radius: 2px;
        }

        .nav-link:hover::before {
            width: 80%;
        }

        .nav-link:hover {
            color: var(--primary) !important;
            background: rgba(139, 69, 19, 0.08);
            transform: translateY(-2px);
            box-shadow: var(--shadow-brown);
        }

        .dropdown-menu {
            border: none;
            border-radius: 16px;
            box-shadow: var(--shadow-xl);
            padding: 0.75rem;
            margin-top: 0.5rem;
            background: rgba(255, 250, 240, 0.95);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(139, 69, 19, 0.1);
        }

        .dropdown-item {
            border-radius: 10px;
            padding: 0.75rem 1rem;
            font-weight: 500;
            transition: all 0.3s ease;
            color: var(--text-dark);
        }

        .dropdown-item:hover {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            transform: translateX(5px);
        }

        /* button login */
        .btn-login {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            border: none;
            color: white;
            padding: 0.75rem 1.75rem;
            border-radius: 25px;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: var(--shadow-brown);
            position: relative;
            overflow: hidden;
        }

        .btn-login::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s ease;
        }

        .btn-login:hover::before {
            left: 100%;
        }

        .btn-login:hover {
            transform: translateY(-3px);
            box-shadow: var(--shadow-xl);
            color: white;
        }

        main {
            padding-top: 120px;
            padding-bottom: 80px;
            min-height: calc(100vh - 200px);
        }

        /* hero section */
        .hero-section {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark), var(--primary-ultra));
            min-height: 70vh;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            overflow: hidden;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000"><polygon fill="rgba(255,255,255,0.1)" points="0,1000 1000,0 1000,1000"/></svg>');
            background-size: cover;
        }

        .hero-section::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: radial-gradient(circle at 30% 20%, rgba(210, 180, 140, 0.3) 0%, transparent 50%),
                        radial-gradient(circle at 70% 80%, rgba(205, 133, 63, 0.3) 0%, transparent 50%);
        }

        .hero-content {
            position: relative;
            z-index: 2;
            color: white;
        }

        .hero-content h1 {
            font-size: 4rem;
            font-weight: 900;
            margin-bottom: 1.5rem;
            text-shadow: 0 4px 8px rgba(0,0,0,0.2);
            background: linear-gradient(135deg, #FFF8DC, #F5F5DC);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .hero-content p {
            font-size: 1.35rem;
            font-weight: 400;
            opacity: 0.95;
            max-width: 700px;
            margin: 0 auto;
            line-height: 1.8;
        }

        /* cards */
        .card {
            border: none;
            border-radius: 20px;
            box-shadow: var(--shadow-lg);
            transition: all 0.4s ease;
            overflow: hidden;
            background: rgba(255, 250, 240, 0.95);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(139, 69, 19, 0.1);
        }

        .card:hover {
            transform: translateY(-12px) scale(1.02);
            box-shadow: var(--shadow-xl);
            border-color: rgba(139, 69, 19, 0.2);
        }

        .card-img-top {
            height: 220px;
            object-fit: cover;
            transition: transform 0.4s ease;
        }

        .card:hover .card-img-top {
            transform: scale(1.08);
        }

        .card-body {
            padding: 1.75rem;
        }

        .card-title {
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 1rem;
        }

        .card-text {
            color: var(--text-light);
            line-height: 1.7;
        }

        /* button */
        .btn-primary {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            border: none;
            border-radius: 12px;
            padding: 0.875rem 1.75rem;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: var(--shadow-brown);
            position: relative;
            overflow: hidden;
        }

        .btn-primary::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s ease;
        }

        .btn-primary:hover::before {
            left: 100%;
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: var(--shadow-xl);
            background: linear-gradient(135deg, var(--primary-dark), var(--primary));
        }

        .btn-outline-primary {
            border: 2px solid var(--primary);
            color: var(--primary);
            background: transparent;
            border-radius: 12px;
            padding: 0.875rem 1.75rem;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-outline-primary:hover {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            transform: translateY(-3px);
            box-shadow: var(--shadow-brown);
            border-color: transparent;
        }

        .btn-secondary {
            background: linear-gradient(135deg, var(--secondary), var(--accent));
            border: none;
            border-radius: 12px;
            padding: 0.875rem 1.75rem;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: var(--shadow-md);
        }

        .btn-secondary:hover {
            transform: translateY(-3px);
            box-shadow: var(--shadow-xl);
            background: linear-gradient(135deg, var(--accent), var(--secondary));
        }

        /* footer */
        footer {
            background: linear-gradient(135deg, var(--primary-ultra), var(--primary-dark), var(--primary));
            color: white;
            padding: 4rem 0 2rem;
            position: relative;
            overflow: hidden;
        }

        footer::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--primary), var(--secondary), var(--accent));
        }

        footer::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000"><polygon fill="rgba(255,255,255,0.02)" points="0,1000 1000,0 1000,1000"/></svg>');
            background-size: cover;
        }

        footer h5 {
            color: white;
            font-weight: 700;
            margin-bottom: 1.5rem;
            position: relative;
            font-size: 1.25rem;
        }

        footer h5::after {
            content: '';
            position: absolute;
            bottom: -8px;
            left: 0;
            width: 50px;
            height: 3px;
            background: linear-gradient(90deg, var(--secondary), var(--accent));
            border-radius: 2px;
        }

        footer a {
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            transition: all 0.3s ease;
            display: inline-block;
        }

        footer a:hover {
            color: var(--secondary);
            transform: translateX(8px);
        }

        .social-links a {
            display: inline-block;
            width: 50px;
            height: 50px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            text-align: center;
            line-height: 50px;
            margin-right: 1rem;
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
        }

        .social-links a:hover {
            background: linear-gradient(135deg, var(--secondary), var(--accent));
            transform: translateY(-5px) scale(1.1);
            box-shadow: var(--shadow-lg);
        }

        .footer-bottom {
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            padding-top: 2rem;
            margin-top: 3rem;
            text-align: center;
            color: rgba(255, 255, 255, 0.7);
        }

        /* pagination */
        .pagination {
            gap: 0.75rem;
            justify-content: center;
            flex-wrap: wrap;
        }

        .page-item .page-link {
            border-radius: 12px;
            padding: 0.875rem 1.25rem;
            font-weight: 600;
            color: var(--text-dark);
            background: var(--bg-white);
            border: 2px solid var(--border-brown);
            box-shadow: var(--shadow-sm);
            transition: all 0.3s ease;
        }

        .page-item .page-link:hover {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            border-color: transparent;
            transform: translateY(-2px);
            box-shadow: var(--shadow-brown);
        }

        .page-item.active .page-link {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            border-color: transparent;
            color: white;
            font-weight: 700;
            box-shadow: var(--shadow-brown);
        }

        .page-item.disabled .page-link {
            background: var(--bg-cream-50);
            color: var(--text-light);
            border-color: var(--border-light);
            opacity: 0.6;
        }

        /* loading animasi */
        .loading {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
            transition: opacity 0.5s ease;
        }

        .loading.hidden {
            opacity: 0;
            pointer-events: none;
        }

        .spinner {
            width: 60px;
            height: 60px;
            border: 4px solid rgba(255, 255, 255, 0.3);
            border-top: 4px solid white;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* button kembali ke atas */
        .back-to-top {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 55px;
            height: 55px;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            border: none;
            border-radius: 50%;
            box-shadow: var(--shadow-xl);
            transition: all 0.3s ease;
            opacity: 0;
            visibility: hidden;
            z-index: 1000;
        }

        .back-to-top.show {
            opacity: 1;
            visibility: visible;
        }

        .back-to-top:hover {
            transform: translateY(-8px) scale(1.1);
            box-shadow: var(--shadow-xl);
            background: linear-gradient(135deg, var(--primary-dark), var(--primary));
        }

        /* responsive */
        @media (max-width: 768px) {
            .navbar-brand {
                font-size: 1.3rem;
            }

            .nav-link {
                margin: 0.25rem 0;
                text-align: center;
            }

            .hero-content h1 {
                font-size: 2.8rem;
            }

            .hero-content p {
                font-size: 1.1rem;
            }

            main {
                padding-top: 100px;
            }

            .card:hover {
                transform: translateY(-8px) scale(1.01);
            }
        }

        /*smooth scrolling */
        html {
            scroll-behavior: smooth;
        }

        /* floating animasi */
        .floating {
            animation: floating 3s ease-in-out infinite;
        }

        @keyframes floating {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }

        /* glow efek */
        .glow {
            box-shadow: 0 0 20px rgba(139, 69, 19, 0.3);
        }

        .glow:hover {
            box-shadow: 0 0 30px rgba(139, 69, 19, 0.5);
        }
    </style>
</head>
<body>

    <div class="loading" id="loading">
        <div class="spinner"></div>
    </div>

    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center gap-3" href="{{ url('/') }}" data-aos="fade-right">
                <img src="{{ asset('images/logo.jpg') }}" alt="Logo" width="45" height="45" class="rounded-circle shadow-sm">
                <span>MalalaWak</span>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="mainNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item" data-aos="fade-down" data-aos-delay="100">
                        <a class="nav-link" href="{{ url('/') }}">
                            <i class="fas fa-map-marker-alt me-2"></i>Destinasi
                        </a>
                    </li>
                    <li class="nav-item" data-aos="fade-down" data-aos-delay="200">
                        <a class="nav-link" href="/umkm">
                            <i class="fas fa-store me-2"></i>UMKM
                        </a>
                    </li>
                    <li class="nav-item" data-aos="fade-down" data-aos-delay="300">
                        <a class="nav-link" href="/event">
                            <i class="fas fa-calendar-alt me-2"></i>Acara
                        </a>
                    </li>
                    <li class="nav-item" data-aos="fade-down" data-aos-delay="400">
                        <a class="nav-link" href="/tentang">
                            <i class="fas fa-info-circle me-2"></i>Tentang
                        </a>
                    </li>

                    @guest
                        <li class="nav-item ms-2" data-aos="fade-down" data-aos-delay="500">
                            <a class="btn btn-login" href="{{ route('login') }}">
                                <i class="fas fa-sign-in-alt me-2"></i>Login
                            </a>
                        </li>
                    @else
                        <li class="nav-item dropdown ms-2" data-aos="fade-down" data-aos-delay="500">
                            <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown">
                                <i class="fas fa-user-circle me-2"></i>
                                {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a class="dropdown-item" href="{{ route('admin.dashboard') }}">
                                        <i class="fas fa-tachometer-alt me-2"></i>Dashboard
                                    </a>
                                </li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                        @csrf
                                        <button class="dropdown-item" type="submit">
                                            <i class="fas fa-sign-out-alt me-2"></i>Logout
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <main class="container">
        @yield('content')
    </main>

    <footer>
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <h5>MalalaWak</h5>
                    <p class="mb-4">Platform rekomendasi wisata terbaik untuk menemukan destinasi impian Anda. Jelajahi tempat-tempat menarik, UMKM lokal, dan acara seru dengan pengalaman yang tak terlupakan.</p>
                    <div class="social-links">
                        <a href="#" class="floating"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="floating"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="floating"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="floating"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <h5>Layanan</h5>
                    <ul class="list-unstyled">
                        <li><a href="{{ url('/') }}">Destinasi Wisata</a></li>
                        <li><a href="/umkm">UMKM Lokal</a></li>
                        <li><a href="/event">Event & Acara</a></li>
                        <li><a href="/tentang">Tentang Kami</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <h5>Kontak</h5>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-envelope me-2"></i>info@malalawak.com</li>
                        <li><i class="fas fa-phone me-2"></i>+62 812 3456 7890</li>
                        <li><i class="fas fa-map-marker-alt me-2"></i>Jl. Pariwisata No. 123</li>
                        <li><i class="fas fa-clock me-2"></i>Senin - Minggu, 08:00 - 22:00</li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="400">
                    <h5>Newsletter</h5>
                    <p>Dapatkan info terbaru tentang destinasi wisata dan event menarik.</p>
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" placeholder="Email Anda" style="border-radius: 25px 0 0 25px; border: none; background: rgba(255,255,255,0.1); color: white;">
                        <button class="btn btn-primary" type="button" style="border-radius: 0 25px 25px 0;">
                            <i class="fas fa-paper-plane"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <p class="mb-0">© {{ date('Y') }} MalalaWak - Sistem Informasi Pariwisata. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- button kembali ke atas -->
    <button class="back-to-top" id="backToTop">
        <i class="fas fa-arrow-up"></i>
    </button>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script>
        // AOS
        AOS.init({
            duration: 800,
            easing: 'ease-in-out',
            once: true
        });

        // loading screen
        window.addEventListener('load', function() {
            const loading = document.getElementById('loading');
            loading.classList.add('hidden');
            setTimeout(() => {
                loading.style.display = 'none';
            }, 500);
        });

        // button kembali ke atas
        const backToTopBtn = document.getElementById('backToTop');

        window.addEventListener('scroll', function() {
            if (window.pageYOffset > 300) {
                backToTopBtn.classList.add('show');
            } else {
                backToTopBtn.classList.remove('show');
            }
        });

        backToTopBtn.addEventListener('click', function() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });

        // efek navbar scroll
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 50) {
                navbar.style.background = 'rgba(255, 250, 240, 0.98)';
                navbar.style.boxShadow = '0 10px 30px rgba(139, 69, 19, 0.15)';
            } else {
                navbar.style.background = 'rgba(255, 250, 240, 0.95)';
                navbar.style.boxShadow = '0 4px 6px -1px rgba(0,0,0,0.1)';
            }
        });

        // smooth scroll
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // floating animasi delay
        document.querySelectorAll('.floating').forEach((element, index) => {
            element.style.animationDelay = `${index * 0.2}s`;
        });

        // parallax efek
        window.addEventListener('scroll', function() {
            const scrolled = window.pageYOffset;
            const parallax = document.querySelector('body');
            const speed = scrolled * 0.3;
            parallax.style.transform = `translateY(${speed}px)`;
        });
    </script>

    @stack('scripts')
</body>
</html>
