@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h1>Tambah UMKM</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('admin.umkm.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="nama_usaha">Nama Usaha</label>
            <input type="text" id="nama_usaha" name="nama_usaha" class="form-control" value="{{ old('nama_usaha') }}" required>
        </div>

        <div class="mb-3">
            <label for="deskripsi_layanan">Deskripsi Layanan</label>
            <textarea id="deskripsi_layanan" name="deskripsi_layanan" class="form-control" required>{{ old('deskripsi_layanan') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="narahubung">Narahubung</label>
            <input type="text" id="narahubung" name="narahubung" class="form-control" value="{{ old('narahubung') }}" required>
        </div>

        <div class="mb-3">
            <label for="nomor_telepon">Nomor Telepon</label>
            <input type="text" id="nomor_telepon" name="nomor_telepon" class="form-control" value="{{ old('nomor_telepon') }}" required>
        </div>

        <div class="mb-3">
            <label for="alamat_umkm">Alamat UMKM</label>
            <input type="text" id="alamat_umkm" name="alamat_umkm" class="form-control" value="{{ old('alamat_umkm') }}" required>
        </div>

        {{-- <div class="mb-3">
            <label for="status_persetujuan">Status Persetujuan</label>
            <select id="status_persetujuan" name="status_persetujuan" class="form-control" required>
                <option value="pending" {{ old('status_persetujuan') == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="approved" {{ old('status_persetujuan') == 'approved' ? 'selected' : '' }}>Approved</option>
                <option value="rejected" {{ old('status_persetujuan') == 'rejected' ? 'selected' : '' }}>Rejected</option>
            </select>
        </div> --}}

        <div class="mb-3">
            <label for="category_id">Kategori</label>
            <select id="category_id" name="category_id" class="form-control" required>
                @foreach($categories as $kat)
                    <option value="{{ $kat->id }}" {{ old('category_id') == $kat->id ? 'selected' : '' }}>
                        {{ $kat->nama_kategori }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
