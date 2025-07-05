@extends('layouts.frontend')

@section('content')
<section class="py-5" style="background: linear-gradient(135deg, #eff6ff 0%, #dbeafe 100%);">
    <div class="container">
        <!-- Hero Header -->
        <div class="text-center mb-5" data-aos="fade-up">
            <h1 class="display-4 fw-bold mb-3" style="background: linear-gradient(135deg, #1e40af, #3b82f6); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">
                🧭 Destinasi Wisata Populer
            </h1>
            <p class="lead text-muted mb-0">Jelajahi tempat-tempat menakjubkan yang siap memberikan pengalaman tak terlupakan</p>
        </div>

        {{-- Form Pencarian & Filter --}}
        <div class="row justify-content-center mb-5" data-aos="fade-up" data-aos-delay="200">
            <div class="col-lg-8">
                <form method="GET" action="{{ route('home') }}" class="card border-0 shadow-lg" style="background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(20px); border-radius: 20px;">
                    <div class="card-body p-4">
                        <div class="row g-3">
                            <div class="col-md-5">
                                <div class="position-relative">
                                    <i class="fas fa-search position-absolute" style="top: 50%; left: 15px; transform: translateY(-50%); color: #6b7280; z-index: 10;"></i>
                                    <input type="text" name="search" 
                                           class="form-control form-control-lg ps-5" 
                                           placeholder="Cari destinasi..." 
                                           value="{{ request('search') }}"
                                           style="border: 2px solid #e5e7eb; border-radius: 15px; background: rgba(255, 255, 255, 0.8);">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="position-relative">
                                    <i class="fas fa-filter position-absolute" style="top: 50%; left: 15px; transform: translateY(-50%); color: #6b7280; z-index: 10;"></i>
                                    <select name="category" class="form-select form-select-lg ps-5" style="border: 2px solid #e5e7eb; border-radius: 15px; background: rgba(255, 255, 255, 0.8);">
                                        <option value="">Semua Kategori</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                                                {{ $category->nama_kategori }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <button class="btn btn-primary btn-lg w-100" type="submit" style="border-radius: 15px; background: linear-gradient(135deg, #1e40af, #3b82f6); border: none; font-weight: 600;">
                                    <i class="fas fa-search me-2"></i>Cari
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        {{-- Stats Section --}}
        <div class="row text-center mb-5" data-aos="fade-up" data-aos-delay="300">
            <div class="col-md-4">
                <div class="card border-0 shadow-sm" style="background: rgba(255, 255, 255, 0.9); border-radius: 15px;">
                    <div class="card-body py-3">
                        <i class="fas fa-map-marker-alt fa-2x mb-2" style="color: #1e40af;"></i>
                        <h4 class="fw-bold mb-1" style="color: #1e40af;">{{ $destinations->total() }}</h4>
                        <p class="text-muted mb-0">Total Destinasi</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 shadow-sm" style="background: rgba(255, 255, 255, 0.9); border-radius: 15px;">
                    <div class="card-body py-3">
                        <i class="fas fa-tags fa-2x mb-2" style="color: #3b82f6;"></i>
                        <h4 class="fw-bold mb-1" style="color: #3b82f6;">{{ $categories->count() }}</h4>
                        <p class="text-muted mb-0">Kategori</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 shadow-sm" style="background: rgba(255, 255, 255, 0.9); border-radius: 15px;">
                    <div class="card-body py-3">
                        <i class="fas fa-star fa-2x mb-2" style="color: #0ea5e9;"></i>
                        <h4 class="fw-bold mb-1" style="color: #0ea5e9;">4.8</h4>
                        <p class="text-muted mb-0">Rating Rata-rata</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Grid Destinasi --}}
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 g-4">
            @forelse ($destinations as $destination)
                <div class="col" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                    <div class="card h-100 border-0 shadow-lg" style="background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(20px); border-radius: 20px; overflow: hidden; transition: all 0.3s ease;">
                        <div class="position-relative overflow-hidden" style="height: 220px;">
                            <img src="{{ asset('images/' . $destination->url_gambar_utama) }}"
                                class="card-img-top w-100 h-100" 
                                alt="{{ $destination->nama }}"
                                style="object-fit: cover; transition: transform 0.3s ease;">
                            
                            <!-- Category Badge -->
                            @if($destination->category)
                                <div class="position-absolute top-0 start-0 m-3">
                                    <span class="badge" style="background: linear-gradient(135deg, #1e40af, #3b82f6); color: white; border-radius: 20px; padding: 8px 16px; font-size: 0.8rem;">
                                        {{ $destination->category->nama_kategori }}
                                    </span>
                                </div>
                            @endif

                            <!-- Rating Badge -->
                            <div class="position-absolute top-0 end-0 m-3">
                                <span class="badge" style="background: rgba(255, 255, 255, 0.9); color: #1e40af; border-radius: 20px; padding: 8px 12px; font-size: 0.8rem;">
                                    <i class="fas fa-star me-1" style="color: #fbbf24;"></i>4.5
                                </span>
                            </div>

                            <!-- Hover Overlay -->
                            <div class="position-absolute top-0 start-0 w-100 h-100 bg-dark" style="opacity: 0; transition: opacity 0.3s ease; background: linear-gradient(135deg, rgba(30, 64, 175, 0.8), rgba(59, 130, 246, 0.8));"></div>
                        </div>

                        <div class="card-body d-flex flex-column p-4">
                            <h5 class="card-title fw-bold mb-2" style="color: #1e293b; font-size: 1.1rem;">
                                {{ $destination->nama }}
                            </h5>
                            
                            <p class="card-text text-muted mb-3" style="font-size: 0.9rem; line-height: 1.6;">
                                {{ Str::limit($destination->deskripsi, 100) }}
                            </p>

                            <div class="mt-auto">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-map-marker-alt me-2" style="color: #6b7280; font-size: 0.9rem;"></i>
                                        <small class="text-muted">{{ $destination->lokasi ?? 'Lokasi tersedia' }}</small>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-clock me-2" style="color: #6b7280; font-size: 0.9rem;"></i>
                                        <small class="text-muted">Buka 24/7</small>
                                    </div>
                                </div>

                                <a href="{{ route('destinasi.show', $destination->id) }}"
                                   class="btn btn-primary w-100" 
                                   style="border-radius: 12px; background: linear-gradient(135deg, #1e40af, #3b82f6); border: none; font-weight: 600; padding: 12px; transition: all 0.3s ease;">
                                    <i class="fas fa-eye me-2"></i>Lihat Detail
                                </a>
                            </div>
                        </div>

                        <!-- Hover Effects -->
                        <div class="card-hover-overlay"></div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5" data-aos="fade-up">
                    <div class="card border-0 shadow-lg" style="background: rgba(255, 255, 255, 0.95); border-radius: 20px;">
                        <div class="card-body py-5">
                            <i class="fas fa-search fa-3x mb-3" style="color: #6b7280;"></i>
                            <h4 class="fw-bold mb-2" style="color: #1e293b;">Tidak ada destinasi ditemukan</h4>
                            <p class="text-muted mb-0">Coba ubah kata kunci pencarian atau filter kategori</p>
                        </div>
                    </div>
                </div>
            @endforelse
        </div>

        {{-- Pagination --}}
        @if ($destinations->hasPages())
            <div class="d-flex justify-content-center mt-5" data-aos="fade-up">
                <nav>
                    {{ $destinations->links('pagination::bootstrap-5') }}
                </nav>
                </div>
        @endif

        {{-- Call to Action --}}
        <div class="text-center mt-5" data-aos="fade-up">
            <div class="card border-0 shadow-lg" style="background: linear-gradient(135deg, #1e40af, #3b82f6); border-radius: 20px;">
                <div class="card-body py-5">
                    <h3 class="text-white fw-bold mb-3">Tidak menemukan yang dicari?</h3>
                    <p class="text-white-50 mb-4">Hubungi kami untuk informasi lebih lanjut tentang destinasi wisata</p>
                    <a href="/tentang" class="btn btn-light btn-lg" style="border-radius: 15px; font-weight: 600;">
                        <i class="fas fa-info-circle me-2"></i>Hubungi Kami
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
/* Custom hover effects */
.card:hover {
    transform: translateY(-10px) scale(1.02);
    box-shadow: 0 25px 50px -12px rgba(30, 64, 175, 0.25) !important;
}

