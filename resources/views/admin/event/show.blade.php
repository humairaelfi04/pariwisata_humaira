@extends('layouts.admin')

@section('title', 'Detail Event')

@section('content')
<div class="container-fluid mt-4">
    <div class="mx-auto" style="max-width: 900px;">
        <div class="card border-0 shadow-lg rounded-4" style="background: linear-gradient(135deg, #FDF5E6, #F5F5DC); backdrop-filter: blur(15px); border: 1px solid rgba(139, 69, 19, 0.15);">
            <div class="card-header bg-transparent border-0 px-4 py-3">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="fw-bold mb-0" style="color: #8B4513;">
                        <i class="bi bi-calendar-event me-2" style="color: #CD853F;"></i> Detail Event
                    </h4>
                    <div class="d-flex gap-2">
                        <a href="{{ route('admin.event.edit', $event->id) }}" class="btn btn-outline-primary rounded-pill px-3 py-2" 
                           style="border-color: #8B4513; color: #8B4513; font-weight: 500; transition: all 0.3s ease;">
                            <i class="bi bi-pencil me-1"></i> Edit
                        </a>
                        <a href="{{ route('admin.event.index') }}" class="btn btn-outline-secondary rounded-pill px-3 py-2" 
                           style="border-color: #8B4513; color: #8B4513; font-weight: 500; transition: all 0.3s ease;">
                            <i class="bi bi-arrow-left me-1"></i> Kembali
                        </a>
                    </div>
                </div>
            </div>

            <div class="card-body px-4 py-4">
                @if($event->url_gambar_acara)
                    <div class="mb-4 text-center">
                        <div class="position-relative">
                            <img src="{{ asset('images/' . $event->url_gambar_acara) }}" alt="Gambar Event" 
                                 class="img-fluid rounded-4 shadow-lg" 
                                 style="max-height: 400px; object-fit: cover; border: 3px solid #DEB887; transition: all 0.3s ease;">
                        </div>
                    </div>
                @endif

                <div class="row">
                    <div class="col-lg-8">
                        <div class="mb-4">
                            <label class="fw-semibold mb-2" style="color: #8B4513; font-size: 0.9rem; text-transform: uppercase; letter-spacing: 0.5px;">Judul Event</label>
                            <h3 class="fw-bold mb-0" style="color: #8B4513; line-height: 1.3;">{{ $event->judul }}</h3>
                        </div>

                        <div class="mb-4">
                            <label class="fw-semibold mb-2" style="color: #8B4513; font-size: 0.9rem; text-transform: uppercase; letter-spacing: 0.5px;">Deskripsi</label>
                            <div class="p-3 rounded-3" style="background: rgba(255, 255, 255, 0.6); border: 1px solid rgba(139, 69, 19, 0.1);">
                                <p class="mb-0" style="color: #8B4513; line-height: 1.6;">{{ $event->deskripsi }}</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="p-3 rounded-3" style="background: rgba(255, 255, 255, 0.6); border: 1px solid rgba(139, 69, 19, 0.1);">
                                    <label class="fw-semibold mb-2 d-block" style="color: #8B4513; font-size: 0.9rem; text-transform: uppercase; letter-spacing: 0.5px;">
                                        <i class="bi bi-calendar-check me-1" style="color: #CD853F;"></i> Tanggal Mulai
                                    </label>
                                    <p class="mb-0 fw-semibold" style="color: #8B4513;">{{ \Carbon\Carbon::parse($event->tanggal_mulai)->format('d F Y') }}</p>
                                </div>
                            </div>
                            @if($event->tanggal_berakhir)
                                <div class="col-md-6 mb-3">
                                    <div class="p-3 rounded-3" style="background: rgba(255, 255, 255, 0.6); border: 1px solid rgba(139, 69, 19, 0.1);">
                                        <label class="fw-semibold mb-2 d-block" style="color: #8B4513; font-size: 0.9rem; text-transform: uppercase; letter-spacing: 0.5px;">
                                            <i class="bi bi-calendar-x me-1" style="color: #CD853F;"></i> Tanggal Berakhir
                                        </label>
                                        <p class="mb-0 fw-semibold" style="color: #8B4513;">{{ \Carbon\Carbon::parse($event->tanggal_berakhir)->format('d F Y') }}</p>
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="p-3 rounded-3" style="background: rgba(255, 255, 255, 0.6); border: 1px solid rgba(139, 69, 19, 0.1);">
                                    <label class="fw-semibold mb-2 d-block" style="color: #8B4513; font-size: 0.9rem; text-transform: uppercase; letter-spacing: 0.5px;">
                                        <i class="bi bi-geo-alt me-1" style="color: #CD853F;"></i> Lokasi
                                    </label>
                                    <p class="mb-0 fw-semibold" style="color: #8B4513;">{{ $event->lokasi }}</p>
                                </div>
                            </div>
                            @if($event->penyelenggara)
                                <div class="col-md-6 mb-3">
                                    <div class="p-3 rounded-3" style="background: rgba(255, 255, 255, 0.6); border: 1px solid rgba(139, 69, 19, 0.1);">
                                        <label class="fw-semibold mb-2 d-block" style="color: #8B4513; font-size: 0.9rem; text-transform: uppercase; letter-spacing: 0.5px;">
                                            <i class="bi bi-person-badge me-1" style="color: #CD853F;"></i> Penyelenggara
                                        </label>
                                        <p class="mb-0 fw-semibold" style="color: #8B4513;">{{ $event->penyelenggara }}</p>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="p-4 rounded-4" style="background: rgba(255, 255, 255, 0.7); border: 1px solid rgba(139, 69, 19, 0.15);">
                            <h5 class="fw-bold mb-3" style="color: #8B4513;">
                                <i class="bi bi-info-circle me-2" style="color: #CD853F;"></i> Informasi Event
                            </h5>
                            
                            <div class="mb-3">
                                <small class="fw-semibold d-block mb-1" style="color: #8B4513; text-transform: uppercase; letter-spacing: 0.5px;">Status</small>
                                <span class="badge rounded-pill px-3 py-2" style="background: linear-gradient(135deg, #8B4513, #A0522D); color: white; font-size: 0.8rem;">
                                    <i class="bi bi-check-circle me-1"></i> Aktif
                                </span>
                            </div>

                            <div class="mb-3">
                                <small class="fw-semibold d-block mb-1" style="color: #8B4513; text-transform: uppercase; letter-spacing: 0.5px;">Dibuat</small>
                                <p class="mb-0" style="color: #8B4513; font-size: 0.9rem;">
                                    {{ \Carbon\Carbon::parse($event->created_at)->format('d F Y H:i') }}
                                </p>
                            </div>

                            @if($event->updated_at != $event->created_at)
                                <div class="mb-3">
                                    <small class="fw-semibold d-block mb-1" style="color: #8B4513; text-transform: uppercase; letter-spacing: 0.5px;">Terakhir Diupdate</small>
                                    <p class="mb-0" style="color: #8B4513; font-size: 0.9rem;">
                                        {{ \Carbon\Carbon::parse($event->updated_at)->format('d F Y H:i') }}
                                    </p>
                                </div>
                            @endif

                            <div class="d-grid gap-2 mt-4">
                                <a href="{{ route('admin.event.edit', $event->id) }}" class="btn rounded-pill px-3 py-2" 
                                   style="background: linear-gradient(135deg, #8B4513, #A0522D); border: none; color: white; font-weight: 600; transition: all 0.3s ease;">
                                    <i class="bi bi-pencil me-1"></i> Edit Event
                                </a>
                                <a href="{{ route('admin.event.index') }}" class="btn btn-outline-secondary rounded-pill px-3 py-2" 
                                   style="border: 2px solid #8B4513; color: #8B4513; font-weight: 600; transition: all 0.3s ease;">
                                    <i class="bi bi-arrow-left me-1"></i> Kembali ke Daftar
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.card {
    transition: all 0.3s ease;
}

.card:hover {
    transform: translateY(-3px);
    box-shadow: 0 20px 40px rgba(139, 69, 19, 0.15) !important;
}

.btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(139, 69, 19, 0.25) !important;
}

.btn-outline-secondary:hover {
    background: linear-gradient(135deg, #8B4513, #A0522D) !important;
    color: white !important;
    border-color: transparent !important;
}

.btn-outline-primary:hover {
    background: linear-gradient(135deg, #8B4513, #A0522D) !important;
    color: white !important;
    border-color: transparent !important;
}

img {
    transition: all 0.3s ease;
}

img:hover {
    transform: scale(1.02);
    box-shadow: 0 15px 35px rgba(139, 69, 19, 0.2) !important;
}

.badge {
    transition: all 0.3s ease;
}

.badge:hover {
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(139, 69, 19, 0.3) !important;
}

@media (max-width: 768px) {
    .card-body {
        padding: 1.5rem;
    }
    
    .d-flex.gap-2 {
        flex-direction: column;
        gap: 0.5rem !important;
    }
    
    .btn {
        width: 100%;
    }
}
</style>
@endsection