@extends('layouts.admin')

@section('content')
<div class="container mx-auto p-4 max-w-xl">
    <h1 class="text-xl font-bold mb-4">Tambah Destinasi Wisata</h1>

    <form action="{{ route('destinasi.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
    <label class="block mb-1">Nama</label>
    <input type="text" name="nama" value="{{ old('nama', $destinasi->nama ?? '') }}" class="w-full border rounded px-3 py-2">
</div>

<div class="mb-4">
    <label class="block mb-1">Deskripsi</label>
    <textarea name="deskripsi" class="w-full border rounded px-3 py-2">{{ old('deskripsi', $destinasi->deskripsi ?? '') }}</textarea>
</div>

<div class="mb-4">
    <label class="block mb-1">Alamat</label>
    <input type="text" name="alamat" value="{{ old('alamat', $destinasi->alamat ?? '') }}" class="w-full border rounded px-3 py-2">
</div>

<div class="mb-4">
    <label class="block mb-1">Harga Tiket</label>
    <input type="number" step="0.01" name="harga_tiket" value="{{ old('harga_tiket', $destinasi->harga_tiket ?? '') }}" class="w-full border rounded px-3 py-2">
</div>

<div class="mb-4">
    <label class="block mb-1">Jam Operasional</label>
    <input type="text" name="jam_operasional" value="{{ old('jam_operasional', $destinasi->jam_operasional ?? '') }}" class="w-full border rounded px-3 py-2">
</div>

<div class="mb-4">
    <label class="block mb-1">Status Publikasi</label>
    <select name="status_publikasi" class="w-full border rounded px-3 py-2">
        <option value="draft" {{ (old('status_publikasi', $destinasi->status_publikasi ?? '') == 'draft') ? 'selected' : '' }}>Draft</option>
        <option value="published" {{ (old('status_publikasi', $destinasi->status_publikasi ?? '') == 'published') ? 'selected' : '' }}>Published</option>
    </select>
</div>

<div class="mb-4">
    <label class="block mb-1">Kategori</label>
    <select name="category_id" class="w-full border rounded px-3 py-2">
        @foreach($category as $kat)
            <option value="{{ $kat->id }}" {{ (old('category_id', $destinasi->category_id ?? '') == $kat->id) ? 'selected' : '' }}>
                {{ $kat->nama_kategori }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-4">
    <label class="block mb-1">Gambar Utama</label>
    <input type="file" name="url_gambar_utama" class="w-full border rounded px-3 py-2">
    @if (!empty($destinasi->url_gambar_utama))
        <img src="{{ asset('storage/' . $destinasi->url_gambar_utama) }}" alt="Gambar" class="mt-2 w-32">
    @endif
</div>

<button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">{{ $button }}</button>


    </form>
</div>
@endsection
