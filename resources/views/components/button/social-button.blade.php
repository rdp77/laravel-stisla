@props(['icon','title'])

<a {{ $attributes->merge(['class' => 'btn btn-block btn-social']) }}>
    <span class="fab fa-{{ $icon }}" style="font-size: 24px!important;"></span> {{ $title }}
</a>
