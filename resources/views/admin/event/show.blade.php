@extends('layouts.admin')

@section('title', 'Detail Event')

@section('content')
<div class="container-fluid mt-4">
    <div class="card shadow-sm border-0 rounded-4">
        <div class="card-header bg-light text-dark rounded-top-4 px-4 py-3 d-flex justify-content-between align-items-center">
            <h5 class="mb-0 fw-semibold"><i class="bi bi-calendar-event me-2"></i>Detail Event</h5>
            <a href="{{ route('admin.event.index') }}" class="btn btn-sm btn-outline-dark rounded-pill">
                ← Kembali
            </a>
        </div>

        <div class="card-body px-4">
            @if($event->url_gambar_acara)
                <div class="mb-4 text-center">
                    <img src="{{ asset('images/' . $event->url_gambar_acara) }}" alt="Gambar Event" class="img-fluid rounded-3 shadow-sm" style="max-height: 300px; object-fit: cover;">
                </div>
            @endif

            <div class="mb-3">
                <label class="fw-semibold text-secondary">Judul Event:</label>
                <h5 class="fw-bold text-dark">{{ $event->judul }}</h5>
            </div>

            <div class="mb-3">
                <label class="fw-semibold text-secondary">Deskripsi:</label>
                <p class="text-muted">{{ $event->deskripsi }}</p>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="fw-semibold text-secondary">Tanggal Mulai:</label>
                    <p class="text-dark mb-0">{{ $event->tanggal_mulai }}</p>
                </div>
                @if($event->tanggal_berakhir)
                    <div class="col-md-6 mb-3">
                        <label class="fw-semibold text-secondary">Tanggal Berakhir:</label>
                        <p class="text-dark mb-0">{{ $event->tanggal_berakhir }}</p>
                    </div>
                @endif
            </div>

            <div class="mb-3">
                <label class="fw-semibold text-secondary">Lokasi:</label>
                <p class="text-dark mb-0">{{ $event->lokasi }}</p>
            </div>

            @if($event->penyelenggara)
                <div class="mb-3">
                    <label class="fw-semibold text-secondary">Penyelenggara:</label>
                    <p class="text-dark mb-0">{{ $event->penyelenggara }}</p>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
