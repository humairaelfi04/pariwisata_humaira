@extends('layouts.admin')

@section('title', 'Manajemen Kategori')

@section('content')
<div class="container-fluid mt-4">
    {{-- Heading --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-semibold text-dark mb-0">🏷️ Manajemen Kategori</h4>
        <a href="{{ route('admin.kategori.create') }}" class="btn btn-sm btn-warning rounded-pill">
            <i class="fa fa-plus me-1"></i> Tambah Kategori
        </a>
    </div>

    {{-- Alert Sukses --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
            <i class="fa fa-check-circle me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    {{-- Tabel Data --}}
    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-body px-0">
            @if ($categories->count())
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light text-center">
                            <tr>
                                <th>Nama Kategori</th>
                                <th>Jenis</th>
                                <th style="width: 150px;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @foreach ($categories as $category)
                                <tr>
                                    <td class="fw-semibold text-dark">{{ $category->nama_kategori }}</td>
                                    <td>
                                        <span class="badge rounded-pill {{ $category->jenis_kategori == 'destinasi' ? 'bg-primary' : 'bg-purple' }}">
                                            {{ ucfirst($category->jenis_kategori) }}
                                        </span>
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.kategori.edit', $category->id) }}"
                                           class="btn btn-sm btn-outline-warning rounded-pill me-1">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.kategori.destroy', $category->id) }}" method="POST"
                                              class="d-inline" onsubmit="return confirm('Yakin ingin menghapus kategori ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-outline-danger rounded-pill">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="text-center text-muted py-4">
                    <i class="fa fa-info-circle me-2"></i> Belum ada kategori yang tersedia.
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
