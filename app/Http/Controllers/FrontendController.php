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

        //search filter
        if ($request->has('search')) {
            $query->where('nama', 'like', '%' . $request->search . '%');
        }

        //category filter
        if ($request->has('category')) {
            $query->where('category_id', $request->category);
        }

        $destinations = $query->latest()->paginate(8);
        $categories = Category::where('jenis_kategori', 'destinasi')->get();

        return view('frontend.destinasi.index', compact('destinations', 'categories'));
    }

    public function show($id)
    {
        $destinasi = Destination::with([
            'category',
            'reviews' => function ($query) {
                $query->where('status_moderasi', 'approved');
            }
        ])->findOrFail($id);

        return view('frontend.destinasi.show', compact('destinasi'));
    }
}
