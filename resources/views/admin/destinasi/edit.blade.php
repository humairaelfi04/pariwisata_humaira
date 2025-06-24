@extends('layouts.admin')

@section('title', 'Edit Destinasi')

@section('content')
<div class="container py-4" style="max-width: 720px;">
    <div class="card shadow-sm border-0">
        <div class="card-body">
            <h4 class="mb-3 fw-bold text-warning">Edit Destinasi Wisata</h4>

            <form action="{{ route('destinasi.update', $destinasi->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                {{-- Nama --}}
                <div class="mb-3">
                    <label class="form-label">Nama Destinasi</label>
                    <input type="text" name="nama" value="{{ old('nama', $destinasi->nama) }}" class="form-control">
                </div>

                {{-- Deskripsi --}}
                <div class="mb-3">
                    <label class="form-label">Deskripsi</label>
                    <textarea name="deskripsi" rows="4" class="form-control">{{ old('deskripsi', $destinasi->deskripsi) }}</textarea>
                </div>

                {{-- Alamat --}}
                <div class="mb-3">
                    <label class="form-label">Alamat</label>
                    <input type="text" name="alamat" value="{{ old('alamat', $destinasi->alamat) }}" class="form-control">
                </div>

                {{-- Harga Tiket --}}
                <div class="mb-3">
                    <label class="form-label">Harga Tiket</label>
                    <input type="number" name="harga_tiket" step="0.01" value="{{ old('harga_tiket', $destinasi->harga_tiket) }}" class="form-control">
                </div>

                {{-- Jam Operasional --}}
                <div class="mb-3">
                    <label class="form-label">Jam Operasional</label>
                    <input type="text" name="jam_operasional" value="{{ old('jam_operasional', $destinasi->jam_operasional) }}" class="form-control">
                </div>

                {{-- Status Publikasi --}}
                <div class="mb-3">
                    <label class="form-label">Status Publikasi</label>
                    <select name="status_publikasi" class="form-select">
                        <option value="draft" {{ old('status_publikasi', $destinasi->status_publikasi) == 'draft' ? 'selected' : '' }}>Draft</option>
                        <option value="published" {{ old('status_publikasi', $destinasi->status_publikasi) == 'published' ? 'selected' : '' }}>Published</option>
                    </select>
                </div>

                {{-- Kategori --}}
                <div class="mb-3">
                    <label class="form-label">Kategori</label>
                    <select name="category_id" class="form-select">
                        @foreach ($category as $kat)
                            <option value="{{ $kat->id }}" {{ old('category_id', $destinasi->category_id) == $kat->id ? 'selected' : '' }}>
                                {{ $kat->nama_kategori }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Gambar --}}
                <div class="mb-4">
                    <label class="form-label">Gambar Utama</label>
                    <input type="file" name="url_gambar_utama" class="form-control">
                    @if (!empty($destinasi->url_gambar_utama))
                        <div class="mt-2">
                            <img src="{{ asset('storage/' . $destinasi->url_gambar_utama) }}" alt="Gambar" class="img-thumbnail" style="max-width: 200px;">
                        </div>
                    @endif
                </div>

                {{-- Tombol --}}
                <div class="d-flex justify-content-between">
                    <a href="{{ route('destinasi.index') }}" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-success">
                        <i class="bi bi-save"></i> Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
