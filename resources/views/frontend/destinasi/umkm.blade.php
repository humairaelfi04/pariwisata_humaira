@extends('layouts.frontend')

@section('title', 'Daftar UMKM Pendukung')

@section('content')
<div class="container py-5">
    <h2 class="mb-4 text-center">Daftar UMKM Pendukung</h2>

    <div class="row mb-4">
        <div class="col-md-6">
            <form action="{{ route('umkm.index') }}" method="GET">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Cari UMKM..." value="{{ request('search') }}">
                    <button class="btn btn-primary" type="submit">Cari</button>
                </div>
            </form>
        </div>
    </div>

    <div class="row">
        @forelse ($umkms as $umkm)
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">{{ $umkm->nama_usaha }}</h5>
                    <p class="card-text">{{ Str::limit($umkm->deskripsi_layanan, 100) }}</p>
                    <ul class="list-unstyled">
                        <li><strong>Narahubung:</strong> {{ $umkm->narahubung }}</li>
                        <li><strong>Telepon:</strong> {{ $umkm->nomor_telepon }}</li>
                        <li><strong>Alamat:</strong> {{ $umkm->alamat_umkm }}</li>
                        <li><strong>Kategori:</strong> {{ $umkm->category->nama_kategori }}</li>
                    </ul>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <div class="alert alert-warning text-center">UMKM belum tersedia.</div>
        </div>
        @endforelse
    </div>
</div>
@endsection
