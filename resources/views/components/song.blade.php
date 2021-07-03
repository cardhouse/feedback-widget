<div class="p-3 bg-white hover:bg-gray-300 cursor-pointer" {{ $attributes }}>
    <h1 class="font-bold">{{ $song->title }}</h1>
    <h2 class="text-xs text-right">{{ $song->artist->name }}</h2>
</div>