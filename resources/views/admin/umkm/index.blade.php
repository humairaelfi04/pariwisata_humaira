@extends('layouts.admin')

@section('title', 'Manajemen UMKM')

@section('content')
<div class="mb-4 d-flex justify-content-between align-items-center">
    <h4 class="fw-semibold text-dark mb-0">
        <i class="fa fa-store me-2 text-warning"></i> Manajemen UMKM
    </h4>
    <a href="{{ route('admin.umkm.create') }}" class="btn btn-warning rounded-pill px-4">
        Tambah UMKM
    </a>
</div>

{{-- Alert sukses --}}
@if(session('success'))
    <div class="alert alert-light border-start border-4 border-warning shadow-sm d-flex align-items-center" role="alert">
        <i class="bi bi-check-circle-fill text-warning me-2"></i>
        <div>{{ session('success') }}</div>
    </div>
@endif

{{-- Card berisi tabel --}}
<div class="card border-0 shadow-sm rounded-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle text-nowrap">
                <thead class="bg-light text-center text-dark">
                    <tr>
                        <th style="width: 40px;">#</th>
                        <th>Gambar</th>
                        <th>Nama Usaha</th>
                        <th>Deskripsi Layanan</th>
                        <th>Kategori</th>
                        <th style="width: 140px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($umkms as $index => $umkm)
                        <tr>
                            <td class="text-center">{{ $index + 1 }}</td>

                            {{-- Gambar UMKM --}}
                            <td class="text-center">
                                @if ($umkm->url_gambar_umkm)
                                    <img src="{{ asset('storage/' . $umkm->url_gambar_umkm) }}" alt="Gambar UMKM" class="rounded" width="60">
                                @else
                                    <span class="text-muted">-</span>
                                @endif
                            </td>

                            <td class="fw-semibold text-dark">{{ $umkm->nama_usaha }}</td>
                            <td>{{ \Illuminate\Support\Str::limit($umkm->deskripsi_layanan, 60) }}</td>
                            <td class="text-center">
                                <span class="badge rounded-pill bg-dark text-white">
                                    {{ $umkm->category->nama_kategori ?? 'Tidak ada' }}
                                </span>
                            </td>
                            <td class="text-center">
                                <div class="btn-group" role="group">
                                    <a href="{{ route('admin.umkm.show', $umkm->id) }}" class="btn btn-sm btn-outline-dark" title="Lihat">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.umkm.edit', $umkm->id) }}" class="btn btn-sm btn-outline-warning text-dark" title="Edit">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="{{ route('admin.umkm.destroy', $umkm->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger" title="Hapus">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted py-4">
                                <i class="bi bi-info-circle me-2"></i> Belum ada data UMKM yang tersedia.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
