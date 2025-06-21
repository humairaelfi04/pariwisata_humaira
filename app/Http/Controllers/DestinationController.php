<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DestinationController extends Controller
{
    public function index()
    {
        $destinations = Destination::with('category')->latest()->paginate(6);
        return view('homepage', compact('destinations'));
    }

    public function show($id)
    {
        $destination = Destination::with('category')->findOrFail($id);
        return view('show', compact('destination'));
    }

    public function create()
    {
        $categories = Category::where('jenis_kategori', 'destinasi')->get();
        return view('create-pariwisata', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|max:255',
            'deskripsi' => 'required',
            'alamat' => 'required',
            'harga_tiket' => 'nullable|numeric',
            'jam_operasional' => 'nullable',
            'status_publikasi' => 'required|in:published,draft',
            'category_id' => 'required|exists:humaira_categories,id',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $fileName = null;
        if ($request->hasFile('gambar')) {
            $fileName = time().'.'.$request->gambar->extension();
            $request->gambar->move(public_path('covers'), $fileName);
        }

        Destination::create([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'alamat' => $request->alamat,
            'harga_tiket' => $request->harga_tiket,
            'jam_operasional' => $request->jam_operasional,
            'status_publikasi' => $request->status_publikasi,
            'url_gambar_utama' => $fileName,
            'category_id' => $request->category_id,
        ]);

        return redirect('/')->with('success', 'Destinasi berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $destination = Destination::findOrFail($id);
        $categories = Category::where('jenis_kategori', 'destinasi')->get();
        return view('edit-pariwisata', compact('destination', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $destination = Destination::findOrFail($id);

        $request->validate([
            'nama' => 'required|max:255',
            'deskripsi' => 'required',
            'alamat' => 'required',
            'harga_tiket' => 'nullable|numeric',
            'jam_operasional' => 'nullable',
            'status_publikasi' => 'required|in:published,draft',
            'category_id' => 'required|exists:humaira_categories,id',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $fileName = time().'.'.$request->gambar->extension();
            $request->gambar->move(public_path('covers'), $fileName);
            $destination->url_gambar_utama = $fileName;
        }

        $destination->update([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'alamat' => $request->alamat,
            'harga_tiket' => $request->harga_tiket,
            'jam_operasional' => $request->jam_operasional,
            'status_publikasi' => $request->status_publikasi,
            'url_gambar_utama' => $destination->url_gambar_utama,
            'category_id' => $request->category_id,
        ]);

        return redirect('/')->with('success', 'Destinasi berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $destination = Destination::findOrFail($id);
        $destination->delete();

        return redirect('/')->with('success', 'Destinasi berhasil dihapus!');
    }
}
