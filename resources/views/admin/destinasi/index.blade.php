@extends('layouts.admin')

@section('title', 'Manajemen Destinasi')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-success">📍 Daftar Destinasi Wisata</h2>
        <a href="{{ route('destinasi.create') }}" class="btn btn-success shadow-sm">
            <i class="bi bi-plus-circle me-1"></i> Tambah Destinasi
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if ($destinasi->count())
        <div class="row g-4">
            @foreach ($destinasi as $item)
                <div class="col-md-6 col-lg-4">
                    <div class="card shadow-sm h-100 border-0">
                        @if ($item->url_gambar_utama)
                            <img src="{{ asset('images/' . $item->url_gambar_utama) }}" class="card-img-top" alt="{{ $item->nama }}" style="height: 200px; object-fit: cover;">
                        @endif
                        <div class="card-body d-flex flex-column justify-content-between">
                            <div>
                                <h5 class="card-title fw-semibold text-success">{{ $item->nama }}</h5>
                                <p class="card-text text-muted small mb-2">{{ $item->alamat }}</p>
                                <span class="badge bg-secondary">{{ $item->category->nama_kategori ?? 'Tanpa Kategori' }}</span>
                            </div>
                            <div class="mt-3 d-flex justify-content-between">
                                <a href="{{ route('destinasi.show', $item->id) }}" class="btn btn-sm btn-outline-primary">
                                    <i class="bi bi-eye"></i> Detail
                                </a>
                                <a href="{{ route('destinasi.edit', $item->id) }}" class="btn btn-sm btn-outline-warning">
                                    <i class="bi bi-pencil"></i> Edit
                                </a>
                                <form action="{{ route('destinasi.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus destinasi ini?')" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger">
                                        <i class="bi bi-trash"></i> Hapus
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="text-center text-muted mt-5">
            <i class="bi bi-info-circle"></i> Belum ada destinasi wisata yang tersedia.
        </div>
    @endif
</div>
@endsection
