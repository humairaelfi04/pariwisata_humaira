@extends('layouts.frontend') {{-- Pastikan layout public --}}

@section('content')
<div class="container py-5">
    <h2 class="mb-4 text-center fw-bold text-secondary-emphasis">📅 Daftar Acara</h2>

    <div class="row row-cols-1 row-cols-md-3 g-4">
        @forelse ($events as $event)
            <div class="col">
                <div class="card h-100 shadow-sm border-0 rounded-4" style="background-color: #fffefc;">
                    @if($event->url_gambar_acara)
                        <img src="{{ asset('images/' . $event->url_gambar_acara) }}" class="card-img-top rounded-top" alt="Gambar Acara" style="height: 180px; object-fit: cover;">
                    @endif
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title fw-semibold text-secondary-emphasis">{{ $event->judul }}</h5>
                        <p class="card-text text-muted small">{{ \Illuminate\Support\Str::limit($event->deskripsi, 100) }}</p>
                        <a href="{{ route('public.events.show', $event->id) }}"
                           class="btn btn-sm mt-auto rounded-pill"
                           style="border: 1px solid #f5dbc4; color: #5c3d2e;">
                            Lihat Detail
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center py-5">
                <h5 class="text-muted">Belum ada acara tersedia saat ini 😢</h5>
            </div>
        @endforelse
    </div>
</div>
@endsection
