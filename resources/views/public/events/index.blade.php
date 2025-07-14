@extends('layouts.frontend')

@section('content')
<div class="container py-5">
    <div class="text-center mb-5" data-aos="fade-up">
        <h2 class="display-5 fw-bold mb-2" style="background: linear-gradient(135deg, #8B4513, #A0522D); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">
            🎉 Daftar Acara
        </h2>
        <p class="lead text-muted">Jangan lewatkan event menarik di sekitar Anda!</p>
    </div>

    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        @forelse ($events as $event)
            <div class="col" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                <div class="card h-100 shadow-lg border-0 rounded-4" style="background: rgba(255, 250, 240, 0.97); backdrop-filter: blur(12px); transition: all 0.3s ease;">
                    @if($event->url_gambar_acara)
                        <div class="position-relative overflow-hidden" style="height: 200px;">
                            <img src="{{ asset('images/' . $event->url_gambar_acara) }}" class="card-img-top w-100 h-100" alt="Gambar Acara" style="object-fit: cover; transition: transform 0.3s ease;">

                            <div class="position-absolute top-0 start-0 w-100 h-100" style="background: linear-gradient(135deg, rgba(139, 69, 19, 0.08), rgba(160, 82, 45, 0.08));"></div>
                        </div>
                    @else
                        <div class="d-flex align-items-center justify-content-center bg-light" style="height: 200px; background: linear-gradient(135deg, #F5F5DC, #DEB887);">
                            <i class="fas fa-calendar-alt fa-3x" style="color: #8B4513;"></i>
                        </div>
                    @endif
                    <div class="card-body d-flex flex-column p-4">
                        <h5 class="card-title fw-bold mb-2" style="color: #3E2723;">{{ $event->judul }}</h5>
                        <p class="card-text text-muted mb-3" style="font-size: 0.95rem;">{{ \Illuminate\Support\Str::limit($event->deskripsi, 100) }}</p>
                        <div class="mt-auto">
                            <a href="{{ route('public.events.show', $event->id) }}"
                               class="btn btn-primary w-100"
                               style="border-radius: 12px; background: linear-gradient(135deg, #8B4513, #A0522D); border: none; font-weight: 600; padding: 10px 0; transition: all 0.3s ease;">
                                <i class="fas fa-eye me-2"></i>Lihat Detail
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center py-5" data-aos="fade-up">
                <div class="card border-0 shadow-lg" style="background: rgba(255, 250, 240, 0.97); border-radius: 20px;">
                    <div class="card-body py-5">
                        <i class="fas fa-calendar-times fa-3x mb-3" style="color: #8B4513;"></i>
                        <h5 class="fw-bold mb-2" style="color: #3E2723;">Belum ada acara tersedia saat ini</h5>
                        <p class="text-muted mb-0">Cek kembali nanti untuk event terbaru!</p>
                    </div>
                </div>
            </div>
        @endforelse
    </div>
</div>

<style>
.card:hover {
    transform: translateY(-8px) scale(1.02);
    box-shadow: 0 25px 50px -12px rgba(139, 69, 19, 0.25) !important;
}
.card-img-top:hover {
    transform: scale(1.08);
}
.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(139, 69, 19, 0.3);
    background: linear-gradient(135deg, #A0522D, #8B4513) !important;
}
@media (max-width: 768px) {
    .display-5 {
        font-size: 1.5rem;
    }
    .card-body {
        padding: 1rem !important;
    }
}
</style>
@endsection
