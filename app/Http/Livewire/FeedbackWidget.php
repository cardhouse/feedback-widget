<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Song;

class FeedbackWidget extends Component
{
    public $songList;
    public $currentSong;

    public function mount()
    {
        $this->songList = Auth::user()
            ->feedback()
            ->wherePivot('completed', false)
            ->with('artist')
            ->get();
            
        $this->currentSong = null;
    }

    public function completeFeedback(Song $song)
    {
        Auth::user()->feedback()->updateExistingPivot($song->id, [
            'completed' => true
        ]);
        $this->currentSong = null;
    }

    public function setCurrentSong(Song $song, $key)
    {
        $this->songList->forget($key);
        $this->currentSong = $song;
    }

    public function render()
    {
        return view('livewire.feedback-widget');
    }
}
