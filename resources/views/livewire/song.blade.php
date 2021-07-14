<div x-data="{ open: @entangle('active')}" x-show="open" class="p-3 bg-white hover:bg-gray-300 cursor-pointer">
    <div >
        <div class="flex items-middle justify-between">
            <h1 class="font-bold">{{ $track->title }}</h1>
            <button type="button" wire:click="trash({{ $track }})">Delete</button>
        </div>
        {{ $track->url }}<span>on {{ $track->platform }}</span>
        <br>
        <p>Liked {{ $track->likes }} out of {{ $track->total_plays }} plays</p>
        @forelse ($track->notes as $note)
            <ul>
                <li>{{ $note->user->name }}: {{ $note->body }}</li>
            </ul>
        @empty
            No feedback
        @endforelse
    </div>
</div>
