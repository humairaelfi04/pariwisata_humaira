<?php

namespace App\Http\Controllers\Admin;

use App\Models\Umkm;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

class UmkmController extends Controller
{
    public function index()
    {
        $umkms = Umkm::with('category')->get();
        return view('admin.umkm.index', compact('umkms'));
    }

    public function create()
    {
        $categories = Category::where('jenis_kategori', 'umkm')->get();
        return view('admin.umkm.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_usaha'         => 'required|string',
            'deskripsi_layanan'  => 'required|string',
            'narahubung'         => 'required|string',
            'nomor_telepon'      => 'required|string',
            'alamat_umkm'        => 'required|string',
            'category_id'        => 'required|exists:humaira_categories,id',
            'url_gambar_umkm'    => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->all();

        //upload gambar
        if ($request->hasFile('url_gambar_umkm')) {
            $gambar = $request->file('url_gambar_umkm')->store('umkm', 'public');
            $data['url_gambar_umkm'] = $gambar;
        }

        Umkm::create($data);

        return redirect()->route('admin.umkm.index')->with('success', 'UMKM berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $umkm = Umkm::findOrFail($id);
        $categories = Category::where('jenis_kategori', 'umkm')->get();
        return view('admin.umkm.edit', compact('umkm', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $umkm = Umkm::findOrFail($id);

        $request->validate([
            'nama_usaha'         => 'required|string',
            'deskripsi_layanan'  => 'required|string',
            'narahubung'         => 'required|string',
            'nomor_telepon'      => 'required|string',
            'alamat_umkm'        => 'required|string',
            'category_id'        => 'required|exists:humaira_categories,id',
            'url_gambar_umkm'    => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->all();

        //update gambar jika ada yang baru
        if ($request->hasFile('url_gambar_umkm')) {
            //hapus gambar lama jika ada
            if ($umkm->url_gambar_umkm && Storage::disk('public')->exists($umkm->url_gambar_umkm)) {
                Storage::disk('public')->delete($umkm->url_gambar_umkm);
            }

            $gambar = $request->file('url_gambar_umkm')->store('umkm', 'public');
            $data['url_gambar_umkm'] = $gambar;
        }

        $umkm->update($data);

        return redirect()->route('admin.umkm.index')->with('success', 'UMKM berhasil diperbarui.');
    }

    public function show($id)
    {
        $umkm = Umkm::with('category')->findOrFail($id);
        return view('admin.umkm.show', compact('umkm'));
    }

    public function destroy($id)
    {
        $umkm = Umkm::findOrFail($id);

        //hapus gambar jika ada
        if ($umkm->url_gambar_umkm && Storage::disk('public')->exists($umkm->url_gambar_umkm)) {
            Storage::disk('public')->delete($umkm->url_gambar_umkm);
        }

        $umkm->delete();

        return redirect()->route('admin.umkm.index')->with('success', 'UMKM berhasil dihapus.');
    }
}
