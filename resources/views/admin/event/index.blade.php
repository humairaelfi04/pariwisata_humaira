@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Daftar Event</h2>
        <a href="{{ route('admin.event.create') }}" class="btn btn-primary">+ Tambah Event</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($events->isEmpty())
        <div class="alert alert-info">
            Belum ada event yang tersedia.
        </div>
    @else
        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-secondary">
                    <tr>
                        <th>#</th>
                        <th>Gambar</th>
                        <th>Judul</th>
                        <th>Tanggal</th>
                        <th>Lokasi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($events as $index => $event)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>
                                @if($event->url_gambar_acara)
                                    <img src="{{ asset('images/' . $event->url_gambar_acara) }}" alt="Gambar" width="80">
                                @else
                                    <span class="text-muted">Tidak ada</span>
                                @endif
                            </td>
                            <td>{{ $event->judul }}</td>
                            <td>
                                {{ $event->tanggal_mulai }}
                                @if($event->tanggal_berakhir)
                                    <br>s/d {{ $event->tanggal_berakhir }}
                                @endif
                            </td>
                            <td>{{ $event->lokasi }}</td>
                            <td>
                                <a href="{{ route('admin.event.show', $event->id) }}" class="btn btn-sm btn-info">Lihat</a>
                                <a href="{{ route('admin.event.edit', $event->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('admin.event.destroy', $event->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Yakin ingin menghapus event ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection
