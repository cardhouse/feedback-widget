<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Song;

class CurrentTrack extends Component
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

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.current-track');
    }
}
