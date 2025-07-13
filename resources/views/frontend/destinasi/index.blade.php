@extends('layouts.frontend')

@section('content')
<section class="py-5" style="background: linear-gradient(135deg, #F5DEB3 0%, #DEB887 100%);">
    <div class="container">
        <!-- Hero Header -->
        <div class="text-center mb-5" data-aos="fade-up">
            <h1 class="display-4 fw-bold mb-3" style="background: linear-gradient(135deg, #8B4513, #A0522D); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">
                ✈️ Destinasi Wisata Populer
            </h1>
            <p class="lead text-muted mb-0">Jelajahi tempat-tempat menakjubkan yang siap memberikan pengalaman tak terlupakan</p>
        </div>

        {{-- Form Pencarian & Filter --}}
        <div class="row justify-content-center mb-5" data-aos="fade-up" data-aos-delay="200">
            <div class="col-lg-8">
                <form method="GET" action="{{ route('home') }}" class="card border-0 shadow-lg" style="background: rgba(255, 250, 240, 0.95); backdrop-filter: blur(20px); border-radius: 20px;">
                    <div class="card-body p-4">
                        <div class="row g-3">
                            <div class="col-md-5">
                                <div class="position-relative">
                                    <i class="fas fa-search position-absolute" style="top: 50%; left: 15px; transform: translateY(-50%); color: #8B4513; z-index: 10;"></i>
                                    <input type="text" name="search" 
                                           class="form-control form-control-lg ps-5" 
                                           placeholder="Cari destinasi..." 
                                           value="{{ request('search') }}"
                                           style="border: 2px solid #DEB887; border-radius: 15px; background: rgba(255, 250, 240, 0.8);">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="position-relative">
                                    <i class="fas fa-filter position-absolute" style="top: 50%; left: 15px; transform: translateY(-50%); color: #8B4513; z-index: 10;"></i>
                                    <select name="category" class="form-select form-select-lg ps-5" style="border: 2px solid #DEB887; border-radius: 15px; background: rgba(255, 250, 240, 0.8);">
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
                                <button class="btn btn-primary btn-lg w-100" type="submit" style="border-radius: 15px; background: linear-gradient(135deg, #8B4513, #A0522D); border: none; font-weight: 600;">
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
                <div class="card border-0 shadow-sm" style="background: rgba(255, 250, 240, 0.9); border-radius: 15px;">
                    <div class="card-body py-3">
                        <i class="fas fa-map-marker-alt fa-2x mb-2" style="color: #8B4513;"></i>
                        <h4 class="fw-bold mb-1" style="color: #8B4513;">{{ $destinations->total() }}</h4>
                        <p class="text-muted mb-0">Total Destinasi</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 shadow-sm" style="background: rgba(255, 250, 240, 0.9); border-radius: 15px;">
                    <div class="card-body py-3">
                        <i class="fas fa-tags fa-2x mb-2" style="color: #A0522D;"></i>
                        <h4 class="fw-bold mb-1" style="color: #A0522D;">{{ $categories->count() }}</h4>
                        <p class="text-muted mb-0">Kategori</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 shadow-sm" style="background: rgba(255, 250, 240, 0.9); border-radius: 15px;">
                    <div class="card-body py-3">
                        <i class="fas fa-users fa-2x mb-2" style="color: #D2691E;"></i>
                        <h4 class="fw-bold mb-1" style="color: #D2691E;">1000+</h4>
                        <p class="text-muted mb-0">Pengunjung</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Grid Destinasi --}}
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 g-4">
            @forelse ($destinations as $destination)
                <div class="col" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                    <div class="card h-100 border-0 shadow-lg" style="background: rgba(255, 250, 240, 0.95); backdrop-filter: blur(20px); border-radius: 20px; overflow: hidden; transition: all 0.3s ease;">
                        <div class="position-relative overflow-hidden" style="height: 220px;">
                            <img src="{{ asset('images/' . $destination->url_gambar_utama) }}"
                                class="card-img-top w-100 h-100" 
                                alt="{{ $destination->nama }}"
                                style="object-fit: cover; transition: transform 0.3s ease;">
                            
                            <!-- Category Badge -->
                            @if($destination->category)
                                <div class="position-absolute top-0 start-0 m-3">
                                    <span class="badge" style="background: linear-gradient(135deg, #8B4513, #A0522D); color: white; border-radius: 20px; padding: 8px 16px; font-size: 0.8rem;">
                                        {{ $destination->category->nama_kategori }}
                                    </span>
                                </div>
                            @endif



                            <!-- Hover Overlay -->
                            <div class="position-absolute top-0 start-0 w-100 h-100 bg-dark" style="opacity: 0; transition: opacity 0.3s ease; background: linear-gradient(135deg, rgba(139, 69, 19, 0.8), rgba(160, 82, 45, 0.8));"></div>
                        </div>

                        <div class="card-body d-flex flex-column p-4">
                            <h5 class="card-title fw-bold mb-2" style="color: #3E2723; font-size: 1.1rem;">
                                {{ $destination->nama }}
                            </h5>
                            
                            <p class="card-text text-muted mb-3" style="font-size: 0.9rem; line-height: 1.6;">
                                {{ Str::limit($destination->deskripsi, 100) }}
                            </p>

                            <div class="mt-auto">
                                <div class="d-flex align-items-center mb-3">
                                    <i class="fas fa-map-marker-alt me-2" style="color: #8B4513; font-size: 0.9rem;"></i>
                                    <small class="text-muted">{{ $destination->lokasi ?? 'Lokasi tersedia' }}</small>
                                </div>

                                <a href="{{ route('destinasi.show', $destination->id) }}"
                                   class="btn btn-primary w-100" 
                                   style="border-radius: 12px; background: linear-gradient(135deg, #8B4513, #A0522D); border: none; font-weight: 600; padding: 12px; transition: all 0.3s ease;">
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
                    <div class="card border-0 shadow-lg" style="background: rgba(255, 250, 240, 0.95); border-radius: 20px;">
                        <div class="card-body py-5">
                            <i class="fas fa-search fa-3x mb-3" style="color: #8B4513;"></i>
                            <h4 class="fw-bold mb-2" style="color: #3E2723;">Tidak ada destinasi ditemukan</h4>
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
            <div class="card border-0 shadow-lg" style="background: linear-gradient(135deg, #8B4513, #A0522D); border-radius: 20px;">
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
    box-shadow: 0 25px 50px -12px rgba(139, 69, 19, 0.25) !important;
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
    border: 2px solid #DEB887;
    color: #8B4513;
    font-weight: 600;
    transition: all 0.3s ease;
}

.pagination .page-link:hover {
    background: linear-gradient(135deg, #8B4513, #A0522D);
    color: white;
    border-color: transparent;
    transform: translateY(-2px);
}

.pagination .page-item.active .page-link {
    background: linear-gradient(135deg, #8B4513, #A0522D);
    border-color: transparent;
    color: white;
}

/* Form control focus effects */
.form-control:focus,
.form-select:focus {
    border-color: #8B4513 !important;
    box-shadow: 0 0 0 0.2rem rgba(139, 69, 19, 0.25) !important;
}

/* Button hover effects */
.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(139, 69, 19, 0.3);
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
    background: linear-gradient(90deg, #F5F5DC 25%, #DEB887 50%, #F5F5DC 75%);
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