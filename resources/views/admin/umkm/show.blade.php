@extends('layouts.admin')

@section('title', 'Detail UMKM')

@section('content')
<div class="container-fluid mt-4">
    <div class="mx-auto" style="max-width: 800px;">
        <div class="card shadow-sm border-0 rounded-4" style="background: rgba(255,255,255,0.95); backdrop-filter: blur(10px); border: 1px solid rgba(139, 69, 19, 0.1);">
            <div class="card-header rounded-top-4 px-4 py-3 d-flex justify-content-between align-items-center" style="background: linear-gradient(135deg, #8B4513, #A0522D); color: white;">
                <h5 class="mb-0 fw-semibold">
                    <i class="bi bi-info-circle me-2"></i>Detail UMKM
                </h5>
                <a href="{{ route('admin.umkm.index') }}" class="btn btn-sm rounded-pill" style="border: 2px solid white; color: white; font-weight: 600; transition: all 0.3s ease;">
                    ← Kembali
                </a>
            </div>

            <div class="card-body px-4">

                <div class="mb-4 text-center">
                    @if ($umkm->url_gambar_umkm)
                        <img src="{{ asset('storage/' . $umkm->url_gambar_umkm) }}" alt="Gambar UMKM" class="img-fluid rounded shadow-sm" style="max-height: 300px; border: 3px solid #DEB887;">
                    @else
                        <p class="text-muted fst-italic" style="color: #8B4513 !important;">Belum ada gambar untuk UMKM ini.</p>
                    @endif
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label fw-semibold" style="color: #8B4513;">Nama Usaha</label>
                        <p class="form-control-plaintext" style="background: #F5F5DC; border: 1px solid #DEB887; border-radius: 8px; padding: 0.75rem; color: #8B4513; font-weight: 600;">{{ $umkm->nama_usaha }}</p>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold" style="color: #8B4513;">Narahubung</label>
                        <p class="form-control-plaintext" style="background: #F5F5DC; border: 1px solid #DEB887; border-radius: 8px; padding: 0.75rem; color: #8B4513; font-weight: 600;">{{ $umkm->narahubung }}</p>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold" style="color: #8B4513;">Deskripsi Layanan</label>
                    <div class="border rounded-3 p-3" style="background: #F5F5DC; border: 1px solid #DEB887 !important; color: #6b7280; line-height: 1.6;">
                        {{ $umkm->deskripsi_layanan }}
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label fw-semibold" style="color: #8B4513;">Nomor Telepon</label>
                        <p class="form-control-plaintext" style="background: #F5F5DC; border: 1px solid #DEB887; border-radius: 8px; padding: 0.75rem; color: #8B4513; font-weight: 600;">{{ $umkm->nomor_telepon }}</p>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold" style="color: #8B4513;">Alamat UMKM</label>
                        <p class="form-control-plaintext" style="background: #F5F5DC; border: 1px solid #DEB887; border-radius: 8px; padding: 0.75rem; color: #8B4513; font-weight: 600;">{{ $umkm->alamat_umkm }}</p>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label fw-semibold" style="color: #8B4513;">Kategori</label>
                        <span class="badge rounded-pill px-3 py-1" style="background: linear-gradient(135deg, #8B4513, #A0522D); color: white; font-weight: 600;">
                            {{ $umkm->category->nama_kategori ?? 'Tidak ada' }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.card-header .btn:hover {
    background: white !important;
    color: #8B4513 !important;
    border-color: white !important;
}

.card {
    transition: all 0.3s ease;
}

.card:hover {
    transform: translateY(-3px);
    box-shadow: 0 15px 35px rgba(139, 69, 19, 0.15) !important;
}

.badge {
    transition: all 0.3s ease;
}

.badge:hover {
    transform: scale(1.05);
}

.form-control-plaintext {
    transition: all 0.3s ease;
}

.form-control-plaintext:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(139, 69, 19, 0.1);
}
</style>
@endsection
