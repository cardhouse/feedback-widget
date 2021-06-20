<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Song Creation') }}
        </h2>
    </x-slot>

    <x-song-form />
</x-app-layout>