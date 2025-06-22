@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h1>Tambah Kategori</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.kategori.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="nama_kategori" class="form-label">Nama Kategori</label>
            <input type="text" name="nama_kategori" id="nama_kategori" class="form-control" value="{{ old('nama_kategori') }}" required>
        </div>

        <div class="mb-3">
            <label>Jenis Kategori</label>
            <select name="jenis_kategori" class="form-control">
                <option value="destinasi">Destinasi</option>
                <option value="umkm">UMKM</option>
                <option value="acara">Acara</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('admin.kategori.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
