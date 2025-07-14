<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Admin Panel - @yield('title')</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  {{-- AOS animasi --}}
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

  <style>
    :root {
      --primary: #8B4513;
      --primary-dark: #654321;
      --primary-light: #A0522D;
      --secondary: #CD853F;
      --success: #10b981;
      --danger: #ef4444;
      --warning: #f59e0b;
      --info: #CD853F;
      --dark: #1f2937;
      --light: #F5F5DC;
      --white: #ffffff;
      --gray-50: #f9fafb;
      --gray-100: #f3f4f6;
      --gray-200: #e5e7eb;
      --gray-300: #d1d5db;
      --gray-400: #9ca3af;
      --gray-500: #6b7280;
      --gray-600: #4b5563;
      --gray-700: #374151;
      --gray-800: #1f2937;
      --gray-900: #111827;
      --shadow-sm: 0 1px 2px 0 rgb(0 0 0 / 0.05);
      --shadow-md: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
      --shadow-lg: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1);
      --shadow-xl: 0 20px 25px -5px rgb(0 0 0 / 0.1), 0 8px 10px -6px rgb(0 0 0 / 0.1);
      --shadow-2xl: 0 25px 50px -12px rgb(0 0 0 / 0.25);
      --glass-bg: rgba(255,255,255,0.85);
      --glass-blur: blur(16px);
    }

    *, *::before, *::after {
      box-sizing: border-box;
    }

    body {
      font-family: 'Inter', sans-serif;
      background: linear-gradient(135deg, #F5F5DC 0%, #DEB887 100%);
      color: var(--gray-800);
      margin: 0;
      min-height: 100vh;
      overflow-x: hidden;
    }

    /* scrollbar */
    ::-webkit-scrollbar {
      width: 6px;
    }

    ::-webkit-scrollbar-track {
      background: var(--gray-100);
    }

    ::-webkit-scrollbar-thumb {
      background: var(--primary);
      border-radius: 3px;
    }

    ::-webkit-scrollbar-thumb:hover {
      background: var(--primary-dark);
    }

    #wrapper {
      display: flex;
      min-height: 100vh;
    }

    /* sidebar */
    #sidebar-wrapper {
      width: 270px;
      background: var(--glass-bg);
      backdrop-filter: var(--glass-blur);
      padding: 2rem 1.5rem;
      display: flex;
      flex-direction: column;
      height: 100vh;
      position: fixed;
      overflow-y: auto;
      box-shadow: var(--shadow-2xl);
      z-index: 1000;
      border-right: 1.5px solid #DEB887;
      transition: all 0.3s cubic-bezier(.4,2.2,.2,1);
    }

    .sidebar-brand {
      display: flex;
      align-items: center;
      gap: 14px;
      color: var(--primary);
      font-weight: 800;
      font-size: 1.5rem;
      margin-bottom: 3rem;
      text-decoration: none;
      padding: 1rem;
      border-radius: 16px;
      background: rgba(139, 69, 19, 0.07);
      box-shadow: var(--shadow-md);
      transition: all 0.3s;
    }

    .sidebar-brand:hover {
      background: linear-gradient(90deg, #8B451311 0%, #A0522D11 100%);
      transform: scale(1.04);
      color: var(--primary-dark);
    }

    .sidebar-brand img {
      width: 48px;
      height: 48px;
      border-radius: 12px;
      object-fit: cover;
      box-shadow: var(--shadow-md);
      background: #fff;
      animation: floating 3s ease-in-out infinite;
    }

    @keyframes floating {
      0%, 100% { transform: translateY(0px);}
      50% { transform: translateY(-8px);}
    }

    .sidebar-section {
      margin-bottom: 2rem;
    }

    .sidebar-section-title {
      color: var(--primary);
      font-size: 0.8rem;
      font-weight: 700;
      text-transform: uppercase;
      letter-spacing: 0.07em;
      margin-bottom: 1rem;
      padding-left: 0.5rem;
    }

    .sidebar-link {
      color: var(--gray-700);
      padding: 1rem 1.25rem;
      text-decoration: none;
      display: flex;
      align-items: center;
      gap: 12px;
      border-radius: 14px;
      margin-bottom: 0.5rem;
      transition: all 0.3s;
      font-size: 1rem;
      font-weight: 600;
      position: relative;
      overflow: hidden;
      background: transparent;
    }

    .sidebar-link::before {
      content: '';
      position: absolute;
      left: 0;
      top: 0;
      height: 100%;
      width: 0;
      background: linear-gradient(90deg, #8B451322 0%, #A0522D22 100%);
      transition: width 0.3s;
      z-index: -1;
    }

    .sidebar-link:hover, .sidebar-link.active {
      color: var(--primary);
      background: rgba(139, 69, 19, 0.08);
      transform: translateX(5px) scale(1.03);
      box-shadow: var(--shadow-md);
    }

    .sidebar-link:hover::before, .sidebar-link.active::before {
      width: 100%;
    }

    .sidebar-link i {
      width: 22px;
      text-align: center;
      font-size: 1.15rem;
    }

    /* halaman content */
    #page-content-wrapper {
      margin-left: 270px;
      width: calc(100% - 270px);
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      background: transparent;
    }

    .navbar-custom {
      background: var(--glass-bg);
      backdrop-filter: var(--glass-blur);
      padding: 1.5rem 2rem;
      box-shadow: var(--shadow-md);
      display: flex;
      justify-content: space-between;
      align-items: center;
      border-bottom: 1.5px solid #DEB887;
      position: sticky;
      top: 0;
      z-index: 100;
    }

    .search-container {
      position: relative;
      max-width: 400px;
      width: 100%;
    }

    .search-box {
      width: 100%;
      padding: 0.75rem 1rem 0.75rem 3rem;
      border: 2px solid #DEB887;
      border-radius: 25px;
      background: #F5F5DC;
      transition: all 0.3s;
      font-size: 1rem;
    }

    .search-box:focus {
      outline: none;
      border-color: var(--primary);
      background: #fff;
      box-shadow: 0 0 0 3px #DEB887;
    }

    .search-icon {
      position: absolute;
      left: 1rem;
      top: 50%;
      transform: translateY(-50%);
      color: #CD853F;
      font-size: 1.1rem;
    }

    .admin-profile {
      display: flex;
      align-items: center;
      gap: 1rem;
      padding: 0.75rem 1.25rem;
      background: var(--glass-bg);
      border-radius: 25px;
      border: 2px solid #DEB887;
      transition: all 0.3s;
      box-shadow: var(--shadow-sm);
    }

    .admin-profile:hover {
      border-color: var(--primary);
      box-shadow: var(--shadow-md);
    }

    .admin-info {
      text-align: right;
    }

    .admin-name {
      font-weight: 700;
      color: var(--primary-dark);
      margin: 0;
      font-size: 1rem;
    }

    .admin-role {
      font-size: 0.85rem;
      color: var(--gray-500);
      margin: 0;
    }

    .admin-avatar {
      width: 44px;
      height: 44px;
      border-radius: 50%;
      object-fit: cover;
      border: 3px solid #fff;
      box-shadow: var(--shadow-sm);
    }

    .logout-btn {
      background: linear-gradient(135deg, var(--danger), #dc2626);
      border: none;
      color: var(--white);
      padding: 0.75rem 1rem;
      border-radius: 12px;
      font-weight: 600;
      transition: all 0.3s;
      box-shadow: var(--shadow-sm);
    }

    .logout-btn:hover {
      transform: translateY(-2px);
      box-shadow: var(--shadow-md);
      background: linear-gradient(135deg, #dc2626, var(--danger));
    }

    .content-area {
      padding: 2.5rem;
      background: transparent;
      flex-grow: 1;
      min-height: calc(100vh - 100px);
    }

    /* cards content */
    .content-card {
      background: var(--glass-bg);
      backdrop-filter: var(--glass-blur);
      border-radius: 18px;
      box-shadow: var(--shadow-lg);
      border: 1.5px solid #DEB887;
      transition: all 0.3s;
    }

    .content-card:hover {
      box-shadow: var(--shadow-2xl);
      transform: translateY(-2px) scale(1.01);
    }

    .card-header {
      background: linear-gradient(135deg, var(--primary), var(--primary-light));
      color: var(--white);
      padding: 1.5rem;
      border-radius: 18px 18px 0 0;
      border: none;
    }

    .card-body {
      padding: 2rem;
    }

    /* button */
    .btn-primary {
      background: linear-gradient(135deg, var(--primary), var(--primary-light));
      border: none;
      border-radius: 12px;
      padding: 0.75rem 1.5rem;
      font-weight: 700;
      transition: all 0.3s;
      box-shadow: var(--shadow-md);
      text-transform: uppercase;
      letter-spacing: 1px;
    }

    .btn-primary:hover {
      transform: translateY(-2px) scale(1.03);
      box-shadow: var(--shadow-lg);
      background: linear-gradient(135deg, var(--primary-light), var(--primary));
    }

    .btn-success {
      background: linear-gradient(135deg, var(--success), #059669);
      border: none;
      border-radius: 12px;
      padding: 0.75rem 1.5rem;
      font-weight: 600;
      transition: all 0.3s;
      box-shadow: var(--shadow-sm);
    }

    .btn-danger {
      background: linear-gradient(135deg, var(--danger), #dc2626);
      border: none;
      border-radius: 12px;
      padding: 0.75rem 1.5rem;
      font-weight: 600;
      transition: all 0.3s;
      box-shadow: var(--shadow-sm);
    }

    /* tabel */
    .table {
      border-radius: 12px;
      overflow: hidden;
      box-shadow: var(--shadow-sm);
      background: var(--glass-bg);
      backdrop-filter: var(--glass-blur);
    }

    .table thead th {
      background: linear-gradient(135deg, var(--gray-100), var(--gray-200));
      border: none;
      font-weight: 600;
      color: var(--gray-700);
      padding: 1rem;
    }

    .table tbody td {
      padding: 1rem;
      border-bottom: 1px solid var(--gray-200);
      vertical-align: middle;
    }

    .table tbody tr:hover {
      background: rgba(139, 69, 19, 0.05);
    }

    /* status badges */
    .badge {
      padding: 0.5rem 1rem;
      border-radius: 25px;
      font-weight: 600;
      font-size: 0.8rem;
    }

    .badge-success {
      background: linear-gradient(135deg, var(--success), #059669);
      color: var(--white);
    }

    .badge-warning {
      background: linear-gradient(135deg, var(--warning), #d97706);
      color: var(--white);
    }

    .badge-danger {
      background: linear-gradient(135deg, var(--danger), #dc2626);
      color: var(--white);
    }

    .badge-info {
      background: linear-gradient(135deg, var(--info), #CD853F);
      color: var(--white);
    }

    .badge-primary {
      background: linear-gradient(135deg, var(--primary), var(--primary-light));
      color: var(--white);
    }

    /* responsive */
    @media (max-width: 1024px) {
      #sidebar-wrapper {
        transform: translateX(-100%);
        position: fixed;
        z-index: 1050;
      }

      #sidebar-wrapper.show {
        transform: translateX(0);
      }

      #page-content-wrapper {
        margin-left: 0;
        width: 100%;
      }

      .navbar-custom {
        padding: 1rem;
      }

      .content-area {
        padding: 1.5rem;
      }
    }

    @media (max-width: 768px) {
      .search-container {
        max-width: 250px;
      }

      .admin-profile {
        padding: 0.5rem 1rem;
      }

      .admin-info {
        display: none;
      }
    }

    /* loading animasi */
    .loading-overlay {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(255, 255, 255, 0.9);
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
      width: 50px;
      height: 50px;
      border: 4px solid var(--gray-200);
      border-top: 4px solid var(--primary);
      border-radius: 50%;
      animation: spin 1s linear infinite;
    }

    @keyframes spin {
      0% { transform: rotate(0deg); }
      100% { transform: rotate(360deg); }
    }

    /* didebar toggle utk mobile */
    .sidebar-toggle {
      display: none;
      background: var(--primary);
      border: none;
      color: var(--white);
      padding: 0.75rem;
      border-radius: 8px;
      font-size: 1.2rem;
    }

    @media (max-width: 1024px) {
      .sidebar-toggle {
        display: block;
      }
    }

    /* overlay utk sidebar mobile */
    .sidebar-overlay {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.5);
      z-index: 1040;
      opacity: 0;
      visibility: hidden;
      transition: all 0.3s ease;
    }

    .sidebar-overlay.show {
      opacity: 1;
      visibility: visible;
    }
  </style>
</head>
<body>
  <!-- loading overlay -->
  <div class="loading-overlay" id="loadingOverlay">
    <div class="spinner"></div>
  </div>

  <!-- sidebar overlay utk mobile -->
  <div class="sidebar-overlay" id="sidebarOverlay"></div>

  <div id="wrapper">
    {{-- sidebar --}}
    <div id="sidebar-wrapper" data-aos="fade-right">
      <a href="{{ url('/') }}" class="sidebar-brand" data-aos="fade-down" data-aos-delay="100">
        <img src="{{ asset('images/logo.jpg') }}" alt="Logo">
        <span>MalalaWak</span>
      </a>

      <div class="sidebar-section" data-aos="fade-up" data-aos-delay="200">
        <div class="sidebar-section-title">Dashboard</div>
        <a href="{{ route('admin.dashboard') }}" class="sidebar-link {{ request()->is('admin/dashboard') ? 'active' : '' }}">
          <i class="fas fa-tachometer-alt"></i> Dashboard
        </a>
      </div>

      <div class="sidebar-section" data-aos="fade-up" data-aos-delay="300">
        <div class="sidebar-section-title">Manajemen Konten</div>
        <a href="{{ route('admin.destinasi.index') }}" class="sidebar-link {{ request()->is('admin/destinasi*') ? 'active' : '' }}">
          <i class="fas fa-map-marked-alt"></i> Destinasi
        </a>
        <a href="{{ route('admin.umkm.index') }}" class="sidebar-link {{ request()->is('admin/umkm*') ? 'active' : '' }}">
          <i class="fas fa-store"></i> UMKM
        </a>
        <a href="{{ route('admin.event.index') }}" class="sidebar-link {{ request()->is('admin/event*') ? 'active' : '' }}">
          <i class="fas fa-calendar-alt"></i> Acara
        </a>
        <a href="{{ route('admin.kategori.index') }}" class="sidebar-link {{ request()->is('admin/kategori*') ? 'active' : '' }}">
          <i class="fas fa-tags"></i> Kategori
        </a>
      </div>

      <div class="sidebar-section" data-aos="fade-up" data-aos-delay="400">
        <div class="sidebar-section-title">Ulasan & Feedback</div>
        <a href="{{ route('admin.review.index') }}" class="sidebar-link {{ request()->is('admin/review*') ? 'active' : '' }}">
          <i class="fas fa-star"></i> Review
        </a>
      </div>
    </div>

    {{-- content --}}
    <div id="page-content-wrapper">
      <nav class="navbar-custom">
        <div class="d-flex align-items-center gap-3">
          <button class="sidebar-toggle" id="sidebarToggle">
            <i class="fas fa-bars"></i>
          </button>
          <div class="search-container">
            <i class="fas fa-search search-icon"></i>
            <input class="form-control search-box" type="search" placeholder="Cari sesuatu..." aria-label="Search">
          </div>
        </div>

        <div class="d-flex align-items-center gap-3">
          <div class="admin-profile">
            <div class="admin-info">
              <p class="admin-name">{{ Auth::user()->name ?? 'Administrator' }}</p>
              <p class="admin-role">Super Admin</p>
            </div>
            <img src="https://ui-avatars.com/api/?name={{ Auth::user()->name ?? 'Admin' }}&background=8B4513&color=fff&size=128" class="admin-avatar" alt="Admin">
          </div>
          <form action="{{ route('logout') }}" method="POST" class="d-inline">
            @csrf
            <button class="logout-btn" title="Logout" type="submit">
              <i class="fas fa-sign-out-alt"></i>
            </button>
          </form>
        </div>
      </nav>

      <div class="content-area">
        @yield('content')
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

  <script>
    // AOS
    AOS.init({
      duration: 800,
      easing: 'ease-in-out',
      once: true
    });

    // sidebar toggle utk mobile
    const sidebarToggle = document.getElementById('sidebarToggle');
    const sidebarWrapper = document.getElementById('sidebar-wrapper');
    const sidebarOverlay = document.getElementById('sidebarOverlay');

    sidebarToggle.addEventListener('click', function() {
      sidebarWrapper.classList.toggle('show');
      sidebarOverlay.classList.toggle('show');
    });

    sidebarOverlay.addEventListener('click', function() {
      sidebarWrapper.classList.remove('show');
      sidebarOverlay.classList.remove('show');
    });

    // loading overlay
    const loadingOverlay = document.getElementById('loadingOverlay');

    // loading transisi halaman
    document.addEventListener('click', function(e) {
      if (e.target.tagName === 'A' && e.target.href && !e.target.href.includes('#')) {
        loadingOverlay.classList.add('show');
      }
    });

    // hide loading jika page full loading
    window.addEventListener('load', function() {
      loadingOverlay.classList.remove('show');
    });

    // search
    const searchBox = document.querySelector('.search-box');
    searchBox.addEventListener('input', function(e) {
      const searchTerm = e.target.value.toLowerCase();
      // search logic
      console.log('Searching for:', searchTerm);
    });

    // smooth scrolling
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

    // bar active ketika sedang di halaman itu
    const currentPath = window.location.pathname;
    document.querySelectorAll('.sidebar-link').forEach(link => {
      if (link.getAttribute('href') === currentPath) {
        link.classList.add('active');
      }
    });

    // auto-hide sidebar jika sudah keluar dari sidebar
    document.addEventListener('click', function(e) {
      if (window.innerWidth <= 1024) {
        if (!sidebarWrapper.contains(e.target) && !sidebarToggle.contains(e.target)) {
          sidebarWrapper.classList.remove('show');
          sidebarOverlay.classList.remove('show');
        }
      }
    });
  </script>
</body>
</html>
