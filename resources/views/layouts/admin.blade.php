<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Admin Panel - @yield('title')</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  {{-- Bootstrap & Fonts --}}
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
<!-- Tambahkan ini di <head> layout admin -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #f5f5f5;
      color: #333;
    }

    #wrapper {
      display: flex;
      min-height: 100vh;
    }

    /* Sidebar */
    #sidebar-wrapper {
      width: 260px;
      background-color: #121212;
      padding-top: 2rem;
      display: flex;
      flex-direction: column;
    }

    .sidebar-heading {
      color: #fff;
      font-size: 1.4rem;
      font-weight: 600;
      text-align: center;
      margin-bottom: 1rem;
    }

    .sidebar-link {
      color: #ddd;
      padding: 12px 20px;
      text-decoration: none;
      display: flex;
      align-items: center;
      gap: 10px;
      transition: 0.3s ease;
    }

    .sidebar-link:hover,
    .sidebar-link.active {
      background-color: #262626;
      color: #ff9f43;
    }

    /* Content */
    #page-content-wrapper {
      flex: 1;
      display: flex;
      flex-direction: column;
    }

    /* Navbar */
    .navbar-custom {
      background-color: #fff;
      padding: 1rem 2rem;
      box-shadow: 0 2px 8px rgba(0,0,0,0.05);
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .search-box {
      max-width: 300px;
      border-radius: 50px;
    }

    .admin-avatar {
      width: 36px;
      height: 36px;
      border-radius: 50%;
      object-fit: cover;
    }

    .logout-btn {
      background-color: transparent;
      border: none;
      color: #333;
    }

    .logout-btn:hover {
      color: #dc3545;
    }

    .content-area {
      padding: 2rem;
      background-color: #f9f9f9;
      flex-grow: 1;
    }

    .circular-chart .circle {
    stroke-linecap: round;
    animation: progress 1s ease-out forwards;
    }
    @keyframes progress {
    0% {
        stroke-dasharray: 0 100;
    }
    }

  </style>
</head>
<body>
  <div id="wrapper">

    {{-- Sidebar --}}
    <div id="sidebar-wrapper">
      <div class="sidebar-heading">HumairaTour</div>
      <a href="{{ route('admin.dashboard') }}" class="sidebar-link {{ request()->is('admin/dashboard') ? 'active' : '' }}">
        <i class="fa fa-home"></i> Dashboard
      </a>
      <a href="{{ route('admin.destinasi.index') }}" class="sidebar-link {{ request()->is('admin/destinasi*') ? 'active' : '' }}">
        <i class="fa fa-map"></i> Destinasi
      </a>
      <a href="{{ route('admin.umkm.index') }}" class="sidebar-link {{ request()->is('admin/umkm*') ? 'active' : '' }}">
        <i class="fa fa-store"></i> UMKM
      </a>
      <a href="{{ route('admin.event.index') }}" class="sidebar-link {{ request()->is('admin/event*') ? 'active' : '' }}">
        <i class="fa fa-calendar"></i> Acara
      </a>
      <a href="{{ route('admin.kategori.index') }}" class="sidebar-link {{ request()->is('admin/kategori*') ? 'active' : '' }}">
        <i class="fa fa-tags"></i> Kategori
      </a>
      <a href="{{ route('admin.review.index') }}" class="sidebar-link {{ request()->is('admin/review*') ? 'active' : '' }}">
        <i class="fa fa-star"></i> Review
      </a>
    </div>

    {{-- Page Content --}}
    <div id="page-content-wrapper">
      <nav class="navbar-custom">
        <form class="d-flex">
          <input class="form-control form-control-sm search-box" type="search" placeholder="Search..." aria-label="Search">
        </form>
        <div class="d-flex align-items-center gap-3">
          <span>{{ Auth::user()->name ?? 'Admin' }}</span>
          <img src="https://i.pravatar.cc/40" class="admin-avatar" alt="Admin">
          <form action="{{ route('logout') }}" method="POST" class="d-inline">
            @csrf
            <button class="logout-btn" title="Logout"><i class="fas fa-sign-out-alt"></i></button>
          </form>
        </div>
      </nav>

      <div class="content-area">
        @yield('content')
      </div>
    </div>

  </div>

  {{-- JS --}}
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
