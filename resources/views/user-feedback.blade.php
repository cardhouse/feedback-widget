<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Feedback') }}
        </h2>
    </x-slot>

    <div class="p-3 flex">
        <div class="w-2/3 pr-2">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                @forelse($broadcaster->feedback()->wherePivot('completed', false)->get() as $song)
                <x-song :song="$song" feedback=0 />
                @empty
                    <li>There are no songs in your feedback</li>
                @endforelse
            </div>
        </div>
        @if(Illuminate\Support\Facades\Gate::forUser(auth()->user())->allows('submit-feedback', $broadcaster))
            <x-feedback-submission :broadcaster="$broadcaster" />
        @endif
    </div>
</x-app-layout>