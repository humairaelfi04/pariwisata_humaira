@extends('layouts.admin')

@section('title', 'Manajemen Destinasi')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="fw-semibold text-dark mb-0" style="color: #8B4513 !important;">📍 Daftar Destinasi</h4>
    <a href="{{ route('destinasi.create') }}" class="btn btn-sm rounded-pill" style="background: linear-gradient(135deg, #8B4513, #A0522D); border: none; color: white; font-weight: 600;">
        <i class="fa fa-plus me-1"></i> Tambah Destinasi
    </a>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert" style="background: rgba(16, 185, 129, 0.1); border: 1px solid rgba(16, 185, 129, 0.2); color: #065f46;">
        <i class="fa fa-check-circle me-2"></i>{{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

@if ($destinasi->count())
    <div class="row g-4">
        @foreach ($destinasi as $item)
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 border-0 shadow-sm rounded-4" style="background: rgba(255,255,255,0.95); backdrop-filter: blur(10px); border: 1px solid rgba(139, 69, 19, 0.1); transition: all 0.3s ease;">
                    @if ($item->url_gambar_utama)
                        <img src="{{ asset('images/' . $item->url_gambar_utama) }}" class="card-img-top rounded-top-4" alt="{{ $item->nama }}" style="height: 200px; object-fit: cover;">
                    @endif
                    <div class="card-body d-flex flex-column">
                        <h5 class="fw-semibold text-dark" style="color: #8B4513 !important;">{{ $item->nama }}</h5>
                        <p class="text-muted small mb-2">{{ $item->alamat }}</p>
                        <span class="badge rounded-pill mb-3" style="background: linear-gradient(135deg, #DEB887, #D2B48C); color: #8B4513; font-weight: 600;">
                            {{ $item->category->nama_kategori ?? 'Tanpa Kategori' }}
                        </span>

                        <div class="d-flex justify-content-between mt-auto">
                            <a href="{{ route('admin.destinasi.show', $item->id) }}" class="btn btn-sm btn-outline-dark rounded-pill" style="border: 2px solid #8B4513; color: #8B4513; font-weight: 600; transition: all 0.3s ease;">
                                <i class="fa fa-eye"></i>
                            </a>
                            <a href="{{ route('destinasi.edit', $item->id) }}" class="btn btn-sm rounded-pill" style="background: linear-gradient(135deg, #CD853F, #D2B48C); border: none; color: white; font-weight: 600; transition: all 0.3s ease;">
                                <i class="fa fa-edit"></i>
                            </a>
                            <form action="{{ route('destinasi.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Hapus destinasi ini?')" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm rounded-pill" style="background: linear-gradient(135deg, #ef4444, #dc2626); border: none; color: white; font-weight: 600; transition: all 0.3s ease;">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@else
    <div class="text-center text-muted mt-5" style="color: #8B4513 !important;">
        <i class="fa fa-info-circle me-1"></i> Belum ada destinasi wisata yang tersedia.
    </div>
@endif

<style>
.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 35px rgba(139, 69, 19, 0.15) !important;
}

.btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(139, 69, 19, 0.2);
}

.btn-outline-dark:hover {
    background: linear-gradient(135deg, #8B4513, #A0522D) !important;
    color: white !important;
    border-color: transparent !important;
}
</style>
@endsection
