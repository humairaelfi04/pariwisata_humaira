<?php

namespace App\Http\Controllers;

use App\Models\Umkm;
use App\Models\Category;
use Illuminate\Http\Request;

class UmkmController extends Controller
{
    public function index()
    {
        $umkms = Umkm::with('category')->latest()->paginate(10);
        return view('umkm.index', compact('umkms'));
    }

    public function show($id)
    {
        $umkm = Umkm::with('category')->findOrFail($id);
        return view('umkm.show', compact('umkm'));
    }

    public function create()
    {
        $categories = Category::where('jenis_kategori', 'umkm')->get();
        return view('umkm.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_usaha' => 'required',
            'deskripsi_layanan' => 'required',
            'narahubung' => 'required',
            'nomor_telepon' => 'required',
            'alamat_umkm' => 'required',
            'status_persetujuan' => 'required|in:pending,approved,rejected',
            'category_id' => 'required|exists:humaira_categories,id',
        ]);

        Umkm::create($request->all());

        return redirect()->route('umkm.index')->with('success', 'UMKM berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $umkm = Umkm::findOrFail($id);
        $categories = Category::where('jenis_kategori', 'umkm')->get();
        return view('umkm.edit', compact('umkm', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $umkm = Umkm::findOrFail($id);

        $request->validate([
            'nama_usaha' => 'required',
            'deskripsi_layanan' => 'required',
            'narahubung' => 'required',
            'nomor_telepon' => 'required',
            'alamat_umkm' => 'required',
            'status_persetujuan' => 'required|in:pending,approved,rejected',
            'category_id' => 'required|exists:humaira_categories,id',
        ]);

        $umkm->update($request->all());

        return redirect()->route('umkm.index')->with('success', 'UMKM berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $umkm = Umkm::findOrFail($id);
        $umkm->delete();

        return redirect()->route('umkm.index')->with('success', 'UMKM berhasil dihapus!');
    }
}

