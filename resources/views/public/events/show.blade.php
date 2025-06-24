@extends('layouts.frontend')
@section('content')
<div class="container mt-4">
    <h1>{{ $event->judul }}</h1>

    @if($event->url_gambar_acara)
        <img src="{{ asset('images/' . $event->url_gambar_acara) }}" class="img-fluid mb-3" alt="Gambar Acara">
    @endif

    <p><strong>Deskripsi:</strong><br>{{ $event->deskripsi }}</p>
    <p><strong>Tanggal Mulai:</strong> {{ $event->tanggal_mulai }}</p>
    <p><strong>Tanggal Berakhir:</strong> {{ $event->tanggal_berakhir ?? '-' }}</p>
    <p><strong>Lokasi:</strong> {{ $event->lokasi }}</p>
    <p><strong>Penyelenggara:</strong> {{ $event->penyelenggara }}</p>

    <a href="{{ route('public.events.index') }}" class="btn btn-secondary">Kembali ke Daftar Acara</a>
</div>
@endsection
