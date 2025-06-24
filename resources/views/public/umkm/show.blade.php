@extends('layouts.frontend')

@section('content')
<div class="container mt-4">
    <h2>{{ $umkm->nama_usaha }}</h2>

    <p><strong>Deskripsi:</strong> {{ $umkm->deskripsi_layanan }}</p>
    <p><strong>Alamat:</strong> {{ $umkm->alamat_umkm }}</p>
    <p><strong>Kontak:</strong> {{ $umkm->narahubung }} ({{ $umkm->nomor_telepon }})</p>
    

    <a href="{{ route('public.umkm.index') }}" class="btn btn-secondary mt-3">Kembali</a>
</div>
@endsection
