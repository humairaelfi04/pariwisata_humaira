@extends('layouts.admin')

@section('content')
<h1>Edit Event</h1>

<form action="{{ route('admin.event.update', $event->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <input type="text" name="judul" value="{{ $event->judul }}" class="form-control mb-2" required>
    <textarea name="deskripsi" class="form-control mb-2" required>{{ $event->deskripsi }}</textarea>
    <input type="date" name="tanggal_mulai" value="{{ $event->tanggal_mulai }}" class="form-control mb-2" required>
    <input type="date" name="tanggal_berakhir" value="{{ $event->tanggal_berakhir }}" class="form-control mb-2">
    <input type="text" name="lokasi" value="{{ $event->lokasi }}" class="form-control mb-2" required>
    <input type="text" name="penyelenggara" value="{{ $event->penyelenggara }}" class="form-control mb-2">
    <input type="file" name="url_gambar_acara" class="form-control mb-2" accept="image/*">
    @if ($event->url_gambar_acara)
        <p>Gambar saat ini:</p>
        <img src="{{ asset('images/' . $event->url_gambar_acara) }}" alt="Gambar Event" class="img-thumbnail mb-2" width="200">
    @endif
    <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection
