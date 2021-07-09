<div x-data="{ open: @entangle('active')}" class="p-3 bg-white hover:bg-gray-300 cursor-pointer">
    <div x-show="open">
        <h1 class="font-bold">{{ $track->title }}</h1>
        <h2 class="text-xs text-right">{{ $track->artist->name }}</h2>
    
        {{ $track->url }}<span>on {{ $track->platform }}</span>
        <button type="button" wire:click="trash({{ $track }})">Delete</button>
    </div>
</div>
