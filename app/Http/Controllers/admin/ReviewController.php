<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::with('destination')->latest()->get();
        return view('admin.review.index', compact('reviews'));
    }

    public function updateStatus($id)
    {
        $review = Review::findOrFail($id);
        $review->status_moderasi = 'approved';
        $review->save();

        return redirect()->back()->with('success', 'Ulasan disetujui.');
    }


    public function destroy($id)
    {
        $review = Review::findOrFail($id);
        $review->delete();

        return redirect()->back()->with('success', 'Ulasan berhasil dihapus.');
    }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'destination_id' => 'required|exists:humaira_destinations,id',
    //         'nama_pengunjung' => 'required|string|max:255',
    //         'email_pengunjung' => 'required|email|max:255',
    //         'rating' => 'required|integer|min:1|max:5',
    //         'komentar' => 'required|string',
    //     ]);

    //     \App\Models\Review::create([
    //         'humaira_destination_id' => $request->destination_id, // INI PENTING!
    //         'nama_pengunjung' => $request->nama_pengunjung,
    //         'email_pengunjung' => $request->email_pengunjung,
    //         'rating' => $request->rating,
    //         'komentar' => $request->komentar,
    //     ]);

    //     return redirect()->back()->with('success', 'Ulasan berhasil dikirim!');
    // }


}


