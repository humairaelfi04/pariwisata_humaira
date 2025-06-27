@extends('layouts.admin')

@section('title', 'Tambah Event')

@section('content')
<div class="container-fluid mt-4">
    <div class="card shadow-sm border-0 rounded-4">
        <div class="card-header bg-dark text-white rounded-top-4 px-4 py-3 d-flex justify-content-between align-items-center">
            <h5 class="mb-0 fw-semibold"><i class="bi bi-calendar-event me-2"></i>Tambah Event Baru</h5>
            <a href="{{ route('admin.event.index') }}" class="btn btn-sm btn-light text-dark border rounded-pill">
                ← Kembali
            </a>
        </div>

        <div class="card-body px-4">
            {{-- Alert Error --}}
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show shadow-sm" role="alert">
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
                    <label for="judul" class="form-label fw-semibold">Judul Event</label>
                    <input type="text" name="judul" id="judul" class="form-control rounded-3" value="{{ old('judul') }}" required>
                </div>

                <div class="mb-3">
                    <label for="deskripsi" class="form-label fw-semibold">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" rows="4" class="form-control rounded-3" required>{{ old('deskripsi') }}</textarea>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="tanggal_mulai" class="form-label fw-semibold">Tanggal Mulai</label>
                        <input type="date" name="tanggal_mulai" id="tanggal_mulai" class="form-control rounded-3" value="{{ old('tanggal_mulai') }}" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="tanggal_berakhir" class="form-label fw-semibold">Tanggal Berakhir (Opsional)</label>
                        <input type="date" name="tanggal_berakhir" id="tanggal_berakhir" class="form-control rounded-3" value="{{ old('tanggal_berakhir') }}">
                    </div>
                </div>

                <div class="mb-3">
                    <label for="lokasi" class="form-label fw-semibold">Lokasi</label>
                    <input type="text" name="lokasi" id="lokasi" class="form-control rounded-3" value="{{ old('lokasi') }}" required>
                </div>

                <div class="mb-3">
                    <label for="penyelenggara" class="form-label fw-semibold">Penyelenggara</label>
                    <input type="text" name="penyelenggara" id="penyelenggara" class="form-control rounded-3" value="{{ old('penyelenggara') }}">
                </div>

                <div class="mb-3">
                    <label for="url_gambar_acara" class="form-label fw-semibold">Gambar Event</label>
                    <input type="file" name="url_gambar_acara" id="url_gambar_acara" class="form-control rounded-3" accept="image/*">
                </div>

                <div class="d-flex justify-content-end mt-4">
                    <button type="submit" class="btn btn-dark px-4 py-2 rounded-pill shadow-sm">
                        <i class="bi bi-save me-1"></i> Simpan Event
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
