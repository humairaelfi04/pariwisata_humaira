<?php

namespace App\Http\Controllers;

use App\Models\HumairaReview;
use App\Models\HumairaDestination;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(Request $request, $destinationId)
    {
        $validated = $request->validate([
            'nama_pengunjung' => 'required|string|max:255',
            'email_pengunjung' => 'nullable|email',
            'rating' => 'required|integer|min:1|max:5',
            'komentar' => 'required|string',
        ]);

        $validated['humaira_destination_id'] = $destinationId;
        $validated['status_moderasi'] = 'pending';

        HumairaReview::create($validated);

        return back()->with('success', 'Review berhasil dikirim dan menunggu moderasi.');
    }

    public function index()
    {
        $reviews = HumairaReview::latest()->get();
        return view('review.index', compact('reviews'));
    }

    public function updateStatus(Request $request, HumairaReview $review)
    {
        $request->validate([
            'status_moderasi' => 'required|in:pending,approved,rejected'
        ]);

        $review->status_moderasi = $request->status_moderasi;
        $review->save();

        return redirect()->route('reviews.index')->with('success', 'Status moderasi berhasil diperbarui.');
    }

    public function destroy(HumairaReview $review)
    {
        $review->delete();
        return redirect()->route('reviews.index')->with('success', 'Review berhasil dihapus.');
    }
}
