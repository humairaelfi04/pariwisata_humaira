@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-bold mb-0" style="color: #8B4513;">
            <i class="bi bi-speedometer2 me-2" style="color: #CD853F;"></i> Dashboard Admin Pariwisata
        </h4>
    </div>

    {{-- Info Cards --}}
    <div class="row g-4 mb-4">
        {{-- Destinasi --}}
        <div class="col-md-3">
            <div class="card border-0 shadow-lg rounded-4 p-4" style="background: linear-gradient(135deg, #FDF5E6, #F5F5DC); backdrop-filter: blur(15px); border: 1px solid rgba(139, 69, 19, 0.15);">
                <div class="d-flex align-items-center mb-3">
                    <div class="me-3" style="width: 50px; height: 50px; background: linear-gradient(135deg, #8B4513, #A0522D); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                        <i class="bi bi-map" style="color: white; font-size: 1.5rem;"></i>
                    </div>
                    <div>
                        <p class="mb-1 small" style="color: #8B4513; font-weight: 600;">Jumlah Destinasi</p>
                        <h4 class="fw-bold mb-0" style="color: #8B4513;">{{ $totalDestinasi }} Tempat</h4>
                    </div>
                </div>
                @if(($newDestinasi ?? 0) > 0)
                    <div class="d-flex align-items-center">
                        <i class="bi bi-arrow-up-circle me-1" style="color: #8B4513;"></i>
                        <small style="color: #8B4513; font-weight: 600;">+{{ $newDestinasi }} destinasi baru</small>
                    </div>
                @endif
            </div>
        </div>

        {{-- UMKM --}}
        <div class="col-md-3">
            <div class="card border-0 shadow-lg rounded-4 p-4" style="background: linear-gradient(135deg, #FDF5E6, #F5F5DC); backdrop-filter: blur(15px); border: 1px solid rgba(139, 69, 19, 0.15);">
                <div class="d-flex align-items-center mb-3">
                    <div class="me-3" style="width: 50px; height: 50px; background: linear-gradient(135deg, #CD853F, #DEB887); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                        <i class="bi bi-shop" style="color: white; font-size: 1.5rem;"></i>
                    </div>
                    <div>
                        <p class="mb-1 small" style="color: #8B4513; font-weight: 600;">Jumlah UMKM</p>
                        <h4 class="fw-bold mb-0" style="color: #8B4513;">{{ $totalUmkm }} UMKM</h4>
                    </div>
                </div>
                @if(($newUmkm ?? 0) > 0)
                    <div class="d-flex align-items-center">
                        <i class="bi bi-arrow-up-circle me-1" style="color: #8B4513;"></i>
                        <small style="color: #8B4513; font-weight: 600;">+{{ $newUmkm }} UMKM baru</small>
                    </div>
                @endif
            </div>
        </div>

        {{-- Acara --}}
        <div class="col-md-3">
            <div class="card border-0 shadow-lg rounded-4 p-4" style="background: linear-gradient(135deg, #FDF5E6, #F5F5DC); backdrop-filter: blur(15px); border: 1px solid rgba(139, 69, 19, 0.15);">
                <div class="d-flex align-items-center mb-3">
                    <div class="me-3" style="width: 50px; height: 50px; background: linear-gradient(135deg, #A0522D, #CD853F); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                        <i class="bi bi-calendar-event" style="color: white; font-size: 1.5rem;"></i>
                    </div>
                    <div>
                        <p class="mb-1 small" style="color: #8B4513; font-weight: 600;">Jumlah Acara</p>
                        <h4 class="fw-bold mb-0" style="color: #8B4513;">{{ $totalEvent }} Acara</h4>
                    </div>
                </div>
            </div>
        </div>

        {{-- Review --}}
        <div class="col-md-3">
            <div class="card border-0 shadow-lg rounded-4 p-4" style="background: linear-gradient(135deg, #FDF5E6, #F5F5DC); backdrop-filter: blur(15px); border: 1px solid rgba(139, 69, 19, 0.15);">
                <div class="d-flex align-items-center mb-3">
                    <div class="me-3" style="width: 50px; height: 50px; background: linear-gradient(135deg, #DEB887, #CD853F); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                        <i class="bi bi-chat-left-text" style="color: white; font-size: 1.5rem;"></i>
                    </div>
                    <div>
                        <p class="mb-1 small" style="color: #8B4513; font-weight: 600;">Jumlah Review</p>
                        <h4 class="fw-bold mb-0" style="color: #8B4513;">{{ $totalReview }} Ulasan</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Tabel Event Terbaru dan Progress --}}
    <div class="row g-4">
        {{-- Tabel Event --}}
        <div class="col-lg-8">
            <div class="card border-0 shadow-lg rounded-4" style="background: linear-gradient(135deg, #FDF5E6, #F5F5DC); backdrop-filter: blur(15px); border: 1px solid rgba(139, 69, 19, 0.15);">
                <div class="card-header bg-transparent border-0 px-4 py-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="fw-bold mb-0" style="color: #8B4513;">
                            <i class="bi bi-calendar-event me-2" style="color: #CD853F;"></i> Daftar Acara Terbaru
                        </h5>
                        <a href="{{ route('admin.event.index') }}" class="btn btn-outline-secondary rounded-pill px-3 py-2"
                           style="border-color: #8B4513; color: #8B4513; font-weight: 500; transition: all 0.3s ease;">
                            Lihat Semua
                        </a>
                    </div>
                </div>
                <div class="card-body px-4 py-4">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead>
                                <tr style="background: rgba(255, 255, 255, 0.7); border-bottom: 2px solid rgba(139, 69, 19, 0.1);">
                                    <th class="fw-bold" style="color: #8B4513; border: none; padding: 1rem 0.75rem;">Judul Acara</th>
                                    <th class="fw-bold" style="color: #8B4513; border: none; padding: 1rem 0.75rem;">Lokasi</th>
                                    <th class="fw-bold" style="color: #8B4513; border: none; padding: 1rem 0.75rem;">Tanggal</th>
                                    <th class="fw-bold text-center" style="color: #8B4513; border: none; padding: 1rem 0.75rem;">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($latestEvents as $event)
                                    <tr style="border-bottom: 1px solid rgba(139, 69, 19, 0.05); transition: all 0.3s ease;">
                                        <td style="padding: 1rem 0.75rem; border: none;">
                                            <span class="fw-semibold" style="color: #8B4513;">{{ $event->judul }}</span>
                                        </td>
                                        <td style="padding: 1rem 0.75rem; border: none;">
                                            <span style="color: #8B4513;">{{ $event->lokasi }}</span>
                                        </td>
                                        <td style="padding: 1rem 0.75rem; border: none;">
                                            <span style="color: #8B4513;">{{ \Carbon\Carbon::parse($event->tanggal_mulai)->translatedFormat('d F Y') }}</span>
                                        </td>
                                        <td class="text-center" style="padding: 1rem 0.75rem; border: none;">
                                            @php
                                                $today = \Carbon\Carbon::today();
                                                $start = \Carbon\Carbon::parse($event->tanggal_mulai);
                                                $end = \Carbon\Carbon::parse($event->tanggal_berakhir);
                                            @endphp

                                            @if ($today->between($start, $end))
                                                <span class="badge rounded-pill px-3 py-2" style="background: linear-gradient(135deg, #FFD700, #FFA500); color: #8B4513; font-weight: 600;">
                                                    <i class="bi bi-play-circle me-1"></i> Sedang Berlangsung
                                                </span>
                                            @elseif ($today->lt($start))
                                                <span class="badge rounded-pill px-3 py-2" style="background: linear-gradient(135deg, #8B4513, #A0522D); color: white; font-weight: 600;">
                                                    <i class="bi bi-clock me-1"></i> Akan Datang
                                                </span>
                                            @else
                                                <span class="badge rounded-pill px-3 py-2" style="background: linear-gradient(135deg, #6c757d, #495057); color: white; font-weight: 600;">
                                                    <i class="bi bi-check-circle me-1"></i> Selesai
                                                </span>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center py-4" style="color: #8B4513;">Belum ada acara.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        {{-- Progress Moderasi Review --}}
        {{-- <div class="col-lg-4">
            <div class="card border-0 shadow-lg rounded-4 p-4" style="background: linear-gradient(135deg, #FDF5E6, #F5F5DC); backdrop-filter: blur(15px); border: 1px solid rgba(139, 69, 19, 0.15);">
                <div class="text-center">
                    <h5 class="fw-bold mb-4" style="color: #8B4513;">
                        <i class="bi bi-graph-up me-2" style="color: #CD853F;"></i> Progress Moderasi Review
                    </h5>
                    <div class="progress-circle position-relative mx-auto mb-3" style="width: 140px; height: 140px;">
                        <svg viewBox="0 0 36 36" class="circular-chart" width="140" height="140">
                            <path class="circle-bg"
                                d="M18 2.0845
                                   a 15.9155 15.9155 0 0 1 0 31.831
                                   a 15.9155 15.9155 0 0 1 0 -31.831"
                                fill="none" stroke="rgba(139, 69, 19, 0.1)" stroke-width="2"/>
                            <path class="circle"
                                stroke-dasharray="{{ $reviewProgress }}, 100"
                                d="M18 2.0845
                                   a 15.9155 15.9155 0 0 1 0 31.831
                                   a 15.9155 15.9155 0 0 1 0 -31.831"
                                fill="none" stroke="#8B4513" stroke-width="2"/>
                        </svg>
                        <div class="position-absolute top-50 start-50 translate-middle">
                            <span class="fw-bold fs-4" style="color: #8B4513;">{{ $reviewProgress }}%</span><br>
                            <small style="color: #8B4513; font-weight: 600;">Sudah Dimoderasi</small>
                        </div>
                    </div>
                    <div class="mt-3">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span style="color: #8B4513; font-weight: 600;">Progress</span>
                            <span style="color: #8B4513; font-weight: 600;">{{ $reviewProgress }}%</span>
                        </div>
                        <div class="progress rounded-pill" style="height: 8px; background: rgba(139, 69, 19, 0.1);">
                            <div class="progress-bar rounded-pill" role="progressbar"
                                 style="width: {{ $reviewProgress }}%; background: linear-gradient(135deg, #8B4513, #A0522D);"
                                 aria-valuenow="{{ $reviewProgress }}" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}

<style>
.card {
    transition: all 0.3s ease;
}

.card:hover {
    transform: translateY(-3px);
    box-shadow: 0 20px 40px rgba(139, 69, 19, 0.15) !important;
}

.btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(139, 69, 19, 0.25) !important;
}

