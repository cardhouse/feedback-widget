<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex">
        <div class="w-1/4 bg-white overflow-hidden shadow-xl sm:rounded-lg">
            @forelse($songList as $key => $song)
                <x-song wire:click="setCurrentSong({{ $song->id }}, {{ $key }})" :song="$song" feedback=1 />
            @empty
                <li>There are no songs in your feedback</li>
            @endforelse
        </div>

        @if ($currentSong)
            <x-current-track :song="$currentSong"></x-current-track>
        @else
            Click on a song to give feedback.
        @endif
    </div>
</div>
