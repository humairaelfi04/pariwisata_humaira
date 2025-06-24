<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Rekomendasi Wisata</title>

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Font Poppins --}}
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }

        body {
            background-color: #245744;
            color: #333;
        }

        .navbar {
            background-color: #198754 !important;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand, .nav-link {
            color: #ffffff !important;
            font-weight: 500;
        }

        .nav-link:hover {
            color: #dff0e3 !important;
        }

        .dropdown-menu {
            font-size: 14px;
        }

        footer {
            background-color: #198754;
            padding: 20px 0;
            text-align: center;
            font-size: 14px;
            color: #fff;
        }

        main {
            padding-top: 30px;
            padding-bottom: 30px;
        }
    </style>
</head>
<body>

    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand fw-semibold" href="{{ url('/') }}">🌄 HumairaTour</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mainNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Destinasi</a></li>
                    <li class="nav-item"><a class="nav-link" href="/umkm">UMKM</a></li>
                    <li class="nav-item"><a class="nav-link" href="/event">Acara</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Tentang</a></li>

                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                    @else
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                                {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a class="dropdown-item" href="{{ route('admin.dashboard') }}">Dashboard</a>
                                </li>
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

    {{-- Content --}}
    <main class="container">
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer>
        <div class="container">
            <p class="mb-0">© {{ date('Y') }} Sistem Informasi Pariwisata Humaira. All rights reserved.</p>
        </div>
    </footer>

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>
