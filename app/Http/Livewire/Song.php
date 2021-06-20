<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Feedback;

class Song extends Component
{
    public $song;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Song $song)
    {
        $this->song = $song;
    }

    public function render()
    {
        return view('livewire.song');
    }
}
