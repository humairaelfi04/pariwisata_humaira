<?php

namespace App\Http\Controllers;

use App\Models\Pariwisata;
use App\Models\Category;
use App\Models\Destination;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PariwisataController extends Controller
{
    public function homepage()
    {
        $pariwisatas = Destination::latest()->paginate(8);
        return view('homepage', compact('pariwisatas'));
    }

    public function show($id)
    {
        $pariwisata = Destination::with('category')->findOrFail($id);
        return view('show', compact('pariwisata'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('create-wisata', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'category_id' => 'required|exists:humaira_categories,id',
            'location' => 'required|string|max:255',
            'facilities' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $imageName = null;
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
        }

        Destination::create([
            'nama' => $request->title,
            'slug' => Str::slug($request->nama),
            'deskripsi' => $request->description,
            'alamat' => $request->location,
            'harga_tiket' => null, // Bisa tambahkan input jika ingin
            'jam_operasional' => null, // Bisa tambahkan input jika ingin
            'status_publikasi' => 'draft', // default
            'url_gambar_utama' => $imageName,
            'category_id' => $request->category_id,
        ]);

        return redirect('/')->with('success', 'Tempat wisata berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $pariwisata = Destination::findOrFail($id);
        $categories = Category::all();
        return view('edit-pariwisata', compact('pariwisata', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $pariwisata = Destination::findOrFail($id);

        $request->validate([
            'nama' => 'required|max:255',
            'deskripsi' => 'nullable',
            'category_id' => 'required|exists:humaira_categories,id',
            'alamat' => 'required|string|max:255',
            'facilities' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $pariwisata->image = $imageName; // atau `url_gambar_utama` jika nama kolomnya itu
        }

        $pariwisata->update([
            'nama' => $request->nama,
            'slug' => Str::slug($request->nama), // optional
            'deskripsi' => $request->deskripsi,
            'category_id' => $request->category_id,
            'alamat' => $request->alamat,
            'facilities' => $request->facilities,
            'image' => $pariwisata->image, // atau `url_gambar_utama`
        ]);

        return redirect('/')->with('success', 'Tempat wisata berhasil diperbarui!');
    }


    public function destroy($id)
    {
        if (Gate::allows('delete')) {
            $pariwisata = Destination::findOrFail($id);
            $pariwisata->delete();

            return redirect('/')->with('success', 'Tempat wisata berhasil dihapus!');
        } else {
            abort(403);
        }
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        $pariwisatas = Destination::where('title', 'like', '%' . $query . '%')->get();

        return view('search_result', compact('pariwisatas', 'query'));
    }
}
