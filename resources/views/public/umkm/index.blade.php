@extends('layouts.frontend')

@section('content')
<section class="py-5" style="background: linear-gradient(135deg, #eff6ff 0%, #dbeafe 100%);">
    <div class="container">
        <!-- Hero Header -->
        <div class="text-center mb-5" data-aos="fade-up">
            <h1 class="display-4 fw-bold mb-3" style="background: linear-gradient(135deg, #1e40af, #3b82f6); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">
                🏪 UMKM Lokal Unggulan
            </h1>
            <p class="lead text-muted mb-0">Dukung perekonomian lokal dengan membeli produk dan layanan dari UMKM terbaik</p>
        </div>

        {{-- Form Pencarian & Filter --}}
        <div class="row justify-content-center mb-5" data-aos="fade-up" data-aos-delay="200">
            <div class="col-lg-8">
                <form method="GET" action="{{ route('public.umkm.index') }}" class="card border-0 shadow-lg" style="background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(20px); border-radius: 20px;">
                    <div class="card-body p-4">
                        <div class="row g-3">
                            <div class="col-md-5">
                                <div class="position-relative">
                                    <i class="fas fa-search position-absolute" style="top: 50%; left: 15px; transform: translateY(-50%); color: #6b7280; z-index: 10;"></i>
                                    <input type="text" name="search" 
                                           class="form-control form-control-lg ps-5" 
                                           placeholder="Cari UMKM..." 
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

        {{-- Grid UMKM --}}
        @if ($umkm->isEmpty())
            <div class="text-center py-5" data-aos="fade-up">
                <div class="card border-0 shadow-lg" style="background: rgba(255, 255, 255, 0.95); border-radius: 20px;">
                    <div class="card-body py-5">
                        <i class="fas fa-store fa-3x mb-3" style="color: #6b7280;"></i>
                        <h4 class="fw-bold mb-2" style="color: #1e293b;">Belum ada UMKM ditemukan</h4>
                        <p class="text-muted mb-0">Coba ubah kata kunci pencarian atau filter kategori</p>
                    </div>
                </div>
            </div>
        @else
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 g-4">
                @foreach($umkm as $item)
                    <div class="col" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                        <div class="card h-100 border-0 shadow-lg" style="background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(20px); border-radius: 20px; overflow: hidden; transition: all 0.3s ease;">
                            <div class="position-relative overflow-hidden" style="height: 200px;">
                                @if($item->url_gambar_umkm)
                                    <img src="{{ asset('storage/' . $item->url_gambar_umkm) }}"
                                         alt="Gambar UMKM" 
                                         class="card-img-top w-100 h-100"
                                         style="object-fit: cover; transition: transform 0.3s ease;">
                                @else
                                    <div class="w-100 h-100 d-flex align-items-center justify-content-center" style="background: linear-gradient(135deg, #e5e7eb, #f3f4f6);">
                                        <i class="fas fa-store fa-3x" style="color: #9ca3af;"></i>
                                    </div>
                                @endif

                                <!-- Category Badge -->
                                @if($item->category)
                                    <div class="position-absolute top-0 start-0 m-3">
                                        <span class="badge" style="background: linear-gradient(135deg, #1e40af, #3b82f6); color: white; border-radius: 20px; padding: 8px 16px; font-size: 0.8rem;">
                                            {{ $item->category->nama_kategori }}
                                        </span>
                                    </div>
                                @endif

                                <!-- Status Badge -->
                                <div class="position-absolute top-0 end-0 m-3">
                                    <span class="badge" style="background: rgba(255, 255, 255, 0.9); color: #1e40af; border-radius: 20px; padding: 8px 12px; font-size: 0.8rem;">
                                        <i class="fas fa-check-circle me-1" style="color: #10b981;"></i>Aktif
                                    </span>
                                </div>
                            </div>
                            <div class="card-body d-flex flex-column p-4">
                                <h5 class="card-title fw-bold mb-2" style="color: #1e293b; font-size: 1.1rem;">
                                    {{ $item->nama_usaha }}
                                </h5>
                                <p class="card-text text-muted mb-3" style="font-size: 0.9rem; line-height: 1.6;">
                                    {{ Str::limit($item->deskripsi_layanan, 100) }}
                                </p>
                                <div class="mt-auto">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <div class="d-flex align-items-center">
                                            <i class="fas fa-map-marker-alt me-2" style="color: #6b7280; font-size: 0.9rem;"></i>
                                            <small class="text-muted">{{ $item->alamat ?? 'Alamat tersedia' }}</small>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <i class="fas fa-phone me-2" style="color: #6b7280; font-size: 0.9rem;"></i>
                                            <small class="text-muted">{{ $item->nomor_telepon ?? 'Kontak tersedia' }}</small>
                                        </div>
                                    </div>
                                    <a href="{{ route('public.umkm.show', $item->id) }}"
                                       class="btn btn-primary w-100" 
                                       style="border-radius: 12px; background: linear-gradient(135deg, #1e40af, #3b82f6); border: none; font-weight: 600; padding: 12px; transition: all 0.3s ease;">
                                        <i class="fas fa-eye me-2"></i>Lihat Detail
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Pagination --}}
            <div class="d-flex justify-content-center mt-5" data-aos="fade-up">
                {{ $umkm->withQueryString()->links('pagination::bootstrap-5') }}
            </div>
        @endif
    </div>
</section>

<style>
.card:hover {
    transform: translateY(-10px) scale(1.02);
    box-shadow: 0 25px 50px -12px rgba(30, 64, 175, 0.25) !important;
}
.card-img-top:hover {
    transform: scale(1.1);
}
.badge {
    transition: all 0.3s ease;
}
.badge:hover {
    transform: scale(1.08);
}
.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(30, 64, 175, 0.3);
    background: linear-gradient(135deg, #3b82f6, #1e40af) !important;
}
.form-control:focus,
.form-select:focus {
    border-color: #1e40af !important;
    box-shadow: 0 0 0 0.2rem rgba(30, 64, 175, 0.25) !important;
}
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
</style>
@endsection