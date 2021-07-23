<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class SearchBar extends Component
{

    public $query = '';
    public $searchResults;

    public function render()
    {
        if ($this->query === '') {
            $this->searchResults = collect();
        } else {
            $this->searchResults = User::where('name', 'like', "%$this->query%")
                ->take(5)->get();
        }
        return view('livewire.search-bar');
    }
}
