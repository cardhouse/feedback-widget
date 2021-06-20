<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Submit Feedback') }}
        </h2>
    </x-slot>

    <x-jet-form-section>
        <x-slot name="title">Submit Feedback</x-slot>
        <x-slot name="description">Time to do the thing</x-slot>
        <x-slot name="submit">submit</x-slot>

        <x-slot name="form">
            <x-jet-validation-errors class="mb-4" />

            @csrf
        
            <div>
                <x-jet-label for="url" value="{{ __('URL') }}" />
                <x-jet-input name="url" id="url_input" />
            </div>
        </x-slot>
        <x-slot name="actions">
            <x-jet-button>Submit feedback</x-jet-button>
            <x-jet-button type="button">Cancel</x-jet-button>
        </x-slot>
    </x-jet-form-section>
</x-app-layout>