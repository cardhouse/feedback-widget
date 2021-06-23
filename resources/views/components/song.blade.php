<div class="p-3" {{ $attributes }}>
    {{-- <a href="{{ $song->url }}" target="_blank" rel="noopener noreferrer"> --}}
        {{ $song->title }} by {{ $song->artist->name }}
    {{-- </a> --}}
</div>