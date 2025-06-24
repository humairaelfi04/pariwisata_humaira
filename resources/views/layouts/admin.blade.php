<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel - @yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap & Google Fonts -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
        }

        #wrapper {
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar */
        #sidebar-wrapper {
            min-width: 250px;
            max-width: 250px;
            background: linear-gradient(180deg, #198754, #245744);
            color: #fff;
        }

        .sidebar-heading {
            font-weight: 600;
            font-size: 1.2rem;
            background-color: rgba(255, 255, 255, 0.1);
            padding: 1rem;
            text-align: center;
        }

        .list-group-item {
            background-color: transparent;
            border: none;
            color: #ffffffcc;
            transition: background 0.3s, color 0.3s;
        }

        .list-group-item:hover,
        .list-group-item.active {
            background-color: rgba(255, 255, 255, 0.1);
            color: #ffffff;
        }

        /* Navbar */
        .navbar-custom {
            background: linear-gradient(90deg, #198754, #245744);
            color: #fff;
        }

        .navbar-custom .navbar-brand {
            color: #fff;
            font-weight: 600;
        }

        .navbar-custom .navbar-brand:hover {
            color: #f1f1f1;
        }

        .container-fluid.mt-4 {
            padding: 20px;
        }
    </style>
</head>

<body>
    <div id="wrapper">
        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <div class="sidebar-heading">🛠️ Admin Panel</div>
            <div class="list-group list-group-flush">
                <a href="{{ route('admin.dashboard') }}" class="list-group-item {{ request()->is('admin/dashboard') ? 'active' : '' }}">Dashboard</a>
                <a href="{{ route('admin.destinasi.index') }}" class="list-group-item {{ request()->is('admin/destinasi*') ? 'active' : '' }}">Manajemen Destinasi</a>
                <a href="{{ route('admin.umkm.index') }}" class="list-group-item {{ request()->is('admin/umkm*') ? 'active' : '' }}">Manajemen UMKM</a>
                <a href="{{ route('admin.kategori.index') }}" class="list-group-item {{ request()->is('admin/kategori*') ? 'active' : '' }}">Manajemen Kategori</a>
                <a href="{{ route('admin.event.index') }}" class="list-group-item {{ request()->is('admin/event*') ? 'active' : '' }}">Manajemen Acara</a>
                <a href="{{ route('admin.review.index') }}" class="list-group-item {{ request()->is('admin/review*') ? 'active' : '' }}">Moderasi Ulasan</a>
            </div>
        </div>

        <!-- Page Content -->
        <div id="page-content-wrapper" class="w-100">
            <nav class="navbar navbar-custom px-4">
                <div class="container-fluid d-flex justify-content-between align-items-center">
                    <span class="navbar-brand">Selamat Datang, Admin</span>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="btn btn-sm btn-outline-light">Logout</button>
                    </form>
                </div>
            </nav>

            <div class="container-fluid mt-4">
                @yield('content')
            </div>
        </div>
    </div>

    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
