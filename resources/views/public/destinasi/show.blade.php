@extends('layouts.frontend')

@section('content')
<div class="container py-4">
    <h1 class="mb-3">{{ $destinasi->nama }}</h1>

    <img src="{{ asset('storage/' . $destinasi->url_gambar_utama) }}" alt="{{ $destinasi->nama }}" class="img-fluid mb-3">

    <p><strong>Alamat:</strong> {{ $destinasi->alamat }}</p>
    <p><strong>Harga Tiket:</strong> Rp {{ number_format($destinasi->harga_tiket, 0, ',', '.') }}</p>
    <p><strong>Jam Operasional:</strong> {{ $destinasi->jam_operasional }}</p>

    <p>{{ $destinasi->deskripsi }}</p>
    <form action="{{ route('review.store') }}" method="POST">
    @csrf
    <input type="hidden" name="destination_id" value="{{ $destinasi->id }}">

    <div class="mb-3">
        <label for="reviewer_name">Nama</label>
        <input type="text" name="reviewer_name" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="review_content">Ulasan</label>
        <textarea name="review_content" class="form-control" required></textarea>
    </div>

    <button type="submit" class="btn btn-success">Kirim Ulasan</button>
</form>

</div>
@endsection
