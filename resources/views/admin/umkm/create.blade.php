@extends('layouts.admin')

@section('content')
<div class="container mt-5 mb-5">
    <div class="card shadow-sm border-0">
        <div class="card-header bg-success text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0">🛍️ Tambah UMKM Baru</h4>
            <a href="{{ route('admin.umkm.index') }}" class="btn btn-sm btn-light text-success border">
                ← Kembali
            </a>
        </div>

        <div class="card-body">
            {{-- Alert Error --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Oops!</strong> Ada beberapa kesalahan:
                    <ul class="mb-0 mt-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Alert Success --}}
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Form --}}
            <form action="{{ route('admin.umkm.store') }}" method="POST" class="needs-validation" novalidate>
                @csrf

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="nama_usaha" class="form-label">Nama Usaha</label>
                        <input type="text" name="nama_usaha" id="nama_usaha" class="form-control" value="{{ old('nama_usaha') }}" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="narahubung" class="form-label">Narahubung</label>
                        <input type="text" name="narahubung" id="narahubung" class="form-control" value="{{ old('narahubung') }}" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="deskripsi_layanan" class="form-label">Deskripsi Layanan</label>
                    <textarea name="deskripsi_layanan" id="deskripsi_layanan" rows="4" class="form-control" required>{{ old('deskripsi_layanan') }}</textarea>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="nomor_telepon" class="form-label">Nomor Telepon</label>
                        <input type="text" name="nomor_telepon" id="nomor_telepon" class="form-control" value="{{ old('nomor_telepon') }}" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="alamat_umkm" class="form-label">Alamat UMKM</label>
                        <input type="text" name="alamat_umkm" id="alamat_umkm" class="form-control" value="{{ old('alamat_umkm') }}" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="category_id" class="form-label">Kategori</label>
                    <select name="category_id" id="category_id" class="form-select" required>
                        <option value="">-- Pilih Kategori --</option>
                        @foreach($categories as $kat)
                            <option value="{{ $kat->id }}" {{ old('category_id') == $kat->id ? 'selected' : '' }}>
                                {{ $kat->nama_kategori }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Tombol Submit --}}
                <div class="mt-4 d-flex justify-content-end">
                    <button type="submit" class="btn btn-success px-4">
                        💾 Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
