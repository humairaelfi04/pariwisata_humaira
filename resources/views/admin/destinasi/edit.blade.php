@extends('layouts.admin')

@section('title', 'Edit Destinasi')

@section('content')
<div class="mx-auto" style="max-width: 720px;">
    <div class="card border-0 shadow-sm rounded-4" style="background: rgba(255,255,255,0.95); backdrop-filter: blur(10px); border: 1px solid rgba(139, 69, 19, 0.1);">
        <div class="card-body">
            <h4 class="mb-4 fw-semibold" style="color: #8B4513;"><i class="fa fa-pen-to-square me-2"></i>Edit Destinasi Wisata</h4>

            @if ($errors->any())
                <div class="alert alert-danger rounded-3" style="background: rgba(239, 68, 68, 0.1); border: 1px solid rgba(239, 68, 68, 0.2); color: #991b1b;">
                    <ul class="mb-0 small">
                        @foreach ($errors->all() as $error)
                            <li><i class="fa fa-exclamation-circle me-2"></i>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('destinasi.update', $destinasi->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label fw-medium" style="color: #8B4513;">Nama Destinasi</label>
                    <input type="text" name="nama" class="form-control rounded-3" value="{{ old('nama', $destinasi->nama) }}" required style="border: 1.5px solid #DEB887; background: #F5F5DC; transition: all 0.3s ease;">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-medium" style="color: #8B4513;">Deskripsi</label>
                    <textarea name="deskripsi" rows="4" class="form-control rounded-3" style="border: 1.5px solid #DEB887; background: #F5F5DC; transition: all 0.3s ease;">{{ old('deskripsi', $destinasi->deskripsi) }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-medium" style="color: #8B4513;">Alamat</label>
                    <input type="text" name="alamat" class="form-control rounded-3" value="{{ old('alamat', $destinasi->alamat) }}" style="border: 1.5px solid #DEB887; background: #F5F5DC; transition: all 0.3s ease;">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-medium" style="color: #8B4513;">Harga Tiket</label>
                    <div class="input-group">
                        <span class="input-group-text border-0 rounded-start" style="background: #DEB887; color: #8B4513; font-weight: 600;">Rp</span>
                        <input type="number" name="harga_tiket" step="0.01" class="form-control rounded-end" value="{{ old('harga_tiket', $destinasi->harga_tiket) }}" style="border: 1.5px solid #DEB887; background: #F5F5DC; transition: all 0.3s ease;">
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-medium" style="color: #8B4513;">Jam Operasional</label>
                    <input type="text" name="jam_operasional" class="form-control rounded-3" value="{{ old('jam_operasional', $destinasi->jam_operasional) }}" placeholder="Contoh: 08.00 - 17.00" style="border: 1.5px solid #DEB887; background: #F5F5DC; transition: all 0.3s ease;">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-medium" style="color: #8B4513;">Status Publikasi</label>
                    <select name="status_publikasi" class="form-select rounded-3" style="border: 1.5px solid #DEB887; background: #F5F5DC; transition: all 0.3s ease;">
                        <option value="draft" {{ old('status_publikasi', $destinasi->status_publikasi) == 'draft' ? 'selected' : '' }}>Draft</option>
                        <option value="published" {{ old('status_publikasi', $destinasi->status_publikasi) == 'published' ? 'selected' : '' }}>Published</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-medium" style="color: #8B4513;">Kategori</label>
                    <select name="category_id" class="form-select rounded-3" style="border: 1.5px solid #DEB887; background: #F5F5DC; transition: all 0.3s ease;">
                        @foreach ($category as $kat)
                            <option value="{{ $kat->id }}" {{ old('category_id', $destinasi->category_id) == $kat->id ? 'selected' : '' }}>
                                {{ $kat->nama_kategori }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label class="form-label fw-medium" style="color: #8B4513;">Gambar Utama</label>
                    <input type="file" name="url_gambar_utama" class="form-control rounded-3" style="border: 1.5px solid #DEB887; background: #F5F5DC; transition: all 0.3s ease;">
                    @if (!empty($destinasi->url_gambar_utama))
                        <div class="mt-2">
                            <img src="{{ asset('storage/' . $destinasi->url_gambar_utama) }}" alt="Gambar" class="rounded shadow-sm" style="max-width: 200px;">
                        </div>
                    @endif
                </div>

                <div class="d-flex justify-content-between align-items-center">
                    <a href="{{ route('destinasi.index') }}" class="btn btn-outline-secondary rounded-pill" style="border: 2px solid #8B4513; color: #8B4513; font-weight: 600; transition: all 0.3s ease;">
                        <i class="fa fa-arrow-left me-1"></i> Kembali
                    </a>
                    <button type="submit" class="btn rounded-pill shadow-sm" style="background: linear-gradient(135deg, #8B4513, #A0522D); border: none; color: white; font-weight: 600; padding: 0.75rem 1.5rem; transition: all 0.3s ease;">
                        <i class="fa fa-floppy-disk me-1"></i> Simpan Perubahan
                    </button>
                </div>
            </form>
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
    box-shadow: 0 15px 35px rgba(139, 69, 19, 0.15) !important;
}
</style>
@endsection