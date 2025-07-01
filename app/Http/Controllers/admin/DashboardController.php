<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Destination;
use App\Models\Umkm;
use App\Models\Event;
use App\Models\Review;

class DashboardController extends Controller
{
    public function index()
    {
        $totalDestinasi = Destination::count();
        $totalUmkm = Umkm::count();
        $totalEvent = Event::count();
        $totalReview = Review::count();
        $totalReviewDisetujui = Review::where('status_moderasi', 'disetujui')->count();

        $reviewProgress = $totalReview > 0
            ? round(($totalReviewDisetujui / $totalReview) * 100)
            : 0;

        // 👇 Query untuk mengambil 3 event terbaru
        $latestEvents = Event::orderBy('tanggal_mulai', 'desc')->limit(3)->get();

        return view('admin.dashboard', compact(
            'totalDestinasi',
            'totalUmkm',
            'totalEvent',
            'totalReview',
            'reviewProgress',
            'latestEvents' // 👈 kirim ke view
        ));
    }
    private function getReviewProgress()
    {
        $total = Review::count();
        $approved = Review::where('status_moderasi', 'disetujui')->count();

        return $total > 0 ? round(($approved / $total) * 100) : 0;
    }
}

