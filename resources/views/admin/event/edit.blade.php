@extends('layouts.admin')

@section('title', 'Edit Event')

@section('content')
<div class="container-fluid mt-4">
    <div class="card shadow-sm border-0 rounded-4">
        <div class="card-header bg-warning text-dark rounded-top-4 px-4 py-3 d-flex justify-content-between align-items-center">
            <h5 class="mb-0 fw-semibold"><i class="bi bi-calendar-edit me-2"></i>Edit Event</h5>
            <a href="{{ route('admin.event.index') }}" class="btn btn-sm btn-outline-dark rounded-pill">
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
            <form action="{{ route('admin.event.update', $event->id) }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label fw-semibold">Judul Event</label>
                    <input type="text" name="judul" class="form-control rounded-3" value="{{ old('judul', $event->judul) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control rounded-3" rows="4" required>{{ old('deskripsi', $event->deskripsi) }}</textarea>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Tanggal Mulai</label>
                        <input type="date" name="tanggal_mulai" class="form-control rounded-3" value="{{ old('tanggal_mulai', $event->tanggal_mulai) }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Tanggal Berakhir</label>
                        <input type="date" name="tanggal_berakhir" class="form-control rounded-3" value="{{ old('tanggal_berakhir', $event->tanggal_berakhir) }}">
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Lokasi</label>
                    <input type="text" name="lokasi" class="form-control rounded-3" value="{{ old('lokasi', $event->lokasi) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Penyelenggara</label>
                    <input type="text" name="penyelenggara" class="form-control rounded-3" value="{{ old('penyelenggara', $event->penyelenggara) }}">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Gambar Event</label>
                    <input type="file" name="url_gambar_acara" class="form-control rounded-3" accept="image/*">
                    @if ($event->url_gambar_acara)
                        <div class="mt-2">
                            <small class="text-muted">Gambar saat ini:</small><br>
                            <img src="{{ asset('images/' . $event->url_gambar_acara) }}" alt="Gambar Event" class="img-thumbnail mt-1" width="200">
                        </div>
                    @endif
                </div>

                <div class="d-flex justify-content-end mt-4">
                    <button type="submit" class="btn btn-dark px-4 py-2 rounded-pill shadow-sm">
                        <i class="bi bi-save me-1"></i> Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
