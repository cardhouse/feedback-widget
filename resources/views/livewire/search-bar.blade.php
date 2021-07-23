<div>
    <input type="search" name="search" id="search" wire:model="query">
    <ul>
        @foreach ($searchResults as $broadcaster)
            <li>
                <a href="{{ url("/$broadcaster->name") }}">
                    {{ $broadcaster->name }}
                </a>
            </li>
        @endforeach
    </ul>
</div>
