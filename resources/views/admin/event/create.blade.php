@extends('layouts.admin')

@section('title', 'Tambah Event')

@section('content')
<div class="container-fluid mt-4">
    <div class="mx-auto" style="max-width: 800px;">
        <div class="card border-0 shadow-lg rounded-4" style="background: linear-gradient(135deg, #FDF5E6, #F5F5DC); backdrop-filter: blur(15px); border: 1px solid rgba(139, 69, 19, 0.15);">
            <div class="card-header bg-transparent border-0 px-4 py-3">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="fw-bold mb-0" style="color: #8B4513;">
                        <i class="bi bi-calendar-event me-2" style="color: #CD853F;"></i> Tambah Event Baru
                    </h4>
                    <a href="{{ route('admin.event.index') }}" class="btn btn-outline-secondary rounded-pill px-3 py-2" style="border-color: #8B4513; color: #8B4513; font-weight: 500; transition: all 0.3s ease;">
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

                {{-- Form --}}
                <form action="{{ route('admin.event.store') }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                    @csrf

                    <div class="mb-3">
                        <label for="judul" class="form-label fw-semibold" style="color: #8B4513;">Judul Event <span class="text-danger">*</span></label>
                        <input type="text" name="judul" id="judul" class="form-control rounded-3" value="{{ old('judul') }}" required 
                               style="border: 2px solid #DEB887; background: rgba(255, 255, 255, 0.8); transition: all 0.3s ease;"
                               placeholder="Masukkan judul event">
                    </div>

                    <div class="mb-3">
                        <label for="deskripsi" class="form-label fw-semibold" style="color: #8B4513;">Deskripsi <span class="text-danger">*</span></label>
                        <textarea name="deskripsi" id="deskripsi" rows="4" class="form-control rounded-3" required 
                                  style="border: 2px solid #DEB887; background: rgba(255, 255, 255, 0.8); transition: all 0.3s ease;"
                                  placeholder="Jelaskan detail event">{{ old('deskripsi') }}</textarea>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="tanggal_mulai" class="form-label fw-semibold" style="color: #8B4513;">Tanggal Mulai <span class="text-danger">*</span></label>
                            <input type="date" name="tanggal_mulai" id="tanggal_mulai" class="form-control rounded-3" value="{{ old('tanggal_mulai') }}" required 
                                   style="border: 2px solid #DEB887; background: rgba(255, 255, 255, 0.8); transition: all 0.3s ease;">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="tanggal_berakhir" class="form-label fw-semibold" style="color: #8B4513;">Tanggal Berakhir (Opsional)</label>
                            <input type="date" name="tanggal_berakhir" id="tanggal_berakhir" class="form-control rounded-3" value="{{ old('tanggal_berakhir') }}"
                                   style="border: 2px solid #DEB887; background: rgba(255, 255, 255, 0.8); transition: all 0.3s ease;">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="lokasi" class="form-label fw-semibold" style="color: #8B4513;">Lokasi <span class="text-danger">*</span></label>
                            <input type="text" name="lokasi" id="lokasi" class="form-control rounded-3" value="{{ old('lokasi') }}" required 
                                   style="border: 2px solid #DEB887; background: rgba(255, 255, 255, 0.8); transition: all 0.3s ease;"
                                   placeholder="Tempat pelaksanaan event">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="penyelenggara" class="form-label fw-semibold" style="color: #8B4513;">Penyelenggara</label>
                            <input type="text" name="penyelenggara" id="penyelenggara" class="form-control rounded-3" value="{{ old('penyelenggara') }}"
                                   style="border: 2px solid #DEB887; background: rgba(255, 255, 255, 0.8); transition: all 0.3s ease;"
                                   placeholder="Nama penyelenggara event">
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="url_gambar_acara" class="form-label fw-semibold" style="color: #8B4513;">Gambar Event</label>
                        <div class="input-group">
                            <input type="file" name="url_gambar_acara" id="url_gambar_acara" class="form-control rounded-3" accept="image/*"
                                   style="border: 2px solid #DEB887; background: rgba(255, 255, 255, 0.8); transition: all 0.3s ease;">
                            <span class="input-group-text rounded-end" style="background: #DEB887; border: 2px solid #DEB887; color: #8B4513;">
                                <i class="bi bi-image"></i>
                            </span>
                        </div>
                        <small class="text-muted" style="color: #8B4513 !important;">Format: JPG, PNG, GIF. Maksimal 2MB</small>
                    </div>

                    <div class="d-flex justify-content-end gap-3 mt-4 pt-3" style="border-top: 1px solid rgba(139, 69, 19, 0.1);">
                        <a href="{{ route('admin.event.index') }}" class="btn btn-outline-secondary rounded-pill px-4 py-2" 
                           style="border: 2px solid #8B4513; color: #8B4513; font-weight: 600; transition: all 0.3s ease;">
                            <i class="bi bi-x-circle me-1"></i> Batal
                        </a>
                        <button type="submit" class="btn rounded-pill px-4 py-2 shadow-sm" 
                                style="background: linear-gradient(135deg, #8B4513, #A0522D); border: none; color: white; font-weight: 600; transition: all 0.3s ease;">
                            <i class="bi bi-save me-1"></i> Simpan Event
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