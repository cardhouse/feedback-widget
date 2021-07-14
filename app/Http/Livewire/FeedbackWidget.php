<?php

namespace App\Http\Livewire;

use App\Models\Note;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Song;

class FeedbackWidget extends Component
{
    public $songList;
    public $currentSong;
    public $user;
    public $note;

    public function mount()
    {
        $this->user = Auth::user();
        $this->songList = $this->user->feedback->songs()
            ->wherePivot('completed', false)
            ->with('artist')
            ->get();

        $this->currentSong = null;
    }

    public function completeFeedback(Song $song)
    {
        $this->user->feedback->songs()->updateExistingPivot($song->id, [
            'completed' => true
        ]);
        if ($this->note !== null) {
            $note = Note::create([
                'user_id' => $this->user->id,
                'song_id' => $this->currentSong->artist->id,
                'body' => $this->note
            ]);
            $this->note = null;
        }
        $this->currentSong = null;
    }

    public function feedbackOpen()
    {
        return $this->user->feedback->open;
    }

    public function setCurrentSong(Song $song, $key)
    {
        $this->songList->forget($key);
        $this->currentSong = $song;
    }

    public function toggleFeedbackOpen()
    {
        $this->user->feedback->open = ! $this->user->feedback->open;
        $this->user->feedback->save();
    }

    public function render()
    {
        return view('livewire.feedback-widget');
    }
}
