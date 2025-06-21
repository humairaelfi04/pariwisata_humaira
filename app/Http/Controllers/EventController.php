<?php

namespace App\Http\Controllers;

use App\Models\HumairaEvent;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $events = HumairaEvent::latest()->get();
        return view('event.index', compact('events'));
    }

    public function create()
    {
        return view('event.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'tanggal_mulai' => 'required|date',
            'tanggal_berakhir' => 'nullable|date|after_or_equal:tanggal_mulai',
            'lokasi' => 'required|string|max:255',
            'penyelenggara' => 'nullable|string|max:255',
            'url_gambar_acara' => 'nullable|url'
        ]);

        HumairaEvent::create($validated);

        return redirect()->route('events.index')->with('success', 'Event berhasil ditambahkan.');
    }

    public function edit(HumairaEvent $event)
    {
        return view('event.edit', compact('event'));
    }

    public function update(Request $request, HumairaEvent $event)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'tanggal_mulai' => 'required|date',
            'tanggal_berakhir' => 'nullable|date|after_or_equal:tanggal_mulai',
            'lokasi' => 'required|string|max:255',
            'penyelenggara' => 'nullable|string|max:255',
            'url_gambar_acara' => 'nullable|url'
        ]);

        $event->update($validated);

        return redirect()->route('events.index')->with('success', 'Event berhasil diperbarui.');
    }

    public function destroy(HumairaEvent $event)
    {
        $event->delete();
        return redirect()->route('events.index')->with('success', 'Event berhasil dihapus.');
    }
}

