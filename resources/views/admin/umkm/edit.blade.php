@extends('layouts.admin')

@section('title', 'Edit UMKM')

@section('content')
<div class="container-fluid mt-4">
    <div class="mx-auto" style="max-width: 800px;">
        <div class="card shadow-sm border-0 rounded-4" style="background: rgba(255,255,255,0.95); backdrop-filter: blur(10px); border: 1px solid rgba(139, 69, 19, 0.1);">
            <div class="card-header rounded-top-4 px-4 py-3 d-flex justify-content-between align-items-center" style="background: linear-gradient(135deg, #8B4513, #A0522D); color: white;">
                <h5 class="mb-0 fw-semibold"><i class="bi bi-pencil-square me-2"></i>Edit Data UMKM</h5>
                <a href="{{ route('admin.umkm.index') }}" class="btn btn-sm rounded-pill" style="border: 2px solid white; color: white; font-weight: 600; transition: all 0.3s ease;">
                    ← Kembali
                </a>
            </div>

            <div class="card-body px-4">
                {{-- Alert Error --}}
                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show shadow-sm" role="alert" style="background: rgba(239, 68, 68, 0.1); border: 1px solid rgba(239, 68, 68, 0.2); color: #991b1b;">
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
                            <label class="form-label fw-semibold" style="color: #8B4513;">Nama Usaha</label>
                            <input type="text" name="nama_usaha" class="form-control rounded-3"
                                   value="{{ old('nama_usaha', $umkm->nama_usaha) }}" required style="border: 1.5px solid #DEB887; background: #F5F5DC; transition: all 0.3s ease;">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold" style="color: #8B4513;">Narahubung</label>
                            <input type="text" name="narahubung" class="form-control rounded-3"
                                   value="{{ old('narahubung', $umkm->narahubung) }}" required style="border: 1.5px solid #DEB887; background: #F5F5DC; transition: all 0.3s ease;">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold" style="color: #8B4513;">Deskripsi Layanan</label>
                        <textarea name="deskripsi_layanan" class="form-control rounded-3" rows="4" required style="border: 1.5px solid #DEB887; background: #F5F5DC; transition: all 0.3s ease;">{{ old('deskripsi_layanan', $umkm->deskripsi_layanan) }}</textarea>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold" style="color: #8B4513;">Nomor Telepon</label>
                            <input type="text" name="nomor_telepon" class="form-control rounded-3"
                                   value="{{ old('nomor_telepon', $umkm->nomor_telepon) }}" required style="border: 1.5px solid #DEB887; background: #F5F5DC; transition: all 0.3s ease;">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold" style="color: #8B4513;">Alamat UMKM</label>
                            <input type="text" name="alamat_umkm" class="form-control rounded-3"
                                   value="{{ old('alamat_umkm', $umkm->alamat_umkm) }}" required style="border: 1.5px solid #DEB887; background: #F5F5DC; transition: all 0.3s ease;">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold" style="color: #8B4513;">Kategori</label>
                        <select name="category_id" class="form-select rounded-3" required style="border: 1.5px solid #DEB887; background: #F5F5DC; transition: all 0.3s ease;">
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
                        <label class="form-label fw-semibold" style="color: #8B4513;">Gambar UMKM (Opsional)</label>
                        <input type="file" name="url_gambar_umkm" class="form-control rounded-3" style="border: 1.5px solid #DEB887; background: #F5F5DC; transition: all 0.3s ease;">
                        @if ($umkm->url_gambar_umkm)
                            <div class="mt-2">
                                <img src="{{ asset('storage/' . $umkm->url_gambar_umkm) }}" alt="Gambar UMKM" width="120" class="rounded shadow-sm" style="border: 2px solid #DEB887;">
                            </div>
                        @endif
                    </div>

                    <div class="d-flex justify-content-end mt-4">
                        <button type="submit" class="btn px-4 py-2 rounded-pill shadow-sm" style="background: linear-gradient(135deg, #8B4513, #A0522D); border: none; color: white; font-weight: 600; transition: all 0.3s ease;">
                            <i class="bi bi-save me-1"></i> Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
.form-control:focus, .form-select:focus {
    border-color: #A0522D !important;
    box-shadow: 0 0 0 0.2rem rgba(139, 69, 19, 0.25) !important;
    background: white !important;
}

.btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(139, 69, 19, 0.3) !important;
}

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
</style>
@endsection