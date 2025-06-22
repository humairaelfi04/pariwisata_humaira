<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::with('destination')->latest()->paginate(10);
        return view('admin.review.index', compact('reviews'));
    }

    public function approve($id)
    {
        $review = Review::findOrFail($id);
        $review->status_moderasi = 'disetujui';
        $review->save();

        return redirect()->route('admin.review.index')->with('success', 'Ulasan berhasil disetujui.');
    }

    public function destroy($id)
    {
        Review::destroy($id);
        return back()->with('success', 'Ulasan berhasil dihapus.');
    }
}

