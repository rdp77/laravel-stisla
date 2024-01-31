@props(['title'=>'Title'])

<div {{ $attributes->merge(['class' => 'section-header']) }}>
    @if(isset($title))
        <h1>{{ $title }}</h1>
    @else
        {{ $slot }}
    @endif
</div>
