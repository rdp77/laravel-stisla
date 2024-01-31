@props(['items'=>[], 'icon'=>'far fa-circle'])

<div {{ $attributes->merge(['class' => 'list-unstyled list-unstyled-border']) }}>
    @foreach($items as $item)
        <div class="media">
            <div class="media-icon"><i class="{{ $icon }}"></i></div>
            <div class="media-body">
                <h6>{{ $item['title'] }}</h6>
                <p>{{ $item['description'] }}</p>
            </div>
        </div>
    @endforeach
</div>
