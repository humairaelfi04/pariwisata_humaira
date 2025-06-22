<!-- Nama Kategori -->
<div class="mb-4">
    <label for="nama_kategori" class="block text-gray-700 text-sm font-bold mb-2">Nama Kategori:</label>
    <input type="text" name="nama_kategori" id="nama_kategori" value="{{ old('nama_kategori', $category->nama_kategori ?? '') }}"
           class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('nama_kategori') border-red-500 @enderror">
    @error('nama_kategori')
        <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
    @enderror
</div>

<!-- Jenis Kategori -->
<div class="mb-4">
    <label for="jenis_kategori" class="block text-gray-700 text-sm font-bold mb-2">Jenis Kategori:</label>
    <select name="jenis_kategori" id="jenis_kategori"
            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('jenis_kategori') border-red-500 @enderror">
        <option value="">Pilih Jenis</option>
        <option value="destinasi" {{ old('jenis_kategori', $category->jenis_kategori ?? '') == 'destinasi' ? 'selected' : '' }}>Destinasi</option>
        <option value="umkm" {{ old('jenis_kategori', $category->jenis_kategori ?? '') == 'umkm' ? 'selected' : '' }}>UMKM</option>
    </select>
    @error('jenis_kategori')
        <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
    @enderror
</div>

<!-- Tombol Aksi -->
<div class="flex items-center justify-start">
    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
        Simpan Kategori
    </button>
    <a href="{{ route('admin.kategori.index') }}" class="ml-4 bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
        Batal
    </a>
</div>
