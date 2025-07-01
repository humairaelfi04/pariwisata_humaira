@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid py-4">
    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-semibold text-dark mb-0">🏞️ Dashboard Admin Pariwisata</h4>
    </div>

    {{-- Info Cards --}}
    <div class="row g-4 mb-4">
        {{-- Destinasi --}}
        <div class="col-md-3">
            <div class="card bg-white shadow-sm border-0 rounded-4 p-3">
                <div class="d-flex align-items-center mb-2">
                    <i class="bi bi-map fs-3 text-success me-3"></i>
                    <div>
                        <p class="mb-1 text-muted small">Jumlah Destinasi</p>
                        <h5 class="fw-bold mb-0">{{ $totalDestinasi }} Tempat</h5>
                    </div>
                </div>
                @if(($newDestinasi ?? 0) > 0)
                    <small class="text-success">+{{ $newDestinasi }} destinasi baru</small>
                @endif
            </div>
        </div>

        {{-- UMKM --}}
        <div class="col-md-3">
            <div class="card bg-white shadow-sm border-0 rounded-4 p-3">
                <div class="d-flex align-items-center mb-2">
                    <i class="bi bi-shop fs-3 text-primary me-3"></i>
                    <div>
                        <p class="mb-1 text-muted small">Jumlah UMKM</p>
                        <h5 class="fw-bold mb-0">{{ $totalUmkm }} UMKM</h5>
                    </div>
                </div>
                @if(($newUmkm ?? 0) > 0)
                    <small class="text-primary">+{{ $newUmkm }} UMKM baru</small>
                @endif
            </div>
        </div>

        {{-- Acara --}}
        <div class="col-md-3">
            <div class="card bg-white shadow-sm border-0 rounded-4 p-3">
                <div class="d-flex align-items-center mb-2">
                    <i class="bi bi-calendar-event fs-3 text-warning me-3"></i>
                    <div>
                        <p class="mb-1 text-muted small">Jumlah Acara</p>
                        <h5 class="fw-bold mb-0">{{ $totalEvent }} Acara</h5>
                    </div>
                </div>
            </div>
        </div>

        {{-- Review --}}
        <div class="col-md-3">
            <div class="card bg-white shadow-sm border-0 rounded-4 p-3">
                <div class="d-flex align-items-center mb-2">
                    <i class="bi bi-chat-left-text fs-3 text-danger me-3"></i>
                    <div>
                        <p class="mb-1 text-muted small">Jumlah Review</p>
                        <h5 class="fw-bold mb-0">{{ $totalReview }} Ulasan</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Tabel Event Terbaru dan Progress --}}
    <div class="row g-4">
        {{-- Tabel Event --}}
        <div class="col-lg-8">
            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-header bg-white border-bottom d-flex justify-content-between align-items-center">
                    <h6 class="mb-0 fw-semibold">Daftar Acara Terbaru</h6>
                    <a href="{{ route('admin.event.index') }}" class="btn btn-sm btn-outline-primary">Lihat Semua</a>
                </div>
                <div class="card-body p-0">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Judul Acara</th>
                                <th>Lokasi</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($latestEvents as $event)
                                <tr>
                                    <td>{{ $event->judul }}</td>
                                    <td>{{ $event->lokasi }}</td>
                                    <td>{{ \Carbon\Carbon::parse($event->tanggal_mulai)->translatedFormat('d F Y') }}</td>
                                    <td>
                                        @php
                                            $today = \Carbon\Carbon::today();
                                            $start = \Carbon\Carbon::parse($event->tanggal_mulai);
                                            $end = \Carbon\Carbon::parse($event->tanggal_berakhir);
                                        @endphp

                                        @if ($today->between($start, $end))
                                            <span class="badge bg-warning text-dark">Sedang Berlangsung</span>
                                        @elseif ($today->lt($start))
                                            <span class="badge bg-success">Akan Datang</span>
                                        @else
                                            <span class="badge bg-secondary">Selesai</span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">Belum ada acara.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {{-- Progress Moderasi Review --}}
        <div class="col-lg-4">
            <div class="card shadow-sm border-0 rounded-4 text-center p-4">
                <h6 class="fw-semibold mb-3">Progress Moderasi Review</h6>
                <div class="progress-circle position-relative mx-auto" style="width: 140px; height: 140px;">
                    <svg viewBox="0 0 36 36" class="circular-chart green" width="140" height="140">
                        <path class="circle-bg"
                            d="M18 2.0845
                               a 15.9155 15.9155 0 0 1 0 31.831
                               a 15.9155 15.9155 0 0 1 0 -31.831"
                            fill="none" stroke="#eee" stroke-width="2"/>
                        <path class="circle"
                            stroke-dasharray="{{ $reviewProgress }}, 100"
                            d="M18 2.0845
                               a 15.9155 15.9155 0 0 1 0 31.831
                               a 15.9155 15.9155 0 0 1 0 -31.831"
                            fill="none" stroke="#0d6efd" stroke-width="2"/>
                    </svg>
                    <div class="position-absolute top-50 start-50 translate-middle">
                        <span class="fw-bold fs-5">{{ $reviewProgress }}%</span><br>
                        <small class="text-muted">Sudah Dimoderasi</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
