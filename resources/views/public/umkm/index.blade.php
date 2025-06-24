@extends('layouts.frontend')

@section('content')
<div class="container mt-4">
    <h2>Daftar UMKM</h2>

    @if($umkm->isEmpty())
        <p>Tidak ada UMKM yang tersedia saat ini.</p>
    @else
        <div class="row">
            @foreach($umkm as $umkm)
                <div class="col-md-4 mb-3">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">{{ $umkm->nama_usaha }}</h5>
                            <p class="card-text">{{ Str::limit($umkm->deskripsi_layanan, 100) }}</p>
                            <a href="{{ route('public.umkm.show', $umkm->id) }}" class="btn btn-primary btn-sm">Lihat Detail</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
