<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Umkm;
use Illuminate\Http\Request;

class UmkmPublicController extends Controller
{
    public function index()
    {
        $umkm = Umkm::all(); // Ambil semua UMKM tanpa filter status
        return view('public.umkm.index', compact('umkm'));

    }

    public function show($id)
    {
        $umkm = Umkm::with('category')->findOrFail($id);
        return view('public.umkm.show', compact('umkm'));
    }
}
