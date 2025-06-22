@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <h1 class="text-2xl font-bold mb-4">Daftar Kategori</h1>
        <a href="{{ route('admin.kategori.create') }}" class="btn btn-primary mb-3">+ Tambah Kategori</a>

        <table class="min-w-full bg-white">
            <thead>
                <tr>
                    <th class="py-2 px-4 border">Nama Kategori</th>
                    <th class="py-2 px-4 border">Jenis</th>
                    <th class="py-2 px-4 border">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($categories as $category)
                    <tr>
                        <td class="py-2 px-4 border">{{ $category->nama_kategori }}</td>
                        <td class="py-2 px-4 border">{{ ucfirst($category->jenis_kategori) }}</td>
                        <td class="py-2 px-4 border">
                            <a href="{{ route('admin.kategori.edit', $category->id) }}" class="text-yellow-500 mr-2">Edit</a>
                            <form action="{{ route('admin.kategori.destroy', $category->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button class="text-red-500" onclick="return confirm('Yakin hapus?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="3" class="text-center py-2">Belum ada kategori</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
