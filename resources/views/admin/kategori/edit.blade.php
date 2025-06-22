@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h1>Edit Kategori</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.kategori.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nama_kategori" class="form-label">Nama Kategori</label>
            <input type="text" name="nama_kategori" id="nama_kategori" class="form-control" value="{{ old('nama_kategori', $category->nama_kategori) }}" required>
        </div>

        <div class="mb-3">
            <label for="jenis_kategori" class="form-label">Jenis Kategori</label>
            <select name="jenis_kategori" id="jenis_kategori" class="form-control" required>
                <option value="destinasi" {{ old('jenis_kategori', $category->jenis_kategori) == 'destinasi' ? 'selected' : '' }}>Destinasi</option>
                <option value="umkm" {{ old('jenis_kategori', $category->jenis_kategori) == 'umkm' ? 'selected' : '' }}>UMKM</option>
                <option value="acara" {{ old('jenis_kategori', $category->jenis_kategori) == 'acara' ? 'selected' : '' }}>Acara</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('admin.kategori.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
