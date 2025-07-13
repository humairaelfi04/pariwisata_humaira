@extends('layouts.admin')

@section('title', 'Detail Destinasi')

@section('content')
<div class="mx-auto" style="max-width: 768px;">
    <div class="card border-0 shadow-lg rounded-4" style="background: rgba(255,255,255,0.95); backdrop-filter: blur(10px); border: 1px solid rgba(139, 69, 19, 0.1);">
        <div class="card-header rounded-top-4 px-4 py-3" style="background: linear-gradient(135deg, #8B4513, #A0522D); color: white;">
            <h5 class="mb-0 fw-semibold">
                <i class="fa fa-map-location-dot me-2"></i>Detail Destinasi Wisata
            </h5>
        </div>

        <div class="card-body px-4">
            <h4 class="fw-semibold mb-4" style="color: #8B4513;">
                <i class="fa fa-map-marker-alt me-2"></i>{{ $destinasi->nama }}
            </h4>

            @if ($destinasi->url_gambar_utama)
                <div class="text-center mb-4">
                    <img src="{{ asset('images/' . $destinasi->url_gambar_utama) }}"
                         alt="{{ $destinasi->nama }}"
                         class="img-fluid rounded-4 shadow-lg"
                         style="max-height: 300px; object-fit: cover; width: 100%; border: 3px solid #DEB887;">
                </div>
            @endif

            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label fw-semibold" style="color: #8B4513;">📍 Alamat</label>
                    <p class="form-control-plaintext" style="background: #F5F5DC; border: 1px solid #DEB887; border-radius: 8px; padding: 0.75rem; color: #8B4513; font-weight: 600;">{{ $destinasi->alamat }}</p>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-semibold" style="color: #8B4513;">🎫 Harga Tiket</label>
                    <p class="form-control-plaintext" style="background: #F5F5DC; border: 1px solid #DEB887; border-radius: 8px; padding: 0.75rem; color: #8B4513; font-weight: 600;">Rp{{ number_format($destinasi->harga_tiket, 2, ',', '.') }}</p>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold" style="color: #8B4513;">📝 Deskripsi</label>
                <div class="border rounded-3 p-3" style="background: #F5F5DC; border: 1px solid #DEB887 !important; color: #6b7280; line-height: 1.6;">
                    {{ $destinasi->deskripsi }}
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label fw-semibold" style="color: #8B4513;">⏰ Jam Operasional</label>
                    <p class="form-control-plaintext" style="background: #F5F5DC; border: 1px solid #DEB887; border-radius: 8px; padding: 0.75rem; color: #8B4513; font-weight: 600;">{{ $destinasi->jam_operasional }}</p>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-semibold" style="color: #8B4513;">🗂️ Kategori</label>
                    <span class="badge rounded-pill px-3 py-2" style="background: linear-gradient(135deg, #8B4513, #A0522D); color: white; font-weight: 600; font-size: 0.9rem;">
                        {{ $destinasi->category->nama_kategori }}
                    </span>
                </div>
            </div>

            <div class="d-flex justify-content-between mt-4">
                <a href="{{ route('destinasi.index') }}" class="btn rounded-pill shadow-sm" style="border: 2px solid #8B4513; color: #8B4513; font-weight: 600; transition: all 0.3s ease;">
                    <i class="fa fa-arrow-left me-1"></i> Kembali
                </a>
                <a href="{{ route('destinasi.edit', $destinasi->id) }}" class="btn rounded-pill shadow-sm" style="background: linear-gradient(135deg, #8B4513, #A0522D); border: none; color: white; font-weight: 600; transition: all 0.3s ease;">
                    <i class="fa fa-pen-to-square me-1"></i> Edit
                </a>
            </div>
        </div>
    </div>
</div>

<style>
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

.btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(139, 69, 19, 0.3) !important;
}

.btn:first-child:hover {
    background: #8B4513 !important;
    color: white !important;
    border-color: #8B4513 !important;
}

.btn:last-child:hover {
    background: linear-gradient(135deg, #A0522D, #8B4513) !important;
}
</style>
@endsection
