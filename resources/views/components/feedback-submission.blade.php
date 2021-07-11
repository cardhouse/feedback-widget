<div>
    @if($songs->count() > 0)
        <form x-show="list" class="flex flex-col items-center justify-between h-24" action="{{ url('/feedback') }}" method="POST">
            @csrf

            <select name="song_id" id="song_id">
                @foreach($songs->filter(function ($song, $key) use($broadcaster) {
                    return !$broadcaster->feedback->songs->contains($key);
                }) as $song)
                    <option value="{{ $song->id }}" @if($loop->last) selected @endif>{{ $song->title }}</option>
                @endforeach
            </select>

            <input type="hidden" name="broadcaster_id" value="{{ $broadcaster->id }}">
            
            <input type="submit" value="Submit" />
        </form>
    @endif
</div>