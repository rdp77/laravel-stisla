@props(['type'=>'primary','label'=>'Text Button'])

<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn btn-'.$type]) }}>
    {{ $label }}
</button>
