<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;

class ReviewPublicController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'destination_id' => 'required|exists:humaira_destinations,id',
            'nama_pengunjung' => 'required',
            'email_pengunjung' => 'required|email',
            'rating' => 'required|integer|min:1|max:5',
            'komentar' => 'required',
        ]);

        Review::create([
            'humaira_destination_id' => $request->destination_id, // ✅ ganti ini
            'nama_pengunjung' => $request->nama_pengunjung,
            'email_pengunjung' => $request->email_pengunjung,
            'rating' => $request->rating,
            'komentar' => $request->komentar,
            'status_moderasi' => 'pending',
        ]);


        return back()->with('success', 'Ulasan berhasil dikirim!');
    }
}


