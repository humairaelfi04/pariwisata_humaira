@extends('layouts.frontend')

@section('content')
<div class="container py-5">
    {{-- Breadcrumb --}}
    <nav aria-label="breadcrumb" class="mb-4" data-aos="fade-right">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('home') }}" style="color: #8B4513; text-decoration: none;">
                    <i class="fas fa-home me-1"></i>Beranda
                </a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ route('destinasi.index') }}" style="color: #8B4513; text-decoration: none;">
                    Destinasi
                </a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">{{ $destinasi->nama }}</li>
        </ol>
    </nav>

    {{-- Detail Destinasi Wisata --}}
    <div class="card border-0 shadow-lg rounded-4 overflow-hidden mb-5" data-aos="fade-up" style="background: rgba(255, 250, 240, 0.95); backdrop-filter: blur(20px);">
        <div class="row g-0">
            {{-- Gambar --}}
            <div class="col-md-6 position-relative">
                @if ($destinasi->url_gambar_utama)
                    <div class="position-relative overflow-hidden" style="height: 500px;">
                        <img src="{{ asset('images/' . $destinasi->url_gambar_utama) }}"
                             class="img-fluid h-100 w-100"
                             style="object-fit: cover; transition: transform 0.3s ease;"
                             alt="{{ $destinasi->nama }}">
                        
                        <!-- Overlay with gradient -->
                        <div class="position-absolute top-0 start-0 w-100 h-100" 
                             style="background: linear-gradient(135deg, rgba(139, 69, 19, 0.1), rgba(160, 82, 45, 0.1));"></div>
                        
                        <!-- Category Badge -->
                        @if($destinasi->category)
                            <div class="position-absolute top-0 start-0 m-4">
                                <span class="badge" style="background: linear-gradient(135deg, #8B4513, #A0522D); color: white; border-radius: 20px; padding: 10px 20px; font-size: 0.9rem;">
                                    <i class="fas fa-tag me-1"></i>{{ $destinasi->category->nama_kategori }}
                                </span>
                            </div>
                        @endif

                        <!-- Status Badge -->
                        <div class="position-absolute top-0 end-0 m-4">
                            <span class="badge" style="background: rgba(255, 250, 240, 0.9); color: #8B4513; border-radius: 20px; padding: 10px 20px; font-size: 0.9rem;">
                                <i class="fas fa-check-circle me-1"></i>{{ ucfirst($destinasi->status_publikasi) }}
                            </span>
                        </div>
                    </div>
                @endif
            </div>

            {{-- Informasi Detail --}}
            <div class="col-md-6 p-5">
                <h2 class="fw-bold mb-4" style="background: linear-gradient(135deg, #8B4513, #A0522D); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">
                    {{ $destinasi->nama }}
                </h2>

                <div class="row g-4 mb-4">
                    <div class="col-12">
                        <div class="d-flex align-items-center mb-3">
                            <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px; background: linear-gradient(135deg, #8B4513, #A0522D);">
                                <i class="fas fa-map-marker-alt text-white"></i>
                            </div>
                            <div>
                                <small class="text-muted d-block">Alamat</small>
                                <strong style="color: #3E2723;">{{ $destinasi->alamat }}</strong>
                            </div>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="d-flex align-items-center mb-3">
                            <div class="bg-success rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px; background: linear-gradient(135deg, #228B22, #32CD32);">
                                <i class="fas fa-ticket-alt text-white"></i>
                            </div>
                            <div>
                                <small class="text-muted d-block">Harga Tiket</small>
                                <strong style="color: #3E2723;">Rp {{ number_format($destinasi->harga_tiket, 0, ',', '.') }}</strong>
                            </div>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="d-flex align-items-center mb-3">
                            <div class="bg-warning rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px; background: linear-gradient(135deg, #D2691E, #FF8C00);">
                                <i class="fas fa-clock text-white"></i>
                            </div>
                            <div>
                                <small class="text-muted d-block">Jam Operasional</small>
                                <strong style="color: #3E2723;">{{ $destinasi->jam_operasional }}</strong>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mb-4">
                    <h5 class="fw-bold mb-3" style="color: #8B4513;">
                        <i class="fas fa-info-circle me-2"></i>Deskripsi
                    </h5>
                    <p class="text-muted" style="line-height: 1.8;">{{ $destinasi->deskripsi }}</p>
                </div>

                <a href="{{ route('home') }}"
                   class="btn btn-outline-primary btn-lg rounded-pill shadow-sm">
                    <i class="fas fa-arrow-left me-2"></i>Kembali ke Daftar Destinasi
                </a>
            </div>
        </div>
    </div>

    {{-- Notifikasi --}}
    @if (session('success'))
        <div class="alert alert-success border-0 shadow-sm rounded-3 mb-4" data-aos="fade-up" style="background: linear-gradient(135deg, #F0FFF0, #98FB98); border-left: 4px solid #228B22;">
            <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
        </div>
    @endif

    {{-- Form Ulasan --}}
    <div class="card border-0 shadow-lg rounded-4 mb-5" data-aos="fade-up" style="background: rgba(255, 250, 240, 0.95); backdrop-filter: blur(20px);">
        <div class="card-header border-0" style="background: linear-gradient(135deg, #8B4513, #A0522D); border-radius: 20px 20px 0 0;">
            <h4 class="text-white fw-bold mb-0">
                <i class="fas fa-comment-dots me-2"></i>Kirim Ulasan
            </h4>
        </div>
        <div class="card-body p-4">

            @guest
                <div class="alert alert-warning border-0 rounded-3 mb-4" style="background: linear-gradient(135deg, #FFF8DC, #F5DEB3); border-left: 4px solid #D2691E;">
                    <i class="fas fa-exclamation-triangle me-2"></i>
                    Anda harus login terlebih dahulu untuk mengirim ulasan.
                    <a href="{{ route('login') }}" class="btn btn-sm btn-warning ms-2 rounded-pill">
                        <i class="fas fa-sign-in-alt me-1"></i>Login Sekarang
                    </a>
                </div>
            @endguest

            <form id="form-ulasan" action="{{ route('review.store') }}" method="POST" class="row g-3">
                @csrf
                <input type="hidden" name="destination_id" value="{{ $destinasi->id }}">

                <div class="col-md-6">
                    <label class="form-label fw-semibold" style="color: #8B4513;">
                        <i class="fas fa-user me-1"></i>Nama
                    </label>
                    <input type="text" name="nama_pengunjung" class="form-control form-control-lg" 
                           style="border: 2px solid #DEB887; border-radius: 12px;" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-semibold" style="color: #8B4513;">
                        <i class="fas fa-envelope me-1"></i>Email
                    </label>
                    <input type="email" name="email_pengunjung" class="form-control form-control-lg" 
                           style="border: 2px solid #DEB887; border-radius: 12px;" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-semibold" style="color: #8B4513;">
                        <i class="fas fa-star me-1"></i>Rating
                    </label>
                    <select name="rating" class="form-select form-select-lg" 
                            style="border: 2px solid #DEB887; border-radius: 12px;" required>
                        <option value="">Pilih rating</option>
                        <option value="5">⭐⭐⭐⭐⭐ (5) - Sangat Baik</option>
                        <option value="4">⭐⭐⭐⭐ (4) - Baik</option>
                        <option value="3">⭐⭐⭐ (3) - Cukup</option>
                        <option value="2">⭐⭐ (2) - Kurang</option>
                        <option value="1">⭐ (1) - Sangat Kurang</option>
                    </select>
                </div>

                <div class="col-12">
                    <label class="form-label fw-semibold" style="color: #8B4513;">
                        <i class="fas fa-comment me-1"></i>Komentar
                    </label>
                    <textarea name="komentar" rows="4" class="form-control" 
                              style="border: 2px solid #DEB887; border-radius: 12px;" 
                              placeholder="Bagikan pengalaman Anda tentang destinasi ini..." required></textarea>
                </div>

                <div class="col-12">
                    <button type="submit" class="btn btn-primary btn-lg rounded-pill shadow-sm" 
                            style="background: linear-gradient(135deg, #8B4513, #A0522D); border: none; padding: 12px 30px;">
                        <i class="fas fa-paper-plane me-2"></i>Kirim Ulasan
                    </button>
                </div>
            </form>
        </div>
    </div>

    {{-- Ulasan Pengunjung --}}
    <div class="card border-0 shadow-lg rounded-4" data-aos="fade-up" style="background: rgba(255, 250, 240, 0.95); backdrop-filter: blur(20px);">
        <div class="card-header border-0" style="background: linear-gradient(135deg, #D2691E, #CD853F); border-radius: 20px 20px 0 0;">
            <h4 class="text-white fw-bold mb-0">
                <i class="fas fa-star me-2"></i>Ulasan Pengunjung
                <span class="badge bg-light text-dark ms-2 rounded-pill">{{ $destinasi->reviews->count() }} ulasan</span>
            </h4>
        </div>
        <div class="card-body p-4">
            @forelse ($destinasi->reviews as $review)
                <div class="border-0 rounded-3 p-4 mb-3 shadow-sm" 
                     style="background: linear-gradient(135deg, #FFF8DC, #F5F5DC); border-left: 4px solid #D2691E;">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <div>
                            <h6 class="fw-bold mb-1" style="color: #3E2723;">
                                <i class="fas fa-user-circle me-2" style="color: #D2691E;"></i>{{ $review->nama_pengunjung }}
                            </h6>
                            <small class="text-muted">
                                <i class="fas fa-calendar me-1"></i>{{ $review->created_at->format('d M Y H:i') }}
                            </small>
                        </div>
                        <div class="text-end">
                            <div class="mb-1">
                                @for($i = 1; $i <= 5; $i++)
                                    <i class="fas fa-star {{ $i <= $review->rating ? 'text-warning' : 'text-muted' }}"></i>
                                @endfor
                            </div>
                            <span class="badge" style="background: linear-gradient(135deg, #D2691E, #CD853F); color: white; border-radius: 20px;">
                                {{ $review->rating }}/5
                            </span>
                        </div>
                    </div>
                    <p class="mb-0" style="color: #5D4037; line-height: 1.6;">{{ $review->komentar }}</p>
                </div>
            @empty
                <div class="text-center py-5">
                    <i class="fas fa-comments fa-3x mb-3" style="color: #8B4513;"></i>
                    <h5 class="fw-bold mb-2" style="color: #3E2723;">Belum ada ulasan</h5>
                    <p class="text-muted mb-0">Jadilah yang pertama memberikan ulasan untuk destinasi ini!</p>
                </div>
            @endforelse
        </div>
    </div>
</div>

<style>
/* Custom hover effects */
.card:hover {
    transform: translateY(-5px);
    transition: transform 0.3s ease;
}

.form-control:focus,
.form-select:focus {
    border-color: #8B4513 !important;
    box-shadow: 0 0 0 0.2rem rgba(139, 69, 19, 0.25) !important;
}

.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(139, 69, 19, 0.3);
}

