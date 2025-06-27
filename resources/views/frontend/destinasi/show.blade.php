@extends('layouts.frontend')

@section('content')
<div class="container py-5">
    {{-- Detail Destinasi Wisata --}}
    <div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-5" style="background-color: #fff9f5;">
        <div class="row g-0">
            {{-- Gambar --}}
            <div class="col-md-6">
                @if ($destinasi->url_gambar_utama)
                    <img src="{{ asset('images/' . $destinasi->url_gambar_utama) }}"
                         class="img-fluid h-100 w-100"
                         style="object-fit: cover;"
                         alt="{{ $destinasi->nama }}">
                @endif
            </div>

            {{-- Informasi Detail --}}
            <div class="col-md-6 p-4">
                <h3 class="fw-bold text-secondary-emphasis mb-3">{{ $destinasi->nama }}</h3>

                <p class="mb-3"><strong class="text-muted">Kategori:</strong><br>
                    <span class="badge bg-dark text-white rounded-pill px-3 py-1">
                        {{ $destinasi->category->nama_kategori ?? 'Tidak ada' }}
                    </span>
                </p>

                <p class="mb-2"><strong class="text-muted">Alamat:</strong><br>{{ $destinasi->alamat }}</p>
                <p class="mb-2"><strong class="text-muted">Harga Tiket:</strong><br>Rp {{ number_format($destinasi->harga_tiket, 0, ',', '.') }}</p>
                <p class="mb-2"><strong class="text-muted">Jam Operasional:</strong><br>{{ $destinasi->jam_operasional }}</p>
                <p class="mb-2"><strong class="text-muted">Status:</strong><br>{{ ucfirst($destinasi->status_publikasi) }}</p>
                <p class="mb-2"><strong class="text-muted">Deskripsi:</strong><br>{{ $destinasi->deskripsi }}</p>

                <a href="{{ route('destinasi.index') }}"
                   class="btn rounded-pill mt-4 shadow-sm"
                   style="background-color: #f5dbc4; color: #5c3d2e;">
                    ← Kembali ke Daftar Destinasi
                </a>
            </div>
        </div>
    </div>

    {{-- Notifikasi --}}
    @if (session('success'))
        <div class="alert alert-success mt-4">
            {{ session('success') }}
        </div>
    @endif

    {{-- Form Ulasan --}}
    <div class="mt-5">
        <h4 class="fw-semibold">💬 Kirim Ulasan</h4>

        @guest
            <div class="alert alert-warning mt-2">
                <small>⚠️ Anda harus login terlebih dahulu untuk mengirim ulasan.
                    <a href="{{ route('login') }}">Login sekarang</a>
                </small>
            </div>
        @endguest

        <form id="form-ulasan" action="{{ route('review.store') }}" method="POST" class="border p-4 rounded shadow-sm bg-white mt-3">
            @csrf
            <input type="hidden" name="destination_id" value="{{ $destinasi->id }}">

            <div class="mb-3">
                <label class="form-label">Nama</label>
                <input type="text" name="nama_pengunjung" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email_pengunjung" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Rating (1 - 5)</label>
                <input type="number" name="rating" min="1" max="5" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Komentar</label>
                <textarea name="komentar" rows="3" class="form-control" required></textarea>
            </div>

            <button type="submit" class="btn btn-success px-4">Kirim Ulasan</button>
        </form>
    </div>

    {{-- Ulasan Pengunjung --}}
    <div class="mt-5">
        <h4 class="fw-semibold">⭐ Ulasan Pengunjung</h4>
        @forelse ($destinasi->reviews as $review)
            <div class="border rounded p-3 mb-3 shadow-sm bg-light">
                <div class="d-flex justify-content-between">
                    <strong>{{ $review->nama_pengunjung }}</strong>
                    <span class="text-warning fw-bold">Rating: {{ $review->rating }}/5</span>
                </div>
                <small class="text-muted">{{ $review->created_at->format('d M Y') }}</small>
                <p class="mb-0 mt-2">{{ $review->komentar }}</p>
            </div>
        @empty
            <p class="text-muted">Belum ada ulasan untuk destinasi ini.</p>
        @endforelse
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const form = document.getElementById("form-ulasan");
        const isLoggedIn = @json(Auth::check());

        if (form && !isLoggedIn) {
            form.addEventListener("submit", function (e) {
                e.preventDefault();
                alert("Silakan login terlebih dahulu untuk mengirim ulasan.");
                window.location.href = "{{ route('login') }}";
            });
        }
    });
</script>
@endpush
