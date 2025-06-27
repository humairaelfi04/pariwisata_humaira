@extends('layouts.frontend')

@section('content')
<section class="py-5" style="background-color: #fffaf4;">
    <div class="container">
        <h2 class="text-center fw-bold mb-4 text-secondary-emphasis">
            🧭 Destinasi Wisata Populer
        </h2>

        {{-- Form Pencarian & Filter --}}
        <form method="GET" action="{{ route('home') }}" class="row g-2 mb-5 justify-content-center">
            <div class="col-md-4">
                <input type="text" name="search" class="form-control form-control-lg shadow-sm rounded-pill" placeholder="🔍 Cari destinasi..." value="{{ request('search') }}">
            </div>
            <div class="col-md-3">
                <select name="category" class="form-select form-select-lg shadow-sm rounded-pill">
                    <option value="">🗂️ Semua Kategori</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                            {{ $category->nama_kategori }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <button class="btn w-100 rounded-pill shadow-sm btn-lg"
                    style="background-color: #f5dbc4; color: #5c3d2e;">
                    Cari
                </button>
            </div>
        </form>

        {{-- Grid Destinasi --}}
        <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4 g-4">
            @forelse ($destinations as $destination)
                <div class="col">
                    <div class="card h-100 border-0 shadow-sm rounded-4" style="background-color: #fffefc;">
                        <img src="{{ asset('images/' . $destination->url_gambar_utama) }}"
                            class="card-img-top" alt="{{ $destination->nama }}"
                            style="height: 180px; object-fit: cover; border-radius: 1rem 1rem 0 0;">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title text-secondary-emphasis fw-semibold">{{ $destination->nama }}</h5>
                            <p class="card-text text-muted small mb-3">{{ Str::limit($destination->deskripsi, 80) }}</p>
                            <a href="{{ route('destinasi.show', $destination->id) }}"
                               class="btn btn-sm rounded-pill mt-auto"
                               style="border: 1px solid #f5dbc4; color: #5c3d2e;">
                                Lihat Detail
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <h5 class="text-muted">😢 Tidak ada destinasi ditemukan.</h5>
                </div>
            @endforelse
        </div>

        {{-- Pagination --}}
        @if ($destinations->hasPages())
            <div class="d-flex justify-content-center mt-5">
                <nav>
                    {{ $destinations->links('pagination::bootstrap-5') }}
                </nav>
            </div>
        @endif

    </div>
</section>
@endsection
