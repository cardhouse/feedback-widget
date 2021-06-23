<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Models\User;
use App\Models\Song;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('feedback')->withUser(auth()->user());
    }

    public function show($username)
    {
        $broadcaster = User::where('name', $username)->firstOrFail();

        return view('user-feedback')->withBroadcaster($broadcaster);
    }

    /**
     * Show the form for submitting feedback.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create')->withSongs(auth()->user()->songs);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function submit(Request $request)
    {
        $song = Song::where('id', $request->input('song_id'))->firstOrFail();
        // Make sure the user owns the song
        if (auth()->id() != $song->user_id) {
            dd(auth()->id(), $song);
        }

        // Get the broadcaster the feedback is submitted to
        $broadcaster_id = $request->input('broadcaster_id');
        $broadcaster = User::where('id', $broadcaster_id)->firstOrFail();
        
        // Associate the song with the broadcaster's feedback
        $broadcaster->feedback()->attach($song);
        return redirect()->back();
    }

    public function clear()
    {
        auth()->user()->feedback()->detach();

        return redirect('/feedback');
    }

    public function complete(Song $song) {
        // Remove the song from the Broadcaster's feedback.
        auth()->user()->feedback()->detach($song);

        return redirect('/feedback');
    }
}
