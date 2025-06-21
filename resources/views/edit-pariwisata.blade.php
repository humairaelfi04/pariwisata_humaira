@extends('layouts.tamplate')

@section('content')
    <div class="container mt-4">
        <h1>Edit Tempat Wisata</h1>

        <form action="{{ route('pariwisata.update', $pariwisata->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            {{-- Nama Tempat --}}
            <div class="mb-3">
                <label>Nama Tempat</label>
                <input type="text" name="nama" value="{{ old('nama', $pariwisata->nama) }}" class="form-control" required>
            </div>

            {{-- Deskripsi --}}
            <div class="mb-3">
                <label>Deskripsi</label>
                <textarea name="deskripsi" class="form-control" rows="3">{{ old('deskripsi', $pariwisata->deskripsi) }}</textarea>
            </div>

            {{-- Kategori --}}
            <div class="mb-3">
                <label>Kategori</label>
                <select name="category_id" class="form-select" required>
                    <option disabled>-- Pilih Kategori --</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ $category->id == $pariwisata->category_id ? 'selected' : '' }}>
                            {{ $category->nama_kategori }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Lokasi --}}
            <div class="mb-3">
                <label>Lokasi / Alamat</label>
                <input type="text" name="alamat" value="{{ old('alamat', $pariwisata->alamat) }}" class="form-control">
            </div>

            {{-- Gambar --}}
            <div class="mb-3">
                <label>Gambar</label>
                <input type="file" name="url_gambar_utama" class="form-control">
                @if($pariwisata->url_gambar_utama)
                    <small class="text-muted">Gambar saat ini: {{ $pariwisata->url_gambar_utama }}</small>
                @endif
            </div>

            {{-- Tombol --}}
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="{{ url('/') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
@endsection
