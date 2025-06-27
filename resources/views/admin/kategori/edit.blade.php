@extends('layouts.admin')

@section('title', 'Edit Kategori')

@section('content')
<div class="container-fluid mt-4">
    <div class="card shadow-sm border-0 rounded-4">
        <div class="card-header bg-warning text-dark rounded-top-4 px-4 py-3 d-flex justify-content-between align-items-center">
            <h5 class="mb-0 fw-semibold"><i class="fa fa-edit me-2"></i>Edit Kategori</h5>
            <a href="{{ route('admin.kategori.index') }}" class="btn btn-sm btn-outline-dark rounded-pill">
                ← Kembali
            </a>
        </div>

        <div class="card-body px-4">
            {{-- Alert Error --}}
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show shadow-sm" role="alert">
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
            <form action="{{ route('admin.kategori.update', $category->id) }}" method="POST" class="needs-validation" novalidate>
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="nama_kategori" class="form-label fw-semibold">Nama Kategori</label>
                    <input type="text" name="nama_kategori" id="nama_kategori"
                        class="form-control rounded-3"
                        value="{{ old('nama_kategori', $category->nama_kategori) }}" required>
                </div>

                <div class="mb-3">
                    <label for="jenis_kategori" class="form-label fw-semibold">Jenis Kategori</label>
                    <select name="jenis_kategori" id="jenis_kategori" class="form-select rounded-3" required>
                        <option value="">-- Pilih Jenis --</option>
                        <option value="destinasi" {{ old('jenis_kategori', $category->jenis_kategori) == 'destinasi' ? 'selected' : '' }}>Destinasi</option>
                        <option value="umkm" {{ old('jenis_kategori', $category->jenis_kategori) == 'umkm' ? 'selected' : '' }}>UMKM</option>
                        <option value="acara" {{ old('jenis_kategori', $category->jenis_kategori) == 'acara' ? 'selected' : '' }}>Acara</option>
                    </select>
                </div>

                <div class="d-flex justify-content-end mt-4">
                    <button type="submit" class="btn btn-warning px-4 py-2 rounded-pill shadow-sm">
                        <i class="fa fa-save me-1"></i> Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
