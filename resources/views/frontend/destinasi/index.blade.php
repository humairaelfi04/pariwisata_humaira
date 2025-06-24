@extends('layouts.frontend')

@section('content')
<div class="container py-4">
    <h2 class="mb-4">Daftar Destinasi Wisata</h2>

    <form method="GET" action="{{ route('home') }}" class="row mb-3">
        <div class="col-md-4">
            <input type="text" name="search" class="form-control" placeholder="Cari destinasi..." value="{{ request('search') }}">
        </div>
        <div class="col-md-4">
            <select name="category" class="form-select">
                <option value="">-- Semua Kategori --</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                        {{ $category->nama_kategori }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-md-4">
            <button class="btn btn-primary w-100">Cari</button>
        </div>
    </form>

    <div class="row">
        @forelse ($destinations as $destination)
            <div class="col-md-3 mb-4">
    <div class="card h-100">
        <img src="{{ asset('images/' . $destination->url_gambar_utama) }}" class="card-img-top" alt="{{ $destination->nama }}">
        <div class="card-body">
            <h5 class="card-title">{{ $destination->nama }}</h5>
            <p class="card-text">{{ $destination->deskripsi }}</p>
            <a href="{{ route('destinasi.show', $destination->id) }}" class="btn btn-primary">Lihat Detail</a>
        </div>
    </div>
</div>

        @empty
            <p>Tidak ada destinasi ditemukan.</p>
        @endforelse
    </div>

    <div class="mt-3">
        {{ $destinations->links() }}
    </div>
</div>
@endsection
