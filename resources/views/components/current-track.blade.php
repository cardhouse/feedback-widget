<div class="p-3">
    <h1 class="text-3xl">
        {{ $song->title }} <span class="text-lg">by {{ $song->artist->name }}</span>
    </h1>
    {!! $song->embedCode() !!}
    <button type="button" wire:click="completeFeedback({{ $song->id }})">
        Feedback Complete
    </button>
</div>