@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h1>Detail UMKM</h1>

    <div class="card">
        <div class="card-body">
            <h3 class="card-title">{{ $umkm->nama_usaha }}</h3>

            <p><strong>Deskripsi Layanan:</strong> {{ $umkm->deskripsi_layanan }}</p>
            <p><strong>Narahubung:</strong> {{ $umkm->narahubung }}</p>
            <p><strong>Nomor Telepon:</strong> {{ $umkm->nomor_telepon }}</p>
            <p><strong>Alamat:</strong> {{ $umkm->alamat_umkm }}</p>

            @if(isset($umkm->status_persetujuan))
                <p><strong>Status Persetujuan:</strong> {{ ucfirst($umkm->status_persetujuan) }}</p>
            @endif

            @if($umkm->category)
                <p><strong>Kategori:</strong> {{ $umkm->category->nama_kategori }}</p>
            @endif
        </div>
    </div>

    <a href="{{ route('admin.umkm.index') }}" class="btn btn-secondary mt-3">Kembali ke Daftar UMKM</a>
</div>
@endsection
