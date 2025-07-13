@extends('layouts.admin')

@section('title', 'Manajemen Kategori')

@section('content')
<div class="container-fluid mt-4">
    {{-- Heading --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-bold mb-0" style="color: #8B4513;">
            <i class="bi bi-tags me-2" style="color: #CD853F;"></i> Manajemen Kategori
        </h4>
        <a href="{{ route('admin.kategori.create') }}" class="btn rounded-pill px-3 py-2 shadow-sm" 
           style="background: linear-gradient(135deg, #8B4513, #A0522D); border: none; color: white; font-weight: 600; transition: all 0.3s ease;">
            <i class="bi bi-plus-circle me-1"></i> Tambah Kategori
        </a>
    </div>

    {{-- Alert Sukses --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show shadow-sm rounded-3" role="alert" 
             style="background: rgba(25, 135, 84, 0.1); border: 1px solid rgba(25, 135, 84, 0.2); color: #0f5132;">
            <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    {{-- Tabel Data --}}
    <div class="card border-0 shadow-lg rounded-4" style="background: linear-gradient(135deg, #FDF5E6, #F5F5DC); backdrop-filter: blur(15px); border: 1px solid rgba(139, 69, 19, 0.15);">
        <div class="card-header bg-transparent border-0 px-4 py-3">
            <h5 class="fw-bold mb-0" style="color: #8B4513;">
                <i class="bi bi-list-ul me-2" style="color: #CD853F;"></i> Daftar Kategori
            </h5>
        </div>
        
        <div class="card-body px-4 py-4">
            @if ($categories->count())
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead>
                            <tr style="background: rgba(255, 255, 255, 0.7); border-bottom: 2px solid rgba(139, 69, 19, 0.1);">
                                <th class="fw-bold" style="color: #8B4513; border: none; padding: 1rem 0.75rem;">Nama Kategori</th>
                                <th class="fw-bold text-center" style="color: #8B4513; border: none; padding: 1rem 0.75rem;">Jenis</th>
                                <th class="fw-bold text-center" style="color: #8B4513; border: none; padding: 1rem 0.75rem; width: 150px;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr style="border-bottom: 1px solid rgba(139, 69, 19, 0.05); transition: all 0.3s ease;">
                                    <td class="fw-semibold" style="color: #8B4513; padding: 1rem 0.75rem; border: none;">
                                        <div class="d-flex align-items-center">
                                            <div class="me-3" style="width: 40px; height: 40px; background: linear-gradient(135deg, #DEB887, #CD853F); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                                <i class="bi bi-tag" style="color: white; font-size: 1.1rem;"></i>
                                            </div>
                                            <span>{{ $category->nama_kategori }}</span>
                                        </div>
                                    </td>
                                    <td class="text-center" style="padding: 1rem 0.75rem; border: none;">
                                        <span class="badge rounded-pill px-3 py-2" 
                                              style="background: {{ $category->jenis_kategori == 'destinasi' ? 'linear-gradient(135deg, #8B4513, #A0522D)' : 'linear-gradient(135deg, #CD853F, #DEB887)' }}; color: white; font-size: 0.8rem; font-weight: 600;">
                                            <i class="bi {{ $category->jenis_kategori == 'destinasi' ? 'bi-geo-alt' : 'bi-shop' }} me-1"></i>
                                            {{ ucfirst($category->jenis_kategori) }}
                                        </span>
                                    </td>
                                    <td class="text-center" style="padding: 1rem 0.75rem; border: none;">
                                        <div class="d-flex justify-content-center gap-2">
                                            <a href="{{ route('admin.kategori.edit', $category->id) }}"
                                               class="btn btn-sm rounded-pill px-3 py-2" 
                                               style="background: linear-gradient(135deg, #DEB887, #CD853F); border: none; color: white; font-weight: 600; transition: all 0.3s ease;">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            <form action="{{ route('admin.kategori.destroy', $category->id) }}" method="POST"
                                                  class="d-inline" onsubmit="return confirm('Yakin ingin menghapus kategori ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm rounded-pill px-3 py-2" 
                                                        style="background: linear-gradient(135deg, #DC3545, #C82333); border: none; color: white; font-weight: 600; transition: all 0.3s ease;">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="text-center py-5">
                    <div class="mb-3">
                        <i class="bi bi-inbox" style="font-size: 3rem; color: #CD853F;"></i>
                    </div>
                    <h5 class="fw-semibold mb-2" style="color: #8B4513;">Belum ada kategori</h5>
                    <p class="text-muted mb-3" style="color: #8B4513 !important;">Mulai dengan menambahkan kategori pertama Anda</p>
                    <a href="{{ route('admin.kategori.create') }}" class="btn rounded-pill px-4 py-2" 
                       style="background: linear-gradient(135deg, #8B4513, #A0522D); border: none; color: white; font-weight: 600; transition: all 0.3s ease;">
                        <i class="bi bi-plus-circle me-1"></i> Tambah Kategori Pertama
                    </a>
                </div>
            @endif
        </div>
    </div>
</div>

<style>
.card {
    transition: all 0.3s ease;
}

.card:hover {
    transform: translateY(-3px);
    box-shadow: 0 20px 40px rgba(139, 69, 19, 0.15) !important;
}

.btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(139, 69, 19, 0.25) !important;
}

.table tbody tr:hover {
    background: rgba(255, 255, 255, 0.8) !important;
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(139, 69, 19, 0.1);
}

.badge {
    transition: all 0.3s ease;
}

.badge:hover {
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(139, 69, 19, 0.3) !important;
}

.alert {
    border-radius: 12px;
}

.alert-success {
    background: linear-gradient(135deg, rgba(25, 135, 84, 0.1), rgba(25, 135, 84, 0.05));
}

@media (max-width: 768px) {
    .card-body {
        padding: 1.5rem;
    }
    
    .d-flex.justify-content-between {
        flex-direction: column;
        gap: 1rem;
        align-items: stretch;
    }
    
    .btn {
        width: 100%;
    }
    
    .table-responsive {
        font-size: 0.9rem;
    }
    
    .d-flex.align-items-center {
        flex-direction: column;
        text-align: center;
    }
    
    .me-3 {
        margin-right: 0 !important;
        margin-bottom: 0.5rem;
    }
}
</style>
@endsection