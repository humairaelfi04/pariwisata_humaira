@extends('layouts.admin')

@section('title', 'Moderasi Ulasan')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="fw-semibold text-dark mb-0">⭐ Moderasi Ulasan Pengunjung</h4>
</div>

{{-- Alert Sukses --}}
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
        <i class="fa fa-check-circle me-2"></i>{{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

@if ($reviews->count())
    <div class="table-responsive rounded-4 shadow-sm bg-white">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Rating</th>
                    <th>Komentar</th>
                    <th>Destinasi</th>
                    <th>Status</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($reviews as $review)
                    <tr>
                        <td>{{ $review->nama_pengunjung }}</td>
                        <td>{{ $review->email_pengunjung ?? '-' }}</td>
                        <td>
                            <span class="badge bg-warning text-dark">{{ $review->rating }}/5</span>
                        </td>
                        <td>{{ $review->komentar }}</td>
                        <td>{{ $review->destination->nama ?? '-' }}</td>
                        <td>
                            <form method="POST" action="{{ route('admin.review.updateStatus', $review->id) }}">
                                @csrf
                                @method('PUT')
                                <select name="status_moderasi" class="form-select form-select-sm rounded-pill"
                                    onchange="this.form.submit()" style="min-width: 140px">
                                    <option value="pending" {{ $review->status_moderasi == 'pending' ? 'selected' : '' }}>⏳ Pending</option>
                                    <option value="approved" {{ $review->status_moderasi == 'approved' ? 'selected' : '' }}>✅ Disetujui</option>
                                </select>
                            </form>
                        </td>
                        <td class="text-center">
                            <form method="POST" action="{{ route('admin.review.destroy', $review->id) }}"
                                  onsubmit="return confirm('Yakin ingin menghapus ulasan ini?')"
                                  class="d-inline">
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
    <div class="text-center text-muted mt-5">
        <i class="fa fa-info-circle me-1"></i> Belum ada ulasan yang masuk untuk dimoderasi.
    </div>
@endif
@endsection
