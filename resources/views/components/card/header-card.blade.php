@props(['title'=>'Title','color'=>true])

<div {{ $attributes->merge(['class' => 'card-header']) }}>
    @if(isset($title))
        <h4 {{ $attributes->merge(['style' => $color ? '' : 'color: unset']) }}>{{ $title }}</h4>
    @else
        {{ $slot }}
    @endif
</div>
