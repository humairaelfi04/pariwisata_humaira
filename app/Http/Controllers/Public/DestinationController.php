<?php

// app/Http/Controllers/DestinationController.php
namespace App\Http\Controllers;

use App\Models\Destination;
use App\Models\Category;
use Illuminate\Http\Request;

class DestinationController extends Controller
{
    public function index()
    {
        $destinations = Destination::with('category')->orderBy('created_at', 'desc')->get();
        return view('admin.destinasi.index', compact('destinations'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.destinasi.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'alamat' => 'required',
            'harga_tiket' => 'nullable|numeric',
            'jam_operasional' => 'nullable',
            'status_publikasi' => 'required|in:published,draft',
            'category_id' => 'required|exists:humaira_categories,id',
            'url_gambar_utama' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('url_gambar_utama')) {
            $imagePath = $request->file('url_gambar_utama')->store('destinasi', 'public');
            $request->merge(['url_gambar_utama' => $imagePath]);
        }

        Destination::create($request->all());

        return redirect()->route('admin.destinasi.index')->with('success', 'Destinasi berhasil ditambahkan.');
    }

    public function edit(Destination $destinasi)
    {
        $categories = Category::all();
        return view('admin.destinasi.edit', compact('destinasi', 'categories'));
    }

    public function update(Request $request, Destination $destinasi)
    {
        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'alamat' => 'required',
            'harga_tiket' => 'nullable|numeric',
            'jam_operasional' => 'nullable',
            'status_publikasi' => 'required|in:published,draft',
            'category_id' => 'required|exists:humaira_categories,id',
            'url_gambar_utama' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('url_gambar_utama')) {
            $imagePath = $request->file('url_gambar_utama')->store('destinasi', 'public');
            $destinasi->url_gambar_utama = $imagePath;
        }

        $destinasi->update($request->except('url_gambar_utama'));

        return redirect()->route('admin.destinasi.index')->with('success', 'Destinasi berhasil diperbarui.');
    }

    public function destroy(Destination $destinasi)
    {
        $destinasi->delete();
        return redirect()->route('admin.destinasi.index')->with('success', 'Destinasi berhasil dihapus.');
    }
}


