<div class="p-3 bg-white hover:bg-gray-300 cursor-pointer" {{ $attributes }}>
    @if ($attributes->has('title'))
        <h1 class="font-bold">{{ $title }}</h1>
    @endif
    @if ($attributes->has('artist'))
        <h2 class="text-xs text-right">{{ $artist }}</h2>   
    @endif
    @if ($attributes->has('url'))
        <span>{{ $url }}</span>
    @endif
    @if ($attributes->has('platform'))
        <span>on {{ $platform }}</span>
    @endif
</div>