<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Songs') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="flex max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="w-3/4 bg-white overflow-hidden shadow-xl sm:rounded-lg mr-3">
                @forelse($songs as $song)
                    @livewire('song', ['track' => $song], key($song->id))
                @empty
                    <li>You have no songs.</li>
                @endforelse
            </div>
            <x-song-form />
        </div>
    </div>
</x-app-layout>