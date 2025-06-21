@extends('layouts.tamplate')

@section('content')
    <h1 class="mb-4">Tempat Wisata Terbaru</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="row">
        @foreach($pariwisatas as $wisata)
            <div class="col-md-4 mb-4">
                <div class="card">
                    @if($wisata->url_gambar_utama)
                        <img src="{{ asset('images/' . $wisata->url_gambar_utama) }}" class="card-img-top" alt="{{ $wisata->nama }}">
                    @else
                        <img src="https://via.placeholder.com/300x200?text=No+Image" class="card-img-top" alt="No image">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $wisata->nama }}</h5>
                        <p class="card-text">{{ \Illuminate\Support\Str::limit($wisata->deskripsi, 100) }}</p>
                        <p><strong>Lokasi:</strong> {{ $wisata->alamat }}</p>

                        <a href="{{ route('pariwisata.show', $wisata->id) }}" class="btn btn-success btn-sm">Lihat Detail</a>
                        <a href="{{ route('pariwisata.edit', $wisata->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('pariwisata.destroy', $wisata->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Apakah Anda yakin ingin menghapus tempat wisata ini?')">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="d-flex justify-content-center">
        {{ $pariwisatas->links() }}
    </div>
@endsection
