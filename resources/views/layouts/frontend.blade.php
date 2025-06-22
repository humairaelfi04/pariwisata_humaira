<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Pariwisata</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f9f9f9;
        }
        nav.navbar {
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
        }
        footer {
            background-color: #f1f1f1;
            padding: 20px 0;
            text-align: center;
            font-size: 14px;
        }
    </style>
</head>
<body>

    {{-- Navbar --}}
    <ul class="navbar-nav ms-auto">
    @guest
        <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">Login</a>
        </li>
        {{-- <li class="nav-item">
            <a class="nav-link" href="{{ route('register') }}">Register</a>
        </li> --}}
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

    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ url('/') }}">🌄 HumairaTour</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mainNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Destinasi</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">UMKM</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Acara</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Tentang</a></li>
                </ul>
            </div>
        </div>
    </nav>

    {{-- Content --}}
    <main>
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer class="mt-5">
        <div class="container">
            <p class="mb-0">© {{ date('Y') }} Sistem Informasi Pariwisata Humaira. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