.card:hover .card-img-top {
    transform: scale(1.1);
}

.card:hover .card-hover-overlay {
    opacity: 1;
}

/* Custom pagination styling */
.pagination .page-link {
    border-radius: 12px;
    margin: 0 5px;
    border: 2px solid #e5e7eb;
    color: #1e40af;
    font-weight: 600;
    transition: all 0.3s ease;
}

.pagination .page-link:hover {
    background: linear-gradient(135deg, #1e40af, #3b82f6);
    color: white;
    border-color: transparent;
    transform: translateY(-2px);
}

.pagination .page-item.active .page-link {
    background: linear-gradient(135deg, #1e40af, #3b82f6);
    border-color: transparent;
    color: white;
}

/* Form control focus effects */
.form-control:focus,
.form-select:focus {
    border-color: #1e40af !important;
    box-shadow: 0 0 0 0.2rem rgba(30, 64, 175, 0.25) !important;
}

/* Button hover effects */
.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(30, 64, 175, 0.3);
}

/* Stats cards hover */
.card:hover .fa-2x {
    transform: scale(1.1);
    transition: transform 0.3s ease;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .display-4 {
        font-size: 2rem;
    }
    
    .card-body {
        padding: 1rem !important;
    }
    
    .btn-lg {
        padding: 0.75rem 1rem !important;
        font-size: 0.9rem !important;
    }
}

/* Loading animation for images */
.card-img-top {
    background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
    background-size: 200% 100%;
    animation: loading 1.5s infinite;
}

@keyframes loading {
    0% { background-position: 200% 0; }
    100% { background-position: -200% 0; }
}

/* Floating animation for stats icons */
.fa-2x {
    animation: floating 3s ease-in-out infinite;
}

@keyframes floating {
    0%, 100% { transform: translateY(0px); }
    50% { transform: translateY(-5px); }
}
</style>

<script>
// Add intersection observer for lazy loading
document.addEventListener('DOMContentLoaded', function() {
    const cards = document.querySelectorAll('.card');
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    });

    cards.forEach(card => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(20px)';
        card.style.transition = 'all 0.6s ease';
        observer.observe(card);
    });
});

// Add smooth scroll for pagination
document.querySelectorAll('.pagination .page-link').forEach(link => {
    link.addEventListener('click', function(e) {
        e.preventDefault();
        const href = this.getAttribute('href');
        if (href) {
            window.location.href = href;
        }
    });
});
</script>
@endsection