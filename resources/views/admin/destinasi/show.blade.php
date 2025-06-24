@extends('layouts.admin')

@section('title', 'Detail Destinasi')

@section('content')
<div class="container py-4" style="max-width: 768px;">
    <div class="card shadow-sm border-0">
        <div class="card-body">
            <h4 class="mb-3 fw-bold text-success">{{ $destinasi->nama }}</h4>

            @if ($destinasi->url_gambar_utama)
                <img src="{{ asset('images/' . $destinasi->url_gambar_utama) }}"
                     alt="{{ $destinasi->nama }}"
                     class="img-fluid rounded mb-4 shadow-sm">
            @endif

            <ul class="list-group list-group-flush mb-4">
                <li class="list-group-item"><strong>📍 Alamat:</strong> {{ $destinasi->alamat }}</li>
                <li class="list-group-item"><strong>📝 Deskripsi:</strong><br>{{ $destinasi->deskripsi }}</li>
                <li class="list-group-item"><strong>🎫 Harga Tiket:</strong> Rp{{ number_format($destinasi->harga_tiket, 2, ',', '.') }}</li>
                <li class="list-group-item"><strong>⏰ Jam Operasional:</strong> {{ $destinasi->jam_operasional }}</li>
                <li class="list-group-item"><strong>🗂️ Kategori:</strong> {{ $destinasi->category->nama_kategori }}</li>
                <li class="list-group-item"><strong>📌 Status:</strong>
                    <span class="badge {{ $destinasi->status_publikasi === 'published' ? 'bg-success' : 'bg-secondary' }}">
                        {{ ucfirst($destinasi->status_publikasi) }}
                    </span>
                </li>
            </ul>

            <div class="d-flex justify-content-between">
                <a href="{{ route('destinasi.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
                <a href="{{ route('destinasi.edit', $destinasi->id) }}" class="btn btn-warning text-white">
                    <i class="bi bi-pencil-square"></i> Edit
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
