@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h1>Edit UMKM</h1>

    <form action="{{ route('umkm.update', $umkm->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nama Usaha</label>
            <input type="text" name="nama_usaha" class="form-control" value="{{ old('nama_usaha', $umkm->nama_usaha) }}" required>
        </div>

        <div class="mb-3">
            <label>Deskripsi Layanan</label>
            <textarea name="deskripsi_layanan" class="form-control" required>{{ old('deskripsi_layanan', $umkm->deskripsi_layanan) }}</textarea>
        </div>

        <div class="mb-3">
            <label>Narahubung</label>
            <input type="text" name="narahubung" class="form-control" value="{{ old('narahubung', $umkm->narahubung) }}" required>
        </div>

        <div class="mb-3">
            <label>Nomor Telepon</label>
            <input type="text" name="nomor_telepon" class="form-control" value="{{ old('nomor_telepon', $umkm->nomor_telepon) }}" required>
        </div>

        <div class="mb-3">
            <label>Alamat UMKM</label>
            <input type="text" name="alamat_umkm" class="form-control" value="{{ old('alamat_umkm', $umkm->alamat_umkm) }}" required>
        </div>

        {{-- <div class="mb-3">
            <label>Status Persetujuan</label>
            <select name="status_persetujuan" class="form-control" required>
                <option value="pending" {{ old('status_persetujuan', $umkm->status_persetujuan) == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="approved" {{ old('status_persetujuan', $umkm->status_persetujuan) == 'approved' ? 'selected' : '' }}>Approved</option>
                <option value="rejected" {{ old('status_persetujuan', $umkm->status_persetujuan) == 'rejected' ? 'selected' : '' }}>Rejected</option>
            </select>
        </div> --}}

        <div class="mb-3">
            <label>Kategori</label>
            <select name="category_id" class="form-control" required>
                @foreach($categories as $kat)
                    <option value="{{ $kat->id }}" {{ old('category_id', $umkm->category_id) == $kat->id ? 'selected' : '' }}>
                        {{ $kat->nama_kategori }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection
