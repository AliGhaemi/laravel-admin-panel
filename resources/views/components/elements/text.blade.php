@php
    $defaults = [
        'class' => 'm-1 text-font'
    ];
@endphp
<p {{ $attributes($defaults) }}>{{ $slot }}</p>
