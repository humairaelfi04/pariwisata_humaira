@extends('layouts.frontend')

@section('content')
<div class="container py-4">
    <h2>{{ $destinasi->nama }}</h2>

    <div class="row mt-4">
        <div class="col-md-6">
            @if ($destinasi->url_gambar_utama)
                <img src="{{ asset('images/' . $destinasi->url_gambar_utama) }}" class="img-fluid rounded">
            @endif
        </div>
        <div class="col-md-6">
            <h5>Kategori: {{ $destinasi->category->nama_kategori }}</h5>
            <p><strong>Alamat:</strong> {{ $destinasi->alamat }}</p>
            <p><strong>Deskripsi:</strong><br>{{ $destinasi->deskripsi }}</p>
            <p><strong>Harga Tiket:</strong> Rp {{ number_format($destinasi->harga_tiket, 0, ',', '.') }}</p>
            <p><strong>Jam Operasional:</strong> {{ $destinasi->jam_operasional }}</p>
            <p><strong>Status:</strong> {{ $destinasi->status_publikasi }}</p>
        </div>
    </div>
    @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<h4>Kirim Ulasan</h4>
<form action="{{ route('review.store', $destinasi->id) }}" method="POST">
    @csrf
    <div class="mb-3">
        <label>Nama</label>
        <input type="text" name="nama_pengunjung" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email_pengunjung" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Rating (1 - 5)</label>
        <input type="number" name="rating" min="1" max="5" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Komentar</label>
        <textarea name="komentar" rows="3" class="form-control" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Kirim Ulasan</button>
</form>

<h4 class="mt-5">Ulasan Pengunjung</h4>
@forelse ($destinasi->reviews as $review)
    <div class="border p-3 mb-2">
        <strong>{{ $review->nama_pengunjung }}</strong> - Rating: {{ $review->rating }}/5<br>
        <small>{{ $review->created_at->format('d M Y') }}</small>
        <p>{{ $review->komentar }}</p>
    </div>
@empty
    <p>Belum ada ulasan.</p>
@endforelse

</div>
@endsection
