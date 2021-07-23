<div x-data="{ open: @entangle('active')}" x-show="open" class="p-3 bg-white hover:bg-gray-300 cursor-pointer">
    <div >
        <div class="flex items-middle justify-between align-middle">
            <h1 class="font-bold justify-items-start text-xl mb-3 w-1/2">
                {{ $track->title }}
                <span class="text-sm text-gray-500">({{ $track->platform }})</span>
            </h1>
            <div class="flex flex-row flex-1 justify-end justify-items-end">
                <div class="flex flex-row items-center space-x-2 w-1/6">
                    <img src="https://www.svgrepo.com/show/21106/thumbs-up.svg" intrinsicsize="512 x 512" width="25" height="25" srcset="https://www.svgrepo.com/show/21106/thumbs-up.svg 4x" alt="Thumbs Up SVG Vector" title="Thumbs Up SVG Vector">
                    <span>{{ $track->likes }}</span>
                </div>
                <div class="flex flex-row items-center space-x-2 w-1/6">
                    <img src="https://www.svgrepo.com/show/313747/comment.svg" intrinsicsize="512 x 512" width="25" height="25" srcset="https://www.svgrepo.com/show/313747/comment.svg 4x" alt="Comment SVG Vector" title="Comment SVG Vector">
                    <span>{{ $track->notes->count() }}</span>
                </div>
                <button type="button" wire:click="trash({{ $track }})">
                    <img src="https://www.svgrepo.com/show/2143/trash.svg" intrinsicsize="512 x 512" width="25" height="25" srcset="https://www.svgrepo.com/show/2143/trash.svg 4x" alt="Trash SVG Vector" title="Trash SVG Vector">
                </button>
            </div>
        </div>
       
    </div>
</div>
