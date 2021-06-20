<div>
    <h1>Create a song</h1>
    <form action="{{ url('/songs') }}" method="POST">
        @csrf

        <label for="title">Title</label>
        <input type="text" name="title" id="title" />

        <label for="url">URL</label>
        <input type="url" name="url" id="url">

        <label for="platform">Platform</label>
        <select name="platform" id="platform">
            <option value="youtube">YouTube</option>
            <option value="soundcloud">SoundCloud</option>
            <option value="discord">Discord</option>
        </select>
        
        <input type="submit" value="Submit" />
    </form>
</div>