<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewPublicController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'destination_id' => 'required|exists:humaira_destinations,id',
            'nama_pengunjung' => 'required|string|max:255',
            'email_pengunjung' => 'required|email|max:255',
            'rating' => 'required|integer|min:1|max:5',
            'komentar' => 'required|string',
        ]);

        Review::create([
            'humaira_destination_id' => $request->destination_id,
            'nama_pengunjung' => $request->nama_pengunjung,
            'email_pengunjung' => $request->email_pengunjung,
            'rating' => $request->rating,
            'komentar' => $request->komentar,
        ]);

        return redirect()->route('destinasi.show', $request->destination_id)
            ->with('success', 'Ulasan berhasil dikirim');
    }
}
