<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        if(Auth::id() != $song->artist->id)
        {
            abort(403);
        }
        $song->delete();
        return redirect('/songs');
    }
}
