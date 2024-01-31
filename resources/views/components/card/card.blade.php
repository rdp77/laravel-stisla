@props(['type'=>'primary'])

@php
    if ($type === 'primary'){
     $classType = 'primary';
    }
@endphp

<div {{ $attributes->merge(['class' => 'card card-'.$classType]) }}>
    {{ $slot }}
</div>
