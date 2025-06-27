<?php

namespace App\Http\Controllers\Public;

use App\Models\Umkm;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UmkmPublicController extends Controller
{
    // Menampilkan daftar UMKM di halaman publik
    public function index(Request $request)
    {
        // Ambil semua kategori UMKM
        $categories = Category::where('jenis_kategori', 'umkm')->get();

        // Mulai query data UMKM
        $query = Umkm::query();

        // (Opsional) hanya tampilkan yang sudah disetujui
        // $query->where('status_persetujuan', 'approved');

        // Filter pencarian berdasarkan nama usaha
        if ($request->filled('search')) {
            $query->where('nama_usaha', 'like', '%' . $request->search . '%');
        }

        // Filter berdasarkan kategori
        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }

        // Ambil hasil dengan paginasi
        $umkm = $query->with('category')->latest()->paginate(12);

        return view('public.umkm.index', compact('umkm', 'categories'));
    }

    // Menampilkan detail satu UMKM
    public function show($id)
    {
        $umkm = Umkm::with('category')->findOrFail($id);
        return view('public.umkm.show', compact('umkm'));
    }
}
