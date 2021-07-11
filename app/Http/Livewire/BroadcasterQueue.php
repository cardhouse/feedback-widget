<?php

namespace App\Http\Livewire;

use App\Models\Song;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Gate;

class BroadcasterQueue extends Component
{
    public User $broadcaster;
    public $viewer;
    public $allowed = false;

    public $title;
    public $url;
    public $platform;

    protected $rules = [
        'title' => 'required|string|max:50',
        'url' => 'required|url',
        'platform' => 'required|max:25'
    ];

    public function mount()
    {
        $this->allowed = $this->allowedToSubmit();
        $this->viewer = auth()->user();
    }

    public function render()
    {
        return view('livewire.broadcaster-queue');
    }

    public function allowedToSubmit()
    {
        return Gate::allows('submit-feedback', $this->broadcaster);
    }

    public function addNewSongToFeedback()
    {
        $validatedData = $this->validate();

        $song = Song::make($validatedData);
        $song->artist()->associate($this->viewer);
        $song->save();
        
        // Attach the song to the broadcaster's feedback
        $this->broadcaster->feedback->songs()->attach($song);
        $this->clearInputs();
    }

    public function addSongToFeedback(Song $song)
    {
        $this->broadcaster->feedback->songs()->attach($song);
    }

    public function clearInputs()
    {
        $this->title = null;
        $this->url = null;
        $this->platform = null;
    }
}
