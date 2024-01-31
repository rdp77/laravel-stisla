@props(['message' => 'Message', 'type' => 'primary'])

<div class="alert alert-{{ $type }} alert-dismissible show fade">
    <div class="alert-body">
        <button class="close" data-dismiss="alert">
            <span>&times;</span>
        </button>
        {{ $message }}
    </div>
</div>
