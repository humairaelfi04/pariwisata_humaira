@extends('layouts.admin')

@section('title', 'Manajemen UMKM')

@section('content')
<div class="mb-4 d-flex justify-content-between align-items-center">
    <h4 class="fw-semibold text-dark mb-0" style="color: #8B4513 !important;">
        <i class="fa fa-store me-2" style="color: #CD853F;"></i> Manajemen UMKM
    </h4>
    <a href="{{ route('admin.umkm.create') }}" class="btn rounded-pill px-4" style="background: linear-gradient(135deg, #8B4513, #A0522D); border: none; color: white; font-weight: 600;">
        Tambah UMKM
    </a>
</div>

{{-- Alert sukses --}}
@if(session('success'))
    <div class="alert alert-light border-start border-4 shadow-sm d-flex align-items-center" role="alert" style="background: rgba(16, 185, 129, 0.1); border-left-color: #10b981 !important; color: #065f46;">
        <i class="bi bi-check-circle-fill me-2" style="color: #10b981;"></i>
        <div>{{ session('success') }}</div>
    </div>
@endif

<div class="card border-0 shadow-sm rounded-4" style="background: rgba(255,255,255,0.95); backdrop-filter: blur(10px); border: 1px solid rgba(139, 69, 19, 0.1);">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle text-nowrap" style="background: rgba(255,255,255,0.95); backdrop-filter: blur(10px);">
                <thead class="text-center text-dark" style="background: linear-gradient(135deg, #F5F5DC, #DEB887);">
                    <tr>
                        <th style="width: 40px; color: #8B4513; font-weight: 700;">#</th>
                        <th style="color: #8B4513; font-weight: 700;">Gambar</th>
                        <th style="color: #8B4513; font-weight: 700;">Nama Usaha</th>
                        <th style="color: #8B4513; font-weight: 700;">Deskripsi Layanan</th>
                        <th style="color: #8B4513; font-weight: 700;">Kategori</th>
                        <th style="width: 140px; color: #8B4513; font-weight: 700;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($umkms as $index => $umkm)
                        <tr style="transition: all 0.3s ease;">
                            <td class="text-center" style="color: #8B4513; font-weight: 600;">{{ $index + 1 }}</td>

                            <td class="text-center">
                                @if ($umkm->url_gambar_umkm)
                                    <img src="{{ asset('storage/' . $umkm->url_gambar_umkm) }}" alt="Gambar UMKM" class="rounded" width="60" style="border: 2px solid #DEB887;">
                                @else
                                    <span class="text-muted">-</span>
                                @endif
                            </td>

                            <td class="fw-semibold text-dark" style="color: #8B4513 !important;">{{ $umkm->nama_usaha }}</td>
                            <td style="color: #6b7280;">{{ \Illuminate\Support\Str::limit($umkm->deskripsi_layanan, 60) }}</td>
                            <td class="text-center">
                                <span class="badge rounded-pill text-white" style="background: linear-gradient(135deg, #8B4513, #A0522D); font-weight: 600;">
                                    {{ $umkm->category->nama_kategori ?? 'Tidak ada' }}
                                </span>
                            </td>
                            <td class="text-center">
                                <div class="btn-group" role="group">
                                    <a href="{{ route('admin.umkm.show', $umkm->id) }}" class="btn btn-sm btn-outline-dark" title="Lihat" style="border: 2px solid #8B4513; color: #8B4513; font-weight: 600; transition: all 0.3s ease;">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.umkm.edit', $umkm->id) }}" class="btn btn-sm text-dark" title="Edit" style="background: linear-gradient(135deg, #CD853F, #D2B48C); border: none; color: white; font-weight: 600; transition: all 0.3s ease;">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="{{ route('admin.umkm.destroy', $umkm->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger" title="Hapus" style="background: linear-gradient(135deg, #ef4444, #dc2626); border: none; color: white; font-weight: 600; transition: all 0.3s ease;">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted py-4" style="color: #8B4513 !important;">
                                <i class="bi bi-info-circle me-2"></i> Belum ada data UMKM yang tersedia.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<style>
.card:hover {
    transform: translateY(-3px);
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

.table tbody tr:hover {
    background: rgba(139, 69, 19, 0.05) !important;
    transform: scale(1.01);
}

.badge {
    transition: all 0.3s ease;
}

.badge:hover {
    transform: scale(1.05);
}
</style>
@endsection
