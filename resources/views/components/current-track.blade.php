<div class="-ml-1 bg-gray-100 border-b-2 border-r-2 border-t-2 flex flex-col h-full justify-between px-5 rounded-br-md rounded-tr-md shadow-inner shadow-md">
    <h1 class="text-3xl">
        {{ $song->title }} <span class="text-lg">by {{ $song->artist->name }}</span>
    </h1>
    {!! $song->embedCode() !!}
    <textarea wire:model="note" rows=5 class="resize-y" placeholder="Enter feedback"></textarea>
    <button class="w-full py-2 bg-green-700 rounded-b" type="button" wire:click="completeFeedback({{ $song->id }})">
        Feedback Complete
    </button>
</div>