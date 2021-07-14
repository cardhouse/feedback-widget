<?php

namespace App\Http\Livewire;

use App\Models\Note;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Song;

class FeedbackWidget extends Component
{
    public $user;
    public $songList;
    public $currentSong;
    public $note;
    public $liked;

    public function mount()
    {
        $this->user = Auth::user();
        $this->songList = $this->user->feedback->songs()
            ->wherePivot('completed', false)
            ->with('artist')
            ->get();

        $this->currentSong = null;
        $this->liked = false;
    }

    public function completeFeedback(Song $song)
    {
        $this->user->feedback->songs()->updateExistingPivot($song->id, [
            'completed' => true
        ]);
        if ($this->note !== null) {
            Note::create([
                'user_id' => $this->user->id,
                'song_id' => $this->currentSong->artist->id,
                'body' => $this->note
            ]);
            $this->note = null;
        }
        $this->currentSong->total_plays += 1;
        if ($this->liked) {
            $this->currentSong->likes += 1;
            $this->liked = false;
        }
        $this->currentSong->save();
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

    public function toggleLike()
    {
        $this->liked = ! $this->liked;
    }

    public function render()
    {
        return view('livewire.feedback-widget');
    }
}
