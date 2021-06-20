<div>
    <h1>Submit a song for feedback</h1>
    @if($songs->count() > 0)
        <form action="{{ url('/feedback') }}" method="POST">
            @csrf

            <select name="song_id" id="song_id">
                @foreach($songs as $song)
                    <option value="{{ $song->id }}">{{ $song->title }}</option>
                @endforeach
            </select>
            <input type="hidden" name="broadcaster_id" value="{{ $broadcaster->id }}">
            
            <input type="submit" value="Submit" />
        </form>
        
    @endif
</div>