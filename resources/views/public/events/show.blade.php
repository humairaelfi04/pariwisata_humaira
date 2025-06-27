@extends('layouts.frontend')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden" style="background-color: #fff9f5;">
                <div class="row g-0">
                    {{-- Gambar Acara di sisi kiri --}}
                    <div class="col-md-6">
                        @if($event->url_gambar_acara)
                            <img src="{{ asset('images/' . $event->url_gambar_acara) }}"
                                 alt="Gambar Acara" class="img-fluid h-100 w-100"
                                 style="object-fit: cover;">
                        @else
                            <div class="d-flex justify-content-center align-items-center h-100 bg-light">
                                <span class="text-muted">Tidak ada gambar</span>
                            </div>
                        @endif
                    </div>

                    {{-- Detail Acara di sisi kanan --}}
                    <div class="col-md-6 p-4">
                        <h3 class="fw-bold text-secondary-emphasis mb-3">{{ $event->judul }}</h3>

                        <p class="mb-3"><strong class="text-muted">Deskripsi:</strong><br>{{ $event->deskripsi }}</p>

                        <p class="mb-2"><strong class="text-muted">Tanggal Mulai:</strong><br>{{ $event->tanggal_mulai }}</p>
                        <p class="mb-2"><strong class="text-muted">Tanggal Berakhir:</strong><br>{{ $event->tanggal_berakhir ?? '-' }}</p>

                        <p class="mb-2"><strong class="text-muted">Lokasi:</strong><br>{{ $event->lokasi }}</p>
                        <p class="mb-2"><strong class="text-muted">Penyelenggara:</strong><br>{{ $event->penyelenggara }}</p>

                        <a href="{{ route('public.events.index') }}"
                           class="btn rounded-pill mt-4 shadow-sm"
                           style="background-color: #f5dbc4; color: #5c3d2e;">
                            ← Kembali ke Daftar Acara
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
