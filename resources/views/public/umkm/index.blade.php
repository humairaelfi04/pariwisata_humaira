@extends('layouts.frontend')

@section('content')
<section class="py-5" style="background-color: #fffaf4;">
    <div class="container">
        <h2 class="text-center fw-bold mb-4 text-secondary-emphasis">
            🏪 UMKM Lokal Unggulan
        </h2>

        {{-- Form Pencarian & Filter --}}
        <form method="GET" action="{{ route('public.umkm.index') }}" class="row g-2 mb-5 justify-content-center">
            <div class="col-md-4">
                <input type="text" name="search" class="form-control form-control-lg shadow-sm rounded-pill"
                    placeholder="🔍 Cari UMKM..." value="{{ request('search') }}">
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

        {{-- Grid UMKM --}}
        @if ($umkm->isEmpty())
            <div class="text-center py-5">
                <h5 class="text-muted">😢 Belum ada UMKM ditemukan.</h5>
            </div>
        @else
            <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4 g-4">
                @foreach($umkm as $item)
                    <div class="col">
                        <div class="card h-100 border-0 shadow-sm rounded-4" style="background-color: #fffefc;">
                            @if($item->url_gambar_umkm)
                                <img src="{{ asset('storage/' . $item->url_gambar_umkm) }}"
                                     alt="Gambar UMKM" class="card-img-top rounded-top-4" style="height: 180px; object-fit: cover;">
                            @endif
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title text-secondary-emphasis fw-semibold">
                                    {{ $item->nama_usaha }}
                                </h5>
                                <p class="card-text text-muted small mb-3">
                                    {{ Str::limit($item->deskripsi_layanan, 80) }}
                                </p>
                                <a href="{{ route('public.umkm.show', $item->id) }}"
                                   class="btn btn-sm rounded-pill mt-auto"
                                   style="border: 1px solid #f5dbc4; color: #5c3d2e;">
                                    Lihat Detail
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Pagination --}}
            <div class="d-flex justify-content-center mt-5">
                {{ $umkm->withQueryString()->links() }}
            </div>
        @endif
    </div>
</section>
@endsection
