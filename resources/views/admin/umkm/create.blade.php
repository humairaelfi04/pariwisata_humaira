@extends('layouts.admin')

@section('title', 'Tambah UMKM')

@section('content')
<div class="container-fluid mt-4">
    <h4 class="fw-semibold text-dark mb-4">
        <i class="fa fa-plus-circle me-2 text-warning"></i> Tambah UMKM
    </h4>

    <form action="{{ route('admin.umkm.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="nama_usaha" class="form-label">Nama Usaha</label>
            <input type="text" name="nama_usaha" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="deskripsi_layanan" class="form-label">Deskripsi Layanan</label>
            <textarea name="deskripsi_layanan" class="form-control" rows="3" required></textarea>
        </div>

        <div class="mb-3">
            <label for="narahubung" class="form-label">Narahubung</label>
            <input type="text" name="narahubung" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="nomor_telepon" class="form-label">Nomor Telepon</label>
            <input type="text" name="nomor_telepon" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="alamat_umkm" class="form-label">Alamat UMKM</label>
            <textarea name="alamat_umkm" class="form-control" rows="2" required></textarea>
        </div>

        <div class="mb-3">
            <label for="category_id" class="form-label">Kategori</label>
            <select name="category_id" class="form-select" required>
                <option value="">-- Pilih Kategori --</option>
                @foreach ($categories as $kategori)
                    <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="url_gambar_umkm" class="form-label">Gambar UMKM</label>
            <input type="file" name="url_gambar_umkm" class="form-control">
        </div>


        <div class="mt-4">
            <button type="submit" class="btn btn-warning text-white">
                <i class="bi bi-save me-1"></i> Simpan
            </button>
            <a href="{{ route('admin.umkm.index') }}" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>
@endsection
