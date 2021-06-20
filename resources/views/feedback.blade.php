<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            @forelse($user->feedback as $song)
                <x-song :song="$song" />
            @empty
                <li>There are no songs in your feedback</li>
            @endforelse
        </div>
    </div>
</div>