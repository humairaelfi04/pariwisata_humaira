@extends('layouts.admin')

@section('title', 'Tambah Kategori')

@section('content')
<div class="container-fluid mt-4">
    <div class="mx-auto" style="max-width: 600px;">
        <div class="card border-0 shadow-lg rounded-4" style="background: linear-gradient(135deg, #FDF5E6, #F5F5DC); backdrop-filter: blur(15px); border: 1px solid rgba(139, 69, 19, 0.15);">
            <div class="card-header bg-transparent border-0 px-4 py-3">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="fw-bold mb-0" style="color: white;">
                        <i class="bi bi-plus-circle me-2" style="color: white;"></i> Tambah Kategori Baru
                    </h4>
                    <a href="{{ route('admin.kategori.index') }}" class="btn btn-outline-secondary rounded-pill px-3 py-2" 
                       style="border-color: #8B4513; color: #8B4513; font-weight: 500; transition: all 0.3s ease;">
                        <i class="bi bi-arrow-left me-1"></i> Kembali
                    </a>
                </div>
            </div>

            <div class="card-body px-4 py-4">
                {{-- Alert Error --}}
                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show shadow-sm rounded-3" role="alert" 
                         style="background: rgba(220, 53, 69, 0.1); border: 1px solid rgba(220, 53, 69, 0.2); color: #721c24;">
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
                <form action="{{ route('admin.kategori.store') }}" method="POST" class="needs-validation" novalidate>
                    @csrf

                    <div class="mb-4">
                        <label for="nama_kategori" class="form-label fw-semibold" style="color: #8B4513;">Nama Kategori <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text rounded-start" style="background: #DEB887; border: 2px solid #DEB887; color: #8B4513;">
                                <i class="bi bi-tag"></i>
                            </span>
                            <input type="text" name="nama_kategori" id="nama_kategori"
                                class="form-control rounded-end" value="{{ old('nama_kategori') }}" required 
                                style="border: 2px solid #DEB887; background: rgba(255, 255, 255, 0.8); transition: all 0.3s ease;"
                                placeholder="Masukkan nama kategori">
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="jenis_kategori" class="form-label fw-semibold" style="color: #8B4513;">Jenis Kategori <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text rounded-start" style="background: #DEB887; border: 2px solid #DEB887; color: #8B4513;">
                                <i class="bi bi-list-ul"></i>
                            </span>
                            <select name="jenis_kategori" id="jenis_kategori" class="form-select rounded-end" required 
                                    style="border: 2px solid #DEB887; background: rgba(255, 255, 255, 0.8); transition: all 0.3s ease;">
                                <option value="">-- Pilih Jenis Kategori --</option>
                                <option value="destinasi" {{ old('jenis_kategori') == 'destinasi' ? 'selected' : '' }}>
                                    <i class="bi bi-geo-alt"></i> Destinasi Wisata
                                </option>
                                <option value="umkm" {{ old('jenis_kategori') == 'umkm' ? 'selected' : '' }}>
                                    <i class="bi bi-shop"></i> UMKM
                                </option>
                                <option value="acara" {{ old('jenis_kategori') == 'acara' ? 'selected' : '' }}>
                                    <i class="bi bi-calendar-event"></i> Acara/Event
                                </option>
                            </select>
                        </div>
                        <small class="text-muted" style="color: #8B4513 !important;">Pilih jenis kategori yang sesuai dengan konten</small>
                    </div>

                    <div class="d-flex justify-content-end gap-3 mt-4 pt-3" style="border-top: 1px solid rgba(139, 69, 19, 0.1);">
                        <a href="{{ route('admin.kategori.index') }}" class="btn btn-outline-secondary rounded-pill px-4 py-2" 
                           style="border: 2px solid #8B4513; color: #8B4513; font-weight: 600; transition: all 0.3s ease;">
                            <i class="bi bi-x-circle me-1"></i> Batal
                        </a>
                        <button type="submit" class="btn rounded-pill px-4 py-2 shadow-sm" 
                                style="background: linear-gradient(135deg, #8B4513, #A0522D); border: none; color: white; font-weight: 600; transition: all 0.3s ease;">
                            <i class="bi bi-save me-1"></i> Simpan Kategori
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