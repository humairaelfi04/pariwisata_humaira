@extends('layouts.admin')

@section('title', 'Tambah UMKM')

@section('content')
<div class="container-fluid mt-4">
    <div class="mx-auto" style="max-width: 800px;">
        <div class="card border-0 shadow-lg rounded-4" style="background: linear-gradient(135deg, #FDF5E6, #F5F5DC); backdrop-filter: blur(15px); border: 1px solid rgba(139, 69, 19, 0.15);">
            <div class="card-header bg-transparent border-0 px-4 py-3">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="fw-bold mb-0" style="color: #8B4513;">
                        <i class="bi bi-shop me-2" style="color: #CD853F;"></i> Tambah UMKM Baru
                    </h4>
                    <a href="{{ route('admin.umkm.index') }}" class="btn btn-outline-secondary rounded-pill px-3 py-2" style="border-color: #8B4513; color: #8B4513; font-weight: 500; transition: all 0.3s ease;">
                        <i class="bi bi-arrow-left me-1"></i> Kembali
                    </a>
                </div>
            </div>

            <div class="card-body px-4 py-4">
                {{-- Alert Error --}}
                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show shadow-sm rounded-3" role="alert" style="background: rgba(220, 53, 69, 0.1); border: 1px solid rgba(220, 53, 69, 0.2); color: #721c24;">
                        <strong>Perhatian!</strong> Silakan perbaiki input berikut:
                        <ul class="mb-0 mt-2">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                <form action="{{ route('admin.umkm.store') }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                    @csrf

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="nama_usaha" class="form-label fw-semibold" style="color: #8B4513;">Nama Usaha <span class="text-danger">*</span></label>
                            <input type="text" name="nama_usaha" id="nama_usaha" class="form-control rounded-3" required 
                                   style="border: 2px solid #DEB887; background: rgba(255, 255, 255, 0.8); transition: all 0.3s ease;"
                                   placeholder="Masukkan nama usaha">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="narahubung" class="form-label fw-semibold" style="color: #8B4513;">Narahubung <span class="text-danger">*</span></label>
                            <input type="text" name="narahubung" id="narahubung" class="form-control rounded-3" required 
                                   style="border: 2px solid #DEB887; background: rgba(255, 255, 255, 0.8); transition: all 0.3s ease;"
                                   placeholder="Nama narahubung">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="nomor_telepon" class="form-label fw-semibold" style="color: #8B4513;">Nomor Telepon <span class="text-danger">*</span></label>
                            <input type="text" name="nomor_telepon" id="nomor_telepon" class="form-control rounded-3" required 
                                   style="border: 2px solid #DEB887; background: rgba(255, 255, 255, 0.8); transition: all 0.3s ease;"
                                   placeholder="08xxxxxxxxxx">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="category_id" class="form-label fw-semibold" style="color: #8B4513;">Kategori <span class="text-danger">*</span></label>
                            <select name="category_id" id="category_id" class="form-select rounded-3" required 
                                    style="border: 2px solid #DEB887; background: rgba(255, 255, 255, 0.8); transition: all 0.3s ease;">
                                <option value="">-- Pilih Kategori --</option>
                                @foreach ($categories as $kategori)
                                    <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="alamat_umkm" class="form-label fw-semibold" style="color: #8B4513;">Alamat UMKM <span class="text-danger">*</span></label>
                        <textarea name="alamat_umkm" id="alamat_umkm" rows="3" class="form-control rounded-3" required 
                                  style="border: 2px solid #DEB887; background: rgba(255, 255, 255, 0.8); transition: all 0.3s ease;"
                                  placeholder="Masukkan alamat lengkap UMKM"></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="deskripsi_layanan" class="form-label fw-semibold" style="color: #8B4513;">Deskripsi Layanan <span class="text-danger">*</span></label>
                        <textarea name="deskripsi_layanan" id="deskripsi_layanan" rows="4" class="form-control rounded-3" required 
                                  style="border: 2px solid #DEB887; background: rgba(255, 255, 255, 0.8); transition: all 0.3s ease;"
                                  placeholder="Jelaskan layanan yang ditawarkan UMKM"></textarea>
                    </div>

                    <div class="mb-4">
                        <label for="url_gambar_umkm" class="form-label fw-semibold" style="color: #8B4513;">Gambar UMKM</label>
                        <div class="input-group">
                            <input type="file" name="url_gambar_umkm" id="url_gambar_umkm" class="form-control rounded-3" accept="image/*"
                                   style="border: 2px solid #DEB887; background: rgba(255, 255, 255, 0.8); transition: all 0.3s ease;">
                            <span class="input-group-text rounded-end" style="background: #DEB887; border: 2px solid #DEB887; color: #8B4513;">
                                <i class="bi bi-image"></i>
                            </span>
                        </div>
                        <small class="text-muted" style="color: #8B4513 !important;">Format: JPG, PNG, GIF. Maksimal 2MB</small>
                    </div>

                    <div class="d-flex justify-content-end gap-3 mt-4 pt-3" style="border-top: 1px solid rgba(139, 69, 19, 0.1);">
                        <a href="{{ route('admin.umkm.index') }}" class="btn btn-outline-secondary rounded-pill px-4 py-2" 
                           style="border: 2px solid #8B4513; color: #8B4513; font-weight: 600; transition: all 0.3s ease;">
                            <i class="bi bi-x-circle me-1"></i> Batal
                        </a>
                        <button type="submit" class="btn rounded-pill px-4 py-2 shadow-sm" 
                                style="background: linear-gradient(135deg, #8B4513, #A0522D); border: none; color: white; font-weight: 600; transition: all 0.3s ease;">
                            <i class="bi bi-save me-1"></i> Simpan UMKM
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
    box-shadow: 0 0 0 0.25rem rgba(139, 69, 19, 0.15) !important;
    background: white !important;
    transform: translateY(-1px);
}

.btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(139, 69, 19, 0.25) !important;
}

.btn-outline-secondary:hover {
    background: linear-gradient(135deg, #8B4513, #A0522D) !important;
    color: white !important;
    border-color: transparent !important;
}

.card {
    transition: all 0.3s ease;
}

.card:hover {
    transform: translateY(-3px);
    box-shadow: 0 20px 40px rgba(139, 69, 19, 0.15) !important;
}

.form-label {
    margin-bottom: 0.5rem;
    font-size: 0.9rem;
}

.input-group-text {
    transition: all 0.3s ease;
}

.input-group:focus-within .input-group-text {
    background: #A0522D !important;
    border-color: #A0522D !important;
    color: white !important;
}

.alert {
    border-radius: 12px;
}

.alert-danger {
    background: linear-gradient(135deg, rgba(220, 53, 69, 0.1), rgba(220, 53, 69, 0.05));
}

@media (max-width: 768px) {
    .card-body {
        padding: 1.5rem;
    }
    
    .d-flex.justify-content-end {
        flex-direction: column;
    }
    
    .btn {
        width: 100%;
        margin-bottom: 0.5rem;
    }
}
</style>
@endsection