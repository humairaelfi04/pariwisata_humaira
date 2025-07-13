@extends('layouts.admin')

@section('title', 'Moderasi Ulasan')

@section('content')
<div class="container-fluid mt-4">
    {{-- Heading --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-bold mb-0" style="color: #8B4513;">
            <i class="bi bi-star-fill me-2" style="color: #CD853F;"></i> Moderasi Ulasan Pengunjung
        </h4>
    </div>

    {{-- Alert Sukses --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show shadow-sm rounded-3" role="alert" 
             style="background: rgba(25, 135, 84, 0.1); border: 1px solid rgba(25, 135, 84, 0.2); color: #0f5132;">
            <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if ($reviews->count())
        <div class="card border-0 shadow-lg rounded-4" style="background: linear-gradient(135deg, #FDF5E6, #F5F5DC); backdrop-filter: blur(15px); border: 1px solid rgba(139, 69, 19, 0.15);">
            <div class="card-header bg-transparent border-0 px-4 py-3">
                <h5 class="fw-bold mb-0" style="color: #8B4513;">
                    <i class="bi bi-list-ul me-2" style="color: #CD853F;"></i> Daftar Ulasan
                </h5>
            </div>
            
            <div class="card-body px-4 py-4">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead>
                            <tr style="background: rgba(255, 255, 255, 0.7); border-bottom: 2px solid rgba(139, 69, 19, 0.1);">
                                <th class="fw-bold" style="color: #8B4513; border: none; padding: 1rem 0.75rem;">Nama</th>
                                <th class="fw-bold" style="color: #8B4513; border: none; padding: 1rem 0.75rem;">Email</th>
                                <th class="fw-bold text-center" style="color: #8B4513; border: none; padding: 1rem 0.75rem;">Rating</th>
                                <th class="fw-bold" style="color: #8B4513; border: none; padding: 1rem 0.75rem;">Komentar</th>
                                <th class="fw-bold" style="color: #8B4513; border: none; padding: 1rem 0.75rem;">Destinasi</th>
                                <th class="fw-bold text-center" style="color: #8B4513; border: none; padding: 1rem 0.75rem;">Status</th>
                                <th class="fw-bold text-center" style="color: #8B4513; border: none; padding: 1rem 0.75rem;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($reviews as $review)
                                <tr style="border-bottom: 1px solid rgba(139, 69, 19, 0.05); transition: all 0.3s ease;">
                                    <td style="padding: 1rem 0.75rem; border: none;">
                                        <div class="d-flex align-items-center">
                                            <div class="me-3" style="width: 40px; height: 40px; background: linear-gradient(135deg, #DEB887, #CD853F); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                                <i class="bi bi-person" style="color: white; font-size: 1.1rem;"></i>
                                            </div>
                                            <span class="fw-semibold" style="color: #8B4513;">{{ $review->nama_pengunjung }}</span>
                                        </div>
                                    </td>
                                    <td style="padding: 1rem 0.75rem; border: none;">
                                        <span style="color: #8B4513;">{{ $review->email_pengunjung ?? '-' }}</span>
                                    </td>
                                    <td class="text-center" style="padding: 1rem 0.75rem; border: none;">
                                        <span class="badge rounded-pill px-3 py-2" 
                                              style="background: linear-gradient(135deg, #FFD700, #FFA500); color: #8B4513; font-size: 0.8rem; font-weight: 600;">
                                            <i class="bi bi-star-fill me-1"></i>{{ $review->rating }}/5
                                        </span>
                                    </td>
                                    <td style="padding: 1rem 0.75rem; border: none;">
                                        <div class="p-2 rounded-3" style="background: rgba(255, 255, 255, 0.6); border: 1px solid rgba(139, 69, 19, 0.1);">
                                            <p class="mb-0" style="color: #8B4513; font-size: 0.9rem; line-height: 1.4;">{{ $review->komentar }}</p>
                                        </div>
                                    </td>
                                    <td style="padding: 1rem 0.75rem; border: none;">
                                        <span class="fw-semibold" style="color: #8B4513;">{{ $review->destination->nama ?? '-' }}</span>
                                    </td>
                                    <td class="text-center" style="padding: 1rem 0.75rem; border: none;">
                                        <form method="POST" action="{{ route('admin.review.updateStatus', $review->id) }}">
                                            @csrf
                                            @method('PUT')
                                            <select name="status_moderasi" class="form-select form-select-sm rounded-pill"
                                                onchange="this.form.submit()" style="min-width: 140px; border: 2px solid #DEB887; background: rgba(255, 255, 255, 0.8); color: #8B4513; font-weight: 600; transition: all 0.3s ease;">
                                                <option value="pending" {{ $review->status_moderasi == 'pending' ? 'selected' : '' }}>
                                                    ⏳ Pending
                                                </option>
                                                <option value="approved" {{ $review->status_moderasi == 'approved' ? 'selected' : '' }}>
                                                    ✅ Disetujui
                                                </option>
                                            </select>
                                        </form>
                                    </td>
                                    <td class="text-center" style="padding: 1rem 0.75rem; border: none;">
                                        <form method="POST" action="{{ route('admin.review.destroy', $review->id) }}"
                                              onsubmit="return confirm('Yakin ingin menghapus ulasan ini?')"
                                              class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm rounded-pill px-3 py-2" 
                                                    style="background: linear-gradient(135deg, #DC3545, #C82333); border: none; color: white; font-weight: 600; transition: all 0.3s ease;">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @else
        <div class="card border-0 shadow-lg rounded-4" style="background: linear-gradient(135deg, #FDF5E6, #F5F5DC); backdrop-filter: blur(15px); border: 1px solid rgba(139, 69, 19, 0.15);">
            <div class="card-body text-center py-5">
                <div class="mb-3">
                    <i class="bi bi-inbox" style="font-size: 3rem; color: #CD853F;"></i>
                </div>
                <h5 class="fw-semibold mb-2" style="color: #8B4513;">Belum ada ulasan</h5>
                <p class="text-muted mb-0" style="color: #8B4513 !important;">Belum ada ulasan yang masuk untuk dimoderasi.</p>
            </div>
        </div>
    @endif
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

.form-select:focus {
    border-color: #A0522D !important;
    box-shadow: 0 0 0 0.25rem rgba(139, 69, 19, 0.15) !important;
    background: white !important;
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
    
    .form-select {
        font-size: 0.8rem;
    }
}
</style>
@endsection