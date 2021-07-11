<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __($broadcaster->name) }}
        </h2>
    </x-slot>

    @livewire('broadcaster-queue', ['broadcaster' => $broadcaster], key($broadcaster->id))
</x-app-layout>