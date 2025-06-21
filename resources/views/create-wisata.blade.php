@extends('layouts.tamplate')

@section('content')
    <h1>Form Tambah Tempat Wisata</h1>

    <form action="{{ route('pariwisata.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        {{-- Title --}}
        <div class="mb-3 row">
            <label for="title" class="col-sm-2 col-form-label">Nama Tempat</label>
            <div class="col-sm-6">
                <input type="text" id="title" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}">
                @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
        </div>

        {{-- Description --}}
        <div class="mb-3 row">
            <label for="description" class="col-sm-2 col-form-label">Deskripsi</label>
            <div class="col-sm-6">
                <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
        </div>

        {{-- Category --}}
        <div class="mb-3 row">
            <label for="category_id" class="col-sm-2 col-form-label">Kategori</label>
            <div class="col-sm-6">
                <select id="category_id" name="category_id" class="form-select @error('category_id') is-invalid @enderror">
                    <option selected disabled>-- Pilih Kategori --</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->nama_kategori }}</option>
                    @endforeach
                </select>
                @error('category_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
        </div>

        {{-- Location --}}
        <div class="mb-3 row">
            <label for="location" class="col-sm-2 col-form-label">Lokasi</label>
            <div class="col-sm-6">
                <input type="text" id="location" name="location" class="form-control @error('location') is-invalid @enderror" value="{{ old('location') }}">
                @error('location') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
        </div>

        {{-- Facilities --}}
        <div class="mb-3 row">
            <label for="facilities" class="col-sm-2 col-form-label">Fasilitas</label>
            <div class="col-sm-6">
                <input type="text" id="facilities" name="facilities" class="form-control @error('facilities') is-invalid @enderror" value="{{ old('facilities') }}">
                @error('facilities') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
        </div>

        {{-- Image --}}
        <div class="mb-3 row">
            <label for="image" class="col-sm-2 col-form-label">Gambar</label>
            <div class="col-sm-6">
                <input type="file" id="image" name="image" class="form-control @error('image') is-invalid @enderror">
                @error('image') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
        </div>

        {{-- Submit --}}
        <div class="mb-3 row">
            <div class="col-sm-6 offset-sm-2">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </form>
@endsection
