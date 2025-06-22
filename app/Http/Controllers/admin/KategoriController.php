<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('created_at', 'desc')->get();
        return view('admin.kategori.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.kategori.create'); // buat file ini nanti
    }

    public function store(Request $request)
    {
        // Validasi dan simpan data ke database
        $request->validate([
            'nama_kategori' => 'required|string|max:255',
            'jenis_kategori' => 'required|in:destinasi,umkm,acara',
        ]);

        Category::create([
            'nama_kategori' => $request->nama_kategori,
            'jenis_kategori' => $request->jenis_kategori,
        ]);

        return redirect()->route('admin.kategori.index')->with('success', 'Kategori berhasil ditambahkan');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.kategori.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255',
            'jenis_kategori' => 'required|in:destinasi,umkm,acara',
        ]);

        $category = Category::findOrFail($id);
        $category->nama_kategori = $request->nama_kategori;
        $category->jenis_kategori = $request->jenis_kategori;
        $category->save();

        return redirect()->route('admin.kategori.index')->with('success', 'Kategori berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $kategori = Category::findOrFail($id);
        $kategori->delete();

        return redirect()->route('admin.kategori.index')
            ->with('success', 'Kategori berhasil dihapus.');
    }




}
