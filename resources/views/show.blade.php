@extends('layouts.tamplate')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">{{ $pariwisata->nama }}</h1>

        {{-- Gambar --}}
        @if($pariwisata->url_gambar_utama)
            <img src="{{ asset('images/' . $pariwisata->url_gambar_utama) }}" alt="{{ $pariwisata->nama }}" class="img-fluid mb-4" style="max-height: 400px;">
        @else
            <img src="https://via.placeholder.com/800x400?text=No+Image" alt="No image" class="img-fluid mb-4">
        @endif

        {{-- Deskripsi --}}
        <div class="mb-3">
            <h5>Deskripsi:</h5>
            <p>{{ $pariwisata->deskripsi }}</p>
        </div>

        {{-- Alamat / Lokasi --}}
        <div class="mb-3">
            <h5>Lokasi:</h5>
            <p>{{ $pariwisata->alamat }}</p>
        </div>

        {{-- Harga Tiket --}}
        @if($pariwisata->harga_tiket)
        <div class="mb-3">
            <h5>Harga Tiket:</h5>
            <p>Rp {{ number_format($pariwisata->harga_tiket, 0, ',', '.') }}</p>
        </div>
        @endif

        {{-- Jam Operasional --}}
        @if($pariwisata->jam_operasional)
        <div class="mb-3">
            <h5>Jam Operasional:</h5>
            <p>{{ $pariwisata->jam_operasional }}</p>
        </div>
        @endif

        {{-- Kategori --}}
        <div class="mb-3">
            <h5>Kategori:</h5>
            <p>{{ $pariwisata->category->nama_kategori ?? '-' }}</p>
        </div>

        {{-- Status Publikasi --}}
        <div class="mb-3">
            <h5>Status Publikasi:</h5>
            <span class="badge bg-{{ $pariwisata->status_publikasi === 'published' ? 'success' : 'secondary' }}">
                {{ ucfirst($pariwisata->status_publikasi) }}
            </span>
        </div>

        {{-- Tombol Kembali --}}
        <a href="{{ url('/') }}" class="btn btn-secondary mt-3">← Kembali</a>
    </div>
@endsection
