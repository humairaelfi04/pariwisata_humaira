@extends('layouts.admin')

@section('title', 'Manajemen Event')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="fw-semibold text-dark mb-0" style="color: #8B4513 !important;">🎉 Daftar Event</h4>
    <a href="{{ route('admin.event.create') }}" class="btn btn-sm rounded-pill shadow-sm" style="background: linear-gradient(135deg, #8B4513, #A0522D); border: none; color: white; font-weight: 600;">
        <i class="bi bi-plus-circle me-1"></i> Tambah Event
    </a>
</div>

{{-- Alert sukses --}}
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert" style="background: rgba(16, 185, 129, 0.1); border: 1px solid rgba(16, 185, 129, 0.2); color: #065f46;">
        <i class="bi bi-check-circle me-2" style="color: #10b981;"></i>{{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

@if ($events->count())
    <div class="row g-4">
        @foreach ($events as $event)
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 border-0 shadow-sm rounded-4" style="background: rgba(255,255,255,0.95); backdrop-filter: blur(10px); border: 1px solid rgba(139, 69, 19, 0.1); transition: all 0.3s ease;">
                    @if ($event->url_gambar_acara)
                        <img src="{{ asset('images/' . $event->url_gambar_acara) }}" class="card-img-top rounded-top-4" alt="{{ $event->judul }}" style="height: 200px; object-fit: cover;">
                    @endif
                    <div class="card-body d-flex flex-column">
                        <h5 class="fw-semibold text-dark" style="color: #8B4513 !important;">{{ $event->judul }}</h5>
                        <p class="text-muted small mb-1" style="color: #6b7280;">
                            📅 {{ \Carbon\Carbon::parse($event->tanggal_mulai)->translatedFormat('d M Y') }}
                            @if($event->tanggal_berakhir)
                                <br>→ {{ \Carbon\Carbon::parse($event->tanggal_berakhir)->translatedFormat('d M Y') }}
                            @endif
                        </p>
                        <p class="text-muted small mb-2" style="color: #6b7280;">
                            📍 {{ $event->lokasi }}
                        </p>

                        <span class="badge rounded-pill mb-3" style="background: linear-gradient(135deg, #DEB887, #D2B48C); color: #8B4513; font-weight: 600;">
                            {{ $event->penyelenggara ?? 'Tanpa Penyelenggara' }}
                        </span>

                        <div class="d-flex justify-content-between mt-auto">
                            <a href="{{ route('admin.event.show', $event->id) }}" class="btn btn-sm btn-outline-dark rounded-pill" title="Lihat" style="border: 2px solid #8B4513; color: #8B4513; font-weight: 600; transition: all 0.3s ease;">
                                <i class="bi bi-eye"></i>
                            </a>
                            <a href="{{ route('admin.event.edit', $event->id) }}" class="btn btn-sm rounded-pill" title="Edit" style="background: linear-gradient(135deg, #CD853F, #D2B48C); border: none; color: white; font-weight: 600; transition: all 0.3s ease;">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form action="{{ route('admin.event.destroy', $event->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus event ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm rounded-pill" title="Hapus" style="background: linear-gradient(135deg, #ef4444, #dc2626); border: none; color: white; font-weight: 600; transition: all 0.3s ease;">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@else
    <div class="text-center text-muted mt-5" style="color: #8B4513 !important;">
        <i class="bi bi-info-circle me-1"></i> Belum ada event yang tersedia.
    </div>
@endif

<style>
.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 35px rgba(139, 69, 19, 0.15) !important;
}

.btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(139, 69, 19, 0.2);
}

.btn-outline-dark:hover {
    background: linear-gradient(135deg, #8B4513, #A0522D) !important;
    color: white !important;
    border-color: transparent !important;
}

.badge {
    transition: all 0.3s ease;
}

.badge:hover {
    transform: scale(1.05);
}
</style>
@endsection