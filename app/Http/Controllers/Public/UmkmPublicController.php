<?php

namespace App\Http\Controllers\Public;

use App\Models\Umkm;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UmkmPublicController extends Controller
{
    //menampilkan daftar UMKM di halaman publik
    public function index(Request $request)
    {
        //get semua kategori UMKM
        $categories = Category::where('jenis_kategori', 'umkm')->get();

        //mulai query data UMKM
        $query = Umkm::query();

        //filter pencarian berdasarkan nama usaha
        if ($request->filled('search')) {
            $query->where('nama_usaha', 'like', '%' . $request->search . '%');
        }

        //filter berdasarkan kategori
        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }

        //get hasil dengan paginasi
        $umkm = $query->with('category')->latest()->paginate(12);

        return view('public.umkm.index', compact('umkm', 'categories'));
    }

    //show detail satu UMKM
    public function show($id)
    {
        $umkm = Umkm::with('category')->findOrFail($id);
        return view('public.umkm.show', compact('umkm'));
    }
}
