@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h1>Daftar UMKM</h1>
    <a href="{{ route('admin.umkm.create') }}" class="btn btn-primary mb-3">Tambah UMKM</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama Usaha</th>
                <th>Deskripsi</th>
                <th>Kategori</th>
                {{-- <th>Status</th> --}}
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($umkms as $umkm)
                <tr>
                    <td>{{ $umkm->nama_usaha }}</td>
                    <td>{{ Str::limit($umkm->deskripsi_layanan, 50) }}</td>
                    <td>{{ $umkm->category->nama_kategori ?? '-' }}</td>
                    {{-- <td>
                        <span class="badge bg-{{ $umkm->status_persetujuan == 'approved' ? 'success' : ($umkm->status_persetujuan == 'pending' ? 'warning' : 'danger') }}">
                            {{ ucfirst($umkm->status_persetujuan) }}
                        </span>
                    </td> --}}
                    <td class="d-flex gap-1">
                        <a href="{{ route('admin.umkm.show', $umkm->id) }}" class="btn btn-sm btn-info">Detail</a>
                        <a href="{{ route('admin.umkm.edit', $umkm->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('admin.umkm.destroy', $umkm->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">Belum ada data UMKM.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
