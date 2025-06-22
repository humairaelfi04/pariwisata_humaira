@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Detail Event</h1>

    <div class="card">
        <div class="card-body">
            <h3 class="card-title">{{ $event->judul }}</h3>

            <p><strong>Deskripsi:</strong><br>{{ $event->deskripsi }}</p>

            <p><strong>Tanggal Mulai:</strong> {{ $event->tanggal_mulai }}</p>

            @if($event->tanggal_berakhir)
            <p><strong>Tanggal Berakhir:</strong> {{ $event->tanggal_berakhir }}</p>
            @endif

            <p><strong>Lokasi:</strong> {{ $event->lokasi }}</p>

            @if($event->penyelenggara)
            <p><strong>Penyelenggara:</strong> {{ $event->penyelenggara }}</p>
            @endif

            @if($event->url_gambar_acara)
            <p><strong>Gambar Acara:</strong><br>
                <img src="{{ asset('images/' . $event->url_gambar_acara) }}" alt="Gambar Acara" class="img-fluid" style="max-width: 400px;">
            </p>
            @endif


            <a href="{{ route('admin.event.index') }}" class="btn btn-secondary mt-3">Kembali ke Daftar Event</a>
        </div>
    </div>
</div>
@endsection
