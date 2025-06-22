<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Destination;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(Request $request, $slug)
    {
        $destination = Destination::where('slug', $slug)->firstOrFail();

        $request->validate([
            'nama_pengunjung' => 'required|string|max:255',
            'email_pengunjung' => 'required|email|max:255',
            'rating' => 'required|integer|min:1|max:5',
            'komentar' => 'required|string',
        ]);

        Review::create([
            'humaira_destination_id' => $destination->id,
            'nama_pengunjung' => $request->nama_pengunjung,
            'email_pengunjung' => $request->email_pengunjung,
            'rating' => $request->rating,
            'komentar' => $request->komentar,
            'status_moderasi' => 'pending',
        ]);

        return back()->with('success', 'Terima kasih atas ulasannya! Ulasan Anda akan tampil setelah disetujui.');
    }

    public function index()
    {
        $reviews = Review::with('destination')->latest()->paginate(10);
        return view('admin.reviews.index', compact('reviews'));
    }

}
