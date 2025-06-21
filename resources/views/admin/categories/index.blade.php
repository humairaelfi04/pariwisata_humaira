@extends('layouts.admin')

@section('title', 'Manajemen Kategori')
@section('page-title', 'Manajemen Kategori')

@section('content')
    <div class="mb-4">
        <a href="{{ route('admin.categories.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            <i class="fas fa-plus"></i> Tambah Kategori
        </a>
    </div>
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Nama Kategori</th>
                    <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Jenis</th>
                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @forelse ($categories as $category)
                    <tr>
                        <td class="w-1/3 text-left py-3 px-4">{{ $category->nama_kategori }}</td>
                        <td class="w-1/3 text-left py-3 px-4">
                            <span class="px-2 py-1 font-semibold leading-tight rounded-full
                                {{ $category->jenis_kategori == 'destinasi' ? 'bg-green-100 text-green-800' : 'bg-purple-100 text-purple-800' }}">
                                {{ ucfirst($category->jenis_kategori) }}
                            </span>
                        </td>
                        <td class="text-left py-3 px-4">
                            <a href="{{ route('admin.categories.edit', $category) }}" class="text-yellow-500 hover:text-yellow-700 mr-2"><i class="fas fa-edit"></i></a>
                            <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" class="inline-block" onsubmit="return confirm('Apakah Anda yakin ingin menghapus kategori ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center py-4">Tidak ada data kategori.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-4">
        {{ $categories->links() }}
    </div>
@endsection