.btn-outline-secondary:hover {
    background: linear-gradient(135deg, #8B4513, #A0522D) !important;
    color: white !important;
    border-color: transparent !important;
}

.table tbody tr:hover {
    background: rgba(255, 255, 255, 0.8) !important;
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(139, 69, 19, 0.1);
}

.badge {
    transition: all 0.3s ease;
}

.badge:hover {
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(139, 69, 19, 0.3) !important;
}

.circular-chart {
    display: block;
    margin: 10px auto;
    max-width: 80%;
    max-height: 250px;
}

.circle-bg {
    fill: none;
    stroke: #eee;
    stroke-width: 2;
}

.circle {
    fill: none;
    stroke-width: 2;
    stroke-linecap: round;
    animation: progress 1s ease-out forwards;
}

@keyframes progress {
    0% {
        stroke-dasharray: 0 100;
    }
}

.progress-bar {
    transition: width 0.6s ease;
}

@media (max-width: 768px) {
    .card-body {
        padding: 1.5rem;
    }

    .table-responsive {
        font-size: 0.9rem;
    }

    .d-flex.align-items-center {
        flex-direction: column;
        text-align: center;
    }

    .me-3 {
        margin-right: 0 !important;
        margin-bottom: 0.5rem;
    }
}
</style>
@endsection
