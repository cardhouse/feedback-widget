<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Song;

class SongController extends Controller
{
    public function index()
    {
        $songs = auth()->user()->songs;
        return view('songs')->withSongs($songs);
    }

    public function create()
    {
        return view('songs.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:50',
            'url' => 'required|url',
            'platform' => 'required|max:25'
        ]);

        $song = Song::make($validated);
        $song->artist()->associate(auth()->user());
        $song->save();

        return redirect('/songs');
    }

    public function destroy(Song $song) {
        // Delete the song
        // Redirect back to index page
    }
}
