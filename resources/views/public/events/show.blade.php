@extends('layouts.frontend')

@section('content')
<div class="container py-5">
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="mb-4" data-aos="fade-right">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('home') }}" style="color: #8B4513; text-decoration: none;">
                    <i class="fas fa-home me-1"></i>Beranda
                </a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ route('public.events.index') }}" style="color: #8B4513; text-decoration: none;">
                    Acara
                </a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">{{ $event->judul }}</li>
        </ol>
    </nav>

    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card border-0 shadow-xl rounded-4 overflow-hidden" data-aos="fade-up" style="background: rgba(255,255,255,0.97); backdrop-filter: blur(20px); border: 1px solid rgba(139, 69, 19, 0.1);">
                <div class="row g-0">
                    {{-- Gambar Acara di sisi kiri --}}
                    <div class="col-md-6 position-relative">
                        @if($event->url_gambar_acara)
                            <div class="position-relative overflow-hidden" style="height: 400px;">
                                <img src="{{ asset('images/' . $event->url_gambar_acara) }}"
                                     alt="Gambar Acara" class="img-fluid h-100 w-100"
                                     style="object-fit: cover; min-height: 400px; transition: transform 0.4s ease;">
                                <!-- Overlay dengan gradient -->
                                <div class="position-absolute top-0 start-0 w-100 h-100" 
                                     style="background: linear-gradient(135deg, rgba(139, 69, 19, 0.1), rgba(160, 82, 45, 0.1), rgba(210, 180, 140, 0.1));"></div>
                                
                                <!-- Status Badge -->
                                <div class="position-absolute top-0 end-0 m-4">
                                    <span class="badge" style="background: rgba(255, 255, 255, 0.95); color: #8B4513; border-radius: 25px; padding: 10px 20px; font-size: 0.9rem; backdrop-filter: blur(10px);">
                                        <i class="fas fa-calendar-check me-1" style="color: #D2691E;"></i>Event Aktif
                                    </span>
                                </div>
                            </div>
                        @else
                            <div class="d-flex justify-content-center align-items-center h-100" style="min-height: 400px; background: linear-gradient(135deg, #F5F5DC, #DEB887);">
                                <div class="text-center">
                                    <i class="fas fa-calendar-alt fa-4x mb-3" style="color: #8B4513;"></i>
                                    <p class="text-muted">Tidak ada gambar tersedia</p>
                                </div>
                            </div>
                        @endif
                    </div>

                    {{-- Detail Acara di sisi kanan --}}
                    <div class="col-md-6 p-5">
                        <h2 class="fw-bold mb-4" style="background: linear-gradient(135deg, #8B4513, #A0522D, #CD853F); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; font-size: 2rem;">
                            {{ $event->judul }}
                        </h2>

                        <div class="mb-4">
                            <h6 class="fw-semibold mb-2" style="color: #8B4513;">
                                <i class="fas fa-info-circle me-2"></i>Deskripsi Event
                            </h6>
                            <p class="text-dark" style="line-height: 1.8; font-size: 1rem;">{{ $event->deskripsi }}</p>
                        </div>

                        <div class="row g-3 mb-4">
                            <div class="col-12">
                                <div class="d-flex align-items-center p-3 rounded-3" style="background: linear-gradient(135deg, rgba(139, 69, 19, 0.05), rgba(160, 82, 45, 0.05));">
                                    <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 45px; height: 45px; background: linear-gradient(135deg, #8B4513, #A0522D);">
                                        <i class="fas fa-calendar-alt text-white"></i>
                                    </div>
                                    <div>
                                        <small class="text-muted d-block">Tanggal Mulai</small>
                                        <strong style="color: #1e293b;">{{ $event->tanggal_mulai }}</strong>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-12">
                                <div class="d-flex align-items-center p-3 rounded-3" style="background: linear-gradient(135deg, rgba(205, 133, 63, 0.05), rgba(210, 180, 140, 0.05));">
                                    <div class="bg-info rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 45px; height: 45px; background: linear-gradient(135deg, #CD853F, #D2B48C);">
                                        <i class="fas fa-calendar-check text-white"></i>
                                    </div>
                                    <div>
                                        <small class="text-muted d-block">Tanggal Berakhir</small>
                                        <strong style="color: #1e293b;">{{ $event->tanggal_berakhir ?? 'TBD' }}</strong>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row g-3 mb-4">
                            <div class="col-12">
                                <div class="d-flex align-items-center p-3 rounded-3" style="background: linear-gradient(135deg, rgba(139, 69, 19, 0.05), rgba(160, 82, 45, 0.05));">
                                    <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 45px; height: 45px; background: linear-gradient(135deg, #8B4513, #A0522D);">
                                        <i class="fas fa-map-marker-alt text-white"></i>
                                    </div>
                                    <div>
                                        <small class="text-muted d-block">Lokasi Event</small>
                                        <strong style="color: #1e293b;">{{ $event->lokasi }}</strong>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-12">
                                <div class="d-flex align-items-center p-3 rounded-3" style="background: linear-gradient(135deg, rgba(205, 133, 63, 0.05), rgba(210, 180, 140, 0.05));">
                                    <div class="bg-info rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 45px; height: 45px; background: linear-gradient(135deg, #CD853F, #D2B48C);">
                                        <i class="fas fa-user-tie text-white"></i>
                                    </div>
                                    <div>
                                        <small class="text-muted d-block">Penyelenggara</small>
                                        <strong style="color: #1e293b;">{{ $event->penyelenggara }}</strong>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-grid gap-2">
                            <a href="{{ route('public.events.index') }}"
                               class="btn btn-outline-primary btn-lg rounded-pill shadow-sm"
                               style="font-weight: 600; border-width: 2px;">
                                <i class="fas fa-arrow-left me-2"></i>Kembali ke Daftar Acara
                            </a>
                            <button class="btn btn-primary btn-lg rounded-pill shadow-sm" 
                                    style="background: linear-gradient(135deg, #8B4513, #A0522D); border: none; font-weight: 600;">
                                <i class="fas fa-share-alt me-2"></i>Bagikan Event
                            </button>
                        </div>
                    </div>
                </div>
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
.btn-primary {
    background: linear-gradient(135deg, #8B4513, #A0522D);
    color: white;
    border: none;
    transition: all 0.3s ease;
}
.btn-primary:hover {
    background: linear-gradient(135deg, #A0522D, #8B4513);
    color: white;
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