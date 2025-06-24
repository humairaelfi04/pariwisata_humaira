@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold mb-0">Manajemen UMKM</h2>
        <a href="{{ route('admin.umkm.create') }}" class="btn btn-success">
            <i class="bi bi-plus-circle"></i> Tambah UMKM
        </a>
    </div>

    {{-- Alert jika sukses --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    {{-- Tabel Data --}}
    <div class="table-responsive">
        <table class="table table-hover table-striped align-middle">
            <thead class="table-success">
                <tr>
                    <th>#</th>
                    <th>Nama Usaha</th>
                    <th>Deskripsi</th>
                    <th>Kategori</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($umkms as $index => $umkm)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td class="fw-semibold">{{ $umkm->nama_usaha }}</td>
                        <td>{{ Str::limit($umkm->deskripsi_layanan, 50) }}</td>
                        <td>
                            <span class="badge bg-primary">
                                {{ $umkm->category->nama_kategori ?? 'Tidak ada kategori' }}
                            </span>
                        </td>
                        <td class="text-center">
                            <div class="btn-group">
                                <a href="{{ route('admin.umkm.show', $umkm->id) }}" class="btn btn-sm btn-info">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('admin.umkm.edit', $umkm->id) }}" class="btn btn-sm btn-warning">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('admin.umkm.destroy', $umkm->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted py-4">Belum ada data UMKM yang tersedia.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
