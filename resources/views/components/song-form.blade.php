<div>
    <h1>Create a song</h1>
    <form class="flex flex-col justify-between items-center" action="{{ url('/songs') }}" method="POST">
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
        
        <input class="rounded-md px-4 py-2 my-2 bg-blue-500 hover:bg-blue-700 border-blue-600 hover:border-blue-800 hover:shadow-sm text-white w-full" type="submit" value="Submit" />
    </form>
</div>
