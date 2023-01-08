@props(['href', 'color' => 'light', 'fa' => '', 'size' => 'sm'])

<a
    href="{{ url($href) }}"
    {{ $attributes->class(['btn'])->merge([
        'class' => "btn-{$color} btn-{$size}",
    ]) }}
>
    <x-fa-span :fa="$fa">{{ $slot }}</x-fa-span>
</a>
