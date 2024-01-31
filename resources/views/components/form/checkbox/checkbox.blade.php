@props(['label','trigger'=>'option-trigger','name'=>'option-name','model','required'=>false])

<div {{ $attributes->merge(['class' => 'custom-control custom-checkbox']) }}>
    <input wire:model="{{ $model }}" type="checkbox" name="{{ $name }}" class="custom-control-input" id="{{ $trigger }}" {{ $required ? 'required' : '' }}>
    @isset($label)
        <label class="custom-control-label" for="{{ $trigger }}">{{ $label }}</label>
    @endisset
</div>
