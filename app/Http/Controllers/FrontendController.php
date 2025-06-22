<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use App\Models\Category;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(Request $request)
    {
        $query = Destination::query()->with('category');

        // Optional search filter
        if ($request->has('search')) {
            $query->where('nama', 'like', '%' . $request->search . '%');
        }

        // Optional category filter
        if ($request->has('category')) {
            $query->where('category_id', $request->category);
        }

        $destinations = $query->latest()->paginate(6);
        $categories = Category::where('jenis_kategori', 'destinasi')->get();

        return view('frontend.destinasi.index', compact('destinations', 'categories'));
    }

    public function show($id)
    {
        $destinasi = Destination::findOrFail($id);
        return view('frontend.destinasi.show', compact('destinasi'));
    }
}
