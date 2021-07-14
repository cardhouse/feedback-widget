<div class="py-12">
    @if ($this->feedbackOpen())
        <button wire:click="toggleFeedbackOpen">Close feedback</button>
    @else
        <button wire:click="toggleFeedbackOpen">Open feedback</button>
    @endif
    <div class="h-screen md:h-96 mx-auto sm:px-6 md:px-8 flex">
        <div class="flex flex-col justify-between md:flex-row w-full bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="flex flex-col w-64">
                @forelse($songList as $key => $song)
                    <x-song wire:click="setCurrentSong({{ $song->id }}, {{ $key }})" :title="$song->title" :artist="$song->artist->name" />
                @empty
                    <span>There are no songs in your feedback</span>
                @endforelse
            </div>
            <h1 wire:loading wire:target="currentSong">Loading...</h1>
            @if ($currentSong)
                <x-current-track wire:loading.hidden wire:target="currentSong" class="p-3" :song="$currentSong" />
            @endif
        </div>
    </div>
</div>