/* Rating stars animation */
.fa-star.text-warning {
    animation: starGlow 2s ease-in-out infinite;
}

@keyframes starGlow {
    0%, 100% { transform: scale(1); }
    50% { transform: scale(1.1); }
}

/* Breadcrumb styling */
.breadcrumb-item + .breadcrumb-item::before {
    color: #8B4513;
}

/* Image hover effect */
.card img:hover {
    transform: scale(1.05);
}

/* Review card hover */
.card-body > div:hover {
    transform: translateX(5px);
    transition: transform 0.3s ease;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .card-body {
        padding: 1.5rem !important;
    }
    
    .btn-lg {
        padding: 0.75rem 1.5rem !important;
        font-size: 0.9rem !important;
    }
    
    .col-md-6 .position-relative {
        height: 300px !important;
    }
}

/* Loading animation */
.card {
    animation: fadeInUp 0.6s ease-out;
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
</style>

@push('scripts')
<script>
document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("form-ulasan");
    const isLoggedIn = @json(Auth::check());

    if (form && !isLoggedIn) {
        form.addEventListener("submit", function (e) {
            e.preventDefault();
            
            // Show custom alert
            Swal.fire({
                title: 'Login Diperlukan',
                text: 'Silakan login terlebih dahulu untuk mengirim ulasan.',
                icon: 'warning',
                confirmButtonText: 'Login Sekarang',
                confirmButtonColor: '#8B4513',
                showCancelButton: true,
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "{{ route('login') }}";
                }
            });
        });
    }

    // Add smooth scrolling
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

    // Add form validation
    const ratingSelect = document.querySelector('select[name="rating"]');
    if (ratingSelect) {
        ratingSelect.addEventListener('change', function() {
            const selectedValue = this.value;
            const stars = this.parentElement.querySelectorAll('.fa-star');
            
            stars.forEach((star, index) => {
                if (index < selectedValue) {
                    star.classList.add('text-warning');
                } else {
                    star.classList.remove('text-warning');
                }
            });
        });
    }
});
</script>
@endpush
@endsection