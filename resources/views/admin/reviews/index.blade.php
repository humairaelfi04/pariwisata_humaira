@extends('layouts.admin')

@section('content')
<h1 class="mb-4">Moderasi Ulasan</h1>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Nama</th>
            <th>Email</th>
            <th>Destinasi</th>
            <th>Rating</th>
            <th>Komentar</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($reviews as $review)
        <tr>
            <td>{{ $review->nama_pengunjung }}</td>
            <td>{{ $review->email_pengunjung }}</td>
            <td>{{ $review->destination->nama ?? '-' }}</td>
            <td>{{ $review->rating }}/5</td>
            <td>{{ $review->komentar }}</td>
            <td>
                @if($review->status_moderasi == 'disetujui')
                    <span class="badge bg-success">Disetujui</span>
                @else
                    <span class="badge bg-warning">Menunggu</span>
                @endif
            </td>
            <td>
                @if($review->status_moderasi != 'disetujui')
                <form action="{{ route('admin.reviews.approve', $review->id) }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit" class="btn btn-sm btn-primary">Setujui</button>
                </form>
                @endif
                <form action="{{ route('admin.reviews.destroy', $review->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Hapus ulasan ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $reviews->links() }}
@endsection
