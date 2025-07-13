<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sistem Rekomendasi Wisata</title>

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Font Inter --}}
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    {{-- Font Awesome --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    {{-- AOS Animation --}}
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
        :root {
            --primary: #8B4513;
            --primary-dark: #654321;
            --primary-light: #A0522D;
            --secondary: #D2691E;
            --accent: #CD853F;
            --success: #228B22;
            --warning: #FF8C00;
            --danger: #DC143C;
            --info: #20B2AA;
            --dark: #3E2723;
            --light: #FDF5E6;
            --white: #FFFAF0;
            --gray-50: #FFF8DC;
            --gray-100: #F5F5DC;
            --gray-200: #DEB887;
            --gray-300: #D2B48C;
            --gray-400: #BC8F8F;
            --gray-500: #A0522D;
            --gray-600: #8B4513;
            --gray-700: #654321;
            --gray-800: #3E2723;
            --gray-900: #2F1B14;
            --shadow-sm: 0 1px 2px 0 rgb(0 0 0 / 0.05);
            --shadow-md: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
            --shadow-lg: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1);
            --shadow-xl: 0 20px 25px -5px rgb(0 0 0 / 0.1), 0 8px 10px -6px rgb(0 0 0 / 0.1);
            --shadow-2xl: 0 25px 50px -12px rgb(0 0 0 / 0.25);
        }

        * {
            font-family: 'Inter', sans-serif;
        }

        body {
            background: linear-gradient(135deg, #F5DEB3 0%, #DEB887 100%);
            color: var(--gray-800);
            min-height: 100vh;
            overflow-x: hidden;
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: var(--gray-100);
        }

        ::-webkit-scrollbar-thumb {
            background: var(--primary);
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: var(--primary-dark);
        }

        /* Navbar */
        .navbar {
            background: rgba(255, 250, 240, 0.95);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(255, 250, 240, 0.2);
            box-shadow: var(--shadow-lg);
            transition: all 0.3s ease;
        }

        .navbar-brand {
            font-weight: 900;
            font-size: 1.5rem;
            background: linear-gradient(135deg, var(--primary), var(--primary-light));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .navbar-brand:hover {
            transform: scale(1.05);
            transition: transform 0.3s ease;
        }

        .navbar-brand .logo-img {
            width: 40px;
            height: 40px;
            border-radius: 8px;
            object-fit: cover;
            box-shadow: var(--shadow-md);
            transition: all 0.3s ease;
        }

        .navbar-brand:hover .logo-img {
            transform: rotate(5deg) scale(1.1);
            box-shadow: var(--shadow-lg);
        }

        .navbar-brand::before {
            display: none; /* Menghilangkan emoji kompas karena sudah ada logo */
        }

        .nav-link {
            color: var(--gray-700) !important;
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
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(139, 69, 19, 0.1), transparent);
            transition: left 0.5s ease;
        }

        .nav-link:hover::before {
            left: 100%;
        }

        .nav-link:hover {
            color: var(--primary) !important;
            background: rgba(139, 69, 19, 0.05);
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
        }

        .dropdown-menu {
            border: none;
            border-radius: 16px;
            box-shadow: var(--shadow-xl);
            padding: 0.75rem;
            margin-top: 0.5rem;
            background: rgba(255, 250, 240, 0.95);
            backdrop-filter: blur(20px);
        }

        .dropdown-item {
            border-radius: 10px;
            padding: 0.75rem 1rem;
            font-weight: 500;
            transition: all 0.3s ease;
            color: var(--gray-700);
        }

        .dropdown-item:hover {
            background: linear-gradient(135deg, var(--primary), var(--primary-light));
            color: white;
            transform: translateX(5px);
        }

        /* Login Button */
        .btn-login {
            background: linear-gradient(135deg, var(--primary), var(--primary-light));
            border: none;
            color: white;
            padding: 0.75rem 1.5rem;
            border-radius: 25px;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: var(--shadow-md);
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

        /* Content Cards */
        .content-card {
            background: rgba(255, 250, 240, 0.95);
            backdrop-filter: blur(20px);
            border-radius: 20px;
            box-shadow: var(--shadow-lg);
            border: 1px solid rgba(255, 250, 240, 0.2);
            transition: all 0.3s ease;
            overflow: hidden;
        }

        .content-card:hover {
            transform: translateY(-8px);
            box-shadow: var(--shadow-2xl);
        }

        .card-header {
            background: linear-gradient(135deg, var(--primary), var(--primary-light));
            color: white;
            padding: 1.5rem;
            border: none;
            position: relative;
            overflow: hidden;
        }

        .card-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000"><polygon fill="rgba(255,255,255,0.1)" points="0,1000 1000,0 1000,1000"/></svg>');
            background-size: cover;
        }

        .card-body {
            padding: 2rem;
        }

        /* Buttons */
        .btn-primary {
            background: linear-gradient(135deg, var(--primary), var(--primary-light));
            border: none;
            border-radius: 12px;
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: var(--shadow-md);
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
            transform: translateY(-2px);
            box-shadow: var(--shadow-xl);
        }

        .btn-outline-primary {
            border: 2px solid var(--primary);
            color: var(--primary);
            background: transparent;
            border-radius: 12px;
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-outline-primary:hover {
            background: var(--primary);
            color: white;
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
        }

        .btn-success {
            background: linear-gradient(135deg, var(--success), #1B5E20);
            border: none;
            border-radius: 12px;
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: var(--shadow-md);
        }

        .btn-success:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-xl);
        }

        .btn-danger {
            background: linear-gradient(135deg, var(--danger), #B71C1C);
            border: none;
            border-radius: 12px;
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: var(--shadow-md);
        }

        .btn-danger:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-xl);
        }

        /* Tables */
        .table {
            background: rgba(255, 250, 240, 0.95);
            backdrop-filter: blur(20px);
            border-radius: 16px;
            overflow: hidden;
            box-shadow: var(--shadow-lg);
        }

        .table thead th {
            background: linear-gradient(135deg, var(--gray-100), var(--gray-200));
            border: none;
            font-weight: 700;
            color: var(--gray-700);
            padding: 1.25rem 1rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            font-size: 0.875rem;
        }

        .table tbody td {
            padding: 1.25rem 1rem;
            border-bottom: 1px solid var(--gray-200);
            vertical-align: middle;
        }

        .table tbody tr:hover {
            background: rgba(139, 69, 19, 0.05);
            transform: scale(1.01);
            transition: all 0.3s ease;
        }

        /* Status Badges */
        .badge {
            padding: 0.5rem 1rem;
            border-radius: 25px;
            font-weight: 600;
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .badge-success {
            background: linear-gradient(135deg, var(--success), #1B5E20);
            color: white;
        }

        .badge-warning {
            background: linear-gradient(135deg, var(--warning), #E65100);
            color: white;
        }

        .badge-danger {
            background: linear-gradient(135deg, var(--danger), #B71C1C);
            color: white;
        }

        .badge-info {
            background: linear-gradient(135deg, var(--info), #00695C);
            color: white;
        }

        .badge-primary {
            background: linear-gradient(135deg, var(--primary), var(--primary-light));
            color: white;
        }

        /* Footer */
        footer {
            background: linear-gradient(135deg, var(--gray-900), var(--gray-800));
            color: white;
            padding: 3rem 0 2rem;
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

        .footer-content {
            position: relative;
            z-index: 2;
        }

        .footer-title {
            font-weight: 800;
            font-size: 1.25rem;
            margin-bottom: 0.5rem;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .footer-text {
            font-size: 0.9rem;
            color: var(--gray-400);
            margin: 0;
        }

        .footer-heart {
            color: #ef4444;
            animation: heartbeat 2s infinite;
        }

        @keyframes heartbeat {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.2); }
        }

        /* Loading Animation */
        .loading-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 250, 240, 0.95);
            backdrop-filter: blur(10px);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
        }

        .loading-overlay.show {
            opacity: 1;
            visibility: visible;
        }

        .spinner {
            width: 60px;
            height: 60px;
            border: 4px solid var(--gray-200);
            border-top: 4px solid var(--primary);
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* Responsive */
        @media (max-width: 768px) {
            .navbar-brand {
                font-size: 1.25rem;
            }

            .nav-link {
                margin: 0.25rem 0;
                text-align: center;
            }

            main {
                padding-top: 100px;
            }

            .content-card {
                margin: 1rem 0;
            }
        }

        /* Smooth scrolling */
        html {
            scroll-behavior: smooth;
        }

        /* Floating elements animation */
        .floating {
            animation: floating 3s ease-in-out infinite;
        }

        @keyframes floating {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }
    </style>
</head>
<body>
    <!-- Loading Overlay -->
    <div class="loading-overlay" id="loadingOverlay">
        <div class="spinner"></div>
    </div>

    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}" data-aos="fade-right">
                <img src="{{ asset('images/logo.jpg') }}" alt="MalalaWak Logo" class="logo-img">
                MalalaWak
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
                        <a class="nav-link" href="#">
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

    {{-- Content --}}
    <main class="container">
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer>
        <div class="container">
            <div class="footer-content text-center" data-aos="fade-up">
                <p class="footer-title mb-2">Sistem Informasi Pariwisata Humaira</p>
                <p class="footer-text">
                    © {{ date('Y') }} Made with <span class="footer-heart">❤️</span> in Indonesia.
                </p>
                <div class="mt-3">
                    <small class="text-muted">
                        <i class="fas fa-code me-1"></i>Powered by Laravel & Bootstrap
                    </small>
                </div>
            </div>
        </div>
    </footer>

    {{-- Scripts --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script>
        // Initialize AOS
        AOS.init({
            duration: 800,
            easing: 'ease-in-out',
            once: true
        });

        // Loading Overlay
        const loadingOverlay = document.getElementById('loadingOverlay');

        // Show loading on page transitions
        document.addEventListener('click', function(e) {
            if (e.target.tagName === 'A' && e.target.href && !e.target.href.includes('#')) {
                loadingOverlay.classList.add('show');
            }
        });

        // Hide loading when page is fully loaded
        window.addEventListener('load', function() {
            loadingOverlay.classList.remove('show');
        });

        // Navbar scroll effect
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 50) {
                navbar.style.background = 'rgba(255, 250, 240, 0.98)';
                navbar.style.boxShadow = '0 10px 30px rgba(0,0,0,0.1)';
            } else {
                navbar.style.background = 'rgba(255, 250, 240, 0.95)';
                navbar.style.boxShadow = '0 10px 15px -3px rgba(0,0,0,0.1)';
            }
        });

        // Smooth scroll for anchor links
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

        // Add floating animation to elements
        document.querySelectorAll('.floating').forEach(element => {
            element.style.animationDelay = Math.random() * 2 + 's';
        });

        // Parallax effect for background
        window.addEventListener('scroll', function() {
            const scrolled = window.pageYOffset;
            const parallax = document.querySelector('body');
            const speed = scrolled * 0.5;
            parallax.style.transform = `translateY(${speed}px)`;
        });
    </script>

    @stack('scripts')
</body>
</html>