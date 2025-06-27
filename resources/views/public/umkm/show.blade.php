@extends('layouts.frontend')

@section('content')
<div class="container py-5">
    <div class="card border-0 shadow-sm rounded-4" style="background-color: #fff9f5;">
        <div class="row g-0">
            {{-- Kolom Gambar --}}
            <div class="col-md-6">
                @if($umkm->url_gambar_umkm)
                    <img src="{{ asset('storage/' . $umkm->url_gambar_umkm) }}"
                        alt="Gambar UMKM" class="img-fluid w-100 h-100 rounded-start-4"
                        style="object-fit: cover; min-height: 350px;">
                @else
                    <div class="bg-light d-flex align-items-center justify-content-center h-100 rounded-start-4" style="min-height: 350px;">
                        <span class="text-muted">Tidak ada gambar</span>
                    </div>
                @endif
            </div>

            {{-- Kolom Detail --}}
            <div class="col-md-6 p-4">
                <h2 class="fw-bold text-secondary-emphasis mb-3">{{ $umkm->nama_usaha }}</h2>

                <p class="mb-3">
                    <strong class="text-muted">Kategori:</strong><br>
                    <span class="badge bg-dark text-white rounded-pill px-3 py-1">
                        {{ $umkm->category->nama_kategori ?? 'Tidak ada' }}
                    </span>
                </p>

                <p class="mb-3"><strong class="text-muted">Deskripsi:</strong><br>{{ $umkm->deskripsi_layanan }}</p>
                <p class="mb-3"><strong class="text-muted">Alamat:</strong><br>{{ $umkm->alamat_umkm }}</p>
                <p class="mb-3"><strong class="text-muted">Kontak:</strong><br>{{ $umkm->narahubung }} ({{ $umkm->nomor_telepon }})</p>

                <a href="{{ route('public.umkm.index') }}"
                   class="btn rounded-pill mt-4 shadow-sm"
                   style="background-color: #f5dbc4; color: #5c3d2e;">
                    ← Kembali ke Daftar UMKM
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
