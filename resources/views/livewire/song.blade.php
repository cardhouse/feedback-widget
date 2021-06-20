<div>
    {{ $song->url }} on {{ $song->platform }}
    @if($song->critiqued)
    Feedback already given.
    @else
        <x-jet-button wire:click="critiqued">Give Feedback</x-jet-button>
    @endif
</div>