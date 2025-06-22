<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::latest()->get();
        return view('admin.events.index', compact('events'));
    }

    public function create()
    {
        return view('admin.events.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'tanggal_mulai' => 'required|date',
            'tanggal_berakhir' => 'required|date|after_or_equal:tanggal_mulai',
            'lokasi' => 'required|string|max:255',
            'penyelenggara' => 'nullable|string|max:255',
            'url_gambar_acara' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $gambar = null;
        if ($request->hasFile('url_gambar_acara')) {
            $gambar = time() . '.' . $request->url_gambar_acara->extension();
            $request->url_gambar_acara->move(public_path('images/events'), $gambar);
        }

        Event::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_berakhir' => $request->tanggal_berakhir,
            'lokasi' => $request->lokasi,
            'penyelenggara' => $request->penyelenggara,
            'url_gambar_acara' => $gambar,
        ]);

        return redirect()->route('events.index')->with('success', 'Acara berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $event = Event::findOrFail($id);
        return view('admin.events.edit', compact('event'));
    }

    public function update(Request $request, $id)
    {
        $event = Event::findOrFail($id);

        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'tanggal_mulai' => 'required|date',
            'tanggal_berakhir' => 'required|date|after_or_equal:tanggal_mulai',
            'lokasi' => 'required|string|max:255',
            'penyelenggara' => 'nullable|string|max:255',
            'url_gambar_acara' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('url_gambar_acara')) {
            $gambar = time() . '.' . $request->url_gambar_acara->extension();
            $request->url_gambar_acara->move(public_path('images/events'), $gambar);
            $event->url_gambar_acara = $gambar;
        }

        $event->update([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_berakhir' => $request->tanggal_berakhir,
            'lokasi' => $request->lokasi,
            'penyelenggara' => $request->penyelenggara,
            'url_gambar_acara' => $event->url_gambar_acara,
        ]);

        return redirect()->route('events.index')->with('success', 'Acara berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();

        return redirect()->route('events.index')->with('success', 'Acara berhasil dihapus.');
    }
}


