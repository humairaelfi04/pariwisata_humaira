@extends('layouts.admin')

@section('title', 'Detail UMKM')

@section('content')
<div class="container-fluid mt-4">
    <div class="card shadow-sm border-0 rounded-4">
        <div class="card-header bg-light text-dark rounded-top-4 px-4 py-3 d-flex justify-content-between align-items-center">
            <h5 class="mb-0 fw-semibold">
                <i class="bi bi-info-circle me-2"></i>Detail UMKM
            </h5>
            <a href="{{ route('admin.umkm.index') }}" class="btn btn-sm btn-outline-dark rounded-pill">
                ← Kembali
            </a>
        </div>

        <div class="card-body px-4">

            {{-- Gambar UMKM --}}
            <div class="mb-4 text-center">
                @if ($umkm->url_gambar_umkm)
                    <img src="{{ asset('storage/' . $umkm->url_gambar_umkm) }}" alt="Gambar UMKM" class="img-fluid rounded shadow-sm" style="max-height: 300px;">
                @else
                    <p class="text-muted fst-italic">Belum ada gambar untuk UMKM ini.</p>
                @endif
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Nama Usaha</label>
                    <p class="form-control-plaintext">{{ $umkm->nama_usaha }}</p>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Narahubung</label>
                    <p class="form-control-plaintext">{{ $umkm->narahubung }}</p>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Deskripsi Layanan</label>
                <div class="border rounded-3 p-3 bg-light">
                    {{ $umkm->deskripsi_layanan }}
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Nomor Telepon</label>
                    <p class="form-control-plaintext">{{ $umkm->nomor_telepon }}</p>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Alamat UMKM</label>
                    <p class="form-control-plaintext">{{ $umkm->alamat_umkm }}</p>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Status Persetujuan</label>
                    <span class="badge
                        @if($umkm->status_persetujuan == 'approved') bg-success
                        @elseif($umkm->status_persetujuan == 'pending') bg-warning text-dark
                        @else bg-danger
                        @endif
                        rounded-pill px-3 py-1">
                        {{ ucfirst($umkm->status_persetujuan ?? 'pending') }}
                    </span>
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-semibold">Kategori</label>
                    <span class="badge bg-dark text-white rounded-pill px-3 py-1">
                        {{ $umkm->category->nama_kategori ?? 'Tidak ada' }}
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
