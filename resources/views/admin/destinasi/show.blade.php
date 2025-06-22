@extends('layouts.admin')

@section('content')
<div class="container mx-auto p-4 max-w-2xl">
    <h1 class="text-2xl font-bold mb-4">{{ $destinasi->nama }}</h1>

    @if ($destinasi->url_gambar_utama)
        <img src="{{ asset('images/' . $destinasi->url_gambar_utama) }}" class="w-full h-64 object-cover rounded mb-4">
    @endif

    <p><strong>Alamat:</strong> {{ $destinasi->alamat }}</p>
    <p><strong>Deskripsi:</strong> {{ $destinasi->deskripsi }}</p>
    <p><strong>Harga Tiket:</strong> Rp{{ number_format($destinasi->harga_tiket, 2, ',', '.') }}</p>
    <p><strong>Jam Operasional:</strong> {{ $destinasi->jam_operasional }}</p>
    <p><strong>Status:</strong> {{ ucfirst($destinasi->status_publikasi) }}</p>
    <p><strong>Kategori:</strong> {{ $destinasi->category->nama_kategori }}</p>

    <div class="mt-4 flex gap-2">
        <a href="{{ route('destinasi.edit', $destinasi->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded">Edit</a>
        <a href="{{ route('destinasi.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Kembali</a>
    </div>
</div>
@endsection
