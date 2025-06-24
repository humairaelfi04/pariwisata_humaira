@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4 sm:px-6 lg:px-8 mt-8">
    {{-- Heading --}}
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">📁 Manajemen Kategori</h1>
        <a href="{{ route('admin.kategori.create') }}"
           class="inline-flex items-center bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-medium px-4 py-2 rounded shadow transition">
            ➕ Tambah Kategori
        </a>
    </div>

    {{-- Alert Success --}}
    @if(session('success'))
        <div class="mb-4 bg-green-100 border border-green-300 text-green-700 px-4 py-3 rounded shadow-sm">
            {{ session('success') }}
        </div>
    @endif

    {{-- Tabel Kategori --}}
    <div class="bg-white shadow-md rounded overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50 sticky top-0">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Kategori</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jenis</th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-100">
                    @forelse ($categories as $category)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ $category->nama_kategori }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium
                                    {{ $category->jenis_kategori === 'destinasi' ? 'bg-blue-100 text-blue-700' : 'bg-violet-100 text-violet-700' }}">
                                    {{ ucfirst($category->jenis_kategori) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm">
                                <a href="{{ route('admin.kategori.edit', $category->id) }}"
                                   class="text-yellow-500 hover:text-yellow-600 font-medium mr-3 transition duration-150">
                                    ✏️ Edit
                                </a>
                                <form action="{{ route('admin.kategori.destroy', $category->id) }}" method="POST" class="inline-block"
                                      onsubmit="return confirm('Yakin ingin menghapus kategori ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-600 font-medium transition duration-150">
                                        🗑️ Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center text-gray-500 py-6">
                                Belum ada kategori yang tersedia.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
