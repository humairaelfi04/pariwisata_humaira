<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\Destination;
use Illuminate\Http\Request;
use App\Models\HumairaDestination;
use App\Http\Controllers\Controller;


class DestinasiController extends Controller
{
    public function index()
    {
        $destinasi = Destination::latest()->get();

        return view('admin.destinasi.index', compact('destinasi'));
    }

    public function create()
    {
        $category = Category::where('jenis_kategori', 'destinasi')->get();
        return view('admin.destinasi.create', [
            'category' => $category,
            'destinasi' => null,
            'button' => 'Simpan'
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required',
            'alamat' => 'required',
            'harga_tiket' => 'required|numeric',
            'jam_operasional' => 'required',
            'category_id' => 'required|exists:humaira_categories,id',
            'url_gambar_utama' => 'nullable|image|max:2048',
        ]);

        // Upload gambar
        if ($request->hasFile('url_gambar_utama')) {
            $gambar = $request->file('url_gambar_utama');
            $namaFile = time() . '_' . $gambar->getClientOriginalName();
            $gambar->move(public_path('images'), $namaFile);
            $validated['url_gambar_utama'] = $namaFile;
        }

        \App\Models\Destination::create($validated);

        return redirect()->route('destinasi.index')->with('success', 'Destinasi berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $destinasi = Destination::findOrFail($id);
        $category = Category::where('jenis_kategori', 'destinasi')->get();

        return view('admin.destinasi.edit', [
            'destinasi' => $destinasi,
            'category' => $category,
            'button' => 'Update'
        ]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required',
            'alamat' => 'required',
            'harga_tiket' => 'required|numeric',
            'jam_operasional' => 'required',
            'category_id' => 'required|exists:humaira_categories,id',
            'url_gambar_utama' => 'nullable|image|max:2048',
        ]);

        $destinasi = \App\Models\Destination::findOrFail($id);

        //upload gambar baru jika ada
        if ($request->hasFile('url_gambar_utama')) {
            $gambar = $request->file('url_gambar_utama');
            $namaFile = time() . '_' . $gambar->getClientOriginalName();
            $gambar->move(public_path('images'), $namaFile);
            $validated['url_gambar_utama'] = $namaFile;
        }

        $destinasi->update($validated);

        return redirect()->route('destinasi.index')->with('success', 'Destinasi berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $destinasi = \App\Models\Destination::findOrFail($id);

        //hapus gambar dari public/images
        if ($destinasi->url_gambar_utama && file_exists(public_path('images/' . $destinasi->url_gambar_utama))) {
            unlink(public_path('images/' . $destinasi->url_gambar_utama));
        }

        $destinasi->delete();

        return redirect()->route('destinasi.index')->with('success', 'Destinasi berhasil dihapus.');
    }

    public function show($id)
    {
        $destinasi = \App\Models\Destination::findOrFail($id);
        return view('admin.destinasi.show', compact('destinasi'));
    }





}
