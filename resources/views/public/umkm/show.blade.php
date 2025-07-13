@extends('layouts.frontend')

@section('content')
<div class="container py-5">
    <div class="card border-0 shadow-lg rounded-4 overflow-hidden" style="background: rgba(255, 250, 240, 0.97); backdrop-filter: blur(12px);">
        <div class="row g-0">
            {{-- Kolom Gambar --}}
            <div class="col-md-6 position-relative">
                @if($umkm->url_gambar_umkm)
                    <div class="position-relative overflow-hidden" style="height: 350px;">
                        <img src="{{ asset('storage/' . $umkm->url_gambar_umkm) }}"
                            alt="Gambar UMKM" class="img-fluid w-100 h-100"
                            style="object-fit: cover; min-height: 350px; transition: transform 0.3s ease;">
                        <!-- Overlay -->
                        <div class="position-absolute top-0 start-0 w-100 h-100" 
                             style="background: linear-gradient(135deg, rgba(139, 69, 19, 0.08), rgba(160, 82, 45, 0.08));"></div>
                        <!-- Kategori Badge -->
                        @if($umkm->category)
                            <div class="position-absolute top-0 start-0 m-3">
                                <span class="badge" style="background: linear-gradient(135deg, #8B4513, #A0522D); color: white; border-radius: 20px; padding: 8px 16px; font-size: 0.9rem;">
                                    <i class="fas fa-tag me-1"></i>{{ $umkm->category->nama_kategori }}
                                </span>
                            </div>
                        @endif
                    </div>
                @else
                    <div class="bg-light d-flex align-items-center justify-content-center h-100 rounded-start-4" style="min-height: 350px; background: linear-gradient(135deg, #F5F5DC, #DEB887);">
                        <span class="text-muted" style="color: #8B4513;">Tidak ada gambar</span>
                    </div>
                @endif
            </div>

            {{-- Kolom Detail --}}
            <div class="col-md-6 p-5">
                <h2 class="fw-bold mb-3" style="background: linear-gradient(135deg, #8B4513, #A0522D); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">
                    {{ $umkm->nama_usaha }}
                </h2>

                <div class="mb-3">
                    <strong class="text-muted" style="color: #8B4513;">Kategori:</strong><br>
                    <span class="badge" style="background: linear-gradient(135deg, #8B4513, #A0522D); color: white; border-radius: 20px; padding: 8px 16px; font-size: 0.9rem;">
                        {{ $umkm->category->nama_kategori ?? 'Tidak ada' }}
                    </span>
                </div>

                <div class="mb-3">
                    <strong class="text-muted" style="color: #8B4513;">Deskripsi:</strong><br>
                    <span class="text-dark" style="line-height: 1.7; color: #3E2723;">{{ $umkm->deskripsi_layanan }}</span>
                </div>
                <div class="mb-3">
                    <strong class="text-muted" style="color: #8B4513;">Alamat:</strong><br>
                    <span class="text-dark" style="color: #3E2723;">{{ $umkm->alamat_umkm }}</span>
                </div>
                <div class="mb-3">
                    <strong class="text-muted" style="color: #8B4513;">Kontak:</strong><br>
                    <span class="text-dark" style="color: #3E2723;">
                        <i class="fas fa-user me-1" style="color: #8B4513;"></i>{{ $umkm->narahubung }}
                        <br>
                        <i class="fas fa-phone me-1" style="color: #A0522D;"></i>{{ $umkm->nomor_telepon }}
                    </span>
                </div>

                <a href="{{ route('public.umkm.index') }}"
                   class="btn btn-outline-primary btn-lg rounded-pill mt-4 shadow-sm"
                   style="font-weight: 600;">
                    <i class="fas fa-arrow-left me-2"></i>Kembali ke Daftar UMKM
                </a>
            </div>
        </div>
    </div>
</div>

<style>
.card:hover {
    transform: translateY(-5px);
    transition: transform 0.3s ease;
}
.img-fluid:hover {
    transform: scale(1.05);
}
.badge {
    transition: all 0.3s ease;
}
.badge:hover {
    transform: scale(1.08);
}
.btn-outline-primary {
    border: 2px solid #8B4513;
    color: #8B4513;
    background: transparent;
    transition: all 0.3s ease;
}
.btn-outline-primary:hover {
    background: linear-gradient(135deg, #8B4513, #A0522D);
    color: white;
    border-color: transparent;
    box-shadow: 0 10px 25px rgba(139, 69, 19, 0.2);
}
@media (max-width: 768px) {
    .p-5 {
        padding: 1.5rem !important;
    }
    .img-fluid {
        min-height: 200px !important;
    }
}
</style>
@endsection