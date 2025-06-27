@extends('layouts.admin')

@section('title', 'Edit Destinasi')

@section('content')
<div class="mx-auto" style="max-width: 720px;">
    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-body">
            <h4 class="mb-4 fw-semibold text-warning"><i class="fa fa-pen-to-square me-2"></i>Edit Destinasi Wisata</h4>

            @if ($errors->any())
                <div class="alert alert-danger rounded-3">
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
                    <label class="form-label fw-medium">Nama Destinasi</label>
                    <input type="text" name="nama" class="form-control rounded-3" value="{{ old('nama', $destinasi->nama) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-medium">Deskripsi</label>
                    <textarea name="deskripsi" rows="4" class="form-control rounded-3">{{ old('deskripsi', $destinasi->deskripsi) }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-medium">Alamat</label>
                    <input type="text" name="alamat" class="form-control rounded-3" value="{{ old('alamat', $destinasi->alamat) }}">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-medium">Harga Tiket</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light border-0 rounded-start">Rp</span>
                        <input type="number" name="harga_tiket" step="0.01" class="form-control rounded-end" value="{{ old('harga_tiket', $destinasi->harga_tiket) }}">
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-medium">Jam Operasional</label>
                    <input type="text" name="jam_operasional" class="form-control rounded-3" value="{{ old('jam_operasional', $destinasi->jam_operasional) }}" placeholder="Contoh: 08.00 - 17.00">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-medium">Status Publikasi</label>
                    <select name="status_publikasi" class="form-select rounded-3">
                        <option value="draft" {{ old('status_publikasi', $destinasi->status_publikasi) == 'draft' ? 'selected' : '' }}>Draft</option>
                        <option value="published" {{ old('status_publikasi', $destinasi->status_publikasi) == 'published' ? 'selected' : '' }}>Published</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-medium">Kategori</label>
                    <select name="category_id" class="form-select rounded-3">
                        @foreach ($category as $kat)
                            <option value="{{ $kat->id }}" {{ old('category_id', $destinasi->category_id) == $kat->id ? 'selected' : '' }}>
                                {{ $kat->nama_kategori }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label class="form-label fw-medium">Gambar Utama</label>
                    <input type="file" name="url_gambar_utama" class="form-control rounded-3">
                    @if (!empty($destinasi->url_gambar_utama))
                        <div class="mt-2">
                            <img src="{{ asset('storage/' . $destinasi->url_gambar_utama) }}" alt="Gambar" class="rounded shadow-sm" style="max-width: 200px;">
                        </div>
                    @endif
                </div>

                <div class="d-flex justify-content-between align-items-center">
                    <a href="{{ route('destinasi.index') }}" class="btn btn-outline-secondary rounded-pill">
                        <i class="fa fa-arrow-left me-1"></i> Kembali
                    </a>
                    <button type="submit" class="btn btn-warning rounded-pill shadow-sm">
                        <i class="fa fa-floppy-disk me-1"></i> Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
