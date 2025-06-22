@extends('layouts.frontend')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h2 class="mb-4">Detail Destinasi & Ulasan Pengunjung</h2>

            {{-- Detail Destinasi --}}
            <div class="card mb-4">
                <img src="{{ asset('images/' . $destination->url_gambar_utama) }}" class="card-img-top" alt="{{ $destination->nama }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $destination->nama }}</h5>
                    <p class="card-text">{{ $destination->deskripsi }}</p>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><strong>Alamat:</strong> {{ $destination->alamat }}</li>
                        <li class="list-group-item"><strong>Harga Tiket:</strong> Rp{{ number_format($destination->harga_tiket, 0, ',', '.') }}</li>
                        <li class="list-group-item"><strong>Jam Operasional:</strong> {{ $destination->jam_operasional }}</li>
                        <li class="list-group-item"><strong>Kategori:</strong> {{ $destination->category->nama_kategori }}</li>
                    </ul>
                </div>
            </div>

            {{-- Ulasan Pengunjung --}}
            <h4>Ulasan Pengunjung</h4>
            @forelse ($destination->reviews as $review)
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">{{ $review->nama_pengunjung }} <small class="text-muted">({{ $review->email_pengunjung }})</small></h5>
                        <p class="card-text">
                            <strong>Rating:</strong> {{ $review->rating }}/5<br>
                            <strong>Komentar:</strong> {{ $review->komentar }}
                        </p>
                    </div>
                </div>
            @empty
                <p class="text-muted">Belum ada ulasan untuk destinasi ini.</p>
            @endforelse
        </div>
    </div>
</div>
@endsection
