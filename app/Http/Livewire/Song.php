<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Feedback;
use App\Models\Song as Track;

class Song extends Component
{
    public $track;
    public $active;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function mount(Track $track)
    {
        $this->track = $track;
        $this->active = true;
    }

    public function trash(Track $track)
    {
        $this->active = false;
        $track->delete();
    }

    public function render()
    {
        return view('livewire.song');
    }
}
