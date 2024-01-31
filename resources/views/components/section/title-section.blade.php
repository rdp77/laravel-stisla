@props(['title'=>'Title','description'])

<h2 class="section-title">{{ $title }}</h2>
@isset($description)
    <p class="section-lead">
        {{ $description }}
    </p>
@endisset
