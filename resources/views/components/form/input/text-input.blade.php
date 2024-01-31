@props(['disabled' => false, 'errorKey' => null])

@php
    $errorClass = $errorKey && $errors->has($errorKey) ? ' is-invalid' : '';
@endphp

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'form-control'.$errorClass]) !!}>
