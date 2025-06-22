<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::latest()->get();
        return view('admin.event.index', compact('events'));
    }

    public function create()
    {
        return view('admin.event.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required',
            'tanggal_mulai' => 'required|date',
            'tanggal_berakhir' => 'nullable|date|after_or_equal:tanggal_mulai',
            'lokasi' => 'required|string|max:255',
            'penyelenggara' => 'nullable|string|max:255',
            'url_gambar_acara' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // Upload gambar jika ada
        if ($request->hasFile('url_gambar_acara')) {
            $gambar = $request->file('url_gambar_acara');
            $namaFile = time() . '_' . $gambar->getClientOriginalName();
            $gambar->move(public_path('images'), $namaFile);
            $validated['url_gambar_acara'] = $namaFile;
        }

        Event::create($validated);

        return redirect()->route('admin.event.index')->with('success', 'Event berhasil ditambahkan');
    }

    public function edit(Event $event)
    {
        return view('admin.event.edit', compact('event'));
    }

    public function update(Request $request, Event $event)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required',
            'tanggal_mulai' => 'required|date',
            'tanggal_berakhir' => 'nullable|date|after_or_equal:tanggal_mulai',
            'lokasi' => 'required|string|max:255',
            'penyelenggara' => 'nullable|string|max:255',
            'url_gambar_acara' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // Upload gambar baru jika ada
        if ($request->hasFile('url_gambar_acara')) {
            $gambar = $request->file('url_gambar_acara');
            $namaFile = time() . '_' . $gambar->getClientOriginalName();
            $gambar->move(public_path('images'), $namaFile);
            $validated['url_gambar_acara'] = $namaFile;

            // Hapus gambar lama jika ada
            if ($event->url_gambar_acara && file_exists(public_path('images/' . $event->url_gambar_acara))) {
                unlink(public_path('images/' . $event->url_gambar_acara));
            }
        }

        $event->update($validated);

        return redirect()->route('admin.event.index')->with('success', 'Event berhasil diperbarui');
    }

    public function show(Event $event)
    {
        return view('admin.event.show', compact('event'));
    }

    public function destroy(Event $event)
    {
        // Hapus gambar dari public/images jika ada
        if ($event->url_gambar_acara && file_exists(public_path('images/' . $event->url_gambar_acara))) {
            unlink(public_path('images/' . $event->url_gambar_acara));
        }

        $event->delete();

        return redirect()->route('admin.event.index')->with('success', 'Event berhasil dihapus');
    }
}
