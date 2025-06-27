@extends('layouts.admin')

@section('title', 'Manajemen Event')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="fw-semibold text-dark mb-0">🎉 Daftar Event</h4>
    <a href="{{ route('admin.event.create') }}" class="btn btn-sm btn-dark rounded-pill shadow-sm">
        <i class="bi bi-plus-circle me-1"></i> Tambah Event
    </a>
</div>

{{-- Alert sukses --}}
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
        <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

@if ($events->count())
    <div class="row g-4">
        @foreach ($events as $event)
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 border-0 shadow-sm rounded-4">
                    @if ($event->url_gambar_acara)
                        <img src="{{ asset('images/' . $event->url_gambar_acara) }}" class="card-img-top rounded-top-4" alt="{{ $event->judul }}" style="height: 200px; object-fit: cover;">
                    @endif
                    <div class="card-body d-flex flex-column">
                        <h5 class="fw-semibold text-dark">{{ $event->judul }}</h5>
                        <p class="text-muted small mb-1">
                            📅 {{ \Carbon\Carbon::parse($event->tanggal_mulai)->translatedFormat('d M Y') }}
                            @if($event->tanggal_berakhir)
                                <br>→ {{ \Carbon\Carbon::parse($event->tanggal_berakhir)->translatedFormat('d M Y') }}
                            @endif
                        </p>
                        <p class="text-muted small mb-2">
                            📍 {{ $event->lokasi }}
                        </p>

                        <span class="badge bg-light text-dark rounded-pill mb-3">
                            {{ $event->penyelenggara ?? 'Tanpa Penyelenggara' }}
                        </span>

                        <div class="d-flex justify-content-between mt-auto">
                            <a href="{{ route('admin.event.show', $event->id) }}" class="btn btn-sm btn-outline-dark rounded-pill" title="Lihat">
                                <i class="bi bi-eye"></i>
                            </a>
                            <a href="{{ route('admin.event.edit', $event->id) }}" class="btn btn-sm btn-outline-warning rounded-pill" title="Edit">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form action="{{ route('admin.event.destroy', $event->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus event ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger rounded-pill" title="Hapus">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@else
    <div class="text-center text-muted mt-5">
        <i class="bi bi-info-circle me-1"></i> Belum ada event yang tersedia.
    </div>
@endif
@endsection
