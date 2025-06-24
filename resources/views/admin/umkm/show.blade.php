@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold mb-0">Detail UMKM</h2>
        <a href="{{ route('admin.umkm.index') }}" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left"></i> Kembali ke Daftar
        </a>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-header bg-success text-white">
            <h5 class="mb-0">{{ $umkm->nama_usaha }}</h5>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <label class="fw-semibold">Deskripsi Layanan:</label>
                <p class="text-muted mb-1">{{ $umkm->deskripsi_layanan }}</p>
            </div>

            <div class="mb-3">
                <label class="fw-semibold">Narahubung:</label>
                <p class="mb-1">{{ $umkm->narahubung }}</p>
            </div>

            <div class="mb-3">
                <label class="fw-semibold">Nomor Telepon:</label>
                <p class="mb-1">{{ $umkm->nomor_telepon }}</p>
            </div>

            <div class="mb-3">
                <label class="fw-semibold">Alamat:</label>
                <p class="mb-1">{{ $umkm->alamat_umkm }}</p>
            </div>

            <div class="mb-3">
                <label class="fw-semibold">Status Persetujuan:</label>
                <span class="badge bg-{{ $umkm->status_persetujuan == 'approved' ? 'success' : ($umkm->status_persetujuan == 'pending' ? 'warning' : 'danger') }}">
                    {{ ucfirst($umkm->status_persetujuan) }}
                </span>
            </div>

            @if($umkm->category)
                <div class="mb-3">
                    <label class="fw-semibold">Kategori:</label>
                    <span class="badge bg-primary">{{ $umkm->category->nama_kategori }}</span>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
