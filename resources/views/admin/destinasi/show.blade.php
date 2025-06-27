@extends('layouts.admin')

@section('title', 'Detail Destinasi')

@section('content')
<div class="mx-auto" style="max-width: 768px;">
    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-body">
            <h4 class="fw-semibold text-success mb-4">
                <i class="fa fa-map-location-dot me-2"></i>{{ $destinasi->nama }}
            </h4>

            @if ($destinasi->url_gambar_utama)
                <img src="{{ asset('images/' . $destinasi->url_gambar_utama) }}"
                     alt="{{ $destinasi->nama }}"
                     class="img-fluid rounded-4 mb-4 shadow-sm"
                     style="max-height: 300px; object-fit: cover; width: 100%;">
            @endif

            <div class="mb-3">
                <label class="fw-medium text-muted">📍 Alamat</label>
                <div class="text-dark">{{ $destinasi->alamat }}</div>
            </div>

            <div class="mb-3">
                <label class="fw-medium text-muted">📝 Deskripsi</label>
                <div class="text-dark">{{ $destinasi->deskripsi }}</div>
            </div>

            <div class="mb-3">
                <label class="fw-medium text-muted">🎫 Harga Tiket</label>
                <div class="text-dark">Rp{{ number_format($destinasi->harga_tiket, 2, ',', '.') }}</div>
            </div>

            <div class="mb-3">
                <label class="fw-medium text-muted">⏰ Jam Operasional</label>
                <div class="text-dark">{{ $destinasi->jam_operasional }}</div>
            </div>

            <div class="mb-3">
                <label class="fw-medium text-muted">🗂️ Kategori</label>
                <div class="text-dark">{{ $destinasi->category->nama_kategori }}</div>
            </div>

            <div class="mb-4">
                <label class="fw-medium text-muted">📌 Status Publikasi</label>
                <div>
                    <span class="badge px-3 py-1 rounded-pill
                        {{ $destinasi->status_publikasi === 'published' ? 'bg-success' : 'bg-secondary' }}">
                        {{ ucfirst($destinasi->status_publikasi) }}
                    </span>
                </div>
            </div>

            <div class="d-flex justify-content-between mt-4">
                <a href="{{ route('destinasi.index') }}" class="btn btn-outline-secondary rounded-pill">
                    <i class="fa fa-arrow-left me-1"></i> Kembali
                </a>
                <a href="{{ route('destinasi.edit', $destinasi->id) }}" class="btn btn-warning text-white rounded-pill">
                    <i class="fa fa-pen-to-square me-1"></i> Edit
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
