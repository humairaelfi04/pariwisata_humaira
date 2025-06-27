@extends('layouts.admin')

@section('title', 'Edit UMKM')

@section('content')
<div class="container-fluid mt-4">
    <div class="card shadow-sm border-0 rounded-4">
        <div class="card-header bg-warning text-dark rounded-top-4 px-4 py-3 d-flex justify-content-between align-items-center">
            <h5 class="mb-0 fw-semibold"><i class="bi bi-pencil-square me-2"></i>Edit Data UMKM</h5>
            <a href="{{ route('admin.umkm.index') }}" class="btn btn-sm btn-outline-dark rounded-pill">
                ← Kembali
            </a>
        </div>

        <div class="card-body px-4">
            {{-- Alert Error --}}
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show shadow-sm" role="alert">
                    <strong>Perhatian!</strong> Silakan periksa kembali inputan Anda:
                    <ul class="mb-0 mt-2">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            {{-- Form --}}
            <form action="{{ route('admin.umkm.update', $umkm->id) }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Nama Usaha</label>
                        <input type="text" name="nama_usaha" class="form-control rounded-3"
                               value="{{ old('nama_usaha', $umkm->nama_usaha) }}" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Narahubung</label>
                        <input type="text" name="narahubung" class="form-control rounded-3"
                               value="{{ old('narahubung', $umkm->narahubung) }}" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Deskripsi Layanan</label>
                    <textarea name="deskripsi_layanan" class="form-control rounded-3" rows="4" required>{{ old('deskripsi_layanan', $umkm->deskripsi_layanan) }}</textarea>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Nomor Telepon</label>
                        <input type="text" name="nomor_telepon" class="form-control rounded-3"
                               value="{{ old('nomor_telepon', $umkm->nomor_telepon) }}" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Alamat UMKM</label>
                        <input type="text" name="alamat_umkm" class="form-control rounded-3"
                               value="{{ old('alamat_umkm', $umkm->alamat_umkm) }}" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Kategori</label>
                    <select name="category_id" class="form-select rounded-3" required>
                        <option value="">-- Pilih Kategori --</option>
                        @foreach($categories as $kat)
                            <option value="{{ $kat->id }}" {{ old('category_id', $umkm->category_id) == $kat->id ? 'selected' : '' }}>
                                {{ $kat->nama_kategori }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Upload Gambar --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">Gambar UMKM (Opsional)</label>
                    <input type="file" name="url_gambar_umkm" class="form-control rounded-3">
                    @if ($umkm->url_gambar_umkm)
                        <div class="mt-2">
                            <img src="{{ asset('storage/' . $umkm->url_gambar_umkm) }}" alt="Gambar UMKM" width="120" class="rounded shadow-sm">
                        </div>
                    @endif
                </div>

                <div class="d-flex justify-content-end mt-4">
                    <button type="submit" class="btn btn-warning px-4 py-2 rounded-pill shadow-sm">
                        <i class="bi bi-save me-1"></i> Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
