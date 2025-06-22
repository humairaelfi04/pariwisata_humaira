@extends('layouts.admin')

@section('content')
<div class="container mx-auto p-4">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-xl font-bold">Daftar Destinasi Wisata</h1>
        <a href="{{ route('destinasi.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded shadow">
            + Tambah Destinasi
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-300 text-green-800 px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if ($destinasi->count())
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($destinasi as $item)
                <div class="bg-white rounded shadow hover:shadow-lg transition p-4">
                    @if ($item->url_gambar_utama)
                        <img src="{{ asset('images/' . $item->url_gambar_utama) }}"
                             alt="{{ $item->nama }}"
                             class="w-full h-48 object-cover rounded mb-3">
                    @endif
                    <h2 class="text-lg font-semibold mb-1">{{ $item->nama }}</h2>
                    <p class="text-sm text-gray-600 mb-2">{{ $item->alamat }}</p>

                    <div class="flex justify-between text-sm mt-2">
                        <a href="{{ route('destinasi.show', $item->id) }}" class="text-blue-500 hover:underline">Detail</a>
                        <a href="{{ route('destinasi.edit', $item->id) }}" class="text-yellow-500 hover:underline">Edit</a>
                        <form action="{{ route('destinasi.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin hapus destinasi ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:underline">Hapus</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="text-center text-gray-500 mt-8">
            Belum ada destinasi wisata yang ditambahkan.
        </div>
    @endif
</div>
@endsection
