@extends('layouts.admin')

@section('title', 'Tambah Destinasi')

@section('content')
<div class="container py-4" style="max-width: 700px;">
    <div class="card shadow-sm border-0">
        <div class="card-body">
            <h4 class="mb-4 fw-bold text-success">➕ Tambah Destinasi Wisata</h4>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('destinasi.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Nama Destinasi</label>
                    <input type="text" name="nama" class="form-control" value="{{ old('nama', $destinasi->nama ?? '') }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Deskripsi</label>
                    <textarea name="deskripsi" rows="4" class="form-control">{{ old('deskripsi', $destinasi->deskripsi ?? '') }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Alamat</label>
                    <input type="text" name="alamat" class="form-control" value="{{ old('alamat', $destinasi->alamat ?? '') }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Harga Tiket</label>
                    <div class="input-group">
                        <span class="input-group-text">Rp</span>
                        <input type="number" name="harga_tiket" step="0.01" class="form-control" value="{{ old('harga_tiket', $destinasi->harga_tiket ?? '') }}">
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Jam Operasional</label>
                    <input type="text" name="jam_operasional" class="form-control" value="{{ old('jam_operasional', $destinasi->jam_operasional ?? '') }}" placeholder="Contoh: 08.00 - 17.00">
                </div>

                <div class="mb-3">
                    <label class="form-label">Status Publikasi</label>
                    <select name="status_publikasi" class="form-select">
                        <option value="draft" {{ old('status_publikasi', $destinasi->status_publikasi ?? '') == 'draft' ? 'selected' : '' }}>Draft</option>
                        <option value="published" {{ old('status_publikasi', $destinasi->status_publikasi ?? '') == 'published' ? 'selected' : '' }}>Published</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Kategori</label>
                    <select name="category_id" class="form-select">
                        <option value="">-- Pilih Kategori --</option>
                        @foreach ($category as $kat)
                            <option value="{{ $kat->id }}" {{ old('category_id', $destinasi->category_id ?? '') == $kat->id ? 'selected' : '' }}>
                                {{ $kat->nama_kategori }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Gambar Utama</label>
                    <input type="file" name="url_gambar_utama" class="form-control">
                    @if (!empty($destinasi->url_gambar_utama))
                        <div class="mt-2">
                            <img src="{{ asset('storage/' . $destinasi->url_gambar_utama) }}" alt="Gambar Destinasi" class="rounded shadow-sm" style="width: 120px;">
                        </div>
                    @endif
                </div>

                <div class="d-grid mt-4">
                    <button type="submit" class="btn btn-success">
                        <i class="bi bi-plus-circle"></i> {{ $button ?? 'Simpan' }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
