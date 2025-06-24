@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h2>Moderasi Ulasan</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>Rating</th>
                <th>Komentar</th>
                <th>Destinasi</th>
                <th>Status Moderasi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reviews as $review)
                <tr>
                    <td>{{ $review->nama_pengunjung }}</td>
                    <td>{{ $review->email_pengunjung ?? '-' }}</td>
                    <td>{{ $review->rating }}/5</td>
                    <td>{{ $review->komentar }}</td>
                    <td>{{ $review->destination->nama ?? '-' }}</td>
                    <td>
                        <form method="POST" action="{{ route('admin.review.updateStatus', $review->id) }}">
                            @csrf
                            @method('PUT')
                            <select name="status_moderasi" onchange="this.form.submit()">
                                <option value="pending" {{ $review->status_moderasi == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="approved" {{ $review->status_moderasi == 'approved' ? 'selected' : '' }}>Disetujui</option>
                                <option value="rejected" {{ $review->status_moderasi == 'rejected' ? 'selected' : '' }}>Ditolak</option>
                            </select>
                        </form>
                    </td>
                    <td>
                        <form method="POST" action="{{ route('admin.review.destroy', $review->id) }}" onsubmit="return confirm('Yakin ingin menghapus ulasan ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
