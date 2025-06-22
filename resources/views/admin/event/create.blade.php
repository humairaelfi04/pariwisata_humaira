@extends('layouts.admin')

@section('content')
<h1>Tambah Event</h1>

<form action="{{ route('admin.event.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="text" name="judul" placeholder="Judul Event" class="form-control mb-2" required>
    <textarea name="deskripsi" placeholder="Deskripsi" class="form-control mb-2" required></textarea>
    <input type="date" name="tanggal_mulai" class="form-control mb-2" required>
    <input type="date" name="tanggal_berakhir" class="form-control mb-2">
    <input type="text" name="lokasi" placeholder="Lokasi" class="form-control mb-2" required>
    <input type="text" name="penyelenggara" placeholder="Penyelenggara" class="form-control mb-2">
    <input type="file" name="url_gambar_acara" class="form-control mb-2" accept="image/*">
    <button type="submit" class="btn btn-success">Simpan</button>
</form>
@endsection
