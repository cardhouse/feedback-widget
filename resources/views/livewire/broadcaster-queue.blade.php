<div class="p-3 flex">
    <div class="w-2/3 pr-2">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            @forelse($broadcaster->feedback->songs()->wherePivot('completed', false)->with('artist')->get() as $song)
                <x-song :title="$song->title" :artist="$song->artist->name" />
            @empty
                <li>There are no songs in your feedback</li>
            @endforelse
        </div>
    </div>
    @if($allowed)
        <div class="flex flex-col">
            <h1>Submit song for feedback</h1>
            <x-feedback-submission :broadcaster="$broadcaster" />
            <form class="flex flex-col justify-between items-center" action="{{ url('/songs') }}" method="POST">
                @csrf
        
                <label for="title">Title</label>
                <input wire:model="title" type="text" name="title" id="title" />
        
                <label for="url">URL</label>
                <input wire:model="url" type="url" name="url" id="url">
        
                <label for="platform">Platform</label>
                <select wire:change="$set('platform', $event.target.value)" name="platform" id="platform">
                    <option value="">Select</option>
                    <option value="youtube">YouTube</option>
                    <option value="soundcloud">SoundCloud</option>
                    <option value="discord">Discord</option>
                    <option value="other">Other</option>
                </select>
                
                <input wire:click.prevent="addNewSongToFeedback" type="submit" value="Submit" />
            </form>
        </div>
    @endif
</div>
