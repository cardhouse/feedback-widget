<div class="p-3" {{ $attributes }}>
    {{-- <a href="{{ $song->url }}" target="_blank" rel="noopener noreferrer"> --}}
        {{ $song->title }} by {{ $song->artist->name }}
    {{-- </a> --}}
    @if(Illuminate\Support\Facades\Gate::allows('give-feedback', $song))
        <x-jet-button>Give Feedback</x-jet-button>
    @endif
</div>