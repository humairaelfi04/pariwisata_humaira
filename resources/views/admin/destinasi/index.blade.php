@extends('layouts.admin')

@section('title', 'Manajemen Destinasi')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="fw-semibold text-dark mb-0">📍 Daftar Destinasi</h4>
    <a href="{{ route('destinasi.create') }}" class="btn btn-sm btn-warning rounded-pill">
        <i class="fa fa-plus me-1"></i> Tambah Destinasi
    </a>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fa fa-check-circle me-2"></i>{{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

@if ($destinasi->count())
    <div class="row g-4">
        @foreach ($destinasi as $item)
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 border-0 shadow-sm rounded-4">
                    @if ($item->url_gambar_utama)
                        <img src="{{ asset('images/' . $item->url_gambar_utama) }}" class="card-img-top rounded-top-4" alt="{{ $item->nama }}" style="height: 200px; object-fit: cover;">
                    @endif
                    <div class="card-body d-flex flex-column">
                        <h5 class="fw-semibold text-dark">{{ $item->nama }}</h5>
                        <p class="text-muted small mb-2">{{ $item->alamat }}</p>
                        <span class="badge rounded-pill bg-light text-secondary mb-3">
                            {{ $item->category->nama_kategori ?? 'Tanpa Kategori' }}
                        </span>

                        <div class="d-flex justify-content-between mt-auto">
                            <a href="{{ route('destinasi.show', $item->id) }}" class="btn btn-sm btn-outline-dark rounded-pill">
                                <i class="fa fa-eye"></i>
                            </a>
                            <a href="{{ route('destinasi.edit', $item->id) }}" class="btn btn-sm btn-outline-warning rounded-pill">
                                <i class="fa fa-edit"></i>
                            </a>
                            <form action="{{ route('destinasi.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Hapus destinasi ini?')" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger rounded-pill">
                                    <i class="fa fa-trash"></i>
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
        <i class="fa fa-info-circle me-1"></i> Belum ada destinasi wisata yang tersedia.
    </div>
@endif
@endsection
