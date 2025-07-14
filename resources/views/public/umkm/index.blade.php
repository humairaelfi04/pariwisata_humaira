@extends('layouts.frontend')

@section('content')
<section class="py-5" style="background: linear-gradient(135deg, #F5DEB3 0%, #DEB887 100%);">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <h1 class="display-4 fw-bold mb-3" style="background: linear-gradient(135deg, #8B4513, #A0522D); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">
                🏪 UMKM Lokal Unggulan
            </h1>
            <p class="lead text-muted mb-0">Dukung perekonomian lokal dengan membeli produk dan layanan dari UMKM terbaik</p>
        </div>

        {{-- search dan filter --}}
        <div class="row justify-content-center mb-5" data-aos="fade-up" data-aos-delay="200">
            <div class="col-lg-8">
                <form method="GET" action="{{ route('public.umkm.index') }}" class="card border-0 shadow-lg" style="background: rgba(255, 250, 240, 0.95); backdrop-filter: blur(20px); border-radius: 20px;">
                    <div class="card-body p-4">
                        <div class="row g-3">
                            <div class="col-md-5">
                                <div class="position-relative">
                                    <i class="fas fa-search position-absolute" style="top: 50%; left: 15px; transform: translateY(-50%); color: #8B4513; z-index: 10;"></i>
                                    <input type="text" name="search"
                                           class="form-control form-control-lg ps-5"
                                           placeholder="Cari UMKM..."
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

        {{-- list umkm --}}
        @if ($umkm->isEmpty())
            <div class="text-center py-5" data-aos="fade-up">
                <div class="card border-0 shadow-lg" style="background: rgba(255, 250, 240, 0.95); border-radius: 20px;">
                    <div class="card-body py-5">
                        <i class="fas fa-store fa-3x mb-3" style="color: #8B4513;"></i>
                        <h4 class="fw-bold mb-2" style="color: #3E2723;">Belum ada UMKM ditemukan</h4>
                        <p class="text-muted mb-0">Coba ubah kata kunci pencarian atau filter kategori</p>
                    </div>
                </div>
            </div>
        @else
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 g-4">
                @foreach($umkm as $item)
                    <div class="col" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                        <div class="card h-100 border-0 shadow-lg" style="background: rgba(255, 250, 240, 0.95); backdrop-filter: blur(20px); border-radius: 20px; overflow: hidden; transition: all 0.3s ease;">
                            <div class="position-relative overflow-hidden" style="height: 200px;">
                                @if($item->url_gambar_umkm)
                                    <img src="{{ asset('storage/' . $item->url_gambar_umkm) }}"
                                         alt="Gambar UMKM"
                                         class="card-img-top w-100 h-100"
                                         style="object-fit: cover; transition: transform 0.3s ease;">
                                @else
                                    <div class="w-100 h-100 d-flex align-items-center justify-content-center" style="background: linear-gradient(135deg, #F5F5DC, #DEB887);">
                                        <i class="fas fa-store fa-3x" style="color: #8B4513;"></i>
                                    </div>
                                @endif

                                <!-- kategori -->
                                @if($item->category)
                                    <div class="position-absolute top-0 start-0 m-3">
                                        <span class="badge" style="background: linear-gradient(135deg, #8B4513, #A0522D); color: white; border-radius: 20px; padding: 8px 16px; font-size: 0.8rem;">
                                            {{ $item->category->nama_kategori }}
                                        </span>
                                    </div>
                                @endif


                            </div>
                            <div class="card-body d-flex flex-column p-4">
                                <h5 class="card-title fw-bold mb-2" style="color: #3E2723; font-size: 1.1rem;">
                                    {{ $item->nama_usaha }}
                                </h5>
                                <p class="card-text text-muted mb-3" style="font-size: 0.9rem; line-height: 1.6;">
                                    {{ Str::limit($item->deskripsi_layanan, 100) }}
                                </p>
                                <div class="mt-auto">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <div class="d-flex align-items-center">
                                            <i class="fas fa-map-marker-alt me-2" style="color: #8B4513; font-size: 0.9rem;"></i>
                                            <small class="text-muted">{{ $item->alamat ?? 'Alamat tersedia' }}</small>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <i class="fas fa-phone me-2" style="color: #8B4513; font-size: 0.9rem;"></i>
                                            <small class="text-muted">{{ $item->nomor_telepon ?? 'Kontak tersedia' }}</small>
                                        </div>
                                    </div>
                                    <a href="{{ route('public.umkm.show', $item->id) }}"
                                       class="btn btn-primary w-100"
                                       style="border-radius: 12px; background: linear-gradient(135deg, #8B4513, #A0522D); border: none; font-weight: 600; padding: 12px; transition: all 0.3s ease;">
                                        <i class="fas fa-eye me-2"></i>Lihat Detail
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- pagination --}}
            <div class="d-flex justify-content-center mt-5" data-aos="fade-up">
                {{ $umkm->withQueryString()->links('pagination::bootstrap-5') }}
            </div>
        @endif
    </div>
</section>

<style>
.card:hover {
    transform: translateY(-10px) scale(1.02);
    box-shadow: 0 25px 50px -12px rgba(139, 69, 19, 0.25) !important;
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
    box-shadow: 0 10px 25px rgba(139, 69, 19, 0.3);
    background: linear-gradient(135deg, #A0522D, #8B4513) !important;
}
.form-control:focus,
.form-select:focus {
    border-color: #8B4513 !important;
    box-shadow: 0 0 0 0.2rem rgba(139, 69, 19, 0.25) !important;
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
