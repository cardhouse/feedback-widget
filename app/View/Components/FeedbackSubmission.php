<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\User;

class FeedbackSubmission extends Component
{
    public $songs;

    public $broadcaster;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(User $broadcaster)
    {
        $this->broadcaster = $broadcaster;
        $this->songs = auth()->user()->songs;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.feedback-submission');
    }
}
