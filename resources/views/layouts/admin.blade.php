<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Admin Panel - @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-light border-end" id="sidebar-wrapper">
            <div class="sidebar-heading p-3">Admin Panel</div>
            <div class="list-group list-group-flush">
                <a href="{{ route('admin.dashboard') }}" class="list-group-item list-group-item-action">Dashboard</a>
                <a href="{{ route('admin.destinasi.index') }}" class="list-group-item list-group-item-action">Manajemen Destinasi</a>
                <a href="{{ route('admin.umkm.index') }}" class="list-group-item list-group-item-action">Manajemen UMKM</a>
                <a href="{{ route('admin.kategori.index') }}" class="list-group-item list-group-item-action">Manajemen Kategori</a>
                <a href="{{ route('admin.event.index') }}" class="list-group-item list-group-item-action">Manajemen Acara</a>

                <!-- 🔽 Tambahkan menu Moderasi Ulasan -->
                <a href="{{ route('admin.review.index') }}" class="list-group-item list-group-item-action">
                    Moderasi Ulasan
                </a>
            </div>
        </div>

        <!-- Page Content -->
        <div id="page-content-wrapper" class="w-100">
            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                <div class="container-fluid">
                    <span class="navbar-brand">Selamat Datang Admin</span>
                </div>
            </nav>

            <div class="container-fluid mt-4">
                @yield('content')
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
