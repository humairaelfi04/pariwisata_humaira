@extends('layouts.frontend') {{-- Pastikan layout public --}}
@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Daftar Acara</h1>

    <div class="row">
        @foreach ($events as $event)
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                @if($event->url_gambar_acara)
                    <img src="{{ asset('images/' . $event->url_gambar_acara) }}" class="card-img-top" alt="Gambar Acara">
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{ $event->judul }}</h5>
                    <p class="card-text">{{ \Illuminate\Support\Str::limit($event->deskripsi, 100) }}</p>
                    <a href="{{ route('public.events.show', $event->id) }}" class="btn btn-primary">Lihat Detail</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
