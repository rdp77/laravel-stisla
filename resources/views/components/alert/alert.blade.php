@props(['message' => 'Message', 'on','type' => 'primary'])

<div class="alert alert-{{ $type }}" x-data="{ shown: false, timeout: null }"
     x-init="@this.on('{{ $on }}', () => { clearTimeout(timeout); shown = true; timeout = setTimeout(() => { shown = false }, 2000); })"
     x-show.transition.out.opacity.duration.1500ms="shown"
     x-transition:leave.opacity.duration.1500ms>
    <div class="alert-body">
        {{ $message }}
    </div>
</div>
